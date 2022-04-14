<ul class="nav navbar-nav ml-auto">
    <li class="nav-item dropdown">
        <a class="nav-link nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <img class="img-avatar" src="{{ asset('admin/img/avatars/avatar.jpg') }}" alt="">
            <div>{{auth()->user()->name}}</div>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-header text-center">
                <strong>Settings</strong>
            </div>
            <a class="dropdown-item" href="#">
                <i class="fa fa-user"></i> Profile</a>
            <form id="frm-logout" action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-label btn-label-brand btn-sm btn-bold">Logout</button>
            </form>
        </div>
    </li>
</ul>