@extends('layouts.main')

@section('title', __('Server Error | 500'))

@section('content')
    <!-- section MASTHEAD -->
    <main id="content" role="main" style="height:40vh">
        <!-- breadcrumb -->
        <div class="bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                <div class="my-md-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Pagina non trovata</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="mb-5 text-center pb-3 border-bottom border-color-1">
                <h1 class="font-size-sl-72 font-weight-light mb-3">Errore 500!</h1>
                <p class="text-gray-90 font-size-20 mb-0 font-weight-light">Pagina non disponibile. Prova a cercare o dai un'occhiata alle voci del menù.</p>
            </div>

        </div>
    </main>
    <!-- - section 500 -->
@endsection
