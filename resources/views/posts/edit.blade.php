@extends('layouts.app')

@section('content')
<form action="{{route('posts.update', ['post' => $post->id])}}" method="post" enctype="multipart/form-data">
   @csrf
    @method("PUT")
    <div class="form-group">
        <label for="title">Titulo</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{$post->title}}">
        @error('title')
            <p class="invalid-feedback">{{$message}}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">Descrição</label>
        <input id="description" class="form-control @error('content') is-invalid @enderror" type="text" name="description" value="{{$post->description}}">
        @error('description')
            <p class="invalid-feedback">{{$message}}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="content">Conteúdo</label>
        <textarea name="content"  class="form-control @error('content') is-invalid @enderror" id="content" cols="30" rows="10">{{$post->content}}</textarea>
        @error('content')
            <p class="invalid-feedback">{{$message}}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="slug">Slug</label>
        <input id="slug" class="form-control" type="text" name="slug" value="{{$post->slug}}">
    </div>

    <div class="form-group">
        <label for="thumb">Foto Capa</label>
        <input type="file" name="thumb" id="thumb" class="form-control @error('thumb') is-invalid @enderror">
        @error('thumb')
            <p class="invalid-feedback">{{$message}}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="categorias">Categorias</label>

        <div class="row">
            @foreach ($categories as $c)
                <div class="col-2 checkbox">
                    <label for="categoria"><input type="checkbox" class="custom-control @error('categories') is-invalid @enderror" name="categories[]" value="{{$c->id}}" @if ($post->categories->contains($c)) checked @endif >
                        {{$c->name}}
                    </label>
                </div>
            @endforeach
        </div>
        @error('categories')
            <p class="invalid-feedback">{{$message}}</p>
        @enderror
    </div>

    <button class="btn btn-lg btn-success">Atualizar</button>
</form>

<hr>
<form action="{{route('posts.destroy', ['post' => $post->id])}}" method="post">
    @csrf
     @method("DELETE")
     <button class="btn btn-lg btn-danger">Remover</button>
</form>
@endsection
