@extends('backend.adminlayouts.master')

@section('body')

    <h3 class="text-gray-700 text-3xl font-medium">Prodotti</h3>
    {{--    <div class="divide-x-[3px]">--}}
    {{--        <hr style="border:1px solid #00000017; margin-top:20px;">--}}
    {{--    </div>--}}
    <div class="mt-10">
        <div class=" text-left">
            <a href="{{route('products.create', app()->getLocale())}}"
               class="btn px-6 py-2.5 bg-green-600 hover:bg-green-700 text-white font-medium text-xs leading-tight uppercase rounded shadow-md  hover:shadow-lg focus:bg-green-900  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out items-center">
                Nuovo prodotto
            </a>
        </div>

    </div>
    <div class="flex justify-start mt-8">
        <div class="mb-3 xl:w-5/12">
            <form id="mysearch"
                  action="{{route('searchProduct',app()->getLocale())}}"
                  method="POST" role="search">
                {{ csrf_field() }}
                <div class="input-group flex items-stretch relative w-full mb-4 inline-block">
                    <input type="search" name="o" id="search" required
                           class="form-control inline-block relative flex-auto min-w-0 w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                           placeholder="Cerca Prodotto" aria-label="Cerca Prodotto" aria-describedby="search">
                    <button
                            class="form-control inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out flex items-stretch"
                            type="submit" id="mysearch">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="w-4"
                             role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor"
                                  d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                        </svg>
                    </button>

                    <a class="btn flex inline-block ml-5 px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium text-xs leading-tight uppercase rounded shadow-md  hover:shadow-lg focus:bg-blue-900  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out flex items-center"
                       type="button" id="button-addon2"
                       href="{{route('products.index', app()->getLocale())}}">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path d="M16.76,7.51l-5.199-5.196c-0.234-0.239-0.633-0.066-0.633,0.261v2.534c-0.267-0.035-0.575-0.063-0.881-0.063c-3.813,0-6.915,3.042-6.915,6.783c0,2.516,1.394,4.729,3.729,5.924c0.367,0.189,0.71-0.266,0.451-0.572c-0.678-0.793-1.008-1.645-1.008-2.602c0-2.348,1.93-4.258,4.303-4.258c0.108,0,0.215,0.003,0.321,0.011v2.634c0,0.326,0.398,0.5,0.633,0.262l5.199-5.193C16.906,7.891,16.906,7.652,16.76,7.51 M11.672,12.068V9.995c0-0.185-0.137-0.341-0.318-0.367c-0.219-0.032-0.49-0.05-0.747-0.05c-2.78,0-5.046,2.241-5.046,5c0,0.557,0.099,1.092,0.292,1.602c-1.261-1.111-1.979-2.656-1.979-4.352c0-3.331,2.77-6.041,6.172-6.041c0.438,0,0.886,0.067,1.184,0.123c0.231,0.043,0.441-0.134,0.441-0.366V3.472l4.301,4.3L11.672,12.068z"></path>
                        </svg>
                        Ricarica</a>
                </div>
            </form>
        </div>
    </div>
    <livewire:admin-product></livewire:admin-product>

@endsection
