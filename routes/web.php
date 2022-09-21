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

use App\Models\User;
use App\Models\Address;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert', function () {
    $user = user::findorFail(1);
    $address = new Address(['address' => '108 SE Brookwood Street']);
    $user->address()->save($address);
});

Route::get('/update/{id}', function ($id) {
    $address = Address::whereUserId($id)->first();
    //$address = Address::whereUserId($id);
    $address->address = '108 Brookwood Ave';
    $address->save();
});

Route::get('/read/{id}', function ($id) {
    $user = user::findorFail($id);
    echo $user->address->address;

    // $address = address::findorFail($id);
    // echo $address->address;
});

Route::get('/delete/{id}', function ($id) {
    //$user = user::findorFail($id);
    //$user->address()->delete();
    $address = address::findorFail($id);
    $address->delete();
    return 'Done !';
});
