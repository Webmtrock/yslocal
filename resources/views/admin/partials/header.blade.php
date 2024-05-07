<!-- app-header -->
        <header class="app-header">

            <!-- Start::main-header-container -->
            <div class="main-header-container container-fluid">

                <!-- Start::header-content-left -->
                <div class="header-content-left">

                    <!-- Start::header-element -->
                    <div class="header-element">
                        <div class="horizontal-logo">
                            <a href="index.html" class="header-logo">
                                <img src="{{ asset('public/admin/assets/images/brand-logos/desktop-logo.png') }}" alt="logo" class="desktop-logo">
                                <img src="{{ asset('public/admin/assets/images/brand-logos/toggle-logo.png') }}" alt="logo" class="toggle-logo">
                                <img src="{{ asset('public/admin/assets/images/brand-logos/desktop-white.png') }}" alt="logo" class="desktop-dark">
                                <img src="{{ asset('public/admin/assets/images/brand-logos/toggle-dark.png') }}" alt="logo" class="toggle-dark">
                                <img src="{{ asset('public/admin/assets/images/brand-logos/desktop-white.png') }}" alt="logo" class="desktop-white">
                                <img src="{{ asset('public/admin/assets/images/brand-logos/toggle-white.png') }}" alt="logo" class="toggle-white">
                            </a>
                        </div>
                    </div>
                    <!-- End::header-element -->

                    <!-- Start::header-element -->
                    <div class="header-element">
                        <!-- Start::header-link -->
                        <a aria-label="Hide Sidebar"
                            class="sidemenu-toggle header-link animated-arrow hor-toggle horizontal-navtoggle mx-0 my-auto"
                            data-bs-toggle="sidebar" href="javascript:void(0);"><span></span></a>
                        <!-- End::header-link -->
                    </div>
                    <!-- End::header-element -->
                    

                </div>
                <!-- End::header-content-left -->

                <!-- Start::header-content-right -->
                <div class="header-content-right">

                    
                     <!-- Start::header-element -->
                     <div class="header-element header-search d-block d-lg-none">
                        <!-- Start::header-link -->
                        <a href="javascript:void(0);" class="header-link" data-bs-toggle="modal" data-bs-target="#searchModal">
                            <i class="ti ti-search header-link-icon"></i>
                        </a>
                        <!-- End::header-link -->
                    </div>
                    <!-- End::header-element -->

                    <!-- Start::header-element -->
                    <div class="header-element header-theme-mode">
                        <!-- Start::header-link|layout-setting -->
                        <a href="javascript:void(0);" class="header-link layout-setting">
                            <span class="light-layout">
                                <!-- Start::header-link-icon -->
                                <i class="fe fe-moonfe fe-moon header-link-icon align-middle"></i>
                                <!-- End::header-link-icon -->
                            </span>
                            <span class="dark-layout">
                                <!-- Start::header-link-icon -->
                                <i class="fe fe-sun header-link-icon"></i>
                                <!-- End::header-link-icon -->
                            </span>
                        </a>
                        <!-- End::header-link|layout-setting -->
                    </div>
                    <!-- End::header-element -->

                    <!-- Start::header-element -->
                    <div class="header-element header-fullscreen">
                        <!-- Start::header-link -->
                        <a onclick="openFullscreen();" href="#" class="header-link">
                            <i class="fe fe-maximize full-screen-open header-link-icon"></i>
                            <i class="fe fe-minimize full-screen-close header-link-icon d-none"></i>
                        </a>
                        <!-- End::header-link -->
                    </div>
                    <!-- End::header-element -->

                    <!-- Start::header-element -->
                    <div class="header-element notifications-dropdown">
                        <!-- Start::header-link|dropdown-toggle -->
                        <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-auto-close="outside"
                            data-bs-toggle="dropdown">
                            <i class="fe fe-bell header-link-icon"></i>
                            <span class="pulse-success"></span>
                        </a>
                        <!-- End::header-link|dropdown-toggle -->
                        <!-- Start::main-header-dropdown -->
                        <div class="main-header-dropdown dropdown-menu dropdown-menu-end" data-popper-placement="none">
                            <div class="p-3">
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="mb-0 fs-17 fw-semibold">Notifications</p>
                                    <span class="badge bg-success fw-normal" id="notifiation-data">5 Unread</span>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <ul class="list-unstyled mb-0" id="header-notification-scroll">
                                <li class="dropdown-item">
                                    <div class="d-flex align-items-start">
                                        <div class="pe-2">
                                            <span
                                                class="avatar avatar-md bg-primary-gradient box-shadow-primary avatar-rounded"><i
                                                    class="ri-chat-4-line fs-18"></i></span>
                                        </div>
                                        <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                            <div>
                                                <p class="mb-0 fw-semibold"><a href="default-chat.html">New review received</a>
                                                </p>
                                                <span class="text-muted fw-normal fs-12 header-notification-text">2 hours
                                                    ago</span>
                                            </div>
                                            <div>
                                                <a href="javascript:void(0);"
                                                    class="min-w-fit-content text-muted me-1 dropdown-item-close2"><i
                                                        class="ti ti-x fs-16"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-item">
                                    <div class="d-flex align-items-start">
                                        <div class="pe-2">
                                            <span
                                                class="avatar avatar-md bg-secondary-gradient box-shadow-primary avatar-rounded"><i
                                                    class="ri-mail-line fs-18"></i></span>
                                        </div>
                                        <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                            <div>
                                                <p class="mb-0 fw-semibold"><a href="default-chat.html">New Mails Received</a>
                                                </p>
                                                <span class="text-muted fw-normal fs-12 header-notification-text">1 week
                                                    ago</span>
                                            </div>
                                            <div>
                                                <a href="javascript:void(0);"
                                                    class="min-w-fit-content text-muted me-1 dropdown-item-close2"><i
                                                        class="ti ti-x fs-16"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-item">
                                    <div class="d-flex align-items-start">
                                        <div class="pe-2">
                                            <span
                                                class="avatar avatar-md bg-success-gradient box-shadow-primary avatar-rounded"><i
                                                    class="ri-shopping-cart-line fs-18"></i></span>
                                        </div>
                                        <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                            <div>
                                                <p class="mb-0 fw-semibold"><a href="default-chat.html">New Order Received</a>
                                                </p>
                                                <span class="text-muted fw-normal fs-12 header-notification-text">1 day
                                                    ago</span>
                                            </div>
                                            <div>
                                                <a href="javascript:void(0);"
                                                    class="min-w-fit-content text-muted me-1 dropdown-item-close2"><i
                                                        class="ti ti-x fs-16"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-item">
                                    <div class="d-flex align-items-start">
                                        <div class="pe-2">
                                            <span
                                                class="avatar avatar-md bg-warning-gradient box-shadow-primary avatar-rounded"><i
                                                    class="ri-refresh-fill fs-18"></i></span>
                                        </div>
                                        <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                            <div>
                                                <p class="mb-0 fw-semibold"><a href="default-chat.html">New Updates
                                                        available</a>
                                                </p>
                                                <span class="text-muted fw-normal fs-12 header-notification-text">1 day
                                                    ago</span>
                                            </div>
                                            <div>
                                                <a href="javascript:void(0);"
                                                    class="min-w-fit-content text-muted me-1 dropdown-item-close2"><i
                                                        class="ti ti-x fs-16"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-item">
                                    <div class="d-flex align-items-start">
                                        <div class="pe-2">
                                            <span class="avatar avatar-md bg-info-gradient box-shadow-primary avatar-rounded"><i
                                                    class="ri-shopping-bag-fill fs-18"></i></span>
                                        </div>
                                        <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                            <div>
                                                <p class="mb-0 fw-semibold"><a href="default-chat.html">New Order Placed</a>
                                                </p>
                                                <span class="text-muted fw-normal fs-12 header-notification-text">1 day
                                                    ago</span>
                                            </div>
                                            <div>
                                                <a href="javascript:void(0);"
                                                    class="min-w-fit-content text-muted me-1 dropdown-item-close2"><i
                                                        class="ti ti-x fs-16"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="p-3 empty-header-item1 border-top">
                                <div class="d-grid">
                                    <a href="default-chat.html" class="btn text-muted p-0 border-0">View all Notification</a>
                                </div>
                            </div>
                            <div class="p-5 empty-item1 d-none">
                                <div class="text-center">
                                    <span class="avatar avatar-xl avatar-rounded bg-secondary-transparent">
                                        <i class="ri-notification-off-line fs-2"></i>
                                    </span>
                                    <h6 class="fw-semibold mt-3">No New Notifications</h6>
                                </div>
                            </div>
                        </div>
                        <!-- End::main-header-dropdown -->
                    </div>
                    <!-- End::header-element -->


                    <!-- Start::header-element -->
                    <!-- <div class="header-element profile-1">
                        <a href="#" class=" dropdown-toggle leading-none d-flex px-1" id="mainHeaderProfile"
                            data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <img src="{{ asset('public/admin/assets/images/faces/9.jpg') }}" alt="img"
                                        class="rounded-circle avatar  profile-user brround cover-image">
                                </div>
                            </div>
                        </a>
                        <ul class="main-header-dropdown dropdown-menu pt-0 overflow-hidden header-profile-dropdown dropdown-menu-end"
                            aria-labelledby="mainHeaderProfile">
                            <li><a class="dropdown-item d-flex" href="profile.html"><i
                                        class="ti ti-user-circle fs-18 me-2 op-7"></i>Profile</a></li>
                            <li><a class="dropdown-item d-flex" href="emailservices.html"><i
                                        class="ti ti-adjustments-horizontal fs-18 me-2 op-7"></i>Settings</a></li>
                                        <form method="POST" action="{{ route('admin/logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item d-flex">
                                                <i class="ti ti-logout fs-18 me-2 op-7"></i>Log Out
                                            </button>
                                        </form>
                        </ul>
                    </div> -->
                    <div class="header-element profile-1">
                        <a href="#" class=" dropdown-toggle leading-none d-flex px-1" id="mainHeaderProfile"
                        data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                        <div class="d-flex align-items-center">
                      
                                <!-- <span>{{ isset(auth()->user()->name) ? auth()->user()->name : 'Guest' }}</span> -->
                                
                                <div class="">
                                    <img src="{{ isset(auth()->user()->profile_image) ? url(config('app.profile_image')).'/'.auth()->user()->profile_image : url('admin/assets/images/users/user.jpg') }}" alt="img"
                                        class="rounded-circle avatar  profile-user brround cover-image">
                                </div>
                            </div>
                        </a>
                        <ul class="main-header-dropdown dropdown-menu pt-0 overflow-hidden header-profile-dropdown dropdown-menu-end"
                            aria-labelledby="mainHeaderProfile">
                            <li><a class="dropdown-item d-flex" href="{{ route('users.show', auth()->user()->id) }}"><i
                                        class="ti ti-user-circle fs-18 me-2 op-7"></i>Profile</a></li>
                            <li><a class="dropdown-item d-flex" href="{{ route('site-setting.index') }}"><i
                                        class="ti ti-adjustments-horizontal fs-18 me-2 op-7"></i>Settings</a></li>
                                        <form method="POST" action="{{ route('admin/logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item d-flex">
                                                <i class="ti ti-logout fs-18 me-2 op-7"></i>Log Out
                                            </button>
                                        </form>
                        </ul>
                    </div>
                    <!-- <div class="user-name">
                    <h5 class="user-name-backend mb-0 ml-2">{{ isset(auth()->user()->name) ? auth()->user()->name : 'Guest' }}</h5>
                </div>
                <div class="user-profile">
                    <img class="user-profile-backend rounded-circle" src="{{ isset(auth()->user()->profile_image) ? url(config('app.profile_image')).'/'.auth()->user()->profile_image : url('admin/assets/images/users/user.jpg') }}" alt="">
                    <ul>
                        <li class="nav-item">
                            <a class="nav-link" href="">My Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                
                                <span class="menu-title">Logout</span>
                            </a>
                            <form id="logout-form" action="" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div> -->
                    

                   

        

                </div>
                <!-- End::header-content-right -->

            </div>
            <!-- End::main-header-container -->

        </header>
        <!-- /app-header -->