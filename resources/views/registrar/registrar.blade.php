@extends('layouts.telainicial')

@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
      <div class="panel-heading">Registrar</div>
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
              <label for="conjunto" class="col-md-4 control-label">Conjunto</label>
            <div class="col-md-6">
              <select class="col-md-6 control-label" id="sel1" name="conjunto">
                    @foreach ($conjunto->all() as $equip)
                    <option value="{{$equip->conjunto_id}}"> {{$equip->conuntoequipamentos_nome }} </option>
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
              <button id='logout' type="submit" class="btn btn-primary">
                <i class="fa fa-btn fa-sign-out"></i> Logout Cliente
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
