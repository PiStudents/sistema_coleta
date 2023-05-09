@extends('layouts.materials')

@section('content')
<div class="row" style="margin-top: 5rem;">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2>Editar Material</h2>
    </div>
    <div class="pull-right">
      <a class="btn btn-primary" href="{{ route('materiais.index') }}"> Voltar</a>
    </div>
  </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
  <strong>Ops!</strong> Houve alguns problemas com seu cadastro!<br><br>
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<form action="{{ route('materiais.update',$material->id) }}" method="POST">
  @csrf
  @method('PUT')

  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Nome:</strong>
        <input type="text" name="name" value="{{ $material->name }}" class="form-control" placeholder="Nome">
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Descrição:</strong>
        <textarea class="form-control" style="height:150px" name="description" placeholder="Detail">{{ $material->description }}</textarea>
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
      <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
  </div>

</form>
@endsection