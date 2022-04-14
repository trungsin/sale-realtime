<nav class="sidebar-nav">
    <ul class="nav">
        @foreach(config('menuconfig') as $key => $item)
            @if(in_array('User', $item['roles']))
                @isset($item['sub_menu'])
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="{{$item['url']!='#' ? route($item['url']) : "#" }}">
                            <i class="nav-icon {{$item['icon']}}"></i> {{$key}}
                        </a>
                        @foreach($item['sub_menu'] as $keySub => $subItem)
                            @if(in_array(Auth::user()->roles()->pluck('name')->pop(), $subItem['roles']))
                                <ul class="nav-dropdown-items">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{$subItem['url']!='#' ? route($subItem['url']) : "#" }}">
                                            <i class="nav-icon {{@$subItem['icon']}}"></i> {{$keySub}}
                                        </a>
                                    </li>
                                </ul>
                            @endif
                        @endforeach
                    </li>
                @else
                    @if($item['type'] == 'title')
                    <li class="nav-title">{{$key}}</li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{$item['url']!='#' ? route($item['url']) : "#" }}">
                            <i class="nav-icon {{$item['icon']}}"></i> {{$key}}
                        </a>
                    </li>
                    @endif
                @endisset
            @endif
        @endforeach
    </ul>
</nav>
<button class="sidebar-minimizer brand-minimizer" type="button"></button>
