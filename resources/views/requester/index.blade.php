@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{__('Requests')}}: ({{__('Total count')}}: {{$requesters->total()}})</div>

                <div class="card-body">
                    <table class="table table-sm table-striped">
                        <thead>
                            <tr>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Email')}}</th>
                                <th>{{__('Phone')}}</th>
                                <th>{{__('Requested at')}}</th>
                                <th>{{__('Options')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($requesters as $requester)
                            <tr>
                                <td>{{$requester->name}}</td>
                                <td>{{$requester->email}}</td>
                                <td>{{$requester->phone}}</td>
                                <td>{{$requester->created_at->format('d.m.Y H:i:s')}}</td>
                                <td>
                                    <form method="POST" action="{{route('requester.destroy', $requester->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onClick="return confirm('Are you sure?');" class="btn btn-sm btn-danger">{{__('Delete request')}}</button>
                                    </form>
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
