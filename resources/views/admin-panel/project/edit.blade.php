@extends('admin-panel.master')
@section('content')
    {{-- PROJECT EDIT FORM --}}
    <div class="container-fluid body-content bg-secondary">
        <div class="row">
            <div class="col-md-12">
                <div class="skill-create-form m-5 p-5 border bg-light">
                    <div class="shadow p-5 m-5">
                        <h4 class="mb-4" >Project Edit Form</h4>
                        <hr>
                        <form action="{{ url('admin/projects/'.$project->id.'') }}" method="POST" class="mt-5"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group mb-4">
                                <label for="" class="form-label mb-2">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" placeholder="Enter Skill Name" value="{{ $project->name ?? old('name') }}"
                                >
                                @error('name')
                                    <span><small class="text-danger">{{ $message }}</small></span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="form-label mb-2">URL</label>
                                <input type="text" class="form-control @error('url') is-invalid @enderror"
                                    name="url" placeholder="Enter Project URL" value="{{ $project->url ?? old('url') }}"
                                >
                                @error('url')
                                    <span><small class="text-danger">{{ $message }}</small></span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="" class="form-label mb-2 d-block">Image</label>
                                <input type="file" name="image" class="">
                                <img src="{{ asset('storage/project-images/'.$project->image) }}" alt=""
                                class="my-2 shadow d-block" style="width: 100px">
                                @error('image')
                                    <div class=""><small class="text-danger">{{ $message }}</small></div>
                                @enderror
                            </div>
                            <button class="btn btn-primary" type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
