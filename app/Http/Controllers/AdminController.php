<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminManageCreditRequest;
use App\Http\Requests\AdminSearchRequest;
use App\MyClasses\AdminClass;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * @var AdminClass
     */
    private $adminClass;

    public function __construct(AdminClass $adminClass)
    {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->adminClass = $adminClass;
    }

    public function getDashboard()
    {
        $dashboard = $this->adminClass->getDashboardInfo();
        return view('admin.dashboard', compact('dashboard'));
    }

    public function getUserCredit()
    {
        $users = $this->adminClass->manageUserCredit();
        return view('admin.manageUserCredit', compact('users'));
    }

    public function postUserCredit($user_id, AdminManageCreditRequest $request)
    {
        if($this->adminClass->updateUserCredit($user_id, $request) == 1)
            Session::flash('message', 'موجودی کاربر با موفقیت بروزرسانی گردید!');
        elseif($this->adminClass->updateUserCredit($user_id, $request) == 0)
            Session::flash('message', 'هیچ موجودی بروزرسانی نگردید!');
        else
            Session::flash('message', 'متاسفانه بروزرسانی اعتبار انجام نشد!');
        return redirect('/iadmin/user/credit');
    }

    public function postSearchUserCredit(AdminSearchRequest $request)
    {
        $users = $this->adminClass->searchUserCredit($request);
        return view('admin.manageUserCredit', compact('users'));
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

    public function getBankIrr()
    {
        return view('admin.manageBankIrr');
    }

    public function getBankIrrDetail()
    {
        return view('admin.manageBankIrrDetail');
    }

    public function getBankBtc()
    {
        return view('admin.manageBankBtc');
    }

    public function getBankBtcDetail()
    {
        return view('admin.manageBankBtcDetail');
    }

    public function getFeeAll()
    {
        return view('admin.manageFeeAll');
    }

    public function getFeeDetail()
    {
        return view('admin.manageFeeDetail');
    }

    public function getRateAll()
    {
        return view('admin.manageRateAll');
    }
}
