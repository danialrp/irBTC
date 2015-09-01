<?php
/**
 * Created by PhpStorm.
 * User: DaniaL
 * Date: 9/1/15 AD
 * Time: 3:14 PM
 */

namespace App\MyClasses;

use App\MyClasses\UserClass;
use App\Throttle;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;

class AdminAuthenticateClass {

    /**
     * @var UserClass
     */
    private $userClass;
    /**
     * @var ThrottleClass
     */
    private $throttleClass;
    use AuthenticatesAndRegistersUsers, ThrottlesLogins, ValidatesRequests;

    public function __construct(UserClass $userClass, ThrottleClass $throttleClass)
    {
        $this->userClass = $userClass;
        $this->throttleClass = $throttleClass;
    }

    public function authenticateAdmin(Request $request)
    {
        if ($this->throttleClass->checkLocked($request->ip(), $request->email) == false) {
            return -1;
            dd($request);
        }
        else {
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required',
            ]);
        }
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password'], 'role' => 1, 'active' => 1])) {
            $this->userClass->setLoginFootage(Auth::user()->id, $request->ip());
            $this->throttleClass->setThrottleStatus($request->ip(), 1);
            return 1;
        } else
            return 0;
    }
}