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

    public function getUserCredit()
    {
        return view('admin.manageUserCredit');
    }

    public function getUserProfile()
    {
        return view('admin.manageUserProfile');
    }

    public function getUserDetail()
    {
        return view('admin.manageUserDetail');
    }

    public function getUserNew()
    {
        return view('admin.manageUserNew');
    }

    public function getTradeActive()
    {
        return view('admin.manageTradeActive');
    }

    public function getTradeAll()
    {
        return view('admin.manageTradeAll');
    }

    public function getTradeDetail()
    {
        return view('admin.manageTradeDetail');
    }

    public function getTransactionActive()
    {
        return view('admin.manageTransactionActive');
    }

    public function getTransactionAll()
    {
        return view('admin.manageTransactionAll');
    }

    public function getTransactionDetail()
    {
        return view('admin.manageTransactionDetail');
    }

    public function getBankAll()
    {
        return view('admin.manageBankAll');
    }

    public function getBankNew()
    {
        return view('admin.manageBankNew');
    }

    public function getBankDetail()
    {
        return view('admin.manageBankDetail');
    }
}
