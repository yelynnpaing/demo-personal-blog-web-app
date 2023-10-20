@extends('admin-panel.master')
@section('title', 'Blog Admin Dashboard')
@section('content')
    <div class="container-fluid bg-secondary py-5 px-4 body-content">
        {{-- VISITOR COUNT  --}}
        <h3 class="text-light">
            Quick Stats
            <hr class="text-white">
        </h3>
        <div class="visitor-count mt-4">
            <div class="row g-2 flex-column flex-lg-row mb-5">
                <div class="col-12 col-lg-3">
                    <div class="bg-light p-4 rounded-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h3 class="text-success">1,100</h3>
                            <i class="fa-solid fa-circle-user text-success fs-1"></i>
                        </div>
                        <i class="fas fa-chart-line text-primary"></i>
                        <small>Daily Visitors</small>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="bg-light p-4 rounded-2 mb-3">
                        <div class="d-flex justify-content-between mb-3">
                            <h3 class="text-success">7,100</h3>
                            <i class="fa-solid fa-circle-user text-success fs-1"></i>
                        </div>
                        <i class="fas fa-chart-line text-primary"></i>
                        <small>Weekly Visitors</small>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="bg-light p-4 rounded-2 mb-3">
                        <div class="d-flex justify-content-between mb-3">
                            <h3 class="text-success">123,100</h3>
                            <i class="fa-solid fa-circle-user text-success fs-1"></i>
                        </div>
                        <i class="fas fa-chart-line text-primary"></i>
                        <small>Monthly Visitors</small>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="bg-light p-4 rounded-2 mb-3">
                        <div class="d-flex justify-content-between mb-3">
                            <h3 class="text-success">453,100</h3>
                            <i class="fa-solid fa-circle-user text-success fs-1"></i>
                        </div>
                        <i class="fas fa-chart-line text-primary"></i>
                        <small>Yearly Visitors</small>
                    </div>
                </div>
            </div>
        </div>
        {{-- USERS --}}
        <div class="users">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="mb-1 text-white">
                        Users Table
                        <hr>
                    </h3>
                    @if (session('successMsg'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('successMsg') }}
                            <button class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    <table class="table table-bordered table-hover table-light mt-4">
                        <thead class="">
                            <tr class="">
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->status }}</td>
                                    <td>
                                        <form action="{{ url('admin/users/'.$user->id.'/delete') }}" method="POST">
                                            @csrf
                                            <a href="{{ url('admin/users/'.$user->id.'/edit') }}"
                                                class="btn btn-sm btn-success">
                                                <i class="far fa-edit"></i>
                                                Edit
                                            </a>
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to delete ?')" >
                                                <i class="fa-solid fa-trash"></i>
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection



