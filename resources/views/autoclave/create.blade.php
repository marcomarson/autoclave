@extends('layouts.telainicial')

@section('content')
<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

@if (isset($success))
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
              <div class="panel-heading"> {{$success}}
              </div>
          </div>
      </div>
  </div>
@endif
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Registrar Autoclave<a  href="#" class='pull-right' data-toggle="tooltip" data-placement="bottom" title="Para cadastrar uma autoclave, é preciso de um login de administrador, após conseguir um login de administrador, é necessário preencher os campos e Cadastrar a autoclave."><i class="fa fa-question-circle fa-2x"></i></a></div>
            <div class="panel-body">
                {{ csrf_field() }}
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/autoclave') }}">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                      <label for="nome" class="col-md-4 control-label">Marca</label>

                      <div class="col-md-6">
                          <input id="marca" type="text" class="form-control" name="marca" value="{{ old('marca') }}">

                          @if ($errors->has('marca'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('marca') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="form-group{{ $errors->has('manutencao') ? ' has-error' : '' }}">
                      <label for="nome" class="col-md-4 control-label">Em manutenção</label>
                    <div class="col-md-6">
                      <div class="checkbox">
                        <input type="checkbox" id="manutencao"  name="manutencao">
                        @if ($errors->has('manutencao'))
                            <span class="help-block">
                                <strong>{{ $errors->first('manutencao') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>
                  </div>



                  <div class="form-group{{ $errors->has('inf') ? ' has-error' : '' }}">
                      <label for="inf" class="col-md-4 control-label">Informações Extras</label>

                      <div class="col-md-6">
                          <input id="inf" type="text" class="form-control" name="inf" value="{{ old('inf') }}">

                          @if ($errors->has('inf'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('inf') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>



                  <div class="form-group">
                      <div class="col-md-offset-5 col-md-1">
                          <button type="submit" class="btn btn-primary">
                              <i class="fa fa-btn fa-sign-in"></i> Cadastrar Autoclave
                          </button>
                      </div>
                  </div>


                </form>

            </div>
        </div>
    </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-12 ">
      <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Busca pela marca da autoclave" title="Digite aqui">
      <table id="myTable" class="table table-responsive table-striped table-hover">
        <thead>
          <tr class="fixed">
            <th class="col-md-1">Autoclave ID</th>
            <th class='col-md-1'>Marca</th>
            <th class='col-md-1'>Manutenção</th>
            <th class='col-md-1'>Informações Extras</th>
            <th class="col-md-1">Status</th>
          </tr>
        </thead>
        <tbody>

          @if(!$autoclave->isEmpty())
            @foreach($autoclave as $key => $value)
              <tr>
                <td>
                  {{$value->autoclave_id}}
                </td>
                <td>
                  {{$value->marca}}
                </td>
                <td>
                  @if($value->manutencao == true)
                    Sim
                  @endif
                </td>
                <td>
                  {{$value->autoclave_inf_extra}}
                </td>
                <td>
                  {!! Form::open(['method' => 'DELETE','route' => ['autoclave.destroy', $value->autoclave_id],'style'=>'display:inline']) !!}
                  {!! Form::submit('Deletar', ['class' => 'btn btn-danger']) !!}
                  {!! Form::close() !!}
                  <a class="btn btn-primary" href="{{ route('autoclave.edit',$value->autoclave_id) }}">Editar</a>

                </td>
              </tr>
            @endforeach
          @else
            <tr>
              <td colspan="3">Não há registros de autoclaves</td>
            </tr>
          @endif
        </tbody>
      </table>
    </div>
  </div>

</div>
@endsection
