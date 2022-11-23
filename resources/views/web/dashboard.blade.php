@if(Auth::check())

@extends('web.layout')
@section('title')
Dashboard
@endsection

@section('body')
<div class="d-flex">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
        <a href="/home" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-4">Profile</span>
        </a>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="users/{{ Auth::user()->pimage }}" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong>{{ Auth::user()->name }}</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="#">New Post</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="/logout">logout</a></li>
            </ul>
        </div>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="#" class="nav-link text-white">
                    Home
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white">
                    My Posts
                </a>
            </li>
            <li>
                <a href="/show" class="nav-link text-white">
                    Explore
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    Ex2
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    Ex3
                </a>
            </li>
        </ul>
    </div>
{{-- {{dd(Auth::user())}} --}}
    <div class="container p-5 mx-auto w-75">
        <div class="text-center mt-5">
            <h2> My Posts</h2>
        </div>
        <div class="row justify-content-between p-5">
            <div class="col-12 col-sm-12 col-md-12 border rounded shadow p-4 mb-3 position-relative">
                <img src="users/{{ Auth::user()->pimage }}" width="50px" height="50px" class="rounded-circle border me-3">
                <h5 style="display: contents;"> {{ Auth::user()->name }} </h5>

                <div class="btn-group" style="float: right;">
                    <a class="" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-chevron-down"></i> </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">delete</a></li>
                        <li><a class="dropdown-item" href="#">edit</a></li>
                    </ul>
                </div>

                <button style="display: contents;" class="btn btn-outline-info">Follow</button>
                <h2 class="ms-5 pt-5"> {{ Auth::user()->title }} </h2>
                <img src="uploads/{{ Auth::user()->image }}" width="400px" height="" class="p-2 ms-5">
                <div class="justify-content-md-end d-md-flex ">
                    <button class="btn btn-outline-secondary me-md-2">Comment</button>
                    <button class="btn btn-outline-danger me-md-2">Favourite</button>
                    <button class="btn btn-outline-primary me-md-2">Share</button>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@elseif(!Auth::check())
<script>
    window.location = "/login";
</script>
@endif
