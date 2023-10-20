@extends('admin-panel.master')
@section('title', 'Blog Admin Dashboard')
@section('content')
<div class="container-fluid body-content bg-secondary">
    <div class="row">
        <div class="col-md-12">
            <div class="projects bg-light p-3 my-2">
                <h2 class="text-success">
                    Posts
                    <hr class="mt-2">
                </h2>
                @if (session('successMsg'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <div>{{ session('successMsg') }}</div>
                        <button class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                <a href="{{ route('posts.create') }}" class="btn rounded btn-outline-primary mb-4 float-end">
                    <i class="fa fa-plus-circle"></i>
                    Add New Post
                </a>
                <table class="table table-bordered table-hover shadow-sm">
                    <thead class="bg-secondary">
                        <tr class="text-white">
                            <th>ID</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->category->name }}</td>
                                <td>
                                    <img src="{{ asset('storage/post-images/'.$post->image) }}" alt="" height="70px">
                                </td>
                                <td>{{ $post->title }}</td>
                                <td><textarea readonly>{{ $post->content }}</textarea></td>
                                <td>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-success btn-sm">
                                            <i class="far fa-edit"></i>
                                            Edit
                                        </a>
                                        <button class="btn btn-sm btn-danger" type="submit"
                                            onclick="return confirm('Are you sure want to delete this category ?')">
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </button>
                                        <a href="{{ url('admin/posts/'.$post->id) }}" class="btn btn-info btn-sm text-white">
                                            <i class="fas fa-comments"></i>
                                            Cmts
                                        </a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
