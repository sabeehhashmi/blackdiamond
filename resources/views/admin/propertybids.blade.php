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
                <h3 class="box-title">Property Bids</h3>

                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">#</th>
                                <th class="border-top-0">Bid Title</th>
                                <th class="border-top-0">Bid Offer</th>
                                <th class="border-top-0">Start Price</th>
                                <th class="border-top-0">Status</th>
                                <th class="border-top-0">Buyer</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $counter = 1;
                            $status = [
                            1=>'Accepted',
                            2=>'Pending',
                            3=>'Rejected'
                            ]
                            @endphp
                            @if($property->bids->first())
                            @foreach($property->bids as $property_bid)
                            <tr>
                                <td>{{$counter}}</td>
                                <td>
                                    {{$property_bid->title}}
                                </td>
                                <td>
                                    {{$property_bid->offer_description}}
                                </td>
                                <td>{{$property_bid->start_price}}</td>
                                <td>{{$status[$property_bid->status]}}</td>
                                <td>
                                    <a href="/admin/get-buyer/{{$property_bid->user_id}}" target="_blank" class="btn btn-success text-white">
                                        Buyer Detail
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
