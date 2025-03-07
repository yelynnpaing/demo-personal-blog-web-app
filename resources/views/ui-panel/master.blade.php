<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Blog</title>
    <link rel="shortcut icon" href="{{ asset('images/ylp-favicon.png') }}" type="image/x-icon">
    <!-- BOOTSTRAP CSS & JS --->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- FONTAWSOME CSS  -->
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.4.2-web/css/all.min.css') }}">
    <!-- ANIMATE CSS  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>
<body>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <!-- HEADER -->
                <div class="header">
                    <div class="row justify-content-center align-items-center p-5">
                        <div class="col-lg-6 col-md-6">
                            <div class="head-text">
                                <i class="fa-solid fa-hands-clapping text-warning mb-3 spinner-hand"
                                    style="font-size:50px;" id="handShape"></i>
                                <div class="fake-data" id="fakeData">
                                    <div class="fake-slide animate__animated">
                                        <h2>HELLO !</h2>
                                        <h4>WELCOME FROM MY BLOG.</h4>
                                        <h4>THANKS FOR VISITING.</h4>
                                        <h4>BE HAPPY AND SUCCESSFUL.</h4>
                                        <a href="{{ url('/') }}">
                                            <button class="btn btn-secondary mt-4">
                                                <i class="fa-solid fa-plus-circle"></i>
                                                Hire my Blogs
                                            </button>
                                        </a>
                                    </div>
                                </div>
                               <div class="main-text-slide d-none" id="mainTextSlide">
                                    <div class="text-slide animate__animated">
                                        <h2>HELLO !</h2>
                                        <h4>WELCOME FROM MY BLOG.</h4>
                                        <h4>THANKS FOR VISITING.</h4>
                                        <h4>BE HAPPY AND SUCCESSFUL.</h4>
                                        <a href="{{ url('/') }}">
                                            <button class="btn btn-secondary mt-4">
                                                <i class="fa-solid fa-plus-circle"></i>
                                                Hire my Blogs
                                            </button>
                                        </a>
                                    </div>
                                    <div class="text-slide animate__animated">
                                        <h2 class="text-warning">HELLO !</h2>
                                        <h4>WELCOME FROM MY BLOG.</h4>
                                        <h4>THANKS FOR VISITING.</h4>
                                        <h4>BE HAPPY AND SUCCESSFUL.</h4>
                                        <a href="{{ url('/') }}">
                                            <button class="btn btn-secondary mt-4">
                                                <i class="fa-solid fa-plus-circle"></i>
                                                Hire my Blogs
                                            </button>
                                        </a>
                                    </div>
                                    <div class="text-slide animate__animated">
                                        <h2 class="text-info">HELLO !</h2>
                                        <h4>WELCOME FROM MY BLOG.</h4>
                                        <h4>THANKS FOR VISITING.</h4>
                                        <h4>BE HAPPY AND SUCCESSFUL.</h4>
                                        <a href="{{ url('/') }}">
                                            <button class="btn btn-secondary mt-4">
                                                <i class="fa-solid fa-plus-circle"></i>
                                                Hire my Blogs
                                            </button>
                                        </a>
                                    </div>
                               </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="row justify-content-center">
                                <div class="w-75">
                                    <div id="headerSlide" class="carousel slide">
                                        <div class="carousel-inner">
                                          <div class="carousel-item active">
                                                <img src="{{ asset('images/header-pic-1.jpg') }}" alt="" class="d-block w-100">
                                            <div class="carousel-caption d-none d-md-block">
                                            </div>
                                          </div>
                                          <div class="carousel-item">
                                            <img src="{{ asset('images/header-pic-2.jpg') }}" alt="" class="d-block w-100">
                                            <div class="carousel-caption d-none d-md-block">
                                            </div>
                                          </div>
                                          <div class="carousel-item">
                                            <img src="{{ asset('images/header-pic-3.jpg') }}" alt="" class="d-block w-100">
                                            <div class="carousel-caption d-none d-md-block">
                                            </div>
                                          </div>
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#headerSlide"
                                        data-bs-slide="prev" onclick="plusTextSlide(-1)">
                                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                          <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#headerSlide"
                                        data-bs-slide="next" onclick="plusTextSlide(1)">
                                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                          <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- NAVBAR -->
                <div id="navbar" class="position-sticky shadow z-3">
                    <a href="/">HOME</a>
                    <a href="{{ url('/about') }}">ABOUT</a>
                    @if(Auth::check())
                        <a href="{{ url('/profile')}}" class="float-end">{{ strToUpper(Auth::user()->name) }}</a>
                        <form action="{{ route('logout') }}" method="POST" id="logout-form" class="d-none">
                            @csrf
                        </form>
                        <a href="{{ route('logout') }}" class="float-end"
                        onclick="event.preventDefault();
                                    if(confirm('Are You sure to log out')){
                                        document.getElementById('logout-form').submit();
                                    }"
                        >
                            LOG OUT
                        </a>
                    @else
                        <a href="{{ url('/login') }}" class="float-end">LOG IN</a>
                        <a href="{{ url('/register') }}" class="float-end">REGISTER</a>
                    @endif
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            {{-- MAIN CONTENT  --}}
                            @yield('content')
                        </div>
                    </div>
                </div>
                {{-- FOOTER  --}}
                <div class="footer">
                    <div class="row justify-content-between">
                        <div class="col-md-5">
                            <div class="about mb-4">
                                <h5 class="mb-3">About This Website</h5>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, cupiditate.
                                    Error quis aut quod mollitia tenetur deleniti? Magni odit quidem recusandae
                                    officia debitis aut! Possimus eaque quas eum consequatur? Ratione?
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="contact mb-5">
                                <h5 class="mb-3">Contact Information</h5>
                                <div>
                                    Phone : 09 900 900 900
                                </div>
                                <div>
                                    Email : yelynnpaing.mm@gmail.com
                                </div>
                                <div>
                                    Address : No.(1) , Latha Street , Latha Tps, Mandalay.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="follow-me mb-5">
                                <h5 class="mb-3">You can follow on : </h5>
                                <div class="social">
                                    <a href="https://facebook.com">
                                        <i class="fab fa-facebook social-icon"></i>
                                    </a>
                                    <a href="https://youtube.com" class="ms-2">
                                        <i class="fab fa-youtube social-icon"></i>
                                    </a>
                                    <a href="https://instragram.com" class="ms-2">
                                        <i class="fab fa-instagram social-icon"></i>
                                    </a>
                                    <a href="https://twitter.com" class="ms-2">
                                        <i class="fab fa-twitter social-icon"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="">
                                <div class="text-center text-white-50">
                                    Power by : Dev Paing
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CUSTOM JS -->
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
