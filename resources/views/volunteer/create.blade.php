@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('Offer to help')}}</div>

                <div class="card-body">
                  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{route('volunteer.store')}}">
  @csrf
    <div class="form-group">
    <label for="name">{{__('Name')}}:</label>
    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">{{__('Email')}}:</label>
    <input type="email" name="email"  value="{{old('email')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">Mail će biti prosleđen jedino onima kojima želite da pomognete.</small>
  </div>
  <div class="row">
    <div class="col">
    <div class="form-group">
    <label for="password">{{ __('Password') }}</label>
    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
  </div>

    </div>
        <div class="col">
    <div class="form-group">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>

                            
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            
  </div>

</div>
</div>
      <div class="form-group">
    <label for="phone">{{__('Phone')}}:</label>
    <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone')}}">
  </div>
  <div class="form-group">

  <label>{{__('General volunteer support')}}:</label>
</div>
<div class="row">
  @foreach($typeOfSupports as $typeOfSupport)
    <div class="col-md-3">
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="checkbox_{{$typeOfSupport->id}}" name="support[]" value="{{$typeOfSupport->id}}">
        <label class="form-check-label" for="checkbox_{{$typeOfSupport->id}}">{{$typeOfSupport->name}}</label>
      </div>
    </div> 
    @endforeach
</div>
  <div class="form-group">

  <label>{{__('Choose location')}}:</label>
</div>
    <div class="row mb-4">
        <div class="col">
            <div id="map" style="width:100%;height:200px;"></div>
        </div>
    </div>
<div class="row">
    <div class="col">
    <div class="form-group">
    <label for="latitude">{{__('Latitude')}}:</label>
    <input type="text" class="form-control" id="latitude" name="latitude">
  </div>

    </div>
        <div class="col">
    <div class="form-group">
    <label for="longitude">{{__('Longitude')}}:</label>
    <input type="text" class="form-control" id="longitude" name="longitude">
  </div>

</div>
</div>
  <button type="submit" class="btn btn-primary btn-block">{{__('Apply to volunteer')}}</button>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    
    <script>
    function setCenter(){
        var myLtnlng={lat:42.57469603846697, lng:20.84208736010453};
            navigator.geolocation.getCurrentPosition(function(position) {
            // Center on user's current location if geolocation prompt allowed
            myLtnlng.lat=position.coords.latitude;
            myLtnlng.lng=position.coords.longitude;
            document.getElementById('latitude').value = myLtnlng.lat;
            document.getElementById('longitude').value = myLtnlng.lng;
            initMap(myLtnlng);
          }, function(positionError) {
            initMap(myLtnlng);
          });
    }
      function initMap(myLtnlng) {
          var map = new google.maps.Map(
            document.getElementById('map'), {zoom: 13, center: myLtnlng});
        var infoWindow = new google.maps.InfoWindow(
            {content: 'Your current Location is '+myLtnlng.lat+":"+myLtnlng.lng, position: myLtnlng});
        infoWindow.open(map);

        // Configure the click listener.
        map.addListener('click', function(mapsMouseEvent) {
          // Close the current InfoWindow.
          infoWindow.close();
           var myLatLng = mapsMouseEvent.latLng;
            var lat = myLatLng.lat();
            var lng = myLatLng.lng();

          // Create a new InfoWindow.
          infoWindow = new google.maps.InfoWindow({position: mapsMouseEvent.latLng});
          infoWindow.setContent(mapsMouseEvent.latLng.toString());

          document.getElementById('latitude').value = lat;
          document.getElementById('longitude').value = lng;
          infoWindow.open(map);
        });
      }
    </script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAXqsuWqZ77GnXST-MWvh9dqeAfYh_JRMo&callback=setCenter"></script>
@endsection
