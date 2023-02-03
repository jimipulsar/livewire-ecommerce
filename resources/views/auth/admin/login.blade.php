@extends('layouts.app')

@section('content')

    <div class="w-full min-h-screen bg-white-100 flex flex-col justify-center sm:py-12">
        <div class=" p-10 xs:p-0 mx-auto md:w-full md:max-w-md">
            <form action="{{ route('adminLoginPost', app()->getLocale()) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <img src="/uploads/logo/logo.png" class="img-responsive mx-auto py-6 mb-3" id="headerLogo">

                <div class="shadow-lg p-3 mb-3 bg-gray-200 rounded rounded-lg divide-y divide-gray-200">
                    <div class="px-5 py-7">
                        <label for="email" class="font-semibold text-sm text-gray-600 pb-1 block">E-mail</label>
                        <input type="email" id="email"  name="email"
                               class="border rounded-lg px-3 py-2 mt-1 mb-3 text-sm w-full " required/>

                        <label for="password" class="font-semibold text-sm text-gray-600 pb-1 block">Password</label>
                        <input type="password" id="password" name="password"
                               class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" required/>
                        @error('password')
                        <span class="invalid-feedback text-red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <button type="submit"
                                class="transition duration-200 bg-blue-800 hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white w-full py-2.5 rounded-lg text-sm shadow-sm hover:shadow-md font-semibold text-center inline-block">
                            <span class="inline-block mr-2">Accedi</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" class="w-4 h-4 inline-block">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </button>
                        @error('email')
                        <span class="invalid-feedback text-red-700 " role="alert">
                                        <span style="font-size:13px; padding-top:10px" >{{ $message }}</span>
                                    </span>
                        @enderror
                    </div>

                </div>
                <div class="py-5 pl-4" style="margin-left:50px">
                    <div class="grid grid-cols-2 gap-1">
                        <div class="text-center sm:text-left whitespace-nowrap">
                            <a href="{{route('index', app()->getLocale())}}" style="text-decoration:none !important"
                               class="transition duration-200 mx-5 px-4 py-3 cursor-pointer font-normal text-sm rounded-lg text-gray-500 bg-white hover:bg-gray-400 focus:bg-gray-400 focus:ring-opacity-100 ring-inset shadow">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor" class="w-5 h-5 inline-block align-text-top">
                                    <path d="M3.24,7.51c-0.146,0.142-0.146,0.381,0,0.523l5.199,5.193c0.234,0.238,0.633,0.064,0.633-0.262v-2.634c0.105-0.007,0.212-0.011,0.321-0.011c2.373,0,4.302,1.91,4.302,4.258c0,0.957-0.33,1.809-1.008,2.602c-0.259,0.307,0.084,0.762,0.451,0.572c2.336-1.195,3.73-3.408,3.73-5.924c0-3.741-3.103-6.783-6.916-6.783c-0.307,0-0.615,0.028-0.881,0.063V2.575c0-0.327-0.398-0.5-0.633-0.261L3.24,7.51 M4.027,7.771l4.301-4.3v2.073c0,0.232,0.21,0.409,0.441,0.366c0.298-0.056,0.746-0.123,1.184-0.123c3.402,0,6.172,2.709,6.172,6.041c0,1.695-0.718,3.24-1.979,4.352c0.193-0.51,0.293-1.045,0.293-1.602c0-2.76-2.266-5-5.046-5c-0.256,0-0.528,0.018-0.747,0.05C8.465,9.653,8.328,9.81,8.328,9.995v2.074L4.027,7.771z"></path>
                                </svg>
                                <span class="inline-block">Torna in Homepage</span>
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection



