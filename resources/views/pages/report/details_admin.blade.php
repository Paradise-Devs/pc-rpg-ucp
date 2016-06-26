@extends('layouts.master')
<!--                                                                        -->
@section('title', '| Gerenciar denúncia')
<!--                                                                        -->
@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/admin-tools/admin-forms/css/admin-forms.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/plugins/animate/animate.min.css') }}">
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
            <li class="crumb-trail"><a href="/denuncias">Denúncias</a></li>
            <li class="crumb-trail"><a href="/denuncias/gerenciar">Gerenciar Denúncias</a></li>
            <li class="crumb-trail">Denúncia #{{ $report->id }}</li>
        </ol>
    </div>
</header>
@endsection
<!--                                                                        -->
@section('content')
<div class="row mt30">
    <div class="col-md-12">
        <div class="admin-form theme-primary">
            <div class="panel heading-border panel-primary">
                <div class="panel-heading">
                    <span class="panel-title"><span class="fa fa-flag"></span>Denúncia #{{ $report->id }}</span></span>
                    <div class="widget-menu pull-right mr10">
                        <span class="label bg-danger mr10">{{ $report->reason }}</span>
                    </div>
                </div>
                <div class="panel-body" style="margin-bottom: 0px; padding-bottom: 0px">
                    <div class="section row">
                        <div class="col-md-12">
                            <p>
                                <h5><span style="color: #A1ACBD">({{ App\Utils::timeElapsedString($report->created_at) }})</span> <a href="user_profile.html">{{ $report->user->name }}</a>, acusando <a href="#">{{ $report->accused->name }}</a>, relatou:</h5>
                                <br />
                                <blockquote class="blockquote-primary" style="font-size: 95%;">
                                    <p id="report-content">{{ $report->content }}</p>
                                </blockquote>
                            </p>
                        </div>
                    </div>
                    <div id="accept_complaint_div" class="animated fadeInUp">
                        <div class="section-divider">
                            <span style="color: #4a89dc;">Aceitar Denúncia</span>
                        </div>
                        <h6 class="text-center">
                            A punição escolhida abaixo será dada automaticamente ao jogador, mesmo se estiver jogando.
                            Em caso de punição atribuida incorretamente, vá até o perfil do jogador e remova/edite.
                        </h6>
                        <div class="section row mt20">
                            <div class="col-md-6">
                                <label class="field select">
                                    <select id="punishment">
                                        <option selected="" value="null">Selecione...</option>
                                        <optgroup label="Conta">
                                            <!-- Nível baixo -->
                                            <option value="notification_id">Notificar</option>
                                            <option value="tempban_id">Banimento Temporário</option>
                                            <!-- Nível médio -->
                                            <option value="permaban_id">Banimento Permanente</option>
                                            <option value="resetacc_id">Resetar Conta</option>
                                            <!-- Nível alto -->
                                            <option value="deleteacc_id">Deletar Conta</option>
                                        </optgroup>
                                        <optgroup label="Personagem">
                                            <!-- Nível baixo -->
                                            <option value="applyticket_id">Aplicar Multa</option>
                                            <option value="sendtoprision_id">Prisão</option>
                                            <option value="sendtouw_id">Enviar para Underworld</option>
                                            <!-- Nível médio -->
                                            <option value="jobremove_id">Remover do Emprego</option>
                                            <!-- Nível alto -->
                                            <option value="changestats_id">Alterar Stats (Dinheiro/XP/Level)</option>
                                        </optgroup>
                                        <optgroup label="Grupos &amp; Facções">
                                            <!-- Nível médio -->
                                            <option value="groupremove_id">Remover da Facção/Grupo</option>
                                        </optgroup>
                                        <optgroup label="Patrimônio">
                                            <!-- Nível médio -->
                                            <option value="sellpatrimony_id">Remover Patrimônio</option>
                                            <!-- Nível alto -->
                                            <option value="resetpatrimony_id">Resetar Patrimônio</option>
                                        </optgroup>
                                    </select>
                                    <i class="arrow"></i>
                                </label>

                                <input type="text" id="reason_accept" class="gui-input mt20" placeholder="Motivo da punição" maxlength="70" required>
                            </div>
                            <div class="col-md-6">
                                <div class="punishment-option" id="notification_div">
                                    <div class="progress" style="clear: both; margin-bottom: 2px">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: 60%">
                                            <span class="sr-only"> 3/5 notificações </span>
                                        </div>
                                    </div>
                                    <div class="status mb30" style="top: 35%; font-size: 11px; color: #AAB5BC; font-weight: 600; text-transform: uppercase; display: block;">
                                        <div class="status-title" style="float: left; display: inline-block;"> notificações </div>
                                        <div class="status-number" style="float: right; display: inline-block;"> 3/5 </div>
                                    </div>
                                    <!-- Mostrar com 4 => notificações -->
                                    <blockquote id="fournots" class="blockquote-danger fs12 hidden" style="color: #999; margin-top: 38px">
                                        <p><strong>Atenção!</strong> Este usuário já tem 4 notificações, notifica-lo novamente, vai bani-lo por 7 dias automaticamente. Notificações expiram em 30 dias.</p>
                                    </blockquote>
                                    <!-- Mostrar com <= 3 notificações -->
                                    <blockquote class="blockquote-primary fs12" style="color: #999; margin-top: 38px">
                                        <p>Com 5 notificações o usuário vai ser automaticamente banido por 7 dias. Notificações expiram em 30 dias.</p>
                                    </blockquote>
                                </div>
                                <div class="punishment-option" id="tempban_div">
                                    <div class="admin-form">
                                        <input id="tempban_label" type="text" style="color: #4a89dc;" class="slider-countbox mb5" value="3 dia(s)">
                                        <div class="slider-wrapper slider-primary">
                                            <div id="tempbandays_slider"></div>
                                        </div>
                                    </div>
                                    <blockquote class="blockquote-primary fs12" style="color: #999; margin-top: 34px">
                                        <p>Este usuário já possui <strong>5</strong> banimentos temporários registrados.</p>
                                    </blockquote>
                                </div>
                                <div class="punishment-option fs12 text-info" id="permaban_div">
                                    <ul>
                                        <li>Punições Registradas:</li>
                                        <li>Último IP:</li>
                                        <li>E-mail da conta:</li>
                                        <hr class="short alt" style="margin-top: 2%; margin-bottom: 2%">
                                        Após o banimento, o jogador ainda vai conseguir utilizar o painel.<br />
                                        O banimento também poderá ser contestado pelo jogador.
                                    </ul>
                                </div>
                                <div class="punishment-option fs12 text-info" id="resetacc_div">
                                    Ao resetar a conta do usuário, tudo será perdido e a conta do mesmo será enviada de volta ao tutorial, como se tivesse acabado de se registrar.
                                    <br /><br />
                                    <span class="text-danger"><strong>Atenção!</strong> Não há como reverter essa operação.<span>
                                </div>
                                <div class="punishment-option fs12 text-info" id="deleteacc_div">
                                    Ao deletar a conta do usuário, tudo será perdido. O usuário receberá um e-mail com o motivo da conta ter sido removida.
                                    <br />
                                    <span class="text-muted">(Sempre dê preferência em resetar a conta ao invés de remove-la).</span>
                                    <br /><br />
                                    <span class="text-danger"><strong>Atenção!</strong> Não há como reverter essa operação.<span>
                                </div>
                                <div class="punishment-option fs12 text-info" id="applyticket_div">
                                    <div class="admin-form">
                                        <input id="ticket_label" type="text" style="color: #4a89dc;" class="slider-countbox mb5" value="$500">
                                        <div class="slider-wrapper slider-primary">
                                            <div id="ticket_slider"></div>
                                        </div>
                                    </div>
                                    <blockquote class="blockquote-primary fs12" style="color: #999; margin-top: 34px">
                                        <p>Valor no banco: <b class="text-info">$39.000</b></p>
                                    </blockquote>
                                </div>
                                <div class="punishment-option fs12 text-info" id="sendtoprision_div">
                                    <div class="admin-form">
                                        <input id="prision_label" type="text" style="color: #4a89dc;" class="slider-countbox mb5" value="2 hora(s)">
                                        <div class="slider-wrapper slider-primary">
                                            <div id="sendtoprision_slider"></div>
                                        </div>
                                    </div>
                                    <blockquote class="blockquote-primary fs12" style="color: #999; margin-top: 34px">
                                        <p>Este jogador já foi enviado para a prisão <b class="text-info">5</b> vezes</p>
                                    </blockquote>
                                </div>
                                <div class="punishment-option fs12 text-info" id="sendtouw_div">
                                    <div class="admin-form">
                                        <input id="uw_label" type="text" style="color: #4a89dc;" class="slider-countbox mb5" value="2 hora(s)">
                                        <div class="slider-wrapper slider-primary">
                                            <div id="sendtouw_slider"></div>
                                        </div>
                                    </div>
                                    <blockquote class="blockquote-primary fs12" style="color: #999; margin-top: 34px">
                                        <p>Este jogador já foi enviado para o underworld <b class="text-info">5</b> vezes</p>
                                    </blockquote>
                                </div>
                                <div class="punishment-option text-info" id="jobremove_div">
                                    <label class="field prepend-icon">
                                        <input type="text" class="gui-input" value="Motorista de Ônibus" readonly>
                                        <label for="s" class="field-icon">
                                            <i class="fa fa-briefcase"></i>
                                        </label>
                                    </label>
                                    <blockquote class="blockquote-primary fs12" style="color: #999; margin-top: 23px">
                                        <p>Salário atual: <b class="text-info">$532</b>/h</p>
                                    </blockquote>
                                </div>
                                <div class="punishment-option fs12 text-info" id="changestats_div">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-usd"></i> Banco
                                                </span>
                                                <input id="playerMoney" class="form-control ui-spinner-input" name="spinner" value="43500"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-usd"></i> Mão
                                                </span>
                                                <input id="playerMoneyBank" class="form-control ui-spinner-input" name="spinner" value="43500"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt10">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    XP
                                                </span>
                                                <input id="playerXP" class="form-control ui-spinner-input" name="spinner" value="133500"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt10">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    Level
                                                </span>
                                                <input id="playerLevel" class="form-control ui-spinner-input" name="spinner" value="34"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="punishment-option fs12 text-info" id="groupremove_div">
                                    <label class="field prepend-icon">
                                        <input type="text" class="gui-input" value="S4RR4 N0V1NH4 N0 GR4U" readonly>
                                        <label for="s" class="field-icon">
                                            <i class="fa fa-users"></i>
                                        </label>
                                    </label>
                                    <blockquote class="blockquote-primary fs12" style="color: #999; margin-top: 23px">
                                        <p>O grupo do jogador, atualmente não é uma facção oficial</p>
                                    </blockquote>
                                </div>
                                <div class="punishment-option fs12 text-info" id="sellpatrimony_div">
                                    Selecione as propriedades a serem removidas da conta do jogador.
                                    <div class="mt10 option-group field section">
                                        <label class="option option-primary">
                                            <input type="checkbox">
                                            <span class="checkbox"></span><span id="livingLabel">Moradia <span id="livingID" class="text-muted fs10">[id: #213]</span>
                                        </label>
                                        <label class="option option-primary">
                                            <input type="checkbox" disabled>
                                            <span class="checkbox"></span><span id="bizzLabel" class="text-muted">Empresa <span id="bizzID" class="text-muted fs10">[id: null]</span>
                                        </label>
                                    </div>
                                    <hr style="margin-top: 2%; margin-bottom: 2%">
                                    <div class="option-group field section">
                                        <label class="option option-primary">
                                            <input type="checkbox">
                                            <span class="checkbox"></span><span id="veh1Label">Veículo 1 <span id="veh1ID" class="text-muted fs10">[id: #213]</span>
                                        </label>
                                        <label class="option option-primary">
                                            <input type="checkbox">
                                            <span class="checkbox"></span><span id="veh2Label">Veículo 2 <span id="veh2ID" class="text-muted fs10">[id: #213]</span>
                                        </label>
                                        <label class="option option-primary">
                                            <input type="checkbox">
                                            <span class="checkbox"></span><span id="veh3Label">Veículo 3 <span id="veh3ID" class="text-muted fs10">[id: #213]</span>
                                        </label>
                                        <label class="mt15 option option-primary">
                                            <input type="checkbox">
                                            <span class="checkbox"></span><span id="veh4Label">Veículo 4 <span id="veh4ID" class="text-muted fs10">[id: #213]</span>
                                        </label>
                                        <label class="mt15 option option-primary">
                                            <input type="checkbox" disabled>
                                            <span class="checkbox"></span><span id="veh5Label" class="text-muted">Veículo 5 <span id="veh5ID" class="text-muted fs10">[id: null]</span>
                                        </label>
                                        <label class="mt15 option option-primary" style="margin-left: 5px">
                                            <input type="checkbox" disabled>
                                            <span class="checkbox"></span><span id="veh6Label" class="text-muted">Veículo 6 <span id="veh6ID" class="text-muted fs10">[id: null]</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="punishment-option fs12 text-info" id="resetpatrimony_div">
                                    Ao resetar o patrimônio, casas, veículos, apartamentos, empresas do jogador, serão colocadas a venda.
                                    <br /><br />
                                    <span class="text-danger"><strong>Atenção!</strong> Não há como reverter essa operação.<span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form method="POST" action="{{ url("denuncia/deny/$report->id") }}" id="indeferir-form">
                        {{ csrf_field() }}
                        <div id="deny_complaint_div" class="animated fadeInUp mt30">
                            <div class="section-divider">
                                <span style="color: #4a89dc;">Negar Denúncia</span>
                            </div>
                            <h6 class="text-center">
                                Selecione abaixo o motivo do indeferimento da denúncia
                            </h6>
                            <div class="section row mt20">
                                <div class="col-md-6">
                                    <label class="field select">
                                        <select id="overrule" name="select_reason">
                                            <option selected="" value="null">Selecione...</option>
                                            <option value="no_evidence">Evidências insuficientes</option>
                                            <option value="already_punished">Usuário já punido</option>
                                            <option value="other">Outro...</option>
                                        </select>
                                        <i class="arrow"></i>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <div class="overrule-option fs12" id="other_div">
                                        <input type="text" id="reason_deny" name="text_reason" class="gui-input" placeholder="Motivo do indeferimento" maxlength="70" required>
                                    </div>
                                    <div class="overrule-option fs12" id="noevidence_div">
                                        <blockquote class="blockquote-primary fs12" style="color: #999">
                                            <p>Utilize este motivo quando você verificar que não há provas concretas de que o jogador denunciado está errado</p>
                                        </blockquote>
                                    </div>
                                    <div class="overrule-option fs12" id="already_punished_div">
                                        <blockquote class="blockquote-primary fs12" style="color: #999">
                                            <p>Utilize este motivo quando o jogador denunciado já foi punido por este mesmo motivo recentemente.</p>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer text-right p7 mt0 pt0">
                    <div class="actions btn-group">
                        <a href="#" id="accept-button" class="btn btn-sm btn-success btn-gradient dark"><i class="fa fa-check"></i> Deferir</a>
                        <a href="#" id="deny-button" class="btn btn-sm btn-danger btn-gradient dark"><i class="fa fa-times"></i> Indeferir</a>
                        <a href="#" id="delete" class="btn btn-sm btn-gradient dark"><i class="fa fa-trash"></i> Deletar</a>
                    </div>
                </div>
                <form method="POST" action="{{ url("denuncia/$report->id") }}" id="delete-form">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
<!--                                                                        -->
@section('scripts')
<script src="{{ URL::asset('vendor/plugins/maxlength/bootstrap-maxlength.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/custom_complaint.js') }}"></script>

<script src="{{ URL::asset('vendor/plugins/markdown/markdown.js') }}"></script>
<script src="{{ URL::asset('vendor/plugins/markdown/to-markdown.js') }}"></script>
<script src="{{ URL::asset('vendor/plugins/markdown/bootstrap-markdown.js') }}"></script>

<script src="{{ URL::asset('vendor/plugins/sweetalert/sweetalert.min.js') }}"></script>

<script type="text/javascript">
    jQuery(document).ready(function() {
        var html = $('#report-content').html();
        var preview = markdown.toHTML(html);
        $('#report-content').html(preview);

        $('#delete').on('click', function(e) {
            swal({
                title: "Você tem certeza?",
                text: "Deseja mesmo deletar essa denúncia? Essa ação não tem volta.",
                showCancelButton: true,
                confirmButtonText: "Sim, delete!",
                type: "warning"
            }, function() {
                $('#delete-form').submit();
            });
            e.preventDefault();
        });

        $('#deny-button').on('click', function(e) {
            $('#indeferir-form').submit();
            e.preventDefault();
        });

        $("#playerMoney").spinner({
            min: 100,
            max: 43500,
            step: 100,
            start: 43500,
        });

        $("#playerMoneyBank").spinner({
            min: 100,
            max: 43500,
            step: 100,
            start: 43500,
        });

        $("#playerXP").spinner({
            min: 0,
            max: 235342,
            step: 100,
            start: 235342,
        });

        $("#playerLevel").spinner({
            min: 1,
            max: 34,
            step: 1,
            start: 34,
        });

        // Init Bootstrap Maxlength Plugin
        $('input[maxlength]').maxlength({
            threshold: 70,
            placement: "bottom"
        });
    });
</script>
@endsection
