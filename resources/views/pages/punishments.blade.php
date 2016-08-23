@extends('layouts.master')
<!--                                                                        -->
@section('title', '| Minhas punições')
<!--                                                                        -->
@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/skin/default_skin/css/theme.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/skin/default_skin/css/theme.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/admin-tools/admin-forms/css/admin-forms.css') }}">

<!-- Plugins -->
<link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/plugins/magnific/magnific-popup.css') }}">
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
                <a href="{{ url('/') }}">
                <span class="glyphicon glyphicon-home"></span>
                </a>
            </li>
            <li class="crumb-trail">Punições</li>
        </ol>
    </div>
</header>
@endsection
<!--                                                                        -->
@section('content')
<div class="row mt30">
    <div class="col-md-6">
        <div class="panel panel-primary mb50 panel-border top">
            <div class="panel-heading">
                <span class="panel-title">
                    <span class="fa fa-fire"></span>Notificações
                </span>
                <div class="widget-menu pull-right mr10">
                    <div class="progress progress-bar" style="width: 120px; margin-top: 13%">
                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: 60%;">3/5</div>
                    </div>
                </div>
            </div>
            <div class="panel-body panel-scroller scroller-sm pn">
                <blockquote class="blockquote-primary" style="font-size: 95%">
                    <p>Você foi notificado por que eu quis, é isso, valeu, flw</p>
                    <h6>Administrador: <a href="user_profile.html">Larceny</a></h6>
                </blockquote>
                <hr class="short alt">
                <blockquote class="blockquote-primary" style="font-size: 95%">
                    <p>Você foi notificado por que eu também quis, é isso, valeu, flw</p>
                    <h6>Administrador: <a href="user_profile.html">With</a></h6>
                </blockquote>
                <hr class="short alt">
                <blockquote class="blockquote-primary" style="font-size: 95%">
                    <p>Eu também</p>
                    <h6>Administrador: <a href="user_profile.html">Los</a></h6>
                </blockquote>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <span class="panel-title"><i class="fa fa-info"></i> Informações</span>
            </div>
            <div class="panel-body panel-scroller scroller-sm pn">
                <p class="p2">
                    <ul>
                        <li>Com <strong>5</strong> notificações você é banido automaticamente por 7 dias.</li>
                        <li>Cada notificações expiram em 30 dias.</li>
                        <li>Você pode ter até 4 banimentos temporários antes de ser banido permanentemente (isto não quer dizer que você não possa ser banido permanentemente antes de ser banido temporariamente)</li>
                        <li>Banimentos temporários podem durar até <strong>7</strong> dias.</li>
                        <li>Você pode ser preso por até <strong>24</strong> horas.</li>
                        <li>Você pode ser enviado para o underworld por até <strong>24</strong> horas.</li>
                        <li>Só é possível contestar banimentos.</li>
                        <li>Não utilize tickets para contestar banimentos.</li>
                    </ul>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="row" style="pading-top: 1%">
    <div class="col-md-12">
        <div class="panel panel-primary panel-border top">
            <div class="panel-heading">
                <span class="panel-title">
                <span class="fa fa-eye"></span>Minhas Punições</span>
            </div>
            <div class="panel-body pn">
                <div class="bs-component">
                    <table class="table table-hover" id="datatable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tipo</th>
                                <th>Quando</th>
                                <th>Expira Em</th>
                                <th>Administrador</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a type="button" class="modal-launcher btn btn-xs btn-primary btn-gradient dark" href="#modal-details-contest">#213</a></td>
                                <td>Banimento</td>
                                <td>3 dias atrás</td>
                                <td>Nunca</td>
                                <td>Servidor</td>
                            </tr>
                            <tr class="text-muted">
                                <td><a type="button" class="modal-launcher btn btn-xs btn-primary btn-gradient dark" href="#modal-details-contest">#209</a></td>
                                <td>Banimento</td>
                                <td>3 dias atrás</td>
                                <td>Expirado</td>
                                <td><a href="user_profile.html">Los</a></td>
                            </tr>
                            <tr>
                                <td><a type="button" class="modal-launcher btn btn-xs btn-primary btn-gradient dark" href="#modal-details">#200</a></td>
                                <td>Expulsão</td>
                                <td>3 dias atrás</td>
                                <td>-</td>
                                <td><a href="user_profile.html">With</a></td>
                            </tr>
                            <tr>
                                <td><a type="button" class="modal-launcher btn btn-xs btn-primary btn-gradient dark" href="#modal-details">#154</a></td>
                                <td>Remoção de Cargo</td>
                                <td>3 dias atrás</td>
                                <td>-</td>
                                <td><a href="user_profile.html">Larceny</a></td>
                            </tr>
                        </tbody>
                    </table>
                    <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!--                                                                        -->
@section('scripts')
<script src="{{ URL::asset('vendor/plugins/magnific/jquery.magnific-popup.js') }}"></script>

<!-- Datatables -->
<script src="{{ URL::asset('vendor/plugins/datatables/media/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}"></script>
<script src="{{ URL::asset('vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js') }}"></script>
<script src="{{ URL::asset('vendor/plugins/datatables/media/js/dataTables.bootstrap.js') }}"></script>

<script type="text/javascript">
    jQuery(document).ready(function() {
        $('.modal-launcher').magnificPopup({ type: 'inline', mainClass: 'mfp-flipInX' });
        $('#datatable').dataTable({
            "sDom": 't<"dt-panelfooter clearfix"ip>',
            "scrollY": 120,
            "oTableTools": {
                "sSwfPath": "vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
            },
            "language": {
                "info": "Mostrando _START_ até _END_ de _TOTAL_ registros",
                "infoEmpty": "Não há entradas para serem mostradas",
                "emptyTable": "Nenhuma punição encontrada",
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
