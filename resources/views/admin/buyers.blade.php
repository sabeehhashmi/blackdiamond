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
                <h3 class="box-title">Buyers</h3>

                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">#</th>
                                <th class="border-top-0">Name</th>
                                <th class="border-top-0">Email</th>
                                <th class="border-top-0">Phone</th>
                                <th class="border-top-0">Bids</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $counter = 1;
                            @endphp
                            @foreach($buyers as $buyer)
                            <tr>
                                <td>{{$counter}}</td>
                                <td>{{$buyer->name}}</td>
                                <td>{{$buyer->email}}</td>
                                <td>{{$buyer->phone}}</td>

                                <td>
                                    <a href="/admin/buyer-bids/{{$buyer->id}}" target="_blank" class="btn btn-success text-white">
                                        {{$buyer->bids->count()}} 
                                    </a> 
                                </td>
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
    
</div>
@endsection
