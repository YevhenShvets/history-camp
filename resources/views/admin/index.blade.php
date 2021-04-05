@extends('layouts.app')

@section('title')АДМІН Головна@endsection

@section('content')
<style>
.btn1{
    padding:10px 80px;
    transition: 0.5s;
}
.btn1:hover{
    padding:10px 10%;
}
</style>

    <div class="container" style="margin-top: 5rem !important;">
        <div class="d-flex justify-content-center">
            <a href="{{ route('admin-add-post') }}" class="btn btn1 btn-outline-secondary">Добавити пост</a><br>
            <a href="{{ route('news-page') }}" class="btn btn1 btn-warning" style="margin-left:10px">Редагувати пост</a>
        </div>
        <hr style="background:rgba(122,144,155,0.8); height:2px; width:100px; margin:20px auto;">
        <div class="d-flex justify-content-center">
        <a href="{{ route('admin-add-tour') }}" class="btn btn1 btn-outline-secondary" >Добавити тур</a><br>
            <a href="{{ route('tours-page') }}" class="btn btn1 btn-warning" style="margin-left:10px">Редагувати тур</a>
        </div>
        <hr>
        <div class="d-flex justify-content-center">
            <a href="{{ route('admin-show-tour') }}" class="btn btn1 btn-outline-success">Перегляд замовлених турів</a>
        </div>
        <hr style="background:rgba(122,144,155,0.8); height:2px; width:100px; margin:20px auto;">
        <div class="d-flex justify-content-center">
            <a href="{{ route('admin-show-feedback') }}" class="btn btn1 btn-outline-dark">Перегляд консультацій від користувачів</a>
        </div>
    </div>
@endsection