@extends('admin-panel.master')
@section('title', 'Blog Admin Dashboard')
@section('content')
<div class="container-fluid body-content bg-secondary">
    <div class="row">
        <div class="col-md-12">
            <div class="projects bg-light m-5 p-5">
                <h2 class="text-success">
                    Categories
                    <hr class="mt-2">
                </h2>
                @if (session('successMsg'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <div>{{ session('successMsg') }}</div>
                        <button class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                <a href="{{ route('categories.create') }}" class="btn rounded btn-outline-primary mb-4 float-end">
                    <i class="fa fa-plus-circle"></i>
                    Add New Category
                </a>
                <table class="table table-bordered table-hover shadow-sm">
                    <thead class="bg-secondary">
                        <tr class="text-white">
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-success btn-sm">
                                            <i class="far fa-edit"></i>
                                            Edit
                                        </a>
                                        <button class="btn btn-sm btn-danger" type="submit"
                                        onclick="return confirm('Are you sure want to delete this category ?')">
                                        Delete
                                    </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
