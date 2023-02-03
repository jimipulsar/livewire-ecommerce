@extends('layouts.main')
@section('title', __('home.seo.title'))
@section('description', __('home.seo.description'))

@section('content')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{route('home', app()->getLocale())}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                 <span></span> Il mio profilo
            </div>
        </div>
    </div>
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

                            <div class="card">
                                <div class="card-header">
                                    <h5>Il mio profilo</h5>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('update', ['lang' => app()->getLocale(),$customer->id]) }}"
                                          method="POST"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group mb-6">
                                                    <label for="email_1">Email *</label>
                                                    <input type="email" class="notranslate form-control form-control-md"
                                                           name="email"
                                                           aria-label=""
                                                           required=""
                                                           data-msg="Please enter a valid email address."
                                                           data-error-class="notranslate u-has-error"
                                                           data-success-class="notranslate u-has-success"
                                                           value="{{ $customer->email }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-dark" for="new-password">Nuova Password</label>
                                            <input type="password" id="password"
                                                   name="password"
                                                   class="notranslate form-control form-control-md"
                                                   value="">
                                            @if ($errors->has('password'))
                                                <span class="notranslate help-block text-danger">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group mb-10">
                                            <label class="text-dark" for="conf-password">Conferma Password</label>
                                            <input type="password" name="password_confirmation"
                                                   id="password-confirm"
                                                   class="notranslate form-control form-control-md">
                                            @if ($errors->has('password'))
                                                <span class="notranslate help-block text-danger">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                            @endif
                                        </div>
                                        <button type="submit"
                                                class="btn btn-fill-out submit font-weight-bold">{!! __('customer.save') !!}
                                        </button>
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
