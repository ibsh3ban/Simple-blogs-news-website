@php

// $homeslide = App/Models/HomeSlide::find(1);
$about = App\Models\About::find(1);
$mutiImage=App\Models\MultiImage::latest()->limit(10)->get();

@endphp


<section id="aboutSection" class="about">
    <div class="container">
    <div class="row align-items-center">
    <div class="col-lg-6">
    <ul class="about__icons__wrap">
        @foreach ($mutiImage as $item)

    <li>
    <img class="light" src="{{ asset($item->multi_image)}}" alt="XD">
    <img class="dark" src="{{ asset($item->multi_image)}}" alt="XD">
    </li>
       @endforeach

    </ul>
    </div>
    <div class="col-lg-6">
    <div class="about__content">
    <div class="section__title">
    <span class="sub-title">01 - About me</span>
    <h2 class="title">{{ $about->title }}</h2>
    </div>
    <div class="about__exp">
    <div class="about__exp__icon">
    <img src="{{ asset('frontend/assets/img/icons/about_icon.png') }}" alt="">
    </div>
    <div class="about__exp__content">
    <p>{{ $about->short_title }} <br> Product Designing</p>
    </div>
    </div>
    <p class="desc">{{ $about->short_description }}</p>
    <a href="about.html" class="btn">Download my resume</a>
    </div>
    </div>
    </div>
    </div>
    </section>
