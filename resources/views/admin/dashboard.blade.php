@extends('layouts.app')
@section('content')

                <div class="container-fluid">
                    <!-- Page Header -->
                    <div
                        class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb"
                    >
                        <div class="">
                            <h1 class="page-title fw-semibold fs-20 mb-0">
                                Dashboard 01
                            </h1>
                            <div class="">
                                <nav>
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item">
                                            <a href="#">Home</a>
                                        </li>
                                        <li
                                            class="breadcrumb-item active"
                                            aria-current="page"
                                        >
                                            Dashboard 01
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- Page Header Close -->

                    <!-- ROW-1 -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                            <div class="row total-sales-card-section">
                                <div
                                    class="col-lg-6 col-md-6 col-sm-12 col-xl-3"
                                >
                                    <div
                                        class="card custom-card overflow-hidden"
                                    >
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <h6 class="fw-normal fs-14">
                                                        Total Sales
                                                    </h6>
                                                    <h3
                                                        class="mb-2 number-font fs-24"
                                                    >
                                                        34,516
                                                    </h3>
                                                    <p class="text-muted mb-0">
                                                        <span
                                                            class="text-primary"
                                                        >
                                                            <i
                                                                class="ri-arrow-up-s-line bg-primary text-white rounded-circle fs-13 p-0 fw-semibold align-bottom"
                                                            ></i>
                                                            3%</span
                                                        >
                                                        last month
                                                    </p>
                                                </div>
                                                <div class="col col-auto mt-2">
                                                    <div
                                                        class="counter-icon bg-primary-gradient box-shadow-primary rounded-circle ms-auto mb-0"
                                                    >
                                                        <i
                                                            class="fe fe-trending-up mb-5"
                                                        ></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-lg-6 col-md-6 col-sm-12 col-xl-3"
                                >
                                    <div
                                        class="card custom-card overflow-hidden"
                                    >
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <h6 class="fw-normal fs-14">
                                                        Total Leads
                                                    </h6>
                                                    <h3
                                                        class="mb-2 number-font fs-24"
                                                    >
                                                        56,992
                                                    </h3>
                                                    <p class="text-muted mb-0">
                                                        <span
                                                            class="text-secondary"
                                                        >
                                                            <i
                                                                class="ri-arrow-up-s-line bg-secondary text-white rounded-circle fs-13 p-0 fw-semibold align-bottom"
                                                            ></i>
                                                            3%</span
                                                        >
                                                        last month
                                                    </p>
                                                </div>
                                                <div class="col col-auto mt-2">
                                                    <div
                                                        class="counter-icon bg-danger-gradient box-shadow-danger rounded-circle ms-auto mb-0"
                                                    >
                                                        <i
                                                            class="ri-rocket-line mb-5"
                                                        ></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-lg-6 col-md-6 col-sm-12 col-xl-3"
                                >
                                    <div
                                        class="card custom-card overflow-hidden"
                                    >
                                    <div class="card-body">
    <div class="row">
        <div class="col">
            <h6 class="fw-normal fs-14">
                Active Webinar
            </h6>
            <h3 class="mb-2 number-font fs-24">
                {{ $webinarUsersCount }}
            </h3>
            <p class="text-muted mb-0">
                <span class="text-success">
                    <i class="ri-arrow-down-s-line bg-primary text-white rounded-circle fs-13 p-0 fw-semibold align-bottom"></i>
                    0.5%</span>
                    last month
            </p>
        </div>
        <div class="col col-auto mt-2">
            <div class="counter-icon bg-secondary-gradient box-shadow-secondary rounded-circle ms-auto mb-0">
                <i class="fe fe-dollar-sign mb-5"></i>
            </div>
        </div>
    </div>
