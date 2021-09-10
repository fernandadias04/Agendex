<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contatos</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.3.1/jquery.quicksearch.js"></script>
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{url('css/estilo.css')}}">
</head>
<body>
    <div class="container">

    <header>
        <div class="row">
            <div class="componentes-menu">
                <div class="col-md-3">
                  <a href="{{'/'}}" > <img  src="{{url('img/agendex.png')}}" class="logo"></a>
                </div>

                <div class="col-md-6">
                    <form method="get" action="{{route('contatos.index')}}">
                        <div class="form-group input-group">
                            <input name="consulta" id="txt_consulta" placeholder="Consultar" value="{{ request()->get('consulta') }}" type="text" class="form-control">
                            <span class="input-group-addon"> <button><i class="glyphicon glyphicon-search"></i></button></span>
                        </div>
                    </form>
                </div>
            <div class="col-md-3">
                    <a href="{{route('contatos.criar')}}" class="btn btn-primary">Cadastrar</a>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div>
            @yield('conteudo')
        </div>
    </div>

</body>
</html>
