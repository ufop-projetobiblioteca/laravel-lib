@extends('main')

@section('content')

<br>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Gerência de Usuários
    </div>
    <div class="card-body text-end">
        <button type="button" class="btn btn-lg btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalCadastrar">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
            </svg>
            Cadastrar
        </button>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Aluno</th>
                    <th>Turma</th>
                    <th>Nascimento</th>
                    <th>Email</th>
                    <th>Empréstimos Ativos</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alunos as $a)
                <tr>
                    <th>{{ $a->nome }}</th>
                    <th>{{ $a->turma }}</th>
                    <th>{{ $a->data_nascimento }}</th>
                    <th>{{ $a->email }}</th>
                    <td>{{ $a->emprestimos_ativos }}</td>
                    <td class="tdBotoes">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalVisualizar{{ $a->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                            </svg>
                            Visualizar
                        </button>

                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalExcluir{{ $a->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                            </svg>
                            Excluir
                        </button>
                    </td>
                </tr>

                <!-- Modal Visualizar -->
                <div class="modal fade" id="modalVisualizar{{ $a->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Dados do Aluno</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <dl class="row">
                                    <dt class="col-sm-3">Nome:</dt>
                                    <dd class="col-sm-9">{{$a->nome}}</dd>

                                    <dt class="col-sm-3">Turma:</dt>
                                    <dd class="col-sm-9">{{$a->turma}}</dd>

                                    <dt class="col-sm-3">Nascimento:</dt>
                                    <dd class="col-sm-9">{{$a->data_nascimento}}</dd>

                                    <dt class="col-sm-3">Email:</dt>
                                    <dd class="col-sm-9">{{$a->email}}</dd>
                                </dl>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" data-bs-target="#modalEditar{{ $a->id }}" data-bs-toggle="modal" data-bs-dismiss="modal">Editar</button>
                                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Editar -->
                <div class="modal fade" id="modalEditar{{ $a->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Dados do Usuário</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form method="POST" action="{{ route('alunos.update', $a->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <dl class="row">
                                        <dt class="col-sm-3">Nome:</dt>
                                        <dd class="col-sm-9">
                                            <input type="text" class="form-control" name="nome" value="{{$a->nome}}" required maxlength="30">
                                        </dd>

                                        <dt class="col-sm-3">Turma:</dt>
                                        <dd class="col-sm-9">
                                            <input type="text" class="form-control" name="turma" value="{{$a->turma}}" required maxlength="30">
                                        </dd>

                                        <dt class="col-sm-3">Nascimento:</dt>
                                        <dd class="col-sm-9">
                                            <input type="date" class="form-control" name="nascimento" value="{{$a->data_nascimento}}" required maxlength="30">
                                        </dd>

                                        <dt class="col-sm-3">Email:</dt>
                                        <dd class="col-sm-9">
                                            <input type="email" class="form-control" name="email" value="{{$a->email}}" required maxlength="30">
                                        </dd>
                                    </dl>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-outline-success">Salvar</button>
                                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal Excluir-->
                <div class="modal fade" id="modalExcluir{{ $a->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form name="formDelete" action="{{ route('alunos.destroy', $a->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal-body">
                                    <blockquote class="blockquote">
                                        <p class="mb-0">Tem certeza que deseja excluir "<b>{{$a->nome}}</b>" do seu Banco de Dados?</p>
                                    </blockquote>
                                </div>
                                <div class="modal-footer">
                                    <input class="btn btn-outline-danger" type="submit" value="Excluir">
                                    <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal">Cancelar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>

        <!-- Modal Cadastrar -->
        <div class="modal fade" id="modalCadastrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Novo Aluno</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('alunos.store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <dt class="col-sm-3">Nome:</dt>
                                <dd class="col-sm-9">
                                    <input type="text" class="form-control" name="nome" required maxlength="30">
                                </dd>

                                <dt class="col-sm-3">Turma:</dt>
                                <dd class="col-sm-9">
                                    <input type="text" class="form-control" name="turma" required maxlength="30">
                                </dd>

                                <dt class="col-sm-3">Nascimento:</dt>
                                <dd class="col-sm-9">
                                    <input type="date" class="form-control" name="data_nascimento" required maxlength="30">
                                </dd>

                                <dt class="col-sm-3">Email:</dt>
                                <dd class="col-sm-9">
                                    <input type="email" class="form-control" name="email" required maxlength="30">
                                </dd>
                                <input type="hidden" class="form-control" name="emprestimos_ativos" value="0">

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-success">Cadastrar</button>
                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection