@extends('layouts.telainicial')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Registrar Conjunto de Equipamentos Odontológico</div>
            <div class="panel-body">
                {{ csrf_field() }}
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/conjunto') }}">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group{{ $errors->has('nome_do_conjunto_de_equipamentos') ? ' has-error' : '' }}">
                      <label for="nome" class="col-md-4 control-label">Nome do Conjunto de Equipamentos</label>

                      <div class="col-md-6">
                          <input id="nome_do_conjunto_de_equipamentos" type="text" class="form-control" name="Nome do Conjunto nome_do_conjunto_de_equipamentos Equipamentos" value="{{ old('conjuntoequipamentos_nome') }}">

                          @if ($errors->has('nome_do_conjunto_de_equipamentos'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('nome_do_conjunto_de_equipamentos') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
                  <div class="form-group{{ $errors->has('turno') ? ' has-error' : '' }}">
                      <label for="sala" class="col-md-4 control-label">Sala</label>
                    <div class="col-md-6">
                      <select class="col-md-6 control-label" id="sala_id" name="sala_id">
                            <option> </option>
                            @foreach ($sala->all() as $sal)
                            <option value="{{$sal->sala_id}}"> {{$sal->sala_nome }} </option>
                            @endforeach
                      </select>
                    </div>
                  </div>



                  <div class="form-group">
                      <div class="col-md-offset-5 col-md-1">
                          <button type="submit" class="btn btn-primary">
                              <i class="fa fa-btn fa-sign-in"></i> Cadastrar Conjunto
                          </button>
                      </div>
                  </div>


                </form>

            </div>
        </div>
    </div>
</div>
@endsection
