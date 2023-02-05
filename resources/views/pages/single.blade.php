@extends('layouts.main')
@section('title',  $fileLang->title . ' | News')
@section('description', $fileLang->description)
@section('content')
    <!--================= main start ================-->
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> <a href="{{route('news', app()->getLocale())}}">News</a>
                <span></span> {{$fileLang->title}}
            </div>
        </div>
    </div>
    <div class="page-content mb-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-11 col-lg-12 m-auto">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="single-page pt-50 pr-30">
                                <div class="single-header style-2">
                                    <div class="row">
                                        <div class="col-xl-10 col-lg-12 m-auto">
                                            <h6 class="mb-10"><a href="{{url('/')}}">Livewire S.r.l</a></h6>
                                            <h2 class="mb-10">{{$fileLang->title}}</h2>
                                            <div class="single-header-meta">
                                                <div class="entry-meta meta-1 font-xs mt-15 mb-15">
                                                    <a class="author-avatar" href="#">
                                                        <img class="img-circle" src="{{$single->preview}}" alt=""/>
                                                    </a>
                                                    <span class="post-on has-dot">{!! $fileLang->date !!}</span>
                                                </div>
                                                <div class="social-icons single-share">
                                                    <ul class="text-grey-5 d-inline-block">
                                                        <li class="mr-5">
                                                            <a href="#"><img
                                                                    src="assets/imgs/theme/icons/icon-bookmark.svg"
                                                                    alt=""/></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><img
                                                                    src="assets/imgs/theme/icons/icon-heart-2.svg"
                                                                    alt=""/></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <figure class="single-thumbnail">
                                    <img src="{{$single->preview}}" alt=""/>
                                </figure>
                                <div class="single-content">
                                    <div class="row">
                                        <div class="col-xl-10 col-lg-12 m-auto">

                                            {!! $article !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 primary-sidebar sticky-sidebar pt-50">

                            <div class="widget-area">
                                <div class="sidebar-widget widget-category-2 mb-50">
                                    <h5 class="section-title style-1 mb-30">Categorie</h5>

                                    <ul>
                                        @foreach (getCategories() as $cat)
                                            <li>
                                                <a href="{{ route('categoryPage',['lang'=>app()->getLocale(),$cat->id,  $cat->category_slug]) }}"><img
                                                            src="/assets/imgs/theme/icons/category-6.svg"
                                                            alt=""/>{{ucFirst($cat->name)}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- Product sidebar Widget -->
                            </div>

                            <div class="widget-area">
                                <!-- Product sidebar Widget -->
                                <div class="sidebar-widget product-sidebar mb-50 p-30 bg-grey border-radius-10">
                                    <h5 class="section-title style-1 mb-30">Trending Now</h5>
                                    @foreach ($latest as $l)
                                        <div class="single-post clearfix">
                                            <div class="image">
                                                <img src="{{'/uploads/news/' . $l->url}}" alt="News"/>
                                            </div>
                                            <div class="content pt-10">
                                                <h5>
                                                    <a href="{{route('single',['lang' => app()->getLocale(), 'single' => Str::slug($l->link)])}}">{{ucwords($l->path->title)}}</a>
                                                </h5>

                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content  end -->

@endsection
