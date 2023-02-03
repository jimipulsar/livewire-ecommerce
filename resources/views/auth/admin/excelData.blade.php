@extends('backend.adminlayouts.master')

@section('body')
    <h3 class="text-gray-700 text-3xl font-medium">Import / Export CSV & Excel to Database</h3>
    <div class="pt-2 sm:pt-2 sm:space-y-1">

        <div class="md:grid md:grid-cols-3 md:gap-6">

            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="flex flex-col">
                    <form action="{{ route('file-import', app()->getLocale()) }}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <div
                                class="sm:grid sm:grid-cols-1 sm:gap-4 sm:items-start mt-10">
                            <label class="block text-sm font-medium text-gray-700">
                                Importa File Excel
                            </label>
                            <div
                                    class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                         viewBox="0 0 48 48" aria-hidden="true">
                                        <path
                                                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="file-upload"
                                               class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                            <input type="file" name="file" class="custom-file-input"
                                                   id="customFile">
                                        </label>
                                        <p class="pl-1 pl-3">o Trascina</p>
                                    </div>
                                    {{--                        <p class="text-xs text-gray-500">--}}
                                    {{--                        <div class="custom-file text-left">--}}
                                    {{--                            <input type="file" name="file" class="custom-file-input" id="customFile">--}}
                                    {{--                            <label class="custom-file-label" for="customFile">Choose file</label>--}}
                                    {{--                        </div>--}}
                                    {{--                        </p>--}}
                                </div>
                            </div>
                        </div>

                        <div class="px-4 py-3 text-center sm:px-6 pb-10 mt-8">
                            <button type="submit"
                                    class="btn px-6 py-2.5 bg-green-600 hover:bg-green-700 text-white font-medium text-xs leading-tight uppercase rounded shadow-md  hover:shadow-lg focus:bg-green-900  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out items-center">
                                Importa Dati
                            </button>
                            <a href="{{ route('file-export', app()->getLocale()) }}"
                               class="ml-5 btn px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium text-xs leading-tight uppercase rounded shadow-md  hover:shadow-lg focus:bg-blue-900  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out items-center">
                                Esporta Dati
                            </a>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
