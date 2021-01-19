@extends('layouts.app')

@section('title')АДМІН Добавлення посту новин@endsection

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
        <div class="col-6 offset-3">
            <form action="{{ route('admin-add-post-submit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="inputTitle">Заголовок статті*</label>
                    <input type="text" class="form-control" id="inputTitle" name="inputTitle" placeholder="Введіть заголовок">
                </div>
                <div class="form-group">
                    <label for="inputContent" class="form-label">Контент статті (html file)*</label>
                    <input class="form-control" type="file" id="inputContent" name="inputContent" accept=".html">
                </div>
                <div class="form-group">
                    <label for="inputPicture" class="form-label">Фото</label>
                    <input class="form-control" type="file" id="inputPicture" name="inputPicture">
                </div>
                <div class="form-group">
                    <label for="inputDateCreate">Дата створення*</label>
                    <input class="form-control" type="datetime-local" id="inputDateCreate" value="{{ date('Y-m-d\TH:i') }}" name="inputDateCreate">
                </div>
                <button type="submit" class="btn btn-primary mt-1 ">Відправити</button>
            </form>
        </div>
    </div>  
@endsection