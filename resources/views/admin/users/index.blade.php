@extends('adminlte::page')

@section('title','Usuários')

@section('content_header')
    <h1>
        Meus usuários
        <a href="{{route('users.create')}}" class="btn btn-success"> Novo usuário </a> 
    </h1>
@endsection

@section('content')
<div class="card">
    <table class="table table-hover">
        <thead>
            <tr>
                <th> ID </th>
                <th> Nome </th>
                <th> E-mail </th>  
                <th> Ações </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td> {{$user->id}}</td> 
                <td>{{$user->name}}</td> 
                <td>{{$user->email}}</td> 
                <td>
                    <a href="{{ route('users.edit',['user' => $user->id]) }}" class="btn btn-sm btn-info"> Editar </a>  
                    @if($loggedId !== $user->id)
                        <form class="d-inline" method="post" action="{{ route('users.destroy',['user' => $user->id]) }}"  onsubmit="return confirm('Tem certeza que deseja excluir ?')">
                            @method('DELETE') 
                            @csrf
                            <button class="btn btn-sm btn-danger"> Excluir </button>
                        </form>
                    @endif
                </td>    
            </tr>        
            @endforeach
        </tbody>
    </table>
</div>
    {{ $users->links() }}
@endsection