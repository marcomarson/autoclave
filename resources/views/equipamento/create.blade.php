@extends('layouts.telainicial')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Registrar Equipamento Odontológico</div>
            <div class="panel-body">
                {{ csrf_field() }}
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/equipamento') }}">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                      <label for="nome" class="col-md-4 control-label">Nome do Equipamento</label>

                      <div class="col-md-6">
                          <input id="nome" type="text" class="form-control" name="nome" value="{{ old('nome') }}">

                          @if ($errors->has('nome'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('nome') }}</strong>
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
@endsection
