@extends('layouts.telainicial')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Editar Disciplina  <a  href="#" class='pull-right' data-toggle="tooltip" data-placement="bottom" title="Para editar uma disciplina é necessário ter previamente cadastrado um conjunto de equipamentos na interface Cadastro de Conjunto de Equipamentos. O campo ano se refere ao ano em que será lecionada a matéria. Para atualizar a disciplina, é preciso preencher os dados e clicar no botão atualizar disciplina."><i class="fa fa-question-circle fa-2x"></i></a></div>
            <div class="row">
                <div class="col-lg-12 margin-tb">

                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('disciplina.create') }}"> Back</a>
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
                {!! Form::model($disciplina, ['method' => 'PATCH','route' => ['disciplina.update', $disciplina->materia_id], 'class' => 'form-horizontal']) !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                    <label for="nome" class="col-md-4 control-label">Nome da Matéria</label>

                    <div class="col-md-6">
                        <input id="nome" type="text" class="form-control" name="nome" value="{{ $disciplina->materia_nome }}">

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
                        <input id="ano" type="text" class="form-control" name="ano" value="{{ $disciplina->ano }}">

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
                            <i class="fa fa-btn fa-sign-in"></i> Atualizar Disciplina
                        </button>
                    </div>
                </div>





              {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>


@endsection
