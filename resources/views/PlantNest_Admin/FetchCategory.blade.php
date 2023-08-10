@extends("PlantNest_admin.AdminLayout")

@section("title2")
Fetch Category
@endsection

@section("content")

<div class="col-md-12">
<div class="panel panel-white">
<div class="panel-heading clearfix">
    <h4 class="panel-title">All Categories</h4>
    </div>
    <div class="panel-body">

    <a href="/category"><button class="btn btn-success"><strong>Add New Category</strong></button></a>

    @if(session('updatesuccess'))
    <div class="alert alert-primary" role="alert">
    <strong>{{session('updatesuccess')}}</strong>
    </div>
    @endif

    @if(session('delete'))
    <div class="alert alert-primary" role="alert">
    <strong>{{session('delete')}}</strong>
    </div>
    @endif

        <div class="table-responsive">
        <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
            <thead>
                <tr>
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th>Category Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $cat)
                <tr>
                    <td>{{$cat->id}}</td>
                    <td>{{$cat->category_name}}</td>
                    <td>{{$cat->category_type}}</td>
                    <td><a href="/editcategory/{{$cat->id}}"><i class="fa fa-edit" aria-hidden="true"></i></a> <a href="/deletecategory/{{$cat->id}}"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                @endforeach
            </tbody>
            </table>  
        </div>
    </div>
</div>

@endsection