@extends('layouts.main')
@section('title', __('home.seo.title'))
@section('description', __('home.seo.description'))

@section('content')

    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{route('home', app()->getLocale())}}" rel="nofollow"><i
                        class="fi-rs-home mr-5"></i>Home</a>
                <span></span> My Account
            </div>
        </div>
    </div>

    <div class="page-content pt-60 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-10 col-md-12 m-auto">
                    <div class="login_wrap widget-taber-content background-white">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                                <h1 class="mb-5">Area riservata</h1>
                                <p class="mb-30">Non hai ancora un account registrato? <a
                                        href="{{route('register',app()->getLocale())}}">Registrati ora</a></p>
                            </div>
                            <form method="POST" action="{{ route('login', app()->getLocale()) }}"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </div>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                                <div class="form-group">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           name="password"
                                           required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
{{--                                <div class="login_footer form-group mb-50">--}}
{{--                                    <div class="g-recaptcha"--}}
{{--                                         data-sitekey="{{env('INVISIBLE_RECAPTCHA_SITEKEY')}}">--}}

{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="login_footer form-group mb-50">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="checkbox"
                                                   id="exampleCheckbox1" value=""/>
                                            <label class="form-check-label"
                                                   for="exampleCheckbox1"><span>Ricordami</span></label>
                                        </div>
                                    </div>
                                    <a class="text-muted"
                                       href="{{ route('password.request', app()->getLocale()) }}">Password
                                        dimenticata?</a>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-heading btn-block hover-up"
                                            name="login">Accedi
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
