@extends('layouts.app')

@section('content')
<header class="covid">
    <div class="overlay"></div>
    <div class="container h-100">
        <div class="d-flex h-100 text-center align-items-center">
            <div class="w-100 text-white">
                <h1 class="display-2">COVID-19 LATEST STATISTIC INFORMATION
                </h1>
                <p class="h1">{{Carbon\Carbon::now()->format('d.m.Y')}}</p>

            </div>
        </div>
    </div>
</header>

<div class="container pt-5">
    <h3 class="text-center">WORLD DATA</h3>
    <div class="row justify-content-center">


        <table class="table text-center ">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">
                        <h4>New Confirmed</h4>
                    </th>
                    <th scope="col">
                        <h4>Total Confirmed</h4>
                    </th>
                    <th scope="col">
                        <h4>New Deaths</h4>
                    </th>
                    <th scope="col">
                        <h4>Total Deaths</h4>
                    </th>
                    <th scope="col">
                        <h4>New Recovered</h4>
                    </th>
                    <th scope="col">
                        <h4>Total Recovered</h4>
                    </th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($covids->Global as $covid)

                    <td class="h4">
                        <h4>{{$covid}}</h4>
                    </td>

                    @endforeach
                </tr>

            </tbody>
        </table>


    </div>
</div>
<div class="container pt-5">
    <h3 class="text-center">SERBIA</h3>
    <div class="row justify-content-center">


        <table class="table text-center ">
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col">
                        <h4>New Confirmed</h4>
                    </th>
                    <th scope="col">
                        <h4>Total Confirmed</h4>
                    </th>
                    <th scope="col">
                        <h4>New Deaths</h4>
                    </th>
                    <th scope="col">
                        <h4>Total Deaths</h4>
                    </th>
                    <th scope="col">
                        <h4>New Recovered</h4>
                    </th>
                    <th scope="col">
                        <h4>Total Recovered</h4>
                    </th>

                </tr>
            </thead>
            <tbody>

                <tr>
                    <td class="h4">
                        {{($covids->Countries[147]->NewConfirmed)}}
                    </td>
                    <td class="h4">
                        {{($covids->Countries[147]->TotalConfirmed)}}
                    </td>
                    <td class="h4">
                        {{($covids->Countries[147]->NewDeaths)}}
                    </td>
                    <td class="h4">
                        {{($covids->Countries[147]->TotalDeaths)}}
                    </td>
                    <td class="h4">
                        {{($covids->Countries[147]->NewRecovered)}}
                    </td>
                    <td class="h4">
                        {{($covids->Countries[147]->TotalRecovered)}}
                    </td>
                </tr>

            </tbody>
        </table>


    </div>
</div>
<div class="container pt-5">
    <h3 class="text-center">Kosovo</h3>
    <div class="row justify-content-center">


        <table class="table text-center ">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">
                        <h4>New Confirmed</h4>
                    </th>
                    <th scope="col">
                        <h4>Total Confirmed</h4>
                    </th>
                    <th scope="col">
                        <h4>New Deaths</h4>
                    </th>
                    <th scope="col">
                        <h4>Total Deaths</h4>
                    </th>
                    <th scope="col">
                        <h4>New Recovered</h4>
                    </th>
                    <th scope="col">
                        <h4>Total Recovered</h4>
                    </th>

                </tr>
            </thead>
            <tbody>

                <tr>
                    <td class="h4">
                        {{($covids->Countries[136]->NewConfirmed)}}
                    </td>
                    <td class="h4">
                        {{($covids->Countries[136]->TotalConfirmed)}}
                    </td>
                    <td class="h4">
                        {{($covids->Countries[136]->NewDeaths)}}
                    </td>
                    <td class="h4">
                        {{($covids->Countries[136]->TotalDeaths)}}
                    </td>
                    <td class="h4">
                        {{($covids->Countries[136]->NewRecovered)}}
                    </td>
                    <td class="h4">
                        {{($covids->Countries[136]->TotalRecovered)}}
                    </td>
                </tr>

            </tbody>
        </table>


    </div>
</div>
@endsection
