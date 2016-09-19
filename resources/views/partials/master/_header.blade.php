<header class="navbar navbar-fixed-top navbar-shadow bg-primary">
    <div class="navbar-branding dark bg-primary">
        <a class="navbar-brand" href="{{ url('/dashboard') }}">
        <b>PC</b>RPG
        </a>
        <span id="toggle_sidemenu_l" class="ad ad-lines"></span>
    </div>
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown menu-merge">
            <div class="navbar-btn btn-group">
                <button data-toggle="dropdown" class="btn btn-sm dropdown-toggle">
                    <span class="fa fa-bell-o fs14 va-m"></span>
                    @if(count($notifications) > 0)
                        <span class="badge">{{ count($notifications) }}</span>
                    @endif
                </button>
                <div class="dropdown-menu dropdown-persist w350" role="menu">
                    <div class="panel mbn">
                        <div class="panel-menu">
                            <div class="btn-group btn-group-justified btn-group-nav" role="tablist">
                                <a href="#nav-tab1" data-toggle="tab" class="btn btn-default btn-sm active">
                                    Notificações
                                    @if(count($notifications) - $unreadMessages > 0)
                                        <span class="label badge-default">{{ count($notifications) - $unreadMessages }}</span>
                                    @endif
                                </a>
                                <a href="#nav-tab2" data-toggle="tab" class="btn btn-default btn-sm">
                                    Mensagens
                                    @if($unreadMessages > 0)
                                        <span class="label badge-default">{{ $unreadMessages }}</span>
                                    @endif
                                </a>
                                @can('admin')
                                    <a href="#nav-tab3" data-toggle="tab" class="btn btn-default btn-sm">Admin</a>
                                @endcan
                            </div>
                        </div>
                        <div class="panel-body panel-scroller scroller-navbar pn">
                            <div class="tab-content br-n pn">
                                <div id="nav-tab1" class="tab-pane alerts-widget active" role="tabpanel">
                                    @if(count($notifications) - $unreadMessages > 0)
                                        @foreach ($notifications as $notification)
                                            @if($notification->type == "FriendRequest" && $notification->hasValidObject())
                                                <div class="media">
                                                    <div class="media-left">
                                                        <span class="glyphicon glyphicon-user text-default"></span>
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="media-heading">Solicitação de amizade</h5>
                                                        <a href="{{ url('/perfil/'.$notification->getObject()->id) }}">{{ $notification->getObject()->username }}</a> - {{ App\Utils::timeElapsedString($notification->getObject()->created_at) }}
                                                    </div>
                                                    <div class="media-right">
                                                        <div class="media-response"> Aceitar?</div>
                                                        <div class="btn-group">
                                                            <a href="{{ url('/perfil/amizade/aceitar/'.$notification->getObject()->id) }}" class="btn btn-default btn-xs light">
                                                                <i class="fa fa-check text-success"></i>
                                                            </a>
                                                            <a href="{{ url('/perfil/amizade/recusar/'.$notification->getObject()->id) }}" class="btn btn-default btn-xs light">
                                                                <i class="fa fa-remove"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @else
                                        <div class="media text-center">Nenhuma notificação no momento</div>
                                    @endif
                                </div>
                                @if($unreadMessages > 0)
                                    <div id="nav-tab2" class="tab-pane chat-widget" role="tabpanel">
                                        @foreach ($notifications as $notification)
                                            @if($notification->type == "Message" && $notification->hasValidObject())
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="{{ url('/perfil/'.$notification->getObject()->creator->id) }}">
                                                            <img class="media-object" alt="64x64" src="{{ URL::asset('storage/avatars/' . $notification->getObject()->creator->avatar_url) }}">
                                                        </a>
                                                    </div>
                                                    <a href="{{ url('/message/'.$notification->getObject()->id) }}" class="media-body link-unstyled">
                                                        <span class="media-status online"></span>
                                                        <h5 class="media-heading">
                                                            {{ $notification->getObject()->creator->username }}
                                                            <small> - {{ App\Utils::timeElapsedString($notification->created_at) }}</small>
                                                        </h5>
                                                        <span class="text-muted" style="color: #999">
                                                            @if(strlen(strip_tags($notification->getObject()->content)) > 70)
                                                                {{ substr(strip_tags($notification->getObject()->content), 70, strlen(strip_tags($notification->getObject()->content))) }}...
                                                            @else
                                                                {{ strip_tags($notification->getObject()->content) }}
                                                            @endif
                                                        </span>
                                                    </a>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                @else
                                    <div id="nav-tab2" class="tab-pane alerts-widget" role="tabpanel">
                                        <div class="media text-center">Nenhuma mensagem nova no momento</div>
                                    </div>
                                @endif
                                @can('admin')
                                <div id="nav-tab3" class="tab-pane alerts-widget" role="tabpanel">
                                    <div class="media text-center">Nenhuma notificação no momento</div>
                                </div>
                                @endcan
                            </div>
                        </div>
                        <div class="panel-footer text-center p7">
                            <a href="{{ url('/clearnotifications') }}" class="link-unstyled"> Limpar </a>
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
                <img src="{{ URL::asset('storage/avatars/' . Auth::user()->avatar_url) }}" alt="avatar" class="mw30 br64" />
                <span class="hidden-xs pl15"> {{ Auth::user()->name }} </span>
                <span class="caret caret-tp hidden-xs"></span>
            </a>
            <ul class="dropdown-menu list-group dropdown-persist w250" role="menu">
                <li class="list-group-item">
                    <a href="{{ url('/message') }}">
                    <span class="fa fa-envelope"></span> Mensagens
                    @if($unreadMessages > 0)
                        <span class="label badge-warning">{{ $unreadMessages }}</span>
                    @endif
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="{{ url('/perfil/'.Auth::user()->id) }}">
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
