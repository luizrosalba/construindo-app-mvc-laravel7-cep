@extends('app')

@section('content')
    <h1 class="mb-5">
        Adicionar CEP
    </h1>
      <!-- pode-se customizar em portugues as mensagens de erro  -->
    <!-- na documentaçao do laravel tem explicações sobre isso  -->

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('salvar')}}" method="POST">
      <!-- csrf cria uma hash valida apenas para a proxima requisicao -->
        @csrf
        <div class="form-group">
            <label>Cep</label>
            <input type="text" class="form-control" name="cep" value="{{$cep}}">
        </div>
        <div class="form-group">
            <label>Logradouro</label>
            <input type="text" class="form-control" name="logradouro" value="{{$logradouro}}">
        </div>
        <div class="form-group">
            <label>Numero</label>
            <input type="text" class="form-control" name="numero">
        </div>
        <div class="form-group">
            <label>Bairro</label>
            <input type="text" class="form-control" name="bairro" value="{{$bairro}}">
        </div>
        <div class="form-group">
            <label>Cidade</label>
            <input type="text" class="form-control" name="cidade" value="{{$cidade}}">
        </div>
        <div class="form-group">
            <label>Estado</label>
            <input type="text" class="form-control" name="estado" value="{{$estado}}">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
