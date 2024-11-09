@extends('layout')
@section('content')

    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="yoast_breadcrumb hidden-xs"><span><span><a href="">{{ $cate_slug->title }}</a> »
                                    <span class="breadcrumb_last" aria-current="page">2020</span></span></span></div>
                    </div>
                </div>
            </div>
            <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                <div class="ajax"></div>
            </div>
        </div>
        <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
            <section>
                <div class="section-bar clearfix">
                    <h1 class="section-title"><span>{{ $cate_slug->title }}</span></h1>
                </div>
                <div class="halim_box">                    
                    @foreach ($detail as $key => $item)     
                        <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                            <div class="halim-item">
                                <a class="halim-thumb" href="{{ route('detail', $item->slug) }}">
                                    <figure>
                                        <img class="lazy img-responsive" src="{{ asset('uploads/detail/' . $item->image) }}" title="{{ $item->title }}">
                                    </figure>
                                    <span class="status">
                                        @if ($item->resolution == 0)
                                            SD
                                        @elseif($item->resolution == 1)
                                            HD
                                        @elseif($item->resolution == 2)
                                            HD+
                                        @else
                                            Full HD
                                        @endif
                                    </span>
                                    <span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                                        @if ($item->phiendich == 0)
                                            Vietsub
                                        @elseif($item->phiendich == 1)
                                            Lồng tiếng
                                        @else
                                            Thuyết Minh
                                        @endif
                                    </span>
                                    <div class="icon_overlay"></div>
                                    <div class="halim-post-title-box">
                                        <div class="halim-post-title">
                                            <p class="entry-title">{{ $item->title }}</p>
                                            <p class="original_title">{{ $item->name_eng }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
                <div class="clearfix"></div>
                <div class="text-center">
                    {!! $detail->links('pagination::bootstrap-5') !!}
                </div>
            </section>
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
                                <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10"
                                    data-type="all">All</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <section class="tab-content">
                    <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
                        <div class="halim-ajax-popular-post-loading hidden"></div>
                        <div id="halim-ajax-popular-post" class="popular-post">
                            <!-- Lặp lại các bài viết ở đây -->
                        </div>
                    </div>
                </section>
                <div class="clearfix"></div>
            </div>
        </aside> --}}
    </div>

@endsection
