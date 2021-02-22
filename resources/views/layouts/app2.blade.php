<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>งานป้องกันและบรรเทาสาธารณภัย เทศบาลตำบลวังพร้าว</title>
    {{-- --------------------------------------------<<Login>>--------------------------------------------------------------------- --}}
    <link rel="icon" type="image/png" href="project-V1/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    {{-- <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css"> --}}
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    {{-- <link rel="stylesheet" type="text/css" href="css/main.css"> --}}

    {{-- --------------------------------------------<<Help>>--------------------------------------------------------------------- --}}
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->
    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
    <!-- ThemeFisher Icon -->
    <link rel="stylesheet" href="plugins/themefisher-fonts/themefisher-fonts.css">
    <!-- Light Box -->
    <link rel="stylesheet" href="plugins/magnific-popup/magnific-popup.css">
    <!-- animation css -->
    <link rel="stylesheet" href="plugins/animate/animate.css">
    <!-- slick slider -->
    <link rel="stylesheet" href="plugins/slick/slick.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <!-- Revolution Slider -->
    <link rel="stylesheet" href="css/style.css">
    <script src="plugins/modernizr.min.js"></script>

    {{-- --------------------------------------------<<Index>>--------------------------------------------------------------------- --}}
    <!-- information -->
    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Owl Carousel -->
    <link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />
    <link type="text/css" rel="stylesheet" href="css/owl.theme.default.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css" />
    <!-- Blog -->
    <div id="blog" class="section md-padding bg-grey">

        {{-- --------------------------------------------<<download>>--------------------------------------------------------------------- --}}

        {{-- ------------------------------------- เพิ่ม JQuery ------------------------------------- --}}
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        {{-- ------------------------------------- เพิ่ม sweetalert ------------------------------------- --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
        <script src="{{ asset('js/bonus.js') }}"></script>
</head>

<body>
    <!-- Navigation -section
      =========================-->
    <nav class="navbar navbar-fixed-top navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand logo" href="/">
                    <img width="62px" src="images/logo.png" alt="">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right menu">

                    <!-- <li><a href="services.html">แจ้งเหตุฉุกเฉิน</a></li> -->
                    <!-- <li><a href="portfolio.html">ข้อมูลภัยพิบัติ</a></li> -->
                    <li><a href="/">หน้าแรก</a></li>
                    <li><a href="{{ url('/help') }}">ศูนย์ช่วยเหลือ</a></li>
                    <li><a href="{{ url('/download') }}">ดาวน์โหลด</a></li>
                    <li><a href="{{ url('/notifys') }}">แจ้งเหตุ</a></li>
                    @auth
                    <li><a href="{{ url('/user') }}">ผู้ใช้งาน</a></li>
					<li><a href="{{ url('/warehouse')}}">อุปกรณ์</a></li>
					
                    @endif

                    {{-- <li><a href="{{ route('login') }}">เข้าสู่ระบบ</a></li> --}}
                    <li>
                        @if (Route::has('login'))
                        {{-- <div class="top-right links"> --}}
                        @auth
                        <a href="{{ url('/home') }}">Home</a>
                        @else
                        <a href="{{ route('login') }}">เข้าสู่ระบบ</a>
                        @endauth
                        {{-- </div> --}}
                    </li>
                    @endif
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>

    @yield('content')

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="container">
                    <div class="footer-top">
                        <div class="col-md-4">
                            <!-- footer About section
                            ========================== -->
                            <div class="footer-about">
                                <h3 class="footer-title">เกี่ยวกับ</h3>
                                <a href="www.wangprao.go.th">
                                    <div>www.wangprao.go.th</div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- footer Address section
                            ========================== -->
                            <div class="footer-address">
                                <h3 class="footer-title">ที่อยู่</h3>
                                <p>สำนักงานเทศบาลตำบลวังพร้าว <br> ตำบลวังพร้าว อ.เกาะคา จ.ลำปาง 52130</p>
                                <p class="contact-address">
                                    ติดต่อ : <a href="tel:+054209202">054-209202 </a> <br>
                                    Email : <a href="mailto:info@info.com">wangprao@hotmail.com</a>
                                </p><br>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- footer Media link section
                            ========================== -->
                            <div class="footer-social-media">
                                <h3 class="footer-title">ติดต่อ</h3>
                                <ul class="footer-media-link">
                                    <li><a href="#"><i class="tf-ion-social-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="tf-ion-social-google-outline" aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="footer-nav text-center">
                        <div class="col-md-12">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="services.html">Services</a></li>
                                <li><a href="portfolio.html">Portfolio</a></li>
                                <li><a href="#">Our Team</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div>
                    </div> -->
                    <div class="text-center">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>&copy; 2020 All rights reserved. <br>
                                    Design and Developed By <a href="https://#">ThemeBis.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>
{{-- --------------------------------------------<<Login>>--------------------------------------------------------------------- --}}
<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

{{-- --------------------------------------------<<Index&&Help>>--------------------------------------------------------------------- --}}
<script src="plugins/jquery.min.js"></script>
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<!-- slick slider -->
<script src="plugins/slick/slick.min.js"></script>
<!-- filter -->
<script src="plugins/filterizr/jquery.filterizr.min.js"></script>
<!-- Lightbox -->
<script src="plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
<!-- Parallax -->
<script src="plugins/parallax.min.js"></script>
<!-- Video -->
<script src="plugins/jquery.vide.js"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
<script src="plugins/google-map/gmap.js"></script>
<script src="js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });

</script>

{{-- --------------------------------------------<<download>>--------------------------------------------------------------------- --}}
