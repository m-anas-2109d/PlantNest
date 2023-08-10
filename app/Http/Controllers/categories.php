<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;

class categories extends Controller
{
    public function Category(){
        return view('PlantNest_admin.category');
    }

    public function categoryPost(Request $req){
        $category = new category();
        $category->id = $req->idinput;
        $category->category_name = $req->catnameinput;
        $category->category_type = $req->cattypeinput;
        $category->save();
        return redirect()->back()->with("success","Data has been inserted");
    }

    public function FetchCategory(){
        $categories = category::all();
        return view('PlantNest_admin.FetchCategory',compact("categories"));
    }

    public function EditCategory($id){
        $edit = category::find($id);
        return view("PlantNest_admin.EditCategory",compact('edit'));
    }

    public function UpdateCategory(Request $req,$id){
        $update = category::find($id);
        $update->id = $req->idinp;
        $update->category_name = $req->catnameinp;
        $update->category_type = $req->cattypeinp;
        $update->update();
        return redirect("/fetchcategory")->with("updatesuccess", "Data has been Updated");
    }

    public function DeleteCategory($id){
        $delete = category::find($id);
        $delete->delete();
        return redirect()->back()->with("delete","Data has been Deleted");
    }
}
