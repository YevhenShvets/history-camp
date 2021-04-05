@extends('layouts.app')

@section('title')Тарифи@endsection

@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>



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

        <div class="accordion" id="accordionTariff">
            @forelse ($data as $el)
                <div class="card">
                    <a class="card-link" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $el->id }}">
                        <div class="card-header">
                            {{ $el->name }}
                        </div> 
                    </a>
                    <div id="collapse{{ $el->id }}" class="collapse">
                        <div class="card-body">
                            {{ $el->name }}
                            <br>
                            {{ date('d.m.Y', strtotime($el->date_start))  }}
                            <br>
                            {{ date('d.m.Y', strtotime($el->date_end)) }}
                            <br>
                            {{ $el->price }}
                            <br>
                            {!! $el->description !!}
                            <br>

                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tariffModal" data-whatever="{{ $el->name }}/{{ $el->id }}">Замовити</button>

                            @auth()
                                <div class="d-flex justify-content-center">
                                    <hr>
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <a href="{{ route('admin-edit-tariff', ['id' => $el->id]) }}" class="btn btn-secondary">Редагувати</a>
                                        <!--<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-whatever="{{ $el->name }}">Видалити</button>--!>
					<a href="{{ route('admin-delete-tariff', ['id' =>$el->id]) }}" class="btn btn-danger">Видалити</a>
                                    </div>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            @empty
                <p>No data</p>
            @endforelse
        </div>

        <!-- Modal window -->
        <div class="modal fade" id="tariffModal" tabindex="-1" role="dialog" aria-labelledby="tariffModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tariffModalLabel">Замовлення тарифу</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('tariff-submit',[]) }}"  method="POST">
                        @csrf
                        <div class="form-group m-0 p-0" hidden>
                            <label for="tariff-id" class="col-form-label">Id:</label>
                            <input type="text" class="form-control" name="tariff-id" id="tariff-id">
                        </div>
                        <div class="form-group m-0 p-0" hidden>
                            <label for="tariff-name" class="col-form-label">Тариф:</label>
                            <input type="text" class="form-control" name="tariff-name" id="tariff-name" disabled>
                        </div>
                        <div class="form-group m-0 p-0">
                            <label for="user-name" class="col-form-label">Ім'я:</label>
                            <input type="text" placeholder="Ваше ім'я" class="form-control" name="user-name" id="user-name">
                        </div>
                        <div class="form-group m-0 p-0">
                            <label for="user-email" class="col-form-label">Email:</label>
                            <input type="email" placeholder="Ваш email" class="form-control" name="user-email" id="user-email">
                        </div>
                        <div class="form-group m-0 p-0">
                            <label for="user-phone" class="col-form-label">Телефон:</label>
                            <input type="number" placeholder="+380_________" class="form-control" name="user-phone" id="user-phone">
                        </div>
                        <div class="form-group m-0 p-0">
                            <label for="message-text" class="col-form-label">Коментар:</label>
                            <textarea class="form-control" placeholder="Ваше повідомлення" name="message-text" id="message-text"></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Відміна</button>
                            <button type="submit" class="btn btn-primary">Замовити</button>
                        </div>
                    </form>
                </div>
                </div>
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
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="toast d-flex align-items-center text-white bg-secondary border-0" data-delay="2000" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body">
                Ваша заява успішно відправлена!
            </div>
            <button type="button" class="btn-close btn-close-white ms-auto me-2" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>

    </div>


    <script>
        $(document).ready(function(){
            $('#tariffModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) ;
                var tariff = button.data('whatever').split('/')[0];
                var tariff_id = button.data('whatever').split('/')[1];
                var modal = $(this);
                modal.find('.modal-title').text('Замовлення тарифу: ' + tariff);
                modal.find('.modal-body #tariff-name').val(tariff);
                modal.find('.modal-body #tariff-id').val(tariff_id);
            });
            $('#deleteModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) ;
                var title = button.data('whatever');
                var modal = $(this);
                modal.find('.modal-title').text('Дійсно видалити тариф: ' + title);
            });
        });
    </script>

    @isset($_GET['toast'])
        <script>
            $(document).ready(function() {
                $(".toast").toast('show');
            });
        </script>
    @endisset
@endsection