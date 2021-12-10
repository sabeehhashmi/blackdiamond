@extends('admin.layouts.app')

@section('content')
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Dashboard</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <div class="d-md-flex">
                <ol class="breadcrumb ms-auto">
                    <li><a href="#" class="fw-normal">Dashboard</a></li>
                </ol>

            </div>
        </div>
    </div>

</div>



<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Categories</h3>
                <a href="/admin/category/" target="_blank" class="btn btn-info text-white">
                                <h4>Add New Category</h4></a>
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">#</th>
                                <th class="border-top-0">Name</th>
                                <th class="border-top-0">Slug</th>
                                <th class="border-top-0">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $counter = 1;
                            @endphp
                            @foreach($allcategories as $category)
                            <tr>
                                <td>{{$counter}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->slug}}</td>

                                <td><a href="/admin/category/{{$category->id}}" target="_blank" class="btn btn-success text-white">
                                Update <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
</a> <a href="/admin/deletecategory/{{$category->id}}" target="_blank" class="btn btn-danger text-white">
                                Delete</a></td>
                            </tr>
                            @php
                            $counter++;
                            @endphp
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
</div>
@endsection
