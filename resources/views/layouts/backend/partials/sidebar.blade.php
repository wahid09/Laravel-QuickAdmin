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
        <!-- Dropdown list-->
        <ul class="vertical-nav-menu">
            <br>
            <li class="app-sidebar__heading"><a href="{{ route('app.dashboard') }}" class="{{ Route::is('app.dashboard') ? 'mm-active' : ''}}"><i class="metismenu-icon pe-7s-rocket"></i>Dashboard
            </a>
            </li>
            <li class="app-sidebar__heading customLiClass">
              <a href="#"><i class="metismenu-icon pe-7s-diamond"></i>Access Control<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
              </a>
                <ul>
                    @permission('role-index')
                    <li>
                    <a href="{{ route('app.roles.index') }}" class="{{ Request::is('app/roles*') ? 'mm-active' : ''}}">
                    <i class="metismenu-icon pe-7s-check"></i>Role Management
                    </a>
                    </li>
                    @endpermission
                    @permission('permission-access')
                    <li>
                    <a href="{{ route('app.permissions.index') }}" class="{{ Request::is('app/permissions*') ? 'mm-active' : ''}}">
                    <i class="metismenu-icon pe-7s-cloud"></i>Permissions
                    </a>
                    </li>
                    @endpermission
                    
                    @permission('module-access')
                    <li>
                    <a href="{{ route('app.modules.index') }}" class="{{ Request::is('app/modules*') ? 'mm-active' : ''}}">
                    <i class="metismenu-icon pe-7s-cloud"></i>Modules
                    </a>
                    </li>
                    @endpermission

                    @permission('user-index')
                    <li>
                    <a href="{{ route('app.users.index') }}" class="{{ Request::is('app/users*') ? 'mm-active' : ''}}">
                    <i class="metismenu-icon pe-7s-users"></i>User Management
                    </a>
                    </li>
                    @endpermission
                                    
                </ul>
            </li>

            <li class="app-sidebar__heading customLiClass">
              <a href="#"><i class="metismenu-icon pe-7s-diamond"></i>System<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
              </a>
                <ul>
                    @permission('backup-index')
                    <li>
                    <a href="{{ route('app.backups.index') }}" class="{{ Request::is('app/backups*') ? 'mm-active' : ''}}">
                    <i class="metismenu-icon pe-7s-cloud"></i>Backups
                    </a>
                    </li>
                    @endpermission
                </ul>
            </li>

        </ul>
        <!-- End Dropdown-->   
    </div>
</div>
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function(){

      var url = window.location.href;

      var encodedString = btoa(url);
      encodedString=encodedString.replace("==","");
      encodedString=encodedString.replace("=","");

      $activeUrl=$("#"+encodedString);
      //alert($activeUrl);
      $activeUrl.addClass("mm-active");

      $activeLi=$activeUrl.parents("li.customLiClass:first");
      $activeLi.addClass("mm-active");
    });

</script>