@extends('layouts.app')

@section('title'){{ isset($post) ? $post->title : 'Помилка' }}@endsection

@section('content')
    <div class="container" style="margin-top: 5rem !important;">
        @isset($post)
            {{ $post->title }}
            <hr>
            {{ $post->content }}
            <hr>
            {{ $post->date_create }}

        @endisset
    </div>
@endsection