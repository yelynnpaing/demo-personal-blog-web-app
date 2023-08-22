@extends('ui-panel.master')
@section('content')
     {{-- MAIN CONTENT  --}}
     <div class="aboutme my-5">
        <div class="row justify-content-center min-vh-90">
            <!-- ABOUT ME  -->
            <div class="col-lg-5 col-md-5" id="aboutMe">
                <div class="aboutMe">
                        <h3 class="text-center">ABOUT ME</h3>
                        <hr>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere cupiditate
                            minus itaque laudantium ipsum, ea culpa? Vitae ipsum saepe ducimus iure
                            veniam molestiae sunt, necessitatibus dolor, et cum dolorum impedit.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere cupiditate
                            minus itaque laudantium ipsum, ea culpa? Vitae ipsum saepe ducimus iure
                            veniam molestiae sunt, necessitatibus dolor, et cum dolorum impedit.
                        </p>
                        <div class="row mt-4">
                            <div class="col-lg-6 col-md-6 mb-2">
                                <div class="total-project">
                                    <i class="fa-solid fa-diagram-project text-success fs-2"></i>
                                    <strong class="pt-2 pb-1">{{ $projects->count() }} <sup>+ +</sup></strong>
                                    <div>Web Development Total Projects</div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 mb-3">
                                <div class="total-student">
                                    <i class="fa-solid fa-code text-success fs-2"></i>
                                    <strong class="pt-2 pb-1">{{ $certificates->count() }} <sup>+ +</sup></strong>
                                    <div>IT Diploma & Certifiactes</div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-lg-1 col-md-1"></div>
            <div class="col-lg-4 col-md-4">
                <img src="{{ asset('images/aboutMePic.png') }}" alt="">
            </div>
        </div>
        {{-- SKILLS  --}}
        <div class="skills mt-5">
            <h3 class="text-center">SKILLS</h3>
            <hr>
            <div class="row mt-5 justify-content-center">
                <div class="col-lg-5 col-md-5 mb-4">
                    <img src="{{ asset('images/skills.png') }}" alt="" class="spinner-skills">
                </div>
                <div class="col-lg-5 col-md-5" id="mySkills">
                    <div class="right">
                            <div class="row">
                                @foreach ($skills as $skill)
                                    <div class="col-lg-12 col-md-12">
                                        <div class="d-flex align-items-center mb-4">
                                            <div class="col-md-8 col-8">
                                                <div class="progress">
                                                    <div class="progress-bar" style="width: {{ $skill->percent }}%;">
                                                        {{ $skill->percent }} %
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-4 text-center">{{ $skill->name }}</div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- PROJECTS  --}}
    <div class="my-projects">
        <div class="row mt-5">
            <h2 class="text-center my-4">
                Projects
                <hr>
            </h2>
            @foreach ($projects as $project)
                <div class="col-lg-6 col-md-4 mb-4">
                    <div class="project-card">
                        <a href="{{ $project->url }}" class="text-decoration-none" target="_blank">
                            <div class="card bg-dark-subtle shadow-sm ">
                                <div class="card-body">
                                    <img src="{{ asset('storage/project-images/'.$project->image) }}"
                                    alt="" class="card-img mb-3" style="height: 300px">
                                    <a href="{{ $project->url }}" class="btn btn-sm btn-primary text-decoration-none float-end" target="_blink">
                                        Live Preview
                                    </a>
                                </div>
                                <div class="card-footer text-muted">
                                    <div class="d-flex justify-content-between">
                                        <div class="">
                                            <h5 class="mb-0">{{ $project->name }}</h5>
                                            <small>created by Dev Py</small>
                                        </div>
                                        <div class="">
                                            <i class="fa-solid fa-star text-primary"></i>
                                            <i class="fa-solid fa-star text-primary"></i>
                                            <i class="fa-regular fa-star"></i>
                                            <i class="fa-regular fa-star"></i>
                                            <i class="fa-regular fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- LATEST POST FROM BLOGS  -->
    <div class="latest-post">
        <div class="row mt-5">
            <h3 class="text-center mb-4">Latest Posts from Blogs</h3>
            <hr>
            <p class="">
                Hello ! Welcome from my interesting blogs. You can read about website developing technologies
                articles and more technologies. Enjoys and hoping with beautiful mindset for you....
            </p>
            @foreach ($posts as $post)
                <div class="col-md-4 mb-3">
                    <a href="{{ url('posts/'.$post->id.'/detail') }}">
                        <img src="{{ asset('storage/post-images/'.$post->image) }}" alt="" class="latest-post-img mb-2">
                        <small>{{ date('d, M, Y', strtotime($post->created_at)) }} | by Dev Py </small>
                        <h4 class="mt-2">{{ $post->title }}</h4>
                        <p>
                            {{ substr($post->content, 0, 250) }}....
                        </p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection

