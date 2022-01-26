
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Dashboard</title>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <!-- API -->
        <script src="http://maps.google.com/maps/api/js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>
          
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>

        <script type="text/javascript" src="../../gmaps.js"></script>

        <link rel="stylesheet" type="text/css" href="../../examples.css" />
        <!-- API -->
        {{--  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTHKMP8ypejlRu9HpiXDhsa1eZ6VgMUfU&callback=initMap"
        async defer></script>  --}}
       <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyASXDsqr_Ar4AARZJ94K4L49fmMoMG8XkE"></script>

        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
        <link rel="stylesheet" href="css/glyphicons-halflings.css">
        <!-- daterange picker -->
        <link rel="stylesheet" href="../../bower_components/bootstrap-daterangepicker/daterangepicker.css">
        <!-- bootstrap datepicker -->
        <link rel="stylesheet" href="../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="../../plugins/iCheck/all.css">
        <!-- Bootstrap Color Picker -->
        <link rel="stylesheet" href="../../bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
        <!-- Bootstrap time Picker -->
        <link rel="stylesheet" href="../../plugins/timepicker/bootstrap-timepicker.min.css">
        <!-- Select2 -->
        <link rel="stylesheet" href="../../bower_components/select2/dist/css/select2.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
        <!-- bootstrap datepicker -->
        <link rel="stylesheet" href="../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
     
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Google Font -->
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <!-- JAVASCRITP MASCARA  -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
        <script>

            $(document).ready(function ($) {
                $('#telefone').mask('(99) 9 9999-9999');
                //cpf1 id no html para ativar a função!
                $('#cpf1').mask('999.999.999-99');
                $('#rg1').mask('99.999.999-9');
                $('#cep').mask('99.999-999');
                $('#cnpj1').mask('99.999.999/9999-99');

            });
        </script>
        <!-- FIM JAVASCRITP MASCARA  -->
        <style type="text/css">

            html { height: 100% }
            body { height: 100%; margin: 0; padding: 0 }
            #map_canvas { height: 100% }
        </style>


        <style>
            div#gmap {
                width: 100%;
                height: 500px;

            }

        </style>
    </head>
    <body  class="hold-transition skin-black sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="home" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini">SGL</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>SISGEL</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->

                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->

                            <!-- Notifications: style can be found in dropdown.less -->

                            <!-- Tasks: style can be found in dropdown.less -->

                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu open">

                                <a href="logout"  >
                                    SAIR
                                    <span class="fa fa-sign-out"></span>
                                </a>

                            </li>

                        </ul>
                    </div>
                </nav>
            </header>
             
            <!-- Left side column. contains the sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <!--<img src="../../dists/img/user2-160x160.jpg" class="img-circle" >-->
                        </div>
                        <div class="pull-left info">

                        </div>
                    </div>
                    <!-- search form
                    <form action="#" method="get" class="sidebar-form">
                      <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                              </button>
                            </span>
                      </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu" data-widget="tree">
                        <a href="{{url('/dashboard')}}"><li class="header " >DASHBOARD </li></a>
                        @can('menu_cadastro')
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-pencil-square-o"></i> <span>Cadastros</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                @can('View_empresa')
                                <li>
                                    <a href="{{url('/empresas')}}"><span class="fa fa-home"></span> Empresas </a>
                                </li>
                                @endcan

                                @can('View_formaPagamento')
                                <li>
                                    <a href="{{url('/formaPagamentos')}}"><span class=" fa fa-usd"></span>  Forma de pagamento</a>
                                </li>

                                @endcan


                                @can('View_user')
                                <li>
                                    <a href="{{url('/users')}}"><span class="fa fa-user"></span> Usuários</a>
                                </li>

                                @endcan
                                @can('View_role')
                                <li>
                                    <a href="{{url('/acl/roles')}}"><span class="fa fa-file-text-o"></span>  Funções</a>
                                </li>

                                @endcan
                                @can('View_permission')
                                <li>
                                    <a href="{{url('/acl/permissions')}}"><span class="fa  fa-check-square-o"></span>  Permissões</a>
                                </li>

                                @endcan
                            </ul>
                        </li>
                        @endcan
                        @can('menu_empresa')

                        <li class="treeview">
                            <a href="#">
                                <i class=" fa fa-home"></i> <span>Locações</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="{{url('/locados')}}"><span class="fa fa-truck"></span>  Realizadas </a>
                                </li>

                                <li>
                                    <a href="{{url('/locarEquipamento/cadastrar')}}"><span class="fa fa-newspaper-o"></span>  Nova  </a>
                                </li>


                            </ul>



                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class=" fa fa-cogs"></i> <span>Reparos</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="{{url('/reparos/cadastrar')}}"><span class="fa fa-plus"></span>  Novo </a>
                                </li>

                                <li>
                                    <a href="{{url('/reparos')}}"><span class="fa  fa-retweet"></span>  Realizados  </a>
                                </li>


                            </ul>



                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-pencil-square-o"></i> <span>Cadastro </span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">

                                @can('View_periodo')
                                <li>
                                    <a href="{{url('/periodos')}}"><span class="fa fa-tachometer"></span>  Periodo </a>
                                </li>
                                @endcan
                                @can('View_peca')
                                <li>
                                    <a href="{{url('/pecas')}}"><span class="fa fa-puzzle-piece"></span>  Peças </a>
                                </li>
                                @endcan

                                <li>
                                    <a href="{{url('/locadors')}}"><span class=" fa fa-wrench"></span> Locador </a>
                                </li>
                                <li>
                                    <a href="{{url('/equipamentos')}}"><span class="fa fa-shopping-cart"></span> Equipamentos </a>
                                </li>

                            </ul>



                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-file-text-o"></i> <span>Relatorios</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="treeview menu">
                                    <a href="#"><i class="fa fa-money"></i> Faturamento
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu" style="display: none;">
                                        <li>
                                            <a href="{{url('/relatorioMensal/')}}"><i class="fa fa-clock-o"></i> <span>Periodo </span></a>
                                        </li>
                                        <li>
                                            <a href="{{url('/relatorioFaturamento/')}}"><i class="fa  fa-calendar"></i> <span> Mensal </span></a>
                                        </li>
                                        <li>
                                            <a href="{{url('/relatorioFaturamentoEquip/')}}"><i class="fa  fa-signal"></i> <span> Equipamento </span></a>
                                        </li>
                                    </ul>
                                </li>

                            </ul>


                        </li>
                        @endcan
                        @can('menu_varejo')
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-pencil-square-o"></i> <span>Cadastro </span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">

                                <li>
                                    <a href="{{url('/')}}"><span class="fa fa-tachometer"></span>  Produto </a>
                                </li>
                                <li>
                                    <a href="{{url('/')}}"><span class="fa fa-tachometer"></span>  Categoria  </a>
                                </li>

                            </ul>



                        </li>
                        @endcan
                        @can('Edit_empresa_logado')
                        <li class="treeview">
                            <a href="#">
                                <i class=" fa fa-cog"></i> <span>Config. Conta</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="{{url('users/editar/'.auth()->user()->id)}}"><i class="fa fa-user"></i> <span>Usuário - {{ Auth::user()->name }}</span></a>
                                </li>
                                <li>
                                    <a href="{{url('empresas')}}"><i class="fa  fa-bank "></i> <span>Empresa</span></a>
                                </li>
                            </ul>


                        </li>
                        @endcan

                    </ul>

                </section>
                <!-- /.sidebar -->

            </aside>

            <!-- =============================================== -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                @yield('content')
            </div>
        </form>
    </div>
    <!-- /.tab-pane -->
