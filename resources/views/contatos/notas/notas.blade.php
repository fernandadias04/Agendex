@extends('layout')

@section('conteudo')

<form method="get" action="{{route('contatos.notas.criar', ['contatoId'=>$contatoId])}}">
    @csrf
    <button class="btn btn-primary">Criar Nota</button>
</form>

<table class="table table-striped table-dark">

<thead>
    <tr>
        <th>Titulo</th>
        <th>Mensagem</th>
    </tr>
</thead>

    <tbody>
    @foreach ($notas as $nota)
        <tr>
            <th>{{$nota->titulo}}</th>
            <th>{{$nota->texto}}</th>
            <th>
                <form method="post" action="{{route('contatos.notas.excluir', ['id'=> $nota->id, 'contatoId'=>$contatoId])}}" onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes( $nota->nome )}}?')">
                    @method('delete')
                            @csrf
                        <button class="btn btn-danger">Excluir</button>
                    </form>
            </th>
            <th>
                <form method="get" action="{{route('contatos.notas.editar', ['id'=> $nota->id, 'contatoId'=>$contatoId]) }}">
                    @csrf
                    <button class="btn btn-warning">Editar</button>
                </form>
            </th>
        </tr>
        @endforeach
    </tbody>

</table>

{!! $notas->render(); !!}


@endsection
