@extends('main')

@section('content')

<br>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Empréstimos
    </div>
    <div class="card-body text-end">
        <button type="button" class="btn btn-lg btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalCadastrar">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
            </svg>
            Novo Empréstimo
        </button>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Aluno</th>
                    <th>Livro</th>
                    <th>Código</th>
                    <th>Devolução</th>
                    <th>Em Atraso</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($emprestimos as $e)
                @if($e->ativo == 1)
                <tr>
                    <td>{{ $e->aluno->nome }}</td>
                    <td>{{ $e->livro->titulo }}</td>
                    <td>{{ $e->livro->codigo }}</td>
                    <td>
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
                    </td>
                    <td>
                        @if($e->em_atraso == 1)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck1" checked disabled>
                        </div>
                        @else
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck1" disabled>
                        </div>
                        @endif
                    </td>
                    <td class="tdBotoes">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalDevolver{{ $e->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
                                <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z" />
                                <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z" />
                            </svg>
                            Devolver
                        </button>
                        <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#modalEditar{{ $e->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
                                <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                            </svg>
                            Renovar
                        </button>
                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalExcluir{{ $e->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                            </svg>
                            Excluir
                        </button>
                    </td>
                </tr>
                @endif


                <!-- Modal Renovar -->
                <div class="modal fade" id="modalEditar{{ $e->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Dados do Empréstimo</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form method="POST" id="formDevolucao" action="{{ route('emprestimos.update', $e->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <dl class="row">
                                        <dt class="col-sm-3">Aluno:</dt>
                                        <dd class="col-sm-9">
                                            <input type="text" class="form-control" name="nome" value="{{ $e->aluno->nome }}" required maxlength="50" disabled>
                                        </dd>

                                        <dt class="col-sm-3">Livro:</dt>
                                        <dd class="col-sm-9">
                                            <input type="text" class="form-control" name="titulo" value="{{ $e->livro->titulo }}" required maxlength="50" disabled>
                                        </dd>

                                        <dt class="col-sm-3">Código:</dt>
                                        <dd class="col-sm-9">
                                            <input type="text" class="form-control" name="codigo" value="{{ $e->livro->codigo }}" required maxlength="50" disabled>
                                        </dd>

                                        <dt class="col-sm-3">Devolução:</dt>
                                        <dd class="col-sm-9">
                                            <input type="date" class="form-control" id="devolver" name="devolucao" required>
                                        </dd>
                                    </dl>
                                    <input type="hidden" class="form-control" name="flag" value="1">
                                    <input type="hidden" name="em_atraso" id="em_atraso" value="{{ $e->em_atraso }}">
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-outline-success" value="Salvar">
                                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal Devolver -->
                <div class="modal fade" id="modalDevolver{{ $e->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Dados do Empréstimo</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form method="POST" action="{{ route('emprestimos.update', $e->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <blockquote class="blockquote">
                                        <p class="mb-0">Tem certeza que deseja devolver "<b>{{$e->livro->titulo}}</b>"?</p>
                                    </blockquote>
                                </div>
                                <input type="hidden" class="form-control" name="id" value="{{ $e->id }}">
                                <input type="hidden" class="form-control" name="flag" value="0">
                                <input type="hidden" class="form-control" name="livro_id" value="{{ $e->livro->id }}">
                                <input type="hidden" class="form-control" name="aluno_id" value="{{ $e->aluno->id }}">
                                <div class="modal-footer">
                                    <input class="btn btn-outline-success" type="submit" value="Devolver">
                                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal Excluir -->
                <div class="modal fade" id="modalExcluir{{ $e->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Dados do Empréstimo</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form method="POST" action="{{ route('emprestimos.destroy', $e->id) }}">
                                @csrf
                                @method('DELETE')
                                <div class="modal-body">
                                    <blockquote class="blockquote">
                                        <p class="mb-0">Tem certeza que deseja excluir o empréstimo do "<b>{{$e->livro->titulo}}</b>" de seu Banco de Dados?</p>
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
                        <h5 class="modal-title" id="exampleModalLabel">Novo Empréstimo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('emprestimos.store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <dl class="row">
                                <dt class="col-sm-3">Email:</dt>
                                <dd class="col-sm-9">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="aluno_email">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary" type="button" onclick="fetchUser()">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </dd>

                                <dt class="col-sm-3">Aluno:</dt>
                                <dd class="col-sm-9">
                                    <input type="text" class="form-control" id="retorno_email" name="nome" value="" required maxlength="50" disabled>
                                </dd>

                                <dt class="col-sm-3">Codigo:</dt>
                                <dd class="col-sm-9">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="id_livro">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary" type="button" onclick="fetchBook()">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </dd>

                                <dt class="col-sm-3">Livro:</dt>
                                <dd class="col-sm-9">
                                    <input type="text" class="form-control" id="retorno_id" name="titulo" required maxlength="50" disabled>
                                </dd>

                                <dt class="col-sm-3">Devolução:</dt>
                                <dd class="col-sm-9">
                                    <input type="date" class="form-control" id="devolucao" name="devolucao" required>
                                </dd>

                                <input type="hidden" class="form-control" name="livro_id" id="livro_id">
                                <input type="hidden" class="form-control" name="aluno_id" id="aluno_id">
                                <input type="hidden" class="form-control" name="em_atraso" value="0">
                                <input type="hidden" class="form-control" name="renovado" value="0">
                                <input type="hidden" class="form-control" name="ativo" value="1">
                            </dl>
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

@section('script')
<script>
    function getName() {
        var input = document.getElementById("aluno_email").value;
        return input;
    }

    function getBook() {
        var input = document.getElementById("id_livro").value;
        return input;
    }

    function fetchUser() {
        $.ajax({
            type: "GET",
            url: "/fetch-users",
            dataType: "json",
            success: function(response) {
                input = getName();
                $.each(response.users, function(key, item) {
                    if (input == item.email) {
                        document.getElementById("aluno_id").setAttribute("value", item.id);
                        document.getElementById("retorno_email").setAttribute("value", item.nome);
                    } else {
                        console.log('falha');
                    }
                });
            }
        });
    }

    function fetchBook() {
        $.ajax({
            type: "GET",
            url: "/fetch-books",
            dataType: "json",
            success: function(response) {
                input = getBook();
                $.each(response.books, function(key, item) {
                    if (input == item.codigo) {
                        document.getElementById("livro_id").setAttribute("value", item.id);
                        document.getElementById("retorno_id").setAttribute("value", item.titulo);
                    } else {
                        console.log('falha');
                    }
                });
            }
        });
    }
</script>
@endsection