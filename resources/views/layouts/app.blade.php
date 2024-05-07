<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">

<head>

    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Yellow Squash </title>
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
	<meta name="keywords" content="bootstrap template, template dashboard bootstrap, admin template, html admin panel template, bootstrap admin template, html and css templates, bootstrap, bootstrap html template, html admin dashboard template, bootstrap dashboard, admin panel html template">
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('public/admin/assets/images/brand-logos/favicon.ico') }}" type="image/x-icon">
    
    <!-- Choices JS -->
    <script src="{{ asset('public/admin/assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>

    <!-- Main Theme Js -->
    <script src="{{ asset('public/admin/assets/js/main.js') }}"></script>
    
    <!-- Bootstrap Css -->
    <link id="style" href="{{ asset('public/admin/assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Style Css -->
    <link href="{{ asset('public/admin/assets/css/styles.min.css') }}" rel="stylesheet">

    <!-- Icons Css -->
    <link href="{{ asset('public/admin/assets/css/icons.css') }}" rel="stylesheet">

    <!-- Node Waves Css -->
    <link href="{{ asset('public/admin/assets/libs/node-waves/waves.min.css') }}" rel="stylesheet"> 

    <!-- Simplebar Css -->
    <link href="{{ asset('public/admin/assets/libs/simplebar/simplebar.min.css') }}" rel="stylesheet">
    
    <!-- Color Picker Css -->
    <link rel="stylesheet" href="{{ asset('public/admin/assets/libs/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin/assets/libs/@simonwep/pickr/themes/nano.min.css') }}">

    <!-- Choices Css -->
    <link rel="stylesheet" href="{{ asset('public/admin/assets/libs/choices.js/public/assets/styles/choices.min.css') }}">

    <link rel="stylesheet" href="{{ asset('public/admin/assets/libs/quill/quill.snow.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin/assets/libs/quill/quill.bubble.css') }}">


<link rel="stylesheet" href="{{ asset('public/admin/assets/libs/apexcharts/apexcharts.css') }}">

<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">

</head>

