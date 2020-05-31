@extends('layouts.app')

@section('content')
<div class="container mt-4">
   <h3>Admin</h3> 
</div>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-3">
            @include('partials.admin_menu')
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{__('Volunteers')}}: ({{__('Total count')}}: {{$volunteers->total()}})</div>
                    <table class="table table-sm table-striped">
                        <thead>
                            <tr>
                                <th>{{__('ID')}}</th>
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
                                <td>#{{$volunteer->user->id}}</td>
                                <td>{{$volunteer->name}}</td>
                                <td>{{$volunteer->email}}</td>
                                <td>{{$volunteer->phone}}</td>
                                <td>{{$volunteer->created_at->format('d.m.Y H:i:s')}}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-danger">Delete volunteer</a>
                                </td>
                            </tr>
                             @endforeach
                        </tbody>
                    </table>
                    <div class="card-footer">
                        {{$volunteers->links()}}
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
