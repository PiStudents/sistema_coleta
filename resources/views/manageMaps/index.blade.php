@extends('layouts.manageMaps')

@section('content')
<div class="row" style="margin-top: 5rem;">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2>Usuários No Mapa</h2>
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
    <th>Nº</th>
    <th>Nome</th>
    <th>Status</th>
    <th width="280px">Ações</th>
  </tr>

  @foreach ($users as $key => $value)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $value->name }}</td>
    <td>{{ $value->visible == 'false' ? "Não Visível" : "Visível" }}</td>
    <td>
      <form action="{{ route('manageMaps.destroy',$value->id) }}" method="POST">
        <a class="btn btn-primary" href="{{ route('manageMaps.edit',$value->id) }}">Editar</a>
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Excluir</button>
      </form>
    </td>
  </tr>
  @endforeach
</table>
@endsection