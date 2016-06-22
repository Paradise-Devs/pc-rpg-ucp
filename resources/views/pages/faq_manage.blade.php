@extends('layouts.master')
<!--                                                                        -->
@section('title', '| Gerenciar FAQ')
<!--                                                                        -->
@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/skin/default_skin/css/faq.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/admin-tools/admin-forms/css/admin-forms.css') }}">
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
            <li class="crumb-trail"><a href="/faq">FAQ</a></li>
            <li class="crumb-trail">Gerenciar FAQ</li>
        </ol>
    </div>
</header>
@endsection
<!--                                                                        -->
@section('content')
<div class="row mt30">
    <!-- FAQ Left Column -->
    <div class="admin-form theme-primary tab-pane active" id="comment1" role="tabpanel">
        <div class="col-md-12">
            <div class="panel panel-primary heading-border">
                <div class="panel-heading">
                    <span class="panel-title">
                    <i class="fa fa-support"></i>Adicionar FAQ</span>
                </div>
                <!-- end .panel-heading section -->
                <form>
                    <div class="panel-body p25">
                        <div class="section row">
                            <div class="col-md-12">
                                <label for="title" class="field prepend-icon">
                                    <input type="text" name="title" id="title" class="gui-input" placeholder="Título..." required>
                                    <label for="title" class="field-icon">
                                        <i class="fa fa-pencil"></i>
                                    </label>
                                </label>
                            </div>
                        </div>
                        <!-- end section row section -->
                        <div class="section">
                            <label for="comment" class="field prepend-icon">
                                <textarea class="gui-textarea" id="comment" name="comment" placeholder="Conteúdo" required></textarea>
                                <label for="comment" class="field-icon">
                                    <i class="fa fa-paragraph"></i>
                                </label>
                                <span class="input-footer">
                                    Utilize <strong>somente</strong> texto.
                                </span>
                            </label>
                        </div>
                        <!-- end section -->
                    </div>
                    <!-- end .form-body section -->
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary btn-gradient dark btn-blocks">
                            <i class="fa fa-plus"></i> Adicionar
                        </button>
                    </div>
                    <!-- end .form-footer section -->
                </form>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-visible" id="spy1">
                <div class="panel-heading">
                    <div class="panel-title hidden-xs">
                        <span class="glyphicon glyphicon-tasks"></span>FAQs
                    </div>
                </div>
                <div class="panel-body pn">
                    <table class="table table-striped table-hover" id="datatable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Autor</th>
                                <th>Adicionado</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Quais as vantagens do Paradise Pass?</td>
                                <td>Los</td>
                                <td>5 dias atrás</td>
                                <td>
                                    <a type="button" class="btn btn-xs btn-primary btn-gradient dark"><i class="fa fa-pencil"></i> editar</a>
                                    <a type="button" class="btn btn-xs btn-danger btn-gradient dark"><i class="fa fa-trash"></i> deletar</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Como sei que vai ocorrer um evento?</td>
                                <td>Los</td>
                                <td>5 dias atrás</td>
                                <td>
                                    <a type="button" class="btn btn-xs btn-primary btn-gradient dark"><i class="fa fa-pencil"></i> editar</a>
                                    <a type="button" class="btn btn-xs btn-danger btn-gradient dark"><i class="fa fa-trash"></i> deletar</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Qual a diferença de um grupo para uma facção?</td>
                                <td>Los</td>
                                <td>5 dias atrás</td>
                                <td>
                                    <a type="button" class="btn btn-xs btn-primary btn-gradient dark"><i class="fa fa-pencil"></i> editar</a>
                                    <a type="button" class="btn btn-xs btn-danger btn-gradient dark"><i class="fa fa-trash"></i> deletar</a>
                                </td>
                            </tr>
                            <tr>
                                <td>O que eu ganho com eventos?</td>
                                <td>Los</td>
                                <td>5 dias atrás</td>
                                <td>
                                    <a type="button" class="btn btn-xs btn-primary btn-gradient dark"><i class="fa fa-pencil"></i> editar</a>
                                    <a type="button" class="btn btn-xs btn-danger btn-gradient dark"><i class="fa fa-trash"></i> deletar</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Como posso alterar meu nome?</td>
                                <td>Los</td>
                                <td>5 dias atrás</td>
                                <td>
                                    <a type="button" class="btn btn-xs btn-primary btn-gradient dark"><i class="fa fa-pencil"></i> editar</a>
                                    <a type="button" class="btn btn-xs btn-danger btn-gradient dark"><i class="fa fa-trash"></i> deletar</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Fui banido injustamente, o que eu faço?</td>
                                <td>Los</td>
                                <td>5 dias atrás</td>
                                <td>
                                    <a type="button" class="btn btn-xs btn-primary btn-gradient dark"><i class="fa fa-pencil"></i> editar</a>
                                    <a type="button" class="btn btn-xs btn-danger btn-gradient dark"><i class="fa fa-trash"></i> deletar</a>
                                </td>
                            </tr>
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
<script src="{{ URL::asset('vendor/plugins/datatables/media/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}"></script>
<script src="{{ URL::asset('vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js') }}"></script>
<script src="{{ URL::asset('vendor/plugins/datatables/media/js/dataTables.bootstrap.js') }}"></script>

<script type="text/javascript">
    jQuery(document).ready(function() {
        // Init DataTables
        $('#datatable').dataTable({
            "sDom": 't<"dt-panelfooter clearfix"ip>',
            "oTableTools": {
                "sSwfPath": "vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
            },
            "language": {
                "info": "Mostrando _START_ até _END_ de _TOTAL_ registros",
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
