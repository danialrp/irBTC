<?php
/**
 * Created by PhpStorm.
 * User: DaniaL
 * Date: 8/31/15 AD
 * Time: 3:17 AM
 */

namespace App\MyClasses;

use App\Http\Requests;
use App\Transaction;
use App\User;

class AdminClass {

    public function __construct()
    {

    }

    public function getDashboardInfo()
    {
        $allUsers = User::select('id', 'confirmed')->get();

        $dashborad = [
            'users' => $allUsers->count(),
            'usersConfirmed' => $allUsers->where('confirmed', 1)->count(),
        ];

        return $dashborad;
    }

}