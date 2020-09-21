@extends('layouts.print_master')
@section('main-content')
    <div class="col-lg-12">

@php($c=1)

        <h2 align="center"><img src="{{asset('admin/images/logo-pi.png')}}" alt="homepage" class="dark-logo" /> Tasauf Foundation</h2>
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
                <td colspan="2" align="right">Total: {{ucwords(to_word($data->amount))}} Taka Only</td>
                <td>{{$data->amount}}/-</td>
            </tr>
            </tbody>
        </table>

        <br>
        <br>
        <div class="row">
            <div class="col-md-4 pull-left"><p>Prepared By {{\Illuminate\Support\Facades\Auth::user()->name}} </p></div>
            <div class="col-md-4 text-center"><p>Checked By </p></div>
            <div class="col-md-4 pull-right">
                <p align="right">Authorised By <img src="{{asset('admin/images/signature.png')}}" alt="homepage" width="100px" height="40px" /></p>
            </div>
        </div>





    </div>



@endsection
