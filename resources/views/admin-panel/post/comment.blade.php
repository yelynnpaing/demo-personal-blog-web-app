@extends('admin-panel.master')
@section('content')
<div class="container-fluid body-content bg-secondary">
    <div class="row">
        <div class="col-md-12">
            <div class="projects bg-light p-4 m-5">
                <h2 class="text-success">
                    Comments
                    <hr class="mt-2">
                </h2>
                @if (session('successMsg'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <div>{{ session('successMsg') }}</div>
                        <button class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                <table class="table table-bordered table-hover shadow-sm">
                    <thead class="bg-secondary">
                        <tr class="text-white">
                            <th>No.</th>
                            <th>Comments</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $index=>$comment)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $comment->comment }}</td>
                                <td>
                                    <form action="{{ url('admin/posts/'.$comment->id.'/show_hide') }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                        class="btn btn-sm {{ $comment->status == 'show' ? 'btn-danger' : 'btn-success' }}">
                                            <i class="fa-solid {{ $comment->status == 'show' ? 'fa-eye-low-vision' : 'fa-eye'}}"></i>
                                            {{ $comment->status == 'show' ? 'hide' : 'show'; }}
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
