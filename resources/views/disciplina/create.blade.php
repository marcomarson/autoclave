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
    td = tr[i].getElementsByTagName("td")[2];
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
            <div class="panel-heading">Registrar Disciplina  <a  href="#" class='pull-right' data-toggle="tooltip" data-placement="bottom" title="Para cadastrar uma disciplina é necessário ter previamente cadastrado um conjunto de equipamentos na interface Cadastro de Conjunto de Equipamentos. O campo ano se refere ao ano em que será lecionada a matéria."><i class="fa fa-question-circle fa-2x"></i></a></div>
            <div class="panel-body">
                {{ csrf_field() }}
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/disciplina') }}">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                      <label for="nome" class="col-md-4 control-label">Nome da Matéria</label>

                      <div class="col-md-6">
                          <input id="nome" type="text" class="form-control" name="nome" value="{{ old('nome') }}">

                          @if ($errors->has('nome'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('nome') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
                  <div class="form-group{{ $errors->has('ano') ? ' has-error' : '' }}">
                      <label for="ano" class="col-md-4 control-label">Ano</label>

                      <div class="col-md-2">
                          <input id="ano" type="text" class="form-control" name="ano" value="{{ old('ano') }}">

                          @if ($errors->has('ano'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('ano') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
                  <div class="form-group{{ $errors->has('conjunto_id') ? ' has-error' : '' }}">
                      <label for="conjunto_id" class="col-md-4 control-label">Conjunto de Equipamentos</label>
                    <div class="col-md-6">
                      <select class="col-md-4 control-label" id="conjunto_id" name="conjunto_id">
                            <option> </option>
                            @foreach ($conjunto->all() as $con)
                            <option value="{{$con->conjunto_id}}"> {{$con->conjuntoequipamentos_nome }} </option>
                            @endforeach
                      </select>
                    </div>
                  </div>



                  <div class="form-group">
                      <div class="col-md-offset-5 col-md-1">
                          <button type="submit" class="btn btn-primary">
                              <i class="fa fa-btn fa-sign-in"></i> Cadastrar Disciplina
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
    <div class="col-lg-12">
      <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Busca pelo nome da matéria" title="Digite um nome">
      <table id="myTable" class="table table-responsive table-striped table-hover">
        <thead>
          <tr>
            <th class="col-md-1">Disciplina ID</th>
            <th class='col-md-1'>Conjunto ID</th>
            <th class="col-md-1">Nome da Matéria</th>
            <th class="col-md-1">Ano</th>
            <th class="col-md-1">Ações</th>
          </tr>
        </thead>
        <tbody>

          @if(!$disciplina->isEmpty())
            @foreach($disciplina as $key => $value)
              <tr>
                <td>
                  {{$value->materia_id}}
                </td>
                <td>
                  {{$value->conjunto_id}}
                </td>
                <td>
                  {{$value->materia_nome}}
                </td>
                <td>
                  {{$value->ano}}
                </td>
                <td>
                  {!! Form::open(['method' => 'DELETE','route' => ['disciplina.destroy', $value->materia_id],'style'=>'display:inline']) !!}
                  {!! Form::submit('Deletar', ['class' => 'btn btn-danger']) !!}
                  {!! Form::close() !!}
                  <a class="btn btn-primary" href="{{ route('disciplina.edit',$value->materia_id) }}">Editar</a>

                </td>
              </tr>
            @endforeach
          @else
            <tr>
              <td colspan="3">Não há registros de disciplinas</td>
            </tr>
          @endif
        </tbody>
      </table>
    </div>
  </div>

</div>
@endsection
