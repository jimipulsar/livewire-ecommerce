@extends('layouts.app')

@section('title', __('Service Unavailable | 503'))

@section('content')
    <!-- section MASTHEAD -->
    <section class="section section-masthead d-none" data-background-color="var(--color-light-1)"></section>
    <!-- - section MASTHEAD -->
    <!-- section 404 -->
    <section class="section section-404 section-content section-fullheight overflow" data-arts-theme-text="dark">
        <div class="section-fullheight__inner section__content section pt-medium pb-medium">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-8">
                        <div class="section-content__heading split-text js-split-text" data-split-text-type="lines" data-split-text-set="lines">
                            <h1 class="h1">Error 503</h1>
                        </div>
                        <div class="w-100"></div>
                        <div class="section-content__text split-text js-split-text mt-1" data-split-text-type="lines" data-split-text-set="lines">
                            <p>{{__($exception->getMessage() ?: 'Service Unavailable')}}</p>
                        </div>
                        <div class="w-100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section__circle"></div>
    </section>
    <!-- - section 404 -->
@endsection
