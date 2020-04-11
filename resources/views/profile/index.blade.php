@extends('layouts.app')

@section('content')
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="user[name]" class="form-control @error('user.name') is-invalid @enderror" value="{{$user->name}}">
            @error('user.name')
                <p class="invalid-feedbak">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="user[email]" class="form-control @error('user.email') is-invalid @enderror" value="{{$user->email}}">
            @error('user.email')
                <p class="invalid-feedbak">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" name="user[password]" class="form-control @error('user.password') is-invalid @enderror" placeholder="Se deseja atualizar sua senha digite aqui a senha nova">
            @error('user.password')
                <p class="invalid-feedbak">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="about">Sobre</label>
            <textarea name="profile[about]" id="" cols="30" rows="10" class="form-control">{{$user->profile->about}}</textarea>
        </div>

        <div class="form-group">
            <label for="avatar">Avatar</label>
            <input type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror">
            @error('avatar')
                <p class="invalid-feedbak">{{$message}}</p>
            @enderror
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
            <button type="submit" class="btn btn-lg btn-succes">Atualizar Meu Perfil</button>
        </div>
    </form>
@endsection
