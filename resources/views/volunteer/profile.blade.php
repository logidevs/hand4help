@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-4">
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
                                                <tr>
                            <th colspan="2">{{__('Location')}} <br>

                                  <div id="map" style="width:100%;height:200px;"></div>
                            </th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('What i did')}}</div>
                <div class="card-body">
                    <h3>In progress</h3>
                    <table class="table table-sm table-striped">
                        <tr>
                            <th>{{__('ID')}}</th>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Options')}}</th>
                        </tr>
                        @forelse($requests_in_progress as $prequest)
                        <tr>
                            <td>#{{$prequest->id}}</td>
                            <td><a href="{{route('requester.profile', $prequest->id)}}">{{$prequest->name}}</a></td>
                            <td><a href="{{route('requester.closeRequest', $prequest->id)}}" class="btn btn-sm btn-outline-success">Close request</a></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">You don't have requests in progress</td>
                        </tr>
                        @endforelse
                    </table>
                    <h3>Finished requests</h3>
                    <table class="table table-sm table-striped">
                        <tr>
                            <th>{{__('ID')}}</th>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Options')}}</th>
                        </tr>
                        @forelse($requests_finished as $frequest)
                        <tr>
                            <td>#{{$frequest->id}}</td>
                            <td>{{$frequest->name}}</td>
                             <td><a href="{{route('requester.openRequest', $frequest->id)}}" class="btn btn-sm btn-success">Open request</a></td>
                        </tr>
                       @empty
                        <tr>
                            <td colspan="3">You don't have finished requests</td>
                        </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    
    <script>
function initMap() {
  var myLatLng = {lat: {{auth()->user()->volunteer->latitude}}, lng: {{auth()->user()->volunteer->longitude}}};

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 15,
    center: myLatLng,
    streetViewControl: false,
  });

  var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    title: 'Hello World!'
  });
}
    </script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAXqsuWqZ77GnXST-MWvh9dqeAfYh_JRMo&callback=initMap"></script>
@endsection
