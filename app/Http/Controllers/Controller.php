<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function testuser()
    {
        // dd(Auth::user()->first());
        // $user = Auth::user()->get();
        $user = Auth::user() ? Auth::user()->staff_type : null;
        if ($user == 1) {
            return "1";
        } else {
            return "0";
        }
    }

    public function usertype()
    {
        $user = Auth::user() ? Auth::user()->staff_type : null;
        if ($user == 1) {
            return "1";
        } elseif ($user == 2) {
            return "2";
        } elseif ($user == 3) {
            return "3";
        } else {
            return "0";
        }
    }

    public function admintype()
    {
        $user = Auth::user() ? Auth::user()->staff_type : null;
        if ($user == 1) {
            return "1";
        } else {
            return "0";
        }
    }
}
