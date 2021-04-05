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
                    <th scope="col">Відмітка</th>
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
                    <td>
                        <form action="{{ route('admin-show-feedback-submit') }}" method="POST">
                            @csrf
                            <input type="text" value="{{$t->id}}" name="ID" hidden>
                            <button type="submit" class="btn" style="{{ ($t->answered) ? 'background:green;' : '' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                    <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z"/>
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>  
@endsection