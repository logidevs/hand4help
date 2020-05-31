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
                        @if(!is_null($requester->asker_name))
                        <tr>
                            <th>{{'Person who asked for help'}}</th>
                            <td>
                                {{$requester->asker_name}}<br>
                                 {{$requester->asker_email}}<br>
                                  {{$requester->asker_phone}}<br>
                                   {{$requester->asker_relationship}}<br>
                                    {{$requester->asker_address}}
                            </td>
                        </tr>
                        @endif
                        <tr>
                            <th colspan="2">{{__('Location')}} <br>

                                  <div id="map" style="width:100%;height:200px;"></div>
                            </th>
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

@section('script')
    
    <script>
function initMap() {
  var myLatLng = {lat: {{$requester->latitude}}, lng: {{$requester->longitude}}};

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 12,
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

