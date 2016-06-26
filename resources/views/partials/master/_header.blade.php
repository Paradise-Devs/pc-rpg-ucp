<header class="navbar navbar-fixed-top navbar-shadow bg-primary">
    <div class="navbar-branding dark bg-primary">
        <a class="navbar-brand" href="dashboard.html">
        <b>PC</b>RPG
        </a>
        <span id="toggle_sidemenu_l" class="ad ad-lines"></span>
    </div>
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown menu-merge">
            <div class="navbar-btn btn-group">
                <button data-toggle="dropdown" class="btn btn-sm dropdown-toggle">
                    <span class="fa fa-bell-o fs14 va-m"></span>
                    <span class="badge">5</span>
                </button>
                <div class="dropdown-menu dropdown-persist w350 animated animated-shorter fadeIn" role="menu">
                    <div class="panel mbn">
                        <div class="panel-menu">
                            <div class="btn-group btn-group-justified btn-group-nav" role="tablist">
                                <a href="#nav-tab1" data-toggle="tab" class="btn btn-default btn-sm active">Notificações</a>
                                <a href="#nav-tab2" data-toggle="tab" class="btn btn-default btn-sm br-l-n br-r-n">Mensagens</a>
                                <a href="#nav-tab3" data-toggle="tab" class="btn btn-default btn-sm">Atividade</a>
                            </div>
                        </div>
                        <div class="panel-body panel-scroller scroller-navbar pn">
                            <div class="tab-content br-n pn">
                                <div id="nav-tab1" class="tab-pane active" role="tabpanel">
                                    <div class="media">
                                        <a class="media-left" href="#"> <img src="{{ URL::asset('assets/img/avatars/5.jpg') }}" class="mw40" alt="avatar"> </a>
                                        <div class="media-body">
                                            <h5 class="media-heading">Article
                                                <small class="text-muted">- 08/16/22</small>
                                            </h5>
                                            Last Updated 36 days ago by
                                            <a class="text-system" href="#"> Max </a>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <a class="media-left" href="#"> <img src="{{ URL::asset('assets/img/avatars/5.jpg') }}" class="mw40" alt="avatar"> </a>
                                        <div class="media-body">
                                            <h5 class="media-heading">Article
                                                <small class="text-muted">- 08/16/22</small>
                                            </h5>
                                            Last Updated 36 days ago by
                                            <a class="text-system" href="#"> Max </a>
                                        </div>
                                    </div>
                                </div>
                                <div id="nav-tab3" class="tab-pane" role="tabpanel">
                                    <h2> Tab 3...</h2>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer text-center p7">
                            <a href="#" class="link-unstyled"> Ver todas </a>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li class="menu-divider hidden-xs">
            <i class="fa fa-circle"></i>
        </li>
        <li class="dropdown menu-merge">
            <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown">
                <img src="{{ URL::asset('uploads/avatars/' . Auth::user()->avatar_url) }}" alt="avatar" class="mw30 br64" />
                <span class="hidden-xs pl15"> {{ Auth::user()->name }} </span>
                <span class="caret caret-tp hidden-xs"></span>
            </a>
            <ul class="dropdown-menu list-group dropdown-persist w250" role="menu">
                <li class="list-group-item">
                    <a href="#">
                    <span class="fa fa-envelope"></span> Mensagens
                    <span class="label label-warning">2</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="#">
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
