@extends('backend.adminlayouts.master')

@section('body')
    <h3 class="text-gray-700 text-3xl font-medium">Categorie</h3>
    <div class="mt-10">
        <a href="{{route('categories.create', app()->getLocale())}}"
           class="btn px-6 py-2.5 bg-green-600 hover:bg-green-700 text-white font-medium text-xs leading-tight uppercase rounded shadow-md  hover:shadow-lg focus:bg-green-900  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out items-center">
            Nuova categoria
        </a>

    </div>

    <div class="flex flex-col mt-8">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div
                    class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                <table class="min-w-full">
                    <thead>
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Titolo
                        </th>

                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Relazioni
                        </th>
                        <th style="width: 180px"class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Azioni
                        </th>

                    </tr>
                    </thead>

                    <tbody class="bg-white">
                    @foreach ($categories as $category)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="flex items-center">

                                    <div
                                            class="text-sm leading-5 font-medium text-gray-900">   {{ $category->name }}</div>

                                </div>
                            </td>
                            @if($category->parentCategory)
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $category->name }}
                                    <strong>-></strong> {{ $category->parentCategory->name }}</td>
                            @else
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $category->name }}</td>
                            @endif

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 right text-right justify-content-end">
                                <a data-toggle="tooltip" data-placement="bottom"
                                   class="px-4 py-2.5 ml-2 bg-yellow-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-yellow-700 hover:shadow-lg focus:bg-yellow-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-800 active:shadow-lg transition duration-150 ease-in-out"
                                   title="Modifica"
                                   href="{{ route('categories.edit',['lang' => app()->getLocale(), $category->id]) }}"
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
                                                                <br><strong>{{ $category->name }}</strong> ?
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
                                                    <form
                                                            action="{{ route('categories.destroy' ,['lang' => app()->getLocale(), $category->id]) }}"
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
                                                        {{--                                        <button type="button"--}}
                                                        {{--                                                class="closeModal w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500  sm:ml-3 sm:w-auto  mt-3">--}}
                                                        {{--                                            {{__('product.no')}}--}}
                                                        {{--                                        </button>--}}
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
        </div>




@endsection
