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

                        <div class="detail-info col-xs-12">
                            <div class="detail-poster col-md-3">
                                <img class="detail-thumb" src="{{ asset('uploads/detail/' . $detail->image) }}">
   
                            </div>
                            <div class="film-poster col-md-9">
                                <h1 class="detail-title title-1"
                                    style="display:block;line-height:35px;margin-bottom: -14px;color: #ffed4d;text-transform: uppercase;font-size: 18px;">
                                    {{ $detail->title }}</h1>
                                <h2 class="detail-title title-2" style="font-size: 12px;">{{ $detail->name_eng }}</h2>
                                <ul class="list-info-group">
                                    <li class="list-info-group-item"><span>Thông tin</span> :
                                       <span class="quality">
                                           @if ($detail->resolution == 0)
                                               Social
                                           @elseif($detail->resolution == 1)
                                               Solitary
                                           @else
                                                parasitic
                                           @endif
                                       </span>
                                       <span class="episode">
                                           @if ($detail->phiendich == 0)
                                                Everywhere
                                           @elseif($detail->phiendich == 1)
                                                Asia
                                           @else
                                                Europe
                                           @endif
                                       </span>
                                   </li>
                                    <li class="list-info-group-item"><span>Điểm IMDb</span> : <span
                                            class="imdb">7.2</span></li>
                                    <li class="list-info-group-item"><span>Thời lượng</span> :{{ $detail->thoiluong}}</li>
                                    <li class="list-info-group-item"><span>Loài</span> :
                                        <a href="{{ route('specie', $detail->specie->slug) }}"
                                            rel="specie tag">{{ $detail->specie->title }}</a>,
                                    </li>
                                    <li class="list-info-group-item"><span>Danh mục</span> :
                                        <a href="{{ route('category', $detail->category->slug) }}"
                                            rel="category tag">{{ $detail->category->title }}</a>,
                                    </li>
                                    <li class="list-info-group-item"><span>Nơi ở</span> :
                                        <a href="{{ route('location', $detail->location->slug) }}"
                                            rel="location tag">{{ $detail->location->title }}</a>
                                    </li>
                                </ul>
                                <div class="detail-trailer hidden"></div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div id="halim_trailer"></div>
                    <div class="clearfix"></div>
                    <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Thông tin chi tiết</span></h2>
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
                        <article class="thumb grid-item post-38498 hot-movie">
                            <div class="halim-item">
                                <a class="halim-thumb" href="{{route('detail', $hot->slug)}}" title="{{ $hot->title }}">
                                    <figure><img class="lazy img-responsive" src="{{ asset('uploads/detail/' . $hot->image) }}" title="{{ $hot->title }}"></figure>
                                    <span class="status">
                                        @if($hot->resolution == 0)
                                            social
                                        @elseif($hot->resolution == 1)
                                            solitary
                                        @elseif($hot->resolution == 2)
                                            parasitic
                                        @endif
                                    </span>
                                    <span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                                        @if($hot->phiendich == 0)
                                            Everywhere
                                        @elseif($hot->phiendich == 1)
                                            Asia
                                        @else
                                            Europe
                                        @endif
                                    </span>
                                    <div class="icon_overlay"></div>
                                    <div class="halim-post-title-box">
                                        <div class="halim-post-title">
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
