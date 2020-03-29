@extends('layouts.app')

@section('content')
<form action="{{route('posts.update', ['post' => $post->id])}}" method="post" enctype="multipart/form-data">
   @csrf
    @method("PUT")
    <div class="form-group">
        <label for="title">Titulo</label>
    <input type="text" name="title" id="title" class="form-control" value="{{$post->title}}">
    </div>

    <div class="form-group">
        <label for="description">Descrição</label>
        <input id="description" class="form-control" type="text" name="description" value="{{$post->description}}">
    </div>

    <div class="form-group">
        <label for="content">Conteúdo</label>
        <textarea name="content"  class="form-control" id="content" cols="30" rows="10">{{$post->content}}</textarea>
    </div>
    <div class="form-group">
        <label for="slug">Slug</label>
        <input id="slug" class="form-control" type="text" name="slug" value="{{$post->slug}}">
    </div>

    <div class="form-group">
        <label for="thumb">Foto Capa</label>
        <input type="file" name="thumb" id="thumb">
    </div>

    <div class="form-group">
        <label for="categorias">Categorias</label>

        <div class="row">
            @foreach ($categories as $c)
                <div class="col-2 checkbox">
                    <label for="categoria"><input type="checkbox" name="categories[]" value="{{$c->id}}" @if ($post->categories->contains($c)) checked @endif >
                        {{$c->name}}
                    </label>
                </div>
            @endforeach
        </div>
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
