@extends('layouts.main')
@section('title', __('about.seo.title'))
@section('description', __('about.seo.description'))
@section('content')

    <!-- HEADING-BANNER START -->
    <div class="heading-banner-area overlay-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-banner">
                        <div class="heading-banner-title">
                            <h2>{{$product->item_name}}</h2>
                        </div>
                        <div class="breadcumbs pb-15">
                            <ul>
                                <li><a href="{{route('index', app()->getLocale())}}">Home</a></li>
                                <li>{{$product->item_name}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- HEADING-BANNER END -->
    <!-- PRODUCT-AREA START -->
    <div class="product-area single-pro-area pt-80 pb-80 product-style-2">
        <div class="container">
            <div class="row shop-list single-pro-info no-sidebar">
                <!-- Single-product start -->
                <div class="col-lg-12">
                    <div class="single-product clearfix">
                        <!-- Single-pro-slider Big-photo start -->
                        <div class="single-pro-slider single-big-photo view-lightbox slider-for">
                            <div>
                                <img src="/storage/images/{{$product->img_01}}" alt=""/>
                                <a class="view-full-screen" href="/storage/images/{{$product->img_01}}"
                                   data-lightbox="roadtrip" data-title="My caption">
                                    <i class="zmdi zmdi-zoom-in"></i>
                                </a>
                            </div>

                        </div>
                        <!-- Single-pro-slider Big-photo end -->
                        <div class="product-info">
                            <div class="fix">
                                <h4 class="post-title floatleft">{{$product->item_name}}</h4>
                                <span class="pro-rating floatright">
											<a href="#"><i class="zmdi zmdi-star"></i></a>
											<a href="#"><i class="zmdi zmdi-star"></i></a>
											<a href="#"><i class="zmdi zmdi-star"></i></a>
											<a href="#"><i class="zmdi zmdi-star-half"></i></a>
											<a href="#"><i class="zmdi zmdi-star-half"></i></a>
											<span>( 27 Rating )</span>
										</span>
                            </div>
                            <div class="fix mb-20">
                                <span class="pro-price">€ {{price($product->price)}}</span>
                            </div>
                            <div class="product-description">
                                <p>{!! $product->item_name!!}</p>
                            </div>
                            <!-- color start -->
                            <div class="color-filter single-pro-color mb-20 clearfix">
                                <ul>
                                    <li><span class="color-title text-capitalize">color</span></li>
                                    <li class="active"><a href="#"><span class="color color-1"></span></a></li>
                                    <li><a href="#"><span class="color color-2"></span></a></li>
                                    <li><a href="#"><span class="color color-7"></span></a></li>
                                    <li><a href="#"><span class="color color-3"></span></a></li>
                                    <li><a href="#"><span class="color color-4"></span></a></li>
                                </ul>
                            </div>
                            <!-- color end -->
                            <!-- Size start -->
                            <div class="size-filter single-pro-size mb-35 clearfix">
                                <ul>
                                    <li><span class="color-title text-capitalize">size</span></li>

                                    <li class="active"><a href="#">{{$product->size}}</a></li>

                                </ul>
                            </div>
                            <!-- Size end -->
                            <div class="clearfix">

                                <div class="cart-plus-minus">
                                    <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                </div>

                                <div class="product-action clearfix">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Wishlist"><i
                                            class="zmdi zmdi-favorite-outline"></i></a>
                                    <a href="#" data-toggle="modal" data-target="#productModal" title="Quick View"><i
                                            class="zmdi zmdi-zoom-in"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i
                                            class="zmdi zmdi-refresh"></i></a>
                                    <a href="{{ url('add-to-cart/'.$product->id) }}" data-toggle="tooltip"
                                       data-placement="top" title="Add To Cart"><i
                                            class="zmdi zmdi-shopping-cart-plus"></i></a>
                                </div>

                            </div>
                            <!-- Single-pro-slider Small-photo start -->
                            <div class="single-pro-slider single-sml-photo slider-nav">
                                <div>
                                    <img src="/storage/images/{{$product->img_01}}" alt=""/>
                                </div>

                            </div>
                            <!-- Single-pro-slider Small-photo end -->
                        </div>
                    </div>
                </div>
                <!-- Single-product end -->
            </div>
            <!-- single-product-tab start -->
            <div class="single-pro-tab">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="single-pro-tab-menu">
                            <!-- Nav tabs -->
                            <ul class="">
                                <li><a href="#description" data-toggle="tab">Description</a></li>
                                <li class="active"><a href="#reviews" data-toggle="tab">Reviews</a></li>
                                <li><a href="#information" data-toggle="tab">Information</a></li>
                                <li><a href="#tags" data-toggle="tab">Tags</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane" id="description">
                                <div class="pro-tab-info pro-description">
                                    <h3 class="tab-title title-border mb-30">{{$product->item_name}}</h3>
                                    <p>{!! $product->Descrizione!!}</p>
                                </div>
                            </div>
                            <div class="tab-pane active" id="reviews">
                                <div class="pro-tab-info pro-reviews">
                                    <div class="customer-review mb-60">
                                        <h3 class="tab-title title-border mb-30">Customer review</h3>
                                        <ul class="product-comments clearfix">
                                            <li class="mb-30">
                                                <div class="pro-reviewer">
                                                    <img src="/storage/images/{{$product->img_01}}" alt=""/>
                                                </div>
                                                <div class="pro-reviewer-comment">
                                                    <div class="fix">
                                                        <div class="floatleft mbl-center">
                                                            <h5 class="text-uppercase mb-0"><strong>Cliente</strong>
                                                            </h5>
                                                            <p class="reply-date">27 Jun, 2016 at 2:30pm</p>
                                                        </div>
                                                        <div class="comment-reply floatright">
                                                            <a href="#"><i class="zmdi zmdi-mail-reply"></i></a>
                                                            <a href="#"><i class="zmdi zmdi-close"></i></a>
                                                        </div>
                                                    </div>
                                                    <p class="mb-0">Recensione cliente</p>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="leave-review">
                                        <h3 class="tab-title title-border mb-30">Leave your reviw</h3>
                                        <div class="your-rating mb-30">
                                            <p class="mb-10"><strong>Your Rating</strong></p>
                                            <span>
														<a href="#"><i class="zmdi zmdi-star-outline"></i></a>
													</span>
                                            <span class="separator">|</span>
                                            <span>
														<a href="#"><i class="zmdi zmdi-star-outline"></i></a>
														<a href="#"><i class="zmdi zmdi-star-outline"></i></a>
													</span>
                                            <span class="separator">|</span>
                                            <span>
														<a href="#"><i class="zmdi zmdi-star-outline"></i></a>
														<a href="#"><i class="zmdi zmdi-star-outline"></i></a>
														<a href="#"><i class="zmdi zmdi-star-outline"></i></a>
													</span>
                                            <span class="separator">|</span>
                                            <span>
														<a href="#"><i class="zmdi zmdi-star-outline"></i></a>
														<a href="#"><i class="zmdi zmdi-star-outline"></i></a>
														<a href="#"><i class="zmdi zmdi-star-outline"></i></a>
														<a href="#"><i class="zmdi zmdi-star-outline"></i></a>
													</span>
                                            <span class="separator">|</span>
                                            <span>
														<a href="#"><i class="zmdi zmdi-star-outline"></i></a>
														<a href="#"><i class="zmdi zmdi-star-outline"></i></a>
														<a href="#"><i class="zmdi zmdi-star-outline"></i></a>
														<a href="#"><i class="zmdi zmdi-star-outline"></i></a>
														<a href="#"><i class="zmdi zmdi-star-outline"></i></a>
													</span>
                                        </div>
                                        <div class="reply-box">
                                            <form action="#">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input type="text" placeholder="Your name here..." name="name"/>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" placeholder="Subject..." name="name"/>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <textarea class="custom-textarea" name="message"
                                                                  placeholder="Your review here..."></textarea>
                                                        <button type="submit" data-text="submit review"
                                                                class="button-one submit-button mt-20">submit review
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="information">
                                <div class="pro-tab-info pro-information">
                                    <h3 class="tab-title title-border mb-30">Product information</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas
                                        elese ifend. Phasellus a felis at est bibendum feugiat ut eget eni Praesent et
                                        messages in con sectetur posuere dolor non.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas
                                        elese ifend. Phasellus a felis at est bibendum feugiat ut eget eni Praesent et
                                        messages in con sectetur posuere dolor non.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas
                                        elese ifend. Phasellus a felis at est bibendum feugiat ut eget eni Praesent et
                                        messages in con sectetur posuere dolor non.</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tags">
                                <div class="pro-tab-info pro-information">
                                    <h3 class="tab-title title-border mb-30">tags</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas
                                        elese ifend. Phasellus a felis at est bibendum feugiat ut eget eni Praesent et
                                        messages in con sectetur posuere dolor non.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas
                                        elese ifend. Phasellus a felis at est bibendum feugiat ut eget eni Praesent et
                                        messages in con sectetur posuere dolor non.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas
                                        elese ifend. Phasellus a felis at est bibendum feugiat ut eget eni Praesent et
                                        messages in con sectetur posuere dolor non.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- single-product-tab end -->
        </div>
    </div>
    <!-- PRODUCT-AREA END -->

    <!-- QUICKVIEW PRODUCT -->
    <div id="quickview-wrapper">
        <!-- Modal -->
        <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-product">
                            <div class="product-images">
                                <div class="main-image images">
                                    <img alt="#" src="/storage/images/{{$product->img_01}}"/>
                                </div>
                            </div><!-- .product-images -->

                            <div class="product-info">
                                <h1>{{$product->item_name}}</h1>
                                <div class="price-box-3">
                                    <hr/>
                                    <div class="s-price-box">
                                        <span class="new-price">€ {{price($product->price)}}</span>
                                        <span class="old-price">€ 2.00</span>
                                    </div>
                                    <hr/>
                                </div>
                                <a href="shop.html" class="see-all">See all features</a>
                                <div class="quick-add-to-cart">

                                    <div class="numbers-row">
                                        <input type="number" id="french-hens" value="3">
                                    </div>
                                    <a href="{{ url('add-to-cart/'.$product->id) }}">
                                        <button class="single_add_to_cart_button" type="submit">Add to cart</button></a>

                                </div>
                                <div class="quick-desc">
                                    {!! $product->Descrizione !!}
                                </div>
                                <div class="social-sharing">
                                    <div class="widget widget_socialsharing_widget">
                                        <h3 class="widget-title-modal">Share this product</h3>
                                        <ul class="social-icons">
                                            <li><a target="_blank" title="Google +" href="#"
                                                   class="gplus social-icon"><i class="zmdi zmdi-google-plus"></i></a>
                                            </li>
                                            <li><a target="_blank" title="Twitter" href="#" class="twitter social-icon"><i
                                                        class="zmdi zmdi-twitter"></i></a></li>
                                            <li><a target="_blank" title="Facebook" href="#"
                                                   class="facebook social-icon"><i class="zmdi zmdi-facebook"></i></a>
                                            </li>
                                            <li><a target="_blank" title="LinkedIn" href="#"
                                                   class="linkedin social-icon"><i class="zmdi zmdi-linkedin"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- .product-info -->
                        </div><!-- .modal-product -->
                    </div><!-- .modal-body -->
                </div><!-- .modal-content -->
            </div><!-- .modal-dialog -->
        </div>
        <!-- END Modal -->
    </div>
    <!-- END QUICKVIEW PRODUCT -->

    <!-- WRAPPER END -->

    {{--    <main>--}}
    {{--        <div class="headerspace"></div>--}}
    {{--        <!-- breadcrumb banner content area start -->--}}
    {{--        <div class="banner-text-left lernen_banner large bg-contact"--}}
    {{--             style="background:url('{{ asset('frontend') }}/img_demo/slider-1.jpg') center center / cover;">--}}
    {{--            <div class="container">--}}
    {{--                <div class="row">--}}
    {{--                    <div class="lernen_banner_title">--}}
    {{--                        <h1>Ultime news</h1>--}}
    {{--                        <div class="lernen_breadcrumb">--}}
    {{--                            <div class="breadcrumbs">--}}
    {{--                                <span class="first-item"><a href="{{url('/')}}">Home</a></span>--}}
    {{--                                <span class="last-item"><a href="{{route('items.index')}}">Blog</a></span>--}}
    {{--                                <span class="last-item">{{$product->title}}</span>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <!-- end breadcrumb banner content area start -->--}}

    {{--        <!-- Blog Detail area start -->--}}
    {{--        <div id="blog-detail" class="pt-5 pb-5">--}}
    {{--            <div class="container">--}}
    {{--                <div class="row">--}}
    {{--                    <!-- Content Left -->--}}
    {{--                    <div class="col-sm-9">--}}
    {{--                        <div class="blog-content pr-4">--}}
    {{--                            <div class="blog-detail-img">--}}
    {{--                                <img src="/storage/images/{{$product->img_01}}"--}}
    {{--                                     class="img-fluid img-thumbnail" alt="Responsive image">--}}
    {{--                            </div>--}}
    {{--                            <div class="section-title with-p">--}}
    {{--                                <h2>{{$product->title}}</h2>--}}
    {{--                            </div>--}}
    {{--                            <div class="course-viewer">--}}
    {{--                                <ul>--}}
    {{--                                    <li>--}}
    {{--                                        <i class="fas fa-calendar"></i>{{ Carbon\Carbon::parse($product->data_news)->format('d/m/Y') }}--}}
    {{--                                    </li>--}}
    {{--                                </ul>--}}
    {{--                            </div>--}}
    {{--                            <p>{!! $product->Descrizione !!}</p>--}}
    {{--                            <br>--}}
    {{--                            <hr>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}

    {{--                    <div class="col-sm-3">--}}
    {{--                        <div class="card p-3" style="width: 22rem; background: #eeeeee;">--}}
    {{--                            <div class="card-body">--}}
    {{--                                <h3>Ultime News</h3>--}}
    {{--                                <hr>--}}

    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="margine"></div>--}}

    {{--                <div class="container">--}}
    {{--                    <div class="row">--}}
    {{--                        <div class="col-xs-6">--}}

    {{--                            <div class="margine"></div>--}}
    {{--                            <h5>Condividi</h5>--}}
    {{--                            <div id="share"></div>--}}
    {{--                            <a href="{{ url()->previous() }}" class="color-two btn-custom mt-3 d-inline-block"><i--}}
    {{--                                    class="fas fa-arrow-left"></i> Indietro </a>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--            <!-- Blog Detail area end -->--}}
    {{--    </main>--}}

@endsection
