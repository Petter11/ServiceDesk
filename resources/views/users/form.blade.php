<x-template>

    @extends('adminlte::page')

    @section('title', 'Reports')

    @section('content_header')
    <h1 class="m-0 text-dark"><i class="fas fa-home"></i> Usuários
        <small class="text-muted">- Formulário</small>
    </h1>
    @stop

    @section('content')
    <div class="container pt-5">
        @if(session()->has('mensagem'))
        <div class="alert alert-success">
            {{ session()->get('mensagem') }}
        </div>
        @endif

        @if($errors->any())
        <div class="alert alert-danger">
            <p><strong>Erro ao realizar esta operação! Por favor reveja os campos obrigatorios</strong></p>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


        @if (isset($user))
        <form action="/users/{{ $user->id }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @else
            <form action="/reports" method="POST" enctype="multipart/form-data">
                @endif

                @csrf
                <div class="form-group">
                    <label for="titulo">Nome</label>
                    <input type="text" name="name" placeholder="Digite seu Nome" class="form-control"
                        value="{{ isset($user) ? $user->name : '' }}">
                </div>

                <div class="form-group">
                    <label for="titulo">E-mail</label>
                    <input type="text" name="email" placeholder="Digite seu E-mail" class="form-control"
                        value="{{ isset($user) ? $user->email : '' }}">
                </div>

                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" name="password" placeholder="Digite sua senha" class="form-control"
                        value="{{ isset($user) ? $user->password : '' }}">
                </div>

                <div class="form-group">
                    <label for="classe">Tipo</label>
                    <select name="classe" class="form-control">
                        <option value="VISUAL"
                            {{ isset($user) && $user->classe == "VISUAL" ? "selected='selected'" : ""}}>VISUAL</option>
                        <option value="SONORO"
                            {{ isset($user) && $user->classe == "SONORO" ? "selected='selected'" : ""}}>SONORO</option>
                        <option value="FISICO"
                            {{ isset($user) && $user->classe == "FISICO" ? "selected='selected'" : ""}}>FISICO</option>
                        <option value="GLITCHS"
                            {{ isset($user) && $user->classe == "GLITCHS" ? "selected='selected'" : ""}}>GLITCHS
                        </option>
                        <option value="FINANCEIRO"
                            {{ isset($user) && $user->classe == "FINANCEIRO" ? "selected='selected'" : ""}}>FINANCEIRO
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control">
                        <option value="A" {{ isset($user) && $user->status == "A" ? "selected='selected'" : ""}}>Actived
                        </option>
                        <option value="I" {{ isset($user) && $user->status == "I" ? "selected='selected'" : ""}}>
                            Inactived</option>
                        <option value="P" {{ isset($user) && $user->status == "P" ? "selected='selected'" : ""}}>
                            Pre_registred</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="profile">Perfil</label>
                    <select name="profile" class="form-control">
                        <option value="A" {{ isset($user) && $user->status == "A" ? "selected='selected'" : ""}}>
                            Administrator</option>
                        <option value="U" {{ isset($user) && $user->status == "U" ? "selected='selected'" : ""}}>User
                        </option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary my-1">Salvar</button>
            </form>
    </div>
    <!--FIM DA DIV PRINCIPAL-->
    </form>
    @stop
</x-template>
