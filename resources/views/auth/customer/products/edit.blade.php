@extends('backend.customerlayouts.master')

@section('body')
    <h3 class="text-gray-700 text-3xl font-medium">Prodotti</h3>
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form action="{{ route('items.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')


                <div class="shadow sm:rounded-md sm:overflow-hidden">

                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                        <div class="md:col-span-1">
                            <label for="availability" style="margin-right:10px;">Pubblicato </label>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                @if ($item->availability == '1')
                                    <label class="btn btn-secondary active" name="availability">
                                        {!! Form ::radio('availability','1',($item->availability == '1' ? 'checked' : '')) !!}
                                        SI
                                    </label>
                                    <label class="btn btn-secondary" name="availability">
                                        {!! Form ::radio('availability','0',($item->availability == '0' ? 'checked' : '')) !!}
                                        NO
                                    </label>
                                @else
                                    <label class="btn btn-secondary" name="availability">
                                        {!! Form ::radio('availability','1',($item->availability == '1' ? 'checked' : '')) !!}
                                        SI
                                    </label>
                                    <label class="btn btn-secondary active" name="availability">
                                        {!! Form ::radio('availability','0',($item->availability == '0' ? 'checked' : '')) !!}
                                        NO
                                    </label>
                                @endif
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-6">
                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="name" class="block text-sm font-medium text-gray-700">Titolo</label>
                                <input type="text" name="name" id="name"
                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                       value="{{$item->name}}">
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-6">
                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                                <input type="text" name="slug" id="slug"
                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                       value="{{$item->slug}}">
                            </div>
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">
                                Descrizione
                            </label>
                            <div class="mt-1">
                                    <textarea id="description" name="description" rows="3"
                                              class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                                              placeholder="Inserisci la tua descrizione">{!! $item->description!!}</textarea>
                            </div>

                        </div>
                        <div class="col-span-6 sm:col-span-3">

                            <label for="size" class="block text-sm font-medium text-gray-700">Taglia</label>
                            {!! Form::select('size', ['Small' => 'Small', 'Medium' => 'Medium', 'Large' => 'Large'], array('default' => $item->size), array('class' => 'form-control')); !!}

                        </div>
                        <div class="col-span-6 sm:col-span-3">

                            <label for="color" class="block text-sm font-medium text-gray-700">Colore</label>
                            {!! Form::select('color', ['Yellow' => 'Yellow', 'Brown' => 'Brown', 'Orange' => 'Orange'], array('default' => $item->size), array('class' => 'form-control')); !!}

                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">
                                Photo
                            </label>
                            <div class="mt-1 flex items-center">
                                  <span class="inline-block h-120 w-120 rounded-medium overflow-hidden bg-gray-100">
                                  <img src="/storage/images/{{$item->cover}}" class="img-fluid img-thumbnail"
                                       style="height:200px;">
                                  </span>
                                <input type="file" name="cover" class="form-control"
                                       value="/storage/images/{{$item->cover}}">

                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-6">
                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="slug" class="block text-sm font-medium text-gray-700">price</label>
                                <input type="text" name="price" id="price"
                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                       value="{{$item->price}}">
                            </div>
                        </div>

                        <div class="col-span-6 sm:col-span-3">

                            <label for="categories[]"
                                   class="block text-sm font-medium text-gray-700">Categoria</label>

                            <select
                                class="form-control select2 {{ $errors->has('categories') ? 'is-invalid' : '' }}"
                                name="categories[]" id="categories" multiple>
                                @foreach($categories as $category)
                                    <option
                                        value="{{ $category->id }}" {{ (in_array($category->parentCategory->id, old('categories', [])) || $item->categories->contains($category->id)) ? 'selected' : '' }}>
                                        {{ $category->parentCategory->name }} / {{ $category->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('categories'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('categories') }}
                                </div>
                            @endif

                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <a href="{{url()->previous()}}"
                               class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Torna
                                indietro

                            </a>

                            <button type="submit"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Salva
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
