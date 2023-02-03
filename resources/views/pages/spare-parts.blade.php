@extends('layouts.main')

@section('title', __('company.seo.title'))

@section('description', __('company.seo.description'))

@section('content')

    <!-- Start of Main -->
    <main class="main">
        <!-- Start of Page Header -->
        <!-- End of Breadcrumb -->

        <!-- Start of Page Content -->
        <div class="page-content">
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="{{route('index', app()->getLocale())}}">Home</a></li>
                        <li>Ricambi</li>
                    </ul>
                </div>
            </nav>
            <div class="page- mb-10">
                <div class="shop-default-banner shop-boxed-banner banner d-flex align-items-center mb-6 breadCategory">
                    <div class="container banner-content">
                        <h4 class="banner-subtitle font-weight-bold categoryTitle">Ricambi</h4>
                        <h3 class="banner-title text-white text-uppercase font-weight-bolder ls-10 categoryTitle"></h3>
                    </div>
                </div>
            </div>
            <div class="container">

                <section class="customer-service mb-7">
                    <div class="row align-items-center">
                        <div class="col-md-6 pr-lg-8 mb-8">
                            <h2 class="title text-left">Effettuiamo Servizio Vendita Ricambi su tutti gli articoli delle seguenti marche:</h2>
                            <div class="accordion accordion-simple accordion-plus">
                                <div class="card border-no">
                                    <div class="card-header">
                                        <a href="#collapse3-1" class="collapse">Customer Service</a>
                                    </div>
                                    <div class="card-body expanded" id="collapse3-1">
                                        <p class="mb-0">
                                            Lorem ipsum dolor sit eiusamet, consectetur adipiscing elit,
                                            sed do eius mod tempor incididunt ut labore
                                            et dolore magna aliqua. Venenatis tell
                                            us in metus vulputate eu scelerisque felis. Vel pretium vulp.
                                        </p>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a href="#collapse3-2" class="expand">Online Consultation</a>
                                    </div>
                                    <div class="card-body collapsed" id="collapse3-2">
                                        <p class="mb-0">
                                            Lorem ipsum dolor sit eiusamet, consectetur adipiscing elit,
                                            sed do eius mod tempor incididunt ut labore
                                            et dolore magna aliqua. Venenatis tell
                                            us in metus vulputate eu scelerisque felis. Vel pretium vulp.
                                        </p>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a href="#collapse3-3" class="expand">Sales Management</a>
                                    </div>
                                    <div class="card-body collapsed" id="collapse3-3">
                                        <p class="mb-0">
                                            Lorem ipsum dolor sit eiusamet, consectetur adipiscing elit,
                                            sed do eius mod tempor incididunt ut labore
                                            et dolore magna aliqua. Venenatis tell
                                            us in metus vulputate eu scelerisque felis. Vel pretium vulp.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-8">
                            <figure class="br-lg">
                                <img src="/assets/images/pages/about_us/2.jpg" alt="Banner"
                                     width="610" height="500" style="background-color: #CECECC;"/>
                            </figure>
                        </div>
                    </div>
                </section>

                <section class="count-section mb-10 pb-5">
                    <div class="swiper-container swiper-theme" data-swiper-options="{
                            'slidesPerView': 1,
                            'breakpoints': {
                                '768': {
                                    'slidesPerView': 2
                                },
                                '992': {
                                    'slidesPerView': 3
                                }
                            }
                        }">
                        <div class="swiper-pagination"></div>
                    </div>
                </section>
            </div>

        </div>
    </main>
    <!-- End of Main -->
@endsection
