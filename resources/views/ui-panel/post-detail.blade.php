@extends('ui-panel.master')
@section('content')
    <div class="post-detail">
        <img src="{{ asset('storage/post-images/'.$post->image) }}" alt=""
        class="shadow-sm w-75">
        <div class="">
            <strong class="me-1">
                <i class="fa-solid fa-calendar-days"></i>
                <span class="ms-1">Posted on :</span>
            </strong>
            {{ date('d, M, Y', strtotime($post->created_at) ) }}
        </div>
        <div class="">
            <strong class="me-1">
                <i class="fas fa-user"></i>
                <span class="ms-1">Author :</span>
            </strong>
            Dev Py
        </div>
        <div class="mb-3">
            <strong class="me-1">
                <i class="fa-solid fa-briefcase"></i>
                <span class="ms-1">Category :</span>
            </strong>
            {{ $post->category->name }}
        </div>
        <h5>
            {{ $post->title }}
        </h5>
        <p>
            {{ $post->content }}
        </p>
        <form action="" method="POST">
            @csrf
            <div class="">
                <span class="me-4">{{ $likes->count() }} Likes</span>
                <span class="me-4">{{ $dislikes->count() }} Disikes</span>
                <span class="me-4">{{ $comments->count() }} Comments</span>

            </div>
            <button type="submit" formaction="{{ url('/post/like/'.$post->id) }}"
                class="btn btn-sm rounded-2 btn-success me-2"
                @if(Auth::check())
                    @if ($likeStatus)
                        @if ($likeStatus->type == 'like')
                            disabled
                        @endif
                    @endif
                @endif
            >
                <i class="fas fa-thumbs-up me-2"></i>
                Like
            </button>
            <button type="submit" formaction="{{ url('/post/dislike/'.$post->id) }}"
                class="btn btn-sm rounded-2 btn-danger me-2"
                @if(Auth::check())
                    @if ($dislikeStatus)
                        @if ($dislikeStatus->type == 'dislike')
                            disabled
                        @endif
                    @endif
                @endif
            >
                <i class="fas fa-thumbs-down me-2"></i>
                Dislike
            </button>
            <button type="button" class="btn btn-sm rounded-2 btn-primary" data-bs-toggle="collapse"
            data-bs-target="#commentSection" aria-expanded="false" aria-controls="commentSection">
                <i class="fas fa-comment me-2"></i>
                Comments
            </button>
        </form>
        <div class="collapse comment-section mt-4" id="commentSection">
            <form action="{{ url('/post/comment/'.$post->id) }}" method="POST">
                @csrf
                    <textarea name="comment" id="" cols="" rows="3"
                    class="form-control w-25" required placeholder="write your comment..."></textarea>
                    <button class="btn btn-sm btn-primary mt-2" type="submit">
                        <i class="fa-solid fa-paper-plane"></i>
                        Submit
                    </button>
            </form>
            <div class="mt-4">
                @foreach ($comments as $comment)
                        <div class="mb-3">
                            <i class="fa-solid fa-user-circle fs-2"></i>
                            <span>{{ $comment->user->name }}</span>
                            <div class="comment">{{ $comment->comment }}</div>
                        </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
