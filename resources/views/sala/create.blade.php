@extends('layouts.telainicial')
@section('content')
@if (isset($success))
{{dd($success)}}
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
              <div class="panel-heading"> Entrou{{$success}}
              </div>
          </div>
      </div>
  </div>
@endif
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Registrar Sala  <a  href="#" class='pull-right' data-toggle="tooltip" data-placement="bottom" title="O campo nome da sala é obrigatório. O campo Descrição da sala se refere a uma descrição pequena da sala, por exemplo: Sala 12 localizada na Central da Salas. Para editar ou remover alguma sala, é preciso encontrar a sala na tabela e apertar o respectivo botão."><i class="fa fa-question-circle fa-2x"></i></a></div>
            <div class="panel-body">
                {{ csrf_field() }}
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/sala') }}">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group{{ $errors->has('sala_nome') ? ' has-error' : '' }}">
                      <label for="sala_nome" class="col-md-4 control-label">Nome da Sala</label>

                      <div class="col-md-4">
                          <input id="sala_nome" type="text" class="form-control" name="sala_nome" value="{{ old('sala_nome') }}">

                          @if ($errors->has('sala_nome'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('sala_nome') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="form-group{{ $errors->has('descricao') ? ' has-error' : '' }}">
                      <label for="descricao" class="col-md-4 control-label">Descrição da Sala</label>

                      <div class="col-md-6">
                          <input id="descricao" type="text" class="form-control" name="descricao" value="{{ old('descricao') }}">

                          @if ($errors->has('descricao'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('descricao') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>



                  <div class="form-group">
                      <div class="col-md-offset-5 col-md-1">
                          <button type="submit" class="btn btn-primary">
                              <i class="fa fa-btn fa-sign-in"></i> Cadastrar Sala
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
      <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Busca pelo nome da sala" title="Digite um nome">
      <table id="myTable" class="table table-responsive table-striped table-hover">
        <thead>
          <tr>
            <th class="col-md-1">Sala ID</th>
            <th class='col-md-1'>Nome da Sala</th>
            <th class='col-md-1'>Descrição da Sala</th>
            <th class="col-md-1">Status</th>
          </tr>
        </thead>
        <tbody>

          @if(!$sala->isEmpty())
            @foreach($sala as $key => $value)
              <tr>
                <td>
                  {{$value->sala_id}}
                </td>
                <td>
                  {{$value->sala_nome}}
                </td>
                <td>
                  {{$value->descricao}}
                </td>
                <td>
                  {!! Form::open(['method' => 'DELETE','route' => ['sala.destroy', $value->sala_id],'style'=>'display:inline']) !!}
                  {!! Form::submit('Deletar', ['class' => 'btn btn-danger']) !!}
                  {!! Form::close() !!}
                  <a class="btn btn-primary" href="{{ route('sala.edit',$value->sala_id) }}">Editar</a>

                </td>
              </tr>
            @endforeach
          @else
            <tr>
              <td colspan="3">Não há registros de Salas</td>
            </tr>
          @endif
        </tbody>
      </table>
    </div>
  </div>

</div>

@endsection
<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
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
