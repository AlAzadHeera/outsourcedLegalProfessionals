<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{ asset('backend/img/sidebar-1.jpg') }}">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="http://outsourcedlegalprofessionals.com" class="simple-text logo-normal">
            <img src="{{asset('backend/img/logo.png')}}" class="img-responsive" alt="logo.png" style="width: 150px; height: 60px;">
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{ Request::is('admin/home') ? ' active' : '' }}  ">
                <a class="nav-link" href="{{route('home')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('admin/generalUser') ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('users') }}">
                    <i class="material-icons">person</i>
                    <p>Registered Users</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('admin/shareFile') ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('shareFile.index') }}">
                    <i class="material-icons">folder</i>
                    <p>Files</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('admin/UserMessage') ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('UserMessage.index') }}">
                    <i class="material-icons">message</i>
                    <p>Messages</p>
                </a>
            </li>
        </ul>
    </div>
</div>
