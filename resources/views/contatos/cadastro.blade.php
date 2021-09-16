@extends('layout')

@section('conteudo')
<div class="row justify-content-center">
    <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                        <form method="post" enctype="multipart/form-data" action="{{route('contatos.salvar')}}">
                        @csrf
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="name" class="form-control" id="nome" name="nome"  placeholder="Nome do Contato" required>
                            </div>
                            <div class="form-group">
                                <label for="telefone">Telefone</label>
                                <input  class="form-control" id="telefone"  name="telefone" placeholder="(xx)xxxx-xxxx" required>
                            </div>
                            <div class="form-group">
                                <label for="telefone">Imagem</label>
                                <input type="file" class="form-control" name="foto" >
                            </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
    </div>
</div>
@endsection



