@php
            $data = App\Models\Setting::pluck('value','key');
        @endphp
<!-- Start::app-sidebar -->
        <aside class="app-sidebar sticky" id="sidebar">

            <!-- Start::main-sidebar-header -->
            <div class="main-sidebar-header">
                <a href="/admin/dashboard" class="header-logo">
                    <img src="{{ url(config('app.logo')).'/'.$data['logo_1'] }}" alt="logo">
                </a>
            </div>
            <!-- End::main-sidebar-header -->

            <!-- Start::main-sidebar -->
            <div class="main-sidebar" id="sidebar-scroll">

                <!-- Start::nav -->
                <nav class="main-menu-container nav nav-pills flex-column sub-open">
                    <div class="slide-left" id="slide-left">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                        </svg>
                    </div>
                    <ul class="main-menu">
                        <!-- Start::slide__category -->
                        <li class="slide__category"><span class="category-name">Main</span></li>
                        <!-- End::slide__category -->

                        <!-- {{ Auth::user()->roles()->pluck('name')->implode(', ') }} -->

                        <!-- Start::slide -->
                        
                        <li class="slide">
                            <a href="/admin/dashboard" class="side-menu__item">
                                <i class="fe fe-home side-menu__icon"></i>
                                <span class="side-menu__label">Dashboard</span>
                            </a>
                        </li>
                     
                      <!-- {{(Auth::user()->roles->contains('7'))}} -->
                        <!-- End::slide -->

                        <!-- Start::slide__category -->
                        @if((Auth::user()->roles->contains('1'))) 
                        <li class="slide__category"><span class="category-name">Users Management</span></li>
                        <!-- End::slide__category -->

                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="fe fe-users side-menu__icon"></i>
                                <span class="side-menu__label">Users</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1 mega-menu">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Users</a>
                                </li>
                                <li class="slide">
                                    <a href="{{route('users.index')}}" class="side-menu__item">User List</a>
                                </li>
                                <li class="slide">
                                    <a href="{{route('users.create')}}" class="side-menu__item">Add User</a>
                                </li>
                                <li class="slide">
                                    <a href="{{route('roles.index')}}" class="side-menu__item">Roles</a>
                                </li>
                                <li class="slide">
                                    <a href="{{route('permissions.index')}}" class="side-menu__item">Permissions</a>
                                </li>
                            </ul>
                        </li>
                        @endif 
                        <!-- End::slide -->
                        
                        
                        
                        <!-- Start::slide__category -->
                        @if((Auth::user()->roles->contains('1'))) 
                            <li class="slide__category"><span class="category-name">Program Management</span></li>
                            <li class="slide has-sub">
                                <a href="javascript:void(0);" class="side-menu__item">
                                    <i class="fe fe-book side-menu__icon"></i>
                                    <span class="side-menu__label">Program </span>
                                    <i class="fe fe-chevron-right side-menu__angle"></i>
                                </a>
                                <ul class="slide-menu child1 mega-menu">
                                    <li class="slide side-menu__label1">
                                        <a href="javascript:void(0)">Programs Lists</a>
                                    </li>
                                    <li class="slide">
                                        <a href="{{ route('programs.index') }}" class="side-menu__item">Programs List</a>
                                    </li>
                                    <li class="slide">
                                        <a href="{{ route('programs.create') }}" class="side-menu__item">Add Program</a>
                                    </li>
                                </ul>
                            </li>
                         @endif


                    






                        
                        
                         @if((Auth::user()->roles->contains('1'))) 
                        <li class="slide__category"><span class="category-name">Webinar Management</span></li>
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="fe fe-package side-menu__icon"></i>
                                <span class="side-menu__label">Webinar </span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1 mega-menu">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Webinars Lists</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ route('webinars.index') }}" class="side-menu__item">Webinar Lists</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ route('webinars.create') }}" class="side-menu__item">Add Webinar</a>
                                </li>
                            </ul>
                        </li>
                        @endif   
                        <!-- End::slide -->
                        
                       
                        @if((Auth::user()->roles->contains('1')))
                        <li class="slide__category"><span class="category-name">Experts Management</span></li>
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="fe fe-package side-menu__icon"></i>
                                <span class="side-menu__label">Experts </span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1 mega-menu">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Experts Lists</a>
                                </li>
                                <li class="slide">
                                    <a href="{{route('expert.index')}}" class="side-menu__item">Experts Lists</a>
                                </li>
                                <li class="slide">
                                    <a href="{{route('expert.create')}}" class="side-menu__item">Add Expert</a>
                                </li>
                            </ul>
                        </li>
                        @endif  

                        <!-- End::slide -->
                        
                        
                        <!-- Start::slide__category -->
                        @if((Auth::user()->roles->contains('1'))) 
                        <li class="slide__category"><span class="category-name">Articles Management</span></li>
                        <!-- End::slide__category -->

                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="fe fe-package side-menu__icon"></i>
                                <span class="side-menu__label">Articles</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1 mega-menu">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Articles Lists</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ route('article.index') }}" class="side-menu__item">Articles Lists</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ route('article.create') }}" class="side-menu__item">Add Article</a>
                                </li>
                            </ul>
                        </li>
                        @endif   
                        <!-- End::slide -->
                         
                        <!-- Start::slide__category -->
                        @if((Auth::user()->roles->contains('1'))) 
                         <li class="slide__category"><span class="category-name">Concerns Management</span></li>
                        <!-- End::slide__category -->

                       <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="fe fe-package side-menu__icon"></i>
                                <span class="side-menu__label">Concerns</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1 mega-menu">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Concern Lists</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ route('concern.index') }}" class="side-menu__item">Concern Lists</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ route('concern.create') }}" class="side-menu__item">Add Concern</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        <!-- End::slide -->
                        
                        
                        @if((Auth::user()->roles->contains('1'))) 
                        <!-- Start::slide__category -->
                        <li class="slide__category"><span class="category-name">Category Management</span></li>
                        <!-- End::slide__category -->

                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="fe fe-package side-menu__icon"></i>
                                <span class="side-menu__label">Category</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1 mega-menu">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Category Lists</a>
                                </li>
                                <li class="slide">
                                    <a href="{{route('categories.index')}}" class="side-menu__item">Category Lists</a>
                                </li>
                                <li class="slide">
                                    <a href="{{route('categories.create')}}" class="side-menu__item">Add Category</a>
                                </li>
                            </ul>
                        </li>
                        @endif   
                        <!-- End::slide -->
                        
                        
                        <!-- Start::slide__category -->
                        @if((Auth::user()->roles->contains('1'))) 
                        <li class="slide__category"><span class="category-name">Coupons Management</span></li>
                     
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="fe fe-package side-menu__icon"></i>
                                <span class="side-menu__label">Coupons</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1 mega-menu">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Coupons Lists</a>
                                </li>
                                <li class="slide">
                                    <a href="/admin/coupon" class="side-menu__item">Coupons Lists</a>
                                </li>
                                <li class="slide">
                                    <a href="/admin/coupon/create" class="side-menu__item">Create Coupon</a>
                                </li>
                            </ul>
                        </li>
                        @endif  
                        <!-- End::slide -->
                        @if((Auth::user()->roles->contains('1'))) 
                        <li class="slide__category"><span class="category-name">Videos Management</span></li>
                        <!-- End::slide__category -->

                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="fe fe-package side-menu__icon"></i>
                                <span class="side-menu__label">Videos</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1 mega-menu">
                                <li class="slide side-menu__label1">
                                <a href="javascript:void(0)">Videos Lists</a>
                                </li>
                                <li class="slide">
                                    <a href="{{route('video.index')}}" class="side-menu__item">Videos Lists</a>
                                </li>
                                <li class="slide">
                                    <a href="{{route('video.create')}}" class="side-menu__item">Create Video</a>
                                </li>
                            </ul>
                        </li>
                        @endif

                        @if((Auth::user()->roles->contains('1'))) 
                        <li class="slide__category"><span class="category-name">Appointment Management</span></li>
                        <!-- End::slide__category -->

                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="fe fe-package side-menu__icon"></i>
                                <span class="side-menu__label">Appointment</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1 mega-menu">
                                <li class="slide side-menu__label1">
                                <a href="javascript:void(0)">Appointment</a>
                                </li>
                                <!-- <li class="slide">
                                    <a href="{{route('appointment.list')}}" class="side-menu__item">Appointment Lists</a>
                                </li> -->
                                <li class="slide">
                                    <a href="{{route('appointment.add')}}" class="side-menu__item">Create Appointment</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                         
                        @if((Auth::user()->roles->contains('1'))) 
                        <li class="slide__category"><span class="category-name">Report Management</span></li>
                        <!-- End::slide__category -->

                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="fe fe-package side-menu__icon"></i>
                                <span class="side-menu__label">Report</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1 mega-menu">
                                <li class="slide side-menu__label1">
                                <a href="javascript:void(0)">Report Lists</a>
                                </li>
                                <li class="slide">
                                    <a href="{{route('report.list')}}" class="side-menu__item">Report Lists</a>
                                </li>
                                <li class="slide">
                                    <a href="{{route('report.add')}}" class="side-menu__item">Create Report</a>
                                </li>
                            </ul>
                        </li>
                        @endif


                        @if((Auth::user()->roles->contains('1'))) 
                        <li class="slide__category"><span class="category-name">Queries</span></li>
                        <!-- End::slide__category -->

                        <!-- Start::slide -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="fe fe-package side-menu__icon"></i>
                                <span class="side-menu__label">Queries</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1 mega-menu">
                                <li class="slide side-menu__label1">
                                <a href="javascript:void(0)"></a>
                                </li>
                                <li class="slide">
                                    <a href="{{route('newsletter')}}" class="side-menu__item">Newsletter</a>
                                </li>
                                <li class="slide">
                                    <a href="{{route('contactform')}}" class="side-menu__item">Contact</a>
                                </li>
                                <li class="slide">
                                    <a href="{{route('concernform')}}" class="side-menu__item">Concern Form</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        <!-- Start::slide__category -->

                       
                         @if((Auth::user()->roles->contains('1'))) 
                            <li class="slide__category"><span class="category-name">Landing Page</span></li>
                            <li class="slide has-sub">
                                <a href="javascript:void(0);" class="side-menu__item">
                                    <i class="fe fe-book side-menu__icon"></i>
                                    <span class="side-menu__label">Landing Page </span>
                                    <i class="fe fe-chevron-right side-menu__angle"></i>
                                </a>
                                <ul class="slide-menu child1 mega-menu">
                                    <li class="slide side-menu__label1">
                                        <a href="javascript:void(0)">Landing Page</a>
                                    </li>
                                    <li class="slide">
                                        <a href="{{ route('landingPage-health-List') }}" class="side-menu__item">Landing Page</a>
                                    </li>
                                    <!-- <li class="slide">
                                        <a href="{{ route('landingPage-health') }}" class="side-menu__item">Add Landing Page</a>
                                    </li> -->
                                </ul>
                            </li>
                         @endif   
                       
             
                        
                        @if((Auth::user()->roles->contains('7'))) 
                 <li class="slide__category"><span class="category-name">Expert Website Management</span></li>
                         <!-- Start::website -->
                        <li class="slide has-sub">
                            <a href="javascript:void(0)" class="side-menu__item">
                                <i class="fe fe-package side-menu__icon"></i>
                                <span class="side-menu__label">Website Settings</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1 mega-menu">
                                 
                                <li class="slide">
                                    <a href="{{ route('site-setting.index') }}" class="side-menu__item">General Settings</a>
                                </li>
                                  <li class="slide">
                                    <a href="javascript:void(0)" class="side-menu__item">Website Header</a>
                                </li>
                                 <li class="slide">
                                    <a href="javascript:void(0)" class="side-menu__item">Website Footer</a>
                                </li>
                                
                                <li class="slide">
                                    <a href="{{route('home.create')}}" class="side-menu__item">Home Page</a>
                                </li>
                                
                                <li class="slide">
                                    <a href="javascript:void(0)" class="side-menu__item">Programs Page</a>
                                </li>
                                 <li class="slide">
                                    <a href="javascript:void(0)" class="side-menu__item">Workshop Page</a>
                                </li>
                                
                                <li class="slide">
                                    <a href="javascript:void(0)" class="side-menu__item">Blog Page</a>
                                </li>
                                 <li class="slide">
                                    <a href="javascript:void(0)" class="side-menu__item">Apointments Page</a>
                                </li>
                                
                                 <li class="slide">
                                    <a href="javascript:void(0)" class="side-menu__item">About Page</a>
                                </li>
                              
                                 <li class="slide">
                                    <a href="javascript:void(0)" class="side-menu__item">Contact us</a>
                                </li>
                                  <li class="slide">
                                    <a href="javascript:void(0)" class="side-menu__item">FAQs</a>
                                </li> 
                                 <li class="slide">
                                    <a href="javascript:void(0)" class="side-menu__item">About Page</a>
                                </li>
                                 <li class="slide">
                                    <a href="javascript:void(0)" class="side-menu__item">Privacy Policy</a>
                                </li>
                                 <li class="slide">
                                    <a href="javascript:void(0)" class="side-menu__item">Terms & Conditions</a>
                                </li>
                                
                               
                            </ul>
                        </li>
                        @endif
                        <!-- End::website -->
            <li class="slide__category"><span class="category-name">Other Settings</span></li>
        <!-- Start::slide -->
                        <li class="slide">
                            <a href="{{route('emails.index')}}" class="side-menu__item">
                                <i class="fe fe-mail side-menu__icon"></i>
                                <span class="side-menu__label">Email Template</span>
                            </a>
                        </li>
                        <!-- End::slide -->

                        <!-- Start::slide -->
                        <li class="slide">
                            <a href="{{ route('users.show', auth()->user()->id) }}" class="side-menu__item">
                                <i class="fe fe-command side-menu__icon"></i>
                                <span class="side-menu__label">Profile Settings</span>
                            </a>
                        </li>
                        <!-- End::slide -->
                        
                        
                        <!-- Start::slide -->
                        <!-- <li class="slide">
                            <a href="{{route('admin/logout')}}" class="side-menu__item">
                                <i class="fe fe-command side-menu__icon"></i>
                                <span class="side-menu__label">Logout</span>
                            </a>
                        </li> -->
                    
                        <!-- End::slide -->
                        
                    </ul>
                    <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24"
                            height="24" viewBox="0 0 24 24">
                            <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                        </svg></div>
                </nav>
                <!-- End::nav -->

            </div>
            <!-- End::main-sidebar -->

        </aside>
        <!-- End::app-sidebar -->