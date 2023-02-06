@extends('layouts.main')

@section('title', __('company.seo.title'))

@section('description', __('company.seo.description'))

@section('content')

    <!-- Start of Main -->
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{url('/')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Chi siamo
            </div>
        </div>
    </div>
    <div class="page-content pt-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <section class="row align-items-center mb-50">
                        <div class="col-lg-6">
                            <img src="/assets/imgs/page/about-1.png" alt="" class="border-radius-15 mb-md-3 mb-lg-0 mb-sm-4" />
                        </div>
                        <div class="col-lg-6">
                            <div class="pl-25">
                                <h2 class="mb-30">Welcome to Livewire Ecommerce Platform</h2>
                                <p class="mb-25">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate id est laborum.</p>
                                <p class="mb-50">Ius ferri velit sanctus cu, sed at soleat accusata. Dictas prompta et Ut placerat legendos interpre.Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante Etiam sit amet orci eget. Quis commodo odio aenean sed adipiscing. Turpis massa tincidunt dui ut ornare lectus. Auctor elit sed vulputate mi sit amet. Commodo consequat. Duis aute irure dolor in reprehenderit in voluptate id est laborum.</p>
                                <div class="carausel-3-columns-cover position-relative">
                                    <div id="carausel-3-columns-arrows"></div>
                                    <div class="carausel-3-columns" id="carausel-3-columns">
                                        <img src="/assets/imgs/page/about-2.png" alt="" />
                                        <img src="/assets/imgs/page/about-3.png" alt="" />
                                        <img src="/assets/imgs/page/about-4.png" alt="" />
                                        <img src="/assets/imgs/page/about-2.png" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="text-center mb-50">
                        <h2 class="title style-3 mb-40">What We Provide?</h2>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 mb-24">
                                <div class="featured-card">
                                    <img src="/assets/imgs/theme/icons/icon-1.svg" alt="" />
                                    <h4>Best Prices & Offers</h4>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                                    <a href="#">Read more</a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-24">
                                <div class="featured-card">
                                    <img src="/assets/imgs/theme/icons/icon-2.svg" alt="" />
                                    <h4>Wide Assortment</h4>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                                    <a href="#">Read more</a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-24">
                                <div class="featured-card">
                                    <img src="/assets/imgs/theme/icons/icon-3.svg" alt="" />
                                    <h4>Free Delivery</h4>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                                    <a href="#">Read more</a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-24">
                                <div class="featured-card">
                                    <img src="/assets/imgs/theme/icons/icon-4.svg" alt="" />
                                    <h4>Easy Returns</h4>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                                    <a href="#">Read more</a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-24">
                                <div class="featured-card">
                                    <img src="/assets/imgs/theme/icons/icon-5.svg" alt="" />
                                    <h4>100% Satisfaction</h4>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                                    <a href="#">Read more</a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-24">
                                <div class="featured-card">
                                    <img src="/assets/imgs/theme/icons/icon-6.svg" alt="" />
                                    <h4>Great Daily Deal</h4>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                                    <a href="#">Read more</a>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="row align-items-center mb-50">
                        <div class="row mb-50 align-items-center">
                            <div class="col-lg-7 pr-30">
                                <img src="/assets/imgs/page/about-5.png" alt="" class="mb-md-3 mb-lg-0 mb-sm-4" />
                            </div>
                            <div class="col-lg-5">
                                <h4 class="mb-20 text-muted">Our performance</h4>
                                <h1 class="heading-1 mb-40">Your Partner for e-commerce grocery solution</h1>
                                <p class="mb-30">Ed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto</p>
                                <p>Pitatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 pr-30 mb-md-5 mb-lg-0 mb-sm-5">
                                <h3 class="mb-30">Who we are</h3>
                                <p>Volutpat diam ut venenatis tellus in metus. Nec dui nunc mattis enim ut tellus eros donec ac odio orci ultrices in. ellus eros donec ac odio orci ultrices in.</p>
                            </div>
                            <div class="col-lg-4 pr-30 mb-md-5 mb-lg-0 mb-sm-5">
                                <h3 class="mb-30">Our history</h3>
                                <p>Volutpat diam ut venenatis tellus in metus. Nec dui nunc mattis enim ut tellus eros donec ac odio orci ultrices in. ellus eros donec ac odio orci ultrices in.</p>
                            </div>
                            <div class="col-lg-4">
                                <h3 class="mb-30">Our mission</h3>
                                <p>Volutpat diam ut venenatis tellus in metus. Nec dui nunc mattis enim ut tellus eros donec ac odio orci ultrices in. ellus eros donec ac odio orci ultrices in.</p>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <section class="container mb-50 d-none d-md-block">
            <div class="row about-count">
                <div class="col-lg-1-5 col-md-6 text-center mb-lg-0 mb-md-5">
                    <h1 class="heading-1"><span class="count">12</span>+</h1>
                    <h4>Glorious years</h4>
                </div>
                <div class="col-lg-1-5 col-md-6 text-center">
                    <h1 class="heading-1"><span class="count">36</span>+</h1>
                    <h4>Happy clients</h4>
                </div>
                <div class="col-lg-1-5 col-md-6 text-center">
                    <h1 class="heading-1"><span class="count">58</span>+</h1>
                    <h4>Projects complete</h4>
                </div>
                <div class="col-lg-1-5 col-md-6 text-center">
                    <h1 class="heading-1"><span class="count">24</span>+</h1>
                    <h4>Team advisor</h4>
                </div>
                <div class="col-lg-1-5 text-center d-none d-lg-block">
                    <h1 class="heading-1"><span class="count">26</span>+</h1>
                    <h4>Products Sale</h4>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <section class="mb-50">
                        <h2 class="title style-3 mb-40 text-center">Our Team</h2>
                        <div class="row">
                            <div class="col-lg-4 mb-lg-0 mb-md-5 mb-sm-5">
                                <h6 class="mb-5 text-brand">Our Team</h6>
                                <h1 class="mb-30">Meet Our Expert Team</h1>
                                <p class="mb-30">Proin ullamcorper pretium orci. Donec necscele risque leo. Nam massa dolor imperdiet neccon sequata congue idsem. Maecenas malesuada faucibus finibus.</p>
                                <p class="mb-30">Proin ullamcorper pretium orci. Donec necscele risque leo. Nam massa dolor imperdiet neccon sequata congue idsem. Maecenas malesuada faucibus finibus.</p>
                                <a href="#" class="btn">View All Members</a>
                            </div>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="team-card">
                                            <img src="/assets/imgs/page/about-6.png" alt="" />
                                            <div class="content text-center">
                                                <h4 class="mb-5">H. Merinda</h4>
                                                <span>CEO & Co-Founder</span>
                                                <div class="social-network mt-20">
                                                    <a href="#"><img src="/assets/imgs/theme/icons/icon-facebook-brand.svg" alt="" /></a>
                                                    <a href="#"><img src="/assets/imgs/theme/icons/icon-twitter-brand.svg" alt="" /></a>
                                                    <a href="#"><img src="/assets/imgs/theme/icons/icon-instagram-brand.svg" alt="" /></a>
                                                    <a href="#"><img src="/assets/imgs/theme/icons/icon-youtube-brand.svg" alt="" /></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="team-card">
                                            <img src="/assets/imgs/page/about-8.png" alt="" />
                                            <div class="content text-center">
                                                <h4 class="mb-5">Dilan Specter</h4>
                                                <span>Head Engineer</span>
                                                <div class="social-network mt-20">
                                                    <a href="#"><img src="/assets/imgs/theme/icons/icon-facebook-brand.svg" alt="" /></a>
                                                    <a href="#"><img src="/assets/imgs/theme/icons/icon-twitter-brand.svg" alt="" /></a>
                                                    <a href="#"><img src="/assets/imgs/theme/icons/icon-instagram-brand.svg" alt="" /></a>
                                                    <a href="#"><img src="/assets/imgs/theme/icons/icon-youtube-brand.svg" alt="" /></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Main -->
@endsection
