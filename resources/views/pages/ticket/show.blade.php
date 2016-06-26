@extends('layouts.master')
<!--                                                                        -->
@section('title', '| Tickets')
<!--                                                                        -->
@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/admin-tools/admin-forms/css/admin-forms.css') }}">
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
                <a href="/">
                <span class="glyphicon glyphicon-home"></span>
                </a>
            </li>
            <li class="crumb-trail">Tickets</li>
        </ol>
    </div>
    <div class="topbar-right">
        <a href="#ticket-create" class="modal-launcher btn btn-sm btn-primary btn-gradient dark">
            <i class="fa fa-plus"></i> Abrir Ticket
        </a>
        @can('developer')
        <a href="/ticket/manage" type="button" class="btn btn-sm btn-system btn-gradient dark">
            <i class="fa fa-cog"></i> Gerenciar Tickets
        </a>
        @endcan
    </div>
</header>
@endsection
<!--                                                                        -->
@section('content')
<div class="col-md-9">
    <div class="panel panel-primary panel-border top animated fadeInUp">
        <div class="panel-heading">
            <span class="panel-title">
            <span class="fa fa-support"></span>Meus Tickets</span>
        </div>
        <div class="panel-body pn">
            <div class="bs-component">
                <table class="table table-hover" id="datatable" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Atualizado</th>
                            <th>Categoria</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tickets as $ticket)
                        <tr>
                            <td><a href="/ticket/{{ $ticket->id }}">{{ $ticket->content }}</a></td>
                            <td>{{ App\Utils::timeElapsedString($ticket->created_at) }}</td>
                            <td>{{ $ticket->category }}</td>
                            @if($ticket->status == 1)
                                <td><span class="label label-alert">pendente</span></td>
                            @elseif($ticket->status == 2)
                                <td><span class="label label-success">respondido</span></td>
                            @elseif($ticket->status == 3)
                                <td><span class="label label-danger">fechado</span></td>
                            @else
                                <td><span class="label label-primary">aberto</span></td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-md-3 mb30 animated slideInRight">
    <div class="panel panel-info">
        <div class="panel-heading">
            <span class="panel-icon">
            <i class="fa fa-life-ring"></i>
            </span>
            <span class="panel-title"> Suporte PC:RPG</span>
        </div>
        <div class="panel-body text-muted p10">
            <p>
                Este é o principal meio que você possui para conseguir
                suporte sobre o PC:RPG.
                <br><br>
                Você também pode procurar ajuda dentro do jogo, ou através de um dos nossos canais
                oficiais.
            </p>
            <div class="list-group fs14 fw600" style="margin-bottom: 3px" target="_blank">
                <a class="list-group-item" href="https://discord.gg/01395UXNDXeJyw2i1">
                    <i class="fa fa-comments-o fa-fw text-primary"></i>&nbsp; Discord
                </a>
                <a class="list-group-item" href="#" target="_blank">
                    <i class="fa fa-envelope-o fa-fw text-primary"></i>&nbsp; Email
                </a>
                <a class="list-group-item" href="https://www.youtube.com/channel/UCGo6hd688I7PS3NzRa01yiw" target="_blank">
                    <i class="fa fa-youtube-play fa-fw text-primary"></i>&nbsp; YouTube
                </a>
                <a class="list-group-item" href="https://twitter.com/paradisecityrpg" target="_blank">
                    <i class="fa fa-twitter fa-fw text-primary"></i>&nbsp; <span class="text-muted">@<span class="text-primary">paradisecityrpg</span>
                </a>
                <a class="list-group-item" href="https://fb.com/paradisecityrpg" target="_blank">
                    <i class="fa fa-facebook fa-fw"></i>&nbsp; <span class="text-muted">/<span class="text-primary">paradisecityrpg</span>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Begin: Modals -->
<div id="ticket-create" class="popup-basic admin-form mfp-with-anim mfp-hide">
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title"><i class="fa fa-rocket"></i>Leia antes de abrir um ticket</span>
        </div>
        <div class="panel-body panel-scroller scroller-sm pn">
            <p>Espere no mínimo 24 horas antes de enviar uma "cobrança" de resposta.</p>
            <hr class="short alt">
            <p>Não crie 2 tickets para o mesmo assunto, caso necessário, reabra o anterior.</p>
            <hr class="short alt">
            <p>Caso você resolva seu problema antes de uma resposta ao ticket, feche-o e informe a solução.</p>
            <hr class="short alt">
            <p>Em caso de tickets abertos indevidamente, você será notificado, ou até mesmo punido.</p>
            <hr class="short alt">
            <p>Caso a resposta do ticket contenha no FAQ, será lhe enviado uma resposta padrão, seu ticket será fechado e você notificado.</p>
            <hr class="short alt">
            <p>Precisamos de evidências para análisar sua solicitação, ou seja, prints, links, imagens e etc...</p>
            <hr class="short alt">
            <p>Denúncias, aplicações à cargos e solicitações de desbanimento <b>NÃO</b> devem ser realizadas por ticket. Elas possuem seções para isto.</p>
            <hr class="short alt">
            <p>Tickets apesar de ser a principal forma de suporte, não é a única. O PC também conta com um canal no Discord para suporte, assim como o Fórum e no servidor.</p>
            <hr class="short alt">
            <p>Mantenha sua solicitação organizada.</p>
            <hr class="short alt">
            <p>Caso sua solicitação tenha sido resolvida com a resposta de um administrador, feche sua solicitação. Solicitações com mais de 24 horas sem resposta por parte do usuário, são fechadas automaticamente.</p>
        </div>
        <div class="panel-footer text-right">
            <div class="btn-group">
                <a href="/ticket/create" class="btn btn-sm btn-primary btn-gradient dark"><i class="fa fa-check"></i> Continuar</a>
                <a class="btn btn-sm btn-default btn-gradient dark modal-dismiss"><i class="fa fa-close"></i> Cancelar</a>
            </div>
        </div>
    </div>
</div>
<!-- End: Modals -->
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
        $('.modal-launcher').magnificPopup({
            type: 'inline',
            mainClass: 'mfp-flipInX'
        });

        $(document).on('click', '.modal-dismiss', function (e) {
            e.preventDefault();
            $.magnificPopup.close();
        });

        // Init DataTables
        $('#datatable').dataTable({
            "sDom": 't<"dt-panelfooter clearfix"ip>',
            "scrollY": 270,
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
