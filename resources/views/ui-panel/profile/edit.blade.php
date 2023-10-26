@extends('ui-panel.master')
@section('content')
    <div class="row justify-content-center my-5">
        <div class="col-md-7 border p-5">
            <div class="mb-5">
                <h4 class="fw-bold text-start">Change Password</h4>
                <hr>
            </div>
            @if (session('successMsg'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <small>{{ session('successMsg') }}</small>
                    <button class="btn btn-close" data-bs-dismiss="alert"></button>
                </div>
            @elseif(session('errorMsg'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <small>{{ session('errorMsg') }}</small>
                    <button class="btn btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            <form action="{{ url('/password_update') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="old_password" class="mb-3">Old Password : </label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password"
                        id="old_password" placeholder="old Password">
                        <i class="fa-solid fa-eye-low-vision input-group-text mb-0 old_eye" type="button" onclick="showHideOldPw()"></i>
                    </div>
                    @error('old_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="new_password" class="mb-3">New Password : </label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" id="new_password"
                        placeholder="New Password">
                        <i class="fa-solid fa-eye-low-vision input-group-text mb-0 new_eye" type="button" onclick="showHideNewPw()"></i>
                    </div>
                    @error('new_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="cnew_password_confirmation" class="mb-3">Old Password : </label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="new_password_confirmation" id="confirmed_password" placeholder="Confirmed New Password">
                        <i class="fa-solid fa-eye-low-vision input-group-text mb-0 confirmed_eye" type="button" onclick="showHideConfirmPw()"></i>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>

@endsection
