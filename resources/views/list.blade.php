@extends('welcome')
@section('title')
    <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">User</a></li>
        <li class="breadcrumb-item active" aria-current="page">Clients List</li>
    </ol>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>All Registered Clients</h5>
                </div>
                <div class="card-body">
                    @include('/includes/filter/filter_status')
                    <div class="table-responsive">
                        <table id="user_table" class="table table-hover">
                            <thead>
                                <tr>
                                    <th data-id="ID">ID</th>
                                    <th data-id="Year" class="d-none d-lg-table-cell">Year</th>
                                    <th data-id="Client_ID">Client ID</th>
                                    <th data-id="Name">Name</th>
                                    <th data-id="Address" class="d-none d-lg-table-cell">Address 1</th>
                                    <th data-id="Address" class="d-none d-xl-table-cell">Address 2</th>
                                    <th data-id="City" class="d-none d-xl-table-cell">City</th>
                                    <th data-id="State" class="d-none d-xl-table-cell">State</th>
                                    <th data-id="Zip" class="d-none d-xxl-table-cell">Zip</th>
                                    <th data-id="Country" class="d-none d-md-table-cell">Country</th>
                                    <th data-id="Created_Date" class="d-none d-xxl-table-cell">Created Date</th>
                                </tr>
                            </thead>
                            <tbody id="user_body">
                                @foreach($clients as $client)
                                    <tr>
                                        <td class="d-table-cell">{{ $client->id }}</td>
                                        <td class="d-none d-lg-table-cell">{{ $client->year }}</td>
                                        <td class="d-table-cell">{{ $client->client_id }}</td>
                                        <td class="d-table-cell" style="max-width: 215px;">{{ $client->name }}</td>
                                        <td class="d-none d-lg-table-cell">{{ $client->address_1 }}</td>
                                        <td class="d-none d-xl-table-cell">{{ $client->address_2 }}</td>
                                        <td class="d-none d-xl-table-cell">{{ $client->city }}</td>
                                        <td class="d-none d-xl-table-cell" style="min-width: 75px;">{{ $client->state }}</td>
                                        <td class="d-none d-xxl-table-cell">{{ $client->zip }}</td>
                                        <td class="d-none d-md-table-cell">{{ $client->country }}</td>
                                        <td class="d-none d-xxl-table-cell">{{ $client->created_date }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>  
        </div>  
    </div>
</div>
@endsection
@extends('/includes/filtercanvas')
@section('canvas-title')
Filters
@endsection
@section('canvas-body')
    @include('/filters')
@endsection