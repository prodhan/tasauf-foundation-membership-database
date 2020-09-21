<!-- Created by Ariful Islam at 09/17/2020 - 9:33 AM -->
@extends('layouts.master')

@section('title', 'Reports')

@section('content')
    <div class="col-lg-12 col-lg-offset-1">
@can('report menu')
    <h2><i class="fa fa-calculator"></i> Membership fees Collection Report</h2>

    {!! Form::open(array('url'=> 'reports-bydate', 'class'=>'form-horizontal', 'target'=>'_blank')) !!}

    <div class="row form-horizontal">

        <div class="col-md-3">
            <label for="">From Date</label>
            {{ Form::date('from_date', \Carbon\Carbon::today(), array('class' => 'form-control')) }}
        </div>
        <div class="col-md-3">
            <label for="">To Date</label>
            {{ Form::date('to_date', \Carbon\Carbon::today(), array('class' => 'form-control')) }}
        </div>

        <div class="col-md-4">
            <label for="">Member (optional)</label>
            {{ Form::select('member_id', $members,null, array('class'=>'form-control', 'placeholder'=>'Select One')) }}
        </div>
        
        <div class="col-md-2">
            <label for="" class="pull-right">Click to search</label>
            {{ Form::submit('Search', array('class' => 'btn btn-primary  pull-right')) }}
            {!! Form::close() !!}
        </div>
    </div>
        <hr>

        <h2><i class="fa fa-calculator"></i> Membership fees Collection Yearly Report</h2>

        {!! Form::open(array('url'=> 'reports-byyear', 'class'=>'form-horizontal', 'target'=>'_blank')) !!}

        <div class="row form-horizontal">

            <div class="col-md-3">
                <label for="">From Year</label>
                {{ Form::selectYear('from_year', 2010,2025,date('Y'), array('class' => 'form-control')) }}
            </div>
            <div class="col-md-3">
                <label for="">To Year</label>
                {{ Form::selectYear('to_year', 2010,2025,date('Y'), array('class' => 'form-control')) }}
            </div>

            <div class="col-md-4">
                <label for="">Member (optional)</label>
                {{ Form::select('member_id', $members,null, array('class'=>'form-control', 'placeholder'=>'Select One')) }}
            </div>

            <div class="col-md-2">
                <label for="" class="pull-right">Click to search</label>
                {{ Form::submit('Search', array('class' => 'btn btn-primary  pull-right')) }}
            </div>
            {!! Form::close() !!}
        </div>

        <hr>

        <h2><i class="fa fa-calculator"></i> Membership Report</h2>

        {!! Form::open(array('url'=> 'reports-by-member', 'class'=>'form-horizontal', 'target'=>'_blank')) !!}

        <div class="row form-horizontal">

            <div class="col-md-3">
                <label for="">From Date</label>
                {{ Form::date('from_date', \Carbon\Carbon::today(), array('class' => 'form-control')) }}
            </div>
            <div class="col-md-3">
                <label for="">To Date</label>
                {{ Form::date('to_date', \Carbon\Carbon::today(), array('class' => 'form-control')) }}
            </div>

            <div class="col-md-4">
                <label for="">Designation</label>
                {{ Form::select('designation', array(
        null=> 'Select',
        'Chairman'=> 'Chairman',
        'Vice Chairperson'=> 'Vice Chairperson',
        'General Secretary'=> 'General Secretary',
        'Director'=> 'Director',
        'General Member' => 'General Member',
        'Associate Member' => 'Associate Member',
        'Assistant Member' => 'Assistant Member',
        'TF member' => 'TF member',
        'Volunteer' => 'Volunteer',

        ),null, array('class' => 'form-control')) }}
            </div>

            <div class="col-md-2">
                <label for="" class="pull-right">Click to search</label>
                {{ Form::submit('Search', array('class' => 'btn btn-primary  pull-right')) }}
                {!! Form::close() !!}
            </div>
        </div>

    <hr>

    <h2><i class="fa fa-users"></i> Monthly Membership Report</h2>

    {!! Form::open(array('url'=> 'reports-by-month', 'class'=>'form-horizontal', 'target'=>'_blank')) !!}

    <div class="row form-horizontal">

        <div class="col-md-3">
            <label for="">Select Month</label>
        </div>
        <div class="col-md-3">
            {{ Form::selectMonth('month', \Carbon\Carbon::now(), array('class' => 'form-control')) }}
        </div>
        <div class="col-md-4">
            {{ Form::selectYear('year', 2010,2025,date('Y'), array('class' => 'form-control')) }}
        </div>


        <div class="col-md-2">

            {{ Form::submit('Search', array('class' => 'btn btn-primary  pull-right')) }}
            {!! Form::close() !!}
        </div>
    </div>

        <hr>

        <h2><i class="fa fa-users"></i> Print All Membership Report <a href="{{url('get-all-members')}}" target="_blank" class="btn btn-outline-primary"> <i class="fa fa-print"></i> Print</a> </h2>


@endcan
    </div>

@endsection
@section('custom-js')
    <script>
        $(document).ready(function () {
            $('#bills').DataTable();
        });


    </script>


@endsection