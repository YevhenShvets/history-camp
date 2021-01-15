@extends('layouts.app')

@section('title')Теги@endsection

@section('content')
    <div class="container" style="margin-top: 5rem !important;">
        <div class="col-4 offset-4">
            @forelse ($data as $el)
                <div class="card-info">
                    {{ $el->name }} - {{ $el->post_count }}
                    <hr>
                   
                </div>
            @empty
                <p class="d-flex justify-content-center" style="font-size:28px;">Тегів не знайдено</p>
            @endforelse
        </div>
    </div>   
@endsection