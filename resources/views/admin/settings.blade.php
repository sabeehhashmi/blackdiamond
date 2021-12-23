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
            <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material" _lpchecked="1" action="/admin/save-setting" method="POST">
                                     @csrf
                                     @if($settings->first())
                                   
                                        @foreach($settings as $setting)
                                         <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">{{$setting->name}}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" placeholder="Category Name" class="form-control p-0 border-0" name="{{$setting->name}}"  value="{{$setting->value}}"> </div>
                                            </div>
                                            
                                             @endforeach
                                    @endif
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
