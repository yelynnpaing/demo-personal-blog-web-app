@extends('ui-panel.master')
@section('content')
    <div class="row mt-5 main-content">
        <!-- POSTS  -->
        <div class="col-lg-8 col-md-8 posts">
            @foreach ($posts as $post)
                <div class="post mb-3 mt-3">
                    <img src="{{ asset('storage/post-images/'.$post->image) }}" alt="web-deb">
                    <h4 class="mt-3">{{ $post->title }}</h4>
                    <P>{{ substr($post->content, 0, 250) }}.... </P>
                    <a href="{{ url('/posts/'.$post->id.'/detail') }}">
                        <button class="btn btn-sm btn-info rounded-1 text-white">
                            Read more
                            <i class="fa-solid fa-angles-right"></i>
                        </button>
                    </a>
                    <hr>
                </div>
            @endforeach
            {{ $posts->links() }}
        </div>
        <!-- CATEGORY  -->
        <div class="col-lg-4 col-md-4">
            <div class="category">
                <form action="{{ url('/search_data') }}" method="GET">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="search_data" class="form-control" placeholder="search ....">
                        <button class="btn btn-success text-white" type="submit">
                            <i class="fas fa-search"></i>
                            Click
                        </button>
                    </div>
                </form>
                <hr>
                <div class="">
                    <h5>Categories</h5>
                    <ul class="border p-3">
                        @foreach ($categories as $category)
                            <li class="category-list">
                                <a href="{{ url('search_by_category/'.$category->id) }}" class="text-decoration-none btn bg-primary-subtle mb-2">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
