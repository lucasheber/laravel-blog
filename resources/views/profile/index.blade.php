@extends('layouts.app')

@section('content')
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="user[name]" class="form-control" value="{{$user->name}}">
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="user[email]" class="form-control" value="{{$user->email}}">
        </div>

        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" name="user[password]" class="form-control" placeholder="Se deseja atualizar sua senha digite aqui a senha nova">
        </div>

        <div class="form-group">
            <label for="about">Sobre</label>
            <textarea name="about" id="" cols="30" rows="10" class="form-control">{{$user->about}}</textarea>
        </div>

        <div class="form-group">
            <label for="facebook">Facebook</label>
            <input type="url" name="profile[facebook_link]" class="form-control" value="{{$user->profile->facebook_link}}">
        </div>

        <div class="form-group">
            <label for="instagram">Instagram</label>
            <input type="url" name="profile[instagram_link]" class="form-control" value="{{$user->profile->instagram_link}}">
        </div>

        <div class="form-group">
            <label for="site">Site</label>
            <input type="url" name="profile[site_link]" class="form-control" value="{{$user->profile->site_link}}">
        </div>

        <div class="form-group">
            <button class="btn btn-lg btn-succes">Atualizar Meu Perfil</button>
        </div>
    </form>
@endsection
