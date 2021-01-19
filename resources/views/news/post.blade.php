@extends('layouts.app')

@section('title'){{ isset($post) ? $post->title : 'Помилка' }}@endsection

@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>

    <div class="container" style="margin-top: 5rem !important;">
        @isset($tags)
            @foreach($tags as $tag)
                <div class="alert">
                <a href="{{ route('tag-name-page', ['name' => $tag->name]) }}">{{ $tag->name }}</a>
                </div>
            @endforeach
        @endisset
        @isset($post)
            {{ $post->title }}
            <hr>
            {!! $post->content !!}
            <hr>
            {{ $post->date_create }}

        @endisset

        @auth()
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