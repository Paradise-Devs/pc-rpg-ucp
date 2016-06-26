@extends('layouts.master')
<!--                                                                        -->
@section('title', '| Denúnciar')
<!--                                                                        -->
@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/admin-tools/admin-forms/css/admin-forms.css') }}">
<link rel="stylesheet" href="{{ URL::asset('vendor/plugins/dropzone/css/dropzone.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/plugins/magnific/magnific-popup.css') }}">
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
            <li class="crumb-trail">Denúnciar: Administração</li>
        </ol>
    </div>
</header>
@endsection
<!--                                                                        -->
@section('content')
<div class="row mt30">
    <div class="col-md-12">
        <div class="admin-form theme-primary tab-pane active">
            <div class="panel panel-primary heading-border">
                <div class="panel-heading">
                    <span class="panel-title"><i class="fa fa-flag"></i>Denúnciar Administração</span>
                </div>
                <!-- end .panel-heading section -->
                <textarea id="markdown-editor" name="content" data-language="pt" rows="10" placeholder="Diga-nos, o que aconteceu?"></textarea>
                <div class="section-divider mb40" id="spy1">
                    <span style="color: #4a89dc;">Acusado & Motivo</span>
                </div>
                <div class="panel-body" style="padding-top: 1px">
                    <form>
                        <div class="section row">
                            <div class="col-md-6">
                                <label class="field select">
                                    <select id="admins">
                                        <option selected>Selecione o staffer...</option>
                                        <optgroup label="Administradores">
                                            <option>ReDKiiL</option>
                                            <option>Admin_Random1</option>
                                            <option>Admin_Random2</option>
                                            <option>Admin_Random3</option>
                                            <option>Admin_Random4</option>
                                        </optgroup>
                                        <optgroup label="Supervisores">
                                            <option>Super_Random1</option>
                                            <option>Super_Random2</option>
                                            <option>Super_Random3</option>
                                            <option>Super_Random4</option>
                                        </optgroup>
                                        <optgroup label="Moderadores">
                                            <option>Moderator_Random1</option>
                                            <option>Moderator_Random2</option>
                                            <option>Moderator_Random3</option>
                                            <option>Moderator_Random4</option>
                                        </optgroup>
                                    </select>
                                    <i class="arrow"></i>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label class="field select">
                                    <select id="category">
                                        <option selected>Selecione o motivo...</option>
                                        <option>Cheating</option>
                                        <option>Glitching</option>
                                        <option>Spamming/Flood</option>
                                        <option>Abuso Verbal</option>
                                        <option>Abuso de Poder</option>
                                        <option>Nome Inapropriado/Ofensivo</option>
                                        <option>Divulgação</option>
                                        <option>Anti-RPG</option>
                                        <option>DM abusivo</option>
                                        <option>Drive-By</option>
                                        <option>Run-Over</option>
                                        <option>Outros...</option>
                                    </select>
                                    <i class="arrow"></i>
                                </label>
                                <span class="help-block mt5">
                                    Caso não saiba o que significa alguma das categorias, verifique <a class="modal-launcher" href="#modal-help">aqui</a>.
                                </span>
                            </div>
                        </div>
                        <!-- end section -->
                    </form>
                </div>
                <!-- end .form-body section -->
                <div class="panel-footer">
                    <div class="btn-group">
                        <a href="#" type="submit" class="btn btn-primary btn-gradient dark btn-blocks">
                            <i class="fa fa-mail-forward"></i> Enviar
                        </a>
                        <a href="/denuncias" type="submit" class="btn btn-default btn-gradient dark btn-blocks">
                            <i class="fa fa-close"></i> Cancelar
                        </a>
                    </div>
                </div>
                <!-- end .form-footer section -->
            </div>
        </div>
    </div>
</div>
<div id="modal-help" class="popup-basic p25 mfp-with-anim mfp-hide">
    <b>Cheating:</b> Utilizar qualquer ferramenta que possa vir a trazer alguma vantagem no jogo em si. Trapacear.<br><br>
    <b>Glitching:</b> Utilizar qualquer bug do servidor/jogo para se beneficiar de alguma forma.<br><br>
    <b>Spamming/Flood:</b> Repetir uma determinada ação em um intervalo pequeno de tempo.<br><br>
    <b>Abuso Verbal:</b> Mensagens/atos de racismo, apologia a violência fora do jogo ou a qualquer outra forma de ofensa a terceiros<br><br>
    <b>Abuso de Poder:</b> Utilizar um cargo/comando em sua vantagem para prejudicar terceiros, sem motivo.<br><br>
    <b>Nome Inapropriado/Ofensivo:</b> Nomes de jogadores que são ofensivos de alguma forma ou inapropriados<br><br>
    <b>Divulgação:</b> Induzir a acessar ou procurar por algo que não seja ligado diretamente ao PC:RPG.<br><br>
    <b>Anti-RPG:</b> Cometer atos que você não faria na vida real.<br><br>
    <b>DM abusivo:</b> Matar ou atacar outros jogadores sem motivo ou por motivos fúteis.<br><br>
    <b>Drive-By:</b> Ato de atirar de dentro do veículo em jogadores fora de veículos, como passageiro/motorista.<br><br>
    <b>Run-Over:</b> Atropelar um jogador, deixar o carro em cima e sair do veículo.<br><br>
    <b>Outros:</b> Qualquer ato que não se encaixe nas categorias descritas acima.<br><br>
</div>
@endsection
<!--                                                                        -->
@section('scripts')
<script src="{{ URL::asset('vendor/plugins/magnific/jquery.magnific-popup.js') }}"></script>
<!-- MarkDown JS -->
<script src="{{ URL::asset('vendor/plugins/markdown/markdown.js') }}"></script>
<script src="{{ URL::asset('vendor/plugins/markdown/to-markdown.js') }}"></script>
<script src="{{ URL::asset('vendor/plugins/markdown/bootstrap-markdown.js') }}"></script>

<script src="{{ URL::asset('vendor/plugins/dropzone/dropzone.min.js') }}"></script>

<script type="text/javascript">
    jQuery(document).ready(function() {
        $('.modal-launcher').magnificPopup({ type: 'inline', mainClass: 'mfp-flipInX' });

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
