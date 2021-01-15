@extends('layouts.app')

@section('title')Всі новини@endsection

@section('content')
    <div class="container" style="margin-top: 5rem !important;">
    @forelse($data as $row)
        <div class="alert alert-secondary" role="alert">
            {{ $row->title }}
            <hr>
            {{ $row->date_create }}
            <a href="{{ route('news-post', ['id' => $row->id]) }}" class='btn btn-primary col-2 offset-8'>Детальніше</a>
        </div>
        <div class="mt-1"></div>
    @empty
            <p></p>
    @endforelse
    </div>
@endsection