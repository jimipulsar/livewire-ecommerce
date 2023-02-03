@extends('backend.adminlayouts.master')

@section('body')
    <h3 class="text-gray-700 text-3xl font-medium">Modifica Prodotto</h3>
    <div class="md:grid md:grid-cols-3 md:gap-6 mt-10 mb-10">
        <div class="mt-5 md:mt-0 md:col-span-6">
            <form action="{{ route('products.update',['lang' => app()->getLocale(), $product->id]) }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-2 sm:col-span-2">
                                <label for="item_name"
                                       class="block my-2 text-sm font-medium text-gray-700">Nome Articolo</label>
                                <input type="text" name="item_name" id="item_name"
                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                       value="{{$product->item_name}}">
                            </div>

                            <div class="col-span-2 sm:col-span-2">
                                <label for="item_code" class="block my-2 text-sm font-medium text-gray-700">Codice
                                    Articolo</label>
                                <input type="text" name="item_code" id="item_code"
                                       autocomplete="item_code"
                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                       value="{{$product->item_code}}">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="shippable" class="block my-2 text-sm font-medium text-gray-700">Acquistabile</label>
                                <div class="mt-4">

                                    <input type="radio" class="form-radio" name="shippable" id="shippable"
                                           value="1" {{$product->shippable == '1' ? 'checked' : ''}}>
                                    <span class="ml-2" style="margin-left:6px;margin-right:10px;">Si</span>
                                    <input type="radio" class="form-radio" name="shippable" id="shippable"
                                           value="0" {{$product->shippable == '0' ? 'checked' : ''}}>
                                    <span class="mr-2 ml-2" style="margin-left:6px; ">No</span>

                                </div>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="published" class="block my-2 text-sm font-medium text-gray-700">Pubblicato</label>
                                <div class="mt-4">

                                    <input type="radio" class="form-radio" name="published" id="published"
                                           value="1" {{$product->published == '1' ? 'checked' : ''}}>
                                    <span class="ml-2" style="margin-left:6px;margin-right:10px;">Si</span>
                                    <input type="radio" class="form-radio" name="published" id="published"
                                           value="0" {{$product->published == '0' ? 'checked' : ''}}>
                                    <span class="mr-2 ml-2" style="margin-left:6px; ">No</span>

                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-6 gap-6 py-3">
                            <div class="col-span-4 sm:col-span-2">
                                <label for="categories[]"
                                       class="block my-2 text-sm font-medium text-gray-700">Categoria</label>

                                <select
                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        name="categories[]" id="categories" autocomplete="categories">
                                    <option disabled selected value> -- Seleziona</option>

                                    @foreach ($mainCategory as $cat)
                                        <option value="{{$cat->id }}"
                                                @if($product->categories->contains($cat->id)) selected @endif>  {{ $cat->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('categories'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('categories') }}
                                    </div>
                                @endif

                            </div>

                            <div class="col-span-2 sm:col-span-2">
                                <label for="categories[]"
                                       class="block my-2 text-sm font-medium text-gray-700">Sottocategoria</label>

                                <select
                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        name="categories[]" id="categories" autocomplete="categories">
                                    <option disabled value> -- Seleziona --</option>

                                    @foreach ($subCategories as $category)
                                        <option value="{{$category->id }}"
                                                @if($product->categories->contains($category->id)) selected @endif>  {{ $category->name }}</option>

                                    @endforeach
                                </select>
                                @if($errors->has('categories'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('categories') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-span-2 sm:col-span-2">

                                <label for="stock_qty"
                                       class="block my-2 text-sm font-medium text-gray-700">Quantità</label>
                                <input type="number" name="stock_qty" id="stock_qty"
                                       autocomplete="street-address" value="{{$product->stock_qty}}"
                                       class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>

                        </div>
                        <div class="grid grid-cols-6 gap-6 py-3">
                            <div class="col-span-6 sm:col-span-6">
                                <div class="col-span-6 sm:col-span-6">
                                    <label for="link"
                                           class="block my-2 text-sm font-medium text-gray-700">Link</label>
                                    <input type="text" name="link" id="link"
                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                           value="{{$product->link}}">
                                </div>
                                <div class="col-span-6 sm:col-span-6">
                                    <label for="link_2"
                                           class="block my-2 text-sm font-medium text-gray-700">Link #2</label>
                                    <input type="text" name="link_2" id="link_2"
                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                           value="{{$product->link_2}}">
                                </div>

                            </div>
                        </div>
                        <div class="grid grid-cols-6 gap-6 py-3">
                            <div class="col-span-4 sm:col-span-4">
                                <label class="block my-2 text-md py-2 font-medium text-gray-700">
                                    Allegato
                                </label>

                                <div
                                        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                    <div class="space-y-1 text-center">
                                        <div class="flex text-md py-2 pl-3 text-gray-600">

                                            <label for="attachment"
                                                   class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">

                                                <input type="file" name="attachment"
                                                       class="@error('attachment') is-invalid @enderror"
                                                       value="{{ $product->attachment }}">


                                            </label>

                                        </div>
                                        <p class="text-xs text-gray-500">
                                            <span>      {{ $product->attachment }}</span>
                                        </p>
                                        {{--                                            <p class="text-xs text-gray-500">--}}
                                        {{--                                                ppt,pptx,doc,docx,pdf,xls,xlsx fino a 10 MB--}}
                                        {{--                                            </p>--}}
                                        @error('attachment')
                                        <div class="text-sm text-red-700"> * {{ $message }}</div>
                                        @enderror
                                        @if($product->attachment != null)
                                            <div
                                                    x-data="{ 'showModal': false }"
                                                    @keydown.escape="showModal = false"
                                                    style="margin-top:20px !important;">
                                                <button type="button" @click="showModal = true" title="Elimina"
                                                        class="ml-3 inline-flex justify-center py-2 px-4 mr-5 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-900 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                    <i class="fas fa-trash-alt"></i> <span
                                                            style="padding-left: 7px !important;">Elimina</span>
                                                </button>
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
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                     height="24"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor">
                                                                    <path stroke-linecap="round"
                                                                          stroke-linejoin="round"
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
                                                                        <svg @click="toggleModal"
                                                                             class="h-6 w-6 text-red-600"
                                                                             xmlns="http://www.w3.org/2000/svg"
                                                                             fill="none"
                                                                             viewBox="0 0 24 24"
                                                                             stroke="currentColor"
                                                                             aria-hidden="true">
                                                                            <path stroke-linecap="round"
                                                                                  stroke-linejoin="round"
                                                                                  stroke-width="2"
                                                                                  d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                                                        </svg>
                                                                    </div>
                                                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                                        <h3 class="text-lg leading-6 font-medium text-gray-900"
                                                                            id="modal-title">
                                                                            {{__('product.alertProduct')}}
                                                                            <br><strong>{{ $product->attachment }}</strong>
                                                                            ?
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
                                                                <a href="{{ route('removeAttachment' ,['lang' => app()->getLocale(), $product->id]) }}"
                                                                   data-toggle="modal"
                                                                   data-target="#my-modal"
                                                                   class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto  mt-3">
                                                                    {{__('product.yesAttachment')}}

                                                                </a>

                                                                <div class="flex items-center justify-between">
                                                                    <button type="button"
                                                                            class="z-50 cursor-pointer"
                                                                            @click="showModal = false">
                                                                        <h5 class="w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500  sm:ml-3 sm:w-auto  mt-3">  {{__('product.no')}}</h5>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{--                                                <a class="pt-2 ml-3 inline-flex justify-center py-2 px-4 mr-5 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-900 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"--}}
                                            {{--                                                   href="{{ route('removeAttachment' ,['lang' => app()->getLocale(), $product->id]) }}"--}}
                                            {{--                                                > <i class="fas fa-trash-alt mr-2 mt-1"></i> Elimina</a>--}}
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="col-span-2 sm:col-span-2">
                                <label for="price" class="block my-2 text-sm font-medium text-gray-700">Prezzo
                                    in
                                    €</label>
                                <input type="text" name="price" id="price" value="{{price($product->price)}}"
                                       class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                >
                            </div>
                        </div>
                        <div class="col-span-6 sm:col-span-6">
                            <label for="Descrizione"
                                   class="block my-2 text-sm font-medium text-gray-700">Descrizione Breve</label>

                            <textarea id="myeditorinstance" name="short_description" rows="3"
                                      class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                                      placeholder="">{!! $product->short_description!!}</textarea>

                        </div>
                        <div class="col-span-6 sm:col-span-6">
                            <label for="Descrizione"
                                   class="block my-2 text-sm font-medium text-gray-700">Descrizione Estesa</label>

                            <textarea id="myeditorinstance" name="long_description" rows="3"
                                      class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                                      placeholder="">{!! $product->long_description!!}</textarea>

                        </div>

                    </div>
                    <div class="grid grid-cols-1 gap-1 pt-3">
                        <div class="col-span-1 sm:col-span-1 lg:col-span-2 pt-3">
                            <label class="block my-2 text-md py-2 font-medium text-gray-700">
                                Immagine di copertina
                            </label>

                            <div
                                    class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                <div class="space-y-1 text-center">
                                    @if(file_exists(public_path('storage/images/' .$product->img_01 )) && $product->img_01 != null)
                                        <img src="{{'/storage/images/' . $product->img_01}}" id="img-resize">
                                    @else
                                        <img src="{{'/uploads/default/default.jpg' }}" id="img-resize">
                                    @endif
                                    <div class="flex text-md py-2 pl-3 text-gray-600">
                                        <label for="img_01"
                                               class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">

                                            <input type="file" name="img_01" class="form-control">
                                        </label>
                                    </div>
                                    <p class="text-xs text-gray-500">
                                        PNG, JPG, GIF fino a 6MB
                                    </p>
                                </div>
                            </div>
                            <div class="text-center mx-auto mt-2">
                                @if(file_exists(public_path('storage/images/' .$product->img_01 )) && $product->img_01 != null)
                                    <div
                                            x-data="{ 'showModal': false }"
                                            @keydown.escape="showModal = false"
                                            style="margin-top:20px !important;">
                                        <button type="button" @click="showModal = true" title="Elimina"
                                                class="ml-3 inline-flex justify-center py-2 px-4 mr-5 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-900 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                            <i class="fas fa-trash-alt"></i> <span
                                                    style="padding-left: 7px !important;">Elimina</span>
                                        </button>
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
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                             height="24"
                                                             viewBox="0 0 24 24" fill="none"
                                                             stroke="currentColor">
                                                            <path stroke-linecap="round"
                                                                  stroke-linejoin="round"
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
                                                                <svg @click="toggleModal"
                                                                     class="h-6 w-6 text-red-600"
                                                                     xmlns="http://www.w3.org/2000/svg"
                                                                     fill="none"
                                                                     viewBox="0 0 24 24"
                                                                     stroke="currentColor"
                                                                     aria-hidden="true">
                                                                    <path stroke-linecap="round"
                                                                          stroke-linejoin="round"
                                                                          stroke-width="2"
                                                                          d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                                                </svg>
                                                            </div>
                                                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                                <h3 class="text-lg leading-6 font-medium text-gray-900"
                                                                    id="modal-title">
                                                                    {{__('product.alertProduct')}}
                                                                    <br><strong>{{ $product->img_01 }}</strong>
                                                                    ?
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
                                                        <a href="{{ route('remove1' ,['lang' => app()->getLocale(), $product->id]) }}"
                                                           data-toggle="modal"
                                                           data-target="#my-modal"
                                                           class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto  mt-3">
                                                            {{__('product.yesAttachment')}}

                                                        </a>

                                                        <div class="flex items-center justify-between">
                                                            <button type="button"
                                                                    class="z-50 cursor-pointer"
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
                        </div>

                    </div>
                    <div class="grid grid-cols-6 gap-6 pt-3">


                        <div class="col-span-6 sm:col-span-3">
                            <label class="block my-2 text-md py-2 font-medium text-gray-700">
                                Immagine #2
                            </label>

                            <div
                                    class="mt-1 mb-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                <div class="space-y-1 text-center">
                                    @if(file_exists(public_path('storage/images/' .$product->img_02 )) && $product->img_02 != null)
                                        <img src="{{'/storage/images/' . $product->img_02}}" id="img-resize">
                                    @else
                                        <img src="{{'/uploads/default/default.jpg' }}" id="img-resize">
                                    @endif
                                    <div class="flex text-md py-2 pl-3 text-gray-600">
                                        <label for="img_02"
                                               class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">

                                            <input type="file" name="img_02" class="form-control">
                                        </label>
                                    </div>
                                    <p class="text-xs text-gray-500">
                                        PNG, JPG, GIF fino a 6MB
                                    </p>
                                </div>
                            </div>
                            @if(file_exists(public_path('storage/images/' .$product->img_02 )) && $product->img_02 != null)
                                <div
                                        x-data="{ 'showModal': false }"
                                        @keydown.escape="showModal = false"
                                        style="margin-top:20px !important;">
                                    <button type="button" @click="showModal = true" title="Elimina"
                                            class="ml-3 inline-flex justify-center py-2 px-4 mr-5 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-900 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        <i class="fas fa-trash-alt"></i> <span
                                                style="padding-left: 7px !important;">Elimina</span>
                                    </button>
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
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                         height="24"
                                                         viewBox="0 0 24 24" fill="none"
                                                         stroke="currentColor">
                                                        <path stroke-linecap="round"
                                                              stroke-linejoin="round"
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
                                                            <svg @click="toggleModal"
                                                                 class="h-6 w-6 text-red-600"
                                                                 xmlns="http://www.w3.org/2000/svg"
                                                                 fill="none"
                                                                 viewBox="0 0 24 24"
                                                                 stroke="currentColor"
                                                                 aria-hidden="true">
                                                                <path stroke-linecap="round"
                                                                      stroke-linejoin="round"
                                                                      stroke-width="2"
                                                                      d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                                            </svg>
                                                        </div>
                                                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                            <h3 class="text-lg leading-6 font-medium text-gray-900"
                                                                id="modal-title">
                                                                {{__('product.alertProduct')}}
                                                                <br><strong>{{ $product->img_01 }}</strong>
                                                                ?
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
                                                    <a href="{{ route('remove2' ,['lang' => app()->getLocale(), $product->id]) }}"
                                                       data-toggle="modal"
                                                       data-target="#my-modal"
                                                       class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto  mt-3">
                                                        {{__('product.yesAttachment')}}

                                                    </a>

                                                    <div class="flex items-center justify-between">
                                                        <button type="button"
                                                                class="z-50 cursor-pointer"
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

                        <div class="col-span-6 sm:col-span-3">
                            <label class="block my-2 text-md py-2 font-medium text-gray-700">
                                Immagine #3
                            </label>

                            <div
                                    class="mt-1 mb-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                <div class="space-y-1 text-center">
                                    @if(file_exists(public_path('storage/images/' .$product->img_03 )) && $product->img_02 != null)
                                        <img src="{{'/storage/images/' . $product->img_02}}" id="img-resize">
                                    @else
                                        <img src="{{'/uploads/default/default.jpg' }}" id="img-resize">
                                    @endif
                                    <div class="flex text-md py-2 pl-3 text-gray-600">
                                        <label for="img_03"
                                               class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">

                                            <input type="file" name="img_03" class="form-control">
                                        </label>
                                    </div>
                                    <p class="text-xs text-gray-500">
                                        PNG, JPG, GIF fino a 6MB
                                    </p>
                                </div>
                            </div>
                            @if(file_exists(public_path('storage/images/' .$product->img_03 )) && $product->img_03 != null)
                                <div
                                        x-data="{ 'showModal': false }"
                                        @keydown.escape="showModal = false"
                                        style="margin-top:20px !important;">
                                    <button type="button" @click="showModal = true" title="Elimina"
                                            class="ml-3 inline-flex justify-center py-2 px-4 mr-5 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-900 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        <i class="fas fa-trash-alt"></i> <span
                                                style="padding-left: 7px !important;">Elimina</span>
                                    </button>
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
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                         height="24"
                                                         viewBox="0 0 24 24" fill="none"
                                                         stroke="currentColor">
                                                        <path stroke-linecap="round"
                                                              stroke-linejoin="round"
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
                                                            <svg @click="toggleModal"
                                                                 class="h-6 w-6 text-red-600"
                                                                 xmlns="http://www.w3.org/2000/svg"
                                                                 fill="none"
                                                                 viewBox="0 0 24 24"
                                                                 stroke="currentColor"
                                                                 aria-hidden="true">
                                                                <path stroke-linecap="round"
                                                                      stroke-linejoin="round"
                                                                      stroke-width="2"
                                                                      d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                                            </svg>
                                                        </div>
                                                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                            <h3 class="text-lg leading-6 font-medium text-gray-900"
                                                                id="modal-title">
                                                                {{__('product.alertProduct')}}
                                                                <br><strong>{{ $product->img_03 }}</strong>
                                                                ?
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
                                                    <a href="{{ route('remove3' ,['lang' => app()->getLocale(), $product->id]) }}"
                                                       data-toggle="modal"
                                                       data-target="#my-modal"
                                                       class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto  mt-3">
                                                        {{__('product.yesAttachment')}}

                                                    </a>

                                                    <div class="flex items-center justify-between">
                                                        <button type="button"
                                                                class="z-50 cursor-pointer"
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

                    </div>
                    <div class="px-4 py-3 text-right sm:px-6 pb-10 mt-8">
                        <a href="{{url()->previous()}}"
                           class="btn px-6 py-2.5 bg-green-600 hover:bg-green-700 text-white font-medium text-xs leading-tight uppercase rounded shadow-md  hover:shadow-lg focus:bg-green-900  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out items-center">
                            Torna indietro
                        </a>
                        <button type="submit"
                                class="ml-7 btn px-6 py-2.5 bg-blue-700 hover:bg-blue-900 text-white font-medium text-xs leading-tight uppercase rounded shadow-md  hover:shadow-lg focus:bg-blue-900  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out items-center">
                            Salva impostazioni
                        </button>
                    </div>
                </div>
        </form>
    </div>

@endsection
