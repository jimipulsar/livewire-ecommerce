@extends('backend.adminlayouts.master')

@section('body')

    <h3 class="text-gray-700 text-3xl font-medium">Crea Prodotto</h3>
    <div class="md:grid md:grid-cols-3 md:gap-6 mt-10 mb-10">
        <div class="mt-5 md:mt-0 md:col-span-6">
            <form action="{{ route('products.store', app()->getLocale()) }}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="col-span-9 sm:col-span-4">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-2 sm:col-span-2">
                                    <label for="item_name"
                                           class="block my-2 text-sm font-medium text-gray-700">Nome Articolo</label>
                                    <input type="text" name="item_name" id="item_name"
                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                </div>

                                <div class="col-span-2 sm:col-span-2">
                                    <label for="item_code" class="block my-2 text-sm font-medium text-gray-700">Codice
                                        Articolo</label>
                                    <input type="text" name="item_code" id="item_code"
                                           autocomplete="item_code"
                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-2 sm:col-span-1">
                                    <label for="shippable" class="block my-2 text-sm font-medium text-gray-700">Acquistabile</label>
                                    <div class="mt-4">
                                        <input type="radio" class="form-radio" name="shippable" id="shippable"
                                               value="1" {{\request()->input('shippable') == '1' ? 'checked' : ''}} checked>
                                        <span class="ml-2" style="margin-left:6px;margin-right:10px;">Si</span>
                                        <input type="radio" class="form-radio" name="shippable" id="shippable"
                                               value="0" {{\request()->input('shippable') == '0' ? 'checked' : ''}}>
                                        <span class="mr-2 ml-2" style="margin-left:6px; ">No</span>

                                    </div>
                                </div>

                                <div class="col-span-2 sm:col-span-1">
                                    <label for="published" class="block my-2 text-sm font-medium text-gray-700">Pubblicato</label>
                                    <div class="mt-4">

                                        <input type="radio" class="form-radio" name="published" id="published"
                                               value="1" {{\request()->input('published') == '1' ? 'checked' : ''}} checked>
                                        <span class="ml-2" style="margin-left:6px;margin-right:10px;">Si</span>
                                        <input type="radio" class="form-radio" name="published" id="published"
                                               value="0" {{\request()->input('published') == '0' ? 'checked' : ''}}>
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
                                            <option value="{{$cat->id }}">  {{ $cat->name }}</option>
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
                                            <option value="{{$category->id }}">  {{ $category->name }}</option>

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
                                           autocomplete="street-address"
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
                                        >
                                    </div>
                                    <div class="col-span-6 sm:col-span-6">
                                        <label for="link_2"
                                               class="block my-2 text-sm font-medium text-gray-700">Link #2</label>
                                        <input type="text" name="link_2" id="link_2"
                                               class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        >
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
                                                    >


                                                </label>

                                            </div>
                                            <p class="text-xs text-gray-500">
                                                <span> </span>
                                            </p>
                                            {{--                                            <p class="text-xs text-gray-500">--}}
                                            {{--                                                ppt,pptx,doc,docx,pdf,xls,xlsx fino a 10 MB--}}
                                            {{--                                            </p>--}}
                                            @error('attachment')
                                            <div class="text-sm text-red-700"> * {{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="col-span-2 sm:col-span-2">
                                    <label for="price" class="block my-2 text-sm font-medium text-gray-700">Prezzo
                                        in
                                        €</label>
                                    <input type="text" name="price" id="price"
                                           class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                </div>
                            </div>
                            <div class="col-span-6 sm:col-span-6">
                                <label for="Descrizione"
                                       class="block my-2 text-sm font-medium text-gray-700">Descrizione Breve</label>

                                <textarea id="myeditorinstance" name="short_description" rows="3"
                                          class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                                          placeholder=""></textarea>

                            </div>
                            <div class="col-span-6 sm:col-span-6">
                                <label for="Descrizione"
                                       class="block my-2 text-sm font-medium text-gray-700">Descrizione Estesa</label>

                                <textarea id="myeditorinstance" name="long_description" rows="3"
                                          class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                                          placeholder=""></textarea>

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
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label class="block my-2 text-md py-2 font-medium text-gray-700">
                                    Immagine #3
                                </label>

                                <div
                                        class="mt-1 mb-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                    <div class="space-y-1 text-center">
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
                </div>
            </form>
        </div>

@endsection
