<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>Job Seeker | @yield('title', 'Halaman Pencari Kerja')</title>
    <!-- Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Mordenize" />
    <meta name="author" content="" />
    <meta name="keywords" content="Mordenize" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" type="image/png" href="{{ asset('member-template/images/logos/favicon.ico') }}" />
    <link id="themeColors" rel="stylesheet" href="{{ asset('member-template/css/style-aqua.min.css') }}" />
    <style>
        body {
            background-color: #fafafa
        }

        @media (min-width: 1300px) {
            #main-wrapper[data-layout=horizontal][data-sidebar-position=fixed] .body-wrapper>.container-fluid {
                padding-top: 115px !important
            }

            #main-wrapper[data-layout=horizontal] .body-wrapper>.container-fluid,
            #main-wrapper[data-layout=horizontal] .navbar {
                max-width: 1500px
            }

            footer .container {
                max-width: 1450px !important
            }
        }

        .fw-7 {
            font-weight: 700
        }
    </style>
    @stack('css')
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset('member-template/images/logos/favicon.ico') }}" alt="loader"
            class="lds-ripple img-fluid" />
    </div>
    <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="horizontal" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Header Start -->
        <header class="app-header">
            <nav class="navbar navbar-expand-xl navbar-light container-fluid px-0">
                <ul class="navbar-nav">
                    <li class="nav-item d-block d-xl-none">
                        <a class="nav-link sidebartoggler ms-n3" id="sidebarCollapse" href="javascript:void(0)">
                            <i class="ti ti-menu-2"></i>
                        </a>
                    </li>
                    <li class="nav-item d-none d-xl-block">
                        <a href="index.html" class="text-nowrap nav-link">
                            <img src="{{ asset('member-template/images/logos/dark-logo.svg') }}" class="dark-logo"
                                width="180" alt="" />
                            <img src="{{ asset('member-template/images/logos/light-logo.svg') }}" class="light-logo"
                                width="180" alt="" />
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav quick-links d-none d-xl-flex ms-5">
                    <li class="nav-item dropdown hover-dd d-none d-xl-block ms-5">
                        <a class="nav-link" href="{{ route('member.index') }}" data-bs-toggle="dropdown"><i class="ti ti-user me-3 text-primary fs-5"></i> Profile</a>
                    </li>
                    <li class="nav-item dropdown hover-dd d-none d-xl-block">
                        <a class="nav-link" href="javascript:void(0)" data-bs-toggle="dropdown"><i
                                class="ti ti-briefcase me-3 text-primary fs-5"></i> Jobs</a>
                        {{-- <a href="./app-invoice.html" class="d-flex align-items-center pb-9 position-relative    ">
                                                <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                <img src="../../dist/images/svgs/icon-dd-invoice.svg" alt="" class="img-fluid" width="24" height="24">
                                                </div>
                                                <div class="d-inline-block">
                                                <h6 class="mb-1 fw-semibold bg-hover-primary">Invoice App</h6>
                                                <span class="fs-2 d-block text-dark">Get latest invoice</span>
                                                </div>
                                            </a>
                                            <a href="./app-contact2.html" class="d-flex align-items-center pb-9 position-relative    ">
                                                <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                <img src="../../dist/images/svgs/icon-dd-mobile.svg" alt="" class="img-fluid" width="24" height="24">
                                                </div>
                                                <div class="d-inline-block">
                                                <h6 class="mb-1 fw-semibold bg-hover-primary">Contact Application</h6>
                                                <span class="fs-2 d-block text-dark">2 Unsaved Contacts</span>
                                                </div>
                                            </a>
                                            <a href="./app-email.html" class="d-flex align-items-center pb-9 position-relative    ">
                                                <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                <img src="../../dist/images/svgs/icon-dd-message-box.svg" alt="" class="img-fluid" width="24" height="24">
                                                </div>
                                                <div class="d-inline-block">
                                                <h6 class="mb-1 fw-semibold bg-hover-primary">Email App</h6>
                                                <span class="fs-2 d-block text-dark">Get new emails</span>
                                                </div>
                                            </a>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="position-relative">
                                            <a href="./page-user-profile.html" class="d-flex align-items-center pb-9 position-relative    ">
                                                <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                <img src="../../dist/images/svgs/icon-dd-cart.svg" alt="" class="img-fluid" width="24" height="24">
                                                </div>
                                                <div class="d-inline-block">
                                                <h6 class="mb-1 fw-semibold bg-hover-primary">User Profile</h6>
                                                <span class="fs-2 d-block text-dark">learn more information</span>
                                                </div>
                                            </a>
                                            <a href="./app-calendar.html" class="d-flex align-items-center pb-9 position-relative    ">
                                                <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                <img src="../../dist/images/svgs/icon-dd-date.svg" alt="" class="img-fluid" width="24" height="24">
                                                </div>
                                                <div class="d-inline-block">
                                                <h6 class="mb-1 fw-semibold bg-hover-primary">Calendar App</h6>
                                                <span class="fs-2 d-block text-dark">Get dates</span>
                                                </div>
                                            </a>
                                            <a href="./app-contact.html" class="d-flex align-items-center pb-9 position-relative    ">
                                                <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                <img src="../../dist/images/svgs/icon-dd-lifebuoy.svg" alt="" class="img-fluid" width="24" height="24">
                                                </div>
                                                <div class="d-inline-block">
                                                <h6 class="mb-1 fw-semibold bg-hover-primary">Contact List Table</h6>
                                                <span class="fs-2 d-block text-dark">Add new contact</span>
                                                </div>
                                            </a>
                                            <a href="./app-notes.html" class="d-flex align-items-center pb-9 position-relative    ">
                                                <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                <img src="../../dist/images/svgs/icon-dd-application.svg" alt="" class="img-fluid" width="24" height="24">
                                                </div>
                                                <div class="d-inline-block">
                                                <h6 class="mb-1 fw-semibold bg-hover-primary">Notes Application</h6>
                                                <span class="fs-2 d-block text-dark">To-do and Daily tasks</span>
                                                </div>
                                            </a>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center py-3">
                                        <div class="col-8">
                                        <a class="fw-semibold text-dark d-flex align-items-center lh-1 " href="#"><i class="ti ti-help fs-6 me-2"></i>Frequently Asked Questions</a>
                                        </div>
                                        <div class="col-4">
                                        <div class="d-flex justify-content-end pe-4">
                                            <button class="btn btn-primary">Check</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-4 ms-n4">
                                    <div class="position-relative p-7 border-start h-100">
                                    <h5 class="fs-5 mb-9 fw-semibold">Quick Links</h5>
                                    <ul class="">
                                        <li class="mb-3">
                                        <a class="fw-semibold text-dark bg-hover-primary    " href="./page-pricing.html">Pricing Page</a>
                                        </li>
                                        <li class="mb-3">
                                        <a class="fw-semibold text-dark bg-hover-primary    " href="./authentication-login.html">Authentication Design</a>
                                        </li>
                                        <li class="mb-3">
                                        <a class="fw-semibold text-dark bg-hover-primary    " href="./authentication-register.html">Register Now</a>
                                        </li>
                                        <li class="mb-3">
                                        <a class="fw-semibold text-dark bg-hover-primary    " href="authentication-error.html">404 Error Page</a>
                                        </li>
                                        <li class="mb-3">
                                        <a class="fw-semibold text-dark bg-hover-primary    " href="./app-notes.html">Notes App</a>
                                        </li>
                                        <li class="mb-3">
                                        <a class="fw-semibold text-dark bg-hover-primary    " href="./page-user-profile.html">User Application</a>
                                        </li>   
                                        <li class="mb-3">
                                        <a class="fw-semibold text-dark bg-hover-primary    " href="./page-account-settings.html">Account Settings</a>
                                        </li>
                                    </ul>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown-hover d-none d-xl-block">
                        <a class="nav-link" href="app-chat.html">Chat</a>
                        </li>
                        <li class="nav-item dropdown-hover d-none d-xl-block">
                        <a class="nav-link" href="app-calendar.html">Calendar</a>
                        </li>
                        <li class="nav-item dropdown-hover d-none d-xl-block">
                        <a class="nav-link" href="app-email.html">Email</a>
                        </li> --}}
                </ul>
                <div class="d-block d-xl-none">
                    <a href="i{{ route('member.index') }}" class="text-nowrap nav-link">
                        <img src="{{ asset('member-template/images/logos/dark-logo.svg') }}" width="180"
                            alt="" />
                    </a>
                </div>
                <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="p-2">
                        <i class="ti ti-dots fs-7"></i>
                    </span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <div class="d-flex align-items-center justify-content-between px-0 px-xl-8">
                        <a href="javascript:void(0)"
                            class="nav-link round-40 p-1 ps-0 d-flex d-xl-none align-items-center justify-content-center"
                            type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar"
                            aria-controls="offcanvasWithBothOptions">
                            <i class="ti ti-align-justified fs-7"></i>
                        </a>
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ti ti-bell-ringing"></i>
                                    <div class="notification bg-danger rounded-circle"></div>
                                </a>
                                <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                    <div class="d-flex align-items-center justify-content-between py-3 px-7">
                                        <h5 class="mb-0 fs-5 fw-semibold">Notifications</h5>
                                        <span class="badge bg-primary rounded-4 px-3 py-1 lh-sm">1 new</span>
                                    </div>
                                    <div class="message-body" data-simplebar>
                                        <a href="javascript:void(0)"
                                            class="py-6 px-7 d-flex align-items-center dropdown-item">
                                            <span class="me-3">
                                                <img src="../../dist/images/profile/user-1.jpg" alt="user"
                                                    class="rounded-circle" width="48" height="48" />
                                            </span>
                                            <div class="w-75 d-inline-block v-middle">
                                                <h6 class="mb-1 fw-semibold">Roman Joined the Team!</h6>
                                                <span class="d-block">Congratulate him</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="py-6 px-7 mb-1">
                                        <button class="btn btn-outline-primary w-100"> See All Notifications </button>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link pe-0" href="javascript:void(0)" id="drop1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <div class="user-profile-img">
                                            <img src="{{ memberProfileImg(auth()->user()) }}"
                                                class="rounded-circle" width="35" height="35"
                                                alt="" />
                                        </div>
                                        <h6 class="ms-2 my-2 fw-semibold bg-hover-primary d-none d-lg-block">
                                            {{ auth()->user()->name }}</h6>
                                        <i class="ms-3 ti ti-chevron-down d-none d-lg-block"></i>
                                    </div>
                                </a>
                                <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop1">
                                    <div class="profile-dropdown position-relative" data-simplebar>
                                        <div class="py-3 px-7 pb-0">
                                            <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                                        </div>
                                        <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                            <img src="{{ memberProfileImg(auth()->user()) }}"
                                                class="rounded-circle" width="80" height="80"
                                                alt="" />
                                            <div class="ms-3">
                                                <h5 class="mb-1 fs-3">{{ auth()->user()->name }}</h5>
                                                <span class="mb-1 d-block text-dark">Pelamar</span>
                                                <p class="mb-0 d-flex text-dark align-items-center gap-2">
                                                    <i class="ti ti-mail fs-4"></i> {{ auth()->user()->email }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="message-body">
                                            <a href="./page-user-profile.html"
                                                class="py-8 px-7 mt-8 d-flex align-items-center">
                                                <span
                                                    class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                                    <img src="{{ asset('member-template/images/svgs/icon-account.svg') }}"
                                                        alt="" width="24" height="24">
                                                </span>
                                                <div class="w-75 d-inline-block v-middle ps-3">
                                                    <h6 class="mb-1 bg-hover-primary fw-semibold"> My Profile </h6>
                                                    <span class="d-block text-dark">Account Settings</span>
                                                </div>
                                            </a>
                                            {{-- <a href="./app-email.html" class="py-8 px-7 d-flex align-items-center">
                                                <span class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                                <img src="../../dist/images/svgs/icon-inbox.svg" alt="" width="24" height="24">
                                                </span>
                                                <div class="w-75 d-inline-block v-middle ps-3">
                                                <h6 class="mb-1 bg-hover-primary fw-semibold">My Inbox</h6>
                                                <span class="d-block text-dark">Messages & Emails</span>
                                                </div>
                                            </a>
                                            <a href="./app-notes.html" class="py-8 px-7 d-flex align-items-center">
                                                <span class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                                <img src="../../dist/images/svgs/icon-tasks.svg" alt="" width="24" height="24">
                                                </span>
                                                <div class="w-75 d-inline-block v-middle ps-3">
                                                <h6 class="mb-1 bg-hover-primary fw-semibold">My Task</h6>
                                                <span class="d-block text-dark">To-do and Daily Tasks</span>
                                                </div>
                                            </a> --}}
                                        </div>
                                        <div class="d-grid py-4 px-7 pt-8">
                                            <form action="{{ route('front.jobs.logout') }}" method="POST" id="form-logout">@csrf</form>
                                            <a href="javascript:void(0)" class="btn btn-outline-primary" onclick="document.getElementById('form-logout').submit()">Log Out</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <!-- Header End -->
        <!-- Sidebar Start -->
        <aside class="left-sidebar d-md-none">
            <!-- Sidebar scroll-->
            <div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar container-fluid">
                    <ul id="sidebarnav">
                        <!-- ============================= -->
                        <!-- Home -->
                        <!-- ============================= -->
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <!-- =================== -->
                        <!-- Dashboard -->
                        <!-- =================== -->
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow" href="./index.html" aria-expanded="false">
                                <span>
                                    <i class="ti ti-home-2"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="index.html" class="sidebar-link">
                                        <i class="ti ti-aperture"></i>
                                        <span class="hide-menu">Modern</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./index2.html" class="sidebar-link">
                                        <i class="ti ti-shopping-cart"></i>
                                        <span class="hide-menu">eCommerce</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="index3.html" class="sidebar-link">
                                        <i class="ti ti-currency-dollar"></i>
                                        <span class="hide-menu">NFT</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="index4.html" class="sidebar-link">
                                        <i class="ti ti-cpu"></i>
                                        <span class="hide-menu">Crypto</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="index5.html" class="sidebar-link">
                                        <i class="ti ti-activity-heartbeat"></i>
                                        <span class="hide-menu">General</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="index6.html" class="sidebar-link">
                                        <i class="ti ti-playlist"></i>
                                        <span class="hide-menu">Music</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- ============================= -->
                        <!-- Apps -->
                        <!-- ============================= -->
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Apps</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <span>
                                    <i class="ti ti-archive"></i>
                                </span>
                                <span class="hide-menu">Apps</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="app-calendar.html" class="sidebar-link">
                                        <i class="ti ti-calendar"></i>
                                        <span class="hide-menu">Calendar</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="apps-kanban.html" class="sidebar-link">
                                        <i class="ti ti-layout-kanban"></i>
                                        <span class="hide-menu">Kanban</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="app-chat.html" class="sidebar-link">
                                        <i class="ti ti-message-dots"></i>
                                        <span class="hide-menu">Chat</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="./app-email.html" aria-expanded="false">
                                        <span>
                                            <i class="ti ti-mail"></i>
                                        </span>
                                        <span class="hide-menu">Email</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="app-contact.html" class="sidebar-link">
                                        <i class="ti ti-phone"></i>
                                        <span class="hide-menu">Contact Table</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="app-contact2.html" class="sidebar-link">
                                        <i class="ti ti-list-details"></i>
                                        <span class="hide-menu">Contact List</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="app-notes.html" class="sidebar-link">
                                        <i class="ti ti-notes"></i>
                                        <span class="hide-menu">Notes</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="app-invoice.html" class="sidebar-link">
                                        <i class="ti ti-file-text"></i>
                                        <span class="hide-menu">Invoice</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="page-user-profile.html" class="sidebar-link">
                                        <i class="ti ti-user-circle"></i>
                                        <span class="hide-menu">User Profile</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="blog-posts.html" class="sidebar-link">
                                        <i class="ti ti-article"></i>
                                        <span class="hide-menu">Posts</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="blog-detail.html" class="sidebar-link">
                                        <i class="ti ti-details"></i>
                                        <span class="hide-menu">Detail</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="eco-shop.html" class="sidebar-link">
                                        <i class="ti ti-shopping-cart"></i>
                                        <span class="hide-menu">Shop</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="eco-shop-detail.html" class="sidebar-link">
                                        <i class="ti ti-basket"></i>
                                        <span class="hide-menu">Shop Detail</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="eco-product-list.html" class="sidebar-link">
                                        <i class="ti ti-list-check"></i>
                                        <span class="hide-menu">List</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="eco-checkout.html" class="sidebar-link">
                                        <i class="ti ti-brand-shopee"></i>
                                        <span class="hide-menu">Checkout</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- ============================= -->
                        <!-- PAGES -->
                        <!-- ============================= -->
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">PAGES</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <span>
                                    <i class="ti ti-notebook"></i>
                                </span>
                                <span class="hide-menu">Pages</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="page-faq.html" class="sidebar-link">
                                        <i class="ti ti-help"></i>
                                        <span class="hide-menu">FAQ</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="page-account-settings.html" class="sidebar-link">
                                        <i class="ti ti-user-circle"></i>
                                        <span class="hide-menu">Account Setting</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="page-pricing.html" class="sidebar-link">
                                        <i class="ti ti-currency-dollar"></i>
                                        <span class="hide-menu">Pricing</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="widgets-cards.html" class="sidebar-link">
                                        <i class="ti ti-cards"></i>
                                        <span class="hide-menu">Card</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="widgets-banners.html" class="sidebar-link">
                                        <i class="ti ti-ad"></i>
                                        <span class="hide-menu">Banner</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="widgets-charts.html" class="sidebar-link">
                                        <i class="ti ti-chart-bar"></i>
                                        <span class="hide-menu">Charts</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="../../../landingpage/index.html" class="sidebar-link">
                                        <i class="ti ti-app-window"></i>
                                        <span class="hide-menu">Landing Page</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- ============================= -->
                        <!-- UI -->
                        <!-- ============================= -->
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">UI</span>
                        </li>
                        <!-- =================== -->
                        <!-- UI Elements -->
                        <!-- =================== -->
                        <li class="sidebar-item mega-dropdown">
                            <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                                <span class="rounded-3">
                                    <i class="ti ti-layout-grid"></i>
                                </span>
                                <span class="hide-menu">UI Elements</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="./ui-accordian.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Accordian</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./ui-badge.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Badge</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./ui-buttons.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Buttons</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./ui-dropdowns.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Dropdowns</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./ui-modals.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Modals</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./ui-tab.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Tab</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./ui-tooltip-popover.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Tooltip & Popover</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./ui-notification.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Notification</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./ui-progressbar.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Progressbar</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./ui-pagination.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Pagination</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./ui-typography.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Typography</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./ui-bootstrap-ui.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Bootstrap UI</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./ui-breadcrumb.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Breadcrumb</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./ui-offcanvas.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Offcanvas</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./ui-lists.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Lists</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./ui-grid.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Grid</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./ui-carousel.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Carousel</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./ui-scrollspy.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Scrollspy</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./ui-spinner.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Spinner</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./ui-link.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Link</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- ============================= -->
                        <!-- Forms -->
                        <!-- ============================= -->
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Forms</span>
                        </li>
                        <!-- =================== -->
                        <!-- Forms -->
                        <!-- =================== -->
                        <li class="sidebar-item">
                            <a class="sidebar-link two-column has-arrow" href="#" aria-expanded="false">
                                <span class="rounded-3">
                                    <i class="ti ti-file-text"></i>
                                </span>
                                <span class="hide-menu">Forms</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <!-- form elements -->
                                <li class="sidebar-item">
                                    <a href="./form-inputs.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Forms Input</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./form-input-groups.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Input Groups</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./form-input-grid.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Input Grid</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./form-checkbox-radio.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Checkbox & Radios</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./form-bootstrap-touchspin.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Bootstrap Touchspin</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./form-bootstrap-switch.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Bootstrap Switch</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./form-select2.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Select2</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./form-dual-listbox.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Dual Listbox</span>
                                    </a>
                                </li>
                                <!-- form inputs -->
                                <li class="sidebar-item">
                                    <a href="./form-basic.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Basic Form</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./form-vertical.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Form Vertical</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./form-horizontal.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Form Horizontal</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./form-actions.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Form Actions</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./form-row-separator.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Row Separator</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./form-bordered.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Form Bordered</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./form-detail.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Form Detail</span>
                                    </a>
                                </li>
                                <!-- form wizard -->
                                <li class="sidebar-item">
                                    <a href="./form-wizard.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Form Wizard</span>
                                    </a>
                                </li>
                                <!-- Quill Editor -->
                                <li class="sidebar-item">
                                    <a href="./form-editor-quill.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Quill Editor</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- ============================= -->
                        <!-- Tables -->
                        <!-- ============================= -->
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Tables</span>
                        </li>
                        <!-- =================== -->
                        <!-- Bootstrap Table -->
                        <!-- =================== -->
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                                <span class="rounded-3">
                                    <i class="ti ti-layout-sidebar"></i>
                                </span>
                                <span class="hide-menu">Tables</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="./table-basic.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Basic Table</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./table-dark-basic.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Dark Basic Table</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./table-sizing.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Sizing Table</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./table-layout-coloured.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Coloured Table</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./table-datatable-basic.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Basic Initialisation</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./table-datatable-api.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">API</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./table-datatable-advanced.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Advanced Initialisation</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- ============================= -->
                        <!-- Charts -->
                        <!-- ============================= -->
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Charts</span>
                        </li>
                        <!-- =================== -->
                        <!-- Apex Chart -->
                        <!-- =================== -->
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                                <span class="rounded-3">
                                    <i class="ti ti-chart-pie"></i>
                                </span>
                                <span class="hide-menu">Apex Charts</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="./chart-apex-line.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Line Chart</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./chart-apex-area.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Area Chart</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./chart-apex-bar.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Bar Chart</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./chart-apex-pie.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Pie Chart</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./chart-apex-radial.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Radial Chart</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="./chart-apex-radar.html" class="sidebar-link">
                                        <i class="ti ti-circle"></i>
                                        <span class="hide-menu">Radar Chart</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- ============================= -->
                        <!-- Icons -->
                        <!-- ============================= -->
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Icons</span>
                        </li>
                        <!-- =================== -->
                        <!-- Tabler Icon -->
                        <!-- =================== -->
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="./icon-tabler.html" aria-expanded="false">
                                <span class="rounded-3">
                                    <i class="ti ti-archive"></i>
                                </span>
                                <span class="hide-menu">Tabler Icon</span>
                            </a>
                        </li>
                    </ul>
                    <div
                        class="unlimited-access hide-menu bg-light-primary position-relative my-7 rounded d-block d-lg-none">
                        <div class="d-flex">
                            <div class="unlimited-access-title">
                                <h6 class="fw-semibold fs-4 mb-6 text-dark w-85">Unlimited Access</h6>
                                <button class="btn btn-primary fs-2 fw-semibold lh-sm">Signup</button>
                            </div>
                            <div class="unlimited-access-img">
                                <img src="../../dist/images/backgrounds/rocket.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <div class="fixed-profile p-3 bg-light-secondary rounded sidebar-ad mt-3 mx-9 d-block d-lg-none">
                <div class="hstack gap-3 justify-content-between">
                    <div class="john-img">
                        <img src="{{ asset('member-template/images/profile/user-1.jpg') }}" class="rounded-circle" width="42"
                            height="42" alt="">
                    </div>
                    <div class="john-title">
                        <h6 class="mb-0 fs-4">John Doe</h6>
                        <span class="fs-2">Designer</span>
                    </div>
                    <button class="border-0 bg-transparent text-primary ms-2" tabindex="0" type="button"
                        aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout">
                        <i class="ti ti-power fs-6"></i>
                    </button>
                </div>
            </div>
        </aside>
        <!-- Sidebar End -->
        <!-- Main wrapper -->
        <div class="body-wrapper">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        <div class="dark-transparent sidebartoggler"></div>
        <footer class="footer-part bg-dark pt-9 pb-9">
            <div class="container">
                <div class="row justify-content-center justify-content-lg-start my-4">
                    <div class="col-lg-6">
                        <div class="text-center text-lg-start">
                            <p class="mb-0 text-white">All rights reserved by Modernize. Designed &amp; Developed by <a class="text-primary text-hover-primary border-bottom border-primary" href="https://adminmart.com/">Astacode.</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- Import Js Files -->
    <script src="{{ asset('member-template/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('member-template/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('member-template/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- core files -->
    <script src="{{ asset('member-template/js/app.min.js') }}"></script>
    <script src="{{ asset('member-template/js/app.horizontal.init.js') }}"></script>
    <script src="{{ asset('member-template/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('member-template/js/sidebarmenu.js') }}"></script>

    <script src="{{ asset('member-template/js/custom.js') }}"></script>
    @stack('script')
    <!-- current page js files -->
    {{-- <script src="../../dist/libs/owl.carousel/dist/owl.carousel.min.js"></script>
        <script src="../../dist/libs/apexcharts/dist/apexcharts.min.js"></script>
        <script src="../../dist/js/dashboard.js"></script> --}}
</body>

</html>
