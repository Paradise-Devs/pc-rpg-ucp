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
                    @if($new_msg_count > 0 || $pending_fr_count > 0)
                        <span class="badge">{{ $new_msg_count + $pending_fr_count }}</span>
                    @endif
                </button>
                <div class="dropdown-menu dropdown-persist w350" role="menu">
                    <div class="panel mbn">
                        <div class="panel-menu">
                            <div class="btn-group btn-group-justified btn-group-nav" role="tablist">
                                <a href="#nav-tab1" data-toggle="tab" class="btn btn-default btn-sm active">
                                    Notificações
                                    @if($pending_fr_count > 0)
                                        <span class="label badge-default">{{ $pending_fr_count }}</span>
                                    @endif
                                </a>
                                <a href="#nav-tab2" data-toggle="tab" class="btn btn-default btn-sm">
                                    Mensagens
                                    @if($new_msg_count > 0)
                                        <span class="label badge-default">{{ $new_msg_count }}</span>
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
                                    @if($pending_fr_count > 0)
                                        @foreach($user->getFriendRequests() as $request)
                                            <div class="media">
                                                <div class="media-left">
                                                    <span class="glyphicon glyphicon-user text-default"></span>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="media-heading">Solicitação de amizade</h5>
                                                    <a href="{{ url('/perfil/'.$request->sender->id) }}">{{ $request->sender->username }}</a> - {{ App\Utils::timeElapsedString($request->created_at) }}
                                                </div>
                                                <div class="media-right">
                                                    <div class="media-response"> Aceitar?</div>
                                                    <div class="btn-group">
                                                        <a href="{{ url('/perfil/amizade/aceitar/'.$request->sender->id) }}" class="btn btn-default btn-xs light">
                                                            <i class="fa fa-check text-success"></i>
                                                        </a>
                                                        <a href="{{ url('/perfil/amizade/recusar/'.$request->sender->id) }}" class="btn btn-default btn-xs light">
                                                            <i class="fa fa-remove"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="media text-center">Nenhuma notificação no momento</div>
                                    @endif
                                </div>
                                @if($new_msg_count > 0)
                                    <div id="nav-tab2" class="tab-pane chat-widget" role="tabpanel">
                                        @foreach($new_messages as $message)
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="{{ url('/perfil/'.$message->creator->id) }}">
                                                        <img class="media-object" alt="64x64" src="{{ URL::asset('storage/avatars/' . $message->creator->avatar_url) }}">
                                                    </a>
                                                </div>
                                                <a href="{{ url('/message/'.$message->id) }}" class="media-body link-unstyled">
                                                    <span class="media-status online"></span>
                                                    <h5 class="media-heading">
                                                        {{ $message->creator->username }}
                                                        <small> - {{ App\Utils::timeElapsedString($message->created_at) }}</small>
                                                    </h5>
                                                    <span class="text-muted" style="color: #999">
                                                        @if(strlen(strip_tags($message->content)) > 70)
                                                            {{ substr(strip_tags($message->content), 70, strlen(strip_tags($message->content))) }}...
                                                        @else
                                                            {{ strip_tags($message->content) }}
                                                        @endif
                                                    </span>
                                                </a>
                                            </div>
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
                <img src="{{ URL::asset('storage/avatars/' . $user->avatar_url) }}" alt="avatar" class="mw30 br64" />
                <span class="hidden-xs pl15"> {{ $user->name }} </span>
                <span class="caret caret-tp hidden-xs"></span>
            </a>
            <ul class="dropdown-menu list-group dropdown-persist w250" role="menu">
                <li class="list-group-item">
                    <a href="{{ url('/message') }}">
                    <span class="fa fa-envelope"></span> Mensagens
                    @if($new_msg_count > 0)
                        <span class="label badge-warning">{{ $new_msg_count }}</span>
                    @endif
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
