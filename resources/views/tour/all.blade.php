@extends('layouts.app')

@section('title')Всі історичні тури@endsection

@section('link')
<link rel="stylesheet" href="/css/tour.css">
@endsection

@section('content')
<style>
    #form1{
        width:300px;
        height:50px;
        font-size:25px;
    }
    .search_form{
        margin:60px auto 0 auto; 
        padding:20px 40px 0 40px; 
        width:max-content; 
        border: 1px solid rgba(0,0,0,0.1);
        border-radius:3px;
        transition: 0.2s;
    }
    .search_form:hover{
        padding:20px 100px 0 100px;
    }
</style>
    <div class="container">
        <div class="search_form">
        <form action="{{ route('tours-page-submit') }}" method="POST">
            @csrf
            <div class="input-group">
                <div class="form-outline">
                    <input type="search" name="search" id="form1" placeholder="Назва" class="form-control"/>
                </div>
                <button type="submit" class="btn" style="background:rgba(55,155,100, 0.5);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
            </div>
        </form>
        <div style="display:flex; justify-content:space-evenly; margin-top:10px;">
            <a href="{{ route('tours-page', ['search' => 'popular']) }}">Популярні</a>&nbsp;&nbsp;
            <a href="{{ route('tours-page', ['search' => 'rating']) }}">Рейтингові</a>&nbsp;&nbsp;
            <a href="{{ route('tours-page', ['search' => 'date']) }}">Найближча дата</a>
        </div>
        <!-- <div style="display:flex; justify-content:center; margin-top:10px;">
            Сортувати по ціні
        </div> -->
        </div>
    </div>
    
    <div class="container" style="margin-top: 5rem !important; text-align:center;">
    @auth('admin')
    <h2 style="text-align:center; margin:20px; color:rgba(220,50,60, 0.6);">Щоб редагувати тур, виберіть його і там будуть кнопки "Редагувати|Вилучити"</h2>
    @endauth
        @forelse ($data as $el)
        <a href="{{ route('tour-id-page', ['id' => $el->id]) }}" style="text-decoration:none; color:black;">
        <div class="my-2 mx-auto p-relative bg-white shadow-1 blue-hover" style="width: 310px; min-height:550px; overflow: hidden; border-radius: 1px; display: inline-block; text-align:left;">
            @isset($images[$el->id])
            <img style="height:300px; max-width:100%; object-fit: cover;" src="{{ URL::asset($images[$el->id]) }}" alt="" class="d-block w-full">
            @else
            <img style="opacity:0.6; height:300px;" src="https://img.icons8.com/ios-filled/250/000000/no-image.png" alt="" class="d-block w-full">
            @endisset
            <div class="px-2 py-2">
                <p class="mb-0 small font-weight-medium text-uppercase mb-1 text-muted lts-2px">
                    Travel
                </p>
                @isset($rating[$el->id])
                <div>
                @if($rating[$el->id] == 0)
                    <span class="bi bi-star-fill" style="color:orange;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg></span>
                    <span class="bi bi-star-fill" style="color:orange;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg></span>
                    <span class="bi bi-star-fill" style="color:orange;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg></span>
                    <span class="bi bi-star-fill" style="color:orange;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg></span>
                    <span class="bi bi-star-fill" style="color:orange;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg></span>
                @else
                    <span class="bi bi-star-fill" {{ ($rating[$el->id] >= 1) ? 'style=color:orange;' : 'style=color:gray;' }} ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg></span>
                    <span class="bi bi-star-fill" {{ ($rating[$el->id] >= 2) ? 'style=color:orange;' : 'style=color:gray;' }}><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg></span>
                    <span class="bi bi-star-fill" {{ ($rating[$el->id] >= 3) ? 'style=color:orange;' : 'style=color:gray;' }}><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg></span>
                    <span class="bi bi-star-fill" {{ ($rating[$el->id] >= 4) ? 'style=color:orange;' : 'style=color:gray;' }}><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg></span>
                    <span class="bi bi-star-fill" {{ ($rating[$el->id] >= 5) ? 'style=color:orange;' : 'style=color:gray;' }}><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg></span>
                @endif
                </div>
                @endisset
                <h1 class="ff-serif font-weight-normal text-black card-heading mt-0 mb-1" style="line-height: 1.25;">
                {{ $el->name }}
                </h1>
                <p class="mb-1">
                {{ $el->short_description }}&hellip;
                </p>
            </div>
            <!-- <a href="{{ route('tour-id-page', ['id' => $el->id]) }}" class="text-uppercase d-inline-block font-weight-medium lts-2px ml-2 mb-2 text-center styled-link">
                Детальніше
            </a>      -->
        </div>
        </a>
        @empty
            <p class="d-flex justify-content-center" style="font-size:28px;">Історичні тури не знайдено</p>
        @endforelse
    </div>   

@endsection