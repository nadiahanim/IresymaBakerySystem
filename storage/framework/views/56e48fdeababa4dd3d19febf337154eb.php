<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- <a href="index" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?php echo e(URL::asset ('/build/images/logo.svg')); ?>" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="<?php echo e(URL::asset ('/build/images/logo-dark.png')); ?>" alt="" height="17">
                    </span>
                </a> -->

                <a href="<?php echo e(route('root')); ?>" class="logo logo-light">
                    <!-- <span class="logo-sm">
                        <img src="<?php echo e(URL::asset ('/build/images/logo-light.svg')); ?>" alt="" height="22">
                    </span> -->
                    <span class="logo-lg">
                        <img src="<?php echo e(URL::asset ('/build/images/logo-bakery-home.png')); ?>" alt="" height="65">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <i class="fa fa-fw fa-bars"></i>
            </button>

        </div>

        <div class="d-flex">

            <!-- <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-bell bx-tada"></i>
                    <span class="badge bg-danger rounded-pill">3</span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0" key="t-notifications"> <?php echo app('translator')->get('translation.Notifications'); ?> </h6>
                            </div>
                            <div class="col-auto">
                                <a href="#!" class="small" key="t-view-all"> <?php echo app('translator')->get('translation.View_All'); ?></a>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px;">
                        <a href="" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="bx bx-cart"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mt-0 mb-1" key="t-your-order"><?php echo app('translator')->get('translation.Your_order_is_placed'); ?></h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1" key="t-grammer"><?php echo app('translator')->get('translation.If_several_languages_coalesce_the_grammar'); ?></p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-min-ago"><?php echo app('translator')->get('translation.3_min_ago'); ?></span></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="" class="text-reset notification-item">
                            <div class="d-flex">
                                <img src="<?php echo e(URL::asset ('/build/images/users/avatar-3.jpg')); ?>" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                <div class="flex-grow-1">
                                    <h6 class="mt-0 mb-1"><?php echo app('translator')->get('translation.James_Lemire'); ?></h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1" key="t-simplified"><?php echo app('translator')->get('translation.It_will_seem_like_simplified_English'); ?></p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-hours-ago"><?php echo app('translator')->get('translation.1_hours_ago'); ?></span></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title bg-success rounded-circle font-size-16">
                                        <i class="bx bx-badge-check"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mt-0 mb-1" key="t-shipped"><?php echo app('translator')->get('translation.Your_item_is_shipped'); ?></h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1" key="t-grammer"><?php echo app('translator')->get('translation.If_several_languages_coalesce_the_grammar'); ?></p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-min-ago"><?php echo app('translator')->get('translation.3_min_ago'); ?></span></p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="" class="text-reset notification-item">
                            <div class="d-flex">
                                <img src="<?php echo e(URL::asset ('/build/images/users/avatar-4.jpg')); ?>" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                <div class="flex-grow-1">
                                    <h6 class="mt-0 mb-1"><?php echo app('translator')->get('translation.Salena_Layfield'); ?></h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1" key="t-occidental"><?php echo app('translator')->get('translation.As_a_skeptical_Cambridge_friend_of_mine_occidental'); ?></p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-hours-ago"><?php echo app('translator')->get('translation.1_hours_ago'); ?></span></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="p-2 border-top d-grid">
                        <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                            <i class="mdi mdi-arrow-right-circle me-1"></i> <span key="t-view-more"><?php echo app('translator')->get('translation.View_More'); ?></span>
                        </a>
                    </div>
                </div>
            </div> -->

            <div class="dropdown d-inline-block">
                
                <?php if(isset(Auth::user()->id)): ?> 
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="<?php echo e(asset('/build/images/users/avatar-profile.png')); ?>" alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1" key="t-henry"><?php echo e(isset(Auth::user()->fullname) ? (Auth::user()->fullname) : ucfirst(Auth::user()->fullname)); ?></span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="<?php echo e(route('profile.view')); ?>"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile"><?php echo app('translator')->get('translation.Profile'); ?></span></a>
                    <!-- <a class="dropdown-item" href="#"><i class="bx bx-wallet font-size-16 align-middle me-1"></i> <span key="t-my-wallet"><?php echo app('translator')->get('translation.My_Wallet'); ?></span></a>
                    <a class="dropdown-item d-block" href="#" data-bs-toggle="modal" data-bs-target=".change-password"><span class="badge bg-success float-end">11</span><i class="bx bx-wrench font-size-16 align-middle me-1"></i> <span key="t-settings"><?php echo app('translator')->get('translation.Settings'); ?></span></a>
                    <a class="dropdown-item" href="#"><i class="bx bx-lock-open font-size-16 align-middle me-1"></i> <span key="t-lock-screen"><?php echo app('translator')->get('translation.Lock_screen'); ?></span></a> -->
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="javascript:void();" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout"><?php echo app('translator')->get('translation.Logout'); ?></span></a>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                    </form>
                </div>
                <?php else: ?>

                <div class="card-body">
                    <a href="<?php echo e(route('register')); ?>" class="card-link">Register</a>
                    <a href="#" class="card-link"> | </a>
                    <a href="<?php echo e(route('login')); ?>" class="card-link">Sign In</a>
                </div>

                <?php endif; ?>

            </div>

        </div>
    </div>
