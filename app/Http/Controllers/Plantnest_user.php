<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Plantnest_user extends Controller
{
    public function user_index()
    {
        return view("PlantNest_USER.user_index");
    }

    public function user_about()
    {
        return view("PlantNest_USER.user_about");
    }

    public function user_contact()
    {
        return view("PlantNest_USER.user_contact");
    }

    public function user_shop_details()
    {
        return view("PlantNest_USER.user_shop-details");
    }

    public function user_shop()
    {
        return view("PlantNest_USER.user_shop");
    }

    public function user_cart()
    {
        return view("PlantNest_USER.user_cart");
    }

    public function user_checkout()
    {
        return view("PlantNest_USER.user_checkout");
    }
}
