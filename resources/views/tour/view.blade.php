@extends('layouts.app')

@section('title')
@isset($tour)
{{$tour->name}}
@else
Помилка
@endisset
@endsection

@section('link')
<link rel="stylesheet" href="/css/tour.css">
@endsection

@section('content')
    <style>
        .btn:hover{
            color:black;
            border-radius:10px;
        }
        .btn-1{
            transition: 0.5s;
        }
        .btn-1:hover{
            background:red;
            border-radius:2px;
            padding:0px 10%;
        }

        ._price{
            padding:20px;
            transition: 0.5s;
        }
        ._price:hover{
            padding: 20px 10%;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   
    @isset($tour)
    @isset($images)
    @if(count($images) > 0)
    <div id="carouselExampleIndicators" style="margin-top: 0px; margin-bottom:0;" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach($images as $image)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" {{ ($loop->first) ? 'class=active' : '' }}></li>
            @endforeach
        </ol>
        <div style="z-index:-1;" class="carousel-inner">
            @foreach($images as $image)
                <div class="carousel-item {{ ($loop->first) ? 'active' : '' }}">
                    <img class="d-block w-100" src="{{ URL::asset($image) }}" alt="" style="height: 500px; object-fit: cover;">
                </div>
            @endforeach
        </div>
        <a  class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only"></span>
        </a>
        <a  class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only"></span>
        </a>
    </div>
    @endif
    @endisset
    <div class="container" style="">
        <h2 style="text-align:center; margin-top:20px; color:black; font-size:50px;">{{$tour->name}}</h2>
        <p style="text-align:center; ">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
            </svg>
            {{$tour->address}}
        </p>
        @isset($routes)
            <div style="display:flex; justify-content: center; margin-top:20px; margin-bottom:10px;">
                @foreach ($routes as $route)
                    <button style="background:rgba(0,4,220, 0.4)" type="button" class="btn btn-1" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $route->description }}">
                    {{$route->name}}
                    </button>
                    @if(!$loop->last)
                    <div style="vertical-align:middle; margin:10px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                        </svg>
                    </div>
                    @endif
                @endforeach
            </div>
        @else
            <h2 style="color:black; text-align:center;">Маршрут не вказано</h2>
        @endisset
        <hr>
        <div style="display:flex; justify-content: center;">
            <div style="display:flex-grow; background:rgba(100,50,130,0.5); padding:30px 20px; margin:5px; width:min-content;">
                {{ date('d.m.Y', strtotime($tour->date_start)) }}
            </div>
            <div style="margin-top:35px; text-align:center;">
                - -  - -  - -  - -  - -  - -      - -  - -  - -  - -  - -  - -      - -  - -  - -  - -  - -  - -
                <br>
                {{$tour->days}} днів
            </div>
            <div style="display:flex-grow; background:rgba(30,50,0,0.5); padding:30px 20px; margin:5px; width:min-content;">
                {{ date('d.m.Y', strtotime("+ $tour->days days", strtotime($tour->date_start))) }}
            </div>
        </div>
        <hr>
        <h4>Складність</h4>
        <div style="color:black;">
            {{$tour->complexity}}
        </div>
        <hr>
        <h4>Ціна</h4>
        <div style="display:flex; justify-content: center; color:black;">
            <div style="font-size:20px;">
                {{$tour->price_1}}
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                </svg>
            </div>
            <div style="font-size:20px; margin-left:10px">
                {{$tour->price_2}}
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                </svg>
            </div>
        </div>
        <div style="display:flex; justify-content: center; color:black;">
            <div style="background:rgba(20,122,255,0.5);" class="_price">
                <b>Входить в ціну:</b><br>
                @empty($tour->in_price)
                    Інформація відсутня :(
                @else    
                    {{$tour->in_price}}
                @endempty
                
            </div>
            <div style="background:rgba(255,122,20,0.5);" class="_price">
                <b>Не входить в ціну:</b><br>
                @empty($tour->not_in_price)
                    Інформація відсутня :(
                @else    
                    {{$tour->not_in_price}}
                @endempty
            </div>
        </div>
        <h4 style="margin-top:10px;">Опис</h4>
        <div style="color:black; margin-left:10px; margin-bottom:10px;">
            {{$tour->long_description}}
        </div>
        <hr>
        <h4 style="margin-top:10px;">Додаткова інформація</h4>
        <div style="color:black; margin-left:10px; margin-bottom:10px;">
            @empty($tour->additional_information)
                Інформація відсутня :(
            @else    
                {{$tour->additional_information}}
            @endempty
        </div>
        <hr>
        <div style="text-align:center; margin:20px; padding:10px;">
            <button style="padding:10px 40px; background-color:rgba(30,40,244,0.8); font-size:25px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#tourModal" data-whatever="{{ $tour->id }}">Забронювати</button>
        </div>
    </div>  
    
    @auth('admin')
        <div class="d-flex justify-content-center">
            <hr>
            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                <a href="{{ route('admin-edit-tour', ['id' => $tour->id]) }}" class="btn btn-secondary">Редагувати</a>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-whatever="{{ $tour->name }}">Видалити</button>
            </div>
        </div>

        <!-- Modal window -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content p-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel"></h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Вихід</button>
                        <a href="{{ route('admin-delete-tour', ['id' =>$tour->id]) }}" class="btn btn-danger">Видалити</a>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function(){
                $('#deleteModal').on('show.bs.modal', function (event) {
                    var button = $(event.relatedTarget) ;
                    var title = button.data('whatever');
                    var modal = $(this);
                    modal.find('.modal-title').text('Дійсно видалити тур: ' + title);
                });
            });
        </script>

    @endauth


        <div class="modal fade" id="tourModal" tabindex="-1" role="dialog" aria-labelledby="tourModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tourModalLabel">Бронювання туру</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="{{ route('tour-id-submit',[$tour->id]) }}" method="POST">
                    @csrf
                    <div class="form-group m-0 p-0" hidden>
                        <label for="tour_id" class="col-form-label">Id:</label>
                        <input type="text" class="form-control" name="tour_id" id="tour_id">
                    </div>
                    <div class="form-group m-0 p-0">
                        <label for="user_name" class="col-form-label">Ім'я</label>
                        <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Ваше ім'я" required="" value="{{ (isset($user)) ? "$user->name" : '' }}">
                    </div>
                    <div class="form-group m-0 p-0">
                        <label for="user_surname" class="col-form-label">Прізвище</label>
                        <input type="text" class="form-control" name="user_surname" id="user_surname" placeholder="Ваше прізвище" required="">
                    </div>
                    <div class="form-group m-0 p-0">
                        <label for="user_phone" class="col-form-label">Номер телефону</label>
                        <input type="text" class="form-control" name="user_phone" id="user_phone" placeholder="+380_________" required="">
                    </div>
                    <div class="form-group m-0 p-0">
                        <label for="user_email" class="col-form-label">Email</label>
                        <input type="email" class="form-control" name="user_email" id="user_email" placeholder="Електронна адреса" required="" value="{{ (isset($user)) ? "$user->email" : '' }}">
                    </div>
                    <div class="form-group m-0 p-0">
                        <label for="user_number_of_people" class="col-form-label">Кількість осіб</label>
                        <input type="number" class="form-control" name="user_number_of_people" id="user_number_of_people" placeholder="Кількість осіб" required="">
                    </div>
                    <div style="text-align:center;">
                        <div class="mt-2">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" required="">
                            <label class="form-check-label" for="defaultCheck1">
                                Опрацювання персональних даних
                            </label>
                        </div>
                        <input type="submit" value="Забронювати" class="btn" style="background:rgba(0,0, 221, 0.5); margin:10px; padding: 5px 10px;">
                    </div>
                </form>
                </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function(){
                $('#tourModal').on('show.bs.modal', function (event) {
                    var button = $(event.relatedTarget) ;
                    var id = button.data('whatever');
                    var modal = $(this);
                    modal.find('.modal-body #tour_id').val(id);
                });
            });
        </script>
        <div id="accordion">
            <div class="card">
                <button style="all: unset;" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0" style="color:black;">Переглянути всі фідбеки</h5>
                    </div>
                </button>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                    @isset($feedbacks)
                        <div class="">
                        @foreach($feedbacks as $feedback)
                        <div style="display: flex; justify-content:space-between;">
                            <div>
                                <span class="bi bi-star-fill" {{ ($feedback->rating >= 1) ? 'style=color:orange;' : 'style=color:gray;' }}><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg></span>
                                <span class="bi bi-star-fill" {{ ($feedback->rating >= 2) ? 'style=color:orange;' : 'style=color:gray;' }}><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg></span>
                                <span class="bi bi-star-fill" {{ ($feedback->rating >= 3) ? 'style=color:orange;' : 'style=color:gray;' }}><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg></span>
                                <span class="bi bi-star-fill" {{ ($feedback->rating >= 4) ? 'style=color:orange;' : 'style=color:gray;' }}><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg></span>
                                <span class="bi bi-star-fill" {{ ($feedback->rating >= 5) ? 'style=color:orange;' : 'style=color:gray;' }}><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg></span>
                            </div>
                            <div>
                                {{ date('d.m.Y', strtotime($feedback->date_create)) }}
                            </div>
                        </div>
                        <div>
                        <p>{{ $feedback->description }}</p>
                        </div>
                        <hr>
                        @endforeach
                        </div>
                    @else
                    <h3>Ще ніхто не писав фідбек :(</h3>
                    @endisset
                    </div>
                </div>
            </div>
        </div>
        <hr style="height:4px; background:rgba(122,100,10, 0.8);">
        @isset($is_feedback)
        <style>
        .checked{
            color:orange;
        }
        </style>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="font-size:20px;">{{ __('Фідбек про тур') }}</div>

                    <div class="card-body" style="">
                        <form method="POST" action="{{ route('tour-id-feedback', $tour->id) }}">
                            @csrf
                            <input type="text" value="{{ Auth::id() }}" name="inputId" hidden>
                            <input type="text" value="1" id="rating" name="inputRating" hidden>
                            <div>
                                <label for="">Оцінка</label><br>
                                <span class="bi bi-star-fill checked" id="star1" onclick="add(this,1)"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg></span>
                                <span class="bi bi-star-fill" id="star2" onclick="add(this,2)"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg></span>
                                <span class="bi bi-star-fill" id="star3" onclick="add(this,3)"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg></span>
                                <span class="bi bi-star-fill" id="star4" onclick="add(this,4)"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg></span>
                                <span class="bi bi-star-fill" id="star5" onclick="add(this,5)"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg></span>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputDescription">Опис</label>
                                <textarea class="form-control" id="inputDescription" name="inputDescription" placeholder="Введіть опис" required=""></textarea>
                            </div>
                            <input type="submit" value="Відправити" class="btn btn-success mt-3">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
        function add(ths,sno){
            for (var i=1;i<=5;i++){
                var cur=document.getElementById("star"+i)
                cur.className="bi bi-star-fill"
            }
            for (var i=1;i<=sno;i++){
            var cur=document.getElementById("star"+i)
                if(cur.className=="bi bi-star-fill")
                {
                    cur.className="bi bi-star-fill checked"
                    document.getElementById("rating").value=sno;
                }
            }

        }
        </script>

        @endisset


        @isset($toast)
        <div class="toast fade show" style="background:white; border:1px solid: black; color: black;" role="alert" aria-live="assertive" aria-atomic="true" >
            <div class="toast-header">
                <strong class="mr-auto">Повідомлення</strong>
                <small>зараз</small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                Ви забронювали тур, очікуйте дзвінка від менеджера
            </div>
        </div>
        @endisset

    @else
    <h1 style="text-align:center; margin-top:100px;">Помилка, даного туру не існує<br>:(</h1>
    @endisset 

@endsection