<body>

    <!-- Start Switcher -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="switcher-canvas" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title text-default" id="offcanvasRightLabel">Switcher</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <nav class="border-bottom border-block-end-dashed">
                <div class="nav nav-tabs nav-justified" id="switcher-main-tab" role="tablist">
                    <button class="nav-link active" id="switcher-home-tab" data-bs-toggle="tab" data-bs-target="#switcher-home"
                        type="button" role="tab" aria-controls="switcher-home" aria-selected="true">Theme Styles</button>
                    <button class="nav-link" id="switcher-profile-tab" data-bs-toggle="tab" data-bs-target="#switcher-profile"
                        type="button" role="tab" aria-controls="switcher-profile" aria-selected="false">Theme Colors</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active border-0" id="switcher-home" role="tabpanel" aria-labelledby="switcher-home-tab"
                    tabindex="0">
                    <div class="">
                        <p class="switcher-style-head">Theme Color Mode:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-light-theme">
                                        Light
                                    </label>
                                    <input class="form-check-input" type="radio" name="theme-style" id="switcher-light-theme"
                                        checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-dark-theme">
                                        Dark
                                    </label>
                                    <input class="form-check-input" type="radio" name="theme-style" id="switcher-dark-theme">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Directions:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-ltr">
                                        LTR
                                    </label>
                                    <input class="form-check-input" type="radio" name="direction" id="switcher-ltr" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-rtl">
                                        RTL
                                    </label>
                                    <input class="form-check-input" type="radio" name="direction" id="switcher-rtl">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Navigation Styles:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-vertical">
                                        Vertical
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-style" id="switcher-vertical" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-horizontal">
                                        Horizontal
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-style"
                                        id="switcher-horizontal"
                                        >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="navigation-menu-styles">
                        <p class="switcher-style-head">Vertical & Horizontal Menu Styles:</p>
                        <div class="row switcher-style gx-0 pb-2 gy-2">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-menu-click">
                                        Menu Click
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-menu-styles"
                                        id="switcher-menu-click">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-menu-hover">
                                        Menu Hover
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-menu-styles"
                                        id="switcher-menu-hover">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-icon-click">
                                        Icon Click
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-menu-styles"
                                        id="switcher-icon-click">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-icon-hover">
                                        Icon Hover
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-menu-styles"
                                        id="switcher-icon-hover">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidemenu-layout-styles">
                        <p class="switcher-style-head">Sidemenu Layout Styles:</p>
                        <div class="row switcher-style gx-0 pb-2 gy-2">
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-default-menu">
                                        Default Menu
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-default-menu" checked>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-closed-menu">
                                        Closed Menu
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-closed-menu">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-icontext-menu">
                                        Icon Text
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-icontext-menu">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-icon-overlay">
                                        Icon Overlay
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-icon-overlay">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-detached">
                                        Detached
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-detached">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-double-menu">
                                        Double Menu
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-double-menu">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Page Styles:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-regular">
                                        Regular
                                    </label>
                                    <input class="form-check-input" type="radio" name="page-styles" id="switcher-regular"
                                        checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-classic">
                                        Classic
                                    </label>
                                    <input class="form-check-input" type="radio" name="page-styles" id="switcher-classic">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-modern">
                                        Modern
                                    </label>
                                    <input class="form-check-input" type="radio" name="page-styles" id="switcher-modern">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Layout Width Styles:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-full-width">
                                        Full Width
                                    </label>
                                    <input class="form-check-input" type="radio" name="layout-width" id="switcher-full-width"
                                        checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-boxed">
                                        Boxed
                                    </label>
                                    <input class="form-check-input" type="radio" name="layout-width" id="switcher-boxed">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Menu Positions:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-menu-fixed">
                                        Fixed
                                    </label>
                                    <input class="form-check-input" type="radio" name="menu-positions" id="switcher-menu-fixed"
                                        checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-menu-scroll">
                                        Scrollable
                                    </label>
                                    <input class="form-check-input" type="radio" name="menu-positions" id="switcher-menu-scroll">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Header Positions:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-header-fixed">
                                        Fixed
                                    </label>
                                    <input class="form-check-input" type="radio" name="header-positions"
                                        id="switcher-header-fixed" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-header-scroll">
                                        Scrollable
                                    </label>
                                    <input class="form-check-input" type="radio" name="header-positions"
                                        id="switcher-header-scroll">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Loader:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-loader-enable">
                                        Enable
                                    </label>
                                    <input class="form-check-input" type="radio" name="page-loader"
                                        id="switcher-loader-enable" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-loader-disable">
                                        Disable
                                    </label>
                                    <input class="form-check-input" type="radio" name="page-loader"
                                        id="switcher-loader-disable" checked>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade border-0" id="switcher-profile" role="tabpanel" aria-labelledby="switcher-profile-tab" tabindex="0">
                    <div>
                        <div class="theme-colors">
                            <p class="switcher-style-head">Menu Colors:</p>
                            <div class="d-flex switcher-style pb-2">
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-white" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Light Menu" type="radio" name="menu-colors"
                                        id="switcher-menu-light" checked>
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-dark" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Dark Menu" type="radio" name="menu-colors"
                                        id="switcher-menu-dark">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Color Menu" type="radio" name="menu-colors"
                                        id="switcher-menu-primary">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-gradient" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Gradient Menu" type="radio" name="menu-colors"
                                        id="switcher-menu-gradient">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-transparent"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Transparent Menu"
                                        type="radio" name="menu-colors" id="switcher-menu-transparent">
                                </div>
                            </div>
                            <div class="px-4 pb-3 text-muted fs-11">Note:If you want to change color Menu dynamically change from below Theme Primary color picker</div>
                        </div>
                        <div class="theme-colors">
                            <p class="switcher-style-head">Header Colors:</p>
                            <div class="d-flex switcher-style pb-2">
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-white" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Light Header" type="radio" name="header-colors"
                                        id="switcher-header-light" checked>
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-dark" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Dark Header" type="radio" name="header-colors"
                                        id="switcher-header-dark">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Color Header" type="radio" name="header-colors"
                                        id="switcher-header-primary">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-gradient" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Gradient Header" type="radio" name="header-colors"
                                        id="switcher-header-gradient">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-transparent" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Transparent Header" type="radio" name="header-colors"
                                        id="switcher-header-transparent">
                                </div>
                            </div>
                            <div class="px-4 pb-3 text-muted fs-11">Note:If you want to change color Header dynamically change from below Theme Primary color picker</div>
                        </div>
                        <div class="theme-colors">
                            <p class="switcher-style-head">Theme Primary:</p>
                            <div class="d-flex flex-wrap align-items-center switcher-style">
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary-1" type="radio"
                                        name="theme-primary" id="switcher-primary">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary-2" type="radio"
                                        name="theme-primary" id="switcher-primary1">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary-3" type="radio" name="theme-primary"
                                        id="switcher-primary2">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary-4" type="radio" name="theme-primary"
                                        id="switcher-primary3">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary-5" type="radio" name="theme-primary"
                                        id="switcher-primary4">
                                </div>
                                <div class="form-check switch-select ps-0 mt-1 color-primary-light">
                                    <div class="theme-container-primary"></div>
                                    <div class="pickr-container-primary"></div>
                                </div>
                            </div>
                        </div>
                        <div class="theme-colors">
                            <p class="switcher-style-head">Theme Background:</p>
                            <div class="d-flex flex-wrap align-items-center switcher-style">
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-bg-1" type="radio"
                                        name="theme-background" id="switcher-background">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-bg-2" type="radio"
                                        name="theme-background" id="switcher-background1">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-bg-3" type="radio" name="theme-background"
                                        id="switcher-background2">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-bg-4" type="radio"
                                        name="theme-background" id="switcher-background3">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-bg-5" type="radio"
                                        name="theme-background" id="switcher-background4">
                                </div>
                                <div class="form-check switch-select ps-0 mt-1 tooltip-static-demo color-bg-transparent">
                                    <div class="theme-container-background"></div>
                                    <div class="pickr-container-background"></div>
                                </div>
                            </div>
                        </div>
                        <div class="menu-image mb-3">
                            <p class="switcher-style-head">Menu With Background Image:</p>
                            <div class="d-flex flex-wrap align-items-center switcher-style">
                                <div class="form-check switch-select m-2">
                                    <input class="form-check-input bgimage-input bg-img1" type="radio"
                                        name="theme-background" id="switcher-bg-img">
                                </div>
                                <div class="form-check switch-select m-2">
                                    <input class="form-check-input bgimage-input bg-img2" type="radio"
                                        name="theme-background" id="switcher-bg-img1">
                                </div>
                                <div class="form-check switch-select m-2">
                                    <input class="form-check-input bgimage-input bg-img3" type="radio" name="theme-background"
                                        id="switcher-bg-img2">
                                </div>
                                <div class="form-check switch-select m-2">
                                    <input class="form-check-input bgimage-input bg-img4" type="radio"
                                        name="theme-background" id="switcher-bg-img3">
                                </div>
                                <div class="form-check switch-select m-2">
                                    <input class="form-check-input bgimage-input bg-img5" type="radio"
                                        name="theme-background" id="switcher-bg-img4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-grid canvas-footer"> 
                    <a href="javascript:void(0);" id="reset-all" class="btn btn-danger btn-block m-1">Reset</a> 
                </div>
            </div>
        </div>
    </div>
    <!-- End Switcher -->


    <!-- Loader -->
    <div id="loader" >
        <img src="{{ asset('public/admin/assets/images/media/loader.svg') }}" alt="">
    </div>
    <!-- Loader -->

    <div class="page">
        
        @include("admin.partials.header");
        
        
        @include('admin.partials.sidebar');

        <!-- Start::app-content -->
        <div class="main-content app-content">
            @yield('content')
        </div>
        <!-- End::app-content -->
        
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-body">
                  <div class="input-group">
                    <a href="javascript:void(0);" class="input-group-text" id="Search-Grid"><i class="fe fe-search header-link-icon fs-18"></i></a>
                    <input type="search" class="form-control border-0 px-2" placeholder="Search" aria-label="Username">
                    <a href="javascript:void(0);" class="input-group-text" id="voice-search"><i class="fe fe-mic header-link-icon"></i></a>
                    <a href="javascript:void(0);" class="btn btn-light btn-icon" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fe fe-more-vertical"></i>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="javascript:void(0);">Action</a></li>
                      <li><a class="dropdown-item" href="javascript:void(0);">Another action</a></li>
                      <li><a class="dropdown-item" href="javascript:void(0);">Something else here</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="javascript:void(0);">Separated link</a></li>
                    </ul>
                  </div>
                  <div class="mt-4">
                    <p class="font-weight-semibold text-muted mb-2">Are You Looking For...</p>
                    <span class="search-tags"><i class="fe fe-user me-2"></i>People<a href="javascript:void(0)" class="tag-addon"><i class="fe fe-x"></i></a></span>
                    <span class="search-tags"><i class="fe fe-file-text me-2"></i>Pages<a href="javascript:void(0)" class="tag-addon"><i class="fe fe-x"></i></a></span>
                    <span class="search-tags"><i class="fe fe-align-left me-2"></i>Articles<a href="javascript:void(0)" class="tag-addon"><i class="fe fe-x"></i></a></span>
                    <span class="search-tags"><i class="fe fe-server me-2"></i>Tags<a href="javascript:void(0)" class="tag-addon"><i class="fe fe-x"></i></a></span>
                  </div>
                  <div class="my-4">
                    <p class="font-weight-semibold text-muted mb-2">Recent Search :</p>
                    <div class="p-2 border br-5 d-flex align-items-center text-muted mb-2 alert">
                      <a href="notifications.html"><span>Notifications</span></a>
                      <a class="ms-auto lh-1" href="javascript:void(0);" data-bs-dismiss="alert" aria-label="Close"><i class="fe fe-x text-muted"></i></a>
                    </div>
                    <div class="p-2 border br-5 d-flex align-items-center text-muted mb-2 alert">
                      <a href="alerts.html"><span>Alerts</span></a>
                      <a class="ms-auto lh-1" href="javascript:void(0);" data-bs-dismiss="alert" aria-label="Close"><i class="fe fe-x text-muted"></i></a>
                    </div>
                    <div class="p-2 border br-5 d-flex align-items-center text-muted mb-0 alert">
                      <a href="mail.html"><span>Mail</span></a>
                      <a class="ms-auto lh-1" href="javascript:void(0);" data-bs-dismiss="alert" aria-label="Close"><i class="fe fe-x text-muted"></i></a>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <div class="btn-group ms-auto">
                    <button class="btn btn-sm btn-primary-light">Search</button>
                    <button class="btn btn-sm btn-primary">Clear Recents</button>
                  </div>
                </div>
              </div>
            </div>
        </div>

       
       @include('admin.partials.footer')
       
       
        <div class="offcanvas offcanvas-end offcanvas-sidebar overflow-auto" tabindex="-1" id="offcanvassidebar" >
             <!-- Sidebar-right -->
             <div class="card custom-card tab-heading shadow-none">
                <div class="card-header rounded-0">
                    <div class="card-title">
                        Notifications
                    </div>
                    <div class="card-options ms-auto" data-bs-theme="dark">
                        <button type="button" class="btn-close text-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <ul class="nav nav-tabs my-3 nav-style-1 justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" role="tab" href="#home31"
                                aria-selected="true"> <i class="fe fe-user"></i>Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" role="tab" href="#about32"
                                aria-selected="false"><i class="fe fe-users "></i> Contacts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" role="tab" href="#service33"
                                aria-selected="false"><i class="fe fe-settings"></i>Settings</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active text-muted p-0 rounded-0 border-bottom-0 border-end-0" id="home31" role="tabpanel">
                            <div class="card-body text-center">
                                <div class="dropdown user-pro-body">
                                    <div class="">
                                        <img alt="user-img" class="avatar avatar-xl rounded-circle mx-auto text-center" src="{{ asset('public/admin/assets/images/faces/6.jpg')}}"><span class="avatar-status profile-status bg-green"></span>
                                    </div>
                                    <div class="user-info mg-t-20">
                                        <h6 class="fw-semibold  mt-2 mb-0">Mintrona Pechon</h6>
                                        <span class="mb-0 text-muted fs-12">Premium Member</span>
                                    </div>
                                </div>
                            </div>
                            <a class="dropdown-item d-flex border-bottom border-top" href="profile.html">
                                <div class="d-flex"><i class="fe fe-user me-3 fs-20 text-muted"></i>
                                    <div class="pt-1">
                                        <h6 class="mb-0">My Profile</h6>
                                        <p class="fs-12 mb-0 text-muted">Profile Personal information</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex border-bottom" href="default-chat.html">
                                <div class="d-flex"><i class="fe fe-message-square me-3 fs-20 text-muted"></i>
                                    <div class="pt-1">
                                        <h6 class="mb-0">My Messages</h6>
                                        <p class="fs-12 mb-0 text-muted">Person message information</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex border-bottom" href="emailservices.html">
                                <div class="d-flex"><i class="fe fe-mail me-3 fs-20 text-muted"></i>
                                    <div class="pt-1">
                                        <h6 class="mb-0">My Mails</h6>
                                        <p class="fs-12 mb-0 text-muted">Persons mail information</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex border-bottom" href="editprofile.html">
                                <div class="d-flex"><i class="fe fe-settings me-3 fs-20 text-muted"></i>
                                    <div class="pt-1">
                                        <h6 class="mb-0">Account Settings</h6>
                                        <p class="fs-12 mb-0 text-muted">Settings Information</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex border-bottom" href="login.html">
                                <div class="d-flex"><i class="fe fe-power me-3 fs-20 text-muted"></i>
                                    <div class="pt-1">
                                        <h6 class="mb-0">Sign Out</h6>
                                        <p class="fs-12 mb-0 text-muted">Account Signout</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="tab-pane text-muted p-0 rounded-0 overflow-auto border-end-0" id="about32" role="tabpanel">
                            <div class="list-group list-group-flush ">
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="me-2">
                                        <img class="avatar avatar-md rounded-circle cover-image" alt="img" src="{{ asset('public/admin/assets/images/faces/9.jpg')}}"><span class="avatar-status bg-success"></span>
                                    </div>
                                    <div class="">
                                        <div class="fw-semibold">Mozelle Belt</div>
                                        <p class="mb-0 tx-12 text-muted">mozellebelt@gmail.com</p>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="me-2">
                                        <img class="avatar avatar-md rounded-circle cover-image" alt="img" src="{{ asset('public/admin/assets/images/faces/11.jpg')}}">
                                    </div>
                                    <div class="">
                                        <div class="fw-semibold">Florinda Carasco</div>
                                        <p class="mb-0 tx-12 text-muted">florindacarasco@gmail.com</p>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="me-2">
                                        <img class="avatar avatar-md rounded-circle cover-image" alt="img" src="{{ asset('public/admin/assets/images/faces/10.jpg')}}"><span class="avatar-status bg-success"></span>
                                    </div>
                                    <div class="">
                                        <div class="fw-semibold">Alina Bernier</div>
                                        <p class="mb-0 tx-12 text-muted">alinaaernier@gmail.com</p>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="me-2">
                                        <img class="avatar avatar-md rounded-circle cover-image" alt="img" src="{{ asset('public/admin/assets/images/faces/2.jpg')}}"><span class="avatar-status bg-success"></span>
                                    </div>
                                    <div class="">
                                        <div class="fw-semibold">Zula Mclaughin</div>
                                        <p class="mb-0 tx-12 text-muted">zulamclaughin@gmail.com</p>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="me-2">
                                        <img class="avatar avatar-md rounded-circle cover-image" alt="img" src="{{ asset('public/admin/assets/images/faces/13.jpg')}}">
                                    </div>
                                    <div class="">
                                        <div class="fw-semibold">Isidro Heide</div>
                                        <p class="mb-0 tx-12 text-muted">isidroheide@gmail.com</p>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="me-2">
                                        <img class="avatar avatar-md rounded-circle cover-image" alt="img" src="{{ asset('public/admin/assets/images/faces/12.jpg')}}"><span class="avatar-status bg-success"></span>
                                    </div>
                                    <div class="">
                                        <div class="fw-semibold">Mozelle Belt</div>
                                        <p class="mb-0 tx-12 text-muted">mozellebelt@gmail.com</p>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="me-2">
                                        <img class="avatar avatar-md rounded-circle cover-image" alt="img" src="{{ asset('public/admin/assets/images/faces/4.jpg')}}">
                                    </div>
                                    <div class="">
                                        <div class="fw-semibold">Florinda Carasco</div>
                                        <p class="mb-0 tx-12 text-muted">florindacarasco@gmail.com</p>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="me-2">
                                        <img class="avatar avatar-md rounded-circle cover-image" alt="img" src="{{ asset('public/admin/assets/images/faces/2.jpg')}}"><span class="avatar-status bg-success"></span>
                                    </div>
                                    <div class="">
                                        <div class="fw-semibold">Zula Mclaughin</div>
                                        <p class="mb-0 tx-12 text-muted">zulamclaughin@gmail.com</p>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="me-2">
                                        <img class="avatar avatar-md rounded-circle cover-image" alt="img" src="{{ asset('public/admin/assets/images/faces/7.jpg')}}">
                                    </div>
                                    <div class="">
                                        <div class="fw-semibold">Alina Bernier</div>
                                        <p class="mb-0 tx-12 text-muted">alinabernier@gmail.com</p>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="me-2">
                                        <img class="avatar avatar-md rounded-circle cover-image" alt="img" src="{{ asset('public/admin/assets/images/faces/2.jpg')}}">
                                    </div>
                                    <div class="">
                                        <div class="fw-semibold">Zula Mclaughin</div>
                                        <p class="mb-0 tx-12 text-muted">zulamclaughin@gmail.com</p>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="me-2">
                                        <img class="avatar avatar-md rounded-circle cover-image" alt="img" src="{{ asset('public/admin/assets/images/faces/14.jpg')}}"><span class="avatar-status bg-success"></span>
                                    </div>
                                    <div class="">
                                        <div class="fw-semibold">Isidro Heide</div>
                                        <p class="mb-0 tx-12 text-muted">isidroheide@gmail.com</p>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="me-2">
                                        <img class="avatar avatar-md rounded-circle cover-image" alt="img" src="{{ asset('public/admin/assets/images/faces/11.jpg')}}">
                                    </div>
                                    <div class="">
                                        <div class="fw-semibold">Florinda Carasco</div>
                                        <p class="mb-0 tx-12 text-muted">florindacarasco@gmail.com</p>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="me-2">
                                        <img class="avatar avatar-md rounded-circle cover-image" alt="img" src="{{ asset('public/admin/assets/images/faces/9.jpg')}}">
                                    </div>
                                    <div class="">
                                        <div class="fw-semibold">Alina Bernier</div>
                                        <p class="mb-0 tx-12 text-muted">alinabernier@gmail.com</p>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="me-2">
                                        <img class="avatar avatar-md rounded-circle cover-image" alt="img" src="{{ asset('public/admin/assets/images/faces/15.jpg')}}"><span class="avatar-status bg-success"></span>
                                    </div>
                                    <div class="">
                                        <div class="fw-semibold">Zula Mclaughin</div>
                                        <p class="mb-0 tx-12 text-muted">zulamclaughin@gmail.com</p>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="me-2">
                                        <img class="avatar avatar-md rounded-circle cover-image" alt="img" src="{{ asset('public/admin/assets/images/faces/4.jpg')}}">
                                    </div>
                                    <div class="">
                                        <div class="fw-semibold">Isidro Heide</div>
                                        <p class="mb-0 tx-12 text-muted">isidroheide@gmail.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane text-muted p-0 rounded-0 border-end-0" id="service33" role="tabpanel">
                            <a class="dropdown-item bg-white pd-y-10" href="javascript:void(0);">
                                Account Settings
                            </a>
                            <div class="card-body py-2">

                                <div class="form-check form-switch form-check-md my-2 mt-0">
                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked1" checked="">
                                    <label class="form-check-label" for="flexSwitchCheckChecked1">Updates Automatically</label>
                                </div>
                                <div class="form-check form-switch form-check-md my-2">
                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked2">
                                    <label class="form-check-label" for="flexSwitchCheckChecked2">Allow Location Map</label>
                                </div>
                                <div class="form-check form-switch form-check-md my-2">
                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked3" checked="">
                                    <label class="form-check-label" for="flexSwitchCheckChecked3">Show Contacts</label>
                                </div>
                                <div class="form-check form-switch form-check-md my-2">
                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked4">
                                    <label class="form-check-label" for="flexSwitchCheckChecked4">Show Notification</label>
                                </div>
                                <div class="form-check form-switch form-check-md my-2">
                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked5" checked="">
                                    <label class="form-check-label" for="flexSwitchCheckChecked5">Show Tasks Statistics</label>
                                </div>
                                <div class="form-check form-switch form-check-md my-2">
                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked6" checked="">
                                    <label class="form-check-label" for="flexSwitchCheckChecked6">Show Email Notification</label>
                                </div>
                            </div>
                            <a class="dropdown-item bg-white pd-y-10" href="javascript:void(0);">
                                General Settings
                            </a>
                            <div class="card-body py-2">
                                <div class="form-check form-switch form-check-md my-2 mt-0">
                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked7" checked="">
                                    <label class="form-check-label" for="flexSwitchCheckChecked7">Show User Online</label>
                                </div>
                                <div class="form-check form-switch form-check-md my-2">
                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked8">
                                    <label class="form-check-label" for="flexSwitchCheckChecked8">Website Notification</label>
                                </div>
                                <div class="form-check form-switch form-check-md my-2">
                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked9">
                                    <label class="form-check-label" for="flexSwitchCheckChecked9">Show Recent activity</label>
                                </div>
                                <div class="form-check form-switch form-check-md my-2">
                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked10" checked="">
                                    <label class="form-check-label" for="flexSwitchCheckChecked10">Logout Automatically</label>
                                </div>
                                <div class="form-check form-switch form-check-md my-2">
                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked12" checked="">
                                    <label class="form-check-label" for="flexSwitchCheckChecked12">Allow All Notifications</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/Sidebar-right-->
        </div>

    </div>

    
    <!-- Scroll To Top -->
    <div class="scrollToTop" id="back-to-top">
        <i class="ri-arrow-up-s-fill fs-20"></i>
    </div>
    <div id="responsive-overlay"></div>
    <!-- Scroll To Top -->

    <!-- Popper JS -->
    <script src="{{ asset('public/admin/assets/libs/@popperjs/core/umd/popper.min.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('public/admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Defaultmenu JS -->
    <script src="{{ asset('public/admin/assets/js/defaultmenu.min.js') }}"></script>

    <!-- Node Waves JS-->
    <script src="{{ asset('public/admin/assets/libs/node-waves/waves.min.js') }}"></script>

    <!-- Sticky JS -->
    <script src="{{ asset('public/admin/assets/js/sticky.js') }}"></script>

    <!-- Simplebar JS -->
    <script src="{{ asset('public/admin/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/simplebar.js') }}"></script>

    <!-- Color Picker JS -->
    <script src="{{ asset('public/admin/assets/libs/@simonwep/pickr/pickr.es5.min.js') }}"></script>

    <!-- Apex Charts JS -->
    <script src="{{ asset('public/admin/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <script src="{{ asset('public/admin/assets/js/index.js') }}"></script>
    
    
    <!-- Quill Editor JS -->
    <script src="{{ asset('public/admin/assets/libs/quill/quill.min.js') }}"></script>

    <!-- Internal Quill JS -->
    <script src="{{ asset('public/admin/assets/js/quill-editor.js') }}"></script>


    
    <!-- Custom-Switcher JS -->
    <script src="{{ asset('public/admin/assets/js/custom-switcher.min.js') }}"></script>


    <!-- Custom JS -->
    <script src="{{ asset('public/admin/assets/js/custom.js') }}"></script>
    
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" ></script>





<script src="{{ asset('public/admin/assets/js/datatables.js') }}"></script>
    <!-- Datatables Cdn -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.6/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

</body>

</html>