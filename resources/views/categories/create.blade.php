@extends('layouts.app')

@section('content')
<form action="{{route('categories.store')}}" method="post">
   @csrf

    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
        @error('name')
            <p class="invalid-feedback">{{$message}}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">Descrição</label>
        <input id="description" class="form-control" type="text" name="description" value="{{old('description')}}">
    </div>

    <div class="form-group">
        <label for="slug">Slug</label>
        <input id="slug" class="form-control" type="text" name="slug" value="{{old('slug')}}">
    </div>

    <button class="btn btn-lg btn-success">Criar</button>
</form>
@endsection
