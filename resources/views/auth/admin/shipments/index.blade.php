@extends('backend.adminlayouts.master')

@section('body')
    <h3 class="text-gray-700 text-3xl font-medium">Spedizioni</h3>

    <div class="mt-4">

        <div class="mt-6">
            <div class="bg-white shadow rounded-md overflow-hidden my-6">
                <table class="text-left w-full border-collapse">
                    <thead class="border-b">
                    <tr>
                        <th class="py-3 px-5 bg-blue-900 font-medium uppercase text-sm text-gray-100  text-center">Logo Corriere
                        </th>
                        <th class="py-3 px-5 bg-blue-900 font-medium uppercase text-sm text-gray-100 text-center">
                            Destinazione
                        </th>
                        <th class="py-3 px-5 bg-blue-900 font-medium uppercase text-sm text-gray-100 text-center">
                            Contenuto
                        </th>
                        <th class="py-3 px-5 bg-blue-900 font-medium uppercase text-sm text-gray-100 text-center">Data
                            partenza
                        </th>
                        <th class="py-3 px-5 bg-blue-900 font-medium uppercase text-sm text-gray-100 text-center">Stato
                        </th>
                    </tr>
                    </thead>
                    <tbody>

                    @forelse($data as $ship)
                        <tr>
                            <td class="py-4 px-6 border-b text-gray-700 text-lg text-center">
                                <img class="img-fluid bg-white justify-content-center mx-auto"
                                     src="{{'https://cdn.packlink.com/apps/carrier-logos/' . Str::slug(strtolower($ship->carrier)) . '.'. 'svg'}}"
                                     alt="Logo Corriere" style="height:70px">
                            </td>
                            <td class="py-4 px-6 border-b text-gray-500">
                                <h3 class="font-size-18 mb-3 text-center "><span
                                        class="blog-date"> {{$ship->delivery['city'].', '.$ship->delivery['country']}}</span></h3></td>
                            <td class="py-4 px-6 border-b text-gray-500">
                                <h3 class="font-size-18 mb-3 text-center"><span
                                        class="blog-date"></i> {{$ship->content}}</span></h3></td>
                            <td class="py-4 px-6 border-b text-gray-500">
                                <h3 class="font-size-18 mb-3 text-center"></i>{{ Carbon\Carbon::parse($ship->orderDate)->format('d/m/Y') }}</h3>
                            </td>
                            @if($ship->status == 'COMPLETED')
                                <td class="py-4 px-6 border-b text-gray-500 text-center">
                                      <span
                                          class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 ">
                                        Completato
                                      </span>
                                </td>
                            @endif

                            @if($ship->status == 'READY_TO_PURCHASE')
                                <td class="py-4 px-6 border-b text-gray-500 text-center">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 ">
                                        Pronto per l'acquisto
                                      </span>
                                </td>
                            @endif
                            @if($ship->status == 'AWAITING_COMPLETION')
                                <td class="py-4 px-6 border-b text-gray-500 text-center">
                                     <span
                                         class="inline-flex px-2.5 py-0.5 items-center rounded-full text-xs font-medium bg-yellow-300 text-warning-800 ">
                                        In elaborazione
                                      </span>
                                </td>
                            @endif
                            @if($ship->status == 'decline')
                                <td class="py-4 px-6 border-b text-gray-500 text-center">
                                        <span
                                            class="inline-flex px-2.5 py-0.5 items-center rounded-full text-xs font-medium bg-red-800 text-white ">
                                        Annullato
                                      </span>
                                </td>
                            @endif

                        </tr>
                        @empty
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="bg-white">

                                <td class="max-w-0 w-full px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <div class="flex ">
                                        <!-- Heroicon name: solid/cash -->
                                        <p class="text-gray-500  font-size-24 truncate group-hover:text-gray-900">
                                            Nessuna spedizione inviata </p>

                                    </div>
                                </td>
                            </tr>
                            <!-- More transactions... -->
                            </tbody>
                        </table>
                        <!-- Pagination -->
                    @endforelse
                    </tbody>

                </table>

            </div>
            {{ $data->links('vendor.pagination.tailwind') }}
        </div>
    </div>

@endsection
