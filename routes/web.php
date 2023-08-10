<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Plantnest_user;
use App\Http\Controllers\PlantNest_Admin;
use App\Http\Controllers\login_register;
use App\Http\Controllers\categories;
use App\Http\Controllers\insercontroller;


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
// PlantNest Admin Routes
Route::get('/adminlayout',[PlantNest_Admin::class,'PlantNest_AdminLayout']);
Route::get('/category',[categories::class,'Category']);
Route::post('/categorypost',[categories::class,'categoryPost']);
Route::get('/fetchcategory',[categories::class,'FetchCategory']);
Route::get('/editcategory/{id}',[categories::class,'EditCategory']);
Route::post('/updatecategory/{id}', [categories::class,'UpdateCategory']);
Route::get('/deletecategory/{id}',[categories::class,'DeleteCategory']);


// insert product 1 crud
Route::get("/Plant1", [insercontroller::class,'insertget']);
Route::post("/plant_1", [insercontroller::class,'insertpost']);
Route::get("/fetchplant_1", [insercontroller::class,'plant1fetch']);
Route::get('/deleteplant/{id}',[insercontroller::class,'plant1delete']);
Route::get('/updaterecord/{id}',[insercontroller::class,'EditCategory']);
Route::post('/update_record/{id}',[insercontroller::class,'editfunctionpost']);




// Login Routes
Route::get('/login',[login_register::class,'login']);
// Route::get('/register',[login_register::class,'register']);
Route::post('/register',[login_register::class,'registerpost']);

Route::post('/loginadminpost',[login_register::class,'loginadminpost']);


Route::post("/input", [login_register::class, 'input']);
Route::get("/register", [login_register::class, 'get_email']);
Route::get("/code_match", [login_register::class, 'code_match']);
Route::post("/code_match_", [login_register::class, 'code_match_']);

Route::get("/logout", [login_register::class,'logout']);
Route::get("/profile", [Plantnest_user::class,'profile']);
Route::post('/update_company/{id}', [Plantnest_user::class, 'get_data_update']);
