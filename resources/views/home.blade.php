@extends('layouts.app')

@section('content')
<section class="hero">
    {{-- popup notice  --}}
    <x-pop-up-notice/>
    @php
        $carouselItems = getBanners();
    @endphp

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($carouselItems as $index => $item)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}" style="background-image: url('{{ asset($item['image']) }}') ;">
                    <div class="hero-background-overlay"></div>
                    <div class="container h-100">
                        <div class="row align-items-center d-flex h-100">
                            <div class="col-md-7">
                                <div class="block">
                                    <div class="divider mb-3"></div>
                                    <span class="text-uppercase text-sm letter-spacing">{{ $item['subtitle'] }}</span>
                                    <h1 class="mb-3 mt-3">{{ $item['title'] }}</h1>
                                    <p class="mb-4 pr-5">{{ $item['description'] }}</p>
                                    <div class="btn-container ">
                                        <a href="{{ $item['link'] }}" target="_blank" class="btn btn-primary">
                                            {{ $item['button_text'] }} <i class="icofont-simple-right ml-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>


<section class="section-2  py-5">
    <div class="container py-2">
        <div class="row">
            <div class="col-md-6 align-items-center d-flex">
                <div class="about-block">
                    <h1 class="title-color">Welcome </h1>
                    <div class="mt-2 mb-3 text-muted">To, Realm  Infotech!</div>
                    <p>At Realm Infotech, we specialize in delivering top-notch services
                         in Social Media Management, Graphic Design, Website Development,
                         and SEO. We are dedicated to helping businesses grow and enhance
                         their online presence through creative solutions and cutting-edge digital strategies.
                          Whether you're looking to elevate your brand with captivating graphics
                         or boost your website's visibility, we've got you covered!</p>
                         <p>
                            Our expertise lies in creating dynamic and visually appealing digital experiences
                            that resonate with your audience. From expertly managing your social media presence
                            to designing stunning visuals that represent your brand, we ensure your business stands out.
                             Our SEO services are focused on improving your website's ranking, driving more organic traffic,
                            and ensuring that your online platform is optimized for success.
                         </p>
                         <p>
                            At Realm Infotech, we believe in the power of innovation and creativity.
                             With our integrated services, we help you navigate the ever-evolving digital landscape,
                              making sure your brand stays ahead of the competition.
                               Let us help you create impactful digital experiences that will leave a lasting
                            impression on your audience and take your business to new heights!
                         </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="image-red-background">
                    <img src="{{ asset('assets/images/about-us.jpg') }}" alt="" class="w-100">
                </div>

            </div>
        </div>
    </div>
</section>

<section class="section-3 py-5">
    <div class="container">
        <div class="divider mb-3"></div>
        <h2 class="title-color mb-4 h1">Services</h2>
        <div class="cards">
            <div class="services-slider">

                @if(!empty($services))
                @foreach($services as $service)
                <div class="card border-0 ">

                    <a href="{{ url('/services/detail/'.$service->id) }}">
                        @if(!empty($service->image))
                        <img src="{{ asset('uploads/services/thumb/small/'.$service->image) }}" class="card-img-top" alt="">
                        @else
                        <img src="{{ asset('uploads/placeholder.jpg') }}" class="card-img-top" alt="">
                        @endif
                    </a>

                    <div class="card-body p-3">
                        <h1 class="card-title mt-2"><a href="{{ url('/services/detail/'.$service->id) }}">{{ $service->name }}</a></h1>
                        <div class="content pt-2">
                            <p class="card-text">{{ $service->short_desc }}</p>
                        </div>
                        <a href="{{ url('/services/detail/'.$service->id) }}" class="btn btn-primary mt-4">Details <i class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</section>

<section class="section-4 py-5 text-center">
    <div class="hero-background-overlay"></div>
    <div class="container">
       <div class="help-container">
            <h1 class="title"> Innovating the Future with Technology</h1>
            <p class="card-text mt-3">At Realm Infotech, we specialize in cutting-edge IT solutions, including web development</p>
            <a href="{{ url('/contact') }}" class="btn btn-primary mt-3">Reach out <i class="fa-solid fa-angle-right"></i></a>
       </div>
    </div>
</section>


<section class="testimonial-container pt-4">
    <x-testimonial/>
</section>

<section class="gallery-section">
    <x-front-gallery/>
</section>

@include('common.latest-blog')

@endsection
