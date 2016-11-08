@extends('layouts.telainicial')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Registrar Cliente</div>
            <div class="panel-body">
                {{ csrf_field() }}
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/cliente') }}">
                  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                      <label for="nome" class="col-md-4 control-label">Nome</label>

                      <div class="col-md-6">
                          <input id="nome" type="text" class="form-control" name="nome" value="{{ old('nome') }}">

                          @if ($errors->has('nome'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('nome') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
                  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                      <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                      <div class="col-md-6">
                          <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                          @if ($errors->has('email'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('email') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                      <label for="password" class="col-md-4 control-label">Senha</label>

                      <div class="col-md-4">
                          <input id="password" type="password" class="form-control" name="password">

                          @if ($errors->has('password'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                      <label for="password_confirmation" class="col-md-4 control-label">Confirm Password</label>

                      <div class="col-md-4">
                          <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">

                          @if ($errors->has('password_confirmation'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
                  <div class="form-group{{ $errors->has('telefone_ddd') ? ' has-error' : '' }}">
                      <label for="telefone_ddd" class="col-md-2 control-label">DDD</label>

                      <div class="col-md-2">
                          <input id="telefone_ddd" type="text" class="form-control" name="telefone_ddd" value="{{ old('telefone_ddd') }}">

                          @if ($errors->has('telefone_ddd'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('telefone_ddd') }}</strong>
                              </span>
                          @endif
                      </div>
                      <label for="telefone_numero" class="col-md-2 control-label">Número</label>

                      <div class="col-md-3">
                          <input id="telefone_numero" type="text"  class="form-control" name="telefone_numero" value="{{ old('telefone_numero') }}">

                          @if ($errors->has('telefone_numero'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('telefone_numero') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
                  <div class="form-group{{ $errors->has('turno') ? ' has-error' : '' }}">
                      <label for="cidade_id" class="col-md-4 control-label">Turno</label>
                    <div class="col-md-5">
                      <select class="col-md-5 control-label" id="turno_id" name="turno_id">
                            @foreach ($turno->all() as $tur)
                            <option value="{{$tur->turno_id}}"> {{$tur->turno_nome }} </option>
                            @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('cidade') ? ' has-error' : '' }}">
                      <label for="cidade_id" class="col-md-4 control-label">Cidade</label>
                    <div class="col-md-4">
                      <input id="cidade" type="text" class="form-control" name="cidade" value="{{ old('cidade') }}">

                      @if ($errors->has('cidade'))
                          <span class="help-block">
                              <strong>{{ $errors->first('cidade') }}</strong>
                          </span>
                      @endif
                    </div>
                  </div>


                  <div class="form-group">
                      <div class="col-md-offset-5 col-md-1">
                          <button type="submit" class="btn btn-primary">
                              <i class="fa fa-btn fa-sign-in"></i> Cadastrar Cliente
                          </button>
                      </div>
                  </div>


                </form>

            </div>
        </div>
    </div>
</div>
@endsection
