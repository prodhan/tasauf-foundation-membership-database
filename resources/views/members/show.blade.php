@extends('layouts.master')

@section('title', $member->name.'\'s Profile')

@section('content')


    <div class='col-lg-8'>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-two">
                        <header>
                            <div class="avatar">
                                <img src='{{asset("uploads/$member->photo")}}' alt="{{$member->name}}" />
                            </div>
                        </header>

                        <h3>{{strtoupper($member->name)}}</h3>
                        <div class="desc">
                            {{strtoupper($member->designation)}}
                        </div>

                        <div class="contacts">
                            <a href="{{route('members.edit', $member->id) }}" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
                            <a href="callto:{{$member->mobile}}"><i class="fa fa-phone"></i></a>
                            <a href="mailto:{{$member->email}}"><i class="fa fa-envelope"></i></a>
                            <div class="clear"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <br>

        <div class="row form-group">
            <div class="col-md-4">Name</div>
            <div class="col-md-8"> {{ $member->name }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-4">Designation</div>
            <div class="col-md-8"> {{  $member->designation }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-4">Date of Birth</div>
            <div class="col-md-8"> {{$member->dob }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-4">Occupation</div>
            <div class="col-md-8"> {{ $member->occupation }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-4">Organization name</div>
            <div class="col-md-8"> {{ $member->org_name}}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-4">NID</div>
            <div class="col-md-8"> {{$member->nid }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-4">TIN</div>
            <div class="col-md-8"> {{$member->tin }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-4">Address</div>
            <div class="col-md-8"> {{$member->address }}</div>
        </div>

        <div class="row form-group">
            <div class="col-md-4">Mobile No</div>
            <div class="col-md-8"> {{$member->mobile }}</div>
        </div>
        <div class="row form-group">
            <div class="col-md-4">E-mail</div>
            <div class="col-md-8">{{ $member->email }}</div>
        </div>
        <div class="row form-group">
            <div class="col-md-4">Membership Date</div>
            <div class="col-md-8">{{  $member->membership_date }}</div>
        </div>
        <hr>
        <h3 align="center">Transactions</h3>
        <hr>
        <div class="row">
@can('report menu')
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="bills">

                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Date</th>
                        <th>For</th>
                        <th>Amount</th>
                        <th>Method</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($collections as $collection)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{ $collection->date }}</td>
                            <td>{{ date('F', mktime(0, 0, 0, $collection->month, 10)) }} - {{$collection->year}}  {{$collection->head}}</td>
                            <td>{{ $collection->amount }}</td>
                            <td>{{ $collection->method }}</td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
            @endcan
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