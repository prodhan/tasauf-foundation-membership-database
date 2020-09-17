@extends('layouts.print_master')
@section('main-content')
    <h2 align="center">Tasauf Foundation</h2>
    <p align="center">House #354, (2nd Floor), Road # 27, Mohakhali DOHS, Dhaka, 1206</p>
    <h4 align="center">Membership Report:</h4>
    <hr>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>SL</th>
            <th>Photo</th>
            <th>Date</th>
            <th>Name (ID)</th>
            <th>Designation</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Occupation</th>
            <th>Address</th>
            <th>Signature</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($members as $member)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td><img src='{{url("uploads/$member->photo")}}' class="img-thumbnail" alt="" width="60px" height="60px"></td>
                <td>{{ $member->membership_date }}</td>
                <td>{{ $member->name }} ({{$member->id}})</td>
                <td>{{ $member->designation }}</td>
                <td>{{ $member->mobile }}</td>
                <td>{{ $member->email }}</td>
                <td>{{ $member->occupation }}</td>
                <td>{{ $member->address }}</td>
                <td>&nbsp;</td>

            </tr>
        @endforeach
        </tbody>
    </table>

@endsection