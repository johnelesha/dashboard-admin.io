<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashcontrol extends Controller
{
    //
    public function loginindex() {
        return view('index');
    }
    public function dashboardhome() {
        return view('home');
    }
    public function contacts() {
        return view('messages');
    }
    public function adminsdata() {
        return view('admins');
    }
    public function usersIdentitycheck() {
        return view('checkusers');
    }
    public function restaurantsowners() {
        return view('owners');
    }
    public function restauransdata() {
        return view('restaurants');
    }
    public function addnewadmins() {
        return view('signup');
    }
    public function usersdata() {
        return view('users');
    }
    public function datasenttoconfirm() {
        return view('data');
    }
    public function approverestaurants() {
        return view('confirmrestaurants');
    }
}
