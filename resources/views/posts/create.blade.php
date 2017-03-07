@extends('layouts.master')
@section('h1')
    Создание новой записи
@endsection

@section('h1-description')
    Создание новой записи в блоге
@endsection

@section('content')

    <form method="post" action="/posts">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Text</label>
            <textarea id="body" name="body" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Publish</button>
        </div>

    </form>

    @include('layouts.errors')

@endsection