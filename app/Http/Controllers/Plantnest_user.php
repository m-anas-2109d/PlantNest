<?php

namespace App\Http\Controllers;

use App\Models\user_registration;
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

    public function profile()
    {
        $profile = user_registration::where("email", session('sessionuseremail'))->get();
        return view("PlantNest_USER.user_profile", compact('profile'));
    }

    public function get_data_update(Request $req)
    {

        // Update profile
        $profile = user_registration::where("email", session('sessionuseremail'))->first();
        $profile->first_name = $req->first_name;
        $profile->last_name = $req->last_name;
        $profile->contact_no = $req->contact_no;
        $profile->password = $req->password;
        $image = $req->file('image');
        $ext = rand() . "." . $image->getClientOriginalName();
        $image->move('images/', $ext);
        $profile->profile_image = $ext;
        $profile->save();

        return redirect()->back()->with("updatesuccesscomp", "Data has been updated");
    }

}
