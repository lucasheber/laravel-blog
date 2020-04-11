@extends('layouts.app')

@section('content')
<form action="{{route('categories.update', ['category' => $category->id])}}" method="post">
   @csrf
    @method("PUT")
    <div class="form-group">
        <label for="title">Nome</label>
        <input type="text" name="name" id="name" class="form-control  @error('name') is-invalid @enderror" value="{{$category->name}}">
        @error('name')
            <p class="invalid-feedback">{{$message}}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">Descrição</label>
        <input id="description" class="form-control" type="text" name="description" value="{{$category->description}}">
    </div>

    <div class="form-group">
        <label for="slug">Slug</label>
        <input id="slug" class="form-control" type="text" name="slug" value="{{$category->slug}}">
    </div>

    <button class="btn btn-lg btn-success">Atualizar</button>
</form>

<hr>
<form action="{{route('categories.destroy', ['category' => $category->id])}}" method="post">
    @csrf
     @method("DELETE")
     <button class="btn btn-lg btn-danger">Remover</button>
</form>
@endsection
