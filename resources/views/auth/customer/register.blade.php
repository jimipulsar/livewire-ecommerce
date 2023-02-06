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
@endsection

