<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{url('/inventari')}}">
            <img src="public/assets/logo_img_red.png" alt="logoWeb" id="logo">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        @if( Auth::check() )
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ Request::is('inventari') && ! Request::is('catalog/create')? 'active' : ''}}">
                        <a class="nav-link p-4" href="{{url('/inventari')}}">Inventari</a>
                    </li>
                </ul>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ Request::is('treballs') ? 'active' : ''}}">
                        <a class="nav-link p-4" href="{{url('/treballs')}}">Tasques</a>
                    </li>
                </ul>
                @if( Auth::user()->id_rol == 1)
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ Request::is('users') ? 'active' : ''}}">
                        <a class="nav-link p-4" href="{{url('/users')}}">Usuaris</a>
                    </li>
                </ul>
                @endif
                <ul class="navbar-nav navbar-right">
                    <li class="nav-item"  style="margin-top:12px; margin-left:5px;">
                        <a class="p-4" href="{{ url('/users/show/'. Auth::user()->id) }}" id="actualUser" style="display:inline;cursor:pointer">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            {{Auth::user()->nom}}
                        </a>
                        <form action="{{ url('/logout') }}" method="POST" style="display:inline">
                            {{ csrf_field() }}
                            <button type="submit" id="logout" class="btn btn-link nav-link" style="display:inline;cursor:pointer">
                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        @endif
            
    </div>
</nav>
