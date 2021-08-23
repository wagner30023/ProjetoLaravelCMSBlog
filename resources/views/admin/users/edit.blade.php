@extends('adminlte::page')

@section('title','Editar Usuário')

@section('content_header')
    <h1> Editar Usuário </h1>
@endsection

@section('content')
    <div class="card card-primary">    
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    <h5> <i class="icon fas fa-ban"> </i> Ocorreu um erro </h5>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        <form  method="POST" action="{{ route('users.update',['user' => $user->id]) }}" class="form-horizontal">
            @method('PUT')
            @csrf
            <div class="card-body">
                        <div class="form-group">
                            <label for="Nome"> Nome completo </label>
                            
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="nome" value="{{ $user->name }}" name="name" placeholder="Digite o nome e sobrenome">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Email"> Email </label>
                            
                            <div class="col-sm-10">
                                <input type="email"  class="form-control @error('email') is-invalid @enderror"  id="email" value="{{ $user->email }}"  name="email" placeholder="Email">
                            </div>
                        </div>
                
                        <div class="form-group">
                            <label for="Confirmacao_senha"> Nova Senha </label>
                            
                            <div class="col-sm-10">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"  id="" name="password" placeholder="Password">
                            </div>
                        </div>
                            
                        <div class="form-group" class="col-sm-2 control-label">
                            <label for="exampleInputPassword1"> Senha novamente </label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="" name="password_confirmation" placeholder="Password Confirmation">                                    </div>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-success"> Salvar </button>
            </div>
        </form>
    </div>
@endsection