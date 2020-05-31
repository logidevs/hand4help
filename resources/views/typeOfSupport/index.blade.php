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
                <div class="card-header">{{__('Type of supports')}}</div>
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
                    <form method="POST" action="{{route('typeOfSupport.store')}}">
                        @csrf
                        <div class="row">
                              <div class="col">
                                        <div class="form-group">
                                    <label for="name_sr">{{__('Name sr')}}:</label>
                                    <input type="text" class="form-control" id="name_sr" name="name_sr" value="{{old('name_sr')}}">
                                  </div>
                              </div>
                                <div class="col">
                                        <div class="form-group">
                                    <label for="name_en">{{__('Name en')}}:</label>
                                    <input type="text" class="form-control" id="name_en" name="name_en" value="{{old('name_en')}}">
                                  </div>
                              </div>
                                <div class="col">
                                        <div class="form-group">
                                    <label for="name_al">{{__('Name al')}}:</label>
                                    <input type="text" class="form-control" id="name_al" name="name_al" value="{{old('name_al')}}">
                                  </div>
                              </div>
                              <div class="col">
                                <label for="">-</label>
                                  <button type="submit" class="btn btn-primary btn-block">{{__('Add new type')}}</button>
                              </div>
                          </div>
                    </form>
                </div>
                    <table class="table table-sm table-striped">
                        <thead>
                            <tr>
                                <th>{{__('ID')}}</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Options')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($typeOfSupports as $typeOfSupport)
                            <tr>
                                <td>#{{$typeOfSupport->id}}</td>
                                <td>{{$typeOfSupport->name}}</td>
                                <td>
                                    <form method="POST" action="{{route('typeOfSupport.destroy', $typeOfSupport->id)}}">
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
@endsection
