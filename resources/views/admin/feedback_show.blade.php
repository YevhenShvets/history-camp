@extends('layouts.app')

@section('title')АДМІН Перегляд фібдеків@endsection

@section('content')
    <div class="container" style="margin-top: 5rem !important;">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ім'я</th>
                    <th scope="col">Телефон</th>
                    <th scope="col">Email</th>
                    <th scope="col">Повідомлення</th>
                    <th scope="col">Дата</th>
                </tr>
            </thead>
            <tbody>
                @foreach($feedbacks as $t)
                <tr>
                    <th scope="row">{{ $t->id }}</th>
                    <td>{{ $t->user_name }}</td>
                    <td>{{ $t->user_phone }}</td>
                    <td>{{ $t->user_email }}</td>
                    <td>{{ $t->user_message }}</td>
                    <td>{{ $t->date_create }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>  
@endsection