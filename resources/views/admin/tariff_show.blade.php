@extends('layouts.app')

@section('title')АДМІН Перегляд замовлених тарифів@endsection

@section('content')
    <div class="container" style="margin-top: 5rem !important;">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Тариф</th>
                    <th scope="col">Ім'я</th>
                    <th scope="col">Телефон</th>
                    <th scope="col">Email</th>
                    <th scope="col">Коментар</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tariffs as $t)
                <tr>
                    <th scope="row">{{ $t->id }}</th>
                    <td>{{ $t->tariff_name }}</td>
                    <td>{{ $t->user_name }}</td>
                    <td>{{ $t->user_phone }}</td>
                    <td>{{ $t->user_email }}</td>
                    <td>{{ $t->user_comment }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>  
@endsection