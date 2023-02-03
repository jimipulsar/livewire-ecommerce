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
    @if(auth()->check())
        <div class="page-content pt-60 pb-60 mb-160">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="dashboard-menu">
                                    @include('auth.customer.partials.header')

                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="tab-content account dashboard-content pl-50">
                                    <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="mb-0">Benvenuto {{ $customer->billing_name }}</h3>
                                            </div>
                                            <div class="card-body">
                                                <p>
                                                    Dalla dashboard del tuo account, puoi facilmente controllare e visualizzare i tuoi <a href="{{route('orders.index', app()->getLocale())}}">ordini recenti</a>,
                                                    gestire i tuoi <a href="{{route('address', app()->getLocale())}}">indirizzi di spedizione e fatturazione</a> e <a href="{{route('profile', app()->getLocale())}}">modificare la tua password e i dettagli del tuo account</a>.
                                                </p>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
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
                                               name="password"      value="{{ old('password') }}"
                                               required autocomplete="current-password">


                                        @if ($errors->has('password'))
                                            <span class="notranslate help-block text-danger">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                        @endif
                                    </div>
{{--                                    <div class="login_footer form-group mb-50">--}}
{{--                                        <div class="g-recaptcha"--}}
{{--                                             data-sitekey="{{env('INVISIBLE_RECAPTCHA_SITEKEY')}}">--}}

{{--                                        </div>--}}
{{--                                    </div>--}}
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
    @endif

@endsection
