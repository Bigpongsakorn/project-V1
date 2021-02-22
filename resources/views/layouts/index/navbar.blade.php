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
                <img src="../../asset/images/logo-lp.png" alt="">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-right menu">
                <li><a href="/">หน้าแรก</a></li>
                <li><a href="/notification">แจ้งเหตุฉุกเฉิน</a></li>
                <li><a href="/danger_area">พื้นที่เสี่ยงภัย</a></li>
                <li><a href="{{ url('/download') }}">ดาวน์โหลดเอกสาร</a></li>
                <li><a href="{{ url('/download/fill') }}">กรอกเอกสาร</a></li>
                <li><a href="{{ url('/help') }}">ศูนย์ช่วยเหลือ</a></li>
                {{-- <li><a href="{{ route('login') }}">เข้าสู่ระบบ</a></li> --}}
                <li>
                    @if (Route::has('login'))
                    @auth
                    <a href="{{ url('/home') }}">Home</a>
                    @else
                    <a href="{{ route('login') }}">เข้าสู่ระบบ</a>
                    @endauth
                </li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>
