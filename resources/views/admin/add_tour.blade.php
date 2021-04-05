@extends('layouts.app')

@section('title')АДМІН Добавлення туру@endsection

@section('content')
    <script src="/js/choices.js"></script>

    
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
        <div class="col-6 offset-3">
            <form action="{{ route('admin-add-tour-submit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="inputName">Назва туру</label>
                    <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Введіть ім'я туру" required="">
                </div>
                <div class="form-group">
                    <label for="inputAddress">Місце проведення</label>
                    <input type="text" class="form-control" id="inputAddress" name="inputAddress" placeholder="Введіть адресу" required="">
                </div>
                <div class="form-group">
                    <label for="inputDateStart">Дата початку туру</label>
                    <input class="form-control" type="datetime-local" id="inputDateStart" value="{{ date('Y-m-d\TH:i') }}" name="inputDateStart" required="">
                </div>
                <div class="form-group">
                    <label for="inputDays">Кількість днів</label>
                    <input type="number" class="form-control" id="inputDays" name="inputDays" placeholder="Введіть кількість днів" required="">
                </div>
                <div class="form-group">
                    <label for="inputPrice1">Вартість з одного</label>
                    <input type="number" class="form-control" id="inputPrice1" name="inputPrice1" placeholder="Введіть вартість з одного" required="">
                </div>
                <div class="form-group">
                    <label for="inputPrice2">Вартість з одного (група)</label>
                    <input type="number" class="form-control" id="inputPrice2" name="inputPrice2" placeholder="Введіть вартість з одного (група)" required="">
                </div>
                <div class="form-group">
                    <label for="inputInPrice">У вартість включено</label>
                    <input type="text" class="form-control" id="inputInPrice" name="inputInPrice" placeholder="приклад, приклад2, ...">
                </div>
                <div class="form-group">
                    <label for="inputNotInPrice">У вартість не включено</label>
                    <input type="text" class="form-control" id="inputNotInPrice" name="inputNotInPrice" placeholder="приклад, приклад2, ...">
                </div>
                <div class="form-group">
                    <label for="inputShortDescription">Короткий опис</label>
                    <textarea class="form-control" id="inputShortDescription" name="inputShortDescription" placeholder="Введіть короткий опис" required=""></textarea>
                </div>
                <div class="form-group">
                    <label for="inputLongDescription">Повний опис</label>
                    <textarea class="form-control" id="inputLongDescription" name="inputLongDescription" placeholder="Введіть повний опис" required=""></textarea>
                </div>
                <div class="form-group">
                    <label for="inputComplexity">Складність</label>
                    <select class="form-control" id="inputComplexity" name="inputComplexity" required="">
                        <option value="Легко">Легко</option>
                        <option value="Нормально">Нормально</option>
                        <option value="Складно">Складно</option>
                    </select>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="inputDiscount" name="inputDiscount">
                    <label class="form-check-label" for="inputDiscount">
                        Знижка?
                    </label>
                </div>
                <div class="form-group">
                    <label for="inputAdditionalInformation">Додаткова інформація</label>
                    <textarea class="form-control" id="inputAdditionalInformation" name="inputAdditionalInformation" placeholder="Введіть додаткову інформацію"></textarea>
                </div>


                <div class="form-group">
                    <p style="text-align:center; margin:10px;">Маршрут та галерея добавляються в редагуванні туру</p>
                </div>



                <button type="submit" class="btn btn-primary mt-1 mb-2 ">Зберегти</button>
            </form>
        </div>
    </div>  

    <script>
      var textPresetVal = new Choices('#choices-text-preset-values',
      {
        removeItemButton: true,
      });

    </script>
@endsection