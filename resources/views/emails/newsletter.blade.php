@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            <img src="{{(asset('/uploads/logo/logo.png'))}}" style="height:80px;">
        @endcomponent
    @endslot
    <h2>Ti sei iscritto alla Newsletter con successo!</h2>
    <hr>
    <p class="pt-3">Riceverai aggiornamenti sui nuovi prodotti, offerte, sconti e molto altro</p>
    <p>La Direzione</p>
    <p><strong>{{ config('app.name') }}</strong></p>
    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} {{ config('app.name') }}.  P.IVA: 01660000546  | Tutti i diritti riservati
        @endcomponent
    @endslot
@endcomponent
