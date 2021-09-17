@extends('layout')

@section('conteudo')

<div class="row justify-content-center">
    <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('contatos.notas.salvar', ['contatoId'=>$contatoId])}}" enctype="multipart/form-data" method="post">
                    @csrf
                        <div class="form-group">
                            <label name="titulo">Titulo</label>
                            <input type="name" class="form-control"  name="titulo"  placeholder="Nome do Contato">
                        </div>
                        <div class="form-group">
                            <label name="texto">Texto</label>
                            <input type="name" class="form-control"  name="texto"  placeholder="Nome do Contato">
                       </div>

                       <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
    </div>
</div>

@endsection
