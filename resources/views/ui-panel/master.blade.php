<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- BOOTSTRAP CSS --->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
    crossorigin="anonymous">
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- FONTAWSOME CSS  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <!-- HEADER -->
                <div class="header">
                    <div class="row justify-content-evenly align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <div class="head-text">
                                <i class="fa-solid fa-hands-clapping text-warning mb-3 spinner"
                                    style="font-size:50px;" id="handShape"></i>
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
                        <div class="col-lg-6 col-md-6">
                            <div class="head-pic mb-4">
                                <img src="{{ asset('images/header-pic.png') }}" alt="" id="header-pic" class="shadow rounded">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- NAVBAR -->
                <div id="navbar" class="position-sticky shadow z-3">
                    <a href="/">HOME</a>
                    <a href="{{ url('/about') }}">ABOUT ME</a>
                    {{-- <a href="{{ url('/posts') }}">BLOGs</a> --}}
                    @if(Auth::check())
                        <a href="{{ url('admin/dashboard')}}" class="float-end">{{ strToUpper(Auth::user()->name) }}</a>
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
                                    Email : yelynnpy@gmail.com
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
                                    Power by : Dev Py
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
    <!-- CUSTOM JS -->
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
