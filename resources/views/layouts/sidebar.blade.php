<!-- BEGIN .app-side -->
<aside class="app-side" id="app-side">
    <!-- BEGIN .side-content -->
    <div class="side-content ">
        <!-- Current login user start -->
        <div class="login-user">
            <div class="profile-thumb">
                @if (Auth::user()->role == '1')
                    <img src="{{ asset('assets/images/' . auth()->user()->image) }}" />
                @else
                    <img src="{{ asset('assets/images/user.png') }}" />
                @endif
            </div>
            <h6 class="profile-name">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h6>
        </div>
        <!-- Current login user end -->
        <!-- Nav scroll start -->
        <div class="sidebarNoQuicklinks">
            <!-- BEGIN .side-nav -->
            <nav class="side-nav">
                <!-- BEGIN: side-nav-content -->
                <ul class="unifyMenu pt-2" id="unifyMenu">
                    <li class="{{ Route::is('dashboard') ? 'selected' : '' }}">
                        <a href="{{ route('dashboard') }}">
                            <span class="has-icon">
                                <i class="icon-laptop_windows"></i>
                            </span>
                            <span class="nav-title">Dashboard</span>
                        </a>
                    </li>
                    @if (Auth::user()->role == '1')
                        <li class="{{ Route::is('user.index') ? 'selected' : '' }}">
                            <a href="{{ route('user.index') }}">
                                <span class="has-icon">
                                    <i class="icon-users"></i>
                                </span>
                                <span class="nav-title">Users</span>
                            </a>
                        </li>
                        <li class="{{ Route::is('cms.index') ? 'selected' : '' }}">
                            <a href="{{ route('cms.index') }}">
                                <span class="has-icon">
                                    <i class="icon-text"></i>
                                </span>
                                <span class="nav-title">CMS</span>
                            </a>
                        </li>
                        <li class="{{ Route::is('modulesetting.index') ? 'selected' : '' }}">
                            <a href="{{ route('modulesetting.index') }}">
                                <span class="has-icon">
                                    <i class="icon-cog"></i>
                                </span>
                                <span class="nav-title">Module Settings</span>
                            </a>
                        </li>
                        <li class="{{ Route::is('setting.index') ? 'selected' : '' }}">
                            <a href="{{ route('setting.index') }}">
                                <span class="has-icon">
                                    <i class="icon-cogs"></i>
                                </span>
                                <span class="nav-title">General Settings</span>
                            </a>
                        </li>

                    @endif
                </ul>
                <!-- END: side-nav-content -->
            </nav>
            <!-- END: .side-nav -->
        </div>
        <!-- Nav scroll end -->
    </div>
    <!-- END: .side-content -->
</aside>
<!-- END: .app-side -->
<!-- BEGIN .app-main -->
<div class="app-main">
