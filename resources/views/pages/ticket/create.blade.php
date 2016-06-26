@extends('layouts.master')
<!--                                                                        -->
@section('title', '| Criar ticket')
<!--                                                                        -->
@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/admin-tools/admin-forms/css/admin-forms.css') }}">
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
            <li class="crumb-trail">Criar Ticket</li>
        </ol>
    </div>
</header>
@endsection
<!--                                                                        -->
@section('content')
<div class="row">
    <div class="col-md-12">
        <form>
            <div class="admin-form theme-primary">
                <div class="panel panel-primary heading-border">
                    <div class="panel-heading">
                        <span class="panel-title"><i class="fa fa-support"></i>Criando Ticket</span>
                    </div>
                    <!-- end .panel-heading section -->
                    <textarea id="markdown-editor" name="content" data-language="pt" rows="10" placeholder="Diga-nos, qual o problema que estas enfrentando?"></textarea>
                    <div class="section-divider mb40" id="spy1">
                        <span style="color: #4a89dc;">Título & Categoria</span>
                    </div>
                    <div class="panel-body" style="padding-top: 1px">
                        <div class="section row">
                            <div class="col-md-6">
                                <label for="title" class="field">
                                    <input type="text" name="title" id="title" class="gui-input" maxlength="70" placeholder="Título" required>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label class="field select">
                                    <select id="category">
                                        <option value="default" selected>Selecione a Categoria...
                                        </option><optgroup label="Conta">
                                            <!-- Grupo 1 -->
                                            <option>Roubaram minha conta</option>
                                            <option>Problemas com propriedades</option>
                                            <!-- Grupo 2 -->
                                            <option>Solicitação de reset de conta</option>
                                            <!-- Grupo 3 -->
                                            <option>Outro...</option>
                                        </optgroup>
                                        <optgroup label="Grupos &amp; Facções">
                                            <!-- Grupo 1 -->
                                            <!-- Grupo 2 -->
                                            <option>Líder inativo</option>
                                            <option>Abuso de poder</option>
                                            <!-- Grupo 3 -->
                                            <option>Outro...</option>
                                        </optgroup>
                                        <optgroup label="Painel de Controle">
                                            <!-- Grupo 1 -->
                                            <option>Encontrei um bug/glitch/falha</option>
                                            <!-- Grupo 2 -->
                                            <option>Tenho uma sugestão</option>
                                            <!-- Grupo 3 -->
                                            <option>Outro...</option>
                                        </optgroup>
                                        <optgroup label="Fórum">
                                            <!-- Grupo 1 -->
                                            <!-- Grupo 2 -->
                                            <option>Problemas com a conta</option>
                                            <option>Página inválida</option>
                                            <!-- Grupo 3 -->
                                            <option>Outro...</option>
                                        </optgroup>
                                        <optgroup label="Loja">
                                            <!-- Grupo 1 -->
                                            <option>Não recebi minha compra</option>
                                            <option>Solicitação de estorno</option>
                                            <!-- Grupo 2 -->
                                            <option>Valor incorreto</option>
                                            <!-- Grupo 3 -->
                                            <option>Métodos de pagamento</option>

                                            <option>Outro...</option>
                                        </optgroup>
                                        <optgroup label="Servidor">
                                            <!-- Grupo 1 -->
                                            <option>Encontrei um bug/glitch/falha</option>
                                            <!-- Grupo 2 -->
                                            <!-- Grupo 3 -->
                                            <option>Dúvidas sobre PP (Paradise Pass)</option>
                                            <option>Outro...</option>
                                        </optgroup>
                                        <optgroup label="Eventos">
                                            <!-- Grupo 1 -->
                                            <option>Evento programado não aconteceu</option>
                                            <!-- Grupo 2 -->
                                            <option>Não recebi minha recompensa</option>
                                            <!-- Grupo 3 -->
                                            <option>Outro...</option>
                                        </optgroup>
                                        <optgroup label="Suporte">
                                            <!-- Grupo 1 -->
                                            <!-- Grupo 2 -->
                                            <!-- Grupo 3 -->
                                            <option>Dúvidas sobre o jogo</option>
                                            <option>Outro...</option>
                                        </optgroup>
                                        <optgroup label="Administração">
                                            <!-- Grupo 1 -->
                                            <!-- Grupo 2 -->
                                            <!-- Grupo 3 -->
                                            <option>Outro...</option>
                                        </optgroup>
                                        <optgroup label="Outro...">
                                            <!-- Grupo 1 -->
                                            <!-- Grupo 2 -->
                                            <!-- Grupo 3 -->
                                            <option>Outro</option>
                                        </optgroup>
                                    </select>
                                    <i class="arrow"></i>
                                </label>
                                <span class="help-block mt5">
                                    Caso não encontre a categoria que gostaria, utilize a opção "Outro".
                                </span>
                            </div>
                        </div>
                        <!-- end section -->
                    </div>
                    <!-- end .form-body section -->
                    <div class="panel-footer">
                        <div class="btn-group">
                            <a href="#" id="submit_ticket" type="submit" class="btn btn-primary btn-gradient dark btn-blocks">
                                <i class="fa fa-mail-forward"></i> Enviar
                            </a>
                            <a href="/ticket" class="btn btn-default btn-gradient dark btn-blocks">
                                <i class="fa fa-close"></i> Cancelar
                            </a>
                        </div>
                    </div>
                    <!-- end .form-footer section -->
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
<!--                                                                        -->
@section('scripts')
<script src="{{ URL::asset('vendor/plugins/maxlength/bootstrap-maxlength.min.js') }}"></script>

<!-- MarkDown JS -->
<script src="{{ URL::asset('vendor/plugins/markdown/markdown.js') }}"></script>
<script src="{{ URL::asset('vendor/plugins/markdown/to-markdown.js') }}"></script>
<script src="{{ URL::asset('vendor/plugins/markdown/bootstrap-markdown.js') }}"></script>

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

      // Init Bootstrap Maxlength Plugin
      $('input[maxlength]').maxlength({
          threshold: 70,
          placement: "bottom"
      });
</script>
@endsection
