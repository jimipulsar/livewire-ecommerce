@extends('backend.adminlayouts.master')

@section('body')
    <h3 class="text-gray-700 text-3xl font-medium">Iscritti alla newsletter</h3>

    <div class="flex flex-col mt-8">
        <div class="my-2 pb-4 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div
                class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                <table class="min-w-full">
                    <thead>
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Email
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Data Registrazione
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Azioni
                        </th>
                    </tr>
                    </thead>

                    <tbody class="bg-white">
                    @forelse ($subscribers as $subscribe)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="text-sm leading-5 text-gray-900">{{ $subscribe->emailSubscription }}</div>
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="text-sm leading-5 text-gray-900">{{ Carbon\Carbon::parse($subscribe->created_at)->format('d/m/Y H:s') }}</div>
                            </td>
                            <td class="whitespace-no-wrap border-b border-gray-200 text-center">

                                <div
                                    x-data="{ 'showModal': false }"
                                    @keydown.escape="showModal = false" id="btRight">
                                    <button type="button" @click="showModal = true" title="Elimina"
                                            class="px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lgfocus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0active:bg-red-800 active:shadow-lgtransition duration-150 ease-in-out mr-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="fas fa-trash-alt"></i></button>
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
                                                            Sei sicuro di voler eliminare l'iscritto associato a:
                                                            <br><strong>{{ $subscribe->emailSubscription }}</strong> ?
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
                                                    action="{{ route('subscribers.destroy' ,[ 'lang'=>app()->getLocale(), $subscribe->id]) }}"
                                                    method="post">

                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" data-toggle="modal"
                                                            data-target="#my-modal"
                                                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto  mt-3">
                                                        Si, voglio eliminare definitivamente
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
                            </td>
                        </tr>
                    @empty
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="bg-white">

                                <td class="max-w-0 w-full px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <div class="flex ">
                                        <!-- Heroicon name: solid/cash -->
                                        <p class="text-gray-500  font-size-24 truncate group-hover:text-gray-900">
                                            Nessuna iscrizione effettuata </p>

                                    </div>
                                </td>
                            </tr>
                            <!-- More transactions... -->
                            </tbody>
                        </table>
                    @endforelse

                    </tbody>

                </table>


            </div>

        </div>

        {{ $subscribers->links('vendor.pagination.tailwind') }}


    </div>

@endsection
