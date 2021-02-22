@extends('layouts.index-layout')
@section('content')
<div class="case-content">
    <div class="case-study-content">
        <div class="content-blog">
            <!-- Blog -->
            <div id="blog" class="section md-padding">

                <!-- Container -->
                <div class="container">

                    <!-- Row -->
                    <div class="row">
                        <!-- Section header -->
                        <div class="section-header text-center">
                            <h2 class="title">ข่าวประชาสัมพันธ์</h2><br>
                        </div>
                        <!-- /Section header -->
                        <!-- Main -->
                        <main id="main" class="col-md-9">
                            <div class="blog">
                                <div class="blog-img-show">
                                    <img class="img-responsive" src="../../upload/news/{{$news->news_pic}}" alt="">
                                </div>
                                <div class="blog-content">
                                    <ul class="blog-meta">
                                        {{-- <li><i class="fa fa-user"></i>{{$news->staff_id}}</li> --}}
                                        <li><i class="fa fa-clock-o"></i>{{date('d-m-Y',strtotime($news->created_at))}}
                                        </li>
                                        {{-- <li><i class="fa fa-comments"></i>57</li> --}}
                                    </ul>
                                    <h3> {{$news->news_name}} </h3>
                                    <p>{!! nl2br(str_replace("","<br>",$news->news_detail)) !!}</p>
                                </div>
                            </div>
                        </main>
                        <!-- /Main -->


                        <!-- Aside -->
                        <aside id="aside" class="col-md-3">

                            <!-- Search -->
                            {{-- <div class="widget">
                                <div class="widget-search">
                                    <input class="search-input" type="text" placeholder="search">
                                    <button class="search-btn" type="button"><i class="fa fa-search"></i></button>
                                </div>
                            </div> --}}
                            <!-- /Search -->

                            <!-- Category -->
                            {{-- <div class="widget">
                                <h3 class="title">Category</h3>
                                <div class="widget-category">
                                    <a href="#">Web Design<span>(7)</span></a>
                                    <a href="#">Marketing<span>(142)</span></a>
                                    <a href="#">Web Development<span>(74)</span></a>
                                    <a href="#">Branding<span>(60)</span></a>
                                    <a href="#">Photography<span>(5)</span></a>
                                </div>
                            </div> --}}
                            <!-- /Category -->

                            <!-- Posts sidebar -->
                            <div class="widget">
                                <h3 class="title-hd">ข่าวอื่นๆ</h3>

                                @foreach ($allnews as $item)
                                <!-- single post -->
                                <div class="widget-post">
                                    <a href="{{url('blog/show',$item->news_id)}}">
                                        <img src="../../upload/news/{{$item->news_pic}}" alt="" style="width: 100px">
                                        {{mb_substr($item->news_name,0,30, 'UTF-8')}}
                                    </a>
                                    <ul class="blog-meta">
                                        <li>{{date('d-m-Y',strtotime($item->created_at))}}</li>
                                    </ul>
                                </div>
                                <!-- /single post -->
                                @endforeach

                            </div>
                            <!-- /Posts sidebar -->

                        </aside>
                        <!-- /Aside -->

                    </div>
                    <!-- /Row -->

                </div>
                <!-- /Container -->

            </div>
            <!-- /Blog -->

        </div>
    </div>
</div>

@endsection
