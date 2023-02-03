<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=5">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title') | Livewire Ecommerce</title>
    <meta name="description" content="@yield('description')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="canonical" href="{{url()->current()}}"/>
    <meta property="og:title" content=""/>
    <meta property="og:type" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:image" content=""/>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/favicon.ico">
    <!-- WebFont.js -->
    <!-- Template CSS -->
    @yield('extraCss')
    <link rel="stylesheet" href="/assets/css/responsive.css"/>
    <link rel="stylesheet" href="/assets/css/plugins/slider-range.css"/>
    <link rel="stylesheet" href="/assets/css/main.css?v=5.3"/>
    <link rel="stylesheet" href="/assets/vendor/animate/animate.min.css">
    <livewire:styles/>
    @if(app()->getLocale() === 'it')
        <script type="text/javascript">
            var _iub = _iub || [];
            _iub.csConfiguration = {
                "ccpaAcknowledgeOnDisplay": true,
                "consentOnContinuedBrowsing": false,
                "countryDetection": true,
                "enableCcpa": true,
                "enableLgpd": true,
                "floatingPreferencesButtonDisplay": "bottom-right",
                "invalidateConsentWithoutLog": true,
                "lgpdAppliesGlobally": false,
                "perPurposeConsent": true,
                "siteId": 2798095,
                "whitelabel": false,
                "cookiePolicyId": 46585307,
                "lang": "it",
                "banner": {
                    "acceptButtonColor": "#DFA56B",
                    "acceptButtonDisplay": true,
                    "backgroundColor": "#FFFFFF",
                    "closeButtonDisplay": false,
                    "customizeButtonColor": "#DFA56B",
                    "customizeButtonDisplay": true,
                    "explicitWithdrawal": true,
                    "listPurposes": true,
                    "position": "float-bottom-center",
                    "rejectButtonColor": "#966635",
                    "rejectButtonDisplay": true,
                    "textColor": "#373737"
                }
            };
        </script>
        <script type="text/javascript" src="//cdn.iubenda.com/cs/ccpa/stub.js"></script>
        <script type="text/javascript" src="//cdn.iubenda.com/cs/iubenda_cs.js" charset="UTF-8" async></script>
    @endif
    @if(app()->getLocale() === 'en')
        <script type="text/javascript">
            var _iub = _iub || [];
            _iub.csConfiguration = {
                "ccpaAcknowledgeOnDisplay": true,
                "consentOnContinuedBrowsing": false,
                "countryDetection": true,
                "enableCcpa": true,
                "enableLgpd": true,
                "floatingPreferencesButtonDisplay": "bottom-right",
                "invalidateConsentWithoutLog": true,
                "lgpdAppliesGlobally": false,
                "perPurposeConsent": true,
                "siteId": 2798095,
                "whitelabel": false,
                "cookiePolicyId": 65808002,
                "lang": "en",
                "banner": {
                    "acceptButtonColor": "#DFA56B",
                    "acceptButtonDisplay": true,
                    "backgroundColor": "#FFFFFF",
                    "closeButtonDisplay": false,
                    "customizeButtonColor": "#DFA56B",
                    "customizeButtonDisplay": true,
                    "explicitWithdrawal": true,
                    "listPurposes": true,
                    "position": "float-bottom-center",
                    "rejectButtonColor": "#966635",
                    "rejectButtonDisplay": true,
                    "textColor": "#373737"
                }
            };
        </script>
        <script type="text/javascript" src="//cdn.iubenda.com/cs/ccpa/stub.js"></script>
        <script type="text/javascript" src="//cdn.iubenda.com/cs/iubenda_cs.js" charset="UTF-8" async></script>
    @endif
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>
<!-- Quick view -->
<x-auto-translate></x-auto-translate>
<x-alert></x-alert>
<x-success></x-success>
<!-- Modal -->
<!-- Quick view -->
<x-header></x-header>

<!--End header-->
<main class="main">
    @yield('content')
</main>
<x-footer></x-footer>
<!-- Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="text-center">
                <img src="/uploads/logo/loader.gif" alt="Livewire"/>
            </div>
        </div>
    </div>
</div>

@yield('extraJs')
<!-- Vendor JS-->
<script src="/assets/js/vendor/modernizr-3.6.0.min.js"></script>
<script src="/assets/js/vendor/jquery-3.6.0.min.js"></script>
<script src="/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
<script src="/assets/js/vendor/bootstrap.bundle.min.js"></script>
<script src="/assets/js/plugins/slick.js"></script>
<script src="/assets/js/plugins/jquery.syotimer.min.js"></script>
<script src="/assets/js/plugins/wow.js"></script>
<script src="/assets/js/plugins/slider-range.js"></script>
<script src="/assets/js/plugins/perfect-scrollbar.js"></script>
<script src="/assets/js/plugins/magnific-popup.js"></script>
<script src="/assets/js/plugins/select2.min.js"></script>
<script src="/assets/js/plugins/waypoints.js"></script>
<script src="/assets/js/plugins/counterup.js"></script>
<script src="/assets/js/plugins/jquery.countdown.min.js"></script>
<script src="/assets/js/plugins/images-loaded.js"></script>
<script src="/assets/js/plugins/isotope.js"></script>
<script src="/assets/js/plugins/scrollup.js"></script>
<script src="/assets/js/plugins/jquery.vticker-min.js"></script>
<script src="/assets/js/plugins/jquery.theia.sticky.js"></script>
<script src="/assets/js/plugins/jquery.elevatezoom.js"></script>
<!-- Template  JS -->
<script src="/assets/js/main.js?v=5.3"></script>
<script src="/assets/js/shop.js?v=5.3"></script>
<script src="/assets/js/hide.js"></script>
<script src="/assets/js/loader.js"></script>
<script src="/assets/js/switchCheckout.js"></script>
<script src="//unpkg.com/tippy.js@3/dist/tippy.all.min.js"></script>
<script src="//unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
{{--@if ($errors->any())--}}
{{--    @foreach ($errors->all() as $error)--}}
{{--        <script type="text/javascript">--}}
{{--            swal("oOops!", "{{$error}}", "error");--}}
{{--        </script>--}}
{{--    @endforeach--}}
{{--@endif--}}

{{--@if ($message = Session::get('success'))--}}
{{--    <script type="text/javascript">--}}
{{--        swal("Messaggio inviato con successo", "{{$message}}", "success")--}}
{{--    </script>--}}
{{--@endif--}}
<livewire:scripts/>
<script>
    window.livewire_app_url = '{{route('index', app()->getLocale())}}';
</script>
</body>

</html>
