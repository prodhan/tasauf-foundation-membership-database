@extends('layouts.print_master')
@section('main-content')
    <h2 align="center">Tasauf Foundation</h2>
    <p align="center">House #354, (2nd Floor), Road # 27, Mohakhali DOHS, Dhaka, 1206</p>
    <h4 align="center">Membership fees Collection Report:</h4>
    <hr>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>SL</th>
            <th>Date</th>
            <th>Name</th>
            <th>Designation</th>
            <th>Purpose</th>
            <th>Amount</th>
            <th>Method</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($collections as $collection)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{ $collection->date }}</td>
                <td>{{ $collection->member->name }}</td>
                <td>{{ $collection->member->designation }}</td>
                <td>{{ date('F', mktime(0, 0, 0, $collection->month, 10)) }} - {{$collection->year}}  {{$collection->head}}</td>
                <td>{{ $collection->amount }}</td>
                <td>{{ $collection->method }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection