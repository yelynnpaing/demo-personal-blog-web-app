@extends('admin-panel.master')
@section('content')
<div class="container-fluid body-content bg-secondary">
    <div class="row">
        <div class="col-md-12">
            <div class="post-create bg-light m-5 p-5">
               <div class="row m-5 p-5 border shadow">
                <div class="col-md-12">
                    <h4 class="">New Post Creation Form</h4>
                    <hr>
                    <form action="{{ route('posts.store') }}" method="POST" class="mt-5" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="" class="form-label mb-2">Category : </label>
                            <select name="category_id" id="" class="form-select">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="" class="form-label mb-2">Picture :</label>
                            <input type="file" class="form-control" name="image">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="" class="form-label mb-2">Name : </label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                placeholder="Enter post Title" value="{{ old('title') }}"
                            >
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="" class="form-label mb-2">Content : </label>
                            <textarea name="content" id="" rows="4"  class="form-control @error('content') is-invalid @enderror"
                            placeholder="Message...">{{ old('content') }}</textarea>
                            @error('content')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button class="btn btn-primary btn-sm" type="submit">Create</button>
                    </form>
                </div>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection
