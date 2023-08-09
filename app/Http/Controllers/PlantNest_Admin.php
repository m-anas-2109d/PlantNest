<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlantNest_Admin extends Controller
{
    public function PlantNest_AdminLayout(){
        return view('PlantNest_Admin.AdminLayout');
    }
}
