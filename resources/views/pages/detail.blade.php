@extends('layout')
@section('content')
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="yoast_breadcrumb hidden-xs"><span><span><a
                                        href="{{ route('category', $detail->category->slug) }}">{{ $detail->category->title }}</a>
                                    » <span>
                                        <a
                                            href="{{ route('location', $detail->location->slug) }}">{{ $detail->location->title }}</a>
                                        » <span class="breadcrumb_last"
                                            aria-current="page">{{ $detail->title }}</span></span></span></span></div>
                    </div>
                </div>
            </div>
            <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                <div class="ajax"></div>
            </div>
        </div>
        <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
            <section id="content" class="test">
                <div class="clearfix wrap-content">

                    <div class="halim-detail-wrapper">
                        <div class="title-block">
                            <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="38424">
                                <div class="halim-pulse-ring"></div>
                            </div>
                            <div class="title-wrapper" style="font-weight: bold;">
                                Bookmark
                            </div>
                        </div>
                        <div class="detail_info col-xs-12">
                            <div class="detail-poster col-md-3">
                                <img class="detail-thumb" src="{{ asset('uploads/detail/' . $detail->image) }}"
                                    alt="GÓA PHỤ ĐEN">
                                <div class="bwa-content">
                                    <div class="loader"></div>
                                    <a href="{{ route('detail') }}" class="bwac-btn">
                                        <i class="fa fa-play"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="film-poster col-md-9">
                                <h1 class="detail-title title-1"
                                    style="display:block;line-height:35px;margin-bottom: -14px;color: #ffed4d;text-transform: uppercase;font-size: 18px;">
                                    {{ $detail->title }}</h1>
                                <h2 class="detail-title title-2" style="font-size: 12px;">{{ $detail->name_eng }}</h2>
                                <ul class="list-info-group">
                                    <li class="list-info-group-item"><span>Trạng Thái</span> :
                                       <span class="quality">
                                           @if ($detail->resolution == 0)
                                               SD
                                           @elseif($detail->resolution == 1)
                                               HD
                                           @elseif($detail->resolution == 2)
                                               HD+
                                           @else
                                               Full HD
                                           @endif
                                       </span>
                                       <span class="episode">
                                           @if ($detail->phiendich == 0)
                                               Vietsub
                                           @elseif($detail->phiendich == 1)
                                               Lồng tiếng
                                           @else
                                               Thuyết Minh
                                           @endif
                                       </span>
                                   </li>
                                    <li class="list-info-group-item"><span>Điểm IMDb</span> : <span
                                            class="imdb">7.2</span></li>
                                    <li class="list-info-group-item"><span>Thời lượng</span> :{{ $detail->thoiluong}}</li>
                                    <li class="list-info-group-item"><span>Thể loại</span> :
                                        <a href="{{ route('specie', $detail->specie->slug) }}"
                                            rel="specie tag">{{ $detail->specie->title }}</a>,
                                    </li>
                                    <li class="list-info-group-item"><span>Danh mục</span> :
                                        <a href="{{ route('category', $detail->category->slug) }}"
                                            rel="category tag">{{ $detail->category->title }}</a>,
                                    </li>
                                    <li class="list-info-group-item"><span>Quốc gia</span> :
                                        <a href="{{ route('location', $detail->location->slug) }}"
                                            rel="location tag">{{ $detail->location->title }}</a>
                                    </li>
                                    {{-- <li class="list-info-group-item"><span>Đạo diễn</span> : 
                                    <a class="director" rel="nofollow" href="https://phimhay.co/dao-dien/cate-shortland" title="Cate Shortland">Cate Shortland</a></li>
                                 <li class="list-info-group-item last-item" style="-overflow: hidden;-display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-flex: 1;-webkit-box-orient: vertical;"><span>Diễn viên</span> : 
                                    <a href="" rel="nofollow" title="C.C. Smiff">C.C. Smiff</a>, 
                                    <a href="" rel="nofollow" title="David Harbour">David Harbour</a>, <a href="" rel="nofollow" title="Erin Jameson">Erin Jameson</a>, <a href="" rel="nofollow" title="Ever Anderson">Ever Anderson</a>, 
                                    <a href="" rel="nofollow" title="Florence Pugh">Florence Pugh</a>, <a href="" rel="nofollow" title="Lewis Young">Lewis Young</a>, <a href="" rel="nofollow" title="Liani Samuel">Liani Samuel</a>, 
                                    <a href="" rel="nofollow" title="Michelle Lee">Michelle Lee</a>, <a href="" rel="nofollow" title="Nanna Blondell">Nanna Blondell</a>, <a href="" rel="nofollow" title="O-T Fagbenle">O-T Fagbenle</a>
                                 </li> --}}
                                </ul>
                                <div class="detail-trailer hidden"></div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div id="halim_trailer"></div>
                    <div class="clearfix"></div>
                    <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Nội dung phim</span></h2>
                    </div>
                    <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                            <article id="post-38424" class="item-content">
                                {{ $detail->description }}
                            </article>
                        </div>
                    </div>
                </div>
            </section>
            <section class="related-details">
                <div id="halim_related_details-2xx" class="wrap-slider">
                    <div class="section-bar clearfix">
                        <h3 class="section-title"><span>CÓ THỂ BẠN MUỐN XEM</span></h3>
                    </div>
                    <div id="halim_related_details-2" class="owl-carousel owl-theme related-film">
                        @foreach ($related as $key => $hot)
                            <article class="thumb grid-item post-38498">
                                <div class="halim-item">
                                    <a class="halim-thumb" href="{{ route('detail', $hot->slug) }}"
                                        title="Đại Thánh Vô Song">
                                        <figure><img class="lazy img-responsive"
                                                src="{{ asset('uploads/detail/' . $hot->image) }}"
                                                title="{{ $hot->title }}"></figure>
                                        <span class="status">
                                            @if ($hot->resolution == 0)
                                                SD
                                            @elseif($hot->resolution == 1)
                                                HD
                                            @elseif($hot->resolution == 2)
                                                HD+
                                            @else
                                                Full HD
                                            @endif
                                        </span>
                                        <span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                                            @if ($hot->phiendich == 0)
                                                Vietsub
                                            @elseif($hot->phiendich == 1)
                                                Lồng tiếng
                                            @else
                                                Thuyết Minh
                                            @endif
                                        </span>
                                        <div class="icon_overlay"></div>
                                        <div class="halim-post-title-box">
                                            <div class="halim-post-title ">
                                                <p class="entry-title">{{ $hot->title }}</p>
                                                <p class="original_title">{{ $hot->name_eng }}</p>
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
                                loop: true,
                                margin: 4,
                                autoplay: true,
                                autoplayTimeout: 4000,
                                autoplayHoverPause: true,
                                nav: true,
                                navText: ['<i class="hl-down-open rotate-left"></i>',
                                    '<i class="hl-down-open rotate-right"></i>'
                                ],
                                responsiveClass: true,
                                responsive: {
                                    0: {
                                        items: 2
                                    },
                                    480: {
                                        items: 3
                                    },
                                    600: {
                                        items: 4
                                    },
                                    1000: {
                                        items: 4
                                    }
                                }
                            })
                        });
                    </script>
                </div>
            </section>
        </main>
        <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4"></aside>
    </div>
@endsection
