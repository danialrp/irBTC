<?php

namespace App\Http\Controllers\Auth;

use App\MyClasses\UserClass;
use App\Providers\JDateServiceProvider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    protected $redirectPath = '/profile';
    /**
     * @var UserClass
     */
    private $userClass;
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(UserClass $userClass)
    {
        $this->middleware('guest', ['except' => 'getLogout']);
        $this->userClass = $userClass;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email|max:60|unique:users',
            'password' => array('required', 'confirmed', 'min:8', 'regex:/^\S*(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/'),
            'nname' => array('required','max:60','unique:users','regex:/^[a-zA-Z0-9_@.-]*$/')
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'nname' => $data['nname'],
            'created_fa' => JDateServiceProvider::date('Y-m-d H:i:s',time(),false,true),
            'login_time' => JDateServiceProvider::date('Y-m-d H:i:s',time(),false,true)
        ]);
        $this->userClass->makeBalance($user->id);
        return $user;
    }

    public function Authenticate(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt(['email' => $request['email'], 'password' => $request['password'], 'active' => 1]))
        {
            $this->userClass->setLoginFootage(Auth::user()->id, $request->ip());
            return redirect()->intended('/');
        }
        else
        {
            return redirect('/')
                ->withInput($request->only('email'))
                ->withErrors([
                    'email' => 'اطلاعات وارد شده صحیح نمی باشد!',
                ]);
        }
    }

    /**
     * Get the maximum number of login attempts for delaying further attempts.
     *
     * @return int
     */
    protected function maxLoginAttempts()
    {
        return property_exists($this, 'maxLoginAttempts') ? $this->maxLoginAttempts : 5;
    }

    /**
     * The number of seconds to delay further login attempts.
     *
     * @return int
     */
    protected function lockoutTime()
    {
        return property_exists($this, 'lockoutTime') ? $this->lockoutTime : 60;
    }
}
