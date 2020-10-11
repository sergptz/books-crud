@extends('layouts.main')

@section('content')
<h1>Создание книги</h1>
<form method="POST" action="{{url('books')}}" accept-charset="UTF-8">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Название</label>
            <input value="{{ old('name') }}" name="name" class="form-control" />
            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label>Автор</label>
            <select name="author_id" class="form-control">
                @foreach ($authors as $id => $author)
                <option {{ old('author_id') == $id ? 'selected' : '' }} value="{{$id}}">{{$author->full_name}}</option>
                @endforeach
            </select>
            @error('author_id')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label>Кол-во страниц</label>
            <input value="{{ old('pages_count') }}" name="pages_count" class="form-control" />
            @error('pages_count')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label>Год выпуска</label>
            <input value="{{ old('year') }}" name="year" class="form-control date-picker" />
            @error('year')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label>Издатель</label>
            <select name="publisher_id" class="form-control">
                @foreach ($publishers as $id => $publisher)
                <option {{ old('publisher_id') == $id ? 'selected' : '' }} value="{{$id}}">{{$publisher->name}}</option>
                @endforeach
            </select>
            @error('publisher_id')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label>Тип обложки</label>
            <select name="cover_type" class="form-control">
                @foreach ($coverTypes as $coverType)
                <option {{ old('cover_type') == $id ? 'selected' : '' }} value="{{$coverType}}">
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