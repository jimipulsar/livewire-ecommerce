@extends('backend.adminlayouts.master')

@section('body')
    <div class="mt-3 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                        Spedizione: {{$zip->city.','.$zip->state}}</h3>

                </div>
            </div>
            <div class="mt-1 md:mt-0 md:col-span-2">
                <form action="#" method="POST">
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-2 bg-white space-y-6 sm:p-6 pl-5">
                            <fieldset>
                                <div class="mt-1 space-y-2">
                                    @foreach($couriers as $courier)
                                        <div class="flex items-start">
                                            <div class="flex items-center ">

                                                <input id="comments" name="comments" type="checkbox"
                                                       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">

                                                <div class="ml-3 text-sm mt-3 ">
                                                    <img class="img-fluid bg-white"

                                                         src="{{$courier->logo}}" alt="Logo Corriere" >
                                                </div>
                                                <div class="ml-3 pt-3 text-sm">
                                                    <p class="text-gray-500"><span class="blog-date"><i
                                                                class="fa fa-truck"
                                                                aria-hidden="true"></i> {{$courier->name}}</span></p>
                                                    <p class="mb-0">
                                                    <p class="text-gray-500">
                                                        <i class="fa fa-clock-o"
                                                           aria-hidden="true"></i> {{ucfirst(now()->addHours($courier->transit_hours)->diffForHumans())}}
                                                    </p>
                                                    <p class="text-gray-500">
                                                        {{price($courier->base_price)}}</p>
                                                </div>
                                            </div>

                                        </div>
                                    @endforeach
                                </div>
                            </fieldset>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <a href="{{url()->previous()}}">
                                <button type="button"
                                        class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Torna indietro
                                </button>
                            </a>
                            <button type="submit"
                                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-900 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Salva impostazioni
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="py-4 flex items-center justify-between ">
    {{--                            <dt class="text-gray-600">Calcola spese di spedizione</dt>--}}
    {{--                            <dd class="font-medium text-gray-900">--}}


    {{--                                <p class="text-right">Inserisci la destinazione per avere un preventivo delle spese.</p>--}}
    {{--                                <form data-fsl method="post"--}}
    {{--                                      action="{{route('calculate.shipping.view',['lang' => app()->getLocale(), $orderInfo->id])}}"--}}
    {{--                                      class="tax-select-wrapper">--}}
    {{--                                    @csrf--}}

    {{--                                    <div class="notranslate js-form-message mb-6 mt-3 text-right">--}}
    {{--                                        <label class="notranslate form-label text-right">* Codice postale</label>--}}
    {{--                                        <input class="form-control w-22 h-22 border-3 rounded-b-lg p-2 shadow-none"--}}
    {{--                                               required name="shipping_zipcode"--}}
    {{--                                               type="number" value=""/>--}}

    {{--                                        <button--}}
    {{--                                            class="bg-gray-200 py-2 mt-3 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"--}}
    {{--                                            type="submit">Calcola spedizione</button>--}}
    {{--                                    </div>--}}
    {{--                                </form>--}}


    {{--                            </dd>--}}

    {{--                        </div>--}}
@endsection
