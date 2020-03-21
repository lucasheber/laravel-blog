@extends('layouts.app')

@section('content')
<form action="{{route('posts.store')}}" method="post">
   @csrf

    <div class="form-group">
        <label for="title">Titulo</label>
    <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}">
    </div>

    <div class="form-group">
        <label for="description">Descrição</label>
        <input id="description" class="form-control" type="text" name="description" value="{{old('description')}}">
    </div>

    <div class="form-group">
        <label for="content">Conteúdo</label>
        <textarea name="content"  class="form-control" id="content" cols="30" rows="10">{{old('content')}}</textarea>
    </div>
    <div class="form-group">
        <label for="slug">Slug</label>
        <input id="slug" class="form-control" type="text" name="slug" value="{{old('slug')}}">
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
    </div>

    <button class="btn btn-lg btn-success">Criar</button>
</form>
@endsection
