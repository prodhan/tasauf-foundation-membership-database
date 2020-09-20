@extends('layouts.master')

@section('title', 'Collections')

@section('content')
    <h2><i class="fa fa-money"></i> Collections</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="bills">

                <thead>
                <tr>
                    <th>SL</th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>For</th>
                    <th>Amount</th>
                    <th>Operations</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($collections as $collection)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{ $collection->date }}</td>
                        <td><a href="{{route('members.show', $collection->member_id)}}">{{ $collection->member->name }}</a></td>
                        <td>{{ date('F', mktime(0, 0, 0, $collection->month, 10)) }} - {{$collection->year}}</td>
                        <td>{{ $collection->amount }}</td>

                        <td>

                            @hasrole('Admin')
                            {!! Form::open(['method' => 'DELETE', 'route' => ['collections.destroy', $collection->id] ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn-sm btn-danger pull-left']) !!}
                            {!! Form::close() !!}
                            @endhasrole
                            <a href="{{url('invoice', $collection->id)}}" target="_blank" class="btn-sm btn-primary"> <i class="fa fa-print"></i> Print</a>
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
        $(document).ready(function () {
            $('#bills').DataTable();
        });


    </script>


@endsection