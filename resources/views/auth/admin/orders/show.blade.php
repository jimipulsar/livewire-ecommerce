@extends('backend.adminlayouts.master')

@section('body')

    <div class="bg-gray-50">

        <main class="max-w-2xl mx-auto pt-8 pb-24 sm:pt-16 sm:px-6 lg:max-w-7xl lg:px-8">
            <div class="px-4 space-y-2 sm:px-0 sm:flex sm:items-baseline sm:justify-between sm:space-y-0">
                <div class="flex sm:items-baseline sm:space-x-4">
                    <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">Ordine
                        #{{$orderInfo->order_number}}</h1>
                </div>
                <p class="font-bold text-gray-600">DATA ORDINE
                    <time datetime="2021-03-22"
                          class="font-medium text-gray-600"> {{ Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }}</time>
                </p>
                <form action="{{ route('adminOrders.update', ['lang' => app()->getLocale(), $orderInfo->id]) }}"
                      method="POST" enctype="multipart/form-data">
                    @csrf
                    @if($orderInfo->status == 'pending' || $orderInfo->status == 'processing' || $orderInfo->status == 'completed')

                        @if ($orderInfo->is_shipped == '1')

                            <div class="flex justify-center mt-8" x-data="{ toggle: '0' }">
                                <h2 class="text-grey-500 font-weight-bold inline-block mr-3 ">Spedito</h2>
                                <div
                                        class="relative w-12 h-6 transition duration-200 ease-linear rounded-full"
                                        style="margin-top:-5px"
                                        :class="[toggle === '0' ? 'bg-green-400' : 'bg-gray-400']">
                                    <label for="is_shipped"
                                           class="absolute left-0 w-6  h-6 mb-2 transition duration-100 ease-linear transform bg-white border-2 rounded-full cursor-pointer"
                                           :class="[toggle === '0' ? 'translate-x-full border-green-400' : 'translate-x-0 border-gray-400']"></label>

                                    <input
                                            type="checkbox"
                                            id="is_shipped"
                                            name="is_shipped"
                                            class="w-full h-full appearance-none focus:outline-none"
                                            @click="toggle === '1' ? toggle = '1' : toggle = '0'"
                                            disabled="disabled"/>
                                </div>
                            </div>
                        @else
                            <div class="flex justify-center mt-8" x-data="{ toggle: '0' }">
                                <h2 class="text-grey-500 font-weight-bold inline-block mr-3 ">Spedito</h2>

                                <div
                                        class="relative w-12 h-6 transition duration-200 ease-linear rounded-full"
                                        style="margin-top:-5px"
                                        :class="[toggle === '1' ? 'bg-green-400' : 'bg-gray-400']">
                                    <label for="is_shipped"
                                           class="absolute left-0 w-6  h-6 mb-2 transition duration-100 ease-linear transform bg-white border-2 rounded-full cursor-pointer"
                                           :class="[toggle === '1' ? 'translate-x-full border-green-400' : 'translate-x-0 border-gray-400']"></label>
                                    <input
                                            type="checkbox"
                                            id="is_shipped"
                                            name="is_shipped"
                                            class="w-full h-full appearance-none focus:outline-none"
                                            @click="toggle === '0' ? toggle = '1' : toggle = '0'"
                                    />
                                </div>
                            </div>
                        @endif

                    @else
                        <h2 class="text-red-500 font-weight-bold">ORDINE ANNULLATO</h2>
                    @endif
                </form>
            </div>

            <!-- Products -->
            <section aria-labelledby="products-heading" class="mt-6">
                <h2 id="products-heading" class="sr-only">Products purchased</h2>

                <div class="space-y-8">
                    <div class="bg-white border-t border-b border-gray-200 shadow-sm sm:border sm:rounded-lg">
                        @foreach($orderInfo->orderItem as $item)

                            <div class="py-1 px-1 sm:px-1 lg:grid lg:grid-cols-12 lg:gap-x-8 lg:p-8">

                                <div class="sm:flex lg:col-span-7 pl-10 pt-4">

                                    <div
                                            class="flex-shrink-0 w-full aspect-w-1 aspect-h-1 rounded-lg sm:aspect-none sm:w-40 ">
                                        <img src="{{'/storage/images/' . $item->product->img_01}}"
                                             class="img-slider">
                                    </div>

                                    <div class="mt-6 pt-2 sm:mt-0 sm:ml-6">

                                        <h3 class="text-base font-medium text-indigo-600 ">
                                            <a href="{{ route('shop.show',[app()->getLocale(), $item->product->id,$item->product->slug]) }}"
                                               target="_blank">
                                                {{ $item->product->item_name}}
                                            </a>
                                        </h3>
                                        <p class="mt-2 text-sm font-medium text-gray-900">
                                            € {{ price($item->price) }}
                                        </p>
                                        <p class="mt-2 text-sm font-medium text-gray-900">
                                            Quantità: {{ $item->quantity}}
                                        </p>
                                        <p class="mt-3 text-sm font-medium  text-gray-500">
                                            Codice articolo: {{ $item->product->item_code}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                        @if($orderInfo->status == 'pending' || $orderInfo->status == 'processing' || $orderInfo->status == 'completed')
                            <div class="border-t border-gray-200 py-6 px-4 sm:px-6 lg:p-8">
                                <h4 class="sr-only">Status</h4>
                                @if ($orderInfo->is_shipped == '1')
                                    <p class="text-sm font-medium text-gray-900">Spedizione partita

                                    </p>
                                @else
                                    <p class="text-sm font-medium text-gray-900">Preparazione alla spedizione del
                                        <time
                                                datetime="2021-03-24">{{ Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }}</time>
                                    </p>
                                @endif
                                <div class="mt-6" aria-hidden="true">
                                    <div class="bg-gray-200 rounded-full overflow-hidden">
                                        @if ($orderInfo->is_shipped == '1')
                                            <div class="h-2 bg-indigo-600 rounded-full"
                                                 style="width: calc((1 * 1 + 0.9) / 3 * 100%);"></div>
                                        @else
                                            <div class="h-2 bg-indigo-600 rounded-full"
                                                 style="width: calc((1 * 2 + 1) / 8 * 100%);"></div>
                                        @endif
                                    </div>
                                    <div class="hidden sm:grid grid-cols-4 text-sm font-medium text-gray-600 mt-6">
                                        <div class="text-indigo-600">Ordine effettuato</div>
                                        <div class="text-center text-indigo-600">In elaborazione</div>
                                        <div class="text-center">Spedito</div>
                                        <div class="text-right">Consegnato</div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- More products... -->
                </div>
            </section>

            <!-- Billing -->
            <section aria-labelledby="summary-heading" class="mt-16">
                <div
                        class="bg-gray-100 py-6 px-4 sm:px-6 sm:rounded-lg lg:px-8 lg:py-8 lg:grid lg:grid-cols-12 lg:gap-x-8">
                    <dl class="grid grid-cols-2 gap-6 text-sm sm:grid-cols-2 md:gap-x-8 lg:col-span-7">
                        <div>
                            <dt class="font-medium text-gray-900">Indirizzo di spedizione</dt>
                            <dd class="mt-3 mb-3 text-gray-500">
                                @if($orderInfo->shipping_company)
                                    <span class="block"><strong>Ragione sociale: </strong> {{$orderInfo->shipping_company}}</span>

                                @endif
                                <span
                                        class="block"><strong>Nome: </strong> {{$orderInfo->shipping_name}} {{$orderInfo->shipping_surname}}</span>
                                <span class="block"><strong>Indirizzo: </strong>{{$orderInfo->shipping_address}}</span>
                                <span class="block">{{$orderInfo->shipping_zipcode}} {{$orderInfo->shipping_city}} ({{$orderInfo->shipping_province}})</span>
                                <span class="block"><strong>Telefono: </strong>{{$orderInfo->shipping_phone}}</span>
                            </dd>
                            <dt class="font-medium text-gray-900">Indirizzo di fatturazione</dt>
                            <dd class="mt-3 text-gray-500">
                                @if($orderInfo->billing_company)
                                    <span class="block"><strong>Ragione sociale: </strong> {{$orderInfo->billing_company}}</span>
                                    <span class="block"><strong>P.IVA: </strong> {{$orderInfo->billing_vat}}</span>
                                @endif
                                <span
                                        class="block"><strong>Nome: </strong> {{$orderInfo->billing_name}} {{$orderInfo->billing_surname}}</span>
                                <span class="block"><strong>Indirizzo: </strong>{{$orderInfo->billing_address}}</span>
                                <span class="block">{{$orderInfo->billing_zipcode}} {{$orderInfo->billing_city}} ({{$orderInfo->billing_province}})</span>
                                <span class="block"><strong>Telefono: </strong>{{$orderInfo->billing_phone}}</span>
                            </dd>
                            @if($orderInfo->notes)
                                <dd class="mt-4 text-gray-500">
                                    <span class="block"><strong>Note: </strong> {{$orderInfo->notes}}</span>
                                </dd>
                            @endif
                        </div>

                        <div>
                            <td class="font-medium text-gray-900">Informazioni Pagamento</td>
                            @if($orderInfo->status == 'pending' || $orderInfo->status == 'processing' || $orderInfo->status == 'completed')
                                <div class="mt-3">
                                    @if($orderInfo->payment_method === 'paypal' && $orderInfo->is_paid === 1)
                                        <dd class="-ml-4 ">
                                            <div class="ml-3 mt-0 flex-shrink-0">
                                                <td class="hidden px-6 py-4 whitespace-nowrap text-sm text-gray-500 md:block">
                                              <span
                                                      class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 ">
                                                Pagamento ricevuto
                                              </span>
                                                </td>
                                            </div>
                                            <div class="ml-3 mt-3">
                                                <h5 class="mb-2"><strong>Metodo di pagamento:</strong></h5>
                                                <img src="/uploads/icon/paypal.png" style="height:50px">

                                            </div>
                                        </dd>
                                    @endif
                                    @if($orderInfo->payment_method === 'card' && $orderInfo->is_paid === 1)
                                        <dd class="-ml-4 ">
                                            <div class="ml-3 mt-0 flex-shrink-0">
                                                <td class="hidden px-6 py-4 whitespace-nowrap text-sm text-gray-500 md:block">
                                              <span
                                                      class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 ">
                                                Pagamento ricevuto
                                              </span>
                                                </td>
                                            </div>
                                            <div class="ml-3 mt-3">
                                                <h5 class="mb-2"><strong>Metodo di pagamento:</strong></h5>
                                                <img src="/uploads/icon/stripe.png" style="height:60px">

                                            </div>
                                        </dd>
                                    @endif
                                    @if($orderInfo->payment_method === 'wire transfer' && $orderInfo->is_paid === 1)
                                        <dd class="-ml-4 ">
                                            <div class="ml-3 mt-0 ">
                                              <span
                                                      class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 ">
                                                Pagamento ricevuto
                                              </span>
                                            </div>
                                            <div class="ml-3 mt-3">
                                                <h5 class="mb-2"><strong>Metodo di pagamento:</strong></h5>
                                                <img src="/uploads/icon/bonifico.png" style="height:70px">

                                            </div>
                                        </dd>
                                    @endif
                                    @if($orderInfo->payment_method === 'paypal' && $orderInfo->is_paid === 0)
                                        <dd class="-ml-4 ">
                                            <div class="ml-3 mt-0 flex-shrink-0">
                                                <td class="hidden px-6 py-4 whitespace-nowrap text-sm text-orange-500 md:block">
                                              <span
                                                      class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-300 text-warning-800 ">
                                                In attesa di pagamento
                                              </span>
                                                </td>
                                                <br>
                                            </div>
                                            <div class="ml-3 mt-3">
                                                <h5 class="mb-2"><strong>Metodo di pagamento:</strong></h5>
                                                <img src="/uploads/icon/paypal.png" style="height:50px">

                                            </div>
                                        </dd>
                                    @endif
                                    @if($orderInfo->payment_method === 'wire transfer' && $orderInfo->is_paid === 0)
                                        <dd class="-ml-4 ">
                                            <div class="ml-3 mt-0 flex-shrink-0">
                                                <td class="hidden px-6 py-4 whitespace-nowrap text-sm text-orange-500 md:block">
                                              <span
                                                      class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-300 text-warning-800 ">
                                                In attesa di pagamento
                                              </span>
                                                </td>
                                                <br>
                                            </div>
                                            <div class="ml-3 mt-3">
                                                <h5 class="mb-2"><strong>Metodo di pagamento:</strong></h5>
                                                <img src="/uploads/icon/bonifico.png" style="height:70px">

                                            </div>
                                        </dd>
                                    @endif
                                </div>
                            @else
                                <div class="mt-3">
                                    <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 ">
                                        Ordine annullato
                                    </span>
                                </div>
                            @endif
                        </div>
                    </dl>

                    <dl class="mt-8 divide-y divide-gray-200 text-sm lg:mt-0 lg:col-span-5">

                        <div class="py-4 flex items-center justify-between">
                            <dt class="text-gray-600">Spedizione<br> <span
                                        class="font-weight-light pt-3">Corriere: Poste Italiane</span></dt>
                            <dd class="font-medium text-gray-900"><br> + € {{ price(7.00) }}</dd>
                        </div>
                        @if($orderInfo->discount)
                            <div class="py-4 flex items-center justify-between">
                                <dt class="text-gray-600">Coupon</dt>
                                <dd class="font-medium text-gray-900"><br>- € {{ price($orderInfo->discount) }}</dd>
                            </div>
                        @endif
                        <div class="pt-4 flex items-center justify-between">
                            <dt class="font-medium text-gray-900">Totale Ordine IVA INCLUSA</dt>
                            <dd class="font-medium text-indigo-600">
                                € {{ price($orderInfo->grand_total) }}</dd>
                        </div>
                    </dl>
                </div>
            </section>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 pb-10 mt-8 " style="display:flex !important;">
                <a href="{{url()->previous()}}"
                   class="btn px-6 py-2.5 bg-green-600 hover:bg-green-700 text-white font-medium text-xs leading-tight uppercase rounded shadow-md  hover:shadow-lg focus:bg-green-900  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out items-center">
                    Torna indietro
                </a>
                    @if($orderInfo->status == 'pending' || $orderInfo->status == 'processing' || $orderInfo->status == 'completed')

                        <div
                                x-data="{ 'showModal': false }"
                                @keydown.escape="showModal = false"
                        >
                            <!-- Trigger for Modal -->
                            <button type="button" @click="showModal = true"
                                    class="ml-7 btn px-6 py-2.5 bg-blue-700 hover:bg-blue-900 text-white font-medium text-xs leading-tight uppercase rounded shadow-md  hover:shadow-lg focus:bg-blue-900  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out items-center">{{__('product.cancel')}}</button>

                            <!-- Modal -->
                            <div
                                    class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-50"
                                    x-show="showModal"
                            >
                                <!-- Modal inner -->
                                <div
                                        class="max-w-2xl px-6 py-6 mx-auto text-left rounded"
                                        @click.away="showModal = false"
                                        x-transition:enter="motion-safe:ease-out duration-300"
                                        x-transition:enter-start="opacity-0 scale-90"
                                        x-transition:enter-end="opacity-100 scale-100"
                                >
                                    <!-- Title / Close-->
                                    <div class="flex items-center justify-between">
                                        <h5 class="mr-3 text-black max-w-none">Title</h5>

                                        <button type="button" class="z-50 cursor-pointer" @click="showModal = false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
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
                                                        {{__('product.alertQuestion')}}
                                                    </h3>
                                                    <div class="mt-2">
                                                        <p class="text-sm text-gray-500">
                                                            {{__('product.alertSentence')}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-gray-50 px-4 py-5 sm:px-6 sm:flex sm:flex-row-reverse">
                                            <form
                                                    action="{{route('cancelOrder', ['lang' => app()->getLocale(), $order->id])}}"
                                                    method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <button type="submit" data-toggle="modal" data-target="#my-modal"
                                                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto  mt-3">
                                                    {{__('product.yes')}}
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
                    @endif

            </div>

        </main>
    </div>

@endsection
