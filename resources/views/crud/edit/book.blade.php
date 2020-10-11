@extends('layouts.main')

@section('content')
<h1>Редактирование книги</h1>
<form method="POST" action="/books/{{$book->id}}">
    @csrf
    @method('PUT')
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Название</label>
            <input name="name" class="form-control" value="{{old('name', $book->name)}}" />
            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label>Автор</label>
            <select name="author_id" class="form-control">
                @foreach ($authors as $id => $author)
                <option {{ old('author_id', $book->author_id) == $id ? 'selected' : ''}} value="{{$id}}">{{$author->full_name}}</option>
                @endforeach
            </select>
            @error('author_id')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label>Кол-во страниц</label>
            <input name="pages_count" class="form-control" value="{{old('pages_count', $book->pages_count)}}" />
            @error('pages_count')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label>Год выпуска</label>
            <input name="year" class="form-control date-picker" value="{{old('year', $book->year)}}" />
            @error('year')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label>Издатель</label>
            <select name="publisher_id" class="form-control" value="{{$book->publisher_id}}">
                @foreach ($publishers as $id => $publisher)
                <option {{old('publisher_id', $book->publisher_id) == $id ? 'selected' : ''}} value="{{$id}}">{{$publisher->name}}</option>
                @endforeach
            </select>
            @error('publisher_id')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label>Тип обложки</label>
            <select name="cover_type" class="form-control" value="{{$book->cover_type}}">
                @foreach ($coverTypes as $coverType)
                <option {{old('cover_type', $book->cover_type) == $coverType ? 'selected' : ''}} value="{{$coverType}}">
                    {{__("cover_types.$coverType")}}</option>
                @endforeach
            </select>
            @error('cover_type')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-primary float-right">Сохранить</button>
</form>

@endsection