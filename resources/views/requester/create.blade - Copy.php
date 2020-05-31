@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('Ask for help')}}</div>

                <div class="card-body">
<form>
  <p>
  <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    {{__('If you ask for someone else click this button first')}}
  </a>
</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body" style="background-color:rgba(140,190,250,0.7);">
    <h5>{{__('Enter your own data')}}</h5>
    <hr>
    <div class="row">
      <div class="col">
                <div class="form-group">
    <label for="name">{{__('Name')}}:</label>
    <input type="text" class="form-control" id="name">
  </div>
      </div>
            <div class="col">
                <div class="form-group">
    <label for="name">{{__('Relationship')}}:</label>
    <input type="text" class="form-control" id="name">
  </div>
      </div>
    </div>

  <div class="row">
    <div class="col">
       <div class="form-group">
    <label for="exampleInputEmail1">{{__('Email')}}:</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
    </div>
    <div class="col">
            <div class="form-group">
    <label for="phone">{{__('Phone')}}:</label>
    <input type="text" class="form-control" id="phone">
  </div>
    </div>
  </div>
              <div class="form-group">
    <label for="address">{{__('Address')}}:</label>
    <textarea class="form-control" name="address" id="" rows="5"></textarea>
  </div>
 

  </div>
</div>
    <div class="form-group">
    <label for="name">{{__('Name')}}:</label>
    <input type="text" class="form-control" id="name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">{{__('Email')}}:</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
      <div class="form-group">
    <label for="phone">{{__('Phone')}}:</label>
    <input type="text" class="form-control" id="phone">
  </div>
  <div class="form-group">

  <label>{{__('I need help for')}}:</label>
</div>
<div class="row">
    <div class="col">
          <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">{{__('Delivery of goods')}}</label>
  </div>
    </div>
        <div class="col">
          <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">{{__('Childcare')}}</label>
  </div>
</div>
          <div class="col">
          <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">{{__('Eldercare')}}</label>
  </div>
    </div>
              <div class="col">
          <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">{{__('Legal assistance')}}</label>
  </div>
    </div>

    
</div>
  <div class="form-group">

  <label>{{__('Choose location')}}:</label>
</div>
    <div class="row mb-4">
        <div class="col">
            <div id="map" style="width:100%;height:200px;"></div>
        </div>
    </div>

  <button type="submit" class="btn btn-primary">Submit</button>
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
        var myLatlng = {lat: 42.57469603846697, lng: 20.84208736010453};

        var map = new google.maps.Map(
            document.getElementById('map'), {zoom: 8, center: myLatlng});

        // Create the initial InfoWindow.
        var infoWindow = new google.maps.InfoWindow(
            {content: 'Click the map to get Lat/Lng!', position: myLatlng});
        infoWindow.open(map);

        // Configure the click listener.
        map.addListener('click', function(mapsMouseEvent) {
          // Close the current InfoWindow.
          infoWindow.close();

          // Create a new InfoWindow.
          infoWindow = new google.maps.InfoWindow({position: mapsMouseEvent.latLng});
          infoWindow.setContent(mapsMouseEvent.latLng.toString());
          infoWindow.open(map);
        });
      }
    </script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAXqsuWqZ77GnXST-MWvh9dqeAfYh_JRMo&callback=initMap"></script>
@endsection
