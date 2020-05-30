@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('Offer to help')}}</div>

                <div class="card-body">
<form>
    <div class="form-group">
    <label for="name">{{__('Name')}}:</label>
    <input type="text" class="form-control" id="name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">{{__('Email')}}:</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">Mail će biti prosleđen jedino onima kojima želite da pomognete.</small>
  </div>
      <div class="form-group">
    <label for="phone">{{__('Phone')}}:</label>
    <input type="text" class="form-control" id="phone">
  </div>
  <div class="form-group">

  <label>{{__('General volunteer support')}}:</label>
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

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
