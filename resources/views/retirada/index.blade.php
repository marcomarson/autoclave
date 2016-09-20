@extends('layouts.telainicial')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <table id="mudaStatus" class="table table-responsive table-striped table-hover">
        <thead>
          <tr>
            <th class="col-md-2">Nome</th>
            <th class="col-md-1">Status</th>
          </tr>
        </thead>
        <tbody>
          @if(!$esterilizacao->isEmpty())
            @foreach($esterilizacao as $key => $value)
              <tr>
                <td>
                  {{$value->esterilizacao_id}}
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
