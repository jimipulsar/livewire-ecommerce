@extends('errors.layout')

@section('title', __('Not Found | 404'))

@section('content')

    <!-- Start of Main -->
    <main class="main page-404">
        <div class="page-content pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-10 col-md-12 m-auto text-center">
                        <p class="mb-20"><img src="assets/imgs/page/page-404.png" alt="" class="hover-up" /></p>
                        <h1 class="display-2 mb-30">Pagina non trovata!</h1>
                        <p class="font-lg text-grey-700 mb-30">
                            Il collegamento su cui hai fatto clic potrebbe essere interrotto o la pagina potrebbe essere stata rimossa.
                        </p>
                        <a class="btn btn-default submit-auto-width font-xs hover-up mt-30" href="{{url('/')}}"><i class="fi-rs-home mr-5"></i> Torna in Home Page</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- End of Main -->
@endsection
