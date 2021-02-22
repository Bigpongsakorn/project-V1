<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{config('app.name')}}</title>
    @include('layouts.main.header')
</head>

<body>

    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-bar"></div>
    </div>
    <!-- [ Pre-loader ] end -->

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <!-- [ Header ] start -->
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a href="{{ url('/') }}">
                            <img class="img-fluid" src="../../asset/images/logo-lp.png" width="180px"
                                alt="Theme-Logo" />
                        </a>
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu icon-toggle-right"></i>
                        </a>
                        <a class="mobile-options waves-effect waves-light">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>
                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            {{-- <li class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-prepend search-close">
                                            <i class="feather icon-x input-group-text"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Enter Keyword">
                                        <span class="input-group-append search-btn">
                                            <i class="feather icon-search input-group-text"></i>
                                        </span>
                                    </div>
                                </div>
                            </li> --}}
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                    <i class="full-screen feather icon-maximize"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="feather icon-bell"></i>
                                        <span class="badge " id="show"></span>
                                    </div>
                                    <ul class="show-notification notification-view dropdown-menu"
                                        data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <h6>Notifications</h6>
                                            <label class="label label-danger">New</label>
                                        </li>
                                        <li id="notify">
                                            {{-- @foreach ($bell as $item)
                                            <a href="/notification/detail/{{$item->ems_id}}">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h5 class="notification-user">{{$item->general_name}}</h5>
                                                    <p class="notification-msg">{{$item->ems_detail}}
                                                    </p>
                                                    <span class="notification-time">{{$item->created_at}}</span>
                                                </div>
                                            </div>
                                            </a>
                                            @endforeach --}}
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        {{-- <img src="../../asset/images/avatar-4.jpg" class="img-radius" alt="User-Profile-Image"> --}}
                                        {{-- <span>{{$user_fname}} {{$user_lname}}</span> --}}
                                        <span>{{ Auth::user()->username }}</span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu"
                                        data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        {{-- <li>
                                            <a href="#!">
                                                <i class="feather icon-settings"></i> Settings

                                            </a>
                                        </li> --}}
                                        {{-- <li>
                                            <a href="/home">
                                                <i class="feather icon-user"></i> Profile

                                            </a>
                                        </li> --}}
                                        {{-- <li>
                                            <a href="email-inbox.html">
                                                <i class="feather icon-mail"></i> My Messages

                                            </a>
                                        </li> --}}
                                        {{-- <li>
                                            <a href="auth-lock-screen.html">
                                                <i class="feather icon-lock"></i> Lock Screen

                                            </a>
                                        </li> --}}
                                        <li>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                <i class="feather icon-log-out"></i> Logout
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <!-- [ navigation menu ] start -->
                    <nav class="pcoded-navbar">
                        <div class="nav-list">
                            <div class="pcoded-inner-navbar main-menu">
                                <div class="pcoded-navigation-label">ข้อมูลเจ้าหน้าที่</div>
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="@if ($page == '/home') active
                                        pcoded-trigger @endif">
                                        <a href="{{url('/home/index')}}" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-user"></i>
                                            </span>
                                            <span class="pcoded-mtext">ข้อมูลส่วนตัว</span>
                                        </a>
                                    </li>
                                    <?php $id = Auth::user()->staff_type ?>
                                    @if($id == 1)
                                    <li class="@if ($page == '/user') active
                                        pcoded-trigger @endif">
                                        <a href="{{url('/user/index')}}" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-users"></i>
                                            </span>
                                            <span class="pcoded-mtext">ข้อมูลผู้ใช้งานระบบ</span>
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                                <div class="pcoded-navigation-label">การจัดการข้อมูล</div>
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="pcoded-hasmenu @if ($page == 'warehouse' || $page ==
                                        '/warehouse/borrows' || $page ==
                                        '/warehouse/category' ) active
                                        pcoded-trigger @endif ">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                            <span class="pcoded-mtext">คลังอุปกรณ์</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class=" @if ($page == 'warehouse') active @endif ">
                                                <a href="{{ url('/warehouse/index')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">ข้อมูลอุปกรณ์</span>
                                                </a>
                                            </li>
                                            <li class="@if ($page == '/warehouse/borrows') active @endif">
                                                <a href="{{ url('/warehouse/borrows')}}"
                                                    class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">ข้อมูลการยืมอุปกรณ์</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="pcoded-hasmenu @if ($page == '/assignment' || $page ==
                                        '/leave' || $page == '/schedule' || $page == '/work' ) active
                                        pcoded-trigger @endif">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                                            <span class="pcoded-mtext">ตารางเวรการทำงาน</span>
                                            {{-- <span class="pcoded-badge label label-warning">NEW</span> --}}
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="@if ($page == '/work') active @endif">
                                                <a href="{{ url('/assignment/work')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">ข้อมูลตารางเวรการทำงาน</span>
                                                </a>
                                            </li>
                                            <li class="@if ($page == '/assignment') active @endif">
                                                <?php $id = Auth::user()->staff_type ?>
                                                @if($id == 1)
                                                <a href="{{ url('/assignment')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">การมอบหมายงาน</span>
                                                </a>
                                                @else
                                                <a href="{{ url('/assignment/someuser')}}"
                                                    class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">การมอบหมายงาน</span>
                                                </a>
                                                @endif
                                            </li>
                                            <li class="@if ($page == '/leave') active @endif">
                                                <?php $id = Auth::user()->staff_type ?>
                                                @if($id == 1)
                                                <a href="{{url('/assignment/leavead')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">แจ้ง วันหยุด วันลา</span>
                                                </a>
                                                @else
                                                <a href="{{url('/assignment/leave')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">แจ้ง วันหยุด วันลา</span>
                                                </a>
                                                @endif
                                            </li>
                                            {{-- <li class="@if ($page == '/schedule') active @endif">
                                                <a href="{{url('/assignment/schedule')}}"
                                            class="waves-effect waves-dark">
                                            <span class="pcoded-mtext">รายละเอียด กำนดการ</span>
                                            </a>
                                    </li> --}}
                                </ul>
                                </li>
                                <li class="pcoded-hasmenu @if ($page == '/risk') active
                                        pcoded-trigger @endif">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon">
                                            <i class="feather icon-layers"></i>
                                        </span>
                                        <span class="pcoded-mtext">ความเสี่ยงภัย</span>
                                        {{-- <span class="pcoded-badge label label-danger">100+</span> --}}
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="@if ($page == '/risk') active @endif">
                                            <a href="{{url('/risk')}}" class="waves-effect waves-dark">
                                                <span class="pcoded-mtext">ข้อมูลประเภทความเสี่ยงภัย</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="pcoded-hasmenu @if ($page == '/danger_area/index_area') active
                                        pcoded-trigger @endif">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon">
                                            <i class="feather icon-feather"></i>
                                        </span>
                                        <span class="pcoded-mtext">พื้นที่เสี่ยงภัย</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="@if ($page == '/danger_area/index_area') active @endif">
                                            <a href="{{url('/danger_area/index_area')}}"
                                                class="waves-effect waves-dark">
                                                <span class="pcoded-mtext">ตำแหน่งพื้นที่เสี่ยงภัย</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="pcoded-hasmenu @if ($page == '/notification' || $page == '/notification/detail') active
                                        pcoded-trigger @endif">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-clipboard"></i>
                                            </span>
                                            <span class="pcoded-mtext">แจ้งเหตุฉุกเฉิน</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="@if ($page == '/notification') active @endif">
                                                <a href="{{url('/notification/show_notifiy')}}"
                                                    class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">ข้อมูลแจ้งเหตุฉุกเฉิน</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="@if ($page == '/dowload') active @endif">
                                        <a href="{{url('/download/detail')}}" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-download"></i>
                                            </span>
                                            <span class="pcoded-mtext">ข้อมูลเอกสาร</span>
                                        </a>
                                    </li>
                                    <li class="@if ($page == '/blog') active @endif">
                                        <a href="{{url('/blog/index')}}" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="fa fa-newspaper-o"></i>
                                            </span>
                                            <span class="pcoded-mtext">ข่าวประชาสัมพันธ์</span>
                                        </a>
                                    </li>
                                </ul>
                                </ul>
                                <div class="pcoded-navigation-label">รายงานเอกสาร</div>
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="@if ($page == '/dowload') active @endif">
                                        <a href="#" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="fa fa-file-pdf-o"></i>
                                            </span>
                                            <span class="pcoded-mtext">รายงานการเบิกยืมอุปกรณ์</span>
                                        </a>
                                    </li>
                                    <li class="@if ($page == '/operation') active @endif">
                                        <a href="/operation/index" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="fa fa-file-pdf-o"></i>
                                            </span>
                                            <span class="pcoded-mtext">ข้อมูลการปฏิบัติงาน</span>
                                        </a>
                                    </li>
                                    <li class="@if ($page == '/request') active @endif">
                                        <a href="/request/general_request" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="fa fa-file-pdf-o"></i>
                                            </span>
                                            <span class="pcoded-mtext">แบบคำร้องทั่วไป</span>
                                        </a>
                                    </li>
                                    <li class="@if ($page == '/certificate_request') active @endif">
                                        <a href="/request/certificate_request" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="fa fa-file-pdf-o"></i>
                                            </span>
                                            <span class="pcoded-mtext">คำขอหนังสือรับรองผู้ประสบภัย</span>
                                        </a>
                                    </li>
                                    <li class="@if ($page == '/certificate') active @endif">
                                        <a href="/request/certificate" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="fa fa-file-pdf-o"></i>
                                            </span>
                                            <span class="pcoded-mtext">หนังสือรับรองผู้ประสบภัย</span>
                                        </a>
                                    </li>
                                    <li class="@if ($page == '/ems') active @endif">
                                        <a href="/request/ems_report" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="fa fa-file-pdf-o"></i>
                                            </span>
                                            <span class="pcoded-mtext">แบบรายงานเหตุด่วน</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <!-- [ navigation menu ] end -->
                    {{-- --------------------------------- --}}
                    <div class="pcoded-content">
                        <div class="page-header card">
                            @yield('content')
                        </div>
                        <div id="styleSelector">
                        </div>
                        <!-- [ style Customizer ] end -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.main.footer')

</body>

</html>
