<style>
    .vertical-nav-menu ul > li > a {
        color: #6c757d;
        height: 2rem;
        line-height: 2rem;
        padding: 0 1.5rem 0;
        text-transform: lowercase;
        font-size: 16px;
    }

    .closed-sidebar:not(.sidebar-mobile-open) .app-sidebar .scrollbar-sidebar {
        position: static;
        height: auto;
        overflow: initial !important;
    }
</style>
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
        <ul class="vertical-nav-menu">
            <br>
            <li class="app-sidebar__heading"><a href="<?php echo e(route('app.dashboard')); ?>"
                                                class="<?php echo e(Route::is('app.dashboard') ? 'mm-active' : ''); ?>"><i
                        class="metismenu-icon pe-7s-rocket"></i>Dashboard
                </a>
            </li>
            <li class="app-sidebar__heading">
                <a href="#"><i class="metismenu-icon pe-7s-settings"></i>Access Control<i
                        class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <?php if (\Illuminate\Support\Facades\Blade::check('permission', 'module-index')): ?>
                    <li class="<?php echo e(Request::is('app/modules*') ? 'mm-active' : ''); ?>">
                        <a href="<?php echo e(route('app.modules.index')); ?>">
                            <i class="metismenu-icon pe-7s-cloud"></i>Module
                        </a>
                    </li>
                    <?php endif; ?>

                    <?php if (\Illuminate\Support\Facades\Blade::check('permission', 'permission-index')): ?>
                    <li class="<?php echo e(Request::is('app/permissions*') ? 'mm-active' : ''); ?>">
                        <a href="<?php echo e(route('app.permissions.index')); ?>">
                            <i class="metismenu-icon pe-7s-cloud"></i>Permissions
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php if (\Illuminate\Support\Facades\Blade::check('permission', 'role-index')): ?>
                    <li class="<?php echo e(Request::is('app/roles*') ? 'mm-active' : ''); ?>">
                        <a href="<?php echo e(route('app.roles.index')); ?>">
                            <i class="metismenu-icon pe-7s-check"></i>Roles
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php if (\Illuminate\Support\Facades\Blade::check('permission', 'permission-access')): ?>
                    <li class="<?php echo e(Request::is('app/permissions*') ? 'mm-active' : ''); ?>">
                        <a href="<?php echo e(route('app.permissions.index')); ?>">
                            <i class="metismenu-icon pe-7s-cloud"></i>Permissions
                        </a>
                    </li>
                    <?php endif; ?>

                    <?php if (\Illuminate\Support\Facades\Blade::check('permission', 'user-index')): ?>
                    <li class="<?php echo e(Request::is('app/users*') ? 'mm-active' : ''); ?>">
                        <a href="<?php echo e(route('app.users.index')); ?>">
                            <i class="metismenu-icon pe-7s-users"></i>Users
                        </a>
                    </li>
                    <?php endif; ?>

                </ul>
            </li>

            <li class="app-sidebar__heading">
                <a href="#"><i class="metismenu-icon pe-7s-diamond"></i>System<i
                        class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <?php if (\Illuminate\Support\Facades\Blade::check('permission', 'backup-index')): ?>
                    <li class="<?php echo e(Request::is('app/backups*') ? 'mm-active' : ''); ?>">
                        <a href="<?php echo e(route('app.backups.index')); ?>" class="">
                            <i class="metismenu-icon pe-7s-cloud"></i>Backups
                        </a>
                    </li>
                    <?php endif; ?>

                    <?php if (\Illuminate\Support\Facades\Blade::check('permission', 'log-index')): ?>
                    <li class="<?php echo e(Request::is('app/logs*') ? 'mm-active' : ''); ?>">
                        <a href="<?php echo e(route('app.log_list')); ?>" class="">
                            <i class="metismenu-icon pe-7s-cloud"></i>Logs
                        </a>
                    </li>
                    <?php endif; ?>
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
    <!-- Example -->
    <!-- End -->
</div>
<?php /**PATH D:\laragon\www\QuickAdmin\resources\views/backend/partials/sidebar.blade.php ENDPATH**/ ?>