<form action="{{route('posts.update', ['post' => $post->id])}}" method="post">
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
        <input id="content" class="form-control" type="text" name="content" value="{{$post->content}}">
    </div>
    <div class="form-group">
        <label for="slug">Slug</label>
        <input id="slug" class="form-control" type="text" name="slug" value="{{$post->slug}}">
    </div>

    <button class="btn btn-lg btn-success">Atualizar</button>
</form>

<form action="{{route('posts.destroy', ['post' => $post->id])}}" method="post">
    @csrf
     @method("DELETE")
     <button class="btn btn-lg btn-success">Remover</button>
</form>
