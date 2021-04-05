@extends('layouts.app')

@section('title')АДМІН Редагування туру@endsection

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
        @isset($tour)
            <a style="text-align:center;" href="{{ route('tour-id-page', $tour->id) }}"><h2>Переглянути тур</h2></a>
            <div class="col-6 offset-3">
                <h2>Редагування туру</h2>
                <form action="{{ route('admin-edit-tour-submit', $tour->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="inputName">Назва туру</label>
                        <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Введіть ім'я туру" required=""  value="{{$tour->name}}">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Місце проведення</label>
                        <input type="text" class="form-control" id="inputAddress" name="inputAddress" placeholder="Введіть адресу" required="" value="{{$tour->address}}">
                    </div>
                    <div class="form-group">
                        <label for="inputDateStart">Дата початку туру</label>
                        <input class="form-control" type="datetime-local" id="inputDateStart" name="inputDateStart" required="" value="{{date('Y-m-d\TH:i', strtotime($tour->date_start))}}">
                    </div>
                    <div class="form-group">
                        <label for="inputDays">Кількість днів</label>
                        <input type="number" class="form-control" id="inputDays" name="inputDays" placeholder="Введіть кількість днів" required="" value="{{$tour->days}}">
                    </div>
                    <div class="form-group">
                        <label for="inputPrice1">Вартість з одного</label>
                        <input type="number" class="form-control" id="inputPrice1" name="inputPrice1" placeholder="Введіть вартість з одного" required="" value="{{$tour->price_1}}">
                    </div>
                    <div class="form-group">
                        <label for="inputPrice2">Вартість з одного (група)</label>
                        <input type="number" class="form-control" id="inputPrice2" name="inputPrice2" placeholder="Введіть вартість з одного (група)" required="" value="{{$tour->price_2}}">
                    </div>
                    <div class="form-group">
                        <label for="inputInPrice">У вартість включено</label>
                        <input type="text" class="form-control" id="inputInPrice" name="inputInPrice" placeholder="приклад, приклад2, ..." value="{{$tour->in_price}}">
                    </div>
                    <div class="form-group">
                        <label for="inputNotInPrice">У вартість не включено</label>
                        <input type="text" class="form-control" id="inputNotInPrice" name="inputNotInPrice" placeholder="приклад, приклад2, ..." value="{{$tour->not_in_price}}">
                    </div>
                    <div class="form-group">
                        <label for="inputShortDescription">Короткий опис</label>
                        <textarea class="form-control" id="inputShortDescription" name="inputShortDescription" placeholder="Введіть короткий опис" required="">{{$tour->short_description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputLongDescription">Повний опис</label>
                        <textarea class="form-control" id="inputLongDescription" name="inputLongDescription" placeholder="Введіть повний опис" required="">{{$tour->long_description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputComplexity">Складність</label>
                        <select class="form-control" id="inputComplexity" name="inputComplexity" required="">
                            <option value="Легко" {{ ($tour->complexity == 'Легко') ? 'selected' : '' }}>Легко</option>
                            <option value="Нормально" {{ ($tour->complexity == 'Нормально') ? 'selected' : '' }}>Нормально</option>
                            <option value="Складно" {{ ($tour->complexity == 'Складно') ? 'selected' : '' }}>Складно</option>
                        </select>
                    </div>
                    <div class="form-check">
                        @if($tour->isDiscount)
                        <input class="form-check-input" type="checkbox" value="1" id="inputDiscount" name="inputDiscount"  checked>
                        @else
                        <input class="form-check-input" type="checkbox" value="1" id="inputDiscount" name="inputDiscount" >
                        @endif
                        <label class="form-check-label" for="inputDiscount">
                            Знижка?
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="inputAdditionalInformation">Додаткова інформація</label>
                        <textarea class="form-control" id="inputAdditionalInformation" name="inputAdditionalInformation" placeholder="Введіть додаткову інформацію">{{ $tour->additional_information}}</textarea>
                    </div>

                    <button type="submit" class="btn btn-warning mt-1 mb-2 ">Оновити</button>
                </form>
                <div style="text-align:center;">
                    <a href="{{route('admin-edit-tour-add-route', $tour->id)}}" class="btn btn-info">Добавити маршрут</a>
                </div>

                <hr>
                <h2>Добавлення фотографій</h2>
                <form action="{{ route('admin-edit-tour-submitphoto', $tour->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="inputPicture" class="form-label">Фото</label>
                        <input class="form-control" type="file" id="inputPicture" name="inputPicture" required="">
                    </div>
                    <button type="submit" class="btn btn-primary mt-1 ">Відправити</button>
                </form>
                <hr>
                <h2>Видалити всі фотографії з галереї</h2>
                <form action="{{ route('admin-edit-tour-deletephoto', $tour->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <button type="submit" class="btn btn-danger mt-1 ">Видалити дані</button>
                </form>
            </div>
        @endisset
    </div>  
@endsection