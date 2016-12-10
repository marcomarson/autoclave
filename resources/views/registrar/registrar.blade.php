@extends('layouts.telainicial')

@section('content')
<script type="text/javascript">
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
      <div class="panel-heading">Registrar Esterilização<a  href="#" class='pull-right' data-toggle="tooltip" data-placement="bottom" title="Nesta interface você deve preencher os campos, todos eles são obrigatórios e apertar Registrar Esterilização"><i class="fa fa-question-circle fa-2x"></i></a></div>
      <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/regEsterilizacao') }}">
          {{ csrf_field() }}

          <div class="form-group" id='experiencia'>
            <label for="username" class="col-md-4 control-label">Nome</label>

            <div class="col-md-6">
              <input id="username" type="text" class="form-control" name="username" value="{{ Auth::guard('client')->user()->nome  }}" readonly>

              @if ($errors->has('username'))
              <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
              @endif
            </div>
          </div>



          <div class="form-group">
              <label for="conjunto_id" class="col-md-4 control-label">Conjunto</label>
            <div class="col-md-6">
              <select class="col-md-6 control-label" id="conjunto_id" name="conjunto_id">
                    @foreach ($conjunto->all() as $equip)
                    <option value="{{$equip->conjunto_id}}"> {{$equip->conjuntoequipamentos_nome }} </option>
                    @endforeach
              </select>
              @if ($errors->has('conjunto_id'))
                  <span class="help-block">
                      <strong>O campo conjunto é obrigatório</strong>
                  </span>
              @endif
            </div>
          </div>
          <div class="form-group">
              <label for="autoclave_id" class="col-md-4 control-label">Autoclave</label>
            <div class="col-md-6">
              <select class="col-md-6 control-label" id="autoclave_id" name="autoclave_id">
                @foreach ($autoclave->all() as $auto)
                <option value="{{$auto->autoclave_id}}"> {{$auto->marca}} </option>
                @endforeach
              </select>
              @if ($errors->has('autoclave_id'))
                  <span class="help-block">
                      <strong> O campo autoclave é obrigatório</strong>
                  </span>
              @endif
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
              <button type="submit" class="btn btn-primary">
                <i class="fa fa-btn fa-sign-in"></i> Registrar
              </button>

            </div>
          </div>
        </form>
        <form class="form-horizontal" role="form" method="GET" action="{{ url('/account/sign-out') }}">
          {{ csrf_field() }}


          <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
              <button type="submit" class="btn btn-primary">
                <i class="fa fa-btn fa-sign-out"></i> Logout
              </button>

            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
@endsection
