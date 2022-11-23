@extends('web.layout')

@section('title')
    All Posts
@endsection

@section('body')
    <div class="container p-5 mx-auto w-75">
        <div class="text-center mt-5">
            <h2> Display Posts</h2>
        </div>
        <div class="row justify-content-between p-5">
            @foreach ($show as $shows)
                <div class="col-12 col-sm-12 col-md-12 border rounded shadow p-4 mb-3 position-relative">
                    <a href="{{ route('web.profile', $shows->user->id) }}"
                        style="text-decoration:none !important; color:black;">
                        <img src="users/{{ $shows->user->pimage }}" width="50px" height="50px"
                            class="rounded-circle border me-3">
                        <h5 style="display: contents; "> {{ $shows->user->fname }} {{ $shows->user->lname }} </h5>
                    </a>
                    <div class="btn-group" style="float: right;">
                        <a class="" data-bs-toggle="dropdown" aria-expanded="false">
                            @if (Auth::user()->id == $shows->user->id)
                                <i class="fas fa-chevron-down"></i>
                            @endif
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">delete</a></li>
                            <li><a class="dropdown-item" href="#">edit</a></li>
                        </ul>
                    </div>

                    <button style="display: contents;" class="btn btn-outline-info">Follow</button>
                    <h2 class="ms-5 pt-5"> {{ $shows['title'] }} </h2>
                    <p class="ms-5 pt-5"> {{ $shows['descripton'] }} </p>
                    @if ($shows['image'] != null)
                        <img src="uploads/{{ $shows['image'] }}" width="400px" height="" class="p-2 ms-5">
                    @endif
                    <div class="justify-content-md-start d-md-flex ">
                        @foreach ($social as $socials)
                            @if ($socials->post_id == $shows->id)
                                <h2>Likes: {{ $socials->likes_counter }}</h2>
                            @endif
                        @endforeach
                    </div>
                    <div class="justify-content-md-end d-md-flex ">
                        <button class="btn btn-outline-secondary me-md-2">Comment</button>
                        <a href="{{ route('like', [Auth::user()->id, $shows->id]) }}"> <button
                                class="btn btn-outline-danger me-md-2">Favourite</button></a>
                        <button class="btn btn-outline-primary me-md-2">Share</button>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
