@extends('admin-panel.master')
@section('title', 'Blog Admin Dashboard')
@section('content')
    {{-- CERTIFICATE EDIT FORM --}}
    <div class="container-fluid body-content bg-secondary">
        <div class="row">
            <div class="col-md-12">
                <div class="skill-create-form m-5 p-5 border bg-light">
                    <div class="shadow p-5 m-5">
                        <h4 class="" >Certificate Edit Form</h4>
                        <hr>
                        <form action="{{ route('certificates.update', $certificate->id) }}" method="POST" class="mt-5">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="" class="form-label mb-2">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" placeholder="Enter Skill Name" value="{{ $certificate->name ?? old('name') }}"
                                >
                                @error('name')
                                    <span><small class="text-danger">{{ $message }}</small></span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="form-label mb-2">Count</label>
                                <input type="number" class="form-control @error('count') is-invalid @enderror"
                                    name="count" placeholder="Enter Count" value="{{ $certificate->count ?? old('count') }}"
                                >
                                @error('count')
                                    <span><small class="text-danger">{{ $message }}</small></span>
                                @enderror
                            </div>
                            <button class="btn btn-primary" type="submit">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
