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
    <livewire:admin-product></livewire:admin-product>

@endsection

