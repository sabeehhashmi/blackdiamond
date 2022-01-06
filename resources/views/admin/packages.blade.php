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
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Packages</h3>
                <a href="/admin/package/" target="_blank" class="btn btn-success text-white">
                    <h6>Add New Package</h6></a>
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">#</th>
                                    <th class="border-top-0">Name</th>
                                    <th class="border-top-0">Bids</th>
                                    <th class="border-top-0">Price</th>
                                    <th class="border-top-0">Cycle</th>
                                    <th class="border-top-0">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $counter = 1;
                                @endphp
                                @if($packages->first())
                                @foreach($packages as $package)
                                <tr>
                                    <td>{{$counter}}</td>
                                    <td>{{$package->name}}</td>
                                    <td>{{$package->bids}}</td>
                                    <td>{{$package->price}}</td>
                                    <td>{{$package->cycle}}</td>

                                    <td><a href="/admin/package/{{$package->id}}" target="_blank" class="btn btn-success text-white">
                                        Update <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a> <a href="/admin/deletepackage/{{$package->id}}" target="_blank" class="btn btn-danger text-white">
                                    Delete</a></td>
                                </tr>
                                @php
                                $counter++;
                                @endphp
                                @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    @endsection
