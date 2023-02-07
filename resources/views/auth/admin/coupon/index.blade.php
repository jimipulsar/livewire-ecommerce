@extends('backend.adminlayouts.master')

@section('body')

    <h3 class="text-gray-700 text-3xl font-medium">Codici Coupon</h3>

    <div class="flex flex-col mt-8">
        <div class="my-2 pb-4 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div
                class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                <table class="min-w-full">
                    <thead>
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Codice
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Tipo
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Valore in €
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Percentuale %
                        </th>
                        <th style="width: 100px" class="pl-4 px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Azioni
                        </th>
                    </tr>
                    </thead>

                    <tbody class="bg-white">
                    @foreach ($coupons as $coupon)
                        <tr>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="text-sm leading-5 text-gray-900">{{ $coupon->code }}</div>

                            </td>
                            @if($coupon->type == 'percent')
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-900"> Percentuale</div>

                                </td>
                            @else
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-900"> Valore monetario</div>

                                </td>
                            @endif
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="text-sm leading-5 text-gray-900"> {{ $coupon->value }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="text-sm leading-5 text-gray-900"> {{ $coupon->percent_off }}</div>
                            </td>

                            <td class="whitespace-no-wrap border-b border-gray-200 text-right">
                                <form
                                    action="{{ route('coupon.destroy' ,[ 'lang'=>app()->getLocale(), $coupon->id]) }}"
                                    id="myform" method="post">
                                    <a data-toggle="tooltip" data-placement="bottom"
                                       class="px-4 py-2.5 ml-2 bg-yellow-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-yellow-700 hover:shadow-lg focus:bg-yellow-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-800 active:shadow-lg transition duration-150 ease-in-out"
                                       title="Modifica"
                                       href="{{ route('coupon.edit',['lang' => app()->getLocale(), $coupon->id]) }}"
                                       id="btLeft"><i
                                                class="fas fa-edit" title="Modifica"></i></a>
                                    @csrf
{{--                                    @method('DELETE')--}}
{{--                                    <button type="submit" data-toggle="tooltip" data-placement="bottom"--}}
{{--                                            title="Elimina"--}}
{{--                                            class="btn btn-danger"--}}
{{--                                            data-confirm="Sei sicuro di voler eliminare questo articolo?"><i--}}
{{--                                            class="fas fa-trash-alt"></i></button>--}}
                                </form>
                            </td>

                        </tr>
                    @endforeach

                    </tbody>

                </table>


            </div>

        </div>

        {{ $coupons->links('vendor.pagination.tailwind') }}


    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
@endsection
