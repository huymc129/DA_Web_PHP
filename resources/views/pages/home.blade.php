@extends('layout')
@section ('content')
<div class="row container" id="wrapper">
    <div class="halim-panel-filter">
        <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
            <div class="ajax"></div>
        </div>
    </div>

    <div id="halim_related_details-2xx" class="wrap-slider">
        <div class="section-bar clearfix">
           <h3 class="section-title"><span>Sinh vật hot</span></h3>
        </div>
        <div id="halim_related_details-2" class="owl-carousel owl-theme related-film">
            @foreach($detail_hot as $key => $hot)
                <article class="thumb grid-item post-38498">
                    <div class="halim-item">
                        <a class="halim-thumb" href="{{route('detail',$hot->slug)}}" title="sinh vật">
                            <figure><img class="lazy img-responsive" src="{{ asset('uploads/detail/' . $hot->image) }}" title="{{($hot->title)}}"></figure>
                            <span class="status">
                                @if($hot->resolution==0)
                                    SD
                                @elseif($hot->resolution==1)
                                    HD
                                @elseif($hot->resolution==2)
                                    HD+
                                @else
                                    Full HD
                                @endif
                            </span>
                            <span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                                @if($hot->phiendich==0)
                                    Vietsub
                                @elseif($hot->phiendich==1)
                                    Lồng tiếng
                                @else
                                    Thuyết Minh
                                @endif
                            </span> 
                            <div class="icon_overlay"></div>
                            <div class="halim-post-title-box">
                            <div class="halim-post-title ">
                                <p class="entry-title">{{($hot->title)}}</p>
                                <p class="original_title">{{($hot->name_eng)}}</p>
                            </div>
                            </div>
                        </a>
                    </div>
                </article>
           @endforeach
             
          
        </div>
        <script>
           jQuery(document).ready(function($) {				
           var owl = $('#halim_related_details-2');
           owl.owlCarousel({
                loop: true,margin: 5,autoplay: true,autoplayTimeout: 4000,autoplayHoverPause: true,nav: true,navText: 
                ['<i class="hl-down-open rotate-left"></i>', '<i class="hl-down-open rotate-right"></i>'],responsiveClass: true,responsive: {0: {items:2},480: {items:3}, 600: {items:4},1000: {items: 6}}})});
        </script>
     </div>
    <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
        @foreach($category_home as $key => $cate_home)
            <section id="halim-advanced-widget-2">
                <div class="section-heading">
                    <a href="danhmuc.php" title="detail Bộ">
                        <span class="h-text">{{$cate_home->title}}</span>
                    </a>
                </div>
                <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
                @foreach($cate_home->detail->take(12) as $key => $det)
                    <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                        <div class="halim-item">
                            <a class="halim-thumb" href="{{route('detail',$det->slug)}}">
                                <figur>
                                        <img class="lazy img-responsive" src="{{ asset('uploads/detail/' . $det->image) }}"
                                        src="{{asset('uploads/detail/.$det->image')}}" title="{{($det->title)}}">
                                </figure>
                                <span class="status">
                                    @if($det->resolution==0)
                                        SD
                                    @elseif($det->resolution==1)
                                        HD
                                    @elseif($det->resolution==2)
                                        HD+
                                    @else
                                        Full HD
                                    @endif
                                </span>
                                    <span class="episode"><i class="fa fa-play"aria-hidden="true"></i>
                                        @if($det->phiendich==0)
                                            Vietsub
                                        @elseif($det->phiendich==1)
                                            Lồng tiếng
                                        @else
                                            Thuyết Minh
                                        @endif
                                    </span>
                                <div class="icon_overlay"></div>
                                <div class="halim-post-title-box">
                                    <div class="halim-post-title ">
                                        <p class="entry-title">{{($det->title)}}</p>
                                        <p class="original_title">{{($hot->name_eng)}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </article>
                @endforeach
                </div>
            </section>
            <div class="clearfix"></div>
        @endforeach
    </main>
    {{-- <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
        <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
            <div class="section-bar clearfix">
                <div class="section-title">
                    <span>Top Views</span>
                    <ul class="halim-popular-tab" role="tablist">
                        <li role="presentation" class="active">
                            <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10"
                                data-type="today">Day</a>
                        </li>
                        <li role="presentation">
                            <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10"
                                data-type="week">Week</a>
                        </li>
                        <li role="presentation">
                            <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10"
                                data-type="month">Month</a>
                        </li>
                        <li role="presentation">
                            <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="all">All</a>
                        </li>
                    </ul>
                </div>
            </div>
            <section class="tab-content">
                <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
                    <div class="halim-ajax-popular-post-loading hidden"></div>
                    <div id="halim-ajax-popular-post" class="popular-post">
                        <div class="item post-37176">
                            <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                                <div class="item-link">
                                    <img src="https://ghiendetail.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798"
                                        class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ"
                                        title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                                    <span class="is_trailer">Trailer</span>
                                </div>
                                <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
                            </a>
                            <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                            <div style="float: left;">
                                <span class="user-rate-image post-large-rate stars-large-vang"
                                    style="display: block;/* width: 100%; */">
                                    <span style="width: 0%"></span>
                                </span>
                            </div>
                        </div>
                        <div class="item post-37176">
                            <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                                <div class="item-link">
                                    <img src="https://ghiendetail.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798"
                                        class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ"
                                        title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                                    <span class="is_trailer">Trailer</span>
                                </div>
                                <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
                            </a>
                            <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                            <div style="float: left;">
                                <span class="user-rate-image post-large-rate stars-large-vang"
                                    style="display: block;/* width: 100%; */">
                                    <span style="width: 0%"></span>
                                </span>
                            </div>
                        </div>
                        <div class="item post-37176">
                            <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                                <div class="item-link">
                                    <img src="https://ghiendetail.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798"
                                        class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ"
                                        title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                                    <span class="is_trailer">Trailer</span>
                                </div>
                                <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
                            </a>
                            <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                            <div style="float: left;">
                                <span class="user-rate-image post-large-rate stars-large-vang"
                                    style="display: block;/* width: 100%; */">
                                    <span style="width: 0%"></span>
                                </span>
                            </div>
                        </div>
                        <div class="item post-37176">
                            <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                                <div class="item-link">
                                    <img src="https://ghiendetail.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798"
                                        class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ"
                                        title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                                    <span class="is_trailer">Trailer</span>
                                </div>
                                <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
                            </a>
                            <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                            <div style="float: left;">
                                <span class="user-rate-image post-large-rate stars-large-vang"
                                    style="display: block;/* width: 100%; */">
                                    <span style="width: 0%"></span>
                                </span>
                            </div>
                        </div>
                        <div class="item post-37176">
                            <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                                <div class="item-link">
                                    <img src="https://ghiendetail.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798"
                                        class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ"
                                        title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                                    <span class="is_trailer">Trailer</span>
                                </div>
                                <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
                            </a>
                            <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                            <div style="float: left;">
                                <span class="user-rate-image post-large-rate stars-large-vang"
                                    style="display: block;/* width: 100%; */">
                                    <span style="width: 0%"></span>
                                </span>
                            </div>
                        </div>
                        <div class="item post-37176">
                            <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                                <div class="item-link">
                                    <img src="https://ghiendetail.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798"
                                        class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ"
                                        title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                                    <span class="is_trailer">Trailer</span>
                                </div>
                                <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
                            </a>
                            <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                            <div style="float: left;">
                                <span class="user-rate-image post-large-rate stars-large-vang"
                                    style="display: block;/* width: 100%; */">
                                    <span style="width: 0%"></span>
                                </span>
                            </div>
                        </div>
                        <div class="item post-37176">
                            <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                                <div class="item-link">
                                    <img src="https://ghiendetail.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798"
                                        class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ"
                                        title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                                    <span class="is_trailer">Trailer</span>
                                </div>
                                <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
                            </a>
                            <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                            <div style="float: left;">
                                <span class="user-rate-image post-large-rate stars-large-vang"
                                    style="display: block;/* width: 100%; */">
                                    <span style="width: 0%"></span>
                                </span>
                            </div>
                        </div>


                    </div>
                </div>
            </section>
            <div class="clearfix"></div>
        </div>
    </aside> --}}
</div>
@endsection