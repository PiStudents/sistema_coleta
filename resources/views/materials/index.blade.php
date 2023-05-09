@extends('layouts.materials')

@section('content')
<div class="row" style="margin-top: 5rem;">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2>Materiais</h2>
    </div>
    <div class="pull-right">
      <a class="btn btn-success" href="{{ route('materiais.create') }}"> Criar novo material</a>
    </div>
  </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
  <tr>
    <th>No</th>
    <th>Nome</th>
    <th>Descrição</th>
    <th width="280px">Ações</th>
  </tr>
  @foreach ($materiais as $key => $value)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $value->name }}</td>
    <td>{{ \Str::limit($value->description, 100) }}</td>
    <td>
      <form action="{{ route('materiais.destroy',$value->id) }}" method="POST">
        <a class="btn btn-info" href="{{ route('materiais.show',$value->id) }}">Exibir</a>
        <a class="btn btn-primary" href="{{ route('materiais.edit',$value->id) }}">Editar</a>
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Excluir</button>
      </form>
    </td>
  </tr>
  @endforeach
</table>
@endsection