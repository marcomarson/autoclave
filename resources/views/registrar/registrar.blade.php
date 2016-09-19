@extends('layouts.telainicial')

@section('content')

<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
      <div class="panel-heading">Registrar</div>
      <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
          {{ csrf_field() }}
          <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="Sala"> Esterilização de equipamentos de uma sala?
                </label>
              </div>
            </div>
          </div>

          <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
            <label for="username" class="col-md-4 control-label">RA/username</label>

            <div class="col-md-6">
              <input id="username" type="email" class="form-control" name="username" value="{{ old('username') }}">

              @if ($errors->has('username'))
              <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
              @endif
            </div>
          </div>

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
              <select class="col-md-6 control-label" id="sel1">

                    @foreach ($equipamento->all() as $equip)
                      <option> {{$equip->equipamento_nome }} </option>
                    @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
              <label for="autoclave" class="col-md-4 control-label">Autoclave</label>
            <div class="col-md-6">
              <select class="col-md-4 control-label" id="sel2">
                @foreach ($autoclave->all() as $auto)
                  <option> {{$auto->autoclave_id}} </option>
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
