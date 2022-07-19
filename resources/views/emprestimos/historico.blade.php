@extends('main')

@section('content')

<br>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Empréstimos
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Aluno</th>
                    <th>Livro</th>
                    <th>Código</th>
                    <th>Devolução</th>
                </tr>
            </thead>
            <tbody>
                @foreach($emprestimos as $e)
                @if($e->ativo == 0)
                <tr>
                    <th>{{ $e->aluno->nome }}</th>
                    <th>{{ $e->livro->titulo }}</th>
                    <th>{{ $e->livro->codigo }}</th>
                    <th>{{ $e->devolucao }}</th>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection