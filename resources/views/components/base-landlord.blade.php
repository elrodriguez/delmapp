<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ env('APP_NAME') }}</title>

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">

    <!-- Perfect Scrollbar -->
    <link type="text/css" href="{{ asset('themes/tutorio/vendor/perfect-scrollbar.css') }}" rel="stylesheet">

    <!-- Fix Footer CSS -->
    <link type="text/css" href="{{ asset('themes/tutorio/vendor/fix-footer.css') }}" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="{{ asset('themes/tutorio/css/material-icons.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('themes/tutorio/css/material-icons.rtl.css') }}" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link type="text/css" href="{{ asset('themes/tutorio/css/fontawesome.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('themes/tutorio/css/fontawesome.rtl.css') }}" rel="stylesheet">

    <!-- Preloader -->
    <link type="text/css" href="{{ asset('themes/tutorio/css/preloader.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('themes/tutorio/css/preloader.rtl.css') }}" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="{{ asset('themes/tutorio/css/app.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('themes/tutorio/css/app.rtl.css') }}" rel="stylesheet">





</head>

<body class="layout-navbar-mini-fixed-bottom">

    <div class="preloader">
        <div class="sk-double-bounce">
            <div class="sk-child sk-double-bounce1"></div>
            <div class="sk-child sk-double-bounce2"></div>
        </div>
    </div>

    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">

        <!-- Header -->
        <div id="header" class="mdk-header bg-dark js-mdk-header mb-0" data-effects="waterfall blend-background" data-fixed data-condenses>
            <div class="mdk-header__content">

                <div class="navbar navbar-expand-sm navbar-dark bg-dark pr-0 pr-md-16pt" id="default-navbar" data-primary>

                    <!-- Navbar toggler -->
                    <button class="navbar-toggler navbar-toggler-right d-block d-md-none" type="button" data-toggle="sidebar">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Navbar Brand -->
                    <a href="index.html" class="navbar-brand">
                        {{-- <img class="navbar-brand-icon mr-0 mr-md-8pt" src="{{ asset('themes/tutorio/images/logo/logo.png') }}" width="30"> --}}
                        <span class="d-none d-md-block">{{ env('APP_NAME') }}</span>
                    </a>

                    <!-- Main Navigation -->

                    <nav class="nav navbar-nav ml-auto flex-nowrap">
                        <div class="nav-item dropdown d-none d-sm-flex ml-16pt">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                <img width="32" height="32" class="rounded-circle" src="{{ asset('themes/tutorio/images/people/50/guy-3.jpg') }}" alt="{{ auth()->user()->email }}" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">


                                <div class="dropdown-header"><strong>{{ auth()->user()->name }}</strong></div>
                                <a class="dropdown-item" href="{{ route('landlord_dashboard') }}">Dashboard</a>
                                <div class="dropdown-divider"></div>
                                <div class="dropdown-header"><strong>Account</strong></div>
                                <a class="dropdown-item" href="student-edit-account.html">Edit Account</a>
                                <a class="dropdown-item" href="{{ route('landlord_logout') }}" type="button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" method="POST" action="{{ route('landlord_logout') }}" style="display:none">@csrf</form>
                            </div>
                        </div>




                        <!-- Notifications dropdown -->
                        <li class="nav-item dropdown dropdown-notifications dropdown-menu-sm-full">
                            <button class="nav-link btn-flush dropdown-toggle" type="button" data-toggle="dropdown" data-dropdown-disable-document-scroll data-caret="false">
                                <i class="material-icons">notifications</i>
                                <span class="badge badge-notifications badge-danger">2</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div data-perfect-scrollbar class="position-relative">
                                    <div class="dropdown-header"><strong>Messages</strong></div>
                                    <div class="list-group list-group-flush mb-0">

                                        <a href="javascript:void(0);" class="list-group-item list-group-item-action unread">
                                            <span class="d-flex align-items-center mb-1">
                                                <small class="text-black-50">5 minutes ago</small>

                                                <span class="ml-auto unread-indicator bg-accent"></span>

                                            </span>
                                            <span class="d-flex">
                                                <span class="avatar avatar-xs mr-2">
                                                    <img src="{{ asset('themes/tutorio/images/people/110/woman-5.jpg') }}" alt="people" class="avatar-img rounded-circle">
                                                </span>
                                                <span class="flex d-flex flex-column">
                                                    <strong>Michelle</strong>
                                                    <span class="text-black-70">Clients loved the new design.</span>
                                                </span>
                                            </span>
                                        </a>

                                        <a href="javascript:void(0);" class="list-group-item list-group-item-action unread">
                                            <span class="d-flex align-items-center mb-1">
                                                <small class="text-black-50">5 minutes ago</small>

                                                <span class="ml-auto unread-indicator bg-accent"></span>

                                            </span>
                                            <span class="d-flex">
                                                <span class="avatar avatar-xs mr-2">
                                                    <img src="{{ asset('themes/tutorio/images/people/110/woman-5.jpg') }}" alt="people" class="avatar-img rounded-circle">
                                                </span>
                                                <span class="flex d-flex flex-column">
                                                    <strong>Michelle</strong>
                                                    <span class="text-black-70">ðŸ”¥ Superb job..</span>
                                                </span>
                                            </span>
                                        </a>

                                    </div>

                                    <div class="dropdown-header"><strong>System notifications</strong></div>
                                    <div class="list-group list-group-flush mb-0">

                                        <a href="javascript:void(0);" class="list-group-item list-group-item-action border-left-3 border-left-danger">
                                            <span class="d-flex align-items-center mb-1">
                                                <small class="text-black-50">3 minutes ago</small>

                                            </span>
                                            <span class="d-flex">
                                                <span class="avatar avatar-xs mr-2">
                                                    <span class="avatar-title rounded-circle bg-light">
                                                        <i class="material-icons font-size-16pt text-danger">account_circle</i>
                                                    </span>
                                                </span>
                                                <span class="flex d-flex flex-column">

                                                    <span class="text-black-70">Your profile information has not been synced correctly.</span>
                                                </span>
                                            </span>
                                        </a>

                                        <a href="javascript:void(0);" class="list-group-item list-group-item-action">
                                            <span class="d-flex align-items-center mb-1">
                                                <small class="text-black-50">5 hours ago</small>

                                            </span>
                                            <span class="d-flex">
                                                <span class="avatar avatar-xs mr-2">
                                                    <span class="avatar-title rounded-circle bg-light">
                                                        <i class="material-icons font-size-16pt text-success">group_add</i>
                                                    </span>
                                                </span>
                                                <span class="flex d-flex flex-column">
                                                    <strong>Adrian. D</strong>
                                                    <span class="text-black-70">Wants to join your private group.</span>
                                                </span>
                                            </span>
                                        </a>

                                        <a href="javascript:void(0);" class="list-group-item list-group-item-action">
                                            <span class="d-flex align-items-center mb-1">
                                                <small class="text-black-50">1 day ago</small>

                                            </span>
                                            <span class="d-flex">
                                                <span class="avatar avatar-xs mr-2">
                                                    <span class="avatar-title rounded-circle bg-light">
                                                        <i class="material-icons font-size-16pt text-warning">storage</i>
                                                    </span>
                                                </span>
                                                <span class="flex d-flex flex-column">

                                                    <span class="text-black-70">Your deploy was successful.</span>
                                                </span>
                                            </span>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- // END Notifications dropdown -->
                    </nav>

                    <!-- // END Main Navigation -->

                </div>

            </div>
        </div>
        <!-- // END Header -->

        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content page-content ">

            <div class="bg-gradient-primary border-bottom-white py-32pt">
                <div class="container d-flex flex-column flex-md-row align-items-center text-center text-md-left">
                    <img src="{{ URL('themes/tutorio/images/illustration/achievement/128/white.svg') }}" width="104" class="mr-md-32pt mb-32pt mb-md-0" alt="instructor">
                    <div class="flex mb-32pt mb-md-0">
                        <h2 class="text-white mb-0">{{ auth()->user()->name }}</h2>
                        <p class="lead text-white-50 d-flex align-items-center">{{ auth()->user()->email }} <span class="ml-16pt d-flex align-items-center"><i class="material-icons icon-16pt mr-4pt">opacity</i> 2,300 IQ</span></p>
                    </div>
                    <a href="{{ route('landlord_customer') }}" class="btn btn-outline-white">Crear cliente</a>
                </div>
            </div>

            <livewire:landlord.nav> 
            
            @yield('content')
        </div>
        <!-- // END Header Layout Content -->

        <div class="bg-footer page-section py-lg-32pt" style="margin-bottom: 0px">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-4 mb-24pt mb-md-0">
                        <p class="text-white-70 mb-8pt"><strong>Follow us</strong></p>
                        <nav class="nav nav-links nav--flush">
                            <a href="#" class="nav-link mr-8pt"><img src="{{ URL('themes/tutorio/images/icon/footer/facebook-square@2x.png') }}" width="24" height="24" alt="Facebook"></a>
                            <a href="#" class="nav-link mr-8pt"><img src="{{ URL('themes/tutorio/images/icon/footer/twitter-square@2x.png') }}" width="24" height="24" alt="Twitter"></a>
                            <a href="#" class="nav-link mr-8pt"><img src="{{ URL('themes/tutorio/images/icon/footer/vimeo-square@2x.png') }}" width="24" height="24" alt="Vimeo"></a>
                            <a href="https://www.youtube.com/channel/UCstzfs_sSsdQGH1WoZuCtTQ" class="nav-link"><img src="{{ URL('themes/tutorio/images/icon/footer/youtube-square@2x.png') }}" width="24" height="24" alt="YouTube"></a>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-4 mb-24pt mb-md-0 d-flex align-items-center">
                        <a href="" class="btn btn-outline-white">English <span class="icon--right material-icons">arrow_drop_down</span></a>
                    </div>
                    <div class="col-md-4 text-md-right">
                        <p class="mb-8pt d-flex align-items-md-center justify-content-md-end">
                            <a href="" class="text-white-70 text-underline mr-16pt">Terms</a>
                            <a href="" class="text-white-70 text-underline">Privacy policy</a>
                        </p>
                        <p class="text-white-50 mb-0">Copyright {{ date('Y') }} &copy; All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- // END Header Layout -->
    @livewireScripts
    <!-- jQuery -->
    <script src="{{ asset('themes/tutorio/vendor/jquery.min.js') }}" defer></script>

    <!-- Bootstrap -->
    <script src="{{ asset('themes/tutorio/vendor/popper.min.js') }}" defer></script>
    <script src="{{ asset('themes/tutorio/vendor/bootstrap.min.js') }}" defer></script>

    <!-- Perfect Scrollbar -->
    <script src="{{ asset('themes/tutorio/vendor/perfect-scrollbar.min.js') }}" defer></script>

    <!-- DOM Factory -->
    <script src="{{ asset('themes/tutorio/vendor/dom-factory.js') }}" defer></script>

    <!-- MDK -->
    <script src="{{ asset('themes/tutorio/vendor/material-design-kit.js') }}" defer></script>

    <!-- Fix Footer -->
    <script src="{{ asset('themes/tutorio/vendor/fix-footer.js') }}" defer></script>

    <!-- App JS -->
    <script src="{{ asset('themes/tutorio/js/app.js') }}" defer></script>

</body>

</html>