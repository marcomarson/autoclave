@extends('layouts.telainicial')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <table id="mudaStatus" class="table table-responsive table-striped table-hover">
        <thead>
          <tr>
            <th class="col-md-2">Registro</th>
            <th class="col-md-1">Data Inicial</th>
            <th class="col-md-1">Autoclave utilizada</th>
          </tr>
        </thead>
        <tbody>
          @if(!$esterilizacoes->isEmpty())
            @foreach($esterilizacoes as $key => $value)
              <tr>
                <td>
                  {{$value->esterilizacao_id}}
                </td>
                <td>
                  {{$value->data_inicio}}
                </td>
                <td>
                  {{$value->autoclave_id}}
                </td>
              </tr>
            @endforeach
          @else
            <tr>
              <td colspan="3">Não há registros nas autoclaves</td>
            </tr>
          @endif
        </tbody>
      </table>
    </div>
  </div>

</div>
@endsection
