@extends('backend.adminlayouts.master')

@section('body')

    <h3 class="text-gray-700 text-3xl font-medium">Utenti</h3>

    <div class="flex flex-col mt-8">
        <div class="my-2 pb-4 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div
                class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                <table class="min-w-full">
                    <thead>
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Nome e Cognome
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Email
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Indirizzo
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Telefono
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Città
                        </th>

                    </tr>
                    </thead>

                    <tbody class="bg-white">
                    @foreach ($users as $user)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="flex items-center">

                                    <div class="ml-4">
                                        <div
                                            class="text-sm leading-5 font-medium text-gray-900">{{ $user->billing_name }} {{ $user->billing_surname }}</div>

                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="text-sm leading-5 text-gray-900">{{ $user->email }}</div>

                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="text-sm leading-5 text-gray-900"> {{ $user->billing_address }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="text-sm leading-5 text-gray-900"> {{ $user->billing_phone }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="text-sm leading-5 text-gray-900"> {{ $user->billing_city }}</div>

                            </td>
                            {{-- <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <form action="{{ route('customers.destroy' ,$user->billing_id) }}" id="myform" method="post">

                                    <a class="btn btn-primary" data-toggle="tooltip" data-placement="bottom"
                                       title="Modifica" href="{{ route('customers.edit',$user->billing_id) }}"><i
                                            class="fas fa-edit"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" data-toggle="tooltip" data-placement="bottom" title="Elimina"
                                            class="btn btn-danger"
                                            data-confirm="Sei sicuro di voler eliminare questo articolo?"><i
                                            class="fas fa-trash-alt"></i></button>
                                </form>
                            </td> --}}

                        </tr>
                    @endforeach

                    </tbody>

                </table>


            </div>

        </div>

        {{ $users->links('vendor.pagination.tailwind') }}


    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
@endsection
