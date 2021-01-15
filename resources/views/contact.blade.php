@extends('layouts.app')

@section('title')Контакти@endsection

@section('content')
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
        <div class="col-6 offset-3 contact-form">
            <form action="{{ route('contact-post') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="inputName">Ваше ім`я</label>
                    <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Введіть ваше ім'я">
                </div>
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Введіть email">
                </div>
                <div class="form-group">
                    <label for="inputPhone">Телефон</label>
                    <input type="number" class="form-control" id="inputPhone" name="inputPhone" placeholder="+380_________">
                </div>
                <div class="form-group">
                    <label for="inputMessage">Повідомлення</label>
                    <textarea class="form-control" id="inputMessage" name="inputMessage" placeholder="Введіть ваше повідомлення"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-1 ">Відправити</button>
            </form>
        </div>

        <div class="toast d-flex align-items-center text-white bg-secondary border-0" data-delay="2000" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body">
                Ваша заява успішно відправлена!
            </div>
            <button type="button" class="btn-close btn-close-white ms-auto me-2" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>  

     @isset($_GET['toast'])
        <script>
            $(document).ready(function() {
                $(".toast").toast('show');
            });
        </script>
    @endisset 
@endsection