@extends('backend.adminlayouts.master')

@section('body')

    <h3 class="text-gray-700 text-3xl font-medium">Il mio profilo</h3>
    <div class="md:grid md:grid-cols-3 md:gap-6 mt-10 mb-10">
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form action="{{ route('updateAdmin',['lang' => app()->getLocale(), $admin->id]) }}"
                  enctype="multipart/form-data" method="post">
                @csrf
                @method('PUT')
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6 mt-5">
                            <div class="col-span-12 sm:col-span-12">
                                <label for="nome"
                                       class="block text-sm font-medium text-gray-700">Nome</label>
                                <input type="text" name="name" id="name"
                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                       value="{{$admin->name}}">
                                @if ($errors->has('name'))
                                    <span class="help-block text-red-700">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>

                        </div>
                        <div class="grid grid-cols-6 gap-6 mt-5">
                            <div class="col-span-12 sm:col-span-12">
                                <label for="email"
                                       class="block text-sm font-medium text-gray-700">E-mail</label>
                                <input type="email" name="email" id="email"
                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                       value="{{$admin->email}}">
                                @if ($errors->has('email'))
                                    <span class="help-block text-red-700">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>

                        </div>
                        <div class="grid grid-cols-6 gap-6 mt-5">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="password"
                                       class="block text-sm font-medium text-gray-700">Nuova Password</label>
                                <input type="password" name="password" id="password"
                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" >
                                @if ($errors->has('password'))
                                    <span class="help-block text-red-700">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="nome"
                                       class="block text-sm font-medium text-gray-700">Conferma password</label>
                                <input type="password" name="password_confirmation" id="password-confirm"
                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                       value="{{$admin->nome}}">
                                @if ($errors->has('password'))
                                <span class="help-block text-red-700">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
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
                </div>
            </form>
        </div>
    </div>

@endsection
