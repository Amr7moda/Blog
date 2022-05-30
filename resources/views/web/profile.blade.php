@extends('web.layout')

@section('title')
profile
@endsection

@section('body')

<div class="container mt-4">
  <div class="main-body">
    <div class="row gutters-sm">

      <div class="col-md-4 mb-3">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
              @foreach($users as $user)
              <img src="/users/{{$user['pimage']}}" alt="Admin" class="rounded-circle" width="150">
              <div class="mt-3">
                <h4>{{$user['fname']}}</h4>
                <p class="text-secondary mb-1">{{$user['job']}}</p>
                <p class="text-muted font-size-sm">{{$user['address']}}</p>
                <button class="btn btn-primary">Follow</button>
                <button class="btn btn-outline-primary">Message</button>
                @endforeach
              </div>
            </div>
          </div>
        </div>

        <div class="card mt-3">
          <ul class="list-group list-group-flush">

            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline">
                  <circle cx="12" cy="12" r="10"></circle>
                  <line x1="2" y1="12" x2="22" y2="12"></line>
                  <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                </svg>Website</h6>
              <span class="text-secondary">https://@unknown.com</span>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info">
                  <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                </svg>Twitter</h6>
              <span class="text-secondary">@unknown</span>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger">
                  <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                  <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                  <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                </svg>Instagram</h6>
              <span class="text-secondary">@unknown</span>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary">
                  <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                </svg>Facebook</h6>
              <span class="text-secondary">@unknown</span>
            </li>

          </ul>
        </div>

        @foreach($users as $user)
        @if(Auth::user()->id == $user['id'])
        <button class="btn btn-secondary  m-3">edit</button>
        @endif
        @endforeach

      </div>

      <div class="col-md-8">
        @foreach($users as $user)
        <div class="card mb-3">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Full Name</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{$user['fname']}} {{$user['lname']}}
              </div>

            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Email</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{$user['email']}}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Phone</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{$user['phone']}}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Address</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{$user['address']}}
              </div>
            </div>
            <hr>
          </div>
        </div>

        @if(Auth::user()->id == $user['id'])
        <a href="">
          <button class="btn btn-secondary ms-2">edit</button>
        </a>
        @endif
        @endforeach


        <div class="container p-5 mx-auto w-100">
          <div class="text-center ">
            <h2> My Posts</h2>
          </div>
          <div class="row justify-content-between p-5">
            @foreach($users as $user)
            @foreach($posts as $post)
            <div class="col-12 col-sm-12 col-md-12 border rounded shadow p-4 mb-3 position-relative">
              <img src="/users/{{$user['pimage']}}" width="50px" height="50px" class="rounded-circle border me-3">
              <h5 style="display: contents; "> {{$user['fname']}} {{$user['lname']}} </h5>
              <div class="btn-group" style="float: right;">
                <a class="" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fas fa-chevron-down"></i> </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">delete</a></li>
                  <li><a class="dropdown-item" href="#">edit</a></li>
                </ul>
              </div>

              <button style="display: contents;" class="btn btn-outline-info">Follow</button>
              <h2 class="ms-5 pt-5"> {{$post['title']}} </h2>
              <p class="ms-5 pt-5"> {{$post['descripton']}} </p>
              @if($user['image'] != null)
              <img src="uploads/{{$user['image']}}" width="400px" height="" class="p-2 ms-5">
              @endif
              <div class="justify-content-md-end d-md-flex ">
                <button class="btn btn-outline-secondary me-md-2">Comment</button>
                <button class="btn btn-outline-danger me-md-2">Favourite</button>
                <button class="btn btn-outline-primary me-md-2">Share</button>
              </div>
            </div>
            @endforeach
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection