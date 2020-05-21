<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{url('/inventari')}}" style="color:#777"><b>G Junk Yard</b></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        @if( Auth::check() )
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ Request::is('inventari') && ! Request::is('inventari/create')? 'active' : ''}}">
                        <a class="nav-link" href="{{url('/inventari')}}">
                            <span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>
                            Inventari
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ Request::is('inventari') && ! Request::is('inventari/create')? 'active' : ''}}">
                        <a class="nav-link" href="{{url('/treballs')}}">
                            <span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
                            Tasques
                        </a>
                    </li>
                </ul>
                @if( Auth::user()->id_rol == 1)
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ Request::is('inventari') && ! Request::is('inventari/create')? 'active' : ''}}">
                        <a class="nav-link" href="{{url('/users')}}">
                            <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
                            Usuaris
                        </a>
                    </li>
                </ul>
                @endif
                <ul class="navbar-nav navbar-right">
                    <li class="nav-item"  style="margin-top:12px; margin-left:5px;">
                        <a href="{{ url('/users/show/'. Auth::user()->id) }}" style="display:inline;cursor:pointer">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            {{Auth::user()->nom}}
                        </a>
                    </li>
                    <li class="nav-item"  style="margin-top:5px; margin-left:5px;">
                        <form action="{{ url('/logout') }}" method="POST" style="display:inline">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-link nav-link" style="display:inline;cursor:pointer">
                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        @endif
            
    </div>
</nav>
