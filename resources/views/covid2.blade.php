@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Covid-19 data
            </div>
            <div class="card-body">
                <h3>Serbia {{date('d.m.Y')}}</h3>
            
            <table class="table table-sm table-striped">
                <tr>
                    <th>infected</th>
                    <th>recovered</th>
                    <th>tested</th>
                    <th>hospitalised</th>
                    <th>tested24hours</th>
                    <th>infected24hours</th>
                    <th>deceased24hours</th>
                </tr>
                <tr>
                    <td>{{$covid_serbia->infected}}</td>
                     <td>{{$covid_serbia->recovered}}</td>
                      <td>{{$covid_serbia->tested}}</td>
                       <td>{{$covid_serbia->hospitalised}}</td>
                        <td>{{$covid_serbia->tested24hours}}</td>
                         <td>{{$covid_serbia->infected24hours}}</td>
                          <td>{{$covid_serbia->deceased24hours}}</td>
                </tr>
            </table>
                            <h3>Kosovo {{date('d.m.Y')}}</h3>
            
            <table class="table table-sm table-striped">
                <tr>
                    <th>infected</th>
                    <th>recovered</th>
                    <th>tested</th>
                    <th>hospitalised</th>
                    <th>tested24hours</th>
                    <th>infected24hours</th>
                    <th>deceased24hours</th>
                </tr>
                <tr>
                    <td>{{$covid_kosovo->infected}}</td>
                     <td>{{$covid_kosovo->recovered}}</td>
                      <td>{{$covid_kosovo->tested}}</td>
                       <td></td>
                        <td></td>
                         <td></td>
                          <td>{{$covid_kosovo->deceased}}</td>
                </tr>
            </table>
            </div>
            </div>
        </div>
    </div>
</div>

@endsection
