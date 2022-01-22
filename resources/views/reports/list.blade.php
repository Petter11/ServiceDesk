<x-template>
    @extends('adminlte::page')

    @section('title', 'Reports')

    @section('content_header')

    <h1 class="m-0 text-dark"><i class="fas fa-home"></i> Reports
        <small class="text-muted">- Index </small>
    </h1>
    @stop

    @section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                Tabela de Reports
            </h3>
        </div>

        <div class="container pt-5">
            @if(session()->has('mensagem'))
            <div class="alert alert-success">
                {{ session()->get('mensagem') }}
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger">
                <p><strong>Erro ao realizar esta Operação! Por favor reveja os campos
                        obrigatorios</strong></p>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif


            <a href="/reports/create" class="btn btn-success mb-5">Novo Report</a>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Ações</th>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Status</th>
                        <th>Classificação</th>
                        <th>Imagem</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($reports as $report)
                    <tr>
                        <td>
                            <a href="/reports/{{ $report->id }}/edit" class="btn btn-primary btn-sm">Editar</a>
                            <form action="/reports/{{ $report->id }}" class="d-inline-block" method="POST"
                                onSubmit="confirmarExclusao(event)">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Excluir</button>
                            </form>
                        </td>
                        <td>{{ $report->titulo }}</td>
                        <td>{{ $report->descricao }}</td>
                        <td>{{ $report->status_formatado }}</td>
                        <td>{{ $report->classe }}</td>
                        <td><img src="{{ $report->imagem}}" height="50px"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $reports->links() }}
        </div>
    </div>
    @stop
</x-template>