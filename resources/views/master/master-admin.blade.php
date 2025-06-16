
<!DOCTYPE html>
<html lang="en">

<!--head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="DrArtex Window Films Warranty Claim Website">
    <meta property="og:title" content="DrArtex Window Films Warranty Claim Website">
    <meta property="og:description" content="DrArtex Window Films Warranty Claim Website">
    <meta property="og:image" content="https:/fillow.dexignlab.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">


    <title>@yield('title')</title>


    <link rel="shortcut icon" type="image/png" href="https://drartexfilms.com/wp-content/uploads/2024/05/cropped-image_2024-05-27_153243567-32x32.png">
    

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/smoothness/jquery-ui.css">


    <link href="{{ asset('sipenmaru/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">

    <link href="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <link href="{{ asset('sipenmaru/vendor/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

    <link href="{{ asset('sipenmaru/vendor/clockpicker/css/bootstrap-clockpicker.min.css') }}" rel="stylesheet">
  
    <link href="{{ asset('sipenmaru/vendor/jquery-asColorPicker/css/asColorPicker.min.css') }}" rel="stylesheet">
  
    <link
        href="{{ asset('sipenmaru/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('sipenmaru/vendor/pickadate/themes/default.css') }}">
    <link rel="stylesheet" href="{{ asset('sipenmaru/vendor/pickadate/themes/default.date.css') }}">

    <link href="{{ asset('sipenmaru/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('sipenmaru/vendor/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('sipenmaru/vendor/nouislider/nouislider.min.css') }}">
    <link href="{{ asset('sipenmaru/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('sipenmaru/vendor/toastr/css/toastr.min.css') }}">


    <link href="{{ asset('sipenmaru/css/style.css') }}" rel="stylesheet">

</head-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="DrArtex Window Films Warranty Claim Website">
    <meta property="og:title" content="DrArtex Window Films Warranty Claim Website">
    <meta property="og:description" content="DrArtex Window Films Warranty Claim Website">
    <meta property="og:image" content="https://fillow.dexignlab.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">

    <title>@yield('title')</title>
    <link rel="shortcut icon" href="https://drartexfilms.com/wp-content/uploads/2024/05/cropped-image_2024-05-27_153243567-32x32.png">

    <!-- Core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('sipenmaru/vendor/datatables/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.css">
    
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('sipenmaru/vendor/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('sipenmaru/vendor/clockpicker/css/bootstrap-clockpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('sipenmaru/vendor/jquery-asColorPicker/css/asColorPicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('sipenmaru/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('sipenmaru/vendor/pickadate/themes/default.css') }}">
    <link rel="stylesheet" href="{{ asset('sipenmaru/vendor/pickadate/themes/default.date.css') }}">
    <link rel="stylesheet" href="{{ asset('sipenmaru/vendor/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('sipenmaru/vendor/nouislider/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('sipenmaru/vendor/sweetalert2/dist/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('sipenmaru/vendor/toastr/css/toastr.min.css') }}">
    
    <!-- Custom CSS -->
    <link href="{{ asset('sipenmaru/css/style.css') }}" rel="stylesheet">
</head>


<body>
@include('sweetalert::alert')
    <!--*******************
        Preloader start
    ********************
 <div id="preloader">
  <div class="lds-ripple">
   <div></div>
   <div></div>
  </div>
 </div>-->
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="dashboard" class="brand-logo">
                <img alt="image" width="60%" src="{{ asset('https://drartexfilms.com/wp-content/uploads/2024/05/image_2024-05-27_154330103.png') }}">
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span
                        class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Chat box start
        ***********************************-->
        <div class="chatbox">
            <div class="chatbox-close"></div>
            <div class="custom-tab-1">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#notes">Notes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#alerts">Alerts</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade" id="alerts" role="tabpanel">
                        <div class="card mb-sm-3 mb-md-0 contacts_card">
                            <div class="card-header chat-list-header text-center">
                                <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                        viewbox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                            <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                            <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                        </g>
                                    </svg></a>
                                <div>
                                    <h6 class="mb-1">Notications</h6>
                                    <p class="mb-0">Show All</p>
                                </div>
                                <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                        viewbox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <path
                                                d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                            <path
                                                d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                fill="#000000" fill-rule="nonzero"></path>
                                        </g>
                                    </svg></a>
                            </div>
                            <div class="card-body contacts_body p-0 dlab-scroll" id="DLAB_W_Contacts_Body1">
                                <ul class="contacts">
                                    <li class="name-first-letter">SEVER STATUS</li>
                                    <li class="active">
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont primary">KK</div>
                                            <div class="user_info">
                                                <span>David Nester Birthday</span>
                                                <p class="text-primary">Today</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="name-first-letter">SOCIAL</li>
                                    <li>
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont success">RU</div>
                                            <div class="user_info">
                                                <span>Perfection Simplified</span>
                                                <p>Jame Smith commented on your status</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="name-first-letter">SEVER STATUS</li>
                                    <li>
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont primary">AU</div>
                                            <div class="user_info">
                                                <span>AharlieKane</span>
                                                <p>Sami is online</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont info">MO</div>
                                            <div class="user_info">
                                                <span>Athan Jacoby</span>
                                                <p>Nargis left 30 mins ago</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer"></div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="notes">
                        <div class="card mb-sm-3 mb-md-0 note_card">
                            <div class="card-header chat-list-header text-center">
                                <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                        viewbox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"></rect>
                                            <rect fill="#000000" opacity="0.3"
                                                transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) "
                                                x="4" y="11" width="16" height="2" rx="1"></rect>
                                        </g>
                                    </svg></a>
                                <div>
                                    <h6 class="mb-1">Notes</h6>
                                    <p class="mb-0">Add New Nots</p>
                                </div>
                                <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                        viewbox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <path
                                                d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                            <path
                                                d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                fill="#000000" fill-rule="nonzero"></path>
                                        </g>
                                    </svg></a>
                            </div>
                            <div class="card-body contacts_body p-0 dlab-scroll" id="DLAB_W_Contacts_Body2">
                                <ul class="contacts">
                                    <li class="active">
                                        <div class="d-flex bd-highlight">
                                            <div class="user_info">
                                                <span>New order placed..</span>
                                                <p>10 Aug 2020</p>
                                            </div>
                                            <div class="ms-auto">
                                                <a href="javascript:void(0);"
                                                    class="btn btn-primary btn-xs sharp me-1"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-danger btn-xs sharp"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex bd-highlight">
                                            <div class="user_info">
                                                <span>Youtube, a video-sharing website..</span>
                                                <p>10 Aug 2020</p>
                                            </div>
                                            <div class="ms-auto">
                                                <a href="javascript:void(0);"
                                                    class="btn btn-primary btn-xs sharp me-1"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-danger btn-xs sharp"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex bd-highlight">
                                            <div class="user_info">
                                                <span>john just buy your product..</span>
                                                <p>10 Aug 2020</p>
                                            </div>
                                            <div class="ms-auto">
                                                <a href="javascript:void(0);"
                                                    class="btn btn-primary btn-xs sharp me-1"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-danger btn-xs sharp"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex bd-highlight">
                                            <div class="user_info">
                                                <span>Athan Jacoby</span>
                                                <p>10 Aug 2020</p>
                                            </div>
                                            <div class="ms-auto">
                                                <a href="javascript:void(0);"
                                                    class="btn btn-primary btn-xs sharp me-1"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-danger btn-xs sharp"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Chat box End
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header border-bottom">
            <div class="header-content">

                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
                                @yield('menunya')
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
                            <li class="nav-item d-flex align-items-center">
                                @php
                                    $date = date('l, d F Y ');
                                    //$date = date('l, Y-m-d ');
                                @endphp
                                <strong>{{ $date }} &nbsp;
                                    <span id="jamServer">
                                        @php
                                            date_default_timezone_set('Asia/Jakarta');
                                            $datenow = date('H:i:s');
                                        @endphp
                                        <h6> <strong> {{ $datenow }}</strong></h6>
                                    </span>
                                </strong>

                            </li>

                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0);" role="button"
                                    data-bs-toggle="dropdown">
                                @if (auth()->user()->profile->foto != null)
                                    <img class="avatar-lg rounded-circle img-thumbnail" src="{{ url('/' . auth()->user()->profile->foto) }}"
                                        alt="" width="50px" />
                                @else
                                    <img class="avatar-lg rounded-circle img-thumbnail"
                                    src="{{ asset('sipenmaru/images/ava.png') }}" alt=""
                                        width="50px" />
                                @endif
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="{{route("logout")}}" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger"
                                            width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12"></line>
                                        </svg>
                                        <span class="ms-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->

        <div class="dlabnav">

            <div class="dlabnav-scroll">
                @auth
                    <div class="sidebar-user text-center">
                        <a>
                                @if (auth()->user()->profile->foto != null)
                                    <img class="avatar-lg rounded-circle img-thumbnail" src="{{ url('/' . auth()->user()->profile->foto) }}"
                                        alt="" width="75px" />
                                @else
                                    <img class="avatar-lg rounded-circle img-thumbnail"
                                    src="{{ asset('sipenmaru/images/ava.png') }}" alt=""
                                        width="75px" />
                                @endif
                        <div class="badge-bottom"><span class="badge badge-primary">@if (auth()->user()->role =="Administrator")
                            {{ auth()->user()->role }}
                        @else
                            Peserta
                        @endif
                            </span>
                        </div>
                        </a>
                    </div>
                    <br>
                @endauth
                @section('menu')@show



                <div class="copyright">
                    <p><strong>DrArtex Films Warranty System</strong> ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script> All Rights Reserved.</p>
                    <p class="fs-12">Made by Faliqh Yoon</p>
                </div>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="modal fade" id="popupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitle">Modal Title</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="bodyModal">
                        <!-- Konten akan dimuat di sini -->
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Modal -->

            <!-- row -->
            <div class="container-fluid">
                @section('content')@show
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->




        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script> <br>
                    Designed &amp; Developed by <a href="https://www.instagram.com/" target="_blank">Faliqh Yoon</a>

                </p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('sipenmaru/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('sipenmaru/vendor/chart.js/Chart.bundle.min.js') }}"></script>

    <!-- Apex Chart -->
    <script src="{{ asset('sipenmaru/vendor/apexchart/apexchart.js') }}"></script>

    <script src="{{ asset('sipenmaru/vendor/chart.js/Chart.bundle.min.js') }}"></script>

    <!-- Chart piety plugin files -->
    <script src="{{ asset('sipenmaru/vendor/peity/jquery.peity.min.js') }}"></script>
    <!-- Dashboard 1 -->
    <script src="{{ asset('sipenmaru/js/dashboard/dashboard-1.js') }}"></script>

    <script src="{{ asset('sipenmaru/vendor/owl-carousel/owl.carousel.js') }}"></script>

    <!-- Datatable -->
    <script src="{{ asset('sipenmaru/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('sipenmaru/js/plugins-init/datatables.init.js') }}"></script>

    <!-- Required datatable js -->
    <script src="{{ asset('sipenmaru/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('sipenmaru/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>


    <!-- Daterangepicker -->
    <!-- momment js is must -->
    <script src="{{ asset('sipenmaru/vendor/moment/moment.min.js') }}"></script>
    <script src="{{ asset('sipenmaru/vendor/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- clockpicker -->
    <script src="{{ asset('sipenmaru/vendor/clockpicker/js/bootstrap-clockpicker.min.js') }}"></script>
    <!-- asColorPicker -->
    <script src="{{ asset('sipenmaru/vendor/jquery-asColor/jquery-asColor.min.js') }}"></script>
    <script src="{{ asset('sipenmaru/vendor/jquery-asGradient/jquery-asGradient.min.js') }}"></script>
    <script src="{{ asset('sipenmaru/vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js') }}"></script>
    <!-- Material color picker -->
    <script
        src="{{ asset('sipenmaru/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}">
    </script>
    <!-- pickdate -->
    <script src="{{ asset('sipenmaru/vendor/pickadate/picker.js') }}"></script>
    <script src="{{ asset('sipenmaru/vendor/pickadate/picker.time.js') }}"></script>
    <script src="{{ asset('sipenmaru/vendor/pickadate/picker.date.js') }}"></script>

    <!-- Daterangepicker -->
    <script src="{{ asset('sipenmaru/js/plugins-init/bs-daterange-picker-init.js') }}"></script>
    <!-- Clockpicker init -->
    <script src="{{ asset('sipenmaru/js/plugins-init/clock-picker-init.js') }}"></script>
    <!-- asColorPicker init -->
    <script src="{{ asset('sipenmaru/js/plugins-init/jquery-asColorPicker.init.js') }}"></script>
    <!-- Material color picker init -->
    <script src="{{ asset('sipenmaru/js/plugins-init/material-date-picker-init.js') }}"></script>
    <!-- Pickdate -->
    <script src="{{ asset('sipenmaru/js/plugins-init/pickadate-init.js') }}"></script>

    <!-- Sweetalert -->
    <script src="{{ asset('sipenmaru/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('sipenmaru/js/plugins-init/sweetalert.init.js') }}"></script>

    <!-- Toastr -->
    <script src="{{ asset('sipenmaru/vendor/toastr/js/toastr.min.js') }}"></script>

    <!-- All init script -->
    <script src="{{ asset('sipenmaru/js/plugins-init/toastr-init.js') }}"></script>


    <script src="{{ asset('sipenmaru/js/custom.min.js') }}"></script>
    <script src="{{ asset('sipenmaru/js/dlabnav-init.js') }}"></script>
    <script src="{{ asset('sipenmaru/js/demo.js') }}"></script>
    <script src="{{ asset('sipenmaru/js/styleSwitcher.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.select2').select2();
        });
    </script>
    <script>
        function cardsCenter() {

            /*  testimonial one function by = owl.carousel.js */

            jQuery('.card-slider').owlCarousel({
                loop: true,
                margin: 0,
                nav: true,
                //center:true,
                slideSpeed: 3000,
                paginationSpeed: 3000,
                dots: true,
                navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
                responsive: {
                    0: {
                        items: 1
                    },
                    576: {
                        items: 1
                    },
                    800: {
                        items: 1
                    },
                    991: {
                        items: 1
                    },
                    1200: {
                        items: 1
                    },
                    1600: {
                        items: 1
                    }
                }
            })
        }

        jQuery(window).on('load', function() {
            setTimeout(function() {
                cardsCenter();
            }, 1000);
        });

        $(document).ready(function() {
            $('.mdb-select').materialSelect();

            $('.sel2').select2();
        });
    </script>

    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>

    <script>
        var serverClock = jQuery("#jamServer");
        if (serverClock.length > 0) {
            showServerTime(serverClock, serverClock.text());
        }

        function showServerTime(obj, time) {
            var parts = time.split(":"),
                newTime = new Date();

            newTime.setHours(parseInt(parts[0], 10));
            newTime.setMinutes(parseInt(parts[1], 10));
            newTime.setSeconds(parseInt(parts[2], 10));

            var timeDifference = new Date().getTime() - newTime.getTime();
            var methods = {
                displayTime: function() {
                    var now = new Date(new Date().getTime() - timeDifference);
                    obj.text([
                        methods.leadZeros(now.getHours(), 2),
                        methods.leadZeros(now.getMinutes(), 2),
                        methods.leadZeros(now.getSeconds(), 2)
                    ].join(":"));
                    setTimeout(methods.displayTime, 500);
                },

                leadZeros: function(time, width) {
                    while (String(time).length < width) {
                        time = "0" + time;
                    }
                    return time;
                }
            }
            methods.displayTime();
        }

        (function($) {
            $.popup = function(options) {
                var settings = {
                    url: location.href,
                    type: "POST",
                    data: {},
                    modal: $('#popupModal'),
                    target: $('#bodyModal'),
                    title: 'Popup window',
                    area: $('body'),
                    modalSize: 'md', // 'md' or 'lg'
                };

                options = options || {};
                $.extend(settings, options);

                // Set modal title
                settings.modal.find('.modal-title').text(settings.title);

                // Set modal size
                settings.modal.find('.modal-dialog').removeClass('modal-lg modal-md').addClass('modal-' + settings.modalSize);

                // Show loader (optional)
                settings.area.append('<div class="loader">Loading...</div>');

                // Load content into the modal
                $(settings.target).load(settings.url, settings.data, function(response, status, xhr) {
                    // Error handling
                    if (status == "error") {
                        console.log(xhr.status + " " + xhr.statusText);
                    }

                    // Show the modal
                    settings.modal.modal('show');

                    // Remove loader
                    $('.loader').remove();
                });
            };
        })(jQuery);

    </script>

    <script>
        $(document).ready(function(){

            function disableSelectedOptions() {
                $('.window option').prop('disabled', false); // Reset semua opsi

                $('.window').each(function() {
                    var selectedValue = $(this).val();

                    // Hanya proses jika selectedValue tidak kosong
                    if (selectedValue) {
                        // Disable opsi yang sudah dipilih di elemen lain
                        $('.window').not(this).find('option[value="' + selectedValue + '"]').prop('disabled', true);

                        // Update hidden input hanya jika ada nilai yang dipilih
                        var hiddenInputId = $(this).data('id') + '_hidden';
                        $('#' + hiddenInputId).val(selectedValue);
                        console.log("Selected Value: " + selectedValue + " saved to Hidden Input: " + hiddenInputId);
                    }
                });
            }

            // Initial call to disable options
            disableselectoption();

            // Update when a select element changes
            $(document).on('change', '.window', function() {
                disableSelectedOptions();
            });

            $(document).on('click', '.generate_kode', function(e) {
    e.preventDefault();
    var link = $(this).data('url');
    var type = $(this).data('type') ?? '';
    var get_produk = $(this).data('get_produk') ?? '';

    var swalHtmlContent = `
        <label class="label-generate-form">Pilih jumlah data yang ingin di-generate:</label>
        <select id="jumlahData" class="form-select select2">
            <option>Pilih jumlah</option>
            <option value="1">1 data</option>
            <option value="10">10 data</option>
            <option value="20">20 data</option>
            <option value="50">50 data</option>
            <option value="100">100 data</option>
        </select>
        <label class="label-generate-form">Nama Dealer</label>
        <input type="text" id="dealer" class="form-control" placeholder="Masukan nama dealer (opsional)">
        `;

    // --- LOGIKA ANJAY UNTUK KEANJAYAN FORM BERBEDA ---
    if (type != 'roll' && type != 'sub_roll') {
        swalHtmlContent += `
            <label class="label-generate-form">Pilih tanggal:</label>
            <input type="date" id="tanggalData" class="form-control">
        `;

        Swal.fire({
            title: 'Generate Kode?',
            html: swalHtmlContent,
            focusConfirm: false,
            showCancelButton: true,
            confirmButtonText: 'Ya, Generate Data!',
            onOpen: () => { // Menggunakan onOpen
                $('.select2').select2({
                    dropdownParent: $('.swal2-container')
                });
            },
            preConfirm: () => {
                return {
                    jumlah: $('#jumlahData').val(),
                    tanggal: $('#tanggalData').val(),
                    dealer: $('#dealer').val()
                }
            }
        }).then((result) => {
            // === PERBAIKAN FINAL DI SINI ===
            // Cukup periksa apakah result.value ada. Ini lebih aman untuk semua versi.
            if (result.value) {
                $.ajax({
                    url: link,
                    method: 'GET',
                    data: result.value, // Langsung kirim semua data dari preConfirm
                    success: function(response) {
                        // Di sini kita asumsikan controller akan reload halaman
                        // karena controller asli Anda menggunakan redirect.
                        Swal.fire('Sukses!', 'Data sedang diproses...', 'success');
                        setTimeout(function(){ window.location.reload(); }, 1500);
                    },
                    error: function() {
                        Swal.fire('Gagal!', 'Gagal Generate Data!', 'error');
                    }
                });
            }
        });

    } else { // Blok untuk roll/sub_roll
        var from = (type == 'sub_roll') ? 'sub_roll' : '';
        $.ajax({
            url: get_produk,
            data: { from: from },
            method: 'GET',
            success: function(response) {
                swalHtmlContent += `
                    <label class="label-generate-form">Pilih produk:</label>
                    <select id="produkData" class="form-select select2">
                        <option>Pilih produk</option>`;
                response.forEach(function(produk) {
                    var value = (type == 'roll') ? produk.id : `${produk.id}-${produk.roll_name}`;
                    var text = (type == 'roll') ? produk.nama_produk : `${produk.roll_name} - ${produk.nama_produk}`;
                    swalHtmlContent += `<option value="${value}">${text}</option>`;
                });
                swalHtmlContent += `</select>`;

                Swal.fire({
                    title: 'Generate Kode?',
                    html: swalHtmlContent,
                    focusConfirm: false,
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Generate Data!',
                    onOpen: () => { // Menggunakan onOpen
                        $('.select2').select2({
                            dropdownParent: $('.swal2-container')
                        });
                    },
                    preConfirm: () => {
                        return {
                            jumlah: $('#jumlahData').val(),
                            dealer: $('#dealer').val(),
                            produk: $('#produkData').val(),
                            tanggal: '' // tanggal dikosongkan untuk tipe ini
                        }
                    }
                }).then((result) => {
                    // === PERBAIKAN FINAL DI SINI JUGA ===
                    if (result.value) {
                        $.ajax({
                            url: link,
                            method: 'GET',
                            data: result.value, // Langsung kirim semua data
                            success: function(response) {
                                Swal.fire('Sukses!', 'Data sedang diproses...', 'success');
                                setTimeout(function(){ window.location.reload(); }, 1500);
                            },
                            error: function() {
                                Swal.fire('Gagal!', 'Gagal Generate Data!', 'error');
                            }
                        });
                    }
                });
            },
            error: function() {
                Swal.fire('Gagal!', 'Gagal mendapatkan data produk!', 'error');
            }
        });
    }
});

            $(document).on('click','.btn-delete', function (e) {
                e.preventDefault();
                var link = $(this).attr('href');
                var name = $(this).data('name');

                Swal.fire({
                    title: "Apakah Kamu Yakin Untuk Menghapus Data "+name+"?",
                    text: "Kamu tidak bisa mengembalikan data ini!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    //cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus itu!'
                }).then((result) => {
                    if (result.value) {
                        window.location = link;
                    }
                });
            });

            $(document).on('click','.btn-update', function (e) {
                e.preventDefault();
                var link = $(this).data('link');

                Swal.fire({
                    title: 'Simpan Perubahan?',
                    type: 'info',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Simpan',
                    denyButtonText: `Batal`,
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result) {
                        $.ajax({
                            url: link,
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}' // Menyertakan CSRF token
                            },
                            success: function(response) {
                                //Swal.fire('Perubahan Disimpan!', '', 'success');
                            },
                            error: function(xhr) {
                                //Swal.fire('Gagal Simpan Perubahan!', '', 'error');
                            }
                        });
                    } else if (result) {
                        Swal.fire('Gagal Simpan Perubahan!', '', 'info')
                    }
                });
            });
        });
    </script>
</body>

</html>