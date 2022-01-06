@extends('admin.layouts.app')

@section('content')
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
         <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <a href="/dashboard" class="fw-normal"><h4 class="page-title">Dashboard</h4></a>
        </div>
        
    </div>

</div>



<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material" _lpchecked="1" action="/admin/savecategory" method="POST">
                                     @csrf
                                     <input type="hidden" name="id" value="{{isset($category->id)?$category->id:''}}">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Categor Name</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" placeholder="Category Name" class="form-control p-0 border-0" name="name"  value="{{isset($category->name)?$category->name:''}}"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Categor Slug</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" placeholder="Category Slug" class="form-control p-0 border-0" name="slug"  value="{{isset($category->slug)?$category->slug:''}}"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        <div></div></div>
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
