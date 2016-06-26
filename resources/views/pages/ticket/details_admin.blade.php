@extends('layouts.master')
<!--                                                                        -->
@section('title', '| Ticket #29831931')
<!--                                                                        -->
@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/admin-tools/admin-forms/css/admin-forms.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/plugins/select2/css/core.css') }}">
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
            <li class="crumb-trail"><a href="/ticket">Tickets</a></li>
            <li class="crumb-trail"><a href="/ticket/gerenciar">Gerenciar Tickets</a></li>
            <li class="crumb-trail">Ticket #12313213</li>
        </ol>
    </div>
    <div class="topbar-right">
        <select id="status_select">
            <option value="opened" selected><i class="fa fa-eye-slash"></i> Aberto</option>
            <option value="closed"><i class="fa fa-eye-slash"></i> Fechado</option>
        </select>
        <div class="btn-group">
            <a href="#" type="button" class="opened_ticket btn btn-sm btn-danger btn-gradient dark">
                <i class="fa fa-lock"></i> Fechar
            </a>
            <a href="#" type="button" class="closed_ticket btn btn-sm btn-danger btn-gradient dark">
                <i class="fa fa-unlock-alt"></i> Reabrir
            </a>
            <a href="ticket_edit.html" type="button" class="btn btn-sm btn-primary btn-gradient dark">
                <i class="fa fa-pencil"></i> Editar
            </a>
            <a href="#" type="button" class="btn btn-sm btn-primary btn-gradient dark">
                <i class="fa fa-trash"></i> Deletar
            </a>
            <a href="#" type="button" class="opened_ticket btn btn-sm btn-primary btn-gradient dark">
                <i class="fa fa-share"></i> Transferir
            </a>
        </div>
    </div>
</header>
@endsection
<!--                                                                        -->
@section('content')
<div class="col-md-12 closed_ticket">
    <div class="alert alert-danger light">
        <i class="fa fa-info pr10"></i> Este ticket está fechado. É necessário a reabertura caso precise falar com o autor sobre o assunto (o mesmo será notificado).
    </div>
