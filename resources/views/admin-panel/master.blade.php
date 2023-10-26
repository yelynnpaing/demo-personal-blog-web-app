<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('images/ylp-favicon.png') }}" type="image/x-icon">
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- BOOTSTRAP CSS AND JS -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- FONTAWSOME CSS  -->
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.4.2-web/css/all.min.css') }}">
    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,300;1,500;1,700&display=swap" rel="stylesheet">
    <style>
        body{
            padding: 0;
            margin:0;
            box-sizing: border-box;
            font-size: 17px;
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
       <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="row g-0 mt-3">
                {{-- SIDE BAR  --}}
                <div class="col-md-2 ps-0 side-main">
                    <div class="bg-light ">
                        <ul class="list-group side-bar" id="sideBar">
                            <li class="list-group-item side-label">
                                CONTROLS
                            </li>
                            <a href="{{ url('admin/dashboard') }}" class="list-group-item list-group-item-action bg-success text-decoration-none text-light">
                                <i class="fa-solid fa-home me-2"></i>
                                <span class="side-label">Dashboard</span>
                            </a>
                            <a href="{{ url('admin/users') }}" class="list-group-item list-group-item-action text-decoration-none">
                                <i class="fa-solid fa-users me-2"></i>
                                <span class="side-label">Users</span>
                                <span class="badge bg-danger float-end side-label">100 <sup>+</sup></span>
                            </a>
                            <a href="{{ url('admin/skills') }}" class="list-group-item list-group-item-action text-decoration-none">
                                <i class="fa-solid fa-chart-line me-2"></i>
                                <span class="side-label">Skills</span>
                            </a>
                            <a href="{{ url('admin/projects') }}" class="list-group-item list-group-item-action text-decoration-none">
                                <i class="fa-solid fa-flag me-2"></i>
                                <span class="side-label">Projects</span>
                            </a>
                            <a href="{{ route('certificates.index') }}" class="list-group-item list-group-item-action text-decoration-none">
                                <i class="fa-solid fa-certificate me-2"></i>
                                <span class="side-label">Certificates</span>
                            </a>
                            <a href="{{ route('categories.index') }}" class="list-group-item list-group-item-action text-decoration-none">
                                <i class="fa-solid fa-rectangle-list me-2"></i>
                                <span class="side-label">Category</span>
                            </a>
                            <a href="{{ route('posts.index') }}" class="list-group-item list-group-item-action text-decoration-none">
                                <i class="fa-solid fa-newspaper me-2"></i>
                                <span class="side-label">Posts</span>
                            </a>
                        </ul>
                        <ul class="list-group mt-5 side-bar">
                            <li class="list-group-item list-group-item-action side-label">ACTIONS</li>

                            <a href="#" class="list-group-item list-group-item-action text-decoration-none">
                                <i class="fa-solid fa-pen-to-square me-2"></i>
                                <span class="side-label">Update Data</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action text-decoration-none">
                                <i class="fa-regular fa-calendar-days me-2"></i>
                                <span class="side-label">Add Events</span>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="col-md-10" id="navBar">
                    {{-- NAV BAR  --}}
                    <nav class="navbar navbar-expand bg-light fixed-top shadow">
                        <div class="container-fluid py-1">
                            <a href="{{ url('admin/dashboard') }}" class="text-decoration-none" id="brand">
                                <h4 class="d-flex align-items-center justify-content-center py-3 ms-3 ">
                                    <i class="fa-solid fa-user-secret"></i>
                                    <div class="ps-2 side-label">Admin Pannel</div>
                                </h4>
                            </a>
                            <span type="button" id="sidebarToggler" onclick="sidebarToggle()"><i class="ps-4 fw-bold fs-3 fa-solid fa-bars"></i></span>
                            <div class="flex-fill"></div>
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" >
                                        <i class="fa-solid fa-user-circle fs-4 pe-2"></i>
                                        {{Auth::user()->name}}
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li class="dropdown-item">
                                            <a href="{{ url('admin/profile') }}" class="text-decoration-none">
                                                <i class="fas fa-user-circle text-success"></i>
                                                Profile
                                            </a>
                                        </li>
                                        <li class="dropdown-item">
                                            <form action=" {{ route ('logout') }}" method="POST" id="logout-form" class="d-none">
                                                @csrf
                                            </form>
                                            <a href="{{ route('logout') }}" class="text-decoration-none"
                                                onclick = "event.preventDefault();
                                                            if(confirm('Are you sure you want to logout')){
                                                                document.getElementById('logout-form').submit();
                                                            }">
                                                <i class="fas fa-sign-out text-warning"></i>
                                                Logout
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fa-solid fa-gear fs-4 spinner-gear"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="main">
                        @yield('content')
                    </div>
                </div>
                <footer class="admin-footer">
                    <div class="p-5">
                        <h6 class="d-block text-center my-5 text-black-50">Powerby Dev Paing</h6>
                    </div>
                </footer>
            </div>
        </div>
       </div>
    </div>

<!-- CUSTOM JS -->
<script src="{{ asset('js/admin-dashboard.js') }}"></script>
</body>
</html>
