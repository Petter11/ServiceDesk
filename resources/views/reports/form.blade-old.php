    @extends('adminlte::page')

    @section('title', 'Reports - Edição')

    @section('content_header')
    <h1 class="m-0 text-dark"><i class="fas fa-home"></i> Reports
        <small class="text-muted">- Formulário</small>
    </h1>
    @stop

    @section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                Formulário de Reports
            </h3>
        </div>
            <div class="container pt-5">

            @if($errors->any())
                <div class="alert alert-danger">
                    <p><strong>Erro ao realizar esta operação</strong></p>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif

            @if (isset($reports))
                <form action="/reports/{{$report->id}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

            @else 
                <form action="/reports" method="POST" enctype="multipart/form-data">
            @endif      
                @csrf

                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" name="titulo" placeholder="Digite o título do bug" class="form-control">
                </div>

                <div class="form-group">
                    <label for="conteudo">Conteúdo</label>
                    <textarea name="conteudo" placeholder="Descreva o problema identificado" class="form-control" rows="5"></textarea>
                </div>

                <div class="form-group">
                    <label for="imagem">Imagem Destaque</label>
                    <input type="file" name="imagem"/>
                    @if ($report->imagem)
                        <img src="{{ $report->imagem }}" alt="" height="100px" class="d-block">
                    @endif
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control">
                        <option value="A" {{ $report->status == "A" ? "selected='selected'" : ""}}>Aguardando</option> 
                        <option value="E" {{ $report->status == "E" ? "selected='selected'" : ""}}>Em Correção</option>
                        <option value="C" {{ $report->status == "C" ? "selected='selected'" : ""}}>Corrigido</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>

        <a href="/reports" class="btn btn-light mt-5">Voltar</a>
    </div>
    @stop