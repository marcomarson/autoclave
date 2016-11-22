@extends('layouts.telainicial')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Editar Salas  <a  href="#" class='pull-right' data-toggle="tooltip" data-placement="bottom" title="O campo nome da sala é obrigatório. O campo Descrição da sala se refere a uma descrição pequena da sala, por exemplo: Sala 12 localizada na Central da Salas."><i class="fa fa-question-circle fa-2x"></i></a></div>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Erro no sistema.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="panel-body">
                {{ csrf_field() }}
                  {!! Form::model($sala, ['method' => 'PATCH','route' => ['sala.update', $sala->sala_id], 'class' => 'form-horizontal']) !!}
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                      <label for="nome" class="col-md-4 control-label">Nome da Sala</label>

                      <div class="col-md-4">

                          <input id="nome" type="text" class="form-control" name="nome" value="{{ $sala->sala_nome }}">

                          @if ($errors->has('nome'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('nome') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="form-group{{ $errors->has('descricao') ? ' has-error' : '' }}">
                      <label for="descricao" class="col-md-4 control-label">Descrição da Sala</label>

                      <div class="col-md-6">
                          <input id="descricao" type="text" class="form-control" name="descricao" value="{{ $sala->descricao }}">

                          @if ($errors->has('descricao'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('descricao') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>



                  <div class="form-group">
                      <div class="col-md-offset-5 col-md-1">
                          <button type="submit" class="btn btn-primary">
                              <i class="fa fa-btn fa-sign-in"></i> Atualizar Sala
                          </button>
                      </div>
                  </div>


              {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>


@endsection
