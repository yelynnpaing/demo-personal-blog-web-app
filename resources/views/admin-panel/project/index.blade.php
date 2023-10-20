@extends('admin-panel.master')
@section('title', 'Blog Admin Dashboard')
@section('content')
    {{-- PROJECTS  --}}
    <div class="container-fluid body-content bg-secondary">
        <div class="row">
            <div class="col-md-12">
                <div class="projects bg-light m-5 p-5">
                    <h2 class="text-success">
                        Projects
                        <hr class="mt-2">
                    </h2>
                    @if (session('successMsg'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <div>{{ session('successMsg') }}</div>
                            <button class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    <a href="{{ url('admin/projects/create') }}" class="btn rounded btn-outline-primary mb-4 float-end">
                        <i class="fa fa-plus-circle"></i>
                        Add New Project
                    </a>
                    <table class="table table-bordered table-hover shadow-sm">
                        <thead class="bg-secondary">
                            <tr class="text-white">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Project</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($projects as $project)
                            <tr>
                                <td>{{ $project->id }}</td>
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->url }}</td>
                                <td>
                                    <img src="{{ asset('storage/project-images/'.$project->image) }}" alt="" style="width: 90px">
                                </td>
                                <td>
                                    <form action="{{ url('admin/projects/'.$project->id.'') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ url('admin/projects/'.$project->id.'/edit') }}" class="btn btn-sm btn-success">
                                            <i class="fa fa-edit"></i>
                                            Edit
                                        </a>
                                        <button class="btn btn-sm btn-danger" type="submit"
                                        onclick="return confirm('Are you sure want to delete ?')"
                                        >
                                            <i class="fa fa-trash"></i>
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                    {{ $projects->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
