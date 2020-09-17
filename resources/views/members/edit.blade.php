
@extends('layouts.master')

@section('title', 'Edit Member')

@section('content')

    <div class='col-lg-8 col-lg-offset-4'>

        <h2><i class='fa fa-user-plus'></i>Edit Member
        <a href="{{ url()->previous() }}" class="btn btn-light pull-right">Back</a></h2>
        <hr>

        {!! Form::open(array('route'=> ['members.update', $member->id],'method'=>'PUT', 'class'=>'form-horizontal', 'files'=>true)) !!}

        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('date', 'Date of Membership') }}</div>
            <div class="col-md-8"> {{ Form::date('membership_date', $member->membership_date, array('class' => 'form-control', 'required')) }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('name', 'Name') }}</div>
            <div class="col-md-8"> {{ Form::text('name', $member->name, array('class' => 'form-control', 'required')) }}</div>
        </div>


        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('designation', 'Designation') }}</div>
            <div class="col-md-8"> {{ Form::select('designation', array(
        'Chairman '=> 'Chairman',
        'Vice Chairperson '=> 'Vice Chairperson',
        'General Secretary '=> 'General Secretary',
        'Director '=> 'Director',
        'General Member' => 'General Member',
        'Associate Member' => 'Associate Member',
        'Assistant Member' => 'Assistant Member',
        'TF member' => 'TF member',
        'Volunteer' => 'Volunteer',

        ),$member->designation, array('class' => 'form-control', 'required')) }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('mobile', 'Mobile No') }}</div>
            <div class="col-md-8"> {{ Form::text('mobile', $member->mobile, array('class' => 'form-control')) }}</div>
        </div>


        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('email', 'Email') }}</div>
            <div class="col-md-8"> {{ Form::text('email', $member->email, array('class' => 'form-control')) }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('nid', 'NID') }}</div>
            <div class="col-md-8"> {{ Form::number('nid', $member->nid, array('class' => 'form-control')) }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('dob', 'Date of Birth') }}</div>
            <div class="col-md-8"> {{ Form::date('dob', $member->dob, array('class' => 'form-control')) }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('tin', 'TIN') }}</div>
            <div class="col-md-8"> {{ Form::text('tin', $member->tin, array('class' => 'form-control')) }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('occupation', 'Occupation') }}</div>
            <div class="col-md-8"> {{ Form::text('occupation', $member->occupation, array('class' => 'form-control')) }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('org_name', 'Organization name') }}</div>
            <div class="col-md-8"> {{ Form::text('org_name', $member->org_name, array('class' => 'form-control')) }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('education', 'Educational Qualification') }}</div>
            <div class="col-md-8"> {{ Form::text('education', $member->education, array('class' => 'form-control')) }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('address', 'Address') }}</div>
            <div class="col-md-8"> {{ Form::text('address', $member->address, array('class' => 'form-control')) }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('remarks', 'Remarks') }}</div>
            <div class="col-md-8"> {{ Form::text('remarks', $member->remarks, array('class' => 'form-control')) }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('photo', 'Photo') }}</div>
            <div class="col-md-8"> {{ Form::file('photo') }}

                @if($errors->has('photo'))
                    <span class="help-block" style="display:block">
          <strong>{{ $errors->first('photo') }}</strong>
                   </span>
                @endif
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-4"><img src='{{url("uploads/$member->photo")}}' alt="" width="50px" height="70px"></div>
            <div class="col-md-8">
                {{ Form::reset('Restore', array('class'=> 'btn btn-warning')) }}
                {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}</div>
        </div>



        {!! Form::close() !!}

    </div>

@endsection