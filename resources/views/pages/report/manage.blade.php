@extends('layouts.master')
<!--                                                                        -->
@section('title', '| Gerenciar denúncia')
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
            <li class="crumb-trail"><a href="/denuncias">Denúncias</a></li>
            <li class="crumb-trail">Gerenciar Denúncias</li>
        </ol>
    </div>
</header>
@endsection
<!--                                                                        -->
@section('content')
<div class="row mt30">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title"><span class="fa fa-flag"></span>Denúncias</span></span>
                <ul class="nav panel-tabs">
                    <li class="active">
                        <a href="#tabPlayer" data-toggle="tab">Jogadores</a>
                    </li>
                    <li class="">
                        <a href="#tabStaff" data-toggle="tab">Staff</a>
                    </li>
                </ul>
            </div>
            <div class="panel-body pn">
                <div class="tab-content">
                    <div id="tabPlayer" class="tab-pane active">
                        <table class="table table-hover" id="datatablePlayer" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Criação</th>
                                    <th>Denunciante</th>
                                    <th>Denunciado</th>
                                    <th>Categoria</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reports as $report)
                                    @if($report->type != 1)
                                    <tr>
                                        <td><a type="button" class="btn btn-xs btn-primary btn-gradient dark" href="/denuncia/{{ $report->id }}">#{{ $report->id }}</a></td>
                                        <td>{{ App\Utils::timeElapsedString($report->created_at) }}</td>
                                        <td><a href="#">{{ $report->user->name }}</a></td>
                                        <td><a href="#">{{ $report->accused->name }}</a></td>
                                        <td>{{ $report->reason }}</td>
                                    </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div id="tabStaff" class="tab-pane" style="width:100%">
                        <table class="table table-hover" id="datatableAdmin" cellspacing="0" style="width:100%">
                            <thead>
                                <tr style="width:100%">
                                    <th>ID</th>
                                    <th>Criação</th>
                                    <th>Denunciante</th>
                                    <th>Denunciado</th>
                                    <th>Categoria</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reports as $report)
                                    @if($report->type == 1)
                                    <tr>
                                        <td><a type="button" class="btn btn-xs btn-primary btn-gradient dark" href="/denuncia/{{ $report->id }}">#{{ $report->id }}</a></td>
                                        <td>{{ App\Utils::timeElapsedString($report->created_at) }}</td>
                                        <td><a href="#">{{ $report->user->name }}</a></td>
                                        <td><a href="#">{{ $report->accused->name }}</a></td>
                                        <td>{{ $report->reason }}</td>
                                    </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
        $('#datatablePlayer').dataTable({
            "sDom": 't<"dt-panelfooter clearfix"ip>',
            "scrollY": 265,
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

        $('#datatableAdmin').dataTable({
            "sDom": 't<"dt-panelfooter clearfix"ip>',
            "scrollY": 265,
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
