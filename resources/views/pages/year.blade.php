@extends('layout')
@section('content')
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="yoast_breadcrumb hidden-xs">
                            <span>sinh vật được phát hiện nam >
                               @for($year_bread=2000;$year_bread <= 2022;$year_bread++)
                                    <span class="breadcrumb_last" aria-current="page"><a title="{{$year_bread}}" href="{{url('nam/'.$year_bread) }}">{{$year_bread}}</a></span> »
                                @endfor
                            </span>
                                
                        </div>
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
                    <h1 class="section-title"><span>Năm: {{$year}}</span></h1>
                </div>
                <div class="halim_box">
                    @foreach ($detail as $key => $det)
                        <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                            <div class="halim-item">
                                <a class="halim-thumb" href="{{ route('detail', $det->slug) }}">
                                    <figur>
                                        <img class="lazy img-responsive" src="{{ asset('uploads/detail/' . $det->image) }}"
                                            src="{{ asset('uploads/detail/.$det->image') }}" title="{{ $det->title }}">
                                        </figure>
                                        <span class="status">
                                            @if ($det->resolution == 0)
                                                soail
                                            @elseif($det->resolution == 1)
                                                sdfsdf
                                            @elseif($det->resolution == 2)
                                                ádfasdf
                                            @else
                                                ádfasdf
                                            @endif
                                        </span>
                                        <span class="sv"><i class="fa fa-play"aria-hidden="true"></i>
                                            @if ($det->phiendich == 0)
                                                ádfasdf
                                            @elseif($det->phiendich == 1)
                                               ádfasdf
                                            @else
                                               ádfasdf
                                            @endif
                                        </span>
                                        <div class="icon_overlay"></div>
                                        <div class="halim-post-title-box">
                                            <div class="halim-post-title ">
                                                <p class="entry-title">{{ $det->title }}</p>
                                                <p class="original_title">{{ $det->name_eng }}</p>
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
    </div>
@endsection
