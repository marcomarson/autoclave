@extends('layouts.telainicial')

@section('content')

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
            <div class="panel-heading">Gerar Relatórios<a  href="#" class='pull-right' data-toggle="tooltip" data-placement="bottom" title="Essa interface é responsável de gerar os relatórios pretendidos"><i class="fa fa-question-circle fa-2x"></i></a></div>
            <div class="panel-body">
                {{ csrf_field() }}
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/relatorios') }}">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                      <label for="tipo" class="col-md-4 control-label">Tipo do Relatório</label>
                    <div class="col-md-5">
                      <select class="col-md-5 control-label" id="tipo" name="tipo">

                            <option value="0"> Geral </option>
                            <option value="1"> Falhas </option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('data') ? ' has-error' : '' }}">
                      <label for="data" class="col-md-2 control-label">De </label>
                    <div class="col-md-2">
                      <input type="text" id="datepicker" name="datafrom">
                    </div>
                    <label for="data" class="col-md-2 control-label">Até </label>
                    <div class="col-md-2">
                      <input type="text" id="datepicker2" name="datato">
                    </div>
                  </div>

                  <div class="form-group{{ $errors->has('turno') ? ' has-error' : '' }}">
                      <label for="admin_id" class="col-md-4 control-label">Laboratorista</label>
                    <div class="col-md-5">
                      <select class="col-md-5 control-label" id="admin_id" name="admin_id">
                        <option value=""></option>
                            @foreach ($laboratorista->all() as $tur)
                            <option value="{{$tur->admin_id}}"> {{$tur->nome }} </option>
                            @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="autoclave_id" class="col-md-4 control-label">Autoclave</label>
                    <div class="col-md-6">
                      <select class="col-md-6 control-label" id="autoclave_id" name="autoclave_id">
                        <option value=""></option>
                        @foreach ($autoclave->all() as $auto)
                        <option value="{{$auto->autoclave_id}}"> {{$auto->marca}} </option>
                        @endforeach
                      </select>
                    </div>
                  </div>



                  <div class="form-group">
                      <div class="col-md-offset-5 col-md-1">
                          <button type="submit" class="btn btn-primary">
                              <i class="fa fa-btn fa-sign-in"></i> Gerar Relatório
                          </button>
                      </div>
                  </div>


                </form>

            </div>
        </div>
    </div>
</div>
@endsection
