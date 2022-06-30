@extends('main')

@section('content')


<div class="container">
    <div class="row align-items-center">
        <h1 class="mt-4">Sistema de Administração</h1>
        <h2 class="mt-4">Biblioteca</h2>
    </div>
    <div class="row">
        <div class="col">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Usuários Cadastrados</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">Ver Detalhes</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Livros Cadastrados</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">Ver Detalhes</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Empréstimos Ativos</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">Ver Detalhes</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Empréstimos em Atraso</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">Ver Detalhes</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--  -->
@endsection