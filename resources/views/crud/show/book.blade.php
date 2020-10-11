@extends('layouts.main')

@section('content')
    <h2>Подробнее о книге "{{$book->name}}"</h2>
    <hr>
    <div class="d-flex flex-column">
        <p><b>Название книги: </b> {{$book->name}}</p>
        <p><b>ФИО автора: </b>
            {{"{$book->author->first_name} {$book->author->patronymic} {$book->author->surname}"}}</p>
        <p><b>Кол-во страниц: </b> {{$book->pages_count}}</p>
        <p><b>Год выпуска: </b> {{$book->year}}</p>
        <p><b>Издатель: </b> {{$book->publisher->name}}</p>
        <p><b>Тип обложки: </b> {{__("cover_types.$book->cover_type")}}</p>
    </div>
    <div class="d-flex flex-row justify-content-end">
        <a href="/books/{{$book->id}}/edit" class="btn btn-primary mr-2">Редактировать</a>
        <a href="/books" class="btn btn-secondary">Назад к списку книг</a>
    </div>
@endsection