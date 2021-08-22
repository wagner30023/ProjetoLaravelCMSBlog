@extends('adminlte::page')

@section('title','Novo Usuário')

@section('content_header')
    <h1> Novo Usuário </h1>
@endsection

@section('content')
    <div class="card card-primary">    
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    <h4>Ocorreu um erro</h4>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        <form  method="POST" action="{{ route('users.store')}}" class="form-horizontal">
            @csrf
            <div class="card-body">
                        <div class="form-group">
                            <label for="Nome"> Nome completo </label>
                            <input type="text" class="form-control" id="nome" value="{{old('name')}}" name="name" placeholder="Digite o nome e sobrenome">
                        </div>

                        <div class="form-group">
                            <label for="Email1"> Email </label>
                            <input type="email" class="form-control" id="email" value="{{old('email')}}" name="email" placeholder="Email">
                        </div>
                
                        <div class="form-group">
                            <label for="Confirmacao_senha"> Senha </label>
                            <input type="password" class="form-control" id="" name="password" placeholder="Password">
                        </div>
                            
                        <div class="form-group">
                            <label for="exampleInputPassword1"> Confirmação de senha </label>
                            <input type="password" class="form-control" id="" name="password_confirmation" placeholder="Password Confirmation">                                    </div>
                        </div>
                    </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary"> Cadastrar </button>
            </div>
        </form>
    </div>
@endsection