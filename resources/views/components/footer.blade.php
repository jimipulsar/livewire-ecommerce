<footer class="main">
    <section class="newsletter mb-15 wow animate__animated animate__fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="position-relative newsletter-inner" style="background-image: url('/uploads/about/newsletter.jpg') !important;">
                        <div class="newsletter-content">
                            <h2 class="mb-20">
                                Iscriviti alla nostra Newsletter
                            </h2>
                            <p class="mb-45">Ricevi tutte le <span class="text-brand">novità</span> e aggiornamenti sugli articoli in vendita
                            </p>
                            <form action="{{ route('newRegistration', app()->getLocale()) }}" method="POST"
                                  enctype="multipart/form-data"
                                  class="form-subcriber d-flex">
                                @csrf
                                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}"/>
                                <input type="email" id="emailSubscription" aria-describedby="emailSubscription"
                                       class="form-control mr-2 bg-white" name="emailSubscription"
                                       placeholder="Inserisci la tua E-mail"/>
                                <button class="btn" type="submit" id="newsLetter">Iscriviti<i
                                            class="w-icon-long-arrow-right" id="emailSubscription"></i></button>
                            </form>
                        </div>
                        <img src="/assets/imgs/banner/banner-9.png" alt="newsletter"/>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="featured section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 mb-md-4 mb-xl-0">
                    <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
                        <div class="banner-icon">
                            <img src="/assets/imgs/theme/icons/icon-1.svg" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Best prices & offers</h3>
                            <p>Orders $50 or more</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
                        <div class="banner-icon">
                            <img src="/assets/imgs/theme/icons/icon-2.svg" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Free delivery</h3>
                            <p>24/7 amazing services</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
                        <div class="banner-icon">
                            <img src="/assets/imgs/theme/icons/icon-3.svg" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Great daily deal</h3>
                            <p>When you sign up</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
                        <div class="banner-icon">
                            <img src="/assets/imgs/theme/icons/icon-4.svg" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Wide assortment</h3>
                            <p>Mega Discounts</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
                        <div class="banner-icon">
                            <img src="/assets/imgs/theme/icons/icon-5.svg" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Easy returns</h3>
                            <p>Within 30 days</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 d-xl-none">
                    <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
                        <div class="banner-icon">
                            <img src="/assets/imgs/theme/icons/icon-6.svg" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Safe delivery</h3>
                            <p>Within 30 days</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding footer-mid">
        <div class="container pt-15 pb-20">
            <div class="row">
                <div class="col">
                    <div class="widget-about font-md mb-md-3 mb-lg-3 mb-xl-0 wow animate__animated animate__fadeInUp"
                         data-wow-delay="0">
                        <div class="logo mb-10">
                            <a href="{{route('index',['lang' => app()->getLocale()])}}" class="mb-15" title="Livewire" ><img
                                        src="/uploads/logo/logo.png" alt="Livewire" style="height:120px" ></a>
                        </div>
                        <ul class="contact-infor">
                            <li><img src="/assets/imgs/theme/icons/icon-location.svg"
                                     alt=""/><strong>Indirizzo: </strong>
                                <span> Suzy Queue

<br> 4455 Landing Lange, APT 4 <br> Louisville, KY 40018-1234 </span></li>
                            <li><img src="/assets/imgs/theme/icons/icon-contact.svg"
                                     alt=""/><strong>Telefono:</strong><span><a href="tel:0152 254 212 22"> 0152 254 212 22</a> </span>
                            </li>
                            <li><img src="/assets/imgs/theme/icons/icon-email-2.svg"
                                     alt=""/><strong>Email:</strong><span> admin@admin.com</span></li>
{{--                            <li><img src="/assets/imgs/theme/icons/icon-clock.svg" alt=""/><strong>Hours:</strong><span>10:00 - 18:00, Mon - Sat</span>--}}
{{--                            </li>--}}
                        </ul>
                    </div>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                    <h4 class="widget-title">Azienda</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="{{route('about',app()->getLocale())}}">Chi siamo</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Termini e Condizioni</a></li>
                        <li><a href="{{route('contacts',app()->getLocale())}}">Contattaci</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                    <h4 class="widget-title">Account</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
{{--                        <li><a href="{{route('customerLogin',app()->getLocale())}}">Accedi</a></li>--}}
                        <li><a href="{{route('cart', app()->getLocale())}}">Carrello</a></li>
                        <li><a href="{{route('wishlist', app()->getLocale())}}">Lista dei desideri</a></li>
                        <li><a href="{{route('compare', app()->getLocale())}}">Confronta prodotti</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp notranslate" data-wow-delay=".4s">
                    <h4 class="widget-title">Categorie</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0 notranslate">
                        @foreach (getCategories() as $p)
                            <li>
                                <a href="{{ route('mainCategory',['lang'=>app()->getLocale(),Str::slug(__($p))]) }}">{{ucFirst(__($p))}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="footer-link-widget widget-install-app col wow animate__animated animate__fadeInUp"
                     data-wow-delay=".5s">
                    <h4 class="widget-title">Pagamenti sicuri</h4>
                    <img src="/uploads/icon/stripe.png" alt="payment" width="159"/>
                    <img src="/uploads/icon/ssl.png" alt="payment" width="159"/>
{{--                    <img class="" src="/assets/imgs/theme/payment-method.png" alt=""/>--}}
                </div>
            </div>
        </div>
    </section>
    <div class="container pb-30 wow animate__animated animate__fadeInUp" data-wow-delay="0">
        <div class="row align-items-center">
            <div class="col-12 mb-30">
                <div class="footer-bottom"></div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">
                <p class="font-sm mb-0">© {{ date('Y') }} - Livewire E-commerce <br>Designed by <a
                            href="https://github.com/jimipulsar" target="_blank"><strong class="text-brand">Pie Dev</strong></a></p>
            </div>
            <div class="col-xl-4 col-lg-6 text-center d-none d-xl-block">
                <div class="hotline d-lg-inline-flex mr-30">
                    <img src="/assets/imgs/theme/icons/phone-call.svg" alt="hotline"/>
                    <p>(+39) 075 517 21 22<span>Orari 7:00 - 18:00</span></p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 text-end d-none d-md-block">
                <div class="mobile-social-icon">
                    <h6>Seguici su</h6>
                    <a href="#" target="_blank"><img
                                src="/assets/imgs/theme/icons/icon-facebook-white.svg" alt=""/></a>
                    <a href="#"
                       target="_blank"><img src="/assets/imgs/theme/icons/icon-instagram-white.svg" alt=""/></a>
                </div>
            </div>
        </div>
    </div>
</footer>
