<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contatos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.3.1/jquery.quicksearch.js"></script>
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{url('css/estilo.css')}}">
</head>
<body>


    <header>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Agendex</a>

        <div class="collapse navbar-collapse" >
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link " aria-current="page" href="{{'/'}}">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link " href="{{route('contatos.criar')}}">Cadastrar</a>
                     </li>
                    <li class="nav-item active">
                        <a class="nav-link " href="{{route('user.editar')}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Usuário
                         </a>
                    </li>
                    <li class="nav-item active">
                    <a class="nav-link  text-danger" href="{{route('logout')}}">Logout</a>
                </li>
            </ul>
            </div>
                <form class="form-inline my-2 my-lg-0" >
                    <input class="form-control mr-sm-2" type="search"  name="consulta" id="txt_consulta" placeholder="Consultar" value="{{ request()->get('consulta') }}" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>


        </nav>
    </div>
    </header>
    <div class="container">
        <div>
            @yield('conteudo')
        </div>
    </div>
    </div>

</body>
</html>
