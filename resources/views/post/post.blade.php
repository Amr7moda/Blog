@if(Auth::check())

@extends('web.layout')
@section('title')
create
@endsection

@section('body')
<div class="container p-5 m-5 w-75 mx-auto text-centre rounded shadow">
    <h2>Create New Post</h2>
    <form action="/post_store" method="post" enctype="multipart/form-data">
        @csrf
        <input class="form-control my-4" placeholder="Enter Title " type="text" name="title" id="">
        <input class="form-control my-4" placeholder="Enter Description" type="text" name="description" id="">
        <input class="form-control my-4" type="datetime-local" name="date" id="">
        @foreach($categories as $category)
        <div class="form-check">
            <input class="form-check-input" type="radio" value="{{$category['id']}}" name="category_id" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">{{$category['title']}} </label>
        </div>
        @endforeach
        <input class="form-control my-4" type="file" name="image" id="">
        <button type="submit" class="btn btn-primary">create</button>
    </form>
</div>

@endsection
@elseif(!Auth::check())
<script>
    window.location = "/login";
</script>
@endif