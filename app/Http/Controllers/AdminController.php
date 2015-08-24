<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        /*$this->middleware('auth', ['except' => ['getLogin', 'postLogin']]);
        $this->middleware('admin', ['except' => ['getLogin', 'postLogin']]);*/
    }

    public function getLogin()
    {
        return view('admin.login');
    }

    public function getDashboard()
    {
        return view('admin.dashboard');
    }
}
