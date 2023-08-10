<?php

namespace App\Http\Controllers;
use App\Models\flowering_plantmodel;
use Illuminate\Http\Request;
use App\Models\category;

class insercontroller extends Controller
{
    public function insertget()
    {
        $data = category::get();
        return view("/PlantNest_Admin.plant1",compact('data'));
    }
    public function insertpost(Request $req)
    {
        // $flowering_plantmodel = flowering_plantmodel::get();
        $flowering_plantmodel = new flowering_plantmodel();
        $flowering_plantmodel->name = $req->name;
        $flowering_plantmodel->description = $req->description;
        $flowering_plantmodel->price = $req->price;
        $flowering_plantmodel->quantity = $req->quantity;
        $flowering_plantmodel->plant_genes = $req->plant_genes; 
        $flowering_plantmodel->categories_id = $req->category_name;                                                 
        $image = $req->file('plantimage');
        $ext = rand() . "." . $image->getClientOriginalName();
        $image->move('images/', $ext);
        $flowering_plantmodel->image = $ext;
        $flowering_plantmodel->save();
        return redirect()->back()->with("productsuccess","Product has been inserted");
    }

    public function plant1fetch()
    {
        $plant1 = flowering_plantmodel::all();
        return view("PlantNest_Admin.fetchplant1",compact("plant1"));
    }

    public function plant1delete($id){
        $plant1 = flowering_plantmodel::find($id);
        $plant1->delete();
        return redirect()->back()->with("productdelete","Data has been Deleted");
    }

    public function EditCategory($id){
        $update = flowering_plantmodel::find($id);
        return view("PlantNest_Admin.editplant",compact('update'));
    }

    public function editfunctionpost(Request $req, $id)
    {
        $update = flowering_plantmodel::find($id);
        $update->name=$req->updatename;
        $update->description=$req->updateprice;
        $update->price=$req->updatedescription;
        $update->quantity=$req->updatequantity;
        $update->plant_genes=$req->updateplant_genes;
        $image = $req->file('updateplantimage');
        $ext = rand() . "." . $image->getClientOriginalName();
        $image->move('images/', $ext);
        $update->image = $ext;
        $update->update();
        return redirect("/fetchplant_1")->with("productupdate" ,"Data hase been Updated");

    }
}
