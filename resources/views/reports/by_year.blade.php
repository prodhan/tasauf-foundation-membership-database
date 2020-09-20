@extends('layouts.print_master')
@section('main-content')
    @php
    function check_empty($data){
    if($data === null)
        return 'Due';
    else
        return $data;
    }
    @endphp
    <h2 align="center">Tasauf Foundation</h2>
    <p align="center">House #354, (2nd Floor), Road # 27, Mohakhali DOHS, Dhaka, 1206</p>
    <h4 align="center">Membership fees Collection Yearly Report:</h4>
    <hr>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>SL</th>
            <th>ID</th>
            <th>Year</th>
            <th>Name</th>
            <th>Designation</th>
            <th>Jan</th>
            <th>Feb</th>
            <th>March</th>
            <th>April</th>
            <th>May</th>
            <th>June</th>
            <th>July</th>
            <th>Aug</th>
            <th>Sept</th>
            <th>Oct</th>
            <th>Nov</th>
            <th>Dec</th>
            <th>Remarks</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($collections as $collection)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{ $collection->member_id }}</td>
                <td>{{ $collection->year }}</td>
                <td>{{ $collection->member->name }}</td>
                <td>{{ $collection->member->designation }}</td>
                <td>{{ check_empty($collection->jan) }}</td>
                <td>{{ check_empty($collection->feb) }}</td>
                <td>{{ check_empty($collection->march) }}</td>
                <td>{{ check_empty($collection->april) }}</td>
                <td>{{ check_empty($collection->may) }}</td>
                <td>{{ check_empty($collection->jun) }}</td>
                <td>{{ check_empty($collection->july) }}</td>
                <td>{{ check_empty($collection->aug) }}</td>
                <td>{{ check_empty($collection->sept) }}</td>
                <td>{{ check_empty($collection->oct) }}</td>
                <td>{{ check_empty($collection->nov) }}</td>
                <td>{{ check_empty($collection->dec) }}</td>
                <td>&nbsp;</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection