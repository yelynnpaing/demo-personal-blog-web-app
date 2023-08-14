@extends('admin-panel.master')
@section('content')
<div class="container-fluid body-content bg-secondary">
    <div class="row">
        <div class="col-md-12">
            <div class="category-create bg-light m-5 p-5">
               <div class="row m-5 p-5 border shadow">
                <div class="col-md-12">
                    <h4>Category Create Form</h4>
                    <hr>
                    <form action="{{ route('categories.store') }}" method="POST" class="mt-5">
                        @csrf
                        <div class="form-gruop mb-5">
                            <label for="" class="form-label mb-3">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Category Name" autofocus
                            >
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button class="btn btn-sm btn-primary" type="submit">Create</button>
                    </form>
                </div>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection
