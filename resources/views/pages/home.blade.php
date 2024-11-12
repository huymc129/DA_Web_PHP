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
           <h1 class="section-title"><span>Sinh vật hot</span></h1>
        </div>
        <div id="halim_related_details-2" class="owl-carousel owl-theme related-film">
            @foreach($detail_hot as $key => $hot)
                <article class="thumb grid-item post-38498">
                    <div class="halim-item">
                        <a class="halim-thumb" href="{{route('detail',$hot->slug)}}" title="sinh vat hot">
                            <figure><img class="lazy img-responsive" src="{{ asset('uploads/detail/' . $hot->image) }}" title="{{($hot->title)}}"></figure>
                            <span class="status">
                                @if($hot->resolution==0)
                                social
                                @elseif($hot->resolution==1)
                                solitary
                                @else
                                parasitic 
                                @endif
                            </span>
                            <span class="detail_chitiet"><i class="fa fa-play" aria-hidden="true"></i>
                                @if($hot->phiendich==0)
                                Everywhere
                                @elseif($hot->phiendich==1)
                                  solitary
                                @else
                                parasitic
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
                ['<i class="hl-down-open rotate-left"></i>', '<i class="hl-down-open rotate-right"></i>'],responsiveClass: true,responsive: {0: {items:2},480: {items:3}, 600: {items:4},1000: {items: 5}}})});
        </script>
     </div>
    <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
        @foreach($category_home as $key => $cate_home)
            <section id="halim-advanced-widget-2">
                <div class="section-heading">
                    <a href="danhmuc.php" title="danhmuc">
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
                                    Social
                                    @elseif($det->resolution==1)
                                    Solitary
                                    @else
                                    parasitic
                                    @endif
                                </span>
                                    <span class="episode"><i class="fa fa-play"aria-hidden="true"></i>
                                        @if($det->phiendich==0)
                                        Everywhere
                                        @elseif($det->phiendich==1)
                                        Asia
                                        @else
                                        Europe
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

</div>
@endsection