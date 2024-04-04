<!-- Navbar-->
<header class="app-header"><a class="app-header__logo" href="{{ route('home.index') }}">Rajabhat Dataset</a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
        <li class="app-search">

        </li>
        <li>
            <a class="app-nav__item text-white" target="_blank">
                <i class="fas fa-phone fa-flip-horizontal"></i>
                <span class="sm-d-none">
                    (สายตรง) 093-632-3207
                </span>
            </a>
        </li>
        <li>
            <a class="app-nav__item text-white" href="{{ asset('assets/images/manual.pdf') }}" >
                {{-- <i class="fas fa-envelope"></i> --}}
                <span class="sm-d-none">
                    คู่มือการใช้งาน
                </span>
            </a>
        </li>
        <li>
            <a class="app-nav__item" href="http://rajabhat.net/" target="_blank">
                <i class="fas fa-globe"></i>
            </a>
        </li>

        @if(Auth::guard('member')->check())
        <li class="dropdown">
            <a class="app-nav__item text-decoration-none" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
                <i class="fa fa-user"></i>
                <span class="sm-d-none">
                {{ Auth::guard('member')->user()->name }}
                </span>
            </a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li>
                    <a class="dropdown-item" href="{{ route('member.household.index') }}">
                        <i class="fas fa-history"></i> การบันทึกข้อมูล
                    </a>
                </li>
                <li class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item" href="{{ route('member.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> ออกจากระบบ
                    </a>
                    <form id="logout-form" action="{{ route('member.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
        @else
        <li>
            <a class="app-nav__item" href="{{ route('member.login') }}"><i class="fas fa-user-lock"></i> เข้าสู่ระบบ</a>
        </li>
        @endif
    </ul>
</header>