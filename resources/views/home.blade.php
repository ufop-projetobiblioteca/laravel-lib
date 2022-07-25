@extends('main')

@section('content')

<?php
    use Illuminate\Support\Facades\DB;
    $livros = DB::table('livros')->count();
    $alunos = DB::table('alunos')->count();
    $emprestimos = DB::table('emprestimos')->where('ativo', 1)->count();
    $atrasos = DB::table('emprestimos')->where('em_atraso', 1)->where('ativo', 1)->count();

?>

<div class="container">
    <div class="row align-items-center">
        <h1 class="mt-4">Sistema de Gerenciamento</h1>
    </div>
    <div class="row">
        <div class="col">
            <div class="card bg-primary text-white mb-4">
                <div class="card-header">Usuários Cadastrados</div>
                <div class="card-body">
                    <?php
                        echo $alunos
                    ?>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card bg-success text-white mb-4">
                <div class="card-header">Livros Cadastrados</div>
                <div class="card-body">
                    <?php
                        echo $livros
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card bg-warning text-white mb-4">
                <div class="card-header">Empréstimos Ativos</div>
                <div class="card-body">
                    <?php
                        echo $emprestimos
                    ?>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card bg-danger text-white mb-4">
            <div class="card-header">Empréstimos em Atraso</div>
                <div class="card-body">
                    <?php
                        echo $atrasos
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection