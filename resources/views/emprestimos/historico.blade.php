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
                    <th>
                        <?php
                            $var = $e->devolucao
                        ?>
                        <script>
                            <?php
                                echo "var jsvar = '$var';";
                            ?>
                            data = jsvar.split('-').reverse().join('/');
                            document.write(data)
                        </script>
                    </th>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection