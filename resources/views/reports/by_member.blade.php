@extends('layouts.print_master')
@section('main-content')
    <h2 align="center">Tasauf Foundation</h2>
    <p align="center">House #354, (2nd Floor), Road # 27, Mohakhali DOHS, Dhaka, 1206</p>
    <h4 align="center">Membership Report: @isset($from_date) From {{$from_date}}@endisset @isset($to_date) To {{$to_date}} @endisset @isset($month) {{ date("F", mktime(0, 0, 0, $month, 1)) }} @endisset @isset($year) - {{$year}} @endisset <button id="exporttable" class="btn-sm btn-primary"> Export</button> </h4>
    <hr>
    <table class="table table-bordered table-striped" id="htmltable">
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
@section('custom-js')
    <script src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569818907/jquery.table2excel.min.js"></script>
    <script>
        $(function() {
            $("#exporttable").click(function(e){
                var table = $("#htmltable");
                if(table && table.length){
                    $(table).table2excel({
                        exclude: ".noExl",
                        name: "Membership Report",
                        filename: "Membership_Report" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls",
                        fileext: ".xls",
                        exclude_img: true,
                        exclude_links: true,
                        exclude_inputs: true,
                        preserveColors: false
                    });
                }
            });

        });
    </script>
@endsection