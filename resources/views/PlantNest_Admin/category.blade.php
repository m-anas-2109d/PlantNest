@extends("PlantNest_admin.AdminLayout")

@section("title2")
Categories
@endsection

@section("content")

<div class="page-title">
    <h3>Form Elements</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Add Category</li>
        </ol><br>
        <a href="/fetchcategory"><i class="fa fa-arrow-left" aria-hidden="true"> Back to List</i></a>
    </div>
    
    @if(session('success'))
    <div class="alert alert-primary" role="alert">
    <strong>{{session('success')}}</strong>
    </div>
    @endif

</div>
                

<div class="row">
<div class="col-md-6 col-lg-12">
    <div class="panel panel-white">
        <div class="panel-heading clearfix">
            <h4 class="panel-title">Categories</h4>
        </div>
        <div class="panel-body">
            <form method="POST" action="{{URL::to('/categorypost')}}">
            @csrf
                <div class="form-groupe">
                    <label for="exampleInputEmail1">Category ID</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" name="idinput">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Category Name</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="catnameinput">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Category Type</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="cattypeinput">
                </div>
                <button type="submit" class="btn btn-primary">Add Category</button>
            </form>
        </div>
    </div>
</div>


@endsection
