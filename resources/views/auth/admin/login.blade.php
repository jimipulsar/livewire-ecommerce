@extends('layouts.app')
@section('content')
    <section class="h-full gradient-form bg-gray-200 md:h-screen justify-content-center" style="height: 100vh;" >
        <div class="flex justify-center items-center flex-wrap justify-content-center h-full text-gray-800">
            <div class="xl:w-4/12 ml-12 text-center" style="display: block;margin:auto;">
                <div class=" bg-white shadow-lg rounded-lg py-8">
                    <div class="lg:w-12/12 px-4 md:px-0 py-4">
                        <div class="md:p-12 md:mx-6">
                            <div class="text-center">
                                <img
                                        class="mx-auto w-28"
                                        src="/uploads/logo/logo.png"
                                        alt="logo"
                                />
                                <h4 class="text-xl font-semibold mt-1 mb-12 pb-1">Admin Dashboard </h4>
                            </div>
                            <form action="{{ route('adminLoginPost', ['lang' => app()->getLocale()]) }}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <p class="mb-4">Inserisci le tue credenziali per accedere all'area riservata</p>
                                <div class="mb-4">
                                    <input
                                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                            type="email" id="email" name="email"
                                            placeholder="E-mail"
                                    />

                                </div>
                                <div class="mb-4">
                                    <input
                                            type="password" id="password" name="password"
                                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                            placeholder="Password"
                                    />
                                    @error('password')
                                    <span class="invalid-feedback text-red" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                    @enderror
                                </div>
                                @error('email')
                                <div class="mb-4">
                                <span class="invalid-feedback text-red-700 py-4" role="alert">
                                                                            <span style="font-size:13px; padding-top:10px;padding-bottom:10px" >{{ $message }}</span>
                                                                        </span>
                                </div>
                                @enderror
                                <div class="text-center pt-1 mb-12 pb-1">
                                    <button
                                            class="inline-block px-6 py-2.5 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full mb-3"
                                            type="submit"
                                            data-mdb-ripple="true"
                                            data-mdb-ripple-color="light"
                                            style=" background: linear-gradient( to right,#ee7724, #d8363a,  #dd3675,#b44593);">
                                        Accedi
                                    </button>
                                </div>
                                <div class="d-block text-center">
                                    <a href="{{route('index', app()->getLocale())}}"
                                            class="inline-block px-6 py-2 border-2 border-red-600 text-red-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                                            data-mdb-ripple="true"
                                            data-mdb-ripple-color="light">
                                        Torna in Home Page
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



