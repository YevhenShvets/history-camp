@extends('layouts.app')

@section('title')Всі новини@endsection

@section('content')
    @foreach($data as $row)
    <div class="alert alert-secondary" role="alert">
        {{ $row->name }}
        <hr>
        {{ $row->surname }}
        <hr>
        {{ $row->middle_name }}
        <hr>
    </div>

    @endforeach 
@endsection