</div>

                                    </div>
                                </div>
                                <div
                                    class="col-lg-6 col-md-6 col-sm-12 col-xl-3"
                                >
                                    <div
                                        class="card custom-card overflow-hidden"
                                    >
                                    <div class="card-body">
                       <div class="row">
                 <div class="col">
                  <h6 class="fw-normal fs-14">
                Active Program
            </h6>
            <h3 class="mb-2 number-font fs-24">
                {{ $activeProgramCount }}
            </h3>
            <p class="text-muted mb-0">
                <span class="text-danger">
                    <i class="ri-arrow-down-s-line bg-danger text-white rounded-circle fs-13 p-0 fw-semibold align-bottom"></i>
                    0.2%</span>
                    last month
            </p>
        </div>
        <div class="col col-auto mt-2">
            <div class="counter-icon bg-success-gradient box-shadow-success rounded-circle ms-auto mb-0">
                <i class="fe fe-briefcase mb-5"></i>
            </div>
        </div>
    </div>
</div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-9">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Total Transactions
                                    </h3>
                                </div>
                                <div class="card-body pb-0">
                                    <div
                                        id="totaltransactions"
                                        width="1112"
                                        class="overflow-hidden"
                                    ></div>
                                </div>
                            </div>
                        </div>
                        <!-- COL END -->
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-3">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <h3 class="card-title">Recent Orders</h3>
                                </div>
                                <div class="card-body pt-0 ps-0 pe-0">
                                    <div
                                        id="recent-orders"
                                        class="apex-charts ht-150"
                                        width="377"
                                    ></div>

                                    <div
                                        class="row sales-product-infomation pb-0 mb-0 mx-auto wd-100p mt-4"
                                    >
                                        <div
                                            class="col-md-6 col justify-content-center text-center"
                                        >
                                            <p
                                                class="mb-0 d-flex justify-content-center"
                                            >
                                                <span
                                                    class="legend bg-primary"
                                                ></span
                                                >Delivered
                                            </p>
                                            <h3 class="mb-1 fw-bold">5238</h3>
                                            <div
                                                class="d-flex justify-content-center"
                                            >
                                                <p class="text-muted mb-0">
                                                    Last 6 months
                                                </p>
                                            </div>
                                        </div>
                                        <div
                                            class="col-md-6 col text-center float-end"
                                        >
                                            <p
                                                class="mb-0 d-flex justify-content-center"
                                            >
                                                <span
                                                    class="legend bg-background2"
                                                ></span
                                                >Cancelled
                                            </p>
                                            <h3 class="mb-1 fw-bold">3467</h3>
                                            <div
                                                class="d-flex justify-content-center"
                                            >
                                                <p class="text-muted mb-0">
                                                    Last 6 months
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- COL END -->
                    </div>
                    <!-- ROW-1 END -->
                    <!-- ROW-3 -->
                    <div class="row">
                        <div class="col-xl-4 col-md-12">
                            <div class="card custom-card overflow-hidden">
                                <div class="card-header">
                                    <div>
                                        <h3 class="card-title">Timeline</h3>
                                    </div>
                                </div>
                                <div class="card-body pb-0 pt-4">
                                    <div class="activity1">
                                        <div class="activity-blog">
                                            <div
                                                class="activity-img rounded-circle bg-primary-transparent text-primary"
                                            >
                                                <i
                                                    class="ri-user-add-fill fs-20"
                                                ></i>
                                            </div>
                                            <div
                                                class="activity-details d-flex"
                                            >
                                                <div>
                                                    <b
                                                        ><span
                                                            class="text-dark"
                                                        >
                                                            Mr John
                                                        </span>
                                                    </b>
                                                    Started following you
                                                    <span
                                                        class="d-flex text-muted fs-11"
                                                        >01 June 2020</span
                                                    >
                                                </div>
                                                <div
                                                    class="ms-auto fs-13 text-dark fw-semibold"
                                                >
                                                    <span
                                                        class="badge bg-primary text-fixed-white"
                                                        >1m</span
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="activity-blog">
                                            <div
                                                class="activity-img rounded-circle bg-secondary-transparent text-secondary"
                                            >
                                                <i
                                                    class="ri-chat-1-fill fs-20"
                                                ></i>
                                            </div>
                                            <div
                                                class="activity-details d-flex"
                                            >
                                                <div>
                                                    <b
                                                        ><span
                                                            class="text-dark"
                                                        >
                                                            Lily
                                                        </span>
                                                    </b>
                                                    1 Commented applied
                                                    <span
                                                        class="d-flex text-muted fs-11"
                                                        >01 July 2020</span
                                                    >
                                                </div>
                                                <div
                                                    class="ms-auto fs-13 text-dark fw-semibold"
                                                >
                                                    <span
                                                        class="badge bg-danger text-fixed-white"
                                                        >3m</span
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="activity-blog">
                                            <div
                                                class="activity-img rounded-circle bg-success-transparent text-success"
                                            >
                                                <i
                                                    class="ri-thumb-up-fill fs-20"
                                                ></i>
                                            </div>
                                            <div
                                                class="activity-details d-flex"
                                            >
                                                <div>
                                                    <b
                                                        ><span
                                                            class="text-dark"
                                                        >
                                                            Kevin
                                                        </span>
                                                    </b>
                                                    liked your site
                                                    <span
                                                        class="d-flex text-muted fs-11"
                                                        >05 July 2020</span
                                                    >
                                                </div>
                                                <div
                                                    class="ms-auto fs-13 text-dark fw-semibold"
                                                >
                                                    <span
                                                        class="badge bg-warning text-fixed-white"
                                                        >5m</span
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="activity-blog">
                                            <div
                                                class="activity-img rounded-circle bg-info-transparent text-info"
                                            >
                                                <i
                                                    class="ri-mail-fill fs-20"
                                                ></i>
                                            </div>
                                            <div
                                                class="activity-details d-flex"
                                            >
                                                <div>
                                                    <b
                                                        ><span
                                                            class="text-dark"
                                                        >
                                                            Andrena
                                                        </span>
                                                    </b>
                                                    posted a new article
                                                    <span
                                                        class="d-flex text-muted fs-11"
                                                        >09 October 2020</span
                                                    >
                                                </div>
                                                <div
                                                    class="ms-auto fs-13 text-dark fw-semibold"
                                                >
                                                    <span
                                                        class="badge bg-info text-fixed-white"
                                                        >5m</span
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="activity-blog">
                                            <div
                                                class="activity-img rounded-circle bg-danger-transparent text-danger"
                                            >
                                                <i
                                                    class="ri-shopping-bag-fill fs-20"
                                                ></i>
                                            </div>
                                            <div
                                                class="activity-details d-flex"
                                            >
                                                <div>
                                                    <b
                                                        ><span
                                                            class="text-dark"
                                                        >
                                                            Sonia
                                                        </span>
                                                    </b>
                                                    Delivery in progress
                                                    <span
                                                        class="d-flex text-muted fs-11"
                                                        >12 October 2020</span
                                                    >
                                                </div>
                                                <div
                                                    class="ms-auto fs-13 text-dark fw-semibold"
                                                >
                                                    <span
                                                        class="badge bg-warning text-fixed-white"
                                                        >5m</span
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-12">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <h4 class="card-title">Browser Usage</h4>
                                </div>
                                <div class="card-body pt-2 pb-2">
                                    <div
                                        class="d-md-flex align-items-center browser-stats"
                                    >
                                        <div class="d-flex me-1">
                                            <i
                                                class="ri-chrome-fill bg-secondary-gradient text-fixed-white me-2 logo-icon"
                                            ></i>
                                            <p class="fs-16 my-auto">Chrome</p>
                                        </div>
                                        <div class="ms-auto my-auto">
                                            <div class="d-sm-flex text-end">
                                                <span class="my-auto fs-16"
                                                    >35,502</span
                                                >
                                                <span
                                                    class="text-success fs-15 ms-3"
                                                    ><i
                                                        class="fe fe-arrow-up"
                                                    ></i
                                                    >12.75%</span
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="d-md-flex align-items-center browser-stats"
                                    >
                                        <div class="d-flex me-1">
                                            <i
                                                class="ri-opera-fill text-fixed-white bg-danger-gradient me-2 logo-icon"
                                            ></i>
                                            <p class="fs-16 my-auto">Opera</p>
                                        </div>
                                        <div class="ms-auto my-auto">
                                            <div class="d-sm-flex text-end">
                                                <span class="my-auto fs-16"
                                                    >12,563</span
                                                >
                                                <span
                                                    class="text-danger fs-15 ms-3"
                                                    ><i
                                                        class="fe fe-arrow-down"
                                                    ></i
                                                    >15.12%</span
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="d-md-flex align-items-center browser-stats"
                                    >
                                        <div class="d-flex me-1">
                                            <i
                                                class="ri-firefox-fill text-fixed-white bg-purple-gradient me-2 logo-icon"
                                            ></i>
                                            <p class="fs-16 my-auto">IE</p>
                                        </div>
                                        <div class="ms-auto my-auto">
                                            <div class="d-sm-flex text-end">
                                                <span class="my-auto fs-16"
                                                    >25,364</span
                                                >
                                                <span
                                                    class="text-success fs-15 ms-3"
                                                    ><i
                                                        class="fe fe-arrow-up"
                                                    ></i
                                                    >24.37%</span
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="d-md-flex align-items-center browser-stats"
                                    >
                                        <div class="d-flex me-1">
                                            <i
                                                class="ri-edge-fill text-fixed-white bg-info-gradient me-2 logo-icon"
                                            ></i>
                                            <p class="fs-16 my-auto">Firefox</p>
                                        </div>
                                        <div class="ms-auto my-auto">
                                            <div class="d-sm-flex text-end">
                                                <span class="my-auto fs-16"
                                                    >14,635</span
                                                >
                                                <span
                                                    class="text-success fs-15 ms-3"
                                                    ><i
                                                        class="fe fe-arrow-up"
                                                    ></i
                                                    >15,63%</span
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="d-md-flex align-items-center browser-stats"
                                    >
                                        <div class="d-flex me-1">
                                            <i
                                                class="ri-android-fill text-fixed-white bg-success-gradient me-2 logo-icon"
                                            ></i>
                                            <p class="fs-16 my-auto">Android</p>
                                        </div>
                                        <div class="ms-auto my-auto">
                                            <div class="d-sm-flex text-end">
                                                <span class="my-auto fs-16"
                                                    >15,453</span
                                                >
                                                <span
                                                    class="text-danger fs-15 ms-3"
                                                    ><i
                                                        class="fe fe-arrow-down"
                                                    ></i
                                                    >23.70%</span
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-12">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <h4 class="card-title">Daily Activity</h4>
                                </div>
                                <div class="card-body pb-0">
                                    <ul class="task-list">
                                        <li>
                                            <i class="task-icon bg-primary"></i>
                                            <h6 class="fs-14">
                                                Task Finished<span
                                                    class="text-muted fs-11 mx-2"
                                                    >29 Oct 2020</span
                                                >
                                            </h6>
                                            <p class="text-muted fs-12">
                                                Adam Berry finished task on<a
                                                    href="javascript:void(0);"
                                                    class="fw-semibold text-primary"
                                                >
                                                    Project Management</a
                                                >
                                            </p>
                                        </li>
                                        <li>
                                            <i
                                                class="task-icon bg-secondary"
                                            ></i>
                                            <h6 class="fs-14">
                                                New Comment<span
                                                    class="text-muted fs-11 mx-2"
                                                    >25 Oct 2020</span
                                                >
                                            </h6>
                                            <p class="text-muted fs-12">
                                                Victoria commented on Project
                                                <a
                                                    href="javascript:void(0);"
                                                    class="fw-semibold text-primary"
                                                >
                                                    AngularJS Template</a
                                                >
                                            </p>
                                        </li>
                                        <li>
                                            <i class="task-icon bg-primary"></i>
                                            <h6 class="fs-14">
                                                New Comment<span
                                                    class="text-muted fs-11 mx-2"
                                                    >25 Oct 2020</span
                                                >
                                            </h6>
                                            <p class="text-muted fs-12">
                                                Victoria commented on Project
                                                <a
                                                    href="javascript:void(0);"
                                                    class="fw-semibold text-primary"
                                                >
                                                    AngularJS Template</a
                                                >
                                            </p>
                                        </li>
                                        <li>
                                            <i
                                                class="task-icon bg-secondary"
                                            ></i>
                                            <h6 class="fs-14">
                                                Task Overdue<span
                                                    class="text-muted fs-11 mx-2"
                                                    >14 Oct 2020</span
                                                >
                                            </h6>
                                            <p class="text-muted mb-0 fs-12">
                                                Petey Cruiser finished task
                                                <a
                                                    href="javascript:void(0);"
                                                    class="fw-semibold text-primary"
                                                >
                                                    Integrated management</a
                                                >
                                            </p>
                                        </li>
                                        <li>
                                            <i class="task-icon bg-primary"></i>
                                            <h6 class="fs-14">
                                                Task Overdue<span
                                                    class="text-muted fs-11 mx-2"
                                                    >29 Oct 2020</span
                                                >
                                            </h6>
                                            <p class="text-muted mb-0 fs-12">
                                                Petey Cruiser finished task
                                                <a
                                                    href="javascript:void(0);"
                                                    class="fw-semibold text-primary"
                                                >
                                                    Integrated management</a
                                                >
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- COL END -->
                    <!-- ROW-3 END -->
                    <!-- ROW-5 -->
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card custom-card">
                                <div
                                    class="card-header justify-content-between"
                                >
                                    <div class="card-title">
                                        Experts 
                                    </div>
                                </div>
                                <div class="card-body">
                            <div class="table">
                                <table id="responsivemodal-DataTable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Select Category</th>
                                            <th scope="col">Expert Name</th>
                                            <th scope="col">Expert Designation</th>
                                            <th scope="col">Experience</th>
                                            <th scope="col">Qualification</th>
                                            <th scope="col">Expert Language</th>
                                            <!-- <th scope="col">Expert Description</th> -->
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>

                                    @foreach($expert as $experts)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$experts->category->title ?? ''}}</th>
                                        <td>{{$experts->name ?? ''}}</td>
                                        <td>{{$experts->expert_designation ?? ''}}</td>
                                        <td>{{$experts->expert_experience ?? ''}}</td>
                                        <td>{{$experts->expert_qualification ?? ''}}</td>
                                        <td>{{$experts->expert_language ?? ''}}</td>
                                        <!-- <td>{{$experts->expert_description ?? ''}}</td> -->

                                        <td>
                                            <div class="btn-list d-flex">
                                                <a href="expert/{{$experts->id}}/edit" class="btn btn-icon btn-primary btn-wave waves-effect waves-light" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                    <i class="ri-pencil-fill lh-1"></i>
                                                </a>
                                                <a class="btn btn-icon btn-danger btn-wave waves-effect waves-light" data-bs-toggle="modal" href="#exampleModalToggle{{ $experts->id }}" data-bs-original-title="Delete" role="button">
                                                    <i class="ri-delete-bin-7-line lh-1"></i>
                                                </a>
                                            </div>
                                        </td>

                                        
                                    </tr>
                                    @endforeach


                                </table>
                            </div>
                        </div>
                        </div>
                            </div>
                        </div>
                    </div>
                    <!-- ROW-5 END -->
                </div>
          
        @foreach ($expert as $experts)
    <div class="modal fade" id="exampleModalToggle{{ $experts->id }}" aria-labelledby="exampleModalToggleLabel{{ $experts->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalToggleLabel{{ $experts->id }}">Experts</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete?
                </div>
                <div class="modal-footer">
                    <form id="deleteForm{{ $experts->id }}" action="{{ route('expert.destroy', ['id' => $experts->id]) }}" method="POST">
                        @csrf
                        @method('DELETE') 
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </form>
                    <button class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
  
    @endsection