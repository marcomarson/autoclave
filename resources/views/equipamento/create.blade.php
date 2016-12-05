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
            <div class="panel-heading">Registrar Equipamento Odontológico<a  href="#" class='pull-right' data-toggle="tooltip" data-placement="bottom" title="Para cadastrar um equipamento odontológico é necessário colocar o nome do equipamento. Para editar ou deletar algum equipamento odontológico, é necessário utilizar os botões com seus respectivos nomes."><i class="fa fa-question-circle fa-2x"></i></a></div>
            <div class="panel-body">
                {{ csrf_field() }}
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/equipamento') }}">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group{{ $errors->has('equipamento_nome') ? ' has-error' : '' }}">
                      <label for="nome completo do equipamento" class="col-md-4 control-label">Nome do Equipamento</label>

                      <div class="col-md-6">
                          <input id="equipamento_nome" type="text" class="form-control" name="equipamento_nome" value="{{ old('equipamento_nome') }}">

                          @if ($errors->has('equipamento_nome'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('equipamento_nome') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>



                  <div class="form-group">
                      <div class="col-md-offset-5 col-md-1">
                          <button type="submit" class="btn btn-primary">
                              <i class="fa fa-btn fa-sign-in"></i> Cadastrar Equipamento
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
      <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Busca pelo nome do equipamento" title="Digite um nome">
      <table id="myTable" class="table table-responsive table-striped table-hover">
        <thead>
          <tr class="fixed">
            <th class="col-md-1">Equipamento ID</th>
            <th class='col-md-1'>Nome do Equipamento</th>
            <th class="col-md-1">Status</th>
          </tr>
        </thead>
        <tbody>

          @if(!$equipamento->isEmpty())
            @foreach($equipamento as $key => $value)
              <tr>
                <td>
                  {{$value->equipamento_id}}
                </td>
                <td>
                  {{$value->equipamento_nome}}
                </td>
                <td>
                  {!! Form::open(['method' => 'DELETE','route' => ['equipamento.destroy', $value->equipamento_id],'style'=>'display:inline']) !!}
                  {!! Form::submit('Deletar', ['class' => 'btn btn-danger']) !!}
                  {!! Form::close() !!}
                  <a class="btn btn-primary" href="{{ route('equipamento.edit',$value->equipamento_id) }}">Editar</a>

                </td>
              </tr>
            @endforeach
          @else
            <tr>
              <td colspan="3">Não há registros de equipamentos</td>
            </tr>
          @endif
        </tbody>
      </table>
    </div>
  </div>

</div>
@endsection
