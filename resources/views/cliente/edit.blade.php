@extends('layouts.telainicial')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Editar Cliente  <a  href="#" class='pull-right' data-toggle="tooltip" data-placement="bottom" title="O campo tipo da pessoa indica se a pessoa é um aluno, professor ou pessoa externa. O campo DDD se refere ao DDD do seu número de telefone. Para editar o cliente, basta preencher com os dados e clicar no botão atualizar cliente. "><i class="fa fa-question-circle fa-2x"></i></a></div>
            <div class="panel-body">
                {{ csrf_field() }}
                {!! Form::model($cliente, ['method' => 'PATCH','route' => ['cliente.update', $cliente->cliente_id], 'class' => 'form-horizontal']) !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                      <label for="nome" class="col-md-4 control-label">Nome</label>

                      <div class="col-md-6">
                          <input id="nome" type="text" class="form-control" name="nome" value="{{ $cliente->nome }}">

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
                          <input id="email" type="email" class="form-control" name="email" value="{{ $cliente->email }}">

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
                      <label for="telefone_ddd" class="col-md-4 control-label">DDD</label>

                      <div class="col-md-2">
                          <input id="telefone_ddd" type="text" class="form-control" name="telefone_ddd" value="{{ $tel->telefone_ddd }}">

                          @if ($errors->has('telefone_ddd'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('telefone_ddd') }}</strong>
                              </span>
                          @endif
                      </div>
                    </div>
                    <div class="form-group{{ $errors->has('telefone_numero') ? ' has-error' : '' }}">
                      <label for="telefone_numero" class="col-md-4 control-label">Número</label>

                      <div class="col-md-3">
                          <input id="telefone_numero" type="text"  class="form-control" name="telefone_numero" value="{{ $tel->telefone_numero }}">

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
                  <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                      <label for="cidade_id" class="col-md-4 control-label">Tipo da Pessoa</label>
                    <div class="col-md-5">
                      <select class="col-md-5 control-label" id="tipo" name="tipo">

                            <option value="0"> Aluno </option>
                            <option value="1"> Professor </option>
                            <option value="2"> Externa </option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('ra') ? ' has-error' : '' }}">
                    <label for="ra" class="col-md-4 control-label">RA</label>

                    <div class="col-md-3">
                        <input id="ra" type="text" placeholder="RA apenas para alunos" class="form-control" name="ra" value="{{ old('ra') }}">

                        @if ($errors->has('ra'))
                            <span class="help-block">
                                <strong>{{ $errors->first('ra') }}</strong>
                            </span>
                        @endif
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
                  <div class="form-group{{ $errors->has('cidade_nome') ? ' has-error' : '' }}">
                      <label for="cidade_nome" class="col-md-4 control-label">Cidade</label>
                    <div class="col-md-4">
                      <input id="cidade_nome" type="text" class="form-control" name="cidade_nome" value="{{ $cidade->cidade_nome }}">

                      @if ($errors->has('cidade_nome'))
                          <span class="help-block">
                              <strong>{{ $errors->first('cidade_nome') }}</strong>
                          </span>
                      @endif
                    </div>
                  </div>


                  <div class="form-group">
                      <div class="col-md-offset-5 col-md-1">
                          <button type="submit" class="btn btn-primary">
                              <i class="fa fa-btn fa-sign-in"></i> Atualizar Cliente
                          </button>
                      </div>
                  </div>


                  {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>

@endsection
