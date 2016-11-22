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
                {!! Form::model($autoclave, ['method' => 'PATCH','route' => ['autoclave.update', $autoclave->autoclave_id], 'class' => 'form-horizontal']) !!}
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                      <label for="nome" class="col-md-4 control-label">Marca</label>

                      <div class="col-md-6">
                          <input id="marca" type="text" class="form-control" name="marca" value="{{ $autoclave->marca }}">

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
                        <input type="checkbox" id="manutencao"  name="manutencao" value="">
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
                          <input id="inf" type="text" class="form-control" name="inf" value="{{ $autoclave->autoclave_inf_extra }}">

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


                  {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>


@endsection
