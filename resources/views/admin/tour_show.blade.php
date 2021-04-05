@extends('layouts.app')

@section('title')АДМІН Перегляд замовлених турів@endsection

@section('content')
    <div class="container" style="margin-top: 5rem !important;">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Тур</th>
                    <th scope="col">Ім'я</th>
                    <th scope="col">Прізвище</th>
                    <th scope="col">Телефон</th>
                    <th scope="col">Email</th>
                    <th scope="col">Кількість осіб</th>
                    <th scope="col">Дата створення</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tours as $t)
                <tr>
                    <th scope="row">{{ $t->id }}</th>
                    <td>{{ $t->tname }}</td>
                    <td>{{ $t->user_name }}</td>
                    <td>{{ $t->user_surname }}</td>
                    <td>{{ $t->user_phone }}</td>
                    <td>{{ $t->user_email }}</td>
                    <td>{{ $t->user_number_of_people }}</td>
                    <td>{{ $t->date_create }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>  
@endsection