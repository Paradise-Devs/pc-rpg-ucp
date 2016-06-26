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
<link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/plugins/sweetalert/sweetalert.css') }}">
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
    <!-- FAQ Left Column -->
    <div class="col-md-12">
        <div class="admin-form theme-primary tab-pane active">
            <div class="panel panel-primary heading-border">
                <div class="panel-heading">
                    <span class="panel-title"><i class="fa fa-support"></i>Adicionar FAQ</span>
                </div>
                <!-- end .panel-heading section -->
                <form method="POST" action="{{ url('/faq') }}" role="form">
                    <div class="panel-body p25">
                        {{ csrf_field() }}
                            <div class="section row">
                                <div class="col-md-12">
                                    <label for="title" class="field prepend-icon {{ $errors->has('title') ? 'state-error' : '' }}">
                                        <input type="text" name="title" id="title" class="gui-input" value="{{ old('title') }}" placeholder="Título...">
                                        <label for="title" class="field-icon">
                                            <i class="fa fa-pencil"></i>
                                        </label>
                                    </label>
                                    @if ($errors->has('title'))
                                        <em for="password" class="state-error">{{ $errors->first('title') }}</em>
                                    @endif
                                </div>
                            </div>
                            <!-- end section row section -->
                            <div class="section">
                                <label for="comment" class="field prepend-icon {{ $errors->has('comment') ? 'state-error' : '' }}">
                                    <textarea class="gui-textarea" id="comment" name="comment" placeholder="Conteúdo">{{ old('comment') }}</textarea>
                                    <label for="comment" class="field-icon">
                                        <i class="fa fa-paragraph"></i>
                                    </label>
                                    <span class="input-footer">
                                        Utilize <strong>somente</strong> texto.
                                    </span>
                                </label>
                                @if ($errors->has('comment'))
                                    <em for="password" class="state-error">{{ $errors->first('comment') }}</em>
                                @endif
                            </div>
                            <!-- end section -->
                        </div>
                        <div class="panel-footer">
                             <button type="submit" class="btn btn-primary btn-gradient dark btn-blocks">
                                 <i class="fa fa-plus"></i> Adicionar
                             </button>
                         </div>
                    </form>
                </div>
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
                            @foreach($questions as $question)
                                <tr>
                                    <td>{{ $question->title }}</td>
                                    <td>{{ App\Utils::getName($question->creator_id) }}</td>
                                    <td>{{ App\Utils::timeElapsedString($question->created_at) }}</td>
                                    <td>
                                        <form class="controls form-inline form-delete" method="POST" action="{{ route('faq.destroy', $question->id) }}">
                                            <a href="{{ route('faq.edit', $question->id) }}" class="btn btn-xs btn-primary btn-inline btn-gradient dark"><i class="fa fa-pencil"></i> editar</a>
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="" class="btn btn-xs btn-danger btn-gradient dark btn-delete"><i class="fa fa-trash"></i> deletar</button>
                                        </form>
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
<script src="{{ URL::asset('vendor/plugins/datatables/media/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}"></script>
<script src="{{ URL::asset('vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js') }}"></script>
<script src="{{ URL::asset('vendor/plugins/datatables/media/js/dataTables.bootstrap.js') }}"></script>
<script src="{{ URL::asset('vendor/plugins/sweetalert/sweetalert.min.js') }}"></script>

<script type="text/javascript">
    jQuery(document).ready(function() {
        $('.btn-delete').on('click', function(e) {
            var btn = $(this);
            swal({
                title: "Você tem certeza?",
                text: "Deseja mesmo deletar essa pergunta? Essa ação não tem volta.",
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                confirmButtonText: "Sim, delete!",
                type: "error"
            }, function() {
                btn.parents('form').submit();
            });
            e.preventDefault();
        });
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
