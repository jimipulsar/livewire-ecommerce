@extends('backend.adminlayouts.master')

@section('body')

    <h3 class="text-gray-700 text-3xl font-medium">Marchi</h3>
    {{--    <div class="divide-x-[3px]">--}}
    {{--        <hr style="border:1px solid #00000017; margin-top:20px;">--}}
    {{--    </div>--}}
    <div class="mt-10">
        <div class=" text-left">
            <a href="{{route('brands.create', app()->getLocale())}}"
               class="btn px-6 py-2.5 bg-green-600 hover:bg-green-700 text-white font-medium text-xs leading-tight uppercase rounded shadow-md  hover:shadow-lg focus:bg-green-900  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out items-center">
                Nuovo marchio
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
                           placeholder="Cerca Marchio" aria-label="Cerca Marchio" aria-describedby="search">
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
                       href="{{route('brands.index', app()->getLocale())}}">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path
                                    d="M16.76,7.51l-5.199-5.196c-0.234-0.239-0.633-0.066-0.633,0.261v2.534c-0.267-0.035-0.575-0.063-0.881-0.063c-3.813,0-6.915,3.042-6.915,6.783c0,2.516,1.394,4.729,3.729,5.924c0.367,0.189,0.71-0.266,0.451-0.572c-0.678-0.793-1.008-1.645-1.008-2.602c0-2.348,1.93-4.258,4.303-4.258c0.108,0,0.215,0.003,0.321,0.011v2.634c0,0.326,0.398,0.5,0.633,0.262l5.199-5.193C16.906,7.891,16.906,7.652,16.76,7.51 M11.672,12.068V9.995c0-0.185-0.137-0.341-0.318-0.367c-0.219-0.032-0.49-0.05-0.747-0.05c-2.78,0-5.046,2.241-5.046,5c0,0.557,0.099,1.092,0.292,1.602c-1.261-1.111-1.979-2.656-1.979-4.352c0-3.331,2.77-6.041,6.172-6.041c0.438,0,0.886,0.067,1.184,0.123c0.231,0.043,0.441-0.134,0.441-0.366V3.472l4.301,4.3L11.672,12.068z"></path>
                        </svg>
                        Ricarica</a>
                </div>
            </form>
        </div>
    </div>
    <div class="flex flex-col mt-3">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div
                    class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                <table class="min-w-full">
                    <thead>
                    <tr>
                        <th style="width:100px"
                            class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Immagine
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Nome
                        </th>
                        <th style="width:350px"
                            class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Azioni
                        </th>
                    </tr>
                    </thead>

                    <tbody class="bg-white">
                    @foreach ($brands as $brand)
                        <tr>
                            @if(file_exists(public_path('storage/images/' .$brand->cover )) && $brand->cover != null)
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="flex items-center">

                                        <img src="{{ '/storage/images/' . $brand->cover }}"
                                             class="img-backend-products">

                                    </div>
                                </td>
                            @else
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="flex items-center">

                                        <img src="{{'/uploads/default/default.jpg' }}"
                                             class="img-backend-products"
                                             alt="{{Str::of('/uploads/default/default.jpg')->basename('.jpg')}}">

                                    </div>
                                </td>

                            @endif
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div
                                        class="leading-5 text-gray-900 ">{{ $brand->name }}</div>

                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-end justify-content-end right">
                                <a class="px-4 py-2.5 ml-2 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out"
                                   href="{{ route('brands.duplicate',[ 'lang'=>app()->getLocale(),$brand->id]) }}"
                                   data-toggle="tooltip" data-placement="bottom" title="Duplica" id="btLeft"><i
                                            class="far fa-copy"></i></a>

                                <a data-toggle="tooltip" data-placement="bottom"
                                   class="px-4 py-2.5 ml-2 bg-yellow-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-yellow-700 hover:shadow-lg focus:bg-yellow-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-800 active:shadow-lg transition duration-150 ease-in-out"
                                   title="Modifica"
                                   href="{{ route('brands.edit',['lang' => app()->getLocale(), $brand->id]) }}"
                                   id="btLeft"><i
                                            class="fas fa-edit" title="Modifica"></i></a>
                                <div
                                        x-data="{ 'showModal': false }"
                                        @keydown.escape="showModal = false" id="btLeft">
                                    <button type="button" @click="showModal = true" title="Elimina"
                                            class="px-4 py-2.5 ml-2 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lgfocus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0active:bg-red-800 active:shadow-lgtransition duration-150 ease-in-out mr-4">
                                        <i class="fas fa-trash-alt"></i></button>
                                    <!-- Trigger for Modal -->

                                    <!-- Modal -->
                                    <div
                                            class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-50"
                                            x-show="showModal"
                                    >
                                        <!-- Modal inner -->
                                        <div
                                                class="max-w-6xl px-6 py-6 mx-auto text-left rounded"
                                                @click.away="showModal = false"
                                                x-transition:enter="motion-safe:ease-out duration-300"
                                                x-transition:enter-start="opacity-0 scale-90"
                                                x-transition:enter-end="opacity-100 scale-100"
                                        >
                                            <!-- Title / Close-->
                                            <div class="flex items-center justify-between">
                                                <h5 class="mr-3 text-black max-w-none">Title</h5>

                                                <button type="button" class="z-50 cursor-pointer"
                                                        @click="showModal = false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              stroke-width="2"
                                                              d="M6 18L18 6M6 6l12 12"/>
                                                    </svg>
                                                </button>
                                            </div>

                                            <!-- content -->
                                            <div
                                                    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                                <div class="bg-white px-4 pt-5 pb-4 py-5 sm:p-6 sm:pb-4">
                                                    <div class="md:flex sm:items-start py-3">
                                                        <div
                                                                class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                                            <svg @click="toggleModal" class="h-6 w-6 text-red-600"
                                                                 xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                 viewBox="0 0 24 24"
                                                                 stroke="currentColor" aria-hidden="true">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                      stroke-width="2"
                                                                      d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                                            </svg>
                                                        </div>
                                                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                            <h3 class="text-lg leading-6 font-medium text-gray-900"
                                                                id="modal-title">
                                                                {{__('product.alertProduct')}}
                                                                <br><strong>{{ $brand->name }}</strong> ?
                                                            </h3>
                                                            <div class="mt-2">
                                                                <p class="text-sm text-gray-500">
                                                                    {{__('product.alertSentenceProduct')}}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="bg-gray-50 px-4 pb-7 sm:px-6 sm:flex sm:flex-row-reverse">
                                                    <form action="{{ route('brands.destroy' ,['lang' => app()->getLocale(), $brand->id]) }}"
                                                          method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" data-toggle="modal"
                                                                data-target="#my-modal"
                                                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto  mt-3">
                                                            {{__('product.yesProduct')}}
                                                        </button>
                                                    </form>
                                                    <div class="flex items-center justify-between">


                                                        <button type="button" class="z-50 cursor-pointer"
                                                                @click="showModal = false">
                                                            <h5 class="w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500  sm:ml-3 sm:w-auto  mt-3">  {{__('product.no')}}</h5>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>


                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-5 mb-5">
                {{ $brands->links('vendor.pagination.tailwind') }}

            </div>
        </div>
    </div>
@endsection
