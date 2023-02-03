@extends('layouts.main')
@section('title', __('home.seo.title'))
@section('description', __('home.seo.description'))
@section('extraCss')
    <link rel="stylesheet" type="text/css" href="/assets/css/style.min.css">
@endsection
@section('content')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{url('/')}}"><i class="fi-rs-home mr-5"></i>Home</a>
                 <span></span> Registrazione
            </div>
        </div>
    </div>
    <div class="page-content pt-60 pb-60 mb-160">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 col-md-12 mx-auto">
                    <div class="row">
                        <div class="col-lg-6 col-md-8 mx-auto">
                            <div class="login_wrap widget-taber-content background-white">
                                <div class="padding_eight_all bg-white">
                                    <div class="heading_s1">
                                        <h1 class="mb-5">Create an Account</h1>
                                        <p class="mb-30">Hai già un account? <a href="{{ route('login', app()->getLocale()) }}">Accedi</a></p>
                                    </div>
                                    <form method="POST" action="{{ route('register', app()->getLocale()) }}"
                                          enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label class="form-label" for="billing_name">{{__('customer.address.2')}}
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input id="billing_name" type="text"
                                                   class="form-control @error('billing_name') is-invalid @enderror"
                                                   name="billing_name"
                                                   value="{{ old('billing_name') }}" required
                                                   autocomplete="billing_name" autofocus>

                                            @error('billing_name')
                                            <span class="help-block text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="billing_surname">Cognome
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input id="billing_surname" type="text"
                                                   class="form-control @error('billing_surname') is-invalid @enderror"
                                                   name="billing_surname"
                                                   value="{{ old('billing_surname') }}" required
                                                   autocomplete="billing_surname" autofocus>

                                            @error('billing_surname')
                                            <span class="help-block text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email *</label>
                                            <input id="email" type="email" name="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   required>
                                            @error('email')
                                            <span class="help-block text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password *</label>
                                            <input id="password" type="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   name="password"
                                                   required autocomplete="password">

                                            @error('password')
                                            <span class="help-block text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group ">
                                            <label for="password">Conferma Password *</label>
                                            <input id="password-confirm" type="password"
                                                   name="password_confirmation"
                                                   class="form-control">
                                            @if ($errors->has('password'))
                                                <span class="help-block text-danger">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                            @endif
                                        </div>
{{--                                        <div class="payment_option mb-50">--}}
{{--                                            <div class="custome-radio">--}}
{{--                                                <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios3" checked="" />--}}
{{--                                                <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse" data-target="#bankTranfer" aria-controls="bankTranfer">I am a customer</label>--}}
{{--                                            </div>--}}
{{--                                            <div class="custome-radio">--}}
{{--                                                <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios4" checked="" />--}}
{{--                                                <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse" data-target="#checkPayment" aria-controls="checkPayment">I am a vendor</label>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <div class="login_footer form-group mb-50">
                                            <div class="chek-form">
                                                <div class="custome-checkbox">
                                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox12" value="" />
                                                    <label class="form-check-label" for="exampleCheckbox12"><span>I agree to terms &amp; Policy.</span></label>
                                                </div>
                                            </div>
                                            <a href="#"><i class="fi-rs-book-alt mr-5 text-muted"></i>Lean more</a>
                                        </div>
                                        <div class="login_footer form-group mb-50">
                                            <div class="g-recaptcha"
                                                 data-sitekey="{{env('INVISIBLE_RECAPTCHA_SITEKEY')}}">

                                            </div>
                                        </div>
                                        <div class="form-group mb-30">
                                            <button type="submit" class="btn btn-fill-out btn-block hover-up font-weight-bold" name="login">Registrati</button>
                                        </div>
                                        <p class="font-xs text-muted"><strong>Note:</strong>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy</p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    <div class="login-popup mx-auto" id="popupContent">--}}
{{--        <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">--}}
{{--            <ul class="nav nav-tabs text-uppercase" role="tablist">--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="#sign-in" class="nav-link active">Registrati ora</a>--}}
{{--                </li>--}}

{{--            </ul>--}}
{{--            <div class="tab-content">--}}
{{--                <div class="tab-pane active" id="sign-in">--}}

{{--                    <form method="POST" action="{{ route('register', app()->getLocale()) }}"--}}
{{--                          enctype="multipart/form-data">--}}
{{--                        {{ csrf_field() }}--}}
{{--                        <div class="form-group">--}}
{{--                            <label class="form-label" for="billing_name">{{__('customer.address.2')}}--}}
{{--                                <span class="text-danger">*</span>--}}
{{--                            </label>--}}
{{--                            <input id="billing_name" type="text"--}}
{{--                                   class="form-control @error('billing_name') is-invalid @enderror"--}}
{{--                                   name="billing_name"--}}
{{--                                   value="{{ old('billing_name') }}" required--}}
{{--                                   autocomplete="billing_name" autofocus>--}}

{{--                            @error('billing_name')--}}
{{--                            <span class="help-block text-danger">--}}
{{--                                                <strong>{{ $message }}</strong>--}}
{{--                                            </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label class="form-label" for="billing_surname">Cognome--}}
{{--                                <span class="text-danger">*</span>--}}
{{--                            </label>--}}
{{--                            <input id="billing_surname" type="text"--}}
{{--                                   class="form-control @error('billing_surname') is-invalid @enderror"--}}
{{--                                   name="billing_surname"--}}
{{--                                   value="{{ old('billing_surname') }}" required--}}
{{--                                   autocomplete="billing_surname" autofocus>--}}

{{--                            @error('billing_surname')--}}
{{--                            <span class="help-block text-danger">--}}
{{--                                                <strong>{{ $message }}</strong>--}}
{{--                                            </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="email">Email *</label>--}}
{{--                            <input id="email" type="email" name="email"--}}
{{--                                   class="form-control @error('email') is-invalid @enderror"--}}
{{--                                   required>--}}
{{--                            @error('email')--}}
{{--                            <span class="help-block text-danger">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                        <div class="form-group mb-5">--}}
{{--                            <label for="password">Password *</label>--}}
{{--                            <input id="password" type="password"--}}
{{--                                   class="form-control @error('password') is-invalid @enderror"--}}
{{--                                   name="password"--}}
{{--                                   required autocomplete="password">--}}

{{--                            @error('password')--}}
{{--                            <span class="help-block text-danger">--}}
{{--                                                <strong>{{ $message }}</strong>--}}
{{--                                            </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                        <div class="form-group mb-5">--}}
{{--                            <label for="password">Conferma Password *</label>--}}
{{--                            <input id="password-confirm" type="password"--}}
{{--                                   name="password_confirmation"--}}
{{--                                   class="form-control">--}}
{{--                            @if ($errors->has('password'))--}}
{{--                                <span class="help-block text-danger">--}}
{{--                                                    <strong>{{ $errors->first('password') }}</strong>--}}
{{--                                                    </span>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                        <div class="form-group ">--}}

{{--                            <label class="form-check-label" for="exampleCheck1"--}}
{{--                                   style="text-align:left;">     <input type="checkbox" class="form-check-input"--}}
{{--                                                                                                    id="exampleCheck1"--}}
{{--                                                                                                    required style="display: inline-block;"> {{__('contacts.policy.field1')}}--}}
{{--                                <a--}}
{{--                                    href="https://www.iubenda.com/privacy-policy/69882741"--}}
{{--                                    target="popup"--}}
{{--                                    onclick="MyWindow=window.open('https://www.iubenda.com/privacy-policy/69882741','MyWindow','width=800,height=600'); return false;"><strong--}}
{{--                                        style="text-decoration:underline">{{__('contacts.policy.field2')}}</strong></a> {{__('contacts.policy.field3')}}--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                        <div class="form-group pt-4 mb-4">--}}
{{--                            <div class="g-recaptcha"--}}
{{--                                 data-sitekey="{{env('INVISIBLE_RECAPTCHA_SITEKEY')}}">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <button type="submit" class="btn btn-primary">Registrati</button>--}}
{{--                    </form>--}}

{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}


{{--    <div class="login-popup" id="popupContent">--}}
{{--        <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">--}}
{{--            <ul class="nav nav-tabs text-uppercase" role="tablist">--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="#sign-up" class="nav-link">Registrati</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--            <div class="tab-content">--}}
{{--                <div class="tab-pane" id="sign-up">--}}
{{--                    <form method="POST" action="{{ route('register', app()->getLocale()) }}"--}}
{{--                          enctype="multipart/form-data">--}}
{{--                        {{ csrf_field() }}--}}
{{--                        <div class="form-group">--}}
{{--                            <label class="form-label" for="billing_name">{{__('customer.address.2')}}--}}
{{--                                <span class="text-danger">*</span>--}}
{{--                            </label>--}}
{{--                            <input id="billing_name" type="text"--}}
{{--                                   class="form-control @error('billing_name') is-invalid @enderror"--}}
{{--                                   name="billing_name"--}}
{{--                                   value="{{ old('billing_name') }}" required--}}
{{--                                   autocomplete="billing_name" autofocus>--}}

{{--                            @error('billing_name')--}}
{{--                            <span class="help-block text-danger">--}}
{{--                                                <strong>{{ $message }}</strong>--}}
{{--                                            </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="email">Email *</label>--}}
{{--                            <input id="email" type="email" name="email"--}}
{{--                                   class="form-control @error('email') is-invalid @enderror"--}}
{{--                                   required>--}}
{{--                            @error('email')--}}
{{--                            <span class="help-block text-danger">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                        <div class="form-group mb-5">--}}
{{--                            <label for="password">Password *</label>--}}
{{--                            <input id="password" type="password"--}}
{{--                                   class="form-control @error('password') is-invalid @enderror"--}}
{{--                                   name="password"--}}
{{--                                   required autocomplete="password">--}}

{{--                            @error('password')--}}
{{--                            <span class="help-block text-danger">--}}
{{--                                                <strong>{{ $message }}</strong>--}}
{{--                                            </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                        <div class="form-group mb-5">--}}
{{--                            <label for="password">Conferma Password *</label>--}}
{{--                            <input id="password-confirm" type="password"--}}
{{--                                   name="password_confirmation"--}}
{{--                                   class="form-control">--}}
{{--                            @if ($errors->has('password'))--}}
{{--                                <span class="help-block text-danger">--}}
{{--                                                    <strong>{{ $errors->first('password') }}</strong>--}}
{{--                                                    </span>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                        <p>Your personal data will be used to support your experience--}}
{{--                            throughout this website, to manage access to your account,--}}
{{--                            and for other purposes described in our <a href="#" class="text-primary">privacy policy</a>.--}}
{{--                        </p>--}}
{{--                        <a href="#" class="d-block mb-5 text-primary">Signup as a vendor?</a>--}}
{{--                        <div class="form-checkbox d-flex align-items-center justify-content-between mb-5">--}}
{{--                            <input type="checkbox" class="custom-checkbox" id="agree" name="agree" required>--}}
{{--                            <label for="agree" class="font-size-md">I agree to the <a href="#"--}}
{{--                                                                                      class="text-primary font-size-md">privacy--}}
{{--                                    policy</a></label>--}}
{{--                        </div>--}}
{{--                        <button type="submit" class="btn btn-primary">Registrati</button>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection

<!-- ========== MAIN CONTENT ========== -->
{{--    <main id="content mb-5" role="main">--}}
{{--        <!-- breadcrumb -->--}}
{{--        <div class="bg-gray-13 bg-md-transparent">--}}
{{--            <div class="container">--}}
{{--                <!-- breadcrumb -->--}}
{{--                <div class="my-md-3">--}}
{{--                    <nav aria-label="breadcrumb">--}}
{{--                        <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">--}}
{{--                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a--}}
{{--                                    href="{{route('index', app()->getLocale())}}">Home</a></li>--}}
{{--                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">--}}
{{--                                {{__('app.register')}}--}}
{{--                            </li>--}}
{{--                        </ol>--}}
{{--                    </nav>--}}

{{--                </div>--}}
{{--                <!-- End breadcrumb -->--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- End breadcrumb -->--}}

{{--        <div class="container">--}}

{{--            @if(auth()->check())--}}
{{--                <div class="my-4 my-xl-8">--}}
{{--                    <div class="row">--}}
{{--                        @include('auth.customer.partials.sidebar')--}}
{{--                        <div class="col-xl-9 col-wd-9gdot5">                            <!-- Title -->--}}
{{--                            <div class="border-bottom border-color-1 mb-6">--}}
{{--                                <h3 class="d-inline-block section-title mb-0 pb-2 font-size-26">--}}
{{--                                    Dashboard</h3>--}}
{{--                            </div>--}}

{{--                            <!-- End Title -->--}}

{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            @else--}}
{{--                <div class="my-4 my-xl-8 ">--}}
{{--                    <div class="row justify-content-center">--}}
{{--                        <div class="col-md-8 align-self-center">--}}
{{--                            <!-- Title -->--}}
{{--                            <div class="border-bottom border-color-1 mb-6">--}}
{{--                                <h3 class="d-inline-block section-title mb-0 pb-2 font-size-26"> {{__('app.register')}}</h3>--}}
{{--                            </div>--}}
{{--                            <p class="text-gray-90 mb-4"> {{__('app.areaRegister.1')}}</p>--}}
{{--                            <form method="POST" action="{{ route('registerPOST', app()->getLocale()) }}">--}}
{{--                                @csrf--}}
{{--                                <div class="row justify-content-center">--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="js-form-message form-group mb-5">--}}
{{--                                            <label class="form-label" for="billing_name">{{__('customer.address.2')}}--}}
{{--                                                <span class="text-danger">*</span>--}}
{{--                                            </label>--}}
{{--                                            <input id="billing_name" type="text"--}}
{{--                                                   class="form-control @error('billing_name') is-invalid @enderror"--}}
{{--                                                   name="billing_name"--}}
{{--                                                   value="{{ old('billing_name') }}" required--}}
{{--                                                   autocomplete="billing_name" autofocus>--}}

{{--                                            @error('billing_name')--}}
{{--                                            <span class="help-block text-danger">--}}
{{--                                                <strong>{{ $message }}</strong>--}}
{{--                                            </span>--}}
{{--                                            @enderror--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="js-form-message form-group mb-5">--}}
{{--                                            <label class="form-label" for="billing_surname">{{__('customer.address.3')}}--}}
{{--                                                <span class="text-danger">*</span>--}}
{{--                                            </label>--}}
{{--                                            <input id="billing_surname" type="text"--}}
{{--                                                   class="form-control @error('billing_surname') is-invalid @enderror"--}}
{{--                                                   name="billing_surname"--}}
{{--                                                   value="{{ old('billing_surname') }}" required--}}
{{--                                                   autocomplete="billing_surname" autofocus>--}}

{{--                                            @error('billing_surname')--}}
{{--                                            <span class="help-block text-danger">--}}
{{--                                                <strong>{{ $message }}</strong>--}}
{{--                                            </span>--}}
{{--                                            @enderror--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                                <div class="row justify-content-center">--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="js-form-message form-group mb-5">--}}
{{--                                            <label class="form-label" for="billing_company">{{__('customer.address.4')}}--}}
{{--                                            </label>--}}
{{--                                            <input id="billing_company" type="text"--}}
{{--                                                   class="form-control @error('billing_company') is-invalid @enderror"--}}
{{--                                                   name="billing_company"--}}
{{--                                                   value="{{ old('billing_company') }}" autocomplete="billing_company"--}}
{{--                                                   autofocus>--}}

{{--                                            @error('billing_company')--}}
{{--                                            <span class="help-block text-danger">--}}
{{--                                                <strong>{{ $message }}</strong>--}}
{{--                                            </span>--}}
{{--                                            @enderror--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="js-form-message form-group mb-5">--}}
{{--                                            <label class="form-label" for="billing_vat">{{__('customer.address.10')}}--}}
{{--                                            </label>--}}
{{--                                            <input id="billing_vat" type="text"--}}
{{--                                                   class="form-control @error('billing_vat') is-invalid @enderror"--}}
{{--                                                   name="billing_vat"--}}
{{--                                                   value="{{ old('billing_vat') }}" autocomplete="billing_vat"--}}
{{--                                                   autofocus>--}}

{{--                                            @error('billing_vat')--}}
{{--                                            <span class="help-block text-danger">--}}
{{--                                                <strong>{{ $message }}</strong>--}}
{{--                                            </span>--}}
{{--                                            @enderror--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- Input -->--}}
{{--                                <div class="row justify-content-center">--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="js-form-message form-group">--}}
{{--                                            <label class="form-label" for="billing_address">{{__('customer.address.1')}}--}}
{{--                                                <span class="text-danger">*</span>--}}
{{--                                            </label>--}}
{{--                                            <input id="billing_address" type="text"--}}
{{--                                                   class="form-control @error('billing_address') is-invalid @enderror"--}}
{{--                                                   name="billing_address"--}}
{{--                                                   value="{{ old('billing_address') }}" required--}}
{{--                                                   autocomplete="billing_address">--}}

{{--                                            @error('billing_address')--}}
{{--                                            <span class="help-block text-danger">--}}
{{--                                                <strong>{{ $message }}</strong>--}}
{{--                                            </span>--}}
{{--                                            @enderror--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-3">--}}
{{--                                        <div class="js-form-message form-group">--}}
{{--                                            <label class="form-label" for="billing_city">{{__('customer.address.7')}}--}}
{{--                                                <span--}}
{{--                                                    class="text-danger">*</span></label>--}}
{{--                                            <input id="billing_city" type="text"--}}
{{--                                                   class="form-control @error('billing_city') is-invalid @enderror"--}}
{{--                                                   name="billing_city"--}}
{{--                                                   value="{{ old('billing_city') }}" required autocomplete="city">--}}

{{--                                            @error('billing_city')--}}
{{--                                            <span class="help-block text-danger">--}}
{{--                                                <strong>{{ $message }}</strong>--}}
{{--                                            </span>--}}
{{--                                            @enderror--}}

{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-3">--}}
{{--                                        <div class="js-form-message form-group">--}}
{{--                                            <label class="form-label"--}}
{{--                                                   for="billing_province">{{__('customer.address.8')}} <span--}}
{{--                                                    class="text-danger">*</span></label>--}}
{{--                                            <input id="billing_province" type="text"--}}
{{--                                                   class="form-control @error('billing_province') is-invalid @enderror"--}}
{{--                                                   name="billing_province"--}}
{{--                                                   value="{{ old('billing_province') }}" required--}}
{{--                                                   autocomplete="billing_province">--}}

{{--                                            @error('billing_province')--}}
{{--                                            <span class="help-block text-danger">--}}
{{--                                                <strong>{{ $message }}</strong>--}}
{{--                                            </span>--}}
{{--                                            @enderror--}}

{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                                <div class="row justify-content-center">--}}
{{--                                    <div class="col-md-4">--}}
{{--                                        <div class="notranslate js-form-message mb-6">--}}
{{--                                            <label class="notranslate form-label" for="shipping_country">--}}
{{--                                                {{__('checkout.address.10')}}--}}
{{--                                                <span class="notranslate text-danger">*</span>--}}
{{--                                            </label>--}}
{{--                                            <select--}}
{{--                                                class="notranslate form-control js-select selectpicker dropdown-select"--}}
{{--                                                data-msg=""--}}
{{--                                                data-error-class="notranslate u-has-error"--}}
{{--                                                data-success-class="notranslate u-has-success"--}}
{{--                                                data-live-search="true"--}}
{{--                                                data-style="form-control border-color-1 font-weight-normal"--}}
{{--                                                name="shipping_country" id="shipping_country" required>--}}
{{--                                                <option value="">Seleziona Paese</option>--}}
{{--                                                <option value="AF">Afghanistan</option>--}}
{{--                                                <option value="AX">Åland Islands</option>--}}
{{--                                                <option value="AL">Albania</option>--}}
{{--                                                <option value="DZ">Algeria</option>--}}
{{--                                                <option value="AS">American Samoa</option>--}}
{{--                                                <option value="AD">Andorra</option>--}}
{{--                                                <option value="AO">Angola</option>--}}
{{--                                                <option value="AI">Anguilla</option>--}}
{{--                                                <option value="AQ">Antarctica</option>--}}
{{--                                                <option value="AG">Antigua and Barbuda</option>--}}
{{--                                                <option value="AR">Argentina</option>--}}
{{--                                                <option value="AM">Armenia</option>--}}
{{--                                                <option value="AW">Aruba</option>--}}
{{--                                                <option value="AU">Australia</option>--}}
{{--                                                <option value="AT">Austria</option>--}}
{{--                                                <option value="AZ">Azerbaijan</option>--}}
{{--                                                <option value="BS">Bahamas</option>--}}
{{--                                                <option value="BH">Bahrain</option>--}}
{{--                                                <option value="BD">Bangladesh</option>--}}
{{--                                                <option value="BB">Barbados</option>--}}
{{--                                                <option value="BY">Belarus</option>--}}
{{--                                                <option value="BE">Belgium</option>--}}
{{--                                                <option value="BZ">Belize</option>--}}
{{--                                                <option value="BJ">Benin</option>--}}
{{--                                                <option value="BM">Bermuda</option>--}}
{{--                                                <option value="BT">Bhutan</option>--}}
{{--                                                <option value="BO">Bolivia, Plurinational State of</option>--}}
{{--                                                <option value="BQ">Bonaire, Sint Eustatius and Saba</option>--}}
{{--                                                <option value="BA">Bosnia and Herzegovina</option>--}}
{{--                                                <option value="BW">Botswana</option>--}}
{{--                                                <option value="BV">Bouvet Island</option>--}}
{{--                                                <option value="BR">Brazil</option>--}}
{{--                                                <option value="IO">British Indian Ocean Territory</option>--}}
{{--                                                <option value="BN">Brunei Darussalam</option>--}}
{{--                                                <option value="BG">Bulgaria</option>--}}
{{--                                                <option value="BF">Burkina Faso</option>--}}
{{--                                                <option value="BI">Burundi</option>--}}
{{--                                                <option value="KH">Cambodia</option>--}}
{{--                                                <option value="CM">Cameroon</option>--}}
{{--                                                <option value="CA">Canada</option>--}}
{{--                                                <option value="CV">Cape Verde</option>--}}
{{--                                                <option value="KY">Cayman Islands</option>--}}
{{--                                                <option value="CF">Central African Republic</option>--}}
{{--                                                <option value="TD">Chad</option>--}}
{{--                                                <option value="CL">Chile</option>--}}
{{--                                                <option value="CN">China</option>--}}
{{--                                                <option value="CX">Christmas Island</option>--}}
{{--                                                <option value="CC">Cocos (Keeling) Islands</option>--}}
{{--                                                <option value="CO">Colombia</option>--}}
{{--                                                <option value="KM">Comoros</option>--}}
{{--                                                <option value="CG">Congo</option>--}}
{{--                                                <option value="CD">Congo, the Democratic Republic of the--}}
{{--                                                </option>--}}
{{--                                                <option value="CK">Cook Islands</option>--}}
{{--                                                <option value="CR">Costa Rica</option>--}}
{{--                                                <option value="CI">Côte d'Ivoire</option>--}}
{{--                                                <option value="HR">Croatia</option>--}}
{{--                                                <option value="CU">Cuba</option>--}}
{{--                                                <option value="CW">Curaçao</option>--}}
{{--                                                <option value="CY">Cyprus</option>--}}
{{--                                                <option value="CZ">Czech Republic</option>--}}
{{--                                                <option value="DK">Denmark</option>--}}
{{--                                                <option value="DJ">Djibouti</option>--}}
{{--                                                <option value="DM">Dominica</option>--}}
{{--                                                <option value="DO">Dominican Republic</option>--}}
{{--                                                <option value="EC">Ecuador</option>--}}
{{--                                                <option value="EG">Egypt</option>--}}
{{--                                                <option value="SV">El Salvador</option>--}}
{{--                                                <option value="GQ">Equatorial Guinea</option>--}}
{{--                                                <option value="ER">Eritrea</option>--}}
{{--                                                <option value="EE">Estonia</option>--}}
{{--                                                <option value="ET">Ethiopia</option>--}}
{{--                                                <option value="FK">Falkland Islands (Malvinas)</option>--}}
{{--                                                <option value="FO">Faroe Islands</option>--}}
{{--                                                <option value="FJ">Fiji</option>--}}
{{--                                                <option value="FI">Finland</option>--}}
{{--                                                <option value="FR">France</option>--}}
{{--                                                <option value="GF">French Guiana</option>--}}
{{--                                                <option value="PF">French Polynesia</option>--}}
{{--                                                <option value="TF">French Southern Territories</option>--}}
{{--                                                <option value="GA">Gabon</option>--}}
{{--                                                <option value="GM">Gambia</option>--}}
{{--                                                <option value="GE">Georgia</option>--}}
{{--                                                <option value="DE">Germany</option>--}}
{{--                                                <option value="GH">Ghana</option>--}}
{{--                                                <option value="GI">Gibraltar</option>--}}
{{--                                                <option value="GR">Greece</option>--}}
{{--                                                <option value="GL">Greenland</option>--}}
{{--                                                <option value="GD">Grenada</option>--}}
{{--                                                <option value="GP">Guadeloupe</option>--}}
{{--                                                <option value="GU">Guam</option>--}}
{{--                                                <option value="GT">Guatemala</option>--}}
{{--                                                <option value="GG">Guernsey</option>--}}
{{--                                                <option value="GN">Guinea</option>--}}
{{--                                                <option value="GW">Guinea-Bissau</option>--}}
{{--                                                <option value="GY">Guyana</option>--}}
{{--                                                <option value="HT">Haiti</option>--}}
{{--                                                <option value="HM">Heard Island and McDonald Islands--}}
{{--                                                </option>--}}
{{--                                                <option value="VA">Holy See (Vatican City State)</option>--}}
{{--                                                <option value="HN">Honduras</option>--}}
{{--                                                <option value="HK">Hong Kong</option>--}}
{{--                                                <option value="HU">Hungary</option>--}}
{{--                                                <option value="IS">Iceland</option>--}}
{{--                                                <option value="IN">India</option>--}}
{{--                                                <option value="ID">Indonesia</option>--}}
{{--                                                <option value="IR">Iran, Islamic Republic of</option>--}}
{{--                                                <option value="IQ">Iraq</option>--}}
{{--                                                <option value="IE">Ireland</option>--}}
{{--                                                <option value="IM">Isle of Man</option>--}}
{{--                                                <option value="IL">Israel</option>--}}
{{--                                                <option value="IT">Italy</option>--}}
{{--                                                <option value="JM">Jamaica</option>--}}
{{--                                                <option value="JP">Japan</option>--}}
{{--                                                <option value="JE">Jersey</option>--}}
{{--                                                <option value="JO">Jordan</option>--}}
{{--                                                <option value="KZ">Kazakhstan</option>--}}
{{--                                                <option value="KE">Kenya</option>--}}
{{--                                                <option value="KI">Kiribati</option>--}}
{{--                                                <option value="KP">Korea, Democratic People's Republic of--}}
{{--                                                </option>--}}
{{--                                                <option value="KR">Korea, Republic of</option>--}}
{{--                                                <option value="KW">Kuwait</option>--}}
{{--                                                <option value="KG">Kyrgyzstan</option>--}}
{{--                                                <option value="LA">Lao People's Democratic Republic</option>--}}
{{--                                                <option value="LV">Latvia</option>--}}
{{--                                                <option value="LB">Lebanon</option>--}}
{{--                                                <option value="LS">Lesotho</option>--}}
{{--                                                <option value="LR">Liberia</option>--}}
{{--                                                <option value="LY">Libya</option>--}}
{{--                                                <option value="LI">Liechtenstein</option>--}}
{{--                                                <option value="LT">Lithuania</option>--}}
{{--                                                <option value="LU">Luxembourg</option>--}}
{{--                                                <option value="MO">Macao</option>--}}
{{--                                                <option value="MK">Macedonia, the former Yugoslav Republic--}}
{{--                                                    of--}}
{{--                                                </option>--}}
{{--                                                <option value="MG">Madagascar</option>--}}
{{--                                                <option value="MW">Malawi</option>--}}
{{--                                                <option value="MY">Malaysia</option>--}}
{{--                                                <option value="MV">Maldives</option>--}}
{{--                                                <option value="ML">Mali</option>--}}
{{--                                                <option value="MT">Malta</option>--}}
{{--                                                <option value="MH">Marshall Islands</option>--}}
{{--                                                <option value="MQ">Martinique</option>--}}
{{--                                                <option value="MR">Mauritania</option>--}}
{{--                                                <option value="MU">Mauritius</option>--}}
{{--                                                <option value="YT">Mayotte</option>--}}
{{--                                                <option value="MX">Mexico</option>--}}
{{--                                                <option value="FM">Micronesia, Federated States of</option>--}}
{{--                                                <option value="MD">Moldova, Republic of</option>--}}
{{--                                                <option value="MC">Monaco</option>--}}
{{--                                                <option value="MN">Mongolia</option>--}}
{{--                                                <option value="ME">Montenegro</option>--}}
{{--                                                <option value="MS">Montserrat</option>--}}
{{--                                                <option value="MA">Morocco</option>--}}
{{--                                                <option value="MZ">Mozambique</option>--}}
{{--                                                <option value="MM">Myanmar</option>--}}
{{--                                                <option value="NA">Namibia</option>--}}
{{--                                                <option value="NR">Nauru</option>--}}
{{--                                                <option value="NP">Nepal</option>--}}
{{--                                                <option value="NL">Netherlands</option>--}}
{{--                                                <option value="NC">New Caledonia</option>--}}
{{--                                                <option value="NZ">New Zealand</option>--}}
{{--                                                <option value="NI">Nicaragua</option>--}}
{{--                                                <option value="NE">Niger</option>--}}
{{--                                                <option value="NG">Nigeria</option>--}}
{{--                                                <option value="NU">Niue</option>--}}
{{--                                                <option value="NF">Norfolk Island</option>--}}
{{--                                                <option value="MP">Northern Mariana Islands</option>--}}
{{--                                                <option value="NO">Norway</option>--}}
{{--                                                <option value="OM">Oman</option>--}}
{{--                                                <option value="PK">Pakistan</option>--}}
{{--                                                <option value="PW">Palau</option>--}}
{{--                                                <option value="PS">Palestinian Territory, Occupied</option>--}}
{{--                                                <option value="PA">Panama</option>--}}
{{--                                                <option value="PG">Papua New Guinea</option>--}}
{{--                                                <option value="PY">Paraguay</option>--}}
{{--                                                <option value="PE">Peru</option>--}}
{{--                                                <option value="PH">Philippines</option>--}}
{{--                                                <option value="PN">Pitcairn</option>--}}
{{--                                                <option value="PL">Poland</option>--}}
{{--                                                <option value="PT">Portugal</option>--}}
{{--                                                <option value="PR">Puerto Rico</option>--}}
{{--                                                <option value="QA">Qatar</option>--}}
{{--                                                <option value="RE">Réunion</option>--}}
{{--                                                <option value="RO">Romania</option>--}}
{{--                                                <option value="RU">Russian Federation</option>--}}
{{--                                                <option value="RW">Rwanda</option>--}}
{{--                                                <option value="BL">Saint Barthélemy</option>--}}
{{--                                                <option value="SH">Saint Helena, Ascension and Tristan da--}}
{{--                                                    Cunha--}}
{{--                                                </option>--}}
{{--                                                <option value="KN">Saint Kitts and Nevis</option>--}}
{{--                                                <option value="LC">Saint Lucia</option>--}}
{{--                                                <option value="MF">Saint Martin (French part)</option>--}}
{{--                                                <option value="PM">Saint Pierre and Miquelon</option>--}}
{{--                                                <option value="VC">Saint Vincent and the Grenadines</option>--}}
{{--                                                <option value="WS">Samoa</option>--}}
{{--                                                <option value="SM">San Marino</option>--}}
{{--                                                <option value="ST">Sao Tome and Principe</option>--}}
{{--                                                <option value="SA">Saudi Arabia</option>--}}
{{--                                                <option value="SN">Senegal</option>--}}
{{--                                                <option value="RS">Serbia</option>--}}
{{--                                                <option value="SC">Seychelles</option>--}}
{{--                                                <option value="SL">Sierra Leone</option>--}}
{{--                                                <option value="SG">Singapore</option>--}}
{{--                                                <option value="SX">Sint Maarten (Dutch part)</option>--}}
{{--                                                <option value="SK">Slovakia</option>--}}
{{--                                                <option value="SI">Slovenia</option>--}}
{{--                                                <option value="SB">Solomon Islands</option>--}}
{{--                                                <option value="SO">Somalia</option>--}}
{{--                                                <option value="ZA">South Africa</option>--}}
{{--                                                <option value="GS">South Georgia and the South Sandwich--}}
{{--                                                    Islands--}}
{{--                                                </option>--}}
{{--                                                <option value="SS">South Sudan</option>--}}
{{--                                                <option value="ES">Spain</option>--}}
{{--                                                <option value="LK">Sri Lanka</option>--}}
{{--                                                <option value="SD">Sudan</option>--}}
{{--                                                <option value="SR">Suriname</option>--}}
{{--                                                <option value="SJ">Svalbard and Jan Mayen</option>--}}
{{--                                                <option value="SZ">Swaziland</option>--}}
{{--                                                <option value="SE">Sweden</option>--}}
{{--                                                <option value="CH">Switzerland</option>--}}
{{--                                                <option value="SY">Syrian Arab Republic</option>--}}
{{--                                                <option value="TW">Taiwan, Province of China</option>--}}
{{--                                                <option value="TJ">Tajikistan</option>--}}
{{--                                                <option value="TZ">Tanzania, United Republic of</option>--}}
{{--                                                <option value="TH">Thailand</option>--}}
{{--                                                <option value="TL">Timor-Leste</option>--}}
{{--                                                <option value="TG">Togo</option>--}}
{{--                                                <option value="TK">Tokelau</option>--}}
{{--                                                <option value="TO">Tonga</option>--}}
{{--                                                <option value="TT">Trinidad and Tobago</option>--}}
{{--                                                <option value="TN">Tunisia</option>--}}
{{--                                                <option value="TR">Turkey</option>--}}
{{--                                                <option value="TM">Turkmenistan</option>--}}
{{--                                                <option value="TC">Turks and Caicos Islands</option>--}}
{{--                                                <option value="TV">Tuvalu</option>--}}
{{--                                                <option value="UG">Uganda</option>--}}
{{--                                                <option value="UA">Ukraine</option>--}}
{{--                                                <option value="AE">United Arab Emirates</option>--}}
{{--                                                <option value="GB">United Kingdom</option>--}}
{{--                                                <option value="US">United States</option>--}}
{{--                                                <option value="UM">United States Minor Outlying Islands--}}
{{--                                                </option>--}}
{{--                                                <option value="UY">Uruguay</option>--}}
{{--                                                <option value="UZ">Uzbekistan</option>--}}
{{--                                                <option value="VU">Vanuatu</option>--}}
{{--                                                <option value="VE">Venezuela, Bolivarian Republic of--}}
{{--                                                </option>--}}
{{--                                                <option value="VN">Viet Nam</option>--}}
{{--                                                <option value="VG">Virgin Islands, British</option>--}}
{{--                                                <option value="VI">Virgin Islands, U.S.</option>--}}
{{--                                                <option value="WF">Wallis and Futuna</option>--}}
{{--                                                <option value="EH">Western Sahara</option>--}}
{{--                                                <option value="YE">Yemen</option>--}}
{{--                                                <option value="ZM">Zambia</option>--}}
{{--                                                <option value="ZW">Zimbabwe</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-3">--}}
{{--                                        <div class="js-form-message form-group">--}}
{{--                                            <label class="form-label" for="billing_zipcode">{{__('customer.address.9')}}--}}
{{--                                                <span--}}
{{--                                                    class="text-danger">*</span></label>--}}
{{--                                            <input id="billing_zipcode" type="number"--}}
{{--                                                   class="form-control @error('billing_zipcode') is-invalid @enderror"--}}
{{--                                                   name="billing_zipcode"--}}
{{--                                                   value="{{ old('billing_zipcode') }}" required--}}
{{--                                                   autocomplete="billing_zipcode">--}}

{{--                                            @error('billing_zipcode')--}}
{{--                                            <span class="help-block text-danger">--}}
{{--                                                <strong>{{ $message }}</strong>--}}
{{--                                            </span>--}}
{{--                                            @enderror--}}

{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-5">--}}
{{--                                        <div class="js-form-message form-group">--}}
{{--                                            <label class="form-label" for="billing_phone">{{__('customer.address.5')}}--}}
{{--                                                <span class="text-danger">*</span>--}}
{{--                                            </label>--}}
{{--                                            <input type="number" class="form-control" name="billing_phone"--}}
{{--                                                   id="billing_phone"--}}
{{--                                                   required--}}
{{--                                                   data-msg="Please enter a valid phone number"--}}
{{--                                                   data-error-class="u-has-error"--}}
{{--                                                   data-success-class="u-has-success">--}}
{{--                                            @error('billing_phone')--}}
{{--                                            <span class="help-block text-danger">--}}
{{--                                                <strong>{{ $message }}</strong>--}}
{{--                                            </span>--}}
{{--                                            @enderror--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="row justify-content-center">--}}
{{--                                    <div class="col-md-4">--}}
{{--                                        <div class="js-form-message form-group">--}}
{{--                                            <label class="form-label" for="email">E-mail--}}
{{--                                                <span class="text-danger">*</span>--}}
{{--                                            </label>--}}
{{--                                            <input id="email" type="email" name="email"--}}
{{--                                                   class="form-control @error('email') is-invalid @enderror"--}}
{{--                                                   required>--}}
{{--                                            @error('email')--}}
{{--                                            <span class="help-block text-danger">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                            @enderror--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-4">--}}
{{--                                        <div class="js-form-message form-group">--}}
{{--                                            <label class="form-label" for="password">Password <span--}}
{{--                                                    class="text-danger">*</span></label>--}}
{{--                                            <input id="password" type="password"--}}
{{--                                                   class="form-control @error('password') is-invalid @enderror"--}}
{{--                                                   name="password"--}}
{{--                                                   required autocomplete="password">--}}

{{--                                            @error('password')--}}
{{--                                            <span class="help-block text-danger">--}}
{{--                                                <strong>{{ $message }}</strong>--}}
{{--                                            </span>--}}
{{--                                            @enderror--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-4">--}}
{{--                                        <div class="js-form-message form-group">--}}
{{--                                            <label class="form-label">--}}
{{--                                                {{__('customer.profile.3')}}--}}
{{--                                                <span class="text-danger">*</span>--}}
{{--                                            </label>--}}
{{--                                            <input id="password-confirm" type="password"--}}
{{--                                                   name="password_confirmation"--}}
{{--                                                   class="form-control">--}}
{{--                                            @if ($errors->has('password'))--}}
{{--                                                <span class="help-block text-danger">--}}
{{--                                                    <strong>{{ $errors->first('password') }}</strong>--}}
{{--                                                    </span>--}}
{{--                                            @endif--}}

{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                </div>--}}

{{--                                <!-- End Input -->--}}

{{--                                <!-- End Form Group -->--}}
{{--                                <div class="notranslate col-md-12">--}}
{{--                                    <div class="notranslate js-form-message mb-4">--}}
{{--                                        <input type="checkbox" class="form-check-input" id="exampleCheck1"--}}
{{--                                               required>--}}
{{--                                        <label class="form-check-label" for="exampleCheck1">{{__('contacts.policy.field1')}} <a--}}
{{--                                                href="https://www.iubenda.com/privacy-policy/19192330"--}}
{{--                                                target="popup"--}}
{{--                                                onclick="MyWindow=window.open('https://www.iubenda.com/privacy-policy/19192330','MyWindow','width=800,height=600'); return false;"><strong--}}
{{--                                                    style="text-decoration:underline">{{__('contacts.policy.field2')}}</strong></a> {{__('contacts.policy.field3')}}--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- Button -->--}}
{{--                                <div class="mb-6">--}}
{{--                                    <div class="g-recaptcha"--}}
{{--                                         data-sitekey="{{env('INVISIBLE_RECAPTCHA_SITEKEY')}}"--}}
{{--                                         aria-required="true">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="mb-6">--}}
{{--                                    <div class="mb-3">--}}
{{--                                        <button type="submit" class="btn btn-primary-dark-w px-5">Registrati--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- End Button -->--}}
{{--                            </form>--}}
{{--                            <h3 class="font-size-18 mb-3"> {{__('app.areaRegister.2')}}</h3>--}}
{{--                            <ul class="list-group list-group-borderless">--}}
{{--                                <li class="list-group-item px-0"><i--}}
{{--                                        class="fas fa-check mr-2 text-green font-size-16"></i>{{__('app.areaRegister.3')}}--}}
{{--                                </li>--}}
{{--                                <li class="list-group-item px-0"><i--}}
{{--                                        class="fas fa-check mr-2 text-green font-size-16"></i> {{__('app.areaRegister.4')}}--}}
{{--                                </li>--}}
{{--                                <li class="list-group-item px-0"><i--}}
{{--                                        class="fas fa-check mr-2 text-green font-size-16"></i> {{__('app.areaRegister.5')}}--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    </main>--}}

