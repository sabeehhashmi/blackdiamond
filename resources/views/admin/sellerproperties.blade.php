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

    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Seller Properties</h3>

                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">#</th>
                                <th class="border-top-0">Name</th>
                                <th class="border-top-0">Price</th>
                                <th class="border-top-0">Address</th>
                                <th class="border-top-0">City</th>
                                <th class="border-top-0">Detail</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $counter = 1;
                            @endphp
                            @if($perperties->first())
                            @foreach($perperties as $perperty)
                            <tr>
                                <td>{{$counter}}</td>
                                <td>{{$perperty->name}}</td>
                                <td>{{$perperty->price}}</td>
                                <td>{{$perperty->address}}</td>
                                <td>{{$perperty->city}}</td>
                                <td>
                                    <a href="/admin/get-property/{{$perperty->id}}" target="_blank" class="btn btn-info text-white">
                                        Property Detail
                                    </a> 
                                </td>
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
