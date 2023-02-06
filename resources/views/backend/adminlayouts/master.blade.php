<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="referrer" content="always">
    <link rel="canonical" href="">
    <title> Admin Dashboard | {{ config('app.name') }}</title>
    <meta name="description" content="">
    <!-- NO INDEX -->
    <meta name="robots" content="noindex, nofollow">
    <!-- END NO INDEX -->
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
    <link rel="icon" href="/favicon.ico" type="image/x-icon"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>
    <!-- Google Fonts -->
    @yield('extraCss')
    <link rel="stylesheet" href="/assets/css/backendCustom.css">
    <link rel="stylesheet" href="/assets/css/customX.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/assets/vendor/animate.css/animate.min.css">
    <x-head.tinymce-config/>
    @livewireStyles
</head>
<body>
<script src="{{ asset('js/app.js') }}"></script>
<div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200 font-roboto">

    @include('backend.adminlayouts.sidebar')

    <div class="flex-1 flex flex-col overflow-hidden">
        @include('backend.adminlayouts.header')
        @if ($errors->any())
            @foreach ($errors->all() as $error)

                <div class="rounded-md py-4 px-4 overflow-x-auto whitespace-no-wrap animated slideInRight" id="hideMeBack">
                    <div class="inline-flex max-w-sm w-full bg-white shadow-md rounded-lg overflow-hidden ml-3">
                        <div class="flex justify-center items-center w-12 bg-red-500">
                            <svg class="h-6 w-6 fill-current text-white" viewBox="0 0 40 40"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z"/>
                            </svg>
                        </div>

                        <div class="-mx-3 py-2 px-4">
                            <div class="mx-3">
                                <span class="text-red-500 font-semibold">Attenzione!</span>
                                <p class="text-gray-600 text-sm">{{$error}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        <x-success-admin></x-success-admin>

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-8">
                @yield('body')
            </div>
        </main>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.file-input').change(function () {
            var curElement = $('.image');
            console.log(curElement);
            var reader = new FileReader();

            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                curElement.attr('src', e.target.result);
            };

            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>
<script>
    $(document).ready(function () {

        $('#is_shipped').change(function () {
            $(this).closest("form").submit();
        });
    });
</script>
<style>
    .modal {
        transition: opacity 0.25s ease;
    }

    body.modal-active {
        overflow-x: hidden;
        overflow-y: visible !important;
    }

    /* Toggle A */
    input:checked ~ .dot {
        transform: translateX(100%);
        background-color: #48bb78;
    }

    /* Toggle B */
    input:checked ~ .dot {
        transform: translateX(100%);
        background-color: #48bb78;
    }
</style>
{{--<script src="/assets/vendor/jquery/dist/jquery.min.js"></script>--}}
{{--<script src="/assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>--}}
{{--<script src="/assets/vendor/popper.js/dist/umd/popper.min.js"></script>--}}
{{--<script src="/assets/vendor/bootstrap/bootstrap.min.js"></script>--}}
<script>
    $(document).ready(function () {
        $(window).load(function () {
            setTimeout(function () {
                $('#hideMeBack').fadeOut()
            }, 6000);
        });
    });
</script>
@yield('javascript')
<livewire:scripts/>
<script>
    window.livewire_app_url = '{{route('index', app()->getLocale())}}';
</script>
<script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
</body>
</html>
