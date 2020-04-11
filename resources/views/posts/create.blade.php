@extends('layouts.app')

@section('content')
<form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
   @csrf

    <div class="form-group">
        <label for="title">Titulo</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}">
        @error('title')
            <p class="invalid-feedback">{{$message}}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">Descrição</label>
        <input id="description" class="form-control @error('description') is-invalid @enderror" type="text" name="description" value="{{old('description')}}">
        @error('description')
            <p class="invalid-feedback">{{$message}}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="content">Conteúdo</label>
        <textarea name="content"  class="form-control @error('content') is-invalid @enderror" id="content" cols="30" rows="10">{{old('content')}}</textarea>
        @error('content')
            <p class="invalid-feedback">{{$message}}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="slug">Slug</label>
        <input id="slug" class="form-control" type="text" name="slug" value="{{old('slug')}}">
    </div>

    <div class="form-group">
        <label for="thumb">Foto Capa</label>
        <input type="file"  class="form-control @error('thumb') is-invalid @enderror"  name="thumb" id="thumb">
        @error('thumb')
            <p class="invalid-feedback">{{$message}}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="categorias">Categorias</label>

        <div class="row">
            @foreach ($categories as $c)
                <div class="col-2 checkbox">
                    <label for="categoria"><input type="checkbox" name="categories[]" value="{{$c->id}}">{{$c->name}}</label>
                </div>
            @endforeach
        </div>
        @error('categories')
            <p class="invalid-feedback">{{$message}}</p>
        @enderror
    </div>

    <button class="btn btn-lg btn-success">Criar</button>
</form>
@endsection
