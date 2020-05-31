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
                <div class="card-header">{{__('Requests')}}: ({{__('Total count')}}: {{$requesters->total()}})</div>

                    <table class="table table-sm table-striped">
                        <thead>
                            <tr>
                                <th>{{__('ID')}}</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Email')}}</th>
                                <th>{{__('Phone')}}</th>
                                <th>{{__('Requested at')}}</th>
                                <th>{{__('Request status')}}</th>
                                <th>{{__('Options')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($requesters as $requester)
                            <tr>
                                <td>#{{$requester->id}}</td>
                                <td><a href="{{route('requester.profile', $requester->id)}}">{{$requester->name}}</a></td>
                                <td>{{$requester->email}}</td>
                                <td>{{$requester->phone}}</td>
                                <td>{{$requester->created_at->format('d.m.Y H:i:s')}}</td>
                                <td>
                                    @if(!is_null($requester->volunteer_id)&&$requester->is_finished==true)
                                            finished
                                            @elseif(!is_null($requester->volunteer_id))
                                            in progress
                                    @endif
                                </td>
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
                    <div class="card-footer">
                        {{$requesters->links()}}
                    </div>

            </div>
        </div>
    </div>
</div>
@endsection
