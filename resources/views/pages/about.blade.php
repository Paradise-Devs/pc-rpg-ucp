<!DOCTYPE html>
<html>
    <head>
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <title>PC:RPG</title>
        <meta name="keywords" content="RPG Paradise City SAMP SA:MP GTA San Andreas" />
        <meta name="description" content="Paradise City RPG - SA:MP Server">
        <meta name="author" content="Paradise City RPG">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="theme-color" content="‪#009dc7">

        <!-- Stylesheets -->
        <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/skin/default_skin/css/theme.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/admin-tools/admin-forms/css/admin-forms.css') }}">

        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/skin/default_skin/css/custom.css') }}">

        <!-- Favicon -->
        <link rel="shortcut icon" href="assets/img/favicon.ico">
    </head>
    <body class="external-page about-page sb-l-c sb-r-c">
        <br />
        <div id="main about-page" class="animated fadeIn">
            <div class="about-page-content">
                <h1 class="about-page-title">Bem vindo ao Paradise City RPG!</h1>
                <hr class="alt mt20 mb20">
                Paradise City RPG é um servidor de San Andreas Multiplayer que vem sendo desenvolvido desde 2014 e tem como objetivo trazer uma nova experiência para os jogadores que desejam interagir com outros em um ambiente inspirado na vida real.
                <br /><br />
                Nosso objetivo é sempre trazer novidades e atualizações para o servidor baseado no feedback de nossos jogadores, o Paradise City funciona da mesma forma que os jogos em fase beta da Steam, nós estamos sempre abertos a sugestões para melhorar cada vez mais a sua experiência.<br /><br />
                Paradise City é um servidor sem fins lucrativos, qualquer possível transação feita dentro do mesmo será revertido para a infraestrutura do servidor.
            </div>
            <!-- End: Content -->
        </div>
        <!-- Begin: Page Footer -->
        <footer id="auth-footer" class="affix" style="z-index: 1">
            <div class="row">
                <div class="col-md-4">
                    <span class="footer-since">DESDE <b>2012</b></span>
                    <span class="footer-separator">|</span>
                    <a href="#" class="link-unstyled">PARADISE DEVS</a>
                    <span class="footer-separator">|</span>
                    <span class="footer-poweredby">FEITO COM <a href="#" class="link-unstyled"><i class="fa fa-gitlab ml5 mr5"></i></a> E <i class="fa fa-heart-o ml5 mr5 text-danger"></i></span>
                </div>
                <div class="col-md-4 text-center">
                    <a href="{{ url('/') }}" class="link-unstyled ml10 mr10"><i class="fa fa-angle-double-left mr5"></i> VOLTAR AO INÍCIO</a>
                    <span class="footer-separator">•</span>
                    <a href="https://discord.gg/hpvRGZe" class="link-unstyled ml10 mr10"><i class="fa fa-comments-o mr5"></i> DISCORD</a>
                    <span class="footer-separator">•</span>
                    <a href="{{ url('/dashboard') }}" class="link-unstyled ml10 mr10"><i class="fa fa-cogs mr5"></i> UCP</a>
                </div>
                @if(Auth::check())
                    <div class="col-md-4 text-right">
                        <a href="{{ url('/perfil/' . Auth::user()->id) }}" class="dropdown-toggle p10 link-unstyled" data-toggle="dropdown" aria-expanded="true">
                            <img src="{{ URL::asset('storage/avatars/' . Auth::user()->avatar_url) }}" alt="avatar" class="br64" style="width: 25px;"/>
                            <span class="hidden-xs pl10">{{ Auth::user()->name }}</span>
                        </a>
                        <span class="footer-separator">|</span>
                        <a href="{{ url('/message') }}"><i class="fa fa-envelope text-muted ml15" data-toggle="tooltip" data-placement="top" title="Mensagens"></i></a>
                        <a href="{{ url('/perfil/amigos/' . Auth::user()->id) }}"><i class="fa fa-group text-muted ml15" data-toggle="tooltip" data-placement="top" title="Amigos"></i></a>
                        <a href="{{ url('/ticket') }}"><i class="fa fa-support text-info ml15 mr15" data-toggle="tooltip" data-placement="top" title="Suporte"></i></a>
                        <span class="footer-separator">|</span>
                        <a href="{{ url('/logout') }}"><i class="fa fa-sign-out ml15 text-danger" data-toggle="tooltip" data-placement="top" title="Sair"></i></a>
                    </div>
                @else
                    <div class="col-md-4 text-right">
                        <a href="{{ url('/login') }}" class="link-unstyled">LOGIN</a>
                        <span class="footer-separator">•</span>
                        <a href="{{ url('/register') }}" class="link-unstyled">REGISTRO</a>
                    </div>
                @endif
            </div>
        </footer>
        <audio src="{{ URL::asset('assets/audio/bridges.mp3') }}" loop autoplay></audio>
        <script src="{{ URL::asset('vendor/jquery/jquery-1.11.1.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/utility/utility.js') }}"></script>
        <script src="{{ URL::asset('assets/js/demo/demo.js') }}"></script>
        <script src="https://use.fontawesome.com/748a1b45e6.js"></script>
        <script src="{{ URL::asset('assets/js/main.js') }}"></script>
        <script type="text/javascript">
            jQuery(document).ready(function() {
              "use strict";
              Core.init();
              Demo.init();
            });
        </script>
    </body>
</html>
