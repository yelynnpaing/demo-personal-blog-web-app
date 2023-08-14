@extends('admin-panel.master')
@section('content')
    {{-- SKILLS EDIT FORM --}}
    <div class="container-fluid body-content bg-secondary">
        <div class="row">
            <div class="col-md-12">
                <div class="skill-create-form m-5 p-5 border bg-light">
                    <div class="shadow p-5 m-5">
                        <h4 class="mb-4" >Skill Edit Form</h4>
                        <hr>
                        <form action="{{ url('admin/skills/'.$skill->id.'') }}" method="POST" class="mt-5">
                            @csrf
                            @method('PATCH')
                            <div class="form-group mb-4">
                                <label for="" class="form-label mb-2">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" placeholder="Enter Skill Name" value="{{ $skill->name ?? old('name') }}"
                                >
                                @error('name')
                                    <span><small class="text-danger">{{ $message }}</small></span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="form-label mb-2">Percent</label>
                                <input type="text" class="form-control @error('percent') is-invalid @enderror"
                                    name="percent" placeholder="Enter Skill Percent with Number" value="{{ $skill->percent ?? old('percent') }}"
                                >
                                @error('percent')
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
