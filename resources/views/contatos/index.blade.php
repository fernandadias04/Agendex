@extends('layout')

@section('conteudo')


    <div>

        @if(session('mensagem'))
        <div class="alert alert-success">
            <p>{{session('mensagem')}}</p>
        </div>
         @endif




<table class="table table-striped table-dark">
  <thead>
    <tr>

        <th scope="col">Foto</th>
      <th scope="col">Nome</th>
      <th scope="col">Número</th>
    </tr>

  </thead>

  @foreach ($contatos as $contato)
  <tbody>

    <tr>

    @if($contato->foto != null)
    <td><img  src="{{url('storage/'.$contato->foto)}}" class="avatar"></td>


    @else
         <td><img  src="{{url('img/avatar.jpg')}}" class="avatar"></td>

    @endif
      <th>{{$contato->nome}}</th>
      <th>{{$contato->telefone}}</th>
      <th>
      <form method="post" action="{{route('contatos.excluir', ['id'=> $contato->id])}}" onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes( $contato->nome )}}?')">
         @method('delete')
                @csrf
            <button class="btn btn-danger">Excluir</button>
        </form>
      </th>
        <th>
        <form method="get" action="{{ route('contatos.editar', ['id'=> $contato->id]) }}">
            @csrf
            <button class="btn btn-warning">Editar</button>
        </form>
        </th>
        <th>
        <form method="get" action="{{ route('contatos.notas.notas', ['id'=> $contato->id]) }}">
            @csrf
            <button class="btn btn-success"> Notas</button>
        </form>
        </th>
    </tr>

  </tbody>
  @endforeach
</table>



        {!! $contatos->render(); !!}

    </div>
    </div>
@endsection

