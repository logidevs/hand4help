@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <table class="table table-sm table-striped">
                        <thead>
                            <tr>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Email')}}</th>
                                <th>{{__('Phone')}}</th>
                                <th>{{__('Join at')}}</th>
                                <th>{{__('Options')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($volunteers as $volunteer)
                            <tr>
                                <td>{{$volunteer->name}}</td>
                                <td>{{$volunteer->email}}</td>
                                <td>{{$volunteer->phone}}</td>
                                <td>{{$volunteer->created_at->format('d.m.Y H:i:s')}}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-danger">Delete request</a>
                                </td>
                            </tr>
                             @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
