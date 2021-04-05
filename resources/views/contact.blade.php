@extends('layouts.app')

@section('title')Контакти@endsection

@section('content')
<style>
.btn1{
    background-color:rgba(123,40, 233, 0.5); 
    cursor: pointer; 
    padding:10px 20px; 
    margin-top:20px; 
    border:0;
    transition: 0.5s;
}
.btn1:hover{
    background:rgba(123,40, 233, 0.2);
}
</style>
    <div class="container" style="margin-top: 5rem !important;">
    <hr>
    <div style="display:flex; justify-content:space-between;">
        <div style="margin-left:80px;">
            Наша адреса: м. Чернівці
            <br>
            Номер телефону:
            <br>
            <b>+380_________</b>
            <br>
            <b>+380_________</b>
            <br>
            Email: email@history.ua
            <br>
            Графік роботи: 09:00 - 18:00
        </div>
        <div>
            <iframe width="600" height="300" 
            frameborder="0" scrolling="no" marginheight="0" 
            marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=%D0%A7%D0%B5%D1%80%D0%BD%D1%96%D0%B2%D1%86%D1%96+()&amp;t=p&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
            </iframe>
        </div>
    </div>
    <hr>
        <div class="col-6 offset-3 contact-form">
            <h2>Бажаєте замовити консультацію?<br>Ця форма саме для вас.</h2>
            <br>
            <form action="{{ route('contact-post') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="inputName">Ваше ім`я</label>
                    <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Введіть ваше ім'я" required="">
                </div>

                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Введіть email" required="">
                </div>
                <div class="form-group">
                    <label for="inputPhone">Телефон</label>
                    <input type="number" class="form-control" id="inputPhone" name="inputPhone" placeholder="+380_________" required="">
                </div>
                <div class="form-group">
                    <label for="inputMessage">Повідомлення</label>
                    <textarea class="form-control" id="inputMessage" name="inputMessage" placeholder="Введіть ваше повідомлення" required="" maxlength="100"></textarea>
                </div>
                <input type="submit" class="btn1" value="Замовити консультацію">
            </form>
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