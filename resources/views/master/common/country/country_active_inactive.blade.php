@section('css')
<link rel="stylesheet" href="{{ asset('css/master.css')}}">
@endsection
@extends('layouts.default')
@section('page')
<h2 class="inactive-countries-heading">Active Countries</h2>
<ul>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Id</th>
                <th>Code</th>
                <th>English Name</th>
                <th>Arabic Name</th>
            </tr>
        </thead>
        @foreach ($activeCountries as $country)
        <tr>
            <td>{{ $country->id }}</td>
            <td>{{ $country->code }}</td>
            <td>{{ $country->title }}</td>
            <td>{{ $country->title_ar }}</td>
        </tr>
        @endforeach
    </table>

</ul>


<h2 class="inactive-countries-heading">Inactive Countries</h2>
<ul>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Id</th>
                <th>Code</th>
                <th>English Name</th>
                <th>Arabic Name</th>
            </tr>
        </thead>
        @foreach ($inactiveCountries as $country)
        <tr>
            <td>{{ $country->id }}</td>
            <td>{{ $country->code }}</td>
            <td>{{ $country->title }}</td>
            <td>{{ $country->title_ar }}</td>
        </tr>
        @endforeach


    </table>
</ul>

@endsection