<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/','dashcontrol@loginindex');
Route::get('/loginingindex','dashcontrol@loginindex');
Route::get('/conmesantactdsages','dashcontrol@contacts');
Route::get('/dashhomesboard','dashcontrol@dashboardhome');
Route::get('/admdatains','dashcontrol@adminsdata');
Route::get('/usIdecheersntityck','dashcontrol@usersIdentitycheck');
Route::get('/restaownuraersnts','dashcontrol@restaurantsowners');
Route::get('/restadataurants','dashcontrol@restauransdata');
Route::get('/addadmnewinbias','dashcontrol@addnewadmins');
Route::get('/usdaersta','dashcontrol@usersdata');
Route::get('/dasetocontantfirm','dashcontrol@datasenttoconfirm');
Route::get('/appresrotauverants','dashcontrol@approverestaurants');