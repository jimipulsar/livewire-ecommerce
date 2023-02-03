@extends('layouts.main')

@section('title', __('company.seo.title'))

@section('description', __('company.seo.description'))

@section('content')

    <!-- Start of Main -->
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{url('/')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Lista Marchi
            </div>
        </div>
    </div>
    <div class="page-content pt-50">
        <div class="container">
            <div class="archive-header-2 text-center">
                <h1 class="display-2 mb-50">Marchi</h1>
                <div class="row">
                    <div class="col-lg-5 mx-auto">
                        <div class="sidebar-widget-2 widget_search mb-50">
                            <div class="search-form">
                                <form action="#">
                                    <input type="text" placeholder="Cerca marchio..." />
                                    <button type="submit"><i class="fi-rs-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-50">
                <div class="col-12 col-lg-8 mx-auto">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
                            <p>We have <strong class="text-brand">780</strong> vendors now</p>
                        </div>
                        <div class="sort-by-product-area">
                            <div class="sort-by-cover mr-10">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps"></i>Show:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li><a class="active" href="#">50</a></li>
                                        <li><a href="#">100</a></li>
                                        <li><a href="#">150</a></li>
                                        <li><a href="#">200</a></li>
                                        <li><a href="#">All</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sort-by-cover">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span> Featured <i class="fi-rs-angle-small-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li><a class="active" href="#">Mall</a></li>
                                        <li><a href="#">Featured</a></li>
                                        <li><a href="#">Preferred</a></li>
                                        <li><a href="#">Total items</a></li>
                                        <li><a href="#">Avg. Rating</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row vendor-grid">
                @foreach($brands as $brand)
                <div class="col-lg-6 col-md-6 col-12 col-sm-6">
                    <div class="vendor-wrap style-2 mb-40">
                        <div class="product-badges product-badges-position product-badges-mrg">
{{--                            <span class="hot">Mall</span>--}}
                        </div>
                        <div class="vendor-img-action-wrap">
                            <div class="vendor-img">
                                <a href="vendor-details-1.html">
                                    <img class="default-img" src="{{'/storage/images/' . $brand->cover }}" alt="" />
                                </a>
                            </div>
                            <div class="mt-10">
                                <span class="font-small total-product">380 products</span>
                            </div>
                        </div>
                        <div class="vendor-content-wrap">
                            <div class="mb-30">
                                <div class="product-category">
{{--                                    <span class="text-muted">Since 2012</span>--}}
                                </div>
                                <h4 class="mb-5"><a href="vendor-details-1.html">{{ucFirst($brand->name)}}</a></h4>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div class="vendor-info d-flex justify-content-between align-items-end mt-30">
                                    <p>{!! substr($brand->description, 0, 200)!!}{!! strlen($brand->description) > 200 ? '...' : ""!!}</p>
                                    <a href="{{$brand->link}}" class="btn btn-xs" target="_blank">Sito web<i class="fi-rs-arrow-small-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!--end vendor card-->
            </div>
            <div class="pagination-area mt-20 mb-20">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-start">
                        {{$brands->links()}}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- End of Main -->
@endsection
