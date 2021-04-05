@extends('layouts.app')

@section('title')АДМІН Добавлення маршруту@endsection

@section('content')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   
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
        <a href="{{ route('admin-edit-tour', $tour_id) }}">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                </svg>
            </div>
            Назад
            <br>
        </a>
        @isset($routes)
            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Назва</th>
                                <th scope="col">Опис</th>
                                <th scope="col">Дія</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($routes as $route)
                            <tr>
                                <th scope="row">{{ $route->name}}</th>
                                <td>{{ $route->description }}</td>
                                <td>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tourModal" data-whatever="{{ $route->id }}/{{ $route->name }}/{{ $route->description }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                        </svg>
                                    </button>
                                    <form action="{{ route('admin-edit-tour-add-route-delete', $tour_id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <input type="text" name="inputId" hidden value="{{$route->id}}">
                                        <button type="submit" class="btn btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-6 offset-3">
                <h2>Добавлення маршруту</h2>
                <form action="{{ route('admin-edit-tour-add-route-submit', $tour_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="inputName">Назва</label>
                        <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Введіть назву" required="">
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Опис</label>
                        <textarea class="form-control" id="inputDescription" name="inputDescription" placeholder="Введіть опис" required=""></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark mt-1 mb-2 ">Добавити</button>
                </form>
            </div>



            <div class="modal fade" id="tourModal" tabindex="-1" role="dialog" aria-labelledby="tourModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tourModalLabel">Редагування маршруту</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form action="{{ route('admin-edit-tour-add-route-edit-submit', $tour_id) }}" method="POST">
                        @csrf
                        <div class="form-group m-0 p-0" hidden>
                            <label for="inputId" class="col-form-label">Id:</label>
                            <input type="text" class="form-control" name="inputId" id="inputId">
                        </div>
                        <div class="form-group m-0 p-0">
                            <label for="inputName" class="col-form-label">Назва</label>
                            <input type="text" class="form-control" name="inputName" id="inputName" placeholder="Введіть назву" required="">
                        </div>
                        <div class="form-group m-0 p-0">
                            <label for="inputDescription">Опис</label>
                            <textarea class="form-control" id="inputDescription" name="inputDescription" placeholder="Введіть опис" required=""></textarea>
                        </div>
                        
                        <div style="text-align:center;">
                            <input type="submit" value="Оновити" class="btn" style="background:rgba(10,50, 101, 0.5); margin:10px; padding: 5px 10px;">
                        </div>
                    </form>
                    </div>
                </div>
            </div>

        <script>
            $(document).ready(function(){
                $('#tourModal').on('show.bs.modal', function (event) {
                    var button = $(event.relatedTarget) ;
                    var data = button.data('whatever').split('/');
                    var id = data[0];
                    var name = data[1];
                    var description = data[2];
                    var modal = $(this);
                    modal.find('.modal-body #inputId').val(id);
                    modal.find('.modal-body #inputName').val(name);
                    modal.find('.modal-body #inputDescription').val(description);
                });
            });
        </script>
        @endisset
    </div>  
@endsection