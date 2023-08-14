<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        body{
            padding: 0;
            margin:0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }
        .body-content, .side-bar{
            margin-top: 80px;
        }
        .spinner{
            color: rgb(0, 83, 128);
            animation: gear-rotate 5s infinite;
        }
        @keyframes gear-rotate {
            50% {transform: rotate(360deg)}
        }
        .main-row{
            width: 100%
        }
        .main{
            padding-left: 257px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
       <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="row g-0 mt-3">
                {{-- SIDE BAR  --}}
                <div class="col-2 position-fixed ps-0">
                    <div class="bg-light side-bar">
                        <ul class="list-group">
                            <li class="list-group-item d-none d-lg-inline">
                                CONTROLS
                            </li>
                            <a href="{{ url('admin/dashboard') }}" class="list-group-item list-group-item-action active text-decoration-none text-light">
                                <i class="fa-solid fa-home me-2"></i>
                                <span class="d-none d-lg-inline">Dashboard</span>
                            </a>
                            <a href="{{ url('admin/users') }}" class="list-group-item list-group-item-action text-decoration-none">
                                <i class="fa-solid fa-users me-2"></i>
                                <span class="d-none d-lg-inline">Users</span>
                                <span class="badge bg-danger float-end d-none d-lg-inline">100 <sup>+</sup></span>
                            </a>
                            <a href="{{ url('admin/skills') }}" class="list-group-item list-group-item-action text-decoration-none">
                                <i class="fa-solid fa-chart-line me-2"></i>
                                <span class="d-none d-lg-inline">Skills</span>
                            </a>
                            <a href="{{ url('admin/projects') }}" class="list-group-item list-group-item-action text-decoration-none">
                                <i class="fa-solid fa-flag me-2"></i>
                                <span class="d-none d-lg-inline">Projects</span>
                            </a>
                            <a href="{{ route('certificates.index') }}" class="list-group-item list-group-item-action text-decoration-none">
                                <i class="fa-solid fa-certificate me-2"></i>
                                <span class="d-none d-lg-inline">Certificates</span>
                            </a>
                            <a href="{{ route('categories.index') }}" class="list-group-item list-group-item-action text-decoration-none">
                                <i class="fa-solid fa-rectangle-list me-2"></i>
                                <span class="d-none d-lg-inline">Category</span>
                            </a>
                            <a href="{{ route('posts.index') }}" class="list-group-item list-group-item-action text-decoration-none">
                                <i class="fa-solid fa-newspaper me-2"></i>
                                <span class="d-none d-lg-inline">Posts</span>
                            </a>
                        </ul>
                        <ul class="list-group mt-5">
                            <li class="list-group-item list-group-item-action d-none d-lg-inline">ACTIONS</li>

                            <a href="#" class="list-group-item list-group-item-action text-decoration-none">
                                <i class="fa-solid fa-pen-to-square me-2"></i>
                                <span class="d-none d-lg-inline">Update Data</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action text-decoration-none">
                                <i class="fa-regular fa-calendar-days me-2"></i>
                                <span class="d-none d-lg-inline">Add Events</span>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="col-10 w-100">
                    {{-- NAV BAR  --}}
                    <nav class="navbar navbar-expand bg-light fixed-top shadow">
                        <div class="container-fluid py-1">
                            <a href="{{ url('admin/dashboard') }}" class="text-decoration-none">
                                <h4 class="d-flex align-items-center justify-content-center py-3 ms-3 ">
                                    <i class="fa-solid fa-user-secret"></i>
                                    <div class="ps-2 d-none d-lg-inline">Admin Pannel</div>
                                </h4>
                            </a>
                            <div class="flex-fill"></div>
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" >
                                        <i class="fa-solid fa-user-circle fs-4 pe-2"></i>
                                        {{Auth::user()->name}}
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li class="dropdown-item">
                                            <a href="{{ url('/') }}" class="text-decoration-none">
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
                                        <i class="fa-solid fa-gear fs-4 spinner"></i>
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
                        <h6 class="d-block text-center my-5 text-black-50">Powerby Dev Py</h6>
                    </div>
                </footer>
            </div>
        </div>
       </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
