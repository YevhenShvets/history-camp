@extends('layouts.app')

@section('title'){{ isset($post) ? $post->title : 'Помилка' }}@endsection

@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>

    <div class="container" style="margin-top: 3rem !important;">
        @isset($post)
        <div>
            <h1 style="font-size:60px;">{{ $post->title }}</h1>
        </div>
        @isset($post->picture)
        <img src="data:image/png;base64,{{ chunk_split(base64_encode($post->picture)) }}" class="" style="width:100%; height: 350px; object-fit: cover;">
        @endisset
        @isset($tags)
            @foreach($tags as $tag)
                <div class="alert">
                <a href="{{ route('tag-name-page', ['name' => $tag->name]) }}">{{ $tag->name }}</a>
                </div>
            @endforeach
        @endisset
        <hr style="height: 1px; background:rgba(12,12,233, 0.1);">
        <div>
            {!! $post->content !!}
            <hr style="height: 1px; background:rgba(12,122,233, 0.8); width:100%;">
            <div style="text-align:right;">
                {{ date('d.m.Y h:m', strtotime($post->date_create)) }}
            </div>
        </div>
        @endisset

        @auth('admin')
            <div class="d-flex justify-content-center">
                <hr>
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <a href="{{ route('admin-edit-post', ['id' => $post->id]) }}" class="btn btn-secondary">Редагувати</a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-whatever="{{ $post->title }}">Видалити</button>
                </div>
            </div>

            <!-- Modal window -->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content p-0">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel"></h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Вихід</button>
                            <a href="{{ route('admin-delete-post', ['id' =>$post->id]) }}" class="btn btn-danger">Видалити</a>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $(document).ready(function(){
                    $('#deleteModal').on('show.bs.modal', function (event) {
                        var button = $(event.relatedTarget) ;
                        var title = button.data('whatever');
                        var modal = $(this);
                        modal.find('.modal-title').text('Дійсно видалити пост: ' + title);
                    });
                });
            </script>

        @endauth
    </div>

@endsection