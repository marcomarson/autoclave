@extends('layouts.telainicial')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <table id="mudaStatus" class="table table-responsive table-striped table-hover">
        <thead>
          <tr>
            <th class="col-md-1">Registro</th>
            <th class="col-md-1">Data Inicial</th>
            <th class="col-md-1">Autoclave utilizada</th>
            <th class="col-md-1">Status </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td> 1
            </td>
            <td>
            18/09/2016 13:54
          </th>
          <td> 3
          </th>
          <td>
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>  <i class="fa fa-times" aria-hidden="true"></i>
          </td>
        </tr>
          <tr>
            <td> 2
            </td>
            <td>
            18/09/2016 13:58
          </th>
          <td> 3
          </th>
          <td>
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>  <i class="fa fa-times" aria-hidden="true"></i>
          </td>
          </tr>
          <tr>
            <td> 3
            </td>
            <td>
            18/09/2016 13:59
          </th>
          <td> 3
          </th>
          <td>
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>  <i class="fa fa-times" aria-hidden="true"></i>
          </td>
          </tr>
          <tr>
            <td> 4
            </td>
            <td>
            18/09/2016 14:05
          </th>
          <td> 3
          </th>
          <td>
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>  <i class="fa fa-times" aria-hidden="true"></i>
          </td>
          </tr>
          <tr>
            <td> 5
            </td>
            <td>
            18/09/2016 14:10
          </th>
          <td> 3
          </th>
          <td>
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>  <i class="fa fa-times" aria-hidden="true"></i>
          </td>
          </tr>


          <!--@if(!$esterilizacoes->isEmpty())
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
          @endif -->
        </tbody>
      </table>
    </div>
  </div>

</div>
@endsection
