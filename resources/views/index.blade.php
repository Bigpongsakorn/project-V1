@extends('layouts.index-layout')

@section('content')
<!-- Loader to display before content Load-->
<div class="loading">

    {{-- <img src="../../assert/images/loader.gif" alt=""> --}}
    <div class="windows8 loading-position">
        <div class="wBall" id="wBall_1">
            <div class="wInnerBall"></div>
        </div>
        <div class="wBall" id="wBall_2">
            <div class="wInnerBall"></div>
        </div>
        <div class="wBall" id="wBall_3">
            <div class="wInnerBall"></div>
        </div>
        <div class="wBall" id="wBall_4">
            <div class="wInnerBall"></div>
        </div>
        <div class="wBall" id="wBall_5">
            <div class="wInnerBall"></div>
        </div>
    </div>
</div>

<!-- Hero Area -section
=========================-->
<header class="hero-area th-fullpage" data-parallax="scroll">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="color:#fff">
                <h1>งานป้องกันและบรรเทาสาธารณภัย<br>เทศบาลตำบลวังพร้าว</h1>
            </div>
        </div>
    </div>
</header>

<!-- Case Study Sections
=========================-->

<section class="case-study">
    <div class="text-center">
        <h2 class="title">ข่าวประชาสัมพันธ์</h2>
    </div>
    <!-- Case Study Description
    top section -->
    <div class="case-study-content">
        <div class="container">
            <!-- Blog -->
            <div id="blog" class="section md-padding bg-grey">

                <!-- Container -->
                <div class="container">

                    <!-- Row -->
                    <div class="row">

                        
                        @foreach ($news as $item)
                            <!-- blog -->
                        <div class="col-md-4">
                            <div class="blog">
                                <div class="blog-img">
                                    <img class="img-responsive" src="../../upload/news/{{$item->news_pic}}" alt="">
                                </div>
                                <div class="blog-content">
                                    <ul class="blog-meta">
                                        {{-- <li><i class="fa fa-user"></i>John doe</li> --}}
                                        <li><i class="fa fa-clock-o"></i>
                                            {{date('d-m-Y',strtotime($item->created_at))}}
                                        </li>
                                        {{-- <li><i class="fa fa-comments"></i>57</li> --}}
                                    </ul>
                                    <div class="blog-title">
                                        <h3>{{$item->news_name}}</h3>
                                    </div>
                                    <div class="blog-detail">
                                        <p>{{$item->news_detail}}</p>
                                    </div>
                                    <a href="{{ url('/blog/show',$item->news_id) }}"> อ่านต่อ...</a>

                                </div>
                            </div>
                        </div>
                        <!-- /blog -->
                        @endforeach
                        

                    </div>
                    <!-- /Row -->

                </div>
                <!-- /Container -->

            </div>
            <!-- /Blog -->
        </div>
    </div>
</section>

@endsection