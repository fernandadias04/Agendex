@extends('layout')

@section('conteudo')


<div class="row justify-content-center">
    <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('user.atualizar', ['id'=>$user->id]) }}" enctype="multipart/form-data" method="post">
                            @csrf
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input type="name" class="form-control" name="name" value="{{old('name', $user->name)}}" required>
                                    <p>{{$errors->first('name')}}</p>
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input  class="form-control"   name="email" value="{{old('email', $user->email )}}"  required>
                                    <p>{{$errors->first('email')}}</p>
                                </div>

                                <div class="form-group">
                                    <label for="password">Senha</label>
                                    <input  class="form-control"  name="password" >
                                    <p>{{$errors->first('password')}}</p>
                                </div>

                                <div class="form-group">
                                    <label for="password">Confirmar Senha</label>
                                    <input  class="form-control"  name="password_confirmation" >
                                    <p>{{$errors->first('password_confirmation')}}</p>
                                </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                    <form action="{{route('user.delete')}}" enctype="multipart/form-data" method="post" onsubmit="return confirm('Tem certeza que deseja remover Usuario?')">
                    @method('delete')
                    @csrf
                        <button type="submit" class="btn btn-primary">Excluir Usuário</button>
                    </form>
                </div>
            </div>
    </div>
</div>

@endsection
