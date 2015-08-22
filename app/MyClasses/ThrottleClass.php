<?php
/**
 * Created by PhpStorm.
 * User: DaniaL
 * Date: 8/20/15 AD
 * Time: 8:36 PM
 */

namespace App\MyClasses;


use App\Providers\JDateServiceProvider;
use App\Throttle;
use App\User;
use Carbon\Carbon;

class ThrottleClass {

    /**
     * @param $ip
     * @return bool
     */
    public function checkLocked($ip, $email)
    {
        $throttle = Throttle::where('ip', inet_pton($ip))->first();
        if($throttle) {
            if($this->checkLockedTime($throttle) > 60)
                $this->resetAttemptandTime($throttle);
            if($throttle->attempt >= $throttle->max_attempt) {
                $this->increaseAttempt($throttle, $email);
                $locked = $this->lock($throttle);
                $locked->save();
                return false;
            }
            else {
                $this->increaseAttempt($throttle, $email);
                return true;
            }
        }
        else {
            Throttle::insert([
                'ip' => inet_pton($ip),
                'email' => $email,
                'attempt' => 1,
                'max_attempt' => 5,
                'created_at' => Carbon::now(),
                'attempt_time' => JDateServiceProvider::date('Y-m-d H:i:s', time(), false, true),
                'locked_time' => JDateServiceProvider::date('Y-m-d H:i:s', time(), false, true),
            ]);
            return true;
        }
    }

    /**
     * @param Throttle $throttle
     * @return int
     */
    public function checkLockedTime(Throttle $throttle)
    {
        $time_now = strtotime(JDateServiceProvider::date('Y-m-d H:i:s', time(), false, true));
        $time_locked = strtotime($throttle->locked_time);
        $diffInSeconds = $time_now - $time_locked;
        $throttle->description = $diffInSeconds;
        $throttle->save();
        return $diffInSeconds;
    }

    public function lock(Throttle $throttle)
    {
        $throttle->locked = 1;
        $throttle->locked_time = JDateServiceProvider::date('Y-m-d H:i:s', time(), false, true);
        if($throttle->attempt >= 10 && $throttle->email)
            $this->lockUser($throttle->email);
        return $throttle;
    }

    /**
     * @param $email
     */
    public function lockUser($email)
    {
        $user = User::where('email', $email)->first();
        if ($user) {
            $user->active = 0;
            $user->save();
        }
    }

    /**
     * @param Throttle $throttle
     */
    public function increaseAttempt(Throttle $throttle, $email)
    {
        $throttle->attempt += 1;
        $throttle->attempt_time = JDateServiceProvider::date('Y-m-d H:i:s', time(), false, true);
        $throttle->email = $email;
        $throttle->save();
    }

    /**
     * @param Throttle $throttle
     */
    public function resetAttemptandTime(Throttle $throttle)
    {
        $throttle->attempt = 0;
        $throttle->locked = 0;
        $throttle->locked_time = null;
        $throttle->save();
    }

    public function setThrottleStatus($ip, $flag)
    {
        $throttle = Throttle::where('ip', inet_pton($ip))->first();
        if($throttle) {
            if($flag == 0)
                $this->lock($throttle);
            elseif($flag == 1)
                $this->resetAttemptandTime($throttle);
        }
        else
            return false;
    }

}