</header>

<div class="topnav">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">

                    <?php if(isset(Auth::user()->user_type) && Auth::user()->user_type == 1): ?> <!-- if the user is logged in as an admin  -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="<?php echo e(route('root')); ?>" id="topnav-dashboard" role="button">
                                <i class="bx bx-home-circle me-2"></i><span key="t-dashboards">Dashboard</span>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="<?php echo e(route('bakery.view')); ?>" id="topnav-dashboard" role="button">
                                <i class="bx bx-store me-2"></i><span key="t-dashboards">My Bakery</span>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="<?php echo e(route('product.index')); ?>" id="topnav-dashboard" role="button">
                                <i class="bx bx-food-menu me-2"></i><span key="t-dashboards">My Products</span>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="<?php echo e(route('cake.index')); ?>" id="topnav-dashboard" role="button">
                                <i class="bx bx-cake me-2"></i><span key="t-dashboards">Cake Catalogue</span>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="" id="topnav-settings" role="button">
                                <i class="bx bx-purchase-tag me-2"></i><span key="t-dashboards">Order Settings</span>
                                <div class="arrow-down"></div>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="topnav-settings">
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="<?php echo e(route('calendar.index')); ?>" id="topnav-layout-verti" role="button">
                                    <span key="t-vertical">Calendar</span>                                    
                                </a>                               
                            </div>

                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="<?php echo e(route('service.index')); ?>" id="topnav-layout-hori" role="button">
                                    <span key="t-horizontal">Pricing</span>                                    
                                </a>                               
                            </div>
                        </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="" id="topnav-dashboard" role="button">
                                <i class="bx bx-receipt me-2"></i><span key="t-dashboards">Orders</span>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="" id="topnav-dashboard" role="button">
                                <i class="bx bx-book-bookmark me-2"></i><span key="t-dashboards">My Recipes</span>
                            </a>
                        </li>

                    <?php else: ?> <!-- if the user is not logged in or the user logged in as a customer  -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="<?php echo e(route('root')); ?>" id="topnav-dashboard" role="button">
                                <i class="bx bx-home-circle me-2"></i><span key="t-dashboards">Home</span>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="" id="topnav-dashboard" role="button">
                                <i class="bx bx-store me-2"></i><span key="t-dashboards">About Us</span>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="" id="topnav-dashboard" role="button">
                                <i class="bx bx-building me-2"></i><span key="t-dashboards">About Us</span>
                            </a>
                        </li>

                    <?php endif; ?>

                </ul>
            </div>
        </nav>
    </div>
</div>

<!--  Change-Password example -->
<div class="modal fade change-password" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="change-password">
                    <?php echo csrf_field(); ?>

                    <?php if(isset(Auth::user()->id)): ?> 
                    <input type="hidden" value="<?php echo e(Auth::user()->id); ?>" id="data_id">
                    <div class="mb-3">
                        <label for="current_password">Current Password</label>
                        <input id="current-password" type="password" class="form-control <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="current_password" autocomplete="current_password" placeholder="Enter Current Password" value="<?php echo e(old('current_password')); ?>">
                        <div class="text-danger" id="current_passwordError" data-ajax-feedback="current_password"></div>
                    </div>

                    <div class="mb-3">
                        <label for="newpassword">New Password</label>
                        <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" autocomplete="new_password" placeholder="Enter New Password">
                        <div class="text-danger" id="passwordError" data-ajax-feedback="password"></div>
                    </div>

                    <div class="mb-3">
                        <label for="userpassword">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new_password" placeholder="Enter New Confirm password">
                        <div class="text-danger" id="password_confirmError" data-ajax-feedback="password-confirm"></div>
                    </div>

                    <div class="mt-3 d-grid">
                        <button class="btn btn-primary waves-effect waves-light UpdatePassword" data-id="<?php echo e(Auth::user()->id); ?>" type="submit">Update Password</button>
                    </div>

                    <?php else: ?>

                        register heree

                    <?php endif; ?>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php /**PATH D:\user\Documents\GitHub\IresymaBakerySystem\resources\views/layouts/horizontal.blade.php ENDPATH**/ ?>