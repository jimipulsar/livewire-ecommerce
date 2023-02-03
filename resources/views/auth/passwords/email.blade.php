@extends('layouts.main')
@section('title', __('home.passRequest'))
@section('description', __('home.passRequest'))
@section('content')

    <!-- ========== MAIN CONTENT ========== -->
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{route('home', app()->getLocale())}}" rel="nofollow"><i
                            class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Password reset
            </div>
        </div>
    </div>
    <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-12 m-auto">
                    @if(Auth::check())
                        <div class="my-4 my-xl-8">
                            <div class="row">
                                @include('auth.customer.partials.sidebar')
                                <div class="col-xl-9 col-wd-9gdot5">
                                    <!-- Title -->
                                    <div class="border-bottom border-color-1 mb-6">
                                        <h3 class="d-inline-block section-title mb-0 pb-2 font-size-26">
                                            Dashboard</h3>
                                    </div>
                                    <!-- End Title -->
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="login_wrap widget-taber-content background-white">
                            <div class="padding_eight_all bg-white">
                                <div class="heading_s1">
                                    <img class="border-radius-15" src="/assets/imgs/page/forgot_password.svg" alt=""/>
                                    <h2 class="mb-15 mt-15">Password dimenticata?</h2>
                                    <p class="mb-30">Non preoccuparti, ti abbiamo preso noi! Ti procuriamo una nuova
                                        password. Per favore inserisci il tuo indirizzo email.</p>
                                </div>
                                <form method="POST" action="{{ route('password.email',app()->getLocale()) }}">
                                    @csrf
                                    <div class="form-group">
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror" name="email"
                                               value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-heading btn-block hover-up" name="login">
                                            Invia link password reset
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
