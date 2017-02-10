@extends('layouts.master')

@section('title')
    Main page
@endsection

@section('h1')
    Blog example
@endsection

@section('h1-description')
    A simple blog, that will be done in laracast lessons
@endsection

@section('content')
    @foreach($posts as $post)
        @include('posts.post')
    @endforeach

    @include('layouts.blog-pagination')
@endsection

