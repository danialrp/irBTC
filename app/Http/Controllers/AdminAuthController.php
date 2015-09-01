<?php

namespace App\Http\Controllers;

use App\MyClasses\AdminClass;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{

    /**
     * @var AdminClass
     */
    private $adminClass;

    public function __construct(AdminClass $adminClass)
    {
        $this->adminClass = $adminClass;
    }

    public function getLogin()
    {
        if(Auth::check() && Auth::user()->role == 1)
            return redirect('iadmin/dashboard');
        elseif(Auth::check() && Auth::user()->role == 2)
            return redirect('/');
        else
            return view('admin.login');
    }

    public function postLogin(Request $request)
    {
        if($auth = $this->adminClass->authenticateAdmin($request) == -1) {
            return redirect('/iadmin/login')
                ->withErrors([
                    'email' => 'دسترسی شما به دلایل امنیتی به مدت ۱ دقیقه مسدود گردید!'
                ]);
        }
        elseif($auth = $this->adminClass->authenticateAdmin($request) == 0) {
            return redirect('/iadmin/login')
                ->withInput($request->only('email'))
                ->withErrors([
                    'email' => 'اطلاعات وارد شده صحیح نمی باشد!',
                ]);
        }
        elseif($auth = $this->adminClass->authenticateAdmin($request) == 1)
            return redirect()->intended('/iadmin/dashboard');
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('/iadmin/login');
    }
}
