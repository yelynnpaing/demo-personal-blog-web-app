@extends('admin-panel.master')
@section('title', 'Blog Admin Dashboard')
@section('content')
<div class="container-fluid body-content bg-secondary">
    <div class="row">
        <div class="col-md-12">
            <div class="post-edit bg-light m-5 p-5">
               <div class="row m-5 p-5 border shadow">
                <div class="col-md-12">
                    <h4>Post Edit Form</h4>
                    <hr>
                    <form action="{{ route('posts.update', $post->id) }}" method="POST" class="mt-5"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="mb-4">
                            <label for="" class="form-label mb-2">Category : </label>
                            <select name="category_id" id="" class="form-select">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="" class="form-label mb-2">Picture :</label>
                            <input type="file" class="form-control" name="image">
                            <img src="{{ asset('storage/post-images/'.$post->image) }}" alt=""
                            style="width: 100px" class="mt-3 border p-2" >
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="" class="form-label mb-2">Name : </label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                placeholder="Enter post Name" value="{{ $post->title ?? old('title') }}"
                            >
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="" class="form-label mb-2">Content : </label>
                            <textarea name="content" rows="5" class="form-control @error('content') is-invalid @enderror"
                             placeholder="Message...">{{ $post->content ?? old('content') }}</textarea>
                            @error('content')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button class="btn btn-sm btn-primary" type="submit">Update</button>
                    </form>
                </div>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection

<div class="">

</div>
