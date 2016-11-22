@extends('layouts.telainicial')

@section('content')

<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
      <div class="panel-heading">Relatórios</div>
      <div class="panel-body">
        <a class="btn btn-primary" href="{{ url('pdfdaily') }}">Relatório Diário</a>
        <a class="btn btn-primary" href="{{ url('pdfmonth') }}">Relatório Mensal</a>
        <a class="btn btn-primary" href="{{ url('pdfyear') }}">Relatório Semestral</a>
      
        <button type="button" class="btn btn-large">Relatório de Falhas</button>


      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
@endsection
