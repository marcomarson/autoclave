<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="http://portal.uepg.br/favicon.ico"/>
    <title>Central de Esterilização UEPG</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="{{ URL::asset('css/sb-admin.css') }}" rel="stylesheet">
    <style>
    * {
      box-sizing: border-box;
    }

    #myInput {
      background-image: url('/css/searchicon.png');
      background-position: 10px 10px;
      background-repeat: no-repeat;
      width: 100%;
      font-size: 16px;
      padding: 12px 20px 12px 40px;
      border: 1px solid #ddd;
      margin-bottom: 12px;
    }

    #myTable {
      border-collapse: collapse;
      width: 100%;
      border: 1px solid #ddd;
      font-size: 18px;
    }

    #myTable th, #myTable td {
      text-align: left;
      padding: 12px;
    }

    #myTable tr {
      border-bottom: 1px solid #ddd;
    }

    #myTable tr.header, #myTable tr:hover {
      background-color: #f1f1f1;
    }
    </style>
</head>
<body id="app-layout">

    <div id="wrapper">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header text-center">

                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Central de Esterilização
                    </a>
                </div>
                <ul class="nav navbar-right top-nav">
                   @if (Auth::guest())
                        @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Auth::user()->nome }} <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>
                @include("footer")
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse navbar-default">
                    <ul class="nav navbar-nav side-nav navbar-default">
                        <li>
                            <a href="{{url('regEsterilizacao')}}"><i class="fa fa-fw fa-edit"></i>Registrar Esterilização</a>
                        </li>
                        <li>
                            <a href="{{url('info')}}"><i class="fa fa-fw fa-bar-chart-o"></i>Informações</a>
                        </li>
                        <li>
                            <a href="{{url('retirada')}}"><i class="fa fa-fw fa-table"></i>Retirada dos Equipamentos</a>
                        </li>
                        <li>
                            <a href="{{url('cliente/create')}}"><i class="fa fa-fw fa-edit"></i>Cadastro de Clientes</a>
                        </li>
                        <li>
                            <a href="{{url('sala/create')}}"><i class="fa fa-fw fa-edit"></i>Cadastro de Salas</a>
                        </li>
                        <li>
                            <a href="{{url('disciplina/create')}}"><i class="fa fa-fw fa-edit"></i>Cadastro de Disciplinas</a>
                        </li>
                        <li>
                            <a href="{{url('equipamento/create')}}"><i class="fa fa-fw fa-edit"></i>Cadastro de Equipamentos Odontológicos</a>
                        </li>
                        <li>
                            <a href="{{url('conjunto/create')}}"><i class="fa fa-fw fa-edit"></i>Cadastro de Conjuntos de Equipamentos</a>
                        </li>
                        <li>
                            <a href="{{url('relatorios')}}"><i class="fa fa-fw fa-bar-chart-o"></i>Relatórios</a>
                        </li>
                        @if (Auth::user()->admin_permissao == true )
                          <li>
                              <a href="{{url('laboratorista')}}"><i class="fa fa-fw fa-edit"></i>Registrar Laboratorista</a>
                          </li>
                          <li>
                              <a href="{{url('autoclave')}}"><i class="fa fa-fw fa-edit"></i>Registrar Autoclave</a>
                          </li>
                        @endif

                    </ul>
            </div>
        </nav>

        @yield('content')
    </div>


        <!-- JavaScripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
        $( function() {
          $( "#datepicker" ).datepicker({
            dateFormat: 'dd/mm/yy',
    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
    nextText: 'Próximo',
    prevText: 'Anterior'
          });
      } );
      $( function() {
        $( "#datepicker2" ).datepicker({
          dateFormat: 'dd/mm/yy',
    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
    nextText: 'Próximo',
    prevText: 'Anterior'
        });
    } );
        </script>

</body>
</html>
