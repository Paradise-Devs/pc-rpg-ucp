<header class="navbar navbar-fixed-top navbar-shadow bg-primary">
    <div class="navbar-branding dark bg-primary">
        <a class="navbar-brand" href="{{ url('/') }}">
        <b>PC</b>RPG
        </a>
        <span id="toggle_sidemenu_l" class="ad ad-lines"></span>
    </div>
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown menu-merge">
            <div class="navbar-btn btn-group">
                <button data-toggle="dropdown" class="btn btn-sm dropdown-toggle">
                    <span class="fa fa-bell-o fs14 va-m"></span>
                </button>
                <div class="dropdown-menu dropdown-persist w350" role="menu">
                    <div class="panel mbn">
                        <div class="panel-menu">
                            <div class="btn-group btn-group-justified btn-group-nav" role="tablist">
                                <a href="#nav-tab1" data-toggle="tab" class="btn btn-default btn-sm active">Notificações</a>
                                <a href="#nav-tab2" data-toggle="tab" class="btn btn-default btn-sm">Mensagens</a>
                                @can('admin')
                                    <a href="#nav-tab3" data-toggle="tab" class="btn btn-default btn-sm">Admin</a>
                                @endcan
                            </div>
                        </div>
                        <div class="panel-body panel-scroller scroller-navbar pn">
                            <div class="tab-content br-n pn">
                                <div id="nav-tab1" class="tab-pane alerts-widget active" role="tabpanel">
                                    <div class="media">
                                        <div class="media-left">
                                            <span class="fa fa-support text-success"></span>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="media-heading"><a href="#">Você não possui notificações.</a></h5>
                                        </div>
                                    </div>
                                </div>
                                <div id="nav-tab2" class="tab-pane alerts-widget" role="tabpanel">
                                    <div class="media">
                                        <div class="media-left">
                                            <span class="fa fa-support text-success"></span>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="media-heading"><a href="#">Você não possui mensagens.</a></h5>
                                        </div>
                                    </div>
                                </div>
                                @can('admin')
                                <div id="nav-tab3" class="tab-pane alerts-widget" role="tabpanel">
                                    <div class="media">
                                        <div class="media-left">
                                            <span class="fa fa-support text-success"></span>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="media-heading"><a href="#">Não há notificações pendentes.</a></h5>
                                        </div>
                                    </div>
                                </div>
                                @endcan
                            </div>
                        </div>
                        {{--<div class="panel-footer text-center p7">
                            <a href="#" class="link-unstyled"> Limpar </a>
                        </div>--}}
                    </div>
                </div>
            </div>
        </li>
        <li class="menu-divider hidden-xs">
            <i class="fa fa-circle"></i>
        </li>
        <li class="dropdown menu-merge">
            <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown">
                <img src="{{ URL::asset('uploads/avatars/' . $user->avatar_url) }}" alt="avatar" class="mw30 br64" />
                <span class="hidden-xs pl15"> {{ $user->name }} </span>
                <span class="caret caret-tp hidden-xs"></span>
            </a>
            <ul class="dropdown-menu list-group dropdown-persist w250" role="menu">
                <li class="list-group-item">
                    <a href="{{ url('/message') }}">
                    <span class="fa fa-envelope"></span> Mensagens
                    <span class="label label-warning">2</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="{{ url('/perfil/'.$user->id) }}">
                    <span class="fa fa-user"></span> Meu Perfil </a>
                </li>
                <li class="list-group-item">
                    <a href="{{ url('/perfil/configuracoes') }}">
                    <span class="fa fa-gear"></span> Config. Conta </a>
                </li>
                <li class="dropdown-footer">
                    <a href="{{ url('/logout') }}" class="">
                    <span class="fa fa-power-off pr5"></span> Deslogar </a>
                </li>
            </ul>
        </li>
    </ul>
</header>