</div>
</aside>
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->

</div>

<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../../bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="../../bower_components/moment/min/moment.min.js"></script>
<script src="../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="../../bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page script -->
<!-- DataTables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- bootstrap datepicker -->
<script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script src="../../aplicacao.js"></script>
<script>
            $(function () {
                //Initialize Select2 Elements
                $('.select2').select2()

                //Datemask dd/mm/yyyy
                $('#datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'})
                //Datemask2 mm/dd/yyyy
                $('#datemask2').inputmask('mm/dd/yyyy', {'placeholder': 'mm/dd/yyyy'})
                //Money Euro
                $('[data-mask]').inputmask()

                //Date range picker
                $('#reservation').daterangepicker()
                //Date range picker with time picker
                $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'})
                //Date range as a button
                $('#daterange-btn').daterangepicker(
                        {
                            ranges: {
                                'Today': [moment(), moment()],
                                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                                'This Month': [moment().startOf('month'), moment().endOf('month')],
                                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                            },
                            startDate: moment().subtract(29, 'days'),
                            endDate: moment()
                        },
                        function (start, end) {
                            $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                        }
                )

                //Date picker
                $('#datepicker').datepicker({
                    autoclose: true
                })

                //iCheck for checkbox and radio inputs
                $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal-blue',
                    radioClass: 'iradio_minimal-blue'
                })
                //Red color scheme for iCheck
                $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                    checkboxClass: 'icheckbox_minimal-red',
                    radioClass: 'iradio_minimal-red'
                })
                //Flat red color scheme for iCheck
                $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                    checkboxClass: 'icheckbox_flat-green',
                    radioClass: 'iradio_flat-green'
                })

                //Colorpicker
                $('.my-colorpicker1').colorpicker()
                //color picker with addon
                $('.my-colorpicker2').colorpicker()

                //Timepicker
                $('.timepicker').timepicker({
                    showInputs: false
                });
                //Date picker
                $('#datepicker').datepicker({
                    autoclose: true
                });
                $('#datepicker1').datepicker({
                    autoclose: true
                });
                //data table pagination aqui vc configura como será exibido os datatable
                $('#example1').DataTable({
                    'paging': true,
                    'lengthChange': true,
                    'searching': true,
                    'ordering': false,
                    'info': false,
                    'autoWidth': false
                })
                $('#example2').DataTable({
                    'paging': true,
                    'lengthChange': false,
                    'searching': false,
                    'ordering': true,
                    'info': false,
                    'autoWidth': false
                })
            });



</script>

</body>

</html>
