@extends('backend.customerlayouts.master')

@section('body')

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Attenzione!</strong> Ci sono problemi con i dati inseriti.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h3 class="text-gray-700 text-3xl font-medium">Prodotti</h3>
    @if (Session::has('success'))
        <div class="rounded-md py-4 px-4 overflow-x-auto whitespace-no-wrap">

            <div class="inline-flex max-w-sm w-full bg-white shadow-md rounded-lg overflow-hidden ml-3">
                <div class="flex justify-center items-center w-12 bg-green-500">
                    <svg class="h-6 w-6 fill-current text-white" viewBox="0 0 40 40"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z"/>
                    </svg>
                </div>

                <div class="-mx-3 py-2 px-4">
                    <div class="mx-3">
                        <span
                            class="text-green-500 font-semibold">Operazione eseguita</span>
                        <p class="text-gray-600 text-sm">{{ \Session::get('success') }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="mt-8">
        <div class="flex rounded-md bg-white py-4 px-4 overflow-x-auto">
            <a href="{{route('items.create')}}">
                <button
                    class="px-6 py-3 bg-green-600 rounded-md text-white font-medium tracking-wide hover:bg-green-500 ml-3">
                    Nuovo prodotto
                </button>
            </a>
        </div>

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
                            Descrizione
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Disponibilità
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Categorie
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            price
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Azioni
                        </th>
                    </tr>
                    </thead>

                    <tbody class="bg-white">
                    @foreach ($items as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="flex items-center">

                                    <div class="ml-4">
                                        <div
                                            class="text-sm leading-5 font-medium text-gray-900">{{ $item->name }}</div>

                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="text-sm leading-5 text-gray-900">{{ $item->description }}</div>

                            </td>
                            @if($item->availability == '1')
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Disponibile</span>
                                </td>
                            @endif
                            @if($item->availability == '0')
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-dred-100 text-red-800">Non disponibile</span>
                                </td>
                            @endif

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                @foreach($item->categories as $key => $category)

                                    {{ $category->name }} / {{ $category->name }}

                                @endforeach
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="text-sm leading-5 text-gray-900"> € {{ $item->price }}</div>

                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <form action="{{ route('items.destroy' ,$item->id) }}" id="myform" method="post">

                                    <a class="btn btn-info" href="{{ route('items.show',$item->slug) }}"
                                       data-toggle="tooltip" data-placement="bottom" title="Visualizza" target="_blank"><i
                                            class="fas fa-eye"></i></a>
                                    <a class="btn btn-primary" data-toggle="tooltip" data-placement="bottom"
                                       title="Modifica" href="{{ route('items.edit',$item->id) }}"><i
                                            class="fas fa-edit"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" data-toggle="tooltip" data-placement="bottom" title="Elimina"
                                            class="btn btn-danger"
                                            data-confirm="Sei sicuro di voler eliminare questo articolo?"><i
                                            class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
                <div class="d-flex justify-content-center">

                    {{$items->links()}}

                </div>
            </div>
        </div>
    </div>


@endsection
