<?php

namespace App\Http\Controllers;

use App\MyClasses\AdminClass;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
