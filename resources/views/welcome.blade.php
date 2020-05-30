@extends('layouts.front')
@section('css')
<link href="{{ asset('css/front.css') }}" rel="stylesheet">

@endsection
@section('front.content')

<header>
    <div class="overlay"></div>
    <div class="container h-100">
        <div class="d-flex h-100 text-center align-items-center">
            <div class="w-100 text-white">
                <h1 class="display-2">Help yourself by helping others
                </h1>
                <p class="h1">Help those that need help in order to get help that you will need some day. BE HUMAN ,BE KIND</p>
            </div>
        </div>
    </div>
</header>
<div class="container my-5 text-center">
    <div class="row ">
        <div class="col-md-6">
            <h2>Do you need help or do you know someone that need help?</h2>
            <a href="{{route('help')}}" class="btn btn-danger py-3 px-4 btn-lg text-white">Ask for assistance</a>
        </div>
        <div class="col-md-6">
            <h2>Are you willing to help others?<br><br></h2>
            <button type="button" class="btn btn-danger py-3 px-4 btn-lg text-white">Register for volunteering</button>
        </div>
    </div>
</div>
<div class="container-fluid ">
    <div class="row mb-5 ">
        <div class="col-md-4 bg-primary text-white p-5">
            <h2 class="pt-4 pb-3">The long journey to end Covid19 and make world better place begins with humanity.</h2>
            <button class="btn btn-outline-danger font-weight-bold btn-lg">Help now!</button>
        </div>

        <div class="col-md-4 bg-secondary text-white  p-5">
            <h2 class="pt-4 pb-3">
                During this hard time, many people need your help.</h2>
            <button class="btn btn-outline-danger font-weight-bold btn-lg">Get help!</button>
        </div>
        <div class="col-md-4 p-0"><img src="{{asset('uploads/adventure.jpg')}}" class="img-fluid" alt=""></div>
    </div>



    <h1 class="text-secondary text-center mb-5">Our Cause Is Just Our Need To Be Human</h1>



    <div class="row mb-5">
        <div class="col-md-6 bg-primary text-white p-5">
            <h3>Why Was HandsForHelp made?</h3><br>
            <p class="lead">
                Main goal was the response to COVID-19,but as it was going on we figured out that it can be used even after pandemic,many people need help as well as many people want to help so at any time it can be used to support major popularity,to serve their needs and make our environment better place.
            </p>


            </p>
        </div>
        <div class="col-md-6 p-0"><img src="{{asset('uploads/v.jpg')}}" class="img-fluid" alt=""></div>
        <div class="col-md-6 p-0 d-none d-lg-block"><img src="{{asset('uploads/handshake.png')}}" class="img-fluid"
                alt="">
        </div>
        <div class="col-md-6 bg-secondary text-white p-5">
            <h3>
                How Does it Work?</h3><br>
            <p class="lead">
                Let's get one thing straight, it is free of charge! We match those
                who need  help with
                volunteers who have donated their time and good will.
                We created win-win for all.
            </p>
        </div>
    </div>
</div>

    <footer class="p-5 bg-dark text-white"><div class="container">
        <div class="row  ">
            <div class="col-md-6">CONTACT INFO<br>
            If you need help,<br> or you just want to help,<br> please do not hesitate to contact us<br>
         office@logidevs.com

            </div>
        <div class="col-md-6">QUICK LINKS
        </div></div></div>
    </footer>
    <div class="text-center py-4 bg-secondary text-white-50">
        <small>Copyright &copy; LogiDevs.com</small>
    </div>

    @endsection
