@extends('web.layout')

@section('title')
contact
@endsection

@section('body')
<div class="container p-5 m-5 w-75 mx-auto text-centre rounded shadow">
    <h2>contact</h2>
    <form action="/form" method="post">
        @csrf
        <input class="form-control my-4" placeholder="" type="text" name="title" id="">
        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary ">create</button>
    </form>
</div>

@endsection