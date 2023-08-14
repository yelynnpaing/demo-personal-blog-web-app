@extends('admin-panel.master')
@section('title', 'Edit User')
@section('content')
<div class="container-fluid bg-light py-5 px-4 body-content">
    {{-- EDIT USER  --}}
    <div class="edit-user border shadow-sm rounded-1 p-5 my-3 mx-5">
        <div class="row">
            <div class="col-md-12">
                <h5 class="mb-3 text-success">Edit User</h5>
                <form action="{{ url('admin/users/'.$user->id.'/update') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control" value="{{ $user->name }}" name="name">
                    </div>
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Email</label>
                        <input type="text" class="form-control" value="{{ $user->email }}" name="email">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Status</label>
                        <select name="status" id="" class="form-select">
                            <option value="" >Select Status</option>
                            <option value="admin"
                                @if ($user->status == 'admin') selected @endif >
                                    Admin
                            </option>
                            <option value="user"
                                @if ($user->status == 'user')  selected  @endif >
                                    User
                            </option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


