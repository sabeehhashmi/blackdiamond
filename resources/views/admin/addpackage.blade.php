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
                    <form class="form-horizontal form-material" _lpchecked="1" action="/admin/savepackage" method="POST">
                       @csrf
                       <input type="hidden" name="id" value="{{isset($package->id)?$package->id:''}}">
                       <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Package Name</label>
                        <div class="col-md-12 border-bottom p-0">
                            <input type="text"  class="form-control p-0 border-0" name="name"  value="{{isset($package->name)?$package->name:''}}"> </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Number of Bids</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text"  class="form-control p-0 border-0" name="bids"  value="{{isset($package->bids)?$package->bids:''}}"> </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Package Price</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text"  class="form-control p-0 border-0" name="price"  value="{{isset($package->price)?$package->price:''}}"> </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Package Cycle</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <select class="form-select" name="cycle" aria-label="Default select example">
                                          <option value="month" {{isset($package->cycle) && $package->cycle == 'month'?'selected':''}}>Monthly</option>
                                          <option value="year" {{isset($package->cycle) && $package->cycle == 'year'?'selected':''}}>Yearly</option>

                                      </select>
                                      </div>
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
