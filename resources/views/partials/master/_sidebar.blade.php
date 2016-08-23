<aside id="sidebar_left" class="nano nano-light affix sidebar-light">
    <!-- Start: Sidebar Left Content -->
    <div class="sidebar-left-content nano-content">
        <!-- Start: Sidebar Header -->
        <header class="sidebar-header">
            <!-- Sidebar Widget - Author -->
            <div class="sidebar-widget author-widget">
                <div class="media">
                    <a class="media-left" href="#">
                        <img src="{{ URL::asset('uploads/avatars/' . Auth::user()->avatar_url) }}" class="img-responsive">
                    </a>
                    <div class="media-body">
                        <div class="media-author">{{ Auth::user()->name }}</div>
                        <div class="media-links" style="color: #17AE48">Developer</div>
                    </div>
                </div>
            </div>
            <!-- Sidebar Widget - Search -->
            <div class="sidebar-widget search-widget">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-search"></i>
                    </span>
                    <input type="text" id="sidebar-search" class="form-control" placeholder="Procurar...">
                </div>
            </div>
        </header>
        <!-- End: Sidebar Header -->
        <!-- Start: Sidebar Menu -->
        <ul class="nav sidebar-menu">
            <li class="sidebar-label pt20">Início</li>
            <li>
                <a href="/">
                    <span class="glyphicon glyphicon-home"></span>
                    <span class="sidebar-title">Início</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="glyphicon glyphicon-shopping-cart"></span>
                    <span class="sidebar-title">Loja</span>
                </a>
            </li>
            <!-- Sidebar: Patrimônio -->
            <li class="sidebar-label pt15">Patrimônio</li>
            <li>
                <a class="accordion-toggle" href="#">
                    <span class="glyphicon glyphicon-plane"></span>
                    <span class="sidebar-title">Transporte</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li>
                        <a href="#">
                            <span class="fa fa-car"></span>
                            Terrestre <span class="label label-xs bg-primary">0/6</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="fa fa-fighter-jet"></span>
                            Aéreo <span class="label label-xs bg-primary">0/1</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="fa fa-ship"></span>
                            Marítimo <span class="label label-xs bg-primary">0/1</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="accordion-toggle" href="#">
                    <span class="fa fa-building"></span>
                    <span class="sidebar-title">Propriedades</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li>
                        <a href="#">
                            <span class="fa fa-home"></span>
                            Moradia <span class="label label-xs bg-primary">0/1</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="fa fa-briefcase"></span>
                            Empresa <span class="label label-xs bg-primary">0/0</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <span class="fa fa-laptop"></span>
                    <span class="sidebar-title">Mobília</span>
                </a>
            </li>
            <!-- Sidebar: Social -->
            <li class="sidebar-label pt15">Social</li>
            <li>
                <a href="{{ url('/jogadores') }}">
                    <span class="fa fa-gamepad"></span>
                    <span class="sidebar-title">Jogadores</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="fa fa-institution"></span>
                    <span class="sidebar-title">Emprego</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="fa fa-group"></span>
                    <span class="sidebar-title">Grupos</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="fa fa-list"></span>
                    <span class="sidebar-title">Ranking</span>
                </a>
            </li>
            <li>
                <a href="/punicoes">
                    <span class="fa fa-eye"></span>
                    <span class="sidebar-title">Punições</span>
                </a>
            </li>
            <!-- Sidebar: Suporte -->
            <li class="sidebar-label pt20">Suporte</li>
            <li>
                <a href="/ticket">
                    <span class="fa fa-question"></span>
                    <span class="sidebar-title">Tickets</span>
                </a>
            </li>
            <li>
                <a href="/denuncias">
                    <span class="fa fa-flag"></span>
                    <span class="sidebar-title">Denúncias</span>
                </a>
            </li>
            <li>
                <a href="/faq">
                    <span class="fa fa-info"></span>
                    <span class="sidebar-title">FAQ</span>
                </a>
            </li>
            <!-- Sidebar: Char Status -->
            <li class="sidebar-label pt25 pb10">Status</li>
            <li class="sidebar-stat">
                <a href="#projectOne" class="fs11">
                    <span class="fa fa-inbox text-info"></span>
                    <span class="sidebar-title text-muted">XP (Personagem)</span>
                    <span class="pull-right mr20 text-muted">35%</span>
                    <div class="progress progress-bar-xs mh20 mb10">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 35%">
                            <span class="sr-only">35% completo</span>
                        </div>
                    </div>
                </a>
            </li>
            <li class="sidebar-stat">
                <a href="#projectOne" class="fs11">
                    <span class="fa fa-dropbox text-warning"></span>
                    <span class="sidebar-title text-muted">XP (Emprego)</span>
                    <span class="pull-right mr20 text-muted">62%</span>
                    <div class="progress progress-bar-xs mh20">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 62%">
                            <span class="sr-only">62% completo</span>
                        </div>
                    </div>
                </a>
            </li>
        </ul>
        <!-- End: Sidebar Left Menu -->
    </div>
    <!-- End: Sidebar Left Content -->
</aside>
