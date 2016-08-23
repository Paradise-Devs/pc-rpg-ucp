@extends('layouts.master')
<!--                                                                        -->
@section('title', '| Denúncias')
<!--                                                                        -->
@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/plugins/datatables/media/css/dataTables.bootstrap.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/plugins/datatables/extensions/Editor/css/dataTables.editor.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css') }}">
@endsection
<!--                                                                        -->
@section('topbar')
<header id="topbar" class="alt affix">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="crumb-active">
                <a href="#">UCP</a>
            </li>
            <li class="crumb-icon">
                <a href="/">
                <span class="glyphicon glyphicon-home"></span>
                </a>
            </li>
            <li class="crumb-trail">Denúncias</li>
        </ol>
    </div>
    @can('admin')
    <div class="topbar-right">
        <a href="{{ url('/denuncias/gerenciar') }}" type="button" class="btn btn-sm btn-system btn-gradient dark">
            <i class="fa fa-cog"></i> Gerenciar Denúncias
        </a>
    </div>
    @endcan
</header>
@endsection
<!--                                                                        -->
@section('content')
<div class="row mt30">
    @if(Session::get('success'))
        <div class="col-md-12">
            <div class="special-alerts">
                <div class="alert alert-success pastel light alert-dismissable" id="alert-demo-1" style="display: block;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="fa fa-check pr10"></i>Operação realizada com sucesso!
                </div>
            </div>
        </div>
    @endif
    <div class="col-md-6">
        <div class="panel panel-primary mb50 panel-border top"> <!-- animated slideInLeft -->
            <div class="panel-heading">
                <span class="panel-title"><i class="fa fa-flag"></i> Denúncia contra jogador</span>
            </div>
            <div class="panel-body">
                <ul>
                    <li>Administradores irão análisar a sua denúncia em até <b>24 horas</b>.</li>
                    <li>Administradores são totalmente imparciais quanto a análise.</li>
                    <li>Você terá acesso a punição concedida ao membro.</li>
                    <li>Seu nick será mantido em sigilo.</li>
                    <li>Forneça o máximo de evidências que você possuir.</li>
                    <li>Nós reservamos o direito de contestar sua denúncia.</li>
                    <li>Você também pode denunciar um jogador pelo próprio jogo.</li>
                </ul>
            </div>
            <div class="panel-footer">
                <a href="{{ url('/denuncia/create') }}" class="btn btn-sm btn-primary btn-block btn-gradient dark"><i class="fa fa-flag"></i> Denúnciar</a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-danger mb50 panel-border top"> <!-- animated slideInRight -->
            <div class="panel-heading">
                <span class="panel-title"><i class="fa fa-flag"></i> Denúncia contra staff</span>
            </div>
            <div class="panel-body">
                <ul>
                    <li>Desenvolvedores irão análisar a sua denúncia em até <b>72 horas</b>.</li>
                    <li>Desenvolvedores são totalmente imparciais quanto a análise.</li>
                    <li>Você <b>NÃO</b> terá acesso a punição concedida.</li>
                    <li>Seu nick será mantido em sigilo.</li>
                    <li>Forneça o máximo de evidências que você possuir.</li>
                    <li>Nós reservamos o direito de contestar sua denúncia.</li>
                    <li>Devs não podem ser denunciados. <span style="color:#fff">(fazemos tudo certinho, oras)</span></li>
                </ul>
            </div>
            <div class="panel-footer">
                <a href="{{ url('/denuncia/create/admin') }}" class="btn btn-sm btn-primary btn-block btn-gradient dark"><i class="fa fa-flag"></i> Denúnciar</a>
            </div>
        </div>
    </div>
</div>
<div class="row" style="pading-top: 1%">
    <div class="col-md-12">
        <div class="panel panel-primary panel-border top"> <!-- animated fadeInUp -->
            <div class="panel-heading">
                <span class="panel-title">
                <span class="fa fa-eye"></span>Minhas Denúncias</span>
            </div>
            <div class="panel-body pn">
                <div class="bs-component">
                    <table class="table table-hover" id="datatable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Acusado</th>
                                <th>Categoria</th>
                                <th>Criação</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reports as $report)
                                <tr>
                                    <td><a href="{{ url("denuncia/$report->id") }}" class="modal-launcher btn btn-xs btn-primary btn-gradient dark" href="#">#{{ $report->id }}</a></td>
                                    <td><a href="{{ url('/perfil/'.$report->accused->id) }}">{{ $report->accused->username }}</a></td>
                                    <td>{{ $report->reason }}</td>
                                    <td>{{ App\Utils::timeElapsedString($report->created_at) }}</td>
                                    <td>
                                        @if($report->status == 0)
                                            <a href="#" type="button" class="btn btn-xs btn-default btn-gradient dark">aberto</a>
                                        @elseif($report->status == 1)
                                            <a href="#" type="button" class="btn btn-xs btn-warning btn-gradient dark">em análise</a>
                                        @elseif($report->status == 2)
                                            <a href="#" type="button" class="btn btn-xs btn-success btn-gradient dark">deferida</a>
                                        @elseif($report->status == 3)
                                            <a href="#" type="button" class="btn btn-xs btn-danger btn-gradient dark">não deferida</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!--                                                                        -->
@section('scripts')
<!-- Datatables -->
<script src="{{ URL::asset('vendor/plugins/datatables/media/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}"></script>
<script src="{{ URL::asset('vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js') }}"></script>
<script src="{{ URL::asset('vendor/plugins/datatables/media/js/dataTables.bootstrap.js') }}"></script>

<script type="text/javascript">
    jQuery(document).ready(function() {
        // Init DataTables
        $('#datatable').dataTable({
            "sDom": 't<"dt-panelfooter clearfix"ip>',
            "scrollY": 120,
            "oTableTools": {
                "sSwfPath": "vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
            },
            "language": {
                "info": "Mostrando _START_ até _END_ de _TOTAL_ registros",
                "infoEmpty": "Não há entradas para serem mostradas",
                "emptyTable": "Nenhuma denúncia encontrada",
                "paginate": {
                    "first":      "Primeiro",
                    "previous":   "Anterior",
                    "next":       "Próximo",
                    "last":       "Último"
                }
            }
        });
    });
</script>
@endsection
