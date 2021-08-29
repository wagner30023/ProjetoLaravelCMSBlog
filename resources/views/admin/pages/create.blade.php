@extends('adminlte::page')

@section('title','Nova página')

@section('content_header')
    <h1> Nova Página </h1>
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
    
        <form  method="POST" action="{{ route('pages.store')}}" class="form-horizontal">
            @csrf
            <div class="card-body">
                        <div class="form-group">
                            <label for="Nome"> Título </label>
                            
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" value="{{old('title')}}" name="title" placeholder="Digite o título">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="corpo"> Corpo </label>
                            
                            <div class="col-sm-10">
                                <textarea name="body" id="body" class="form-control bodyfield"> {{old('body')}} </textarea>                            
                            </div>
                        </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit"  value="Criar" class="btn btn-success"> Salvar </button>
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
            ],
            images_upload_url:'{{route('imageupload')}}',
            images_upload_credentials:true,
            convert_urls:false
        });
    </script>
@endsection