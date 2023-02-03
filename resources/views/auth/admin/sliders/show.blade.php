@extends('backend.adminlayouts.master')

@section('body')

    <div class="container lst mb-5">
        <h3 class="text-gray-700 text-3xl font-medium">Slide #{{$slider->id}}</h3>

        <br>
            @csrf
            @method('PUT')
            <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
                    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                        <div
                            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            @if(isset($slider->cover))
                                <div class="mt-1 sm:mt-0 sm:col-span-3">
                                    <div
                                        class="max-w-lg flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md mx-auto md-auto">
                                        <div class="space-y-1 text-center ">
                                            <img src="/uploads/sliders/{{$slider->cover}}" alt="slide">

                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-5">
                <div class="flex justify-end">
                    <a href="{{url()->previous()}}">
                        <button type="button"
                                class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Torna indietro
                        </button>
                    </a>
                </div>
            </div>

    </div>
@endsection
