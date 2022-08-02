<style>
    .mt-1, .my-1 {
        margin-top: .25rem !important;
        margin-left: 53px;
    }
</style>
<div class="app-header header-shadow">
    <div class="app-header__logo">
        <div class="head-text mt-1 mx-10">
            
            
        </div>
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
                    <button type="button"
                            class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
    </div>
    <div class="app-header__content">
        <div class="app-header-left">
            <div class="search-wrapper">
                <div class="input-holder">
                    <input type="text" class="search-input" placeholder="Type to search">
                    <button class="search-icon"><span></span></button>
                </div>
                <button class="close"></button>
            </div>
            <ul class="header-menu nav">
                <li class="nav-item">
                    
                    
                    
                    
                </li>

            </ul>
        </div>
        <div class="app-header-right">
            <div class="header-btn-lg pr-0">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                    <?php if(!empty(auth::user()->image)): ?>
                                        <img width="42" class="rounded-circle"
                                             src="<?php echo e(asset('storage/user/'. auth::user()->image)); ?>" alt="">
                                    <?php else: ?>
                                        <img width="42" class="rounded-circle"
                                             src="<?php echo e(asset('assets/images/avatar.jpg')); ?>" alt="">
                                    <?php endif; ?>
                                    <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                </a>
                                <div tabindex="-1" role="menu" aria-hidden="true"
                                     class="dropdown-menu dropdown-menu-right">




                                    <button type="button" tabindex="0" class="dropdown-item" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                            class="fas fa-sign-out-alt"></i>&nbsp;Logout
                                    </button>
                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content-left  ml-3 header-user-info">
                            <div class="widget-heading">
                                <?php echo e(Auth::user()->name); ?>

                            </div>
                            <div class="widget-subheading">
                                <?php echo e(Auth::user()->role->name); ?>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH D:\laragon\www\QuickAdmin\resources\views/backend/partials/header.blade.php ENDPATH**/ ?>