@extends('layouts.app')

@section('title')АДМІН Головна@endsection

@section('content')
    <div class="container" style="margin-top: 5rem !important;">
        <a href="{{ route('admin-add-post') }}" class="btn btn-outline-secondary">Добавити пост</a><br>
        <a href="{{ route('admin-add-tariff') }}" class="btn btn-outline-secondary mt-3">Добавити тариф</a>

        <hr>
        <div class="d-flex justify-content-center">
            <a href="{{ route('admin-show-tariff') }}" class="btn btn-outline-dark">Перегляд замовлених тарифів</a>
            <a href="{{ route('admin-show-feedback') }}" class="btn btn-outline-dark">Перегляд фідбеків користувачів</a>
        </div>
    </div>
@endsection