@extends('layouts.master')
<!--                                                                        -->
@section('title', '| Editar ticket')
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
            <li class="crumb-trail"><a href="/ticket/manage">Gerenciar Tickets</a></li>
            <li class="crumb-trail"><a href="#">Ticket #12313213</a></li>
            <li class="crumb-trail">Editar Ticket</li>
        </ol>
    </div>
</header>
@endsection
<!--                                                                        -->
@section('content')
<section id="content" class="animated fadeIn">
  <div class="row">
      <div class="col-md-12">
          <form>
              <div class="admin-form theme-primary">
                  <div class="panel panel-primary heading-border">
                      <div class="panel-heading">
                          <span class="panel-title"><i class="fa fa-support"></i>Criando Ticket</span>
                      </div>
                      <!-- end .panel-heading section -->
                      <textarea id="markdown-editor" name="content" data-language="pt" rows="10">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In consequat tortor ex. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer purus arcu, viverra quis turpis id, faucibus faucibus turpis. Sed at rhoncus nunc. Aliquam non fringilla purus. Curabitur faucibus tellus et efficitur lacinia. Mauris quis ipsum at dolor venenatis fringilla a dapibus sem. Maecenas pulvinar egestas urna, eu pharetra mauris efficitur sed. Nam et mollis velit. Curabitur at metus sollicitudin turpis elementum aliquam. In blandit, urna at convallis suscipit, tortor dui ultricies magna, eget pretium mi lorem et tortor. Suspendisse potenti. Duis mattis arcu in molestie volutpat. Sed scelerisque tristique nisl, sit amet efficitur diam luctus et. Praesent consectetur, nisi nec sodales dignissim, magna sem varius massa, commodo mollis arcu massa in turpis. Nullam scelerisque libero eu ipsum tempor scelerisque.

  Suspendisse at augue odio. Nulla pellentesque, tortor et rutrum consequat, leo lectus interdum eros, vel elementum purus mauris at nunc. Sed tristique blandit neque id gravida. Proin velit turpis, dictum ut purus sit amet, scelerisque pretium neque. Morbi a iaculis sapien. Vivamus lacinia scelerisque accumsan. Integer non rhoncus ipsum, at suscipit dui. Aliquam erat volutpat. Proin non ex lacus.
                      </textarea>
                      <div class="section-divider mb40" id="spy1">
                          <span style="color: #4a89dc;">Título & Categoria</span>
                      </div>
                      <div class="panel-body" style="padding-top: 1px">
                          <div class="section row">
                              <div class="col-md-6">
                                  <label for="title" class="field">
                                      <input type="text" name="title" id="title" class="gui-input" maxlength="70" value="Se bugar de novo, eu tiro ele fora" required>
                                  </label>
                              </div>
                              <div class="col-md-6">
                                  <label class="field select">
                                      <select id="category">
                                          <option value="default">Selecione a Categoria...
                                          </option><optgroup label="Conta">
                                              <!-- Grupo 1 -->
                                              <option>Roubaram minha conta</option>
                                              <option>Problemas com propriedades</option>
                                              <!-- Grupo 2 -->
                                              <option selected>Solicitação de reset de conta</option>
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
                                              <option>Valor abusivo</option>
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
                              <a href="#" id="save_ticket" type="submit" class="btn btn-primary btn-gradient dark btn-blocks">
                                  <i class="fa fa-save"></i> Salvar
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
</section>
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
