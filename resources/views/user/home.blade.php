@extends('layouts.app')

@section('title')Моя сторінка@endsection

@section('content')
    <div class="" style="margin-top: 5rem !important;">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button style="outline:none;" class="nav-link active" id="nav-tours-tab" data-bs-toggle="tab" data-bs-target="#nav-tours" type="button" role="tab" aria-controls="nav-tours" aria-selected="true">Заброньовані тури</button>
                <button style="outline:none;" class="nav-link" id="nav-feedbacks-tab" data-bs-toggle="tab" data-bs-target="#nav-feedbacks" type="button" role="tab" aria-controls="nav-feedbacks" aria-selected="false">Мої фідбеки</button>
                <button style="outline:none;" class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Особисті дані</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-tours" role="tabpanel" aria-labelledby="nav-tours-tab">
            @isset($tours)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Тур</th>
                        <th scope="col">ПІП</th>
                        <th scope="col">Телефон</th>
                        <th scope="col">Email</th>
                        <th scope="col">Кількість осіб</th>
                        <th scope="col">Дата броні</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tours as $t)
                    <tr>
                        <td>{{ $t->tname }}</td>
                        <td>{{ $t->user_name }}  {{ $t->user_surname }}</td>
                        <td>{{ $t->user_phone }}</td>
                        <td>{{ $t->user_email }}</td>
                        <td>{{ $t->user_number_of_people }}</td>
                        <td>{{ $t->date_create }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <h3>Ще нічого не заброньовано :(</h3>
            @endisset
            </div>
            <div class="tab-pane fade" id="nav-feedbacks" role="tabpanel" aria-labelledby="nav-feedbacks-tab">
            @isset($feedbacks)
            <div class="">
                @foreach($feedbacks as $feedback)
                <div style="margin-left: 30px;">
                <div>
                    Назва туру - <b>{{ $feedback->name }}</b>
                </div>
                <div>
                Оцінка - 
                    <span class="bi bi-star-fill" {{ ($feedback->rating >= 1) ? 'style=color:orange;' : 'style=color:gray;' }}><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg></span>
                    <span class="bi bi-star-fill" {{ ($feedback->rating >= 2) ? 'style=color:orange;' : 'style=color:gray;' }}><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg></span>
                    <span class="bi bi-star-fill" {{ ($feedback->rating >= 3) ? 'style=color:orange;' : 'style=color:gray;' }}><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg></span>
                    <span class="bi bi-star-fill" {{ ($feedback->rating >= 4) ? 'style=color:orange;' : 'style=color:gray;' }}><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg></span>
                    <span class="bi bi-star-fill" {{ ($feedback->rating >= 5) ? 'style=color:orange;' : 'style=color:gray;' }}><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg></span>
                </div>
                <p>Опис: {{ $feedback->description }}</p>
                <div>
                    Дата створення - <b>{{ date('d.m.Y', strtotime($feedback->date_create)) }}</b>  
                </div>
                </div>
                <hr>
                @endforeach
            </div>
            @else
            <h3>Ще нічого не прокоментовано :(</h3>
            @endisset
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                @isset($user)
                <div class="row justify-content-center mt-4">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header" style="font-size:20px;">{{ __('Мої дані') }}</div>
                            <div class="card-body" style="">
                                <form method="" action="">
                                    @csrf
                                    <div class="form-group">
                                        <label for="inputName">Ім'я</label>
                                        <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Ваше ім'я" value="{{ $user->name }}" readonly>
                                    </div>        
                                    <div class="form-group">
                                        <label for="inputEmail">Email</label>
                                        <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Ваш email" value="{{ $user->email }}" readonly>
                                    </div>                            
                                    <!-- <input type="submit" value="Відправити" class="btn btn-success mt-3"> -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endisset
            </div>
        </div>

        <a href="{{ route('logout') }}" class="btn btn-danger" style="">Вихід</a>
    </div> 
@endsection