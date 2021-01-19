@extends('layouts.app')

@section('title')АДМІН Редагування посту@endsection

@section('content')
    <div class="container" style="margin-top: 5rem !important;">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @isset($post)
            <div class="col-6 offset-3">
            <h2>Редагування статті</h2>
                <form action="{{ route('admin-edit-post-submit', ['id' => $post->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="inputTitle">Заголовок статті*</label>
                        <input type="text" class="form-control" id="inputTitle" name="inputTitle" value="{{ $post->title }}" placeholder="Введіть заголовок">
                    </div>
                    <div class="form-group">
                        <label for="inputContent" class="form-label">Контент статті (html file)*</label>
                        <input class="form-control" type="file" id="inputContent"  name="inputContent" accept=".html">
                    </div>
                    <div class="form-group">
                        <label for="inputPicture" class="form-label">Фото</label>
                        <input class="form-control" type="file" id="inputPicture" name="inputPicture">
                    </div>
                    <button type="submit" class="btn btn-warning mt-1 ">Редагувати</button>
                </form>
            </div>
        @endisset
    </div>  
@endsection