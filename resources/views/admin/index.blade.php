@extends('layouts.app')

@section('title')АДМІН Головна@endsection

@section('content')
    <div class="container" style="margin-top: 5rem !important;">
        <a href="{{ route('admin-add-post') }}" class="btn btn-outline-secondary">Добавити пост</a><br>
        <a href="{{ route('admin-add-tariff') }}" class="btn btn-outline-secondary mt-3">Добавити тариф</a>
    </div>
@endsection