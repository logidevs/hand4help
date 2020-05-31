@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('Your own info')}}</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>{{__('Name')}}</th>
                            <td>{{auth()->user()->name}}</td>
                        </tr>
                        <tr>
                            <th>{{__('Email')}}</th>
                            <td>{{auth()->user()->email}}</td>
                        </tr>
                        <tr>
                            <th>{{__('Phone')}}</th>
                            <td>{{auth()->user()->volunteer->phone}}</td>
                        </tr>
                        <tr>
                            <th>{{__('General volunteer support')}}</th>
                            <td>
                                @foreach(auth()->user()->volunteer->typeOfSupports as $typeOfSupport)
                                {{$typeOfSupport->name}},
                                @endforeach
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
