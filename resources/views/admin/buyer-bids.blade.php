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
                <h3 class="box-title">Buyer Bids</h3>

                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">#</th>
                                <th class="border-top-0">Bid Title</th>
                                <th class="border-top-0">Bid Offer</th>
                                <th class="border-top-0">Property</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $counter = 1;
                            @endphp
                            @foreach($buyer_bids as $buyer_bid)
                            <tr>
                                <td>{{$counter}}</td>
                                <td>{{$buyer_bid->title}}</td>
                                <td>{{$buyer_bid->offer_description}}</td>
                                <td>
                                    <a href="/admin/get-property/{{$buyer_bid->property_id}}" target="_blank" class="btn btn-success text-white">
                                        Property Details
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
