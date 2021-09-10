@extends('layout')

@section('conteudo')


        <form action="{{ route('contatos.atualizar', ['id'=>$contato->id]) }}" enctype="multipart/form-data" method="post">
        @csrf
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="name" class="form-control" id="nome" name="nome" value="{{$contato->nome}}" placeholder="Nome do Contato" required>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input  class="form-control" id="telefone"  name="telefone" value="{{$contato->telefone}}" placeholder="(xx)xxxx-xxxx" required>
            </div>
            <div class="form-group">
                <label for="telefone">Imagem</label>
                <input type="file" class="form-control" name="foto" >
            </div>

        <button type="submit" class="btn btn-primary">Submit</button>
     </form>


@endsection
