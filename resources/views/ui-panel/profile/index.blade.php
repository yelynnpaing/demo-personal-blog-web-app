@extends('ui-panel.master')
@section('content')
    <div class="row justify-content-center my-5">
        <div class="col-md-7">
            <div class="d-flex flex-column border p-5">
                <div class="mb-2">
                    <h4 class="fw-bold text-start">Your Profile</h4>
                    <hr>
                </div>
                <a href="{{ url('/password_edit') }}" type="button" class="btn btn-outline-primary d-inline-block ms-auto mb-3">Change Password</a>
               <div class="">
                    <div class="mb-4">
                        <label for="name" class="mb-3">Name : </label>
                        <input type="text" class="form-control mb-3 not-allowed" name="name" value="{{ $user->name }}" readonly>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="mb-3">Email : </label>
                        <input type="email" class="form-control mb-3 not-allowed" name="email" value="{{ $user->email }}" readonly>
                    </div>
               </div>
            </div>
        </div>
    </div>

@endsection
