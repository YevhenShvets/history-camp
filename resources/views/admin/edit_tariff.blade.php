@extends('layouts.app')

@section('title')АДМІН Редагування тарифу@endsection

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
        @isset($tariff)
            <div class="col-6 offset-3">
            <h2>Редагування тарифу</h2>
                <form action="{{ route('admin-edit-tariff-submit', ['id' => $tariff->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="form-group">
                    <label for="inputName">Ім'я тарифу</label>
                    <input type="text" class="form-control" id="inputName" name="inputName" value="{{ $tariff->name }}" placeholder="Введіть ім'я тарифу">
                </div>
                <div class="form-group">
                    <label for="inputDateStart">Дата початку*</label>
                    <input class="form-control" type="datetime-local" id="inputDateStart" value="{{ date('Y-m-d\TH:i', strtotime($tariff->date_start)) }}" name="inputDateStart">
                </div>
                <div class="form-group">
                    <label for="inputDateEnd">Дата кінця*</label>
                    <input class="form-control" type="datetime-local" id="inputDateEnd" value="{{ date('Y-m-d\TH:i', strtotime($tariff->date_end)) }}" name="inputDateEnd">
                </div>
                <div class="form-group">
                    <label for="inputPrice">Ціна тарифу*</label>
                    <input type="number" class="form-control" id="inputPrice" name="inputPrice" value="{{ $tariff->price }}" placeholder="Введіть ціну">
                </div>
                <div class="form-group">
                    <label for="inputDescription" class="form-label">Опис тарифу (html file)*</label>
                    <input class="form-control" type="file" id="inputDescription" name="inputDescription" accept=".html">
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