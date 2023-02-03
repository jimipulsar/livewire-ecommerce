@extends('layouts.main')

@section('title', __('news.seo.title'))

@section('description', __('news.seo.description'))

@section('content')
    <div class="page-header mt-30 mb-75">
        <div class="container">
            <div class="archive-header" style="background-image: url('/uploads/about/news.jpg') !important;">
                <div class="row align-items-center">
                    <div class="col-xl-3">
                        <h1 class="mb-15" id="shopTitle">Blog & News</h1>
                        <div class="breadcrumb" id="shopTitle">
                            <a href="{{url('/')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                            <span></span> News
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="shop-product-fillter mb-50 pr-30">
                        <div class="totall-product">
                            <h2>
                                <img class="w-36px mr-10" src="assets/imgs/theme/icons/category-1.svg" alt=""/>
                                I nostri articoli
                            </h2>
                        </div>
                    </div>
                    <div class="loop-grid loop-list pr-30 mb-50">
                        @foreach ($galleries as $img)
                            <article class="wow fadeIn animated hover-up mb-30 animated">
                                <div class="post-thumb" style="background-image: url('{{'/uploads/news/' . $img->url}}')">
                                    <div class="entry-meta">
                                        <a class="entry-meta meta-2"
                                           href="{{route('single',['lang' => app()->getLocale(), 'single' => Str::slug($img->link)])}}"><i
                                                class="fi-rs-badge"></i></a>
                                    </div>
                                </div>
                                <div class="entry-content-2 pl-50">
                                    <h3 class="post-title mb-20">
                                        <a href="{{route('single',['lang' => app()->getLocale(), 'single' => Str::slug($img->link)])}}">
                                            {{ucwords($img->path->title)}}</a>
                                    </h3>
                                    <p class="post-exerpt mb-40">{!! substr($img->path->description, 0, 300)!!}{!! strlen($img->path->description) > 300 ? '...' : ""!!}</p>
                                    <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                        <div>
                                            <span class="post-on">{!! $img->path->date !!}</span>
                                        </div>
                                        <a href="{{route('single',['lang' => app()->getLocale(), 'single' => Str::slug($img->link)])}}"
                                           class="text-brand font-heading font-weight-bold">Leggi di più <i
                                                class="fi-rs-arrow-right"></i></a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                    <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-start">
                                {{ $galleries->onEachSide(1)->links('vendor.livewire.bootstrap') }}

                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-3 primary-sidebar sticky-sidebar">
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
                </div>
            </div>
        </div>
    </div>


@endsection
