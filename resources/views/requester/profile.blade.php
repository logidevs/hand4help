@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('Requester info')}}</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>{{__('Name')}}</th>
                            <td>{{$requester->name}}</td>
                        </tr>
                        <tr>
                            <th>{{__('Email')}}</th>
                            <td>{{$requester->email}}</td>
                        </tr>
                        <tr>
                            <th>{{__('Phone')}}</th>
                            <td>{{$requester->phone}}</td>
                        </tr>
                        <tr>
                            <th>{{__('I need help for')}}</th>
                            <td>
                                @foreach($requester->typeOfSupports as $typeOfSupport)
                                {{$typeOfSupport->name}},
                                @endforeach
                            </td>
                        </tr>
                    </table>
                    <form method="POST" action="{{route('volunteer.takeRequest', $requester->id)}}">
                        @csrf
                        <button class="btn btn-block btn-primary" type="submit">{{__('I will take this request')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
