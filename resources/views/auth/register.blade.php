@extends('layouts.telainicial')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                  @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

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

                            <div class="col-md-6">
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

                            <div class="col-md-6">
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

                            <div class="col-md-4">
                                <input id="telefone_numero" type="text"  class="form-control" name="telefone_numero" value="{{ old('telefone_numero') }}">

                                @if ($errors->has('telefone_numero'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telefone_numero') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('turno') ? ' has-error' : '' }}">
                            <label for="turno" class="col-md-4 control-label">Turno</label>
                          <div class="col-md-6">
                            <select class="col-md-6 control-label" id="turno_id" name="turno_id">
                                  @foreach ($turno->all() as $tur)
                                  <option value="{{$tur->turno_id}}"> {{$tur->turno_nome }} </option>
                                  @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="form-group{{ $errors->has('cidade_estado') ? ' has-error' : '' }}">
                            <label for="estado" class="col-md-4 control-label">Estado</label>
                          <div class="col-md-5">
                            <select class="col-md-5 control-label" id="cidade_estado" name="cidade_estado">
                                  <option value="AL"> Alagoas </option><option value="AP"> Amapá </option>  <option value="AM"> Amazonas </option>
                                  <option value="BA"> Bahia </option>  <option value="CE"> Ceará </option><option value="DF"> Distrio Federal </option>
                                  <option value="ES"> Espírito Santo </option>  <option value="GO"> Goiás </option>  <option value="MA"> Maranhão </option>
                                  <option value="MT"> Mato Grosso </option><option value="MS"> Mato Grosso do Sul </option>
                                  <option value="MG"> Minas Gerais </option>  <option value="PA"> Pará </option>  <option value="PB"> Paraíba </option>
                                  <option value="PR" selected> Paraná </option>  <option value="PE"> Pernambuco </option>
                                  <option value="PI"> Piauí </option>  <option value="RJ"> Rio de Janeiro </option><option value="RO"> Rondônia </option>
                                  <option value="RR"> Roraima </option><option value="SC"> Santa Catarina </option>
                                  <option value="SP"> São Paulo </option>  <option value="SE"> Sergipe </option>  <option value="TO"> Tocantins </option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group{{ $errors->has('cidade') ? ' has-error' : '' }}">
                            <label for="cidade_nome" class="col-md-4 control-label">Cidade</label>
                          <div class="col-md-6">
                            <input id="cidade_nome" type="text" class="form-control" name="cidade_nome" value="{{ old('cidade_nome') }}">

                            @if ($errors->has('cidade_nome'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('cidade_nome') }}</strong>
                                </span>
                            @endif
                          </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
