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
                    <form class="form-horizontal form-material" _lpchecked="1" action="/admin/save-setting" method="POST">
                     @csrf
                     @if($settings->first())

                     @foreach($settings as $setting)

                     <h4 class="page-title setting-heading">
                        @if($setting->name == 'STRIPE_API_KEY')
                        Stripe
                        @elseif($setting->name == 'free_bids')
                        Free Bids
                        @elseif($setting->name == 'ceo_message')
                        CEO Message
                        @endif
                    </h4>

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
