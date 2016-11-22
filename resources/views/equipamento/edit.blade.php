@extends('layouts.telainicial')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Editar Equipamento Odontológico<a  href="#" class='pull-right' data-toggle="tooltip" data-placement="bottom" title="Para atualizar um equipamento odontológico é necessário apenas renomear o nome do equipamento e apertar o botão atualizar equipamento "><i class="fa fa-question-circle fa-2x"></i></a></div>
            <div class="row">
                <div class="col-lg-12 margin-tb">

                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('equipamento.create') }}"> Back</a>
                    </div>
                </div>
            </div>
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
                {!! Form::model($equipamento, ['method' => 'PATCH','route' => ['equipamento.update', $equipamento->equipamento_id], 'class' => 'form-horizontal']) !!}
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                      <label for="nome" class="col-md-4 control-label">Nome do Equipamento</label>

                      <div class="col-md-6">
                          <input id="nome" type="text" class="form-control" name="nome" value="{{ $equipamento->equipamento_nome }}">

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
                              <i class="fa fa-btn fa-edit"></i> Atualizar Equipamento
                          </button>
                      </div>
                  </div>


              {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>


@endsection
