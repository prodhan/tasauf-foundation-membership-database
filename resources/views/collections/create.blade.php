@extends('layouts.master')

@section('title', 'Add Collection')

@section('content')

    <div class='col-lg-6 col-lg-offset-4'>

        <h2><i class='fa fa-pencil'></i> Add Collection
            <a href="{{ url()->previous() }}" class="btn btn-light pull-right">Back</a></h2>
        <hr>

        {!! Form::open(array('route'=> 'collections.store', 'class'=>'form-horizontal', 'files'=>true)) !!}

        <div class="row form-group">
            <div class="col-md-6">{{ Form::label('name', 'Member\'s Name') }}</div>
            <div class="col-md-6"> {{$member->name}}</div>
        </div>
        <div class="row form-group">
            <div class="col-md-6">{{ Form::label('designation', 'Designation') }}</div>
            <div class="col-md-6"> {{$member->designation}}</div>
        </div>


        <div class="row form-group">
            <div class="col-md-6">{{ Form::label('Date', 'Date of receipts') }}</div>
            <div class="col-md-6"> {{ Form::date('date', \Carbon\Carbon::today(), array('class' => 'form-control', 'required')) }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-6">{{ Form::label('month', 'Month') }}</div>
            <div class="col-md-6"> {{ Form::selectMonth('month', null, array('class' => 'form-control', 'required')) }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-6">{{ Form::label('year', 'Year') }}</div>
            <div class="col-md-6"> {{ Form::selectYear('year', 2010, 2025,date('Y'), array('class' => 'form-control')) }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-6">{{ Form::label('method', 'Method') }}</div>
            <div class="col-md-6"> {{ Form::select('method', ['Cash'=>'Cash', 'Bank'=>'Bank'],null, array('class' => 'form-control')) }}</div>
        </div>


        <div class="row form-group">
            <div class="col-md-6">{{ Form::label('amount', 'Amount') }}</div>
            <div class="col-md-6"> {{ Form::number('amount', '', array('class' => 'form-control', 'required')) }}</div>
        </div>


        <div class="row form-group">
            <div class="col-md-6">{{ Form::label('method', 'Account head') }}</div>
            <div class="col-md-6"> {{ Form::select('head', ['Subscription'=>'Subscription', 'Donation'=>'Donation'],null, array('class' => 'form-control')) }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-6">{{ Form::label('remarks', 'Remarks') }}</div>
            <div class="col-md-6"> {{ Form::text('remarks', '', array('class' => 'form-control')) }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-6">
                {{ Form::hidden('member_id', $member->id) }}
                {{ Form::hidden('user_id', \Illuminate\Support\Facades\Auth::id()) }}
                <p style="color:darkgreen">Print Invoice?
                {{ Form::checkbox('invoice', 1, false) }} </p>
{{--                {{ Form::hidden('refer_by', $patient->refer_by) }}--}}
            </div>
            <div class="col-md-6">

                {{ Form::reset('Clear', array('class'=> 'btn btn-warning')) }}
                {{ Form::submit('Make Collection', array('class' => 'btn btn-primary')) }}</div>
        </div>

        {!! Form::close() !!}

    </div>

@endsection