{{-- \resources\views\users\create.blade.php --}}
@extends('layouts.master')

@section('title', 'Add Member')

@section('content')

    <div class='col-lg-8 col-lg-offset-4'>

        <h2><i class='fa fa-user-plus'></i> Add Member
            <a href="{{ url()->previous() }}" class="btn btn-light pull-right">Back</a></h2>
        <hr>

        {!! Form::open(array('route'=> 'members.store', 'class'=>'form-horizontal', 'files'=>true)) !!}

        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('date', 'Date of Membership') }}</div>
            <div class="col-md-8"> {{ Form::date('membership_date', \Carbon\Carbon::today(), array('class' => 'form-control', 'required')) }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('name', 'Name') }}</div>
            <div class="col-md-8"> {{ Form::text('name', '', array('class' => 'form-control', 'required')) }}</div>
        </div>


        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('designation', 'Designation') }}</div>
            <div class="col-md-8"> {{ Form::select('designation', array(
        'Chairman'=> 'Chairman',
        'Vice Chairperson'=> 'Vice Chairperson',
        'General Secretary'=> 'General Secretary',
        'Director'=> 'Director',
        'General Member' => 'General Member',
        'Associate Member' => 'Associate Member',
        'Assistant Member' => 'Assistant Member',
        'TF member' => 'TF member',
        'Volunteer' => 'Volunteer',

        ),'Director', array('class' => 'form-control', 'required')) }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('mobile', 'Mobile No') }}</div>
            <div class="col-md-8"> {{ Form::text('mobile', '', array('class' => 'form-control')) }}</div>
        </div>


        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('email', 'Email') }}</div>
            <div class="col-md-8"> {{ Form::text('email', '', array('class' => 'form-control')) }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('nid', 'NID') }}</div>
            <div class="col-md-8"> {{ Form::number('nid', '', array('class' => 'form-control')) }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('dob', 'Date of Birth') }}</div>
            <div class="col-md-8"> {{ Form::date('dob', '', array('class' => 'form-control')) }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('tin', 'TIN') }}</div>
            <div class="col-md-8"> {{ Form::text('tin', '', array('class' => 'form-control')) }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('occupation', 'Occupation') }}</div>
            <div class="col-md-8"> {{ Form::text('occupation', '', array('class' => 'form-control')) }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('org_name', 'Organization name') }}</div>
            <div class="col-md-8"> {{ Form::text('org_name', '', array('class' => 'form-control')) }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('education', 'Educational Qualification') }}</div>
            <div class="col-md-8"> {{ Form::text('education', '', array('class' => 'form-control')) }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('address', 'Address') }}</div>
            <div class="col-md-8"> {{ Form::text('address', '', array('class' => 'form-control')) }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('remarks', 'Remarks') }}</div>
            <div class="col-md-8"> {{ Form::text('remarks', '', array('class' => 'form-control')) }}</div>
        </div>


        <div class="row form-group">
            <div class="col-md-4">{{ Form::label('photo', 'Photo') }}</div>
            <div class="col-md-8">
                <span class="btn btn-default btn-file">{{ Form::file('photo', array('class'=>'btn btn-default btn-file')) }}

                    @if($errors->has('photo'))
                        <span class="help-block" style="display:block">
          <strong>{{ $errors->first('photo') }}</strong>
                   </span>
                @endif
            </div>
        </div>


        <div class="row form-group">
            <div class="col-md-4"></div>
            <div class="col-md-8">
                {{ Form::reset('Clear', array('class'=> 'btn btn-warning')) }}
                {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}</div>
        </div>

        {!! Form::close() !!}

    </div>

@endsection