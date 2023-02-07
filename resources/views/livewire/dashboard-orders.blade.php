<div class="" id="orderarea">
    <div class="flex flex-col mt-4">
        <div class="align-middle overflow-x-auto shadow sm:rounded-lg mb-4">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                <tr>
                    <th wire:click.prevent="sortBy('order_number')" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        ID Ordine
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="{{ $sortColumnName === 'order_number' && $sortDirection === 'asc' ? 'black' : 'currentColor' }}" class="w-3 h-3 inline-block">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M8.25 6.75L12 3m0 0l3.75 3.75M12 3v18"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="{{ $sortColumnName === 'order_number' && $sortDirection === 'desc' ? 'black' : 'currentColor' }}" class="w-3 h-3 inline-block">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15.75 17.25L12 21m0 0l-3.75-3.75M12 21V3"/>
                        </svg>
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Dettagli Cliente
                    </th>
                    <th wire:click.prevent="sortBy('grand_total')" class="px-6 py-3 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Totale
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="{{ $sortColumnName === 'grand_total' && $sortDirection === 'asc' ? 'black' : 'currentColor' }}" class="w-3 h-3 inline-block">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M8.25 6.75L12 3m0 0l3.75 3.75M12 3v18"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="{{ $sortColumnName === 'grand_total' && $sortDirection === 'desc' ? 'black' : 'currentColor' }}" class="w-3 h-3 inline-block">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15.75 17.25L12 21m0 0l-3.75-3.75M12 21V3"/>
                        </svg>
                    </th>
                    <th wire:click.prevent="sortBy('is_shipped')" class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Stato
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="{{ $sortColumnName === 'is_shipped' && $sortDirection === 'asc' ? 'black' : 'currentColor' }}" class="w-3 h-3 inline-block">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M8.25 6.75L12 3m0 0l3.75 3.75M12 3v18"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="{{ $sortColumnName === 'is_shipped' && $sortDirection === 'desc' ? 'black' : 'currentColor' }}" class="w-3 h-3 inline-block">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15.75 17.25L12 21m0 0l-3.75-3.75M12 21V3"/>
                        </svg>
                    </th>
                    <th wire:click.prevent="sortBy('created_at')" class="px-6 py-3 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Data
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="{{ $sortColumnName === 'created_at' && $sortDirection === 'asc' ? 'black' : 'currentColor' }}" class="w-3 h-3 inline-block">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M8.25 6.75L12 3m0 0l3.75 3.75M12 3v18"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="{{ $sortColumnName === 'created_at' && $sortDirection === 'desc' ? 'black' : 'currentColor' }}" class="w-3 h-3 inline-block">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15.75 17.25L12 21m0 0l-3.75-3.75M12 21V3"/>
                        </svg>
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($orders as $order)
                    <tr class="bg-white">
                        <td class="px-6 py-4 text-left whitespace-nowrap text-sm text-gray-500">
                            <div class="flex items-center">
                                <a href="{{ route('adminOrders.show',['lang' => app()->getLocale(), $order->id]) }}"
                                   class="group inline-flex space-x-2 truncate text-sm">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10" src="/uploads/icon/order.svg"
                                             alt=""/>
                                    </div>
                                </a>
                                <a href="{{ route('adminOrders.show',['lang' => app()->getLocale(), $order->id]) }}"
                                   class="ml-3">


                                    <div class="text-sm leading-5 font-medium text-gray-900">
                                        # {{ $order->order_number }}</div>
                                </a>
                            </div>
                        </td>
                        <td class="max-width-100 px-6 py-4 pr-4 whitespace-nowrap text-sm text-gray-900">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10" src="/uploads/icon/avatar.svg" alt=""/>
                                </div>

                                <div class="ml-4">
                                    <div
                                            class="text-sm leading-5 font-medium text-gray-900">{{ $order->billing_name }}</div>
                                    <div class="text-sm leading-5 text-gray-500">{{ $order->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-right whitespace-nowrap text-sm text-gray-500">

                                    <span
                                            class="text-gray-900 font-medium">€ {{ price($order->grand_total)}} </span>
                        </td>
                        @if($order->status == 'completed')
                            <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500">
                                      <span
                                              class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 ">
                                        Completato
                                      </span>
                            </td>
                        @endif

                        @if($order->status == 'processing')
                            <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500">
                                      <span
                                              class="inline-flex px-2.5 py-0.5 items-center rounded-full text-xs font-medium bg-yellow-300 text-warning-800 ">
                                        In elaborazione
                                      </span>
                            </td>
                        @endif
                        @if($order->status == 'pending')
                            <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500">
                                      <span
                                              class="inline-flex px-2.5 py-0.5 items-center rounded-full text-xs font-medium bg-soft-warning text-red-800  ">
                                        In sospeso
                                      </span>
                            </td>
                        @endif
                        @if($order->status == 'decline')
                            <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500">
                                        <span
                                                class="inline-flex px-2.5 py-0.5 items-center rounded-full text-xs font-medium bg-red-800 text-white ">
                                        Annullato
                                      </span>
                            </td>
                        @endif
                        <td class="px-6 py-4 text-right whitespace-nowrap text-sm text-gray-500">
                            <time
                                    datetime="2020-07-11">{{ Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:s') }}</time>
                        </td>
                    </tr>
                @endforeach

                <!-- More transactions... -->
                </tbody>
            </table>
            <!-- Pagination -->

        </div>

        @if(isset($query))
            {{ $orders->links('vendor.pagination.tailwind') }}
        @else
            {{ $orders->links('vendor.pagination.tailwind') }}

        @endif
    </div>

</div>