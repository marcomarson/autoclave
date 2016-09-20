@extends('layouts.telainicial')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Registrar Sala</div>
            <div class="panel-body">
                {{ csrf_field() }}
                {!! Form::open(['url' => 'sala', 'class' => 'form-horizontal']) !!}
                <div class="form-group">
                    {{ Form::label('Numero', 'Numero', ['class' => 'control-label col-md-4']) }}
                    <div class="col-md-4">
                        {{ Form::text('sala_id', null, ['class' => 'form-control col-md-4']) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('Descrição', 'Descrição', ['class' => 'control-label col-md-4']) }}
                    <div class="col-md-4">
                        {{ Form::text('descricao', null, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-offset-5 col-md-1">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-sign-in"></i> Criar
                        </button>
                    </div>
                </div>


                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
@endsection