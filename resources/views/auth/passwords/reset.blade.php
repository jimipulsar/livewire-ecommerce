@extends('layouts.main')

@section('content')
    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main">
        <!-- breadcrumb -->
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('home', app()->getLocale())}}" rel="nofollow"><i
                                class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Password reset
                </div>
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">

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
                <div class="my-4 my-xl-8 ">
                    <div class="row justify-content-center">
                        <div class="col-md-5 align-self-center">
                            <!-- Title -->
                            <div class="border-bottom border-color-1 mb-6">
                                <h3 class="d-inline-block section-title mb-0 pb-2 font-size-26">Resetta la password</h3>
                            </div>
                            <!-- End Title -->
                            <form method="POST" action="{{ route('password.update', app()->getLocale()) }}">
                            @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <!-- Form Group -->
                                <div class="js-form-message form-group">
                                    <label class="form-label" for="password">Email <span
                                            class="text-danger">*</span></label>
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="js-form-message form-group">
                                    <label class="form-label" for="password">{{ __('Password') }}</label>

                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- End Form Group -->
                                <div class="js-form-message form-group">
                                    <label class="form-label" for="password-confirm">{{ __('Conferma Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                                <!-- Button -->
                                <div class="mb-1">
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary-dark-w px-5">Resetta la password
                                        </button>
                                    </div>
                                </div>

                                <!-- End Button -->
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </main>


@endsection
