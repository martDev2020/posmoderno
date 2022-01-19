<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Mystic Dashboard</title>
    <!-- Iconic Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="vistas\vendors\iconic-fonts\font-awesome\css\all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="vistas\vendors\iconic-fonts\flat-icons\flaticon.css">
    <link rel="stylesheet" href="vistas\vendors\iconic-fonts\cryptocoins\cryptocoins.css">
    <link rel="stylesheet" href="vistas\vendors\iconic-fonts\cryptocoins\cryptocoins-colors.css">
    <!-- Bootstrap core CSS -->
    <link href="vistas\assets\css\bootstrap.min.css" rel="stylesheet">
    <!-- jQuery UI -->
    <link href="vistas\assets\css\jquery-ui.min.css" rel="stylesheet">
    <!-- Page Specific CSS (Slick Slider.css) -->
    <link href="vistas\assets\css\slick.css" rel="stylesheet">
    <!-- Mystic styles -->
    <link href="vistas\assets\css\style.css" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="favicon.ico">

</head>

<body class="ms-body ms-aside-left-open ms-primary-theme ms-has-quickbar">

    <!-- Setting Panel -->
    <div class="ms-toggler ms-settings-toggle ms-d-block-lg">
        <i class="flaticon-paint"></i>
    </div>
    <div class="ms-settings-panel ms-d-block-lg">
        <div class="row">

            <div class="col-xl-4 col-md-4">
                <h4 class="section-title">Customize</h4>
                <div>
                    <label class="ms-switch">
                        <input type="checkbox" id="dark-mode">
                        <span class="ms-switch-slider round"></span>
                    </label>
                    <span> Dark Mode </span>
                </div>
                <div>
                    <label class="ms-switch">
                        <input type="checkbox" id="remove-quickbar">
                        <span class="ms-switch-slider round"></span>
                    </label>
                    <span> Remove Quickbar </span>
                </div>
            </div>
            <div class="col-xl-4 col-md-4">
                <h4 class="section-title">Keyboard Shortcuts</h4>
                <p class="ms-directions mb-0"><code>Esc</code> Close Quick Bar</p>
                <p class="ms-directions mb-0"><code>Alt + (1 -> 6)</code> Open Quick Bar Tab</p>
                <p class="ms-directions mb-0"><code>Alt + Q</code> Enable Quick Bar Configure Mode</p>

            </div>


        </div>
    </div>

    <!-- Preloader -->
    <div id="preloader-wrap">
        <div class="spinner spinner-8">
            <div class="ms-circle1 ms-child"></div>
            <div class="ms-circle2 ms-child"></div>
            <div class="ms-circle3 ms-child"></div>
            <div class="ms-circle4 ms-child"></div>
            <div class="ms-circle5 ms-child"></div>
            <div class="ms-circle6 ms-child"></div>
            <div class="ms-circle7 ms-child"></div>
            <div class="ms-circle8 ms-child"></div>
            <div class="ms-circle9 ms-child"></div>
            <div class="ms-circle10 ms-child"></div>
            <div class="ms-circle11 ms-child"></div>
            <div class="ms-circle12 ms-child"></div>
        </div>
    </div>

    <!-- Overlays -->
    <div class="ms-aside-overlay ms-overlay-left ms-toggler" data-target="#ms-side-nav" data-toggle="slideLeft"></div>
    <div class="ms-aside-overlay ms-overlay-right ms-toggler" data-target="#ms-recent-activity"
        data-toggle="slideRight"></div>

    <!-- Sidebar Navigation Left -->
    <aside id="ms-side-nav" class="side-nav fixed ms-aside-scrollable ms-aside-left">

        <!-- Logo -->
        <div class="logo-sn ms-d-block-lg">
            <a class="pl-0 ml-0 text-center" href="index.html"> <img src="vistas\assets\img\logo.png" alt="logo"> </a>
        </div>

        <!-- Navigation -->
        <ul class="accordion ms-main-aside fs-14" id="side-nav-accordion">
            <!-- Dashboard -->
            <li class="menu-item">
                <a href="#" class="has-chevron" data-toggle="collapse" data-target="#dashboard" aria-expanded="false"
                    aria-controls="dashboard">
                    <span><i class="material-icons fs-16">dashboard</i>Dashboard </span>
                </a>
                <ul id="dashboard" class="collapse" aria-labelledby="dashboard" data-parent="#side-nav-accordion">
                    <li> <a href="index.html">Crypto Currency</a> </li>
                    <li> <a href="pages\dashboard\web-analytics.html"> Web Analytics </a> </li>
                    <li> <a href="pages\dashboard\social-media.html">Social Media</a> </li>
                    <li> <a href="pages\dashboard\project-management.html">Project Management</a> </li>
                    <li> <a href="pages\dashboard\client-management.html">Client Management</a> </li>
                </ul>
            </li>
            <!-- /Dashboard -->
            <li class="menu-item">
                <a href="pages\widgets.html">
                    <span><i class="material-icons fs-16">widgets</i>Widgets</span>
                </a>
            </li>
            <!-- Basic UI Elements -->
            <li class="menu-item">
                <a href="#" class="has-chevron" data-toggle="collapse" data-target="#basic-elements"
                    aria-expanded="false" aria-controls="basic-elements">
                    <span><i class="material-icons fs-16">filter_list</i>Basic UI Elements</span>
                </a>
                <ul id="basic-elements" class="collapse" aria-labelledby="basic-elements"
                    data-parent="#side-nav-accordion">
                    <li> <a href="pages\ui-basic\accordions.html">Accordions</a> </li>
                    <li> <a href="pages\ui-basic\alerts.html">Alerts</a> </li>
                    <li> <a href="pages\ui-basic\buttons.html">Buttons</a> </li>
                    <li> <a href="pages\ui-basic\breadcrumbs.html">Breadcrumbs</a> </li>
                    <li> <a href="pages\ui-basic\badges.html">Badges</a> </li>
                    <li> <a href="pages\ui-basic\cards.html">Cards</a> </li>
                    <li> <a href="pages\ui-basic\progress-bars.html">Progress Bars</a> </li>
                    <li> <a href="pages\ui-basic\preloaders.html">Pre-loaders</a> </li>
                    <li> <a href="pages\ui-basic\pagination.html">Pagination</a> </li>
                    <li> <a href="pages\ui-basic\tabs.html">Tabs</a> </li>

                    <li> <a href="pages\ui-basic\typography.html">Typography</a> </li>
                </ul>
            </li>
            <!-- /Basic UI Elements -->
            <!-- Advanced UI Elements -->
            <li class="menu-item">
                <a href="#" class="has-chevron" data-toggle="collapse" data-target="#advanced-elements"
                    aria-expanded="false" aria-controls="advanced-elements">
                    <span><i class="material-icons fs-16">code</i>Advanced UI Elements</span>
                </a>
                <ul id="advanced-elements" class="collapse" aria-labelledby="advanced-elements"
                    data-parent="#side-nav-accordion">
                    <li> <a href="pages\ui-advanced\draggables.html">Draggables</a> </li>
                    <li> <a href="pages\ui-advanced\sliders.html">Sliders</a> </li>
                    <li> <a href="pages\ui-advanced\modals.html">Modals</a> </li>
                    <li> <a href="pages\ui-advanced\rating.html">Rating</a> </li>
                    <li> <a href="pages\ui-advanced\tour.html">Tour</a> </li>
                    <li> <a href="pages\ui-advanced\cropper.html">Cropper</a> </li>
                    <li> <a href="pages\ui-advanced\range-slider.html">Range Slider</a> </li>
                </ul>
            </li>
            <!-- /Advanced UI Elements -->
            <li class="menu-item">
                <a href="pages\animation.html">
                    <span><i class="material-icons fs-16">format_paint</i>Animations</span>
                </a>
            </li>
            <!-- Form Elements -->
            <li class="menu-item">
                <a href="#" class="has-chevron" data-toggle="collapse" data-target="#form-elements"
                    aria-expanded="false" aria-controls="form-elements">
                    <span><i class="material-icons fs-16">input</i>Form Elements</span>
                </a>
                <ul id="form-elements" class="collapse" aria-labelledby="form-elements"
                    data-parent="#side-nav-accordion">
                    <li> <a href="pages\form\form-elements.html">Form Elements</a> </li>
                    <li> <a href="pages\form\form-layout.html">Form Layouts</a> </li>
                    <li> <a href="pages\form\form-validation.html">Form Validation</a> </li>
                    <li> <a href="pages\form\form-wizard.html">Form Wizard</a> </li>
                </ul>
            </li>
            <!-- /Form Elements -->
            <!-- Charts -->
            <li class="menu-item">
                <a href="#" class="has-chevron" data-toggle="collapse" data-target="#charts" aria-expanded="false"
                    aria-controls="charts">
                    <span><i class="material-icons fs-16">equalizer</i>Charts</span>
                </a>
                <ul id="charts" class="collapse" aria-labelledby="charts" data-parent="#side-nav-accordion">
                    <li> <a href="pages\charts\chartjs.html">Chart JS</a> </li>
                    <li> <a href="pages\charts\morris-charts.html">Morris Chart</a> </li>
                </ul>
            </li>
            <!-- /Charts -->
            <!-- Tables -->
            <li class="menu-item">
                <a href="#" class="has-chevron" data-toggle="collapse" data-target="#tables" aria-expanded="false"
                    aria-controls="tables">
                    <span><i class="material-icons fs-16">tune</i>Tables</span>
                </a>
                <ul id="tables" class="collapse" aria-labelledby="tables" data-parent="#side-nav-accordion">
                    <li> <a href="pages\tables\basic-tables.html">Basic Tables</a> </li>
                    <li> <a href="pages\tables\data-tables.html">Data tables</a> </li>
                </ul>
            </li>
            <!-- /Tables -->
            <!-- Popups -->
            <li class="menu-item">
                <a href="#" class="has-chevron" data-toggle="collapse" data-target="#popups" aria-expanded="false"
                    aria-controls="popups">
                    <span><i class="material-icons fs-16">message</i>Popups</span>
                </a>
                <ul id="popups" class="collapse" aria-labelledby="popups" data-parent="#side-nav-accordion">
                    <li> <a href="pages\popups\sweet-alerts.html">Sweet Alerts</a> </li>
                    <li> <a href="pages\popups\toast.html">Toast</a> </li>
                </ul>
            </li>
            <!-- /Popups -->
            <!-- Icons -->
            <li class="menu-item">
                <a href="#" class="has-chevron" data-toggle="collapse" data-target="#icons" aria-expanded="false"
                    aria-controls="icons">
                    <span><i class="material-icons fs-16">border_color</i>Icons</span>
                </a>
                <ul id="icons" class="collapse" aria-labelledby="icons" data-parent="#side-nav-accordion">
                    <li> <a href="pages\icons\fontawesome.html">Fontawesome</a> </li>
                    <li> <a href="pages\icons\flaticons.html">Flaticons</a> </li>
                    <li> <a href="pages\icons\materialize.html">Materialize</a> </li>
                </ul>
            </li>
            <!-- /Icons -->
            <!-- Maps -->
            <li class="menu-item">
                <a href="#" class="has-chevron" data-toggle="collapse" data-target="#maps" aria-expanded="false"
                    aria-controls="maps">
                    <span><i class="material-icons fs-16">map</i>Maps</span>
                </a>
                <ul id="maps" class="collapse" aria-labelledby="maps" data-parent="#side-nav-accordion">
                    <li> <a href="pages\maps\google-maps.html">Google Maps</a> </li>
                    <li> <a href="pages\maps\vector-maps.html">Vector Maps</a> </li>
                </ul>
            </li>
            <!-- /Maps -->
            <!-- Pages -->
            <li class="menu-item">
                <a href="#" class="has-chevron" data-toggle="collapse" data-target="#pages" aria-expanded="false"
                    aria-controls="pages">
                    <span><i class="material-icons fs-16">insert_drive_file</i>Pages</span>
                </a>
                <ul id="pages" class="collapse" aria-labelledby="pages" data-parent="#side-nav-accordion">
                    <li class="menu-item">
                        <a href="#" class="has-chevron" data-toggle="collapse" data-target="#authentication"
                            aria-expanded="false" aria-controls="authentication">Authentication</a>
                        <ul id="authentication" class="collapse" aria-labelledby="authentication" data-parent="#pages">
                            <li> <a href="pages\prebuilt-pages\default-login.html">Default Login</a> </li>
                            <li> <a href="pages\prebuilt-pages\modal-login.html">Modal Login</a> </li>
                            <li> <a href="pages\prebuilt-pages\default-register.html">Default Registration</a> </li>
                            <li> <a href="pages\prebuilt-pages\modal-register.html">Modal Registration</a> </li>
                            <li> <a href="pages\prebuilt-pages\lock-screen.html">Lock Screen</a> </li>
                        </ul>
                    </li>
                    <li> <a href="pages\prebuilt-pages\coming-soon.html">Coming Soon</a> </li>
                    <li> <a href="pages\prebuilt-pages\error.html">Error Page</a> </li>
                    <li class="menu-item"> <a href="pages\prebuilt-pages\faq.html"> FAQ </a> </li>
                    <li class="menu-item"> <a href="pages\prebuilt-pages\portfolio.html"> Portfolio </a> </li>
                    <li class="menu-item"> <a href="pages\prebuilt-pages\user-profile.html"> User Profile </a> </li>
                    <li class="menu-item"> <a href="pages\prebuilt-pages\invoice.html"> Invoice </a> </li>
                </ul>
            </li>
            <!-- /Pages -->
            <!-- Apps -->
            <li class="menu-item">
                <a href="#" class="has-chevron" data-toggle="collapse" data-target="#apps" aria-expanded="false"
                    aria-controls="apps">
                    <span><i class="material-icons fs-16">phone_iphone</i>Apps</span>
                </a>
                <ul id="apps" class="collapse" aria-labelledby="apps" data-parent="#side-nav-accordion">
                    <li> <a href="pages\apps\chat.html">Chat</a> </li>
                    <li> <a href="pages\apps\email.html">Email</a> </li>
                    <li> <a href="pages\apps\to-do-list.html">To-do List</a> </li>
                </ul>
            </li>
            <!-- /Apps -->
        </ul>


    </aside>

    <!-- Sidebar Right -->
    <aside id="ms-recent-activity" class="side-nav fixed ms-aside-right ms-scrollable">

        <div class="ms-aside-header">
            <ul class="nav nav-tabs tabs-bordered d-flex nav-justified mb-3" role="tablist">
                <li role="presentation" class="fs-12"><a href="#activityLog" aria-controls="activityLog" class="active"
                        role="tab" data-toggle="tab"> Activity Log</a></li>
                <li role="presentation" class="fs-12"><a href="#recentPosts" aria-controls="recentPosts" role="tab"
                        data-toggle="tab"> Settings </a></li>
                <li><button type="button" class="close ms-toggler text-center" data-target="#ms-recent-activity"
                        data-toggle="slideRight"><span aria-hidden="true">&times;</span></button></li>
            </ul>
        </div>

        <div class="ms-aside-body">

            <div class="tab-content">

                <div role="tabpanel" class="tab-pane active fade show" id="activityLog">
                    <ul class="ms-activity-log">
                        <li>
                            <div class="ms-btn-icon btn-pill icon btn-light">
                                <i class="flaticon-gear"></i>
                            </div>
                            <h6>Update 1.0.0 Pushed</h6>
                            <span> <i class="material-icons">event</i>1 January, 2020</span>
                            <p class="fs-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque
                                scelerisque diam non nisi semper, ula in sodales vehicula....</p>
                        </li>
                        <li>
                            <div class="ms-btn-icon btn-pill icon btn-success">
                                <i class="flaticon-tick-inside-circle"></i>
                            </div>
                            <h6>Profile Updated</h6>
                            <span> <i class="material-icons">event</i>4 March, 2018</span>
                            <p class="fs-14">Curabitur purus sem, malesuada eu luctus eget, suscipit sed turpis. Nam
                                pellentesque felis vitae justo accumsan, sed semper nisi sollicitudin...</p>
                        </li>
                        <li>
                            <div class="ms-btn-icon btn-pill icon btn-warning">
                                <i class="flaticon-alert-1"></i>
                            </div>
                            <h6>Your payment is due</h6>
                            <span> <i class="material-icons">event</i>1 January, 2020</span>
                            <p class="fs-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque
                                scelerisque diam non nisi semper, ula in sodales vehicula....</p>
                        </li>
                        <li>
                            <div class="ms-btn-icon btn-pill icon btn-danger">
                                <i class="flaticon-alert"></i>
                            </div>
                            <h6>Database Error</h6>
                            <span> <i class="material-icons">event</i>4 March, 2018</span>
                            <p class="fs-14">Curabitur purus sem, malesuada eu luctus eget, suscipit sed turpis. Nam
                                pellentesque felis vitae justo accumsan, sed semper nisi sollicitudin...</p>
                        </li>
                        <li>
                            <div class="ms-btn-icon btn-pill icon btn-info">
                                <i class="flaticon-information"></i>
                            </div>
                            <h6>Checkout what's Trending</h6>
                            <span> <i class="material-icons">event</i>1 January, 2020</span>
                            <p class="fs-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque
                                scelerisque diam non nisi semper, ula in sodales vehicula....</p>
                        </li>
                        <li>
                            <div class="ms-btn-icon btn-pill icon btn-secondary">
                                <i class="flaticon-diamond"></i>
                            </div>
                            <h6>Your Dashboard is ready</h6>
                            <span> <i class="material-icons">event</i>4 March, 2018</span>
                            <p class="fs-14">Curabitur purus sem, malesuada eu luctus eget, suscipit sed turpis. Nam
                                pellentesque felis vitae justo accumsan, sed semper nisi sollicitudin...</p>
                        </li>
                    </ul>
                    <a href="#" class="btn btn-primary d-block"> View All </a>
                </div>

                <div role="tabpanel" class="tab-pane fade" id="recentPosts">

                    <h6>General Settings</h6>
                    <div class="ms-form-group">
                        <span class="ms-option-name fs-14">Location Tracking</span>
                        <label class="ms-switch float-right">
                            <input type="checkbox">
                            <span class="ms-switch-slider round"></span>
                        </label>
                    </div>
                    <div class="ms-form-group">
                        <span class="ms-option-name fs-14">Allow Notifications</span>
                        <label class="ms-switch float-right">
                            <input type="checkbox">
                            <span class="ms-switch-slider round"></span>
                        </label>
                    </div>
                    <div class="ms-form-group">
                        <span class="ms-option-name fs-14">Allow Popups</span>
                        <label class="ms-switch float-right">
                            <input type="checkbox" checked="">
                            <span class="ms-switch-slider round"></span>
                        </label>
                    </div>
                    <h6>Log Settings</h6>
                    <div class="ms-form-group">
                        <span class="ms-option-name fs-14">Enable Logging</span>
                        <label class="ms-switch float-right">
                            <input type="checkbox" checked="">
                            <span class="ms-switch-slider round"></span>
                        </label>
                    </div>
                    <div class="ms-form-group">
                        <span class="ms-option-name fs-14">Audit Logs</span>
                        <label class="ms-switch float-right">
                            <input type="checkbox">
                            <span class="ms-switch-slider round"></span>
                        </label>
                    </div>
                    <div class="ms-form-group">
                        <span class="ms-option-name fs-14">Error Logs</span>
                        <label class="ms-switch float-right">
                            <input type="checkbox" checked="">
                            <span class="ms-switch-slider round"></span>
                        </label>
                    </div>
                    <h6>Advanced Settings</h6>
                    <div class="ms-form-group">
                        <span class="ms-option-name fs-14">Enable Logging</span>
                        <label class="ms-switch float-right">
                            <input type="checkbox" checked="">
                            <span class="ms-switch-slider round"></span>
                        </label>
                    </div>
                    <div class="ms-form-group">
                        <span class="ms-option-name fs-14">Audit Logs</span>
                        <label class="ms-switch float-right">
                            <input type="checkbox">
                            <span class="ms-switch-slider round"></span>
                        </label>
                    </div>
                    <div class="ms-form-group">
                        <span class="ms-option-name fs-14">Error Logs</span>
                        <label class="ms-switch float-right">
                            <input type="checkbox" checked="">
                            <span class="ms-switch-slider round"></span>
                        </label>
                    </div>

                </div>

            </div>

        </div>

    </aside>

    <!-- Main Content -->
    <main class="body-content">

        <!-- Navigation Bar -->
        <nav class="navbar ms-navbar">

            <div class="ms-aside-toggler ms-toggler pl-0" data-target="#ms-side-nav" data-toggle="slideLeft">
                <span class="ms-toggler-bar bg-primary"></span>
                <span class="ms-toggler-bar bg-primary"></span>
                <span class="ms-toggler-bar bg-primary"></span>
            </div>

            <div class="logo-sn logo-sm ms-d-block-sm">
                <a class="pl-0 ml-0 text-center navbar-brand mr-0" href="index.html"><img
                        src="vistas\assets\img\logo-sm-dark.png" alt="logo"> </a>
            </div>

            <ul class="ms-nav-list ms-inline mb-0" id="ms-nav-options">
                <li class="ms-nav-item ms-search-form pb-0 py-0">
                    <form class="ms-form" method="post">
                        <div class="ms-form-group my-0 mb-0 has-icon fs-14">
                            <input type="search" class="ms-form-input" name="search" placeholder="Search here..."
                                value="">
                            <i class="flaticon-search text-disabled"></i>
                        </div>
                    </form>
                </li>
                <li class="ms-nav-item dropdown">
                    <a href="#" class="text-disabled ms-has-notification" id="mailDropdown" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><i class="flaticon-mail"></i></a>
                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="mailDropdown">
                        <li class="dropdown-menu-header">
                            <h6 class="dropdown-header ms-inline m-0"><span class="text-disabled">Mail</span></h6><span
                                class="badge badge-pill badge-success">3 New</span>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li class="ms-scrollable ms-dropdown-list">
                            <a class="media p-2" href="#">
                                <div class="ms-chat-status ms-status-offline ms-chat-img mr-2 align-self-center">
                                    <img src="vistas\assets\img\people\people-5.jpg" class="ms-img-round" alt="people">
                                </div>
                                <div class="media-body">
                                    <span>Hey man, looking forward to your new project.</span>
                                    <p class="fs-10 my-1 text-disabled"><i class="material-icons">access_time</i> 30
                                        seconds ago</p>
                                </div>
                            </a>
                            <a class="media p-2" href="#">
                                <div class="ms-chat-status ms-status-online ms-chat-img mr-2 align-self-center">
                                    <img src="vistas\assets\img\people\people-9.jpg" class="ms-img-round" alt="people">
                                </div>
                                <div class="media-body">
                                    <span>Dear John, I was told you bought Mystic! Send me your feedback</span>
                                    <p class="fs-10 my-1 text-disabled"><i class="material-icons">access_time</i> 28
                                        minutes ago</p>
                                </div>
                            </a>
                            <a class="media p-2" href="#">
                                <div class="ms-chat-status ms-status-offline ms-chat-img mr-2 align-self-center">
                                    <img src="vistas\assets\img\people\people-3.jpg" class="ms-img-round" alt="people">
                                </div>
                                <div class="media-body">
                                    <span>How many people are we inviting to the dashboard?</span>
                                    <p class="fs-10 my-1 text-disabled"><i class="material-icons">access_time</i> 6
                                        hours ago</p>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li class="dropdown-menu-footer text-center">
                            <a href="apps/email.html">Go to Inbox</a>
                        </li>
                    </ul>
                </li>
                <li class="ms-nav-item dropdown">
                    <a href="#" class="text-disabled ms-has-notification" id="notificationDropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                            class="flaticon-bell"></i></a>
                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="notificationDropdown">
                        <li class="dropdown-menu-header">
                            <h6 class="dropdown-header ms-inline m-0"><span class="text-disabled">Notifications</span>
                            </h6><span class="badge badge-pill badge-info">4 New</span>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li class="ms-scrollable ms-dropdown-list">
                            <a class="media p-2" href="#">
                                <div class="media-body">
                                    <span>12 ways to improve your crypto dashboard</span>
                                    <p class="fs-10 my-1 text-disabled"><i class="material-icons">access_time</i> 30
                                        seconds ago</p>
                                </div>
                            </a>
                            <a class="media p-2" href="#">
                                <div class="media-body">
                                    <span>You have newly registered users</span>
                                    <p class="fs-10 my-1 text-disabled"><i class="material-icons">access_time</i> 45
                                        minutes ago</p>
                                </div>
                            </a>
                            <a class="media p-2" href="#">
                                <div class="media-body">
                                    <span>Your account was logged in from an unauthorized IP</span>
                                    <p class="fs-10 my-1 text-disabled"><i class="material-icons">access_time</i> 2
                                        hours ago</p>
                                </div>
                            </a>
                            <a class="media p-2" href="#">
                                <div class="media-body">
                                    <span>An application form has been submitted</span>
                                    <p class="fs-10 my-1 text-disabled"><i class="material-icons">access_time</i> 1 day
                                        ago</p>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li class="dropdown-menu-footer text-center">
                            <a href="#">View all Notifications</a>
                        </li>
                    </ul>
                </li>
                <li class="ms-nav-item">
                    <a href="#" class="text-disabled ms-toggler" data-target="#ms-recent-activity"
                        data-toggle="slideRight"><i class="flaticon-menu"></i></a>
                </li>
                <li class="ms-nav-item ms-nav-user dropdown">
                    <a href="#" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="ms-user-img ms-img-round float-right" src="vistas\assets\img\people\people-5.jpg"
                            alt="people"> </a>
                    <ul class="dropdown-menu dropdown-menu-right user-dropdown" aria-labelledby="userDropdown">
                        <li class="dropdown-menu-header">
                            <h6 class="dropdown-header ms-inline m-0"><span class="text-disabled">Welcome, Anny
                                    Farisha</span></h6>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li class="ms-dropdown-list">
                            <a class="media fs-14 p-2" href="pages\prebuilt-pages\user-profile.html"> <span><i
                                        class="flaticon-user mr-2"></i> Profile</span> </a>
                            <a class="media fs-14 p-2" href="pages\apps\email.html"> <span><i
                                        class="flaticon-mail mr-2"></i> Inbox</span> <span
                                    class="badge badge-pill badge-info">3</span> </a>
                            <a class="media fs-14 p-2" href="pages\prebuilt-pages\user-profile.html"> <span><i
                                        class="flaticon-gear mr-2"></i> Account Settings</span> </a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li class="dropdown-menu-footer">
                            <a class="media fs-14 p-2" href="pages\prebuilt-pages\lock-screen.html"> <span><i
                                        class="flaticon-security mr-2"></i> Lock</span> </a>
                        </li>
                        <li class="dropdown-menu-footer">
                            <a class="media fs-14 p-2" href="pages\prebuilt-pages\default-login.html"> <span><i
                                        class="flaticon-shut-down mr-2"></i> Logout</span> </a>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="ms-toggler ms-d-block-sm pr-0 ms-nav-toggler" data-toggle="slideDown"
                data-target="#ms-nav-options">
                <span class="ms-toggler-bar bg-primary"></span>
                <span class="ms-toggler-bar bg-primary"></span>
                <span class="ms-toggler-bar bg-primary"></span>
            </div>

        </nav>


        <!-- Body Content Wrapper -->
        <div class="ms-content-wrapper">
            <div class="row">

                <!-- News Flash -->
                <div class="col-md-12">
                    <div class="ms-panel">
                        <div class="ms-panel-body ms-news-flash-container">
                            <div class="ms-news-update">
                                <span>News Update</span>
                            </div>
                            <ul id="news-flash">
                                <li data-update="item1">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In non dui purus. Mauris
                                        id lacinia turpis</p>
                                </li>
                                <li data-update="item2">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In non dui purus. Mauris
                                        id lacinia turpis</p>
                                </li>
                                <li data-update="item3">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In non dui purus. Mauris
                                        id lacinia turpis</p>
                                </li>
                                <li data-update="item4">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In non dui purus. Mauris
                                        id lacinia turpis</p>
                                </li>
                                <li data-update="item5">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In non dui purus. Mauris
                                        id lacinia turpis</p>
                                </li>
                                <li data-update="item6">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In non dui purus. Mauris
                                        id lacinia turpis</p>
                                </li>
                                <li data-update="item7">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In non dui purus. Mauris
                                        id lacinia turpis</p>
                                </li>
                                <li data-update="item8">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In non dui purus. Mauris
                                        id lacinia turpis</p>
                                </li>
                                <li data-update="item9">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In non dui purus. Mauris
                                        id lacinia turpis</p>
                                </li>
                                <li data-update="item10">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In non dui purus. Mauris
                                        id lacinia turpis</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Crypto Slider -->
                <div class="col-md-12">
                    <div class="ms-panel">
                        <div class="ms-panel-body p-0 ms-crypto-overview-slider">
                            <div class="ms-crypto-overview">
                                <i class="cc BTC"></i>
                                <span>BTC $1,119</span>
                            </div>
                            <div class="ms-crypto-overview">
                                <i class="cc LTC"></i>
                                <span>LTC $1,119</span>
                            </div>
                            <div class="ms-crypto-overview">
                                <i class="cc ETH"></i>
                                <span>ETH $1,119</span>
                            </div>
                            <div class="ms-crypto-overview">
                                <i class="cc PPC-alt"></i>
                                <span>PPC $1,119</span>
                            </div>
                            <div class="ms-crypto-overview">
                                <i class="cc ZEC-alt"></i>
                                <span>ZEC $1,119</span>
                            </div>
                            <div class="ms-crypto-overview">
                                <i class="cc XLM"></i>
                                <span>XLM $1,119</span>
                            </div>
                            <div class="ms-crypto-overview">
                                <i class="cc KOBO"></i>
                                <span>KOBO $1,119</span>
                            </div>
                            <div class="ms-crypto-overview">
                                <i class="cc ADA-alt"></i>
                                <span>ADA $1,119</span>
                            </div>
                            <div class="ms-crypto-overview">
                                <i class="cc AMP"></i>
                                <span>AMP $1,119</span>
                            </div>
                            <div class="ms-crypto-overview">
                                <i class="cc EOS-alt"></i>
                                <span>EOS $1,119</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Infographics -->
                <div class="col-xl-3 col-sm-6 col-md-6">
                    <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">
                        <div class="ms-card-body media">
                            <i class="cc BTC"></i>
                            <div class="media-body">
                                <span>1 BTC = $4,500</span>
                                <h2>Bitcoin</h2>
                            </div>
                        </div>
                        <canvas id="bitcoin-chart"></canvas>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-md-6">
                    <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">
                        <div class="ms-card-body media">
                            <i class="cc ETH"></i>
                            <div class="media-body">
                                <span>1 ETH = $500</span>
                                <h2>Ethereum</h2>
                            </div>
                        </div>
                        <canvas id="ethereum-chart"></canvas>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-md-6">
                    <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">
                        <div class="ms-card-body media">
                            <i class="cc ZEC-alt"></i>
                            <div class="media-body">
                                <span>1 ZEC = $1,500</span>
                                <h2>ZCash</h2>
                            </div>
                        </div>
                        <canvas id="zcash-chart"></canvas>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-md-6">
                    <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">
                        <div class="ms-card-body media">
                            <i class="cc PPC-alt"></i>
                            <div class="media-body">
                                <span>1 PPC = $1,100</span>
                                <h2>Peercoin</h2>
                            </div>
                        </div>
                        <canvas id="peercoin-chart"></canvas>
                    </div>
                </div>

                <!-- Bitcoin rating graph -->
                <div class="col-xl-7 col-md-12">
                    <div class="ms-panel ms-panel-fh ms-crypto-rating">
                        <div class="ms-panel-header header-mini">
                            <div class="d-flex justify-content-between">
                                <div class="ms-header-text">
                                    <h6>Bitcoin Rating Graph</h6>
                                    <p>Real time Crypto information and rating data</p>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a href="#" class="has-chevron" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="cc BTC"></i> Bitcoin
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="ms-dropdown-list">
                                        <a class="media p-2" href="#">
                                            <div class="media-body">
                                                <span>Ethereum</span>
                                            </div>
                                        </a>
                                        <a class="media p-2" href="#">
                                            <div class="media-body">
                                                <span>ZCash</span>
                                            </div>
                                        </a>
                                        <a class="media p-2" href="#">
                                            <div class="media-body">
                                                <span>Peer Coin</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="ms-panel-body">
                            <canvas id="crypto-rating-graph"></canvas>
                        </div>
                    </div>
                </div>

                <!-- News Highlightsy -->
                <div class="col-xl-5 col-md-12">
                    <div class="ms-panel ms-news-highlight">
                        <a href="#">
                            <div class="ms-panel-body">
                                <span class="badge badge-warning">Bitcoin</span>
                                <h2>Bitcoin Cash’s Birthday, Binance Acquires Trust Wallet, Wikipedia Rejects ICO,
                                    Krugman Predicts Crypto Collapse, More Regulation in Japan</h2>
                                <span><i class="material-icons">date_range</i> 10 Minutes Ago</span>
                            </div>
                        </a>
                    </div>

                    <div class="ms-panel ms-news-highlight">
                        <a href="#">
                            <div class="ms-panel-body">
                                <span class="badge badge-primary">Ethereum</span>
                                <h2>Coinbase Adds XRP Support, Goldman Sachs Crypto Custody, Starbucks Denies BTC
                                    Rumors, Bank of Thailand Approves Crypto, Bitmain Confirms Texas Facility</h2>
                                <span> <i class="material-icons">date_range</i> 1 Day Ago</span>
                            </div>
                        </a>
                    </div>

                    <div class="ms-panel ms-news-highlight">
                        <a href="#">
                            <div class="ms-panel-body">
                                <span class="badge badge-light">Cryptocurrency</span>
                                <h2>How to keep your cryptocurrency: 5 things you should know</h2>
                                <span> <i class="material-icons">date_range</i> 2 Days Ago</span>
                            </div>
                        </a>
                    </div>

                </div>

                <!-- Orders -->
                <div class="col-xl-6 col-md-12">
                    <div class="ms-panel ms-panel-fh ms-crypto-orders">
                        <div class="ms-panel-header">
                            <div class="d-flex justify-content-between">
                                <div class="ms-header-text">
                                    <h6>Current Orders</h6>
                                    <p>Manage your current sale and buy orders</p>
                                </div>
                                <ul class="btn-group btn-group-toggle nav nav-tabs ms-graph-metrics" role="tablist">
                                    <li role="presentation"><a href="#b-orders" aria-controls="b-orders"
                                            class="active show btn btn-sm btn-outline-primary" role="tab"
                                            data-toggle="tab"> Buy Orders </a></li>
                                    <li role="presentation"><a href="#s-orders" aria-controls="s-orders"
                                            class="btn btn-sm btn-outline-primary" role="tab" data-toggle="tab"> Sell
                                            Orders </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="ms-panel-body p-0">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active show fade in" id="b-orders">
                                    <div class="table-responsive">
                                        <table class="table table-hover thead-light">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Price ($)</th>
                                                    <th scope="col">Amount</th>
                                                    <th scope="col">Track ID</th>
                                                    <th scope="col">Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>$7860.24</td>
                                                    <td><i class="cc BTC"></i> 0.528</td>
                                                    <td>#TR34351</td>
                                                    <td>12.01.2020</td>
                                                </tr>
                                                <tr>
                                                    <td>$5813.44</td>
                                                    <td><i class="cc ETH"></i>0.345</td>
                                                    <td>#TR34351</td>
                                                    <td>12.01.2020</td>
                                                </tr>
                                                <tr>
                                                    <td>$1264.99</td>
                                                    <td><i class="cc BTC"></i>0.117</td>
                                                    <td>#TR34351</td>
                                                    <td>12.01.2020</td>
                                                </tr>
                                                <tr>
                                                    <td>$3789.31</td>
                                                    <td><i class="cc PPC-alt"></i>0.217</td>
                                                    <td>#TR34351</td>
                                                    <td>12.01.2020</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="s-orders">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Price ($)</th>
                                                    <th scope="col">Amount</th>
                                                    <th scope="col">Track ID</th>
                                                    <th scope="col">Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>$7860.24</td>
                                                    <td><i class="cc BTC"></i> 0.528</td>
                                                    <td>#TR34351</td>
                                                    <td>12.01.2020</td>
                                                </tr>
                                                <tr>
                                                    <td>$3360.14</td>
                                                    <td><i class="cc ETH"></i>0.215</td>
                                                    <td>#TR34351</td>
                                                    <td>12.01.2020</td>
                                                </tr>
                                                <tr>
                                                    <td>$1264.99</td>
                                                    <td><i class="cc BTC"></i>0.117</td>
                                                    <td>#TR34351</td>
                                                    <td>12.01.2020</td>
                                                </tr>
                                                <tr>
                                                    <td>$3789.31</td>
                                                    <td><i class="cc PPC-alt"></i>0.217</td>
                                                    <td>#TR34351</td>
                                                    <td>12.01.2020</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Active Orders Graph -->
                <div class="col-xl-6 col-md-12">
                    <div class="ms-panel ms-panel-fh">
                        <div class="ms-panel-header">
                            <h6>Active Orders</h6>
                            <p>Real time Crypto information and rating data</p>
                        </div>
                        <div class="ms-panel-body">

                            <div class="row">
                                <div class="col-xl-4 col-md-4">
                                    <div class="ms-graph-labels column-direction">
                                        <div class="ms-chart-no-label">
                                            <span class="bg-success"></span>
                                            <p>$9,348,319</p>
                                        </div>
                                        <div class="ms-chart-no-label">
                                            <span class="bg-primary"></span>
                                            <p>$4,344,316</p>
                                        </div>
                                        <div class="ms-chart-no-label">
                                            <span class="bg-warning"></span>
                                            <p>$518,513</p>
                                        </div>
                                        <div class="ms-chart-no-label">
                                            <span class="bg-danger"></span>
                                            <p>$348,319</p>
                                        </div>
                                        <div class="ms-chart-no-label">
                                            <span class="bg-secondary"></span>
                                            <p>$3,416,139</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-8 col-md-8">
                                    <canvas id="active-orders"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Orders Table Expanded -->
                <div class="col-md-12">
                    <div class="ms-panel ms-crypto-orders-expanded">
                        <div class="ms-panel-header">
                            <div class="d-flex justify-content-between">
                                <div class="ms-header-text">
                                    <h6>Active Orders</h6>
                                    <p>Track your active orders</p>
                                </div>
                                <a href="#" class="btn btn-primary ms-graph-metrics">View All</a>
                            </div>
                        </div>
                        <div class="ms-panel-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover thead-light">
                                    <thead>
                                        <tr>
                                            <th scope="col">Date</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">Track ID</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Crypto Amount</th>
                                            <th scope="col">Change</th>
                                            <th scope="col">Fees</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>12.01.2020</td>
                                            <td>Sent</td>
                                            <td>#TR137381</td>
                                            <td>$900.50</td>
                                            <td class="ms-crypto-amount"> <i class="cc BTC"></i> 0.511 </td>
                                            <td class="ms-trend"> <canvas id="trend-01"></canvas> </td>
                                            <td>$5.85</td>
                                        </tr>
                                        <tr>
                                            <td>11.01.2020</td>
                                            <td>Sent</td>
                                            <td>#TR371893</td>
                                            <td>$335.50</td>
                                            <td class="ms-crypto-amount"> <i class="cc ETH"></i> 0.223 </td>
                                            <td class="ms-trend"> <canvas id="trend-02"></canvas> </td>
                                            <td>$5.85</td>
                                        </tr>
                                        <tr>
                                            <td>10.01.2020</td>
                                            <td>Sent</td>
                                            <td>#TR137381</td>
                                            <td>$378.50</td>
                                            <td class="ms-crypto-amount"> <i class="cc PPC-alt"></i> 0.312 </td>
                                            <td class="ms-trend"> <canvas id="trend-03"></canvas> </td>
                                            <td>$5.85</td>
                                        </tr>
                                        <tr>
                                            <td>09.01.2020</td>
                                            <td>Recieved</td>
                                            <td>#TR371893</td>
                                            <td>$219.30</td>
                                            <td class="ms-crypto-amount"> <i class="cc PPC-alt"></i> 0.573 </td>
                                            <td class="ms-trend"> <canvas id="trend-04"></canvas> </td>
                                            <td>$5.85</td>
                                        </tr>
                                        <tr>
                                            <td>08.01.2020</td>
                                            <td>Recieved</td>
                                            <td>#TR137381</td>
                                            <td>$438.50</td>
                                            <td class="ms-crypto-amount"> <i class="cc BTC"></i> 0.321 </td>
                                            <td class="ms-trend"> <canvas id="trend-05"></canvas> </td>
                                            <td>$5.85</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Candle Chart -->
                <div class="col-xl-7 col-md-12">
                    <div class="ms-panel ms-panel-fh">
                        <div class="ms-panel-header">
                            <div class="d-flex justify-content-between">
                                <div class="ms-header-text">
                                    <h6>Crypto Candle Chart</h6>
                                    <p>Real time Crypto information and rating data</p>
                                </div>
                            </div>

                        </div>
                        <div class="ms-panel-body pt-0">
                            <div class="d-flex justify-content-between ms-graph-meta">
                                <ul class="ms-list-flex mt-3 mb-5">
                                    <li>
                                        <span>Open Rate</span>
                                        <h3 class="ms-count">9,703.49</h3>
                                    </li>
                                    <li>
                                        <span>High Rate</span>
                                        <h3 class="ms-count">95,038</h3>
                                    </li>
                                    <li>
                                        <span>Low Rate</span>
                                        <h3 class="ms-count">28,387</h3>
                                    </li>
                                    <li>
                                        <span>Closed Rate</span>
                                        <h3 class="ms-count">12,785</h3>
                                    </li>
                                </ul>
                            </div>
                            <canvas id="candle-chart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Crypto Market Position -->
                <div class="col-xl-5 col-md-12">
                    <div class="ms-panel ms-widget ms-crypto-widget">
                        <div class="ms-panel-header">
                            <h6>Crypto Market Position</h6>
                            <p>Market Value and Position of Cryptocurrency</p>
                        </div>
                        <div class="ms-panel-body p-0">
                            <ul class="nav nav-tabs nav-justified has-gap px-4 pt-4" role="tablist">
                                <li role="presentation" class="fs-12"><a href="#btc" aria-controls="btc"
                                        class="active show" role="tab" data-toggle="tab"> BTC </a></li>
                                <li role="presentation" class="fs-12"><a href="#xrp" aria-controls="xrp" role="tab"
                                        data-toggle="tab"> XRP </a></li>
                                <li role="presentation" class="fs-12"><a href="#ltc" aria-controls="ltc" role="tab"
                                        data-toggle="tab"> LTC </a></li>
                                <li role="presentation" class="fs-12"><a href="#eth" aria-controls="eth" role="tab"
                                        data-toggle="tab"> ETH </a></li>
                                <li role="presentation" class="fs-12"><a href="#zec" aria-controls="zec" role="tab"
                                        data-toggle="tab"> ZEC </a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active show fade in" id="btc">
                                    <div class="table-responsive">
                                        <table class="table table-hover thead-light">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Country</th>
                                                    <th scope="col">Value</th>
                                                    <th scope="col">Position</th>
                                                    <th scope="col">Volume</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>United Kingdom</td>
                                                    <td>8528.70</td>
                                                    <td class="ms-text-success">+17.24%</td>
                                                    <td>7.65%</td>
                                                </tr>
                                                <tr>
                                                    <td>United States</td>
                                                    <td>4867.41</td>
                                                    <td class="ms-text-danger">-12.24%</td>
                                                    <td>9.12%</td>
                                                </tr>
                                                <tr>
                                                    <td>Australia</td>
                                                    <td>7538.90</td>
                                                    <td class="ms-text-success">+32.04%</td>
                                                    <td>14.29%</td>
                                                </tr>
                                                <tr>
                                                    <td>Netherlands</td>
                                                    <td>1614.19</td>
                                                    <td class="ms-text-danger">-20.75%</td>
                                                    <td>12.25%</td>
                                                </tr>
                                                <tr>
                                                    <td>Russia</td>
                                                    <td>7538.90</td>
                                                    <td class="ms-text-success">+32.04%</td>
                                                    <td>14.29%</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="xrp">
                                    <div class="table-responsive">
                                        <table class="table table-hover thead-light">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Country</th>
                                                    <th scope="col">Value</th>
                                                    <th scope="col">Position</th>
                                                    <th scope="col">Volume</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>United Kingdom</td>
                                                    <td>7548.70</td>
                                                    <td class="ms-text-success">+12.24%</td>
                                                    <td>7.65%</td>
                                                </tr>
                                                <tr>
                                                    <td>United States</td>
                                                    <td>3167.41</td>
                                                    <td class="ms-text-danger">-4.24%</td>
                                                    <td>9.12%</td>
                                                </tr>
                                                <tr>
                                                    <td>Australia</td>
                                                    <td>7538.90</td>
                                                    <td class="ms-text-success">+14.04%</td>
                                                    <td>14.29%</td>
                                                </tr>
                                                <tr>
                                                    <td>Netherlands</td>
                                                    <td>1614.19</td>
                                                    <td class="ms-text-danger">-12.75%</td>
                                                    <td>12.25%</td>
                                                </tr>
                                                <tr>
                                                    <td>Russia</td>
                                                    <td>7538.90</td>
                                                    <td class="ms-text-success">+32.04%</td>
                                                    <td>14.29%</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="ltc">
                                    <div class="table-responsive">
                                        <table class="table table-hover thead-light">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Country</th>
                                                    <th scope="col">Value</th>
                                                    <th scope="col">Position</th>
                                                    <th scope="col">Volume</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>United Kingdom</td>
                                                    <td>8528.70</td>
                                                    <td class="ms-text-success">+17.24%</td>
                                                    <td>7.65%</td>
                                                </tr>
                                                <tr>
                                                    <td>United States</td>
                                                    <td>4867.41</td>
                                                    <td class="ms-text-danger">-12.24%</td>
                                                    <td>9.12%</td>
                                                </tr>
                                                <tr>
                                                    <td>Australia</td>
                                                    <td>7538.90</td>
                                                    <td class="ms-text-success">+32.04%</td>
                                                    <td>14.29%</td>
                                                </tr>
                                                <tr>
                                                    <td>Netherlands</td>
                                                    <td>1614.19</td>
                                                    <td class="ms-text-danger">-20.75%</td>
                                                    <td>12.25%</td>
                                                </tr>
                                                <tr>
                                                    <td>Russia</td>
                                                    <td>7538.90</td>
                                                    <td class="ms-text-success">+32.04%</td>
                                                    <td>14.29%</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="eth">
                                    <div class="table-responsive">
                                        <table class="table table-hover thead-light">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Country</th>
                                                    <th scope="col">Value</th>
                                                    <th scope="col">Position</th>
                                                    <th scope="col">Volume</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>United Kingdom</td>
                                                    <td>7548.70</td>
                                                    <td class="ms-text-success">+12.24%</td>
                                                    <td>7.65%</td>
                                                </tr>
                                                <tr>
                                                    <td>United States</td>
                                                    <td>3167.41</td>
                                                    <td class="ms-text-danger">-4.24%</td>
                                                    <td>9.12%</td>
                                                </tr>
                                                <tr>
                                                    <td>Australia</td>
                                                    <td>7538.90</td>
                                                    <td class="ms-text-success">+14.04%</td>
                                                    <td>14.29%</td>
                                                </tr>
                                                <tr>
                                                    <td>Netherlands</td>
                                                    <td>1614.19</td>
                                                    <td class="ms-text-danger">-12.75%</td>
                                                    <td>12.25%</td>
                                                </tr>
                                                <tr>
                                                    <td>Russia</td>
                                                    <td>7538.90</td>
                                                    <td class="ms-text-success">+32.04%</td>
                                                    <td>14.29%</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="zec">
                                    <div class="table-responsive">
                                        <table class="table table-hover thead-light">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Country</th>
                                                    <th scope="col">Value</th>
                                                    <th scope="col">Position</th>
                                                    <th scope="col">Volume</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>United Kingdom</td>
                                                    <td>8528.70</td>
                                                    <td class="ms-text-success">+17.24%</td>
                                                    <td>7.65%</td>
                                                </tr>
                                                <tr>
                                                    <td>United States</td>
                                                    <td>4867.41</td>
                                                    <td class="ms-text-danger">-12.24%</td>
                                                    <td>9.12%</td>
                                                </tr>
                                                <tr>
                                                    <td>Australia</td>
                                                    <td>7538.90</td>
                                                    <td class="ms-text-success">+32.04%</td>
                                                    <td>14.29%</td>
                                                </tr>
                                                <tr>
                                                    <td>Netherlands</td>
                                                    <td>1614.19</td>
                                                    <td class="ms-text-danger">-20.75%</td>
                                                    <td>12.25%</td>
                                                </tr>
                                                <tr>
                                                    <td>Russia</td>
                                                    <td>7538.90</td>
                                                    <td class="ms-text-success">+32.04%</td>
                                                    <td>14.29%</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="ms-panel">
                        <div class="ms-panel-header">
                            <h6>Quick Stats</h6>
                        </div>
                        <div class="ms-panel-body p-0">
                            <div class="ms-quick-stats">
                                <div class="ms-stats-grid">
                                    <i class="cc BTC"></i>
                                    <p class="ms-text-dark">$8,033</p>
                                    <span>Bitcoin</span>
                                </div>
                                <div class="ms-stats-grid">
                                    <i class="cc ETH"></i>
                                    <p class="ms-text-dark">$3,039</p>
                                    <span>Ethereum</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </main>

    <!-- Quick bar -->
    <aside id="ms-quick-bar" class="ms-quick-bar fixed ms-d-block-lg">

        <ul class="nav nav-tabs ms-quick-bar-list" role="tablist">
            <li class="ms-quick-bar-item ms-has-qa" role="presentation" data-toggle="tooltip" data-placement="left"
                title="Launch Chat" data-title="Chat">
                <a href="#qa-chat" aria-controls="qa-chat" role="tab" data-toggle="tab">
                    <i class="flaticon-chat"></i>
                    <span class="ms-quick-bar-label">Chat</span>
                </a>
            </li>
            <li class="ms-quick-bar-item ms-has-qa" role="presentation" data-toggle="tooltip" data-placement="left"
                title="Launch Email" data-title="Email">
                <a href="#qa-email" aria-controls="qa-email" role="tab" data-toggle="tab">
                    <i class="flaticon-mail"></i>
                    <span class="ms-quick-bar-label">Email</span>
                </a>
            </li>
            <li class="ms-quick-bar-item ms-has-qa" role="presentation" data-toggle="tooltip" data-placement="left"
                title="Launch To-do-list" data-title="To-do-list">
                <a href="#qa-toDo" aria-controls="qa-toDo" role="tab" data-toggle="tab">
                    <i class="flaticon-list"></i>
                    <span class="ms-quick-bar-label">To-do</span>
                </a>
            </li>
            <li class="ms-quick-bar-item ms-has-qa" role="presentation" data-toggle="tooltip" data-placement="left"
                title="Launch Reminders" data-title="Reminders">
                <a href="#qa-reminder" aria-controls="qa-reminder" role="tab" data-toggle="tab">
                    <i class="flaticon-bell"></i>
                    <span class="ms-quick-bar-label">Reminder</span>
                </a>
            </li>
            <li class="ms-quick-bar-item ms-has-qa" role="presentation" data-toggle="tooltip" data-placement="left"
                title="Launch Notes" data-title="Notes">
                <a href="#qa-notes" aria-controls="qa-notes" role="tab" data-toggle="tab">
                    <i class="flaticon-pencil"></i>
                    <span class="ms-quick-bar-label">Notes</span>
                </a>
            </li>
            <li class="ms-quick-bar-item ms-has-qa" role="presentation" data-toggle="tooltip" data-placement="left"
                title="Invite Members" data-title="Invite Members">
                <a href="#qa-invite" aria-controls="qa-invite" role="tab" data-toggle="tab">
                    <i class="flaticon-share-1"></i>
                    <span class="ms-quick-bar-label">Invite</span>
                </a>
            </li>

        </ul>

        <div class="ms-configure-qa" data-toggle="tooltip" data-placement="left" title="Configure Quick Access">

            <a href="#">
                <i class="flaticon-hammer"></i>
                <span class="ms-quick-bar-label">Configure</span>
            </a>

        </div>

        <!-- Quick bar Content -->
        <div class="ms-quick-bar-content">

            <div class="ms-quick-bar-header clearfix">
                <h5 class="ms-quick-bar-title float-left">Title</h5>
                <button type="button" class="close ms-toggler" data-target="#ms-quick-bar" data-toggle="hideQuickBar"
                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="ms-quick-bar-body tab-content">
                <div role="tabpanel" class="tab-pane" id="qa-chat">

                    <div class="ms-chat-container">

                        <div class="ms-chat-header px-3">
                            <div class="ms-chat-user-container media clearfix">
                                <div class="ms-chat-status ms-status-online ms-chat-img mr-3 align-self-center">
                                    <img src="vistas\assets\img\people\people-5.jpg" class="ms-img-round" alt="people">
                                </div>
                                <div class="media-body ms-chat-user-info mt-1">
                                    <h6>Anny Farisha</h6>
                                    <a href="#" class="text-disabled has-chevron fs-12" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        Available
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="ms-dropdown-list">
                                            <a class="media p-2" href="#">
                                                <div class="media-body">
                                                    <span>Busy</span>
                                                </div>
                                            </a>
                                            <a class="media p-2" href="#">
                                                <div class="media-body">
                                                    <span>Away</span>
                                                </div>
                                            </a>
                                            <a class="media p-2" href="#">
                                                <div class="media-body">
                                                    <span>Offline</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <form class="ms-form my-3" method="post">
                                <div class="ms-form-group my-0 mb-0 has-icon fs-14">
                                    <input type="search" class="ms-form-input w-100" name="search"
                                        placeholder="Search for People and Groups" value="">
                                    <i class="flaticon-search text-disabled"></i>
                                </div>
                            </form>
                        </div>

                        <div class="ms-chat-body">
                            <ul class="nav nav-tabs tabs-bordered d-flex nav-justified px-3" role="tablist">
                                <li role="presentation" class="fs-12"><a href="#chats" aria-controls="chats"
                                        class="active show" role="tab" data-toggle="tab"> Chats </a></li>
                                <li role="presentation" class="fs-12"><a href="#groups" aria-controls="groups"
                                        role="tab" data-toggle="tab"> Groups </a></li>
                                <li role="presentation" class="fs-12"><a href="#contacts" aria-controls="contacts"
                                        role="tab" data-toggle="tab"> Contacts </a></li>
                            </ul>

                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active show fade in" id="chats">
                                    <ul class="ms-scrollable ms-quickbar-container">
                                        <li class="ms-chat-user-container ms-open-chat ms-deletable p-3 media clearfix">
                                            <div
                                                class="ms-chat-status ms-status-away ms-has-new-msg ms-chat-img mr-3 align-self-center">
                                                <span class="msg-count">3</span>
                                                <img src="vistas\assets\img\people\people-11.jpg" class="ms-img-round"
                                                    alt="people">
                                            </div>
                                            <div class="media-body ms-chat-user-info mt-1">
                                                <h6>James Zathila</h6> <span class="ms-chat-time">2 Hours ago</span>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in arcu
                                                    turpis. Nunc</p>
                                                <i class="flaticon-trash ms-delete-trigger"> </i>
                                            </div>
                                        </li>
                                        <li class="ms-chat-user-container ms-open-chat ms-deletable p-3 media clearfix">
                                            <div
                                                class="ms-chat-status ms-status-online ms-chat-img mr-3 align-self-center">
                                                <img src="vistas\assets\img\people\people-9.jpg" class="ms-img-round"
                                                    alt="people">
                                            </div>
                                            <div class="media-body ms-chat-user-info mt-1">
                                                <h6>Raymart Sandiago</h6> <span class="ms-chat-time">3 Hours ago</span>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in arcu
                                                    turpis. Nunc</p>
                                                <i class="flaticon-trash ms-delete-trigger"> </i>
                                            </div>
                                        </li>
                                        <li class="ms-chat-user-container ms-open-chat ms-deletable p-3 media clearfix">
                                            <div
                                                class="ms-chat-status ms-status-offline ms-chat-img mr-3 align-self-center">
                                                <img src="vistas\assets\img\people\people-7.jpg" class="ms-img-round"
                                                    alt="people">
                                            </div>
                                            <div class="media-body ms-chat-user-info mt-1">
                                                <h6>Heather Brown</h6> <span class="ms-chat-time">12 Hours ago</span>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in arcu
                                                    turpis. Nunc</p>
                                                <i class="flaticon-trash ms-delete-trigger"> </i>
                                            </div>
                                        </li>
                                        <li class="ms-chat-user-container ms-open-chat ms-deletable p-3 media clearfix">
                                            <div
                                                class="ms-chat-status ms-status-busy ms-chat-img mr-3 align-self-center">
                                                <img src="vistas\assets\img\people\people-12.jpg" class="ms-img-round"
                                                    alt="people">
                                            </div>
                                            <div class="media-body ms-chat-user-info mt-1">
                                                <h6>Micheal John</h6> <span class="ms-chat-time">Yesterday</span>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in arcu
                                                    turpis. Nunc</p>
                                                <i class="flaticon-trash ms-delete-trigger"> </i>
                                            </div>
                                        </li>
                                        <li class="ms-chat-user-container ms-open-chat ms-deletable p-3 media clearfix">
                                            <div
                                                class="ms-chat-status ms-status-online ms-chat-img mr-3 align-self-center">
                                                <img src="vistas\assets\img\people\people-10.jpg" class="ms-img-round"
                                                    alt="people">
                                            </div>
                                            <div class="media-body ms-chat-user-info mt-1">
                                                <h6>John Doe</h6> <span class="ms-chat-time">3 Days ago</span>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in arcu
                                                    turpis. Nunc</p>
                                                <i class="flaticon-trash ms-delete-trigger"> </i>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="groups">
                                    <ul class="ms-scrollable ms-quickbar-container">
                                        <li class="ms-chat-user-container ms-open-chat p-3 media clearfix">
                                            <div class="ms-chat-img mr-3 align-self-center">
                                                <img src="vistas\assets\img\people\people-11.jpg" class="ms-img-round"
                                                    alt="people">
                                            </div>
                                            <div class="media-body ms-chat-user-info mt-1">
                                                <h6>James Zathila</h6> <a href="#" class="ms-chat-time"> <i
                                                        class="flaticon-chat"></i> </a>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in arcu
                                                    turpis. Nunc</p>
                                                <ul class="ms-group-members clearfix mt-3 mb-0">
                                                    <li> <img src="vistas\assets\img\people\people-3.jpg" alt="member">
                                                    </li>
                                                    <li> <img src="vistas\assets\img\people\people-5.jpg" alt="member">
                                                    </li>
                                                    <li> <img src="vistas\assets\img\people\people-12.jpg" alt="member">
                                                    </li>
                                                    <li class="ms-group-count"> + 12 more </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="ms-chat-user-container ms-open-chat p-3 media clearfix">
                                            <div class="ms-chat-img mr-3 align-self-center">
                                                <img src="vistas\assets\img\people\people-9.jpg" class="ms-img-round"
                                                    alt="people">
                                            </div>
                                            <div class="media-body ms-chat-user-info mt-1">
                                                <h6>Raymart Sandiago</h6> <a href="#" class="ms-chat-time"> <i
                                                        class="flaticon-chat"></i> </a>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in arcu
                                                    turpis. Nunc</p>
                                                <ul class="ms-group-members clearfix mt-3 mb-0">
                                                    <li> <img src="vistas\assets\img\people\people-10.jpg" alt="member">
                                                    </li>
                                                    <li> <img src="vistas\assets\img\people\people-11.jpg" alt="member">
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="ms-chat-user-container ms-open-chat p-3 media clearfix">
                                            <div class="ms-chat-img mr-3 align-self-center">
                                                <img src="vistas\assets\img\people\people-10.jpg" class="ms-img-round"
                                                    alt="people">
                                            </div>
                                            <div class="media-body ms-chat-user-info mt-1">
                                                <h6>John Doe</h6> <a href="#" class="ms-chat-time"> <i
                                                        class="flaticon-chat"></i> </a>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in arcu
                                                    turpis. Nunc</p>
                                                <ul class="ms-group-members clearfix mt-3 mb-0">
                                                    <li> <img src="vistas\assets\img\people\people-8.jpg" alt="member">
                                                    </li>
                                                    <li> <img src="vistas\assets\img\people\people-9.jpg" alt="member">
                                                    </li>
                                                    <li> <img src="vistas\assets\img\people\people-12.jpg" alt="member">
                                                    </li>
                                                    <li class="ms-group-count"> + 4 more </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="contacts">
                                    <ul class="ms-scrollable ms-quickbar-container">
                                        <li class="ms-chat-user-container ms-open-chat p-3 media clearfix">
                                            <div class="ms-chat-img mr-3 align-self-center">
                                                <img src="vistas\assets\img\people\people-10.jpg" class="ms-img-round"
                                                    alt="people">
                                            </div>
                                            <div class="media-body ms-chat-user-info mt-1">
                                                <h6>John Doe</h6> <a href="#" class="ms-chat-time"> <i
                                                        class="flaticon-chat"></i> </a>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in arcu
                                                    turpis. Nunc</p>
                                            </div>
                                        </li>
                                        <li class="ms-chat-user-container ms-open-chat p-3 media clearfix">
                                            <div class="ms-chat-img mr-3 align-self-center">
                                                <img src="vistas\assets\img\people\people-9.jpg" class="ms-img-round"
                                                    alt="people">
                                            </div>
                                            <div class="media-body ms-chat-user-info mt-1">
                                                <h6>Raymart Sandiago</h6> <a href="#" class="ms-chat-time"> <i
                                                        class="flaticon-chat"></i> </a>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in arcu
                                                    turpis. Nunc</p>
                                            </div>
                                        </li>
                                        <li class="ms-chat-user-container ms-open-chat p-3 media clearfix">
                                            <div class="ms-chat-img mr-3 align-self-center">
                                                <img src="vistas\assets\img\people\people-12.jpg" class="ms-img-round"
                                                    alt="people">
                                            </div>
                                            <div class="media-body ms-chat-user-info mt-1">
                                                <h6>Micheal John</h6> <a href="#" class="ms-chat-time"> <i
                                                        class="flaticon-chat"></i> </a>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in arcu
                                                    turpis. Nunc</p>
                                            </div>
                                        </li>
                                        <li class="ms-chat-user-container ms-open-chat p-3 media clearfix">
                                            <div class="ms-chat-img mr-3 align-self-center">
                                                <img src="vistas\assets\img\people\people-7.jpg" class="ms-img-round"
                                                    alt="people">
                                            </div>
                                            <div class="media-body ms-chat-user-info mt-1">
                                                <h6>Heather Brown</h6> <a href="#" class="ms-chat-time"> <i
                                                        class="flaticon-chat"></i> </a>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in arcu
                                                    turpis. Nunc</p>
                                            </div>
                                        </li>
                                        <li class="ms-chat-user-container ms-open-chat p-3 media clearfix">
                                            <div class="ms-chat-img mr-3 align-self-center">
                                                <img src="vistas\assets\img\people\people-3.jpg" class="ms-img-round"
                                                    alt="people">
                                            </div>
                                            <div class="media-body ms-chat-user-info mt-1">
                                                <h6>Mila Freign</h6> <a href="#" class="ms-chat-time"> <i
                                                        class="flaticon-chat"></i> </a>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in arcu
                                                    turpis. Nunc</p>
                                            </div>
                                        </li>
                                        <li class="ms-chat-user-container ms-open-chat p-3 media clearfix">
                                            <div class="ms-chat-img mr-3 align-self-center">
                                                <img src="vistas\assets\img\people\people-11.jpg" class="ms-img-round"
                                                    alt="people">
                                            </div>
                                            <div class="media-body ms-chat-user-info mt-1">
                                                <h6>James Zathila</h6> <a href="#" class="ms-chat-time"> <i
                                                        class="flaticon-chat"></i> </a>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in arcu
                                                    turpis. Nunc</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

                <div role="tabpanel" class="tab-pane" id="qa-email">

                    <div class="ms-email-container">

                        <div class="ms-qa-options">
                            <a href="#" class="btn btn-primary w-100 mt-0 has-icon"> <i class="flaticon-pencil"></i>
                                Compose Email </a>
                        </div>

                        <ul class="ms-scrollable ms-quickbar-container">
                            <li class="p-3  media ms-email clearfix">
                                <div class="ms-email-img mr-3 ">
                                    <img src="vistas\assets\img\people\people-11.jpg" class="ms-img-round" alt="people">
                                </div>
                                <div class="media-body ms-email-details">
                                    <span class="ms-email-sender">James Zathila</span>
                                    <h6 class="ms-email-subject">[WordPress] New Comment</h6> <span
                                        class="ms-email-time">2 Hours ago</span>
                                    <p class="ms-email-msg">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In
                                        in arcu turpis. Nunc</p>
                                </div>
                            </li>
                            <li class="p-3  media ms-email clearfix">
                                <div class="ms-email-img mr-3 ">
                                    <img src="vistas\assets\img\people\people-10.jpg" class="ms-img-round" alt="people">
                                </div>
                                <div class="media-body ms-email-details">
                                    <span class="ms-email-sender">John Doe</span>
                                    <h6 class="ms-email-subject">[WordPress] New Comment</h6> <span
                                        class="ms-email-time">8 Hours ago</span>
                                    <p class="ms-email-msg">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In
                                        in arcu turpis. Nunc</p>
                                </div>
                            </li>
                            <li class="p-3  media ms-email clearfix">
                                <div class="ms-email-img mr-3 ">
                                    <img src="vistas\assets\img\people\people-7.jpg" class="ms-img-round" alt="people">
                                </div>
                                <div class="media-body ms-email-details">
                                    <span class="ms-email-sender">Heather Brown</span>
                                    <h6 class="ms-email-subject">[WordPress] New Comment</h6> <span
                                        class="ms-email-time">1 Day ago</span>
                                    <p class="ms-email-msg">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In
                                        in arcu turpis. Nunc</p>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>

                <div role="tabpanel" class="tab-pane" id="qa-toDo">
                    <div class="ms-quickbar-container ms-todo-list-container ms-scrollable">

                        <form class="ms-add-task-block">
                            <div class="form-group mx-3 mt-0  fs-14 clearfix">
                                <input type="text" class="form-control fs-14 float-left" id="task-block"
                                    name="todo-block" placeholder="Add Task Block" value="">
                                <button type="submit" class="ms-btn-icon bg-primary float-right"><i
                                        class="material-icons text-disabled">add</i></button>
                            </div>
                        </form>

                        <ul class="ms-todo-list">
                            <li class="ms-card ms-qa-card ms-deletable">

                                <div class="ms-card-header clearfix">
                                    <h6 class="ms-card-title">Task Block Title</h6>
                                    <button data-toggle="tooltip" data-placement="left" title="Add a Task to this block"
                                        class="ms-add-task-to-block ms-btn-icon float-right"> <i
                                            class="material-icons text-disabled">add</i> </button>
                                </div>

                                <div class="ms-card-body">
                                    <ul class="ms-list ms-task-block">
                                        <li class="ms-list-item ms-to-do-task ms-deletable">
                                            <label class="ms-checkbox-wrap ms-todo-complete">
                                                <input type="checkbox" value="">
                                                <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span> Task to do </span>
                                            <button type="submit" class="close"><i
                                                    class="flaticon-trash ms-delete-trigger"> </i></button>
                                        </li>
                                        <li class="ms-list-item ms-to-do-task ms-deletable">
                                            <label class="ms-checkbox-wrap ms-todo-complete">
                                                <input type="checkbox" value="">
                                                <i class="ms-checkbox-check"></i>
                                            </label>
                                            <span>Task to do</span>
                                            <button type="submit" class="close"><i
                                                    class="flaticon-trash ms-delete-trigger"> </i></button>
                                        </li>
                                    </ul>
                                </div>

                                <div class="ms-card-footer clearfix">
                                    <a href="#" class="text-disabled mr-2"> <i class="flaticon-archive"> </i> Archive
                                    </a>
                                    <a href="#" class="text-disabled  ms-delete-trigger float-right"> <i
                                            class="flaticon-trash"> </i> Delete </a>
                                </div>

                            </li>
                        </ul>

                    </div>
                </div>

                <div role="tabpanel" class="tab-pane" id="qa-reminder">
                    <div class="ms-quickbar-container ms-reminders">

                        <ul class="ms-qa-options">
                            <li> <a href="#" data-toggle="modal" data-target="#reminder-modal"> <i
                                        class="flaticon-bell"></i> New Reminder </a> </li>
                        </ul>

                        <div class="ms-quickbar-container ms-scrollable">

                            <div class="ms-card ms-qa-card ms-deletable">
                                <div class="ms-card-body">
                                    <p> Developer Meeting in Block B </p>
                                    <span class="text-disabled fs-12"><i class="material-icons fs-14">access_time</i>
                                        Today - 3:45 pm</span>
                                </div>
                                <div class="ms-card-footer clearfix">

                                    <div class="ms-note-editor float-right">
                                        <a href="#" class="text-disabled mr-2" data-toggle="modal"
                                            data-target="#reminder-modal"> <i class="flaticon-pencil"> </i> Edit </a>
                                        <a href="#" class="text-disabled  ms-delete-trigger"> <i class="flaticon-trash">
                                            </i> Delete </a>
                                    </div>

                                </div>
                            </div>
                            <div class="ms-card ms-qa-card ms-deletable">
                                <div class="ms-card-body">
                                    <p> Start adding change log to version 2 </p>
                                    <span class="text-disabled fs-12"><i class="material-icons fs-14">access_time</i>
                                        Tomorrow - 12:00 pm</span>
                                </div>
                                <div class="ms-card-footer clearfix">

                                    <div class="ms-note-editor float-right">
                                        <a href="#" class="text-disabled mr-2" data-toggle="modal"
                                            data-target="#reminder-modal"> <i class="flaticon-pencil"> </i> Edit </a>
                                        <a href="#" class="text-disabled  ms-delete-trigger"> <i class="flaticon-trash">
                                            </i> Delete </a>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <div role="tabpanel" class="tab-pane" id="qa-notes">

                    <ul class="ms-qa-options">
                        <li> <a href="#" data-toggle="modal" data-target="#notes-modal"> <i
                                    class="flaticon-sticky-note"></i> New Note </a> </li>
                        <li> <a href="#"> <i class="flaticon-excel"></i> Export to Excel </a> </li>
                    </ul>

                    <div class="ms-quickbar-container ms-scrollable">

                        <div class="ms-card ms-qa-card ms-deletable">
                            <div class="ms-card-header">
                                <h6 class="ms-card-title">Don't forget to check with the designer</h6>
                            </div>
                            <div class="ms-card-body">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vulputate urna in
                                    faucibus venenatis. Etiam at dapibus neque,
                                    vel varius metus. Pellentesque eget orci malesuada, venenatis magna et
                                </p>
                                <ul class="ms-note-members clearfix mb-0">
                                    <li class="ms-deletable"> <img src="vistas\assets\img\people\people-3.jpg"
                                            alt="member">
                                    </li>
                                    <li class="ms-deletable"> <img src="vistas\assets\img\people\people-5.jpg"
                                            alt="member">
                                    </li>
                                </ul>
                            </div>
                            <div class="ms-card-footer clearfix">

                                <div class="dropdown float-left">
                                    <a href="#" class="text-disabled" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="flaticon-share-1"></i> Share
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-menu-header">
                                            <h6 class="dropdown-header ms-inline m-0"><span class="text-disabled">Share
                                                    With</span></h6>
                                        </li>
                                        <li class="dropdown-divider"></li>
                                        <li class="ms-scrollable ms-dropdown-list ms-members-list">
                                            <a class="media p-2" href="#">
                                                <div class="mr-2 align-self-center">
                                                    <img src="vistas\assets\img\people\people-10.jpg"
                                                        class="ms-img-round" alt="people">
                                                </div>
                                                <div class="media-body">
                                                    <span>John Doe</span>
                                                </div>
                                            </a>
                                            <a class="media p-2" href="#">
                                                <div class="mr-2 align-self-center">
                                                    <img src="vistas\assets\img\people\people-9.jpg"
                                                        class="ms-img-round" alt="people">
                                                </div>
                                                <div class="media-body">
                                                    <span>Raymart Sandiago</span>
                                                </div>
                                            </a>
                                            <a class="media p-2" href="#">
                                                <div class="mr-2 align-self-center">
                                                    <img src="vistas\assets\img\people\people-7.jpg"
                                                        class="ms-img-round" alt="people">
                                                </div>
                                                <div class="media-body">
                                                    <span>Heather Brown</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="ms-note-editor float-right">
                                    <a href="#" class="text-disabled mr-2" data-toggle="modal"
                                        data-target="#notes-modal"> <i class="flaticon-pencil"> </i> Edit </a>
                                    <a href="#" class="text-disabled  ms-delete-trigger"> <i class="flaticon-trash">
                                        </i> Delete </a>
                                </div>

                            </div>
                        </div>

                        <div class="ms-card ms-qa-card ms-deletable">
                            <div class="ms-card-header">
                                <h6 class="ms-card-title">Perform the required unit tests</h6>
                            </div>
                            <div class="ms-card-body">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vulputate urna in
                                    faucibus venenatis. Etiam at dapibus neque,
                                    vel varius metus. Pellentesque eget orci malesuada, venenatis magna et
                                </p>
                                <ul class="ms-note-members clearfix mb-0">
                                    <li class="ms-deletable"> <img src="vistas\assets\img\people\people-9.jpg"
                                            alt="member">
                                    </li>
                                </ul>
                            </div>
                            <div class="ms-card-footer clearfix">

                                <div class="dropdown float-left">
                                    <a href="#" class="text-disabled" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="flaticon-share-1"></i> Share
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-menu-header">
                                            <h6 class="dropdown-header ms-inline m-0"><span class="text-disabled">Share
                                                    With</span></h6>
                                        </li>
                                        <li class="dropdown-divider"></li>
                                        <li class="ms-scrollable ms-dropdown-list ms-members-list">
                                            <a class="media p-2" href="#">
                                                <div class="mr-2 align-self-center">
                                                    <img src="vistas\assets\img\people\people-10.jpg"
                                                        class="ms-img-round" alt="people">
                                                </div>
                                                <div class="media-body">
                                                    <span>John Doe</span>
                                                </div>
                                            </a>
                                            <a class="media p-2" href="#">
                                                <div class="mr-2 align-self-center">
                                                    <img src="vistas\assets\img\people\people-9.jpg"
                                                        class="ms-img-round" alt="people">
                                                </div>
                                                <div class="media-body">
                                                    <span>Raymart Sandiago</span>
                                                </div>
                                            </a>
                                            <a class="media p-2" href="#">
                                                <div class="mr-2 align-self-center">
                                                    <img src="vistas\assets\img\people\people-7.jpg"
                                                        class="ms-img-round" alt="people">
                                                </div>
                                                <div class="media-body">
                                                    <span>Heather Brown</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="ms-note-editor float-right">
                                    <a href="#" class="text-disabled mr-2" data-toggle="modal"
                                        data-target="#notes-modal"> <i class="flaticon-pencil"> </i> Edit </a>
                                    <a href="#" class="text-disabled  ms-delete-trigger"> <i class="flaticon-trash">
                                        </i> Delete </a>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>

                <div role="tabpanel" class="tab-pane" id="qa-invite">

                    <div class="ms-quickbar-container text-center ms-invite-member">
                        <i class="flaticon-network"></i>
                        <p>Invite Team Members</p>
                        <form>
                            <div class="ms-form-group">
                                <input type="text" placeholder="Member Email" class="form-control" name="invite-email"
                                    value="">
                            </div>
                            <div class="ms-form-group">
                                <button type="submit" name="invite-member" class="btn btn-primary w-100">Invite</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>

        </div>

    </aside>

    <!-- MODALS -->

    <!-- Reminder Modal -->
    <div class="modal fade" id="reminder-modal" tabindex="-1" role="dialog" aria-labelledby="reminder-modal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header bg-secondary">
                    <h5 class="modal-title has-icon text-white"> New Reminder</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>

                <form>

                    <div class="modal-body">

                        <div class="ms-form-group">
                            <label>Remind me about</label>
                            <textarea class="form-control" name="reminder"></textarea>
                        </div>

                        <div class="ms-form-group">
                            <span class="ms-option-name fs-14">Repeat Daily</span>
                            <label class="ms-switch float-right">
                                <input type="checkbox">
                                <span class="ms-switch-slider round"></span>
                            </label>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="ms-form-group">
                                    <input type="text" class="form-control datepicker" name="reminder-date" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="ms-form-group">
                                    <select class="form-control" name="reminder-time">
                                        <option value="">12:00 pm</option>
                                        <option value="">1:00 pm</option>
                                        <option value="">2:00 pm</option>
                                        <option value="">3:00 pm</option>
                                        <option value="">4:00 pm</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-secondary shadow-none" data-dismiss="modal">Add
                            Reminder</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <!-- Notes Modal -->
    <div class="modal fade" id="notes-modal" tabindex="-1" role="dialog" aria-labelledby="notes-modal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header bg-secondary">
                    <h5 class="modal-title has-icon text-white" id="NoteModal">New Note</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>

                <form>

                    <div class="modal-body">

                        <div class="ms-form-group">
                            <label>Note Title</label>
                            <input type="text" class="form-control" name="note-title" value="">
                        </div>

                        <div class="ms-form-group">
                            <label>Note Description</label>
                            <textarea class="form-control" name="note-description"></textarea>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-secondary shadow-none" data-dismiss="modal">Add
                            Note</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <!-- SCRIPTS -->
    <!-- Global Required Scripts Start -->
    <script src="vistas\assets\js\jquery-3.5.1.min.js"></script>
    <script src="vistas\assets\js\popper.min.js"></script>
    <script src="vistas\assets\js\bootstrap.min.js"></script>
    <script src="vistas\assets\js\perfect-scrollbar.js"> </script>
    <script src="vistas\assets\js\jquery-ui.min.js"> </script>
    <!-- Global Required Scripts End -->

    <!-- Page Specific Scripts Start -->
    <script src="vistas\assets\js\slick.min.js"> </script>
    <script src="vistas\assets\js\moment.js"> </script>
    <script src="vistas\assets\js\jquery.webticker.min.js"> </script>
    <script src="vistas\assets\js\Chart.bundle.min.js"> </script>
    <script src="vistas\assets\js\Chart.Financial.js"> </script>
    <script src="vistas\assets\js\cryptocurrency.js"> </script>
    <!-- Page Specific Scripts Finish -->

    <!-- Mystic core JavaScript -->
    <script src="vistas\assets\js\framework.js"></script>

    <!-- Settings -->
    <script src="vistas\assets\js\settings.js"></script>

</body>

</html>