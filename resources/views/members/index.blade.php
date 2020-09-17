
@extends('layouts.master')

@section('title', 'Members')

@section('content')

    <div class="col-lg-12 col-lg-offset-1">
        <h2><i class="fa fa-user-tie"></i> Members
            <a href="{{ route('members.create') }}" class="btn btn-success pull-right">Add Member</a></h2>
        <hr>
        <div class="">
            <table class="table table-bordered table-striped" id="teachers">

                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Operations</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($members as $member)
                    <tr>

                        <td>{{$member->id}}</td>
                        <td><a href="{{route('members.show', $member->id)}}">{{ $member->name }}</a> </td>
                        <td>{{ $member->designation }}</td>
                        <td>{{ $member->email }}</td>
                        <td>{{ $member->mobile}}</td>

                        <td>

                            <div class="dropdown show">
                                <a class="btn-sm btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Select Action
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                    <a class="dropdown-item" href="{{url('new-collection', $member->id)}}">Make Collection</a>
                                    <a class="dropdown-item" href="{{url('view-collection', $member->id)}}">View Payments</a>
                                    <a class="dropdown-item" href="{{ route('members.edit', $member->id) }}">Edit</a>
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['members.destroy', $member->id] ]) !!}
                                    {!! Form::submit('Delete', ['class' => 'dropdown-item']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>


                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>




    </div>

@endsection
@section('custom-js')
    <script>
        $(document).ready(function() {
            $('#teachers').DataTable();
        } );



    </script>


@endsection