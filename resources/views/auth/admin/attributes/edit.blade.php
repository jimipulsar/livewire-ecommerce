@extends('backend.adminlayouts.master')

@section('body')
    <h3 class="text-gray-700 text-3xl font-medium">Modifica Attributo</h3>
    <div class="md:grid md:grid-cols-1 md:gap-3 mt-10 mb-10">
        <div class="mt-5 md:mt-0 md:col-span-4">
            <form action="{{ route('attributes.update',['lang' => app()->getLocale(), $attribute->id]) }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">


                            <div class="col-span-3 sm:col-span-2">
                                <label for="parent_id"
                                       class="block text-sm font-medium text-gray-700">Tipologia</label>

                                <select
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    name="parent_id" id="parent_id">
                                    @foreach ($productAttribute as $attributeP)
                                        <option value="{{$attributeP->id }}"
                                                @if($attributes->contains($attributeP->id)) selected @endif>  {{ $attributeP->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('attributes'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('attributes') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-span-9 sm:col-span-4">
                                <label for="Nome attributo"
                                       class="block text-sm font-medium text-gray-700">Nome attributo</label>
                                <input type="text" name="name" id="name"
                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                       value="{{$attribute->name}}">
                            </div>
                        </div>
{{--                        <div class="grid grid-cols-6 gap-6 py-3">--}}
{{--                            <div class="col-span-4 sm:col-span-2">--}}
{{--                                <label for="products[]"--}}
{{--                                       class="block my-2 text-sm font-medium text-gray-700">Prodotti</label>--}}

{{--                                <select--}}
{{--                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"--}}
{{--                                    name="products[]" id="products" autocomplete="products">--}}
{{--                                    @foreach ($productAttribute as $attributeP)--}}
{{--                                        <option value="{{$attributeP->id }}"--}}
{{--                                                @if($products->contains($attributeP->id)) selected @endif>  {{ $attributeP->name }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                                @if($errors->has('products'))--}}
{{--                                    <div class="invalid-feedback">--}}
{{--                                        {{ $errors->first('products') }}--}}
{{--                                    </div>--}}
{{--                                @endif--}}

{{--                            </div>--}}

{{--                        </div>--}}
{{--                        <div class="grid grid-cols-1 gap-1 pt-3">--}}
{{--                            <div class="col-span-1 sm:col-span-1 lg:col-span-2 pt-3">--}}
{{--                                <label class="block my-2 text-md py-2 font-medium text-gray-700">--}}
{{--                                    Immagine di copertina--}}
{{--                                </label>--}}

{{--                                <div--}}
{{--                                    class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">--}}
{{--                                    <div class="space-y-1 text-center">--}}
{{--                                        <div class="flex text-md py-2 pl-3 text-gray-600">--}}
{{--                                            <label for="cover"--}}
{{--                                                   class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">--}}

{{--                                                <input type="file" name="cover" class="form-control">--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                        <p class="text-xs text-gray-500">--}}
{{--                                            PNG, JPG, GIF fino a 6MB--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}

                    <br>
                        <br>
                    <hr>
                    <div class="px-4 py-3 text-left sm:px-6 pb-10 mt-8">
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
