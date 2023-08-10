<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\feedback;

class PlantNest_Admin extends Controller
{
    public function PlantNest_AdminLayout(){
        return view('PlantNest_Admin.AdminLayout');
    }

    public function Feedback(Request $req){
        $feedback = new feedback();
        $feedback->name = $req->nameinp;
        $feedback->email = $req->emailinp;
        $feedback->phone = $req->numberinp;
        $feedback->feedback = $req->msginp;
        $feedback->save();
        return redirect()->back()->with("success","Data has been inserted");
    }
}
