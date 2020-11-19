<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
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
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Dashboards</li>
                <li><a href="{{ route('app.dashboard') }}" class="{{ Route::is('app.dashboard') ? 'mm-active' : ''}}">
                <i class="metismenu-icon pe-7s-rocket"></i>Dashboard
                </a>
                </li>
            </ul>
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Access Control</li>
                @permission('role-index')
                <li>
                <a href="{{ route('app.roles.index') }}" class="{{ Request::is('app/roles*') ? 'mm-active' : ''}}">
                <i class="metismenu-icon pe-7s-check"></i>Role Management
                </a>
                </li>
                @endpermission

                <li>
                <a href="{{ route('app.permissions.index') }}" class="{{ Request::is('app/permissions*') ? 'mm-active' : ''}}">
                <i class="metismenu-icon pe-7s-cloud"></i>Permissions
                </a>
                </li>

                <li>
                <a href="{{ route('app.modules.index') }}" class="{{ Request::is('app/modules*') ? 'mm-active' : ''}}">
                <i class="metismenu-icon pe-7s-cloud"></i>Modules
                </a>
                </li>

                @permission('user-index')
                <li>
                <a href="{{ route('app.users.index') }}" class="{{ Request::is('app/users*') ? 'mm-active' : ''}}">
                <i class="metismenu-icon pe-7s-users"></i>User Management
                </a>
                </li>
                @endpermission
                </ul>

                <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">System</li>
                @permission('backup-index')
                <li>
                <a href="{{ route('app.backups.index') }}" class="{{ Request::is('app/backups*') ? 'mm-active' : ''}}">
                <i class="metismenu-icon pe-7s-cloud"></i>Backups
                </a>
                </li>
                @endpermission
                
                </ul>
                <!-- Example -->
                <div class="app-sidebar__inner">
                    <ul class="vertical-nav-menu">
                        <li class="app-sidebar__heading">UI Components</li>
                        <li>
                        <a href="#"><i class="metismenu-icon pe-7s-diamond"></i>Elements<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <li>
                            <a href="elements-buttons-standard.html">
                            <i class="metismenu-icon"></i>
                                                    Buttons
                            </a>
                            </li>
                            <li>
                            <a href="elements-dropdowns.html">
                            <i class="metismenu-icon"></i>Dropdowns
                            </a>
                            </li>
                            <li>
                            <a href="elements-icons.html"><i class="metismenu-icon"></i>Icons
                            </a>
                            </li>
                            <li><a href="elements-badges-labels.html"><i class="metismenu-icon"></i>Badges </a>
                            </li>
                            <li>
                            <a href="elements-cards.html">
                            <i class="metismenu-icon"></i>Cards
                            </a>
                            </li>
                            <li>
                            <a href="elements-list-group.html">
                            <i class="metismenu-icon"></i>List Groups</a>
                            </li>
                            <li>
                            <a href="elements-navigation.html">
                            <i class="metismenu-icon">
                            </i>Navigation Menus </a>
                            </li>
                            <li>
                            <a href="elements-utilities.html">
                            <i class="metismenu-icon"></i>Utilities
                            </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
                            <!-- End Example -->
        </div>
    </div>
</div>