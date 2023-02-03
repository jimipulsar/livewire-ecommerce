@if (Session::has('success'))
    <div class="rounded-md py-4 px-4 overflow-x-auto whitespace-no-wrap animated slideInRight" id="hideMeBack">

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
@if (Session::has('danger'))
    <div class="rounded-md py-4 px-4 overflow-x-auto whitespace-no-wrap animated slideInRight" id="hideMeBack">

        <div class="inline-flex max-w-sm w-full bg-white shadow-md rounded-lg overflow-hidden ml-3">
            <div class="flex justify-center items-center w-12 bg-red-500">
                <svg class="h-6 w-6 fill-current text-white" viewBox="0 0 40 40"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                            d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z"/>
                </svg>
            </div>

            <div class="-mx-3 py-2 px-4">
                <div class="mx-3">
                    <span class="text-red-500 font-semibold">Attenzione!</span>
                    <p class="text-gray-600 text-sm">{{ \Session::get('danger') }}</p>
                </div>
            </div>
        </div>
    </div>
@endif


