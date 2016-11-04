@extends('layouts.telainicial')

@section('content')
<script type="text/javascript">
function exibe(id) {
   if(document.getElementById(id).style.display==”none”) {
        document.getElementById(id).style.display = “inline”;
    }
    else {
        document.getElementById(id).style.display = “none”;
    }
}
</script>
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
      <div class="panel-heading">Registrar</div>
      <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/regEsterilizacao') }}">
          {{ csrf_field() }}
          <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="setsala" id='setsala' onclick=”exibe(‘experiencia’);”> Esterilização de equipamentos de uma sala?
                </label>
              </div>
            </div>
          </div>
          <div class="form-group" id='experiencia'>
            <label for="username" class="col-md-4 control-label">RA/username</label>

            <div class="col-md-6">
              <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}">

              @if ($errors->has('username'))
              <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <!--
          <div class="form-group">
                <label for="sala" class="col-md-4 control-label">Sala</label>
              <div class="col-md-6">
                <select class="col-md-6 control-label" id="sel3" name="sala_id">
                      @foreach ($sala->all() as $salaid)
                      <option value="{{$salaid->sala_id}}"> {{$salaid->sala_nome }} </option>
                      @endforeach
                </select>
              </div>
            </div>
          -->

          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Password</label>


              <div class="col-md-6">
              <input id="password" type="password" class="form-control" name="password">

                @if ($errors->has('password'))
                <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
          </div>

          <div class="form-group">
              <label for="equipamento" class="col-md-4 control-label">Equipamento</label>
            <div class="col-md-6">
              <select class="col-md-6 control-label" id="sel1" name="equipamento_id">
                    @foreach ($equipamento->all() as $equip)
                    <option value="{{$equip->equipamento_id}}"> {{$equip->equipamento_nome }} </option>
                    @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
              <label for="autoclave" class="col-md-4 control-label">Autoclave</label>
            <div class="col-md-6">
              <select class="col-md-4 control-label" id="sel2" name="autoclave_id">
                @foreach ($autoclave->all() as $auto)
                <option value="{{$auto->autoclave_id}}"> {{$auto->autoclave_id}} </option>
                @endforeach
              </select>
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
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
@endsection
