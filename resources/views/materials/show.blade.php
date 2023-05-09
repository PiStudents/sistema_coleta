@extends('layouts.materials')

@section('content')
<div class="row" style="margin-top: 5rem;">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2> Detalhes do Material</h2>
    </div>
    <div class="pull-right">
      <a class="btn btn-primary" href="{{ route('materiais.index') }}"> Voltar</a>
    </div>
  </div>
</div>

<table class="table table-bordered">
  <tr>
    <th>Nome:</th>
    <td>{{ $material->name }}</td>
  </tr>
  <tr>
    <th>Descrição:</th>
    <td>{{ $material->description }}</td>
  </tr>
</table>
@endsection