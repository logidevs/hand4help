@extends('layouts.app')
@section('style')
<style>
  /* GLOBAL STYLES
-------------------------------------------------- */
/* Padding below the footer and lighter body text */

body {
  padding-top: 0;
  padding-bottom: 0;
  color: #5a5a5a;
}


/* CUSTOMIZE THE CAROUSEL
-------------------------------------------------- */

/* Carousel base class */
.carousel {
  margin-bottom: 4rem;
}
/* Since positioning the image, we need to help out the caption */
.carousel-caption {
  bottom: 3rem;
  z-index: 10;
}

/* Declare heights because of positioning of img element */
.carousel-item {
  height: 32rem;
}
.carousel-item > img {
  position: absolute;
  top: 0;
  left: 0;
  min-width: 100%;
  height: 32rem;
}


/* MARKETING CONTENT
-------------------------------------------------- */

/* Center align the text within the three columns below the carousel */
.marketing .col-lg-4 {
  margin-bottom: 1.5rem;
  text-align: center;
}
.marketing h2 {
  font-weight: 400;
}
.marketing .col-lg-4 p {
  margin-right: .75rem;
  margin-left: .75rem;
}


/* Featurettes
------------------------- */

.featurette-divider {
  margin: 5rem 0; /* Space out the Bootstrap <hr> more */
}

/* Thin out the marketing headings */
.featurette-heading {
  font-weight: 300;
  line-height: 1;
  letter-spacing: -.05rem;
}


/* RESPONSIVE CSS
-------------------------------------------------- */

@media (min-width: 40em) {
  /* Bump up size of carousel content */
  .carousel-caption p {
    margin-bottom: 1.25rem;
    font-size: 1.25rem;
    line-height: 1.4;
  }

  .featurette-heading {
    font-size: 50px;
  }
}

@media (min-width: 62em) {
  .featurette-heading {
    margin-top: 7rem;
  }
}
.carousel-inner .carousel-item:after {
  content:"";
  position:absolute;
  top:0;
  bottom:0;
  left:0;
  right:0;
  background:rgba(0,0,0,0.6);
}
.carousel-item img{
  filter: grayscale(85%);

}
.carousel-caption h1{
  display:inline;
  padding:0px;

}
</style>

@endsection
@section('content')



<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{asset('img/2.jpg')}}" alt="" class="img-fluid">
        <div class="container">
          <div class="carousel-caption text-left">
            <h1>{{__('Ask for help')}}</h1>
            <p>Nakon uvođenja vanrednog stanja u Srbiji zbog korona virusa i apela starijim građanima da ne izlaze iz kuće, gradovi, opštine i pojedinci organizovali su razne volonterske srevise kao pomoć.</p>
            <p><a class="btn btn-lg btn-success" href="{{route('requester.create')}}" role="button">{{__('Ask for help')}}</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{asset('img/4.jpg')}}" alt="" class="img-fluid">
        <div class="container">
          <div class="carousel-caption">
            <h1>{{__('Offer to help')}}</h1>
            <p>Dok mnogi mladi koriste slobodno vreme za šetnju do policijskog časa, volonteri ističu da je veći doprinos u novonastaloj situaciji pomoći najugroženijima, a da je pored nabavke njima potrebna i utešna reč, jer to ne mogu da čuju na televiziji.</p>
            <p><a class="btn btn-lg btn-success" href="{{route('volunteer.create')}}" role="button">{{__('Become a volunteer')}}</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{asset('img/3.jpg')}}" alt="" class="img-fluid">
        <div class="container">
          <div class="carousel-caption text-right">
            <h1>{{__('See last covid 19 statistics')}}</h1>
            <p>U Republici Srbiji je prvi slučaj COVID-19 registrovan 06.03.2020. godine i epidemija je još u toku . U ovom momentu epidemiološka situacija je stabilna sa tendencijom pada.</p>
            <p><a class="btn btn-lg btn-success" href="{{route('covid_statistics')}}" role="button">{{__('Covid 19 data')}}</a></p>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Postani volonter.</h2>
        <p class="lead">Solidarnost i empatija prema najugroženijima u toku trajanja pandemije koronavirusa je ključna. Ukoliko ne spadate u rizičnu grupu, mladi ste i zdravi, imate slobodnog vremena i želite da pomognete ugroženim kategorijama stanovništva sada to možete učiniti prijavom na novi jedinstveni sistem za evidenciju volontera i volonterki.</p>
      </div>
      <div class="col-md-5">
        <img src="{{asset('img/volunteers.jpg')}}" alt="" class="img-fluid">
      </div>
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->
  @endsection