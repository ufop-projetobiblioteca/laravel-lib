<!DOCTYPE html>
<html lang="en">

<head>
    <title>Biblioteca</title>

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Sistema para Gerenciamento de Bibliotecas" />
    <meta name="keywords" content="HTML, CSS, JavaScript, Laravel">
    <meta name="author" content="Victor Dias" />

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{ url('assets/css/styles.css') }}" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <script src="{{ url('assets/js/valida.js') }}"></script>
</head>

<body>
    <div class="container">
        <div class="col-6">
            <div class="card">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">{{ __('Confirme seu email') }}</div>

                                <div class="card-body">
                                    @if (session('resent'))
                                    <div class="alert alert-success" role="alert">
                                        {{ __('Um novo link de verificação foi enviado para seu endereço de e-mail.') }}
                                    </div>
                                    @endif

                                    {{ __('Antes de continuar, verifique seu e-mail para obter um link de verificação.') }}
                                    {{ __('Se você não recebeu o e-mail') }},
                                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                        @csrf
                                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('clique aqui para solicitar outro') }}</button>.
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>