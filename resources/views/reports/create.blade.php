<x-template>

    @extends('adminlte::page')

    @section('title', 'Reports')

    @section('content_header')
    <h1 class="m-0 text-dark"><i class="fas fa-home"></i> Reports
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
        
        @if (isset($report))
        <form action="/reports/{{ $report->id }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @else
            <form action="/reports" method="POST" enctype="multipart/form-data">
                @endif

                @csrf

                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" name="titulo" placeholder="Digite o título do bug" class="form-control"
                        value="{{ isset($report) ? $report->titulo : '' }}">
                </div>

                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea name="descricao" placeholder="Descreva o problema identificado" class="form-control"
                        rows="5">{{ isset($report) ? $report->descricao : '' }}</textarea>
                </div>

                <div class="form-group">
                    <label for="imagem">Imagem Destaque</label>
                    <input type="file" name="imagem" />
                    @if (isset($report) && $report->imagem)
                    <img src="{{ $report->imagem }}" height="90px" class="d-block">
                    @endif
                </div>

                <div class="form-group">
                    <label for="classe">Classificação</label>
                    <select name="classe" class="form-control">
                        <option value="VISUAL"
                            {{ isset($report) && $report->classe == "VISUAL" ? "selected='selected'" : ""}}>VISUAL
                        </option>
                        <option value="SONORO"
                            {{ isset($report) && $report->classe == "SONORO" ? "selected='selected'" : ""}}>SONORO
                        </option>
                        <option value="FISICO"
                            {{ isset($report) && $report->classe == "FISICO" ? "selected='selected'" : ""}}>FISICO
                        </option>
                        <option value="GLITCHS"
                            {{ isset($report) && $report->classe == "GLITCHS" ? "selected='selected'" : ""}}>GLITCHS
                        </option>
                        <option value="FINANCEIRO"
                            {{ isset($report) && $report->classe == "FINANCEIRO" ? "selected='selected'" : ""}}>
                            FINANCEIRO</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control">
                        <option value="A" {{ isset($report) && $report->status == "A" ? "selected='selected'" : ""}}>
                            Aguardando</option>
                        <option value="E" {{ isset($report) && $report->status == "E" ? "selected='selected'" : ""}}>Em
                            Correção</option>
                        <option value="C" {{ isset($report) && $report->status == "C" ? "selected='selected'" : ""}}>
                            Corrigido</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Salvar</button>

            </form>
    </div>
    </div>
    @stop
</x-template>