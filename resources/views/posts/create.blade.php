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
        <input id="content" class="form-control" type="text" name="content" value="{{old('content')}}">
    </div>
    <div class="form-group">
        <label for="slug">Slug</label>
        <input id="slug" class="form-control" type="text" name="slug" value="{{old('slug')}}">
    </div>

    <button class="btn btn-lg btn-success">Criar</button>
</form>
