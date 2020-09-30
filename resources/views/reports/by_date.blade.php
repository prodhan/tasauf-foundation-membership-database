@extends('layouts.print_master')
@section('main-content')
    @php($total = 0)
    @php($bank = 0)
    <h2 align="center">Tasauf Foundation</h2>
    <p align="center">House #354, (2nd Floor), Road # 27, Mohakhali DOHS, Dhaka, 1206</p>
    <h4 align="center">Membership fees Collection Report: From {{$from_date}} To {{$to_date}} <button id="exporttable" class="btn-sm btn-primary"> Export</button></h4>
    <hr>
    <table class="table table-bordered table-striped" id="htmltable">
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
                @php($total += $collection->amount)
                @if($collection->method == 'Bank')
                    @php($bank += $collection->amount)
                @endif

            </tr>
        @endforeach
        <tr class="text-right">
            <td colspan="5">Total Amount</td>
            <td>{{$total}}</td>
            <td></td>
        </tr>
        <tr class="text-right">
            <td colspan="5">Total Amount in Bank</td>
            <td>{{$bank}}</td>
            <td></td>
        </tr>
        <tr class="text-right">
            <td colspan="5">Total Amount in Cash</td>
            <td>{{$total - $bank}}</td>
            <td></td>
        </tr>
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
                        name: "Membership fees Collection Report",
                        filename: "Collection_report" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls",
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