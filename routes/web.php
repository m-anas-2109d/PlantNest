<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Plantnest_user;
use App\Http\Controllers\PlantNest_Admin;
use App\Http\Controllers\login_register;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// PlantNest User Routes

Route::get("/", [Plantnest_user::class, 'user_index']);
Route::get("/about", [Plantnest_user::class, 'user_about']);
Route::get("/contact", [Plantnest_user::class, 'user_contact']);
Route::get("/shop_details", [Plantnest_user::class, 'user_shop_details']);
Route::get("/shop", [Plantnest_user::class, 'user_shop']);
Route::get("/cart", [Plantnest_user::class, 'user_cart']);
Route::get("/checkout", [Plantnest_user::class, 'user_checkout']);



// PlantNest Admin Routes
Route::get('/adminlayout',[PlantNest_Admin::class,'PlantNest_AdminLayout']);


// Login Routes
Route::get('/login',[login_register::class,'login']);
Route::post('/register',[login_register::class,'register']);