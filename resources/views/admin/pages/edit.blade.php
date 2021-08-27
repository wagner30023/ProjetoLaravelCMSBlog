@extends('adminlte::page')

@section('title','Editar Pagina')

@section('content_header')
    <h1> Editar página </h1>
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
    
        <form  method="POST" action="{{ route('pages.update',['page' => $page->id]) }}" class="form-horizontal">
            @method('PUT')
            @csrf
            <div class="card-body">
                        <div class="form-group">
                            <label for="Nome"> Título </label>
                            
                            <div class="col-sm-10">
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ $page->title }}" placeholder="Digite o nome e sobrenome">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Email"> Corpo </label>
                            
                            <div class="col-sm-10">
                                <textarea class="form-control bodyfield" name="body"> {{ $page->body }} </textarea>
                            </div>
                        </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-success"> Salvar </button>
            </div>
        </form>
    </div>

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea.bodyfield',
            height:300,
            menubar: false,
            plugins:['link','table','image','autoresize','lists'],
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft alignright aligncenter alignjustify | table | link image | bulliest numlist ',
            content_css: [
                '{{asset('assets/css/content.css')}}'
            ]
        });
    </script>
@endsection