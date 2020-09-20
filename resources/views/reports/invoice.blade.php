@extends('layouts.print_master')
@section('main-content')
    <div class="col-lg-12">

@php($c=1)

        <h2 align="center">Tasauf Foundation</h2>
        <p align="center">House #354, (2nd Floor), Road # 27, Mohakhali DOHS, Dhaka, 1206</p>
        <h4 align="center">Money Receipt</h4>
        <hr>
        <p align="center">Name: <b>{{$data->member->name}} (#{{$data->member->id}})</b> Designation : <b> {{$data->member->designation}} </b>| Date: <b>{{$data->date}} </b> Invoice # :  <b> {{$data->id}} </b> </p>


        <table class="table table-bordered">
            <thead>
            <tr>
                <th>SL</th>
                <th>Description</th>
                <th align="center">Amount</th>
             </tr>
            </thead>
            <tbody>

            <tr>
                <td>1</td>
                <td>{{ date('F', mktime(0, 0, 0, $data->month, 10)) }} - {{$data->year}}  {{$data->head}}</td>
                <td>{{$data->amount}}/-</td>
            </tr>


            <tr>
                <td colspan="2" align="right">Total</td>
                <td>{{$data->amount}}/-</td>
            </tr>
            </tbody>
        </table>

        <br>
        <br>
        <div class="row">
            <div class="col-md-6 pull-left"><p>Prepared By </p></div>
            <div class="col-md-6 pull-right"><p align="right">Authorised By</p></div>
        </div>





    </div>



@endsection
