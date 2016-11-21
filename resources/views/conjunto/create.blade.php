@extends('layouts.telainicial')
<script type="text/javascript">
var x = 0;
var jobs = <?php echo $equipamento[0]->all() ?>;

function toggleEstado(divid) {
    var div = document.getElementById(divid);
    var disp = div.style.display;
    div.style.display = disp == 'none' ? 'block' : 'none';
}

function myFunction() {
  x++;
  var myDiv = document.getElementById("demo"+x);
  toggleEstado("demo"+x);
  var myDiv2 = document.getElementById("trota"+x);
//var result = getFields(job, "equipamento_id"); // returns [ 1, 3, 5 ]

//Create and append select list
var selectList = document.createElement("select");
selectList.id = "equipamento"+x;
selectList.class="col-md-6 control-label";
selectList.name="equipamento"+x;
myDiv2.appendChild(selectList);

//Create and append the options
  for (var i = 0; i < jobs.length; i++) {
    var y=JSON.stringify(jobs[i]);
    var obj = JSON.parse(y);
    //document.write(obj["equipamento_nome"]);
    var option = document.createElement("option");
    //document.write(jobs[i].equipamento_id);
    option.value = obj["equipamento_id"];
    option.text = obj["equipamento_nome"];
    selectList.appendChild(option);
  }
}
</script>

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Registrar Conjunto de Equipamentos Odontológico</div>
            <div class="panel-body">
                {{ csrf_field() }}
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/conjunto') }}">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                      <label for="nome" class="col-md-4 control-label">Nome do Conjunto de Equipamentos</label>

                      <div class="col-md-6">
                          <input id="nome" type="text" class="form-control" name="nome" value="{{ old('nome') }}">

                          @if ($errors->has('nome'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('nome') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
                  <div class="form-group{{ $errors->has('sala') ? ' has-error' : '' }}">
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
                  <div class="form-group{{ $errors->has('equipamento') ? ' has-error' : '' }}">
                      <label for="equipamento" class="col-md-4 control-label">Equipamento 1</label>
                    <div class="col-md-6">
                      <select class="col-md-6 control-label" id="equipamento" name="equipamento">
                            <option> </option>
                            @foreach ($equipamento->all() as $sal)
                            <option value="{{$sal->equipamento_id}}"> {{$sal->equipamento_nome }} </option>
                            @endforeach
                      </select>
                    </div>
                  </div>
                  <div style="display:none" id="demo1" class="form-group{{ $errors->has('equipamento') ? ' has-error' : '' }}">
                    <label for="equipamento1" class="col-md-4 control-label">Equipamento 2</label>
                    <div class="col-md-6" id="trota1">
                    </div>
                  </div>
                  <div style="display:none" id="demo2" class="form-group{{ $errors->has('equipamento') ? ' has-error' : '' }}">
                    <label for="equipamento2" class="col-md-4 control-label">Equipamento 3</label>
                    <div class="col-md-6" id="trota2">
                    </div>
                  </div>
                  <div style="display:none" id="demo3" class="form-group{{ $errors->has('equipamento') ? ' has-error' : '' }}">
                    <label for="equipamento3" class="col-md-4 control-label">Equipamento 4</label>
                    <div class="col-md-6" id="trota3">
                    </div>
                  </div>
                  <div style="display:none" id="demo4" class="form-group{{ $errors->has('equipamento') ? ' has-error' : '' }}">
                    <label for="equipamento4" class="col-md-4 control-label">Equipamento 5</label>
                    <div class="col-md-6" id="trota4">
                    </div>
                  </div>
                  <div style="display:none" id="demo5" class="form-group{{ $errors->has('equipamento') ? ' has-error' : '' }}">
                    <label for="equipamento5" class="col-md-4 control-label">Equipamento 6</label>
                    <div class="col-md-6" id="trota5">
                    </div>
                  </div>
                  <div style="display:none" id="demo6" class="form-group{{ $errors->has('equipamento') ? ' has-error' : '' }}">
                    <label for="equipamento6" class="col-md-4 control-label">Equipamento 7</label>
                    <div class="col-md-6" id="trota6">
                    </div>
                  </div>
                  <div style="display:none" id="demo7" class="form-group{{ $errors->has('equipamento') ? ' has-error' : '' }}">
                    <label for="equipamento7" class="col-md-4 control-label">Equipamento 8</label>
                    <div class="col-md-6" id="trota7">
                    </div>
                  </div>
                  <div style="display:none" id="demo8" class="form-group{{ $errors->has('equipamento') ? ' has-error' : '' }}">
                    <label for="equipamento8" class="col-md-4 control-label">Equipamento 9</label>
                    <div class="col-md-6" id="trota8">
                    </div>
                  </div>
                  <div style="display:none" id="demo9" class="form-group{{ $errors->has('equipamento') ? ' has-error' : '' }}">
                    <label for="equipamento9" class="col-md-4 control-label">Equipamento 10</label>
                    <div class="col-md-6" id="trota9">
                    </div>
                  </div>
                  <div style="display:none" id="demo10" class="form-group{{ $errors->has('equipamento') ? ' has-error' : '' }}">
                    <label for="equipamento10" class="col-md-4 control-label">Equipamento 11</label>
                    <div class="col-md-6" id="trota10">
                    </div>
                  </div>
                  <div class="form-group">
                      <div class="col-md-offset-5 col-md-1">
                          <button type=button onclick="myFunction()" class="btn btn-primary">
                              <i class="fa fa-btn fa-plus"></i> Adicionar Equipamento
                          </button>
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
