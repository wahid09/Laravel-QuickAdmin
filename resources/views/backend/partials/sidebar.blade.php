<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                        data-class="closed-sidebar">
                        <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                        </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
            <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
            </span>
    </div>
    <div class="scrollbar-sidebar">
        <!-- Dropdown list-->
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <br>
                <li class="app-sidebar__heading"><a href="{{ route('app.dashboard') }}"
                                                    class="{{ Route::is('app.dashboard') ? 'mm-active' : ''}}"><i
                            class="metismenu-icon pe-7s-rocket"></i>Dashboard
                    </a>
                </li>
                <li class="app-sidebar__heading">
                    <a href="#"><i class="metismenu-icon pe-7s-settings"></i>Access Control<i
                            class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        @permission('module-index')
                        <li class="{{Request::is('app/modules*') ? 'mm-active' : ''}}">
                            <a href="{{ route('app.modules.index') }}">
                                <i class="metismenu-icon pe-7s-cloud"></i>Module
                            </a>
                        </li>
                        @endpermission

                        @permission('permission-index')
                        <li class="{{ Request::is('app/permissions*') ? 'mm-active' : ''}}">
                            <a href="{{ route('app.permissions.index') }}">
                                <i class="metismenu-icon pe-7s-cloud"></i>Permissions
                            </a>
                        </li>
                        @endpermission
                        @permission('role-index')
                        <li class="{{Request::is('app/roles*') ? 'mm-active' : ''}}">
                            <a href="{{ route('app.roles.index') }}">
                                <i class="metismenu-icon pe-7s-check"></i>Roles
                            </a>
                        </li>
                        @endpermission
                        @permission('permission-access')
                        <li class="{{ Request::is('app/permissions*') ? 'mm-active' : ''}}">
                            <a href="{{ route('app.permissions.index') }}">
                                <i class="metismenu-icon pe-7s-cloud"></i>Permissions
                            </a>
                        </li>
                        @endpermission

                        @permission('user-index')
                        <li class="{{ Request::is('app/users*') ? 'mm-active' : ''}}">
                            <a href="{{ route('app.users.index') }}">
                                <i class="metismenu-icon pe-7s-users"></i>Users
                            </a>
                        </li>
                        @endpermission

                    </ul>
                </li>

                <li class="app-sidebar__heading">
                    <a href="#"><i class="metismenu-icon pe-7s-diamond"></i>System<i
                            class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        @permission('backup-index')
                        <li class="{{Request::is('app/backups*') ? 'mm-active' : ''}}">
                            <a href="{{ route('app.backups.index') }}" class="">
                                <i class="metismenu-icon pe-7s-cloud"></i>Backups
                            </a>
                        </li>
                        @endpermission

                        @permission('log-index')
                        <li class="{{Request::is('app/logs*') ? 'mm-active' : ''}}">
                            <a href="{{ route('app.log_list') }}" class="">
                                <i class="metismenu-icon pe-7s-cloud"></i>Logs
                            </a>
                        </li>
                        @endpermission
                    </ul>
                </li>

                <li class="app-sidebar__heading">
                    <a href="#"><i class="metismenu-icon pe-7s-tools"></i>Application Setup<i
                            class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>

                        <li>
                            <a href="" class="">
                                <i class="metismenu-icon pe-7s-cloud"></i>Page
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
            <!-- End Dropdown-->
        </div>
    </div>
    <!-- Example -->
    <!-- End -->
</div>
