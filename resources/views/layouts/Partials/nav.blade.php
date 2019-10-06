<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">Dashboard</a>
            <a class="navbar-brand" href="{{route('logout')}}" onclick="event.preventDefault();getElementById('logoutForm').submit();"><form id="logoutForm" action="{{route('logout')}}" method="post" style="display:none">
                    @csrf
                </form>Logout</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">person</i>
                        <p class="d-lg-none d-md-block">
                            Account
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                        <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();getElementById('logoutForm').submit();">
                            <form id="logoutForm" action="{{route('logout')}}" method="post" style="display:none">
                                @csrf
                            </form>Log out</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if(auth()->user()->unreadNotifications->count() > 0)
                            <i class="material-icons">notifications</i>
                            <span id="count" class="notification">{{auth()->user()->unreadNotifications->count()}}</span>
                            <p class="d-lg-none d-md-block">
                                Some Actions
                            </p>
                        @else
                            <i class="material-icons">notifications</i>
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        @if(auth()->user()->unreadNotifications->count() > 0)
                            <a href="#" id="markRead" class="dropdown-item btn btn-cta" style="color:;">Mark All As Checked</a>
                            <a class="dropdown-item" href="#">{{ auth()->user()->unreadNotifications->count() }} New Message(s)/File(s)</a>
                            <small class="dropdown-item">Check Files/Inbox</small>
                        @else
                            <a class="dropdown-item" href="#">No New Message(s)/File(s)</a>
                        @endif
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>


