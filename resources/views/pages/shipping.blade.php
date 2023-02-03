@extends('layouts.main')

@section('title', __('home.seo.title'))

@section('description', __('home.seo.description'))

@section('content')
    <!-- breadcrumb-area start -->
    <main id="content " role="main">
        <!-- breadcrumb -->
        <div class="bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                <div class="my-md-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a
                                    href="{{route('index', app()->getLocale())}}">Home</a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">
                                Spedizione: {{$zip->city.','.$zip->state}}
                            </li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="bg-gray-13 bg-md-transparent pt-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        @foreach($couriers as $courier)
                            <div class="bg-grey px-3 py-5 mb-10 shadow-lg border-2">
                                <!-- Review -->
                                <div class="d-block d-md-flex media">
                                    <div class="bg-grey border-dark w-full mb-4 mb-md-0 mr-md-4">
                                        <img class="img-fluid bg-white"

                                             src="{{$courier->logo}}" alt="Logo Corriere">
                                    </div>
                                    <div class="media-body">
                                        <h3 class="font-size-18 mb-3"><a href="#"><span class="blog-date"><i
                                                        class="fa fa-truck"
                                                        aria-hidden="true"></i> {{$courier->name}}</span></a></h3>
                                        <p class="mb-0">
                                            <span>
                                                <i class="fa fa-clock-o"
                                                   aria-hidden="true"></i> {{ucfirst(now()->addHours($courier->transit_hours)->diffForHumans())}}
                                            </span>
                                        </p>
                                        <div class="mb-3 pb-3 ">
                                            <div
                                                class="list-group list-group-horizontal flex-wrap list-group-borderless align-items-center mx-n0dot5">
                                                {{priceView($courier->base_price)}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Review -->
                            </div>

                        @endforeach

                    </div>

                </div>
                <div class="py-2 mb-10 w-full d-flex justify-content-center">
                    <a href="{{route('cart',app()->getLocale())}}" class="btn btn-primary-dark-w"> Torna indietro</a>
                </div>
            </div>



        </div>
    </main>
@endsection
