@extends('admin.layouts.app')

@section('content')
<style type="text/css">
    .rounded.mx-auto.d-block {
    max-width: 100%;
    padding: 10px;
}
</style>
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
                        <div class="row">
                             <div class="col-sm-10">
                             </div>
                            <div class="col-sm-2">
                                <a href="/admin/property-bids/{{$perperty->id}}" target="_blank" class="btn btn-success text-white">
                                    <h6>{{$perperty->bids->count()}} Bids</h6></a>
                                </div>
                       
                                    <div class="col-md-6">
                        <div class="form-group mb-4">

                                <label class="col-md-12 p-0">Name</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" placeholder="Category Name" class="form-control p-0 border-0" name="name"  value="{{isset($perperty->name)?$perperty->name:''}}" readonly> </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Status</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" placeholder="Category Slug" class="form-control p-0 border-0" name="slug"  value="{{($perperty->status == 1)?'Rent ':'Sale'}}" readonly> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Price</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" placeholder="Category Slug" class="form-control p-0 border-0" name="slug"  value="{{$perperty->price}}" readonly> </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="col-md-12 p-0">Area Covered</label>
                                            <div class="col-md-12 border-bottom p-0">
                                                <input type="text" placeholder="Category Slug" class="form-control p-0 border-0" name="slug"  value="{{$perperty->area}} sqrft" readonly> </div>
                                            </div>

                                            <div class="form-group mb-4">
                                                <label class="col-md-12 p-0">Property</label>
                                                <div class="col-md-12 border-bottom p-0">
                                                    <input type="text" placeholder="Category Slug" class="form-control p-0 border-0" name="slug"  value="{{($perperty->property == 1)?'Occupied ':'Vacant'}}" readonly> </div>
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label class="col-md-12 p-0">Address</label>
                                                    <div class="col-md-12 border-bottom p-0">
                                                        <input type="text" placeholder="Category Slug" class="form-control p-0 border-0" name="slug"  value="{{$perperty->address}}" readonly> </div>
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label class="col-md-12 p-0">City</label>
                                                        <div class="col-md-12 border-bottom p-0">
                                                            <input type="text" placeholder="Category Slug" class="form-control p-0 border-0" name="slug"  value="{{$perperty->city}}" readonly> </div>
                                                        </div>
                                                        <div class="form-group mb-4">
                                                            <label class="col-md-12 p-0">State</label>
                                                            <div class="col-md-12 border-bottom p-0">
                                                                <input type="text" placeholder="Category Slug" class="form-control p-0 border-0" name="slug"  value="{{$perperty->state}}" readonly> </div>
                                                            </div>
                                                            <div class="form-group mb-4">
                                                                <label class="col-md-12 p-0">zipcode</label>
                                                                <div class="col-md-12 border-bottom p-0">
                                                                    <input type="text" placeholder="Category Slug" class="form-control p-0 border-0" name="slug"  value="{{$perperty->zipcode}}" readonly> </div>
                                                                </div>
                                                                <div class="form-group mb-4">
                                                                    <label class="col-md-12 p-0">Detail Information</label>
                                                                    <div class="col-md-12 border-bottom p-0">
                                                                        <textarea class="form-control p-0 border-0">{{$perperty->detail_information}}</textarea>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 propert-images"> 
                                                                <div class="form-group mb-4">
                                                                    
                                                                    @if($perperty->images->first())
                                                                    <div class="row"> 
                                                                    @foreach($perperty->images as $image)
                                                                    <div class="col-md-6 border-bottom p-0">
                                                                        <a href="{{$image->path}}">
                                                                    <img src="{{$image->path}}" class="rounded mx-auto d-block" alt="property image">
                                                                    </a>
                                                                </div>
                                                                    @endforeach
                                                                </div>
                                                                    @endif

                                                                </div>
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
