@extends('layouts.telainicial')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Registrar Disciplina</div>
            <div class="panel-body">
                {{ csrf_field() }}
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/disciplina') }}">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                      <label for="nome" class="col-md-4 control-label">Nome da Matéria</label>

                      <div class="col-md-6">
                          <input id="nome" type="text" class="form-control" name="nome" value="{{ old('nome') }}">

                          @if ($errors->has('nome'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('nome') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
                  <div class="form-group{{ $errors->has('ano') ? ' has-error' : '' }}">
                      <label for="ano" class="col-md-4 control-label">Ano</label>

                      <div class="col-md-2">
                          <input id="ano" type="text" class="form-control" name="ano" value="{{ old('ano') }}">

                          @if ($errors->has('ano'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('ano') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
                  <div class="form-group{{ $errors->has('conjunto_id') ? ' has-error' : '' }}">
                      <label for="conjunto_id" class="col-md-4 control-label">Conjunto de Equipamentos</label>
                    <div class="col-md-6">
                      <select class="col-md-4 control-label" id="conjunto_id" name="conjunto_id">
                            <option> </option>
                            @foreach ($conjunto->all() as $con)
                            <option value="{{$con->conjunto_id}}"> {{$con->conjuntoequipamentos_nome }} </option>
                            @endforeach
                      </select>
                    </div>
                  </div>



                  <div class="form-group">
                      <div class="col-md-offset-5 col-md-1">
                          <button type="submit" class="btn btn-primary">
                              <i class="fa fa-btn fa-sign-in"></i> Cadastrar Disciplina
                          </button>
                      </div>
                  </div>


                </form>

            </div>
        </div>
    </div>
</div>
@endsection