</div>
<div class="col-md-12">
    <div id="ticket_panel" class="admin-form">
        <div id="ticket_panel_heading" class="panel heading-border">
            <div class="panel-heading">
                <span class="panel-title"><i class="fa fa-support"></i>Se bugar de novo, eu tiro ele fora</span>
            </div>
            <div class="panel-body" style="margin-bottom: 0px; padding-bottom: 0px">
                <form>
                    <div class="section row">
                        <div class="col-md-12">
                            <div id="original_message">
                                <p>
                                    <h5><span class="text-muted">(07/06/2016 - 16:13)</span> <a href="user_profile.html">Los</a> relatou:</h5>
                                    <blockquote class="blockquote-primary" style="font-size: 95%;">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In consequat tortor ex. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer purus arcu, viverra quis turpis id, faucibus faucibus turpis. Sed at rhoncus nunc. Aliquam non fringilla purus. Curabitur faucibus tellus et efficitur lacinia. Mauris quis ipsum at dolor venenatis fringilla a dapibus sem. Maecenas pulvinar egestas urna, eu pharetra mauris efficitur sed. Nam et mollis velit. Curabitur at metus sollicitudin turpis elementum aliquam. In blandit, urna at convallis suscipit, tortor dui ultricies magna, eget pretium mi lorem et tortor. Suspendisse potenti. Duis mattis arcu in molestie volutpat. Sed scelerisque tristique nisl, sit amet efficitur diam luctus et. Praesent consectetur, nisi nec sodales dignissim, magna sem varius massa, commodo mollis arcu massa in turpis. Nullam scelerisque libero eu ipsum tempor scelerisque.
                                            <br /><br />
                                            Suspendisse at augue odio. Nulla pellentesque, tortor et rutrum consequat, leo lectus interdum eros, vel elementum purus mauris at nunc. Sed tristique blandit neque id gravida. Proin velit turpis, dictum ut purus sit amet, scelerisque pretium neque. Morbi a iaculis sapien. Vivamus lacinia scelerisque accumsan. Integer non rhoncus ipsum, at suscipit dui. Aliquam erat volutpat. Proin non ex lacus.
                                        </p>
                                    </blockquote>
                                </p>
                            </div>
                            <div id="admin_response">
                                <hr class="short alt" />
                                <p class="text-right">
                                    <h5 class="text-right">Respondido por <a href="user_profile.html">Los</a>:</h5>
                                    <blockquote id="block_answer" class="blockquote-system blockquote-reverse" style="font-size: 95%; margin-bottom: 0px">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In consequat tortor ex. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer purus arcu, viverra quis turpis id, faucibus faucibus turpis. Sed at rhoncus nunc. Aliquam non fringilla purus. Curabitur faucibus tellus et efficitur lacinia. Mauris quis ipsum at dolor venenatis fringilla a dapibus sem. Maecenas pulvinar egestas urna, eu pharetra mauris efficitur sed. Nam et mollis velit. Curabitur at metus sollicitudin turpis elementum aliquam. In blandit, urna at convallis suscipit, tortor dui ultricies magna, eget pretium mi lorem et tortor. Suspendisse potenti. Duis mattis arcu in molestie volutpat. Sed scelerisque tristique nisl, sit amet efficitur diam luctus et. Praesent consectetur, nisi nec sodales dignissim, magna sem varius massa, commodo mollis arcu massa in turpis. Nullam scelerisque libero eu ipsum tempor scelerisque.
                                            <br /><br />
                                            Suspendisse at augue odio. Nulla pellentesque, tortor et rutrum consequat, leo lectus interdum eros, vel elementum purus mauris at nunc. Sed tristique blandit neque id gravida. Proin velit turpis, dictum ut purus sit amet, scelerisque pretium neque. Morbi a iaculis sapien. Vivamus lacinia scelerisque accumsan. Integer non rhoncus ipsum, at suscipit dui. Aliquam erat volutpat. Proin non ex lacus.
                                        </p>
                                        <div class="btn-group">
                                            <a id="edit_answer_btn" type="button" class="btn btn-xs btn-primary btn-gradient dark" style="margin-top: 0px"><i class="fa fa-pencil"></i> editar</a>
                                            <a id="remove_answer_btn" type="button" class="btn btn-xs btn-danger btn-gradient dark" style="margin-top: 0px"><i class="fa fa-trash"></i> deletar</a>
                                        </div>
                                    </blockquote>
                                    <div id="edit_answer_div" class="text-right">
                                        <textarea id="edit_answer" name="content" data-language="pt" rows="10" style="margin-bottom: 10px">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In consequat tortor ex. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer purus arcu, viverra quis turpis id, faucibus faucibus turpis. Sed at rhoncus nunc. Aliquam non fringilla purus. Curabitur faucibus tellus et efficitur lacinia. Mauris quis ipsum at dolor venenatis fringilla a dapibus sem. Maecenas pulvinar egestas urna, eu pharetra mauris efficitur sed. Nam et mollis velit. Curabitur at metus sollicitudin turpis elementum aliquam. In blandit, urna at convallis suscipit, tortor dui ultricies magna, eget pretium mi lorem et tortor. Suspendisse potenti. Duis mattis arcu in molestie volutpat. Sed scelerisque tristique nisl, sit amet efficitur diam luctus et. Praesent consectetur, nisi nec sodales dignissim, magna sem varius massa, commodo mollis arcu massa in turpis. Nullam scelerisque libero eu ipsum tempor scelerisque.
                                            Suspendisse at augue odio. Nulla pellentesque, tortor et rutrum consequat, leo lectus interdum eros, vel elementum purus mauris at nunc. Sed tristique blandit neque id gravida. Proin velit turpis, dictum ut purus sit amet, scelerisque pretium neque. Morbi a iaculis sapien. Vivamus lacinia scelerisque accumsan. Integer non rhoncus ipsum, at suscipit dui. Aliquam erat volutpat. Proin non ex lacus.
                                        </textarea>
                                        <a id="save_edit_answer_btn" type="button" class="btn btn-xs btn-primary btn-gradient dark"><i class="fa fa-save"></i> salvar</a>
                                    </div>
                                </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="ticket_responseform" class="opened_ticket col-md-12">
    <div class="admin-form theme-primary">
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title"><span class="fa fa-support"></span>Resposta ao ticket</span></span>
            </div>
            <textarea id="markdown-editor" name="content" data-language="pt" rows="10" placeholder="Escreva aqui a resposta ao ticket..."></textarea>
            <div class="section-divider mb40" id="spy1" style="padding-bottom: 0px">
                <span style="color: #4a89dc;">Anexo</span>
            </div>
            <div class="panel-body" style="padding-top: 1px">
                <div class="col-md-12">
                    <div class="section" style="margin-top: 1px; margin-bottom: 0px">
                        <label class="field prepend-icon file">
                            <span class="button btn-primary">Selecionar arquivo...</span>
                            <input type="file" class="gui-file" name="file2" id="file2" onchange="document.getElementById('uploader2').value = this.value;" multiple>
                            <input type="text" class="gui-input" id="uploader2" placeholder="Por favor, selecione o(s) arquivo(s)" multiple>
                            <label class="field-icon">
                                <i class="fa fa-upload"></i>
                            </label>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!--                                                                        -->
@section('scripts')
<!-- MarkDown JS -->
<script src="{{ URL::asset('vendor/plugins/markdown/markdown.js') }}"></script>
<script src="{{ URL::asset('vendor/plugins/markdown/to-markdown.js') }}"></script>
<script src="{{ URL::asset('vendor/plugins/markdown/bootstrap-markdown.js') }}"></script>

<!-- Select2 Plugin Plugin -->
<script src="{{ URL::asset('vendor/plugins/select2/select2.min.js') }}"></script>

<script src="{{ URL::asset('assets/js/custom_tickets.js') }}"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        // Init MarkDown Editor
        $("#markdown-editor").markdown({
            savable: false,
            onChange: function(e) {
                var content = e.parseContent(),
                content_length = (content.match(/\n/g) || []).length + content.length
                if (content == '') {
                    $('#md-footer').hide()
                } else {
                    $('#md-footer').show().html(content)
                }
            }
        });
    });
</script>
@endsection
