@extends('layouts.main')

@section('title', 'Книги')

@section('content')
<h1>Список книг</h1>
<div class="d-flex flex-row justify-content-end">
    <a href="/api/export-books" class="btn btn-primary mr-2">Экспорт в Excel</a>
    <a class="btn btn-success" href="/books/create">Создать</a>
</div>
<div class="table-responsive">
    @if(count($books) > 0)
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <td>Название</td>
                <td>Автор</td>
                <td>Кол-во страниц</td>
                <td>Год выпуска</td>
                <td>Издатель</td>
                <td>Тип обложки</td>
                <td></td>
            </tr>
        </thead>
        @foreach ($books as $book)
        <tr>
            <td>{{ $book->name }}</td>
            <td>{{ $book->author->full_name }}</td>
            <td>{{ $book->pages_count }}</td>
            <td>{{ $book->year }}</td>
            <td>{{ $book->publisher->name }}</td>
            <td>{{ __("cover_types.$book->cover_type") }}</td>
            <td class="d-flex flex-row">
                <a href="/books/{{ $book->id }}" class="btn btn-secondary mr-2"><i class="fas fa-book-open"></i></a>
                <a href="/books/{{ $book->id }}/edit" class="btn btn-primary mr-2"><i class="fas fa-pen"></i></a>
                <form action="books/{{$book->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
        @else
            <div class="mt-3 alert alert-info">Нет ни одной книги!</div>
        @endif
    </table>
</div>
@endsection