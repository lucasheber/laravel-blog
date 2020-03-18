@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <a href="{{ route('posts.create') }}" class="btn btn-success float-ritght">
                Criar Postagem
            </a>

            <h2>Postagens Blog</h2>

            <div class="clearfix"></div>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Autor</th>
                <th>Titulo</th>
                <th>Status</th>
                <th>Criado</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->title}}</td>

                    <td>
                        @if($post->is_active)
                            <span class="badge badge-success">Ativo</span>
                        @else
                            <span class="badge badge-danger">Inativo</span>
                        @endif
                    </td>

                    <td> {{date('d/m/Y H:i:s', strtotime($post->created_at))}} </td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="btn btn-primary btn-sm">Editar</a>
                            <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">Remover</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Nada Encontrado</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{$posts->links()}}
@endsection
