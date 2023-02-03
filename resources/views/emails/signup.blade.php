@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            <img src="{{(asset('/uploads/logo/logo.png'))}}" style="height:100px;">
        @endcomponent
    @endslot
    {{-- Body --}}
    <h2>Nuova registrazione dal sito web italianisrl.com </h2>
    <br>
    <strong>Nome e Cognome</strong>
    <p>{{$data->billing_name}} {{$data->billing_surname}}</p>
    <strong>Email</strong>
    <p>{{$data->email}}</p>
    <br>
    <hr>
    <p><strong>Indirizzo IP pubblico</strong> : {{\request()->ip()}}</p>
    <p><strong>Browser</strong> : {{\request()->header('User-Agent')}}</p>
    <p><strong>Data della traccia</strong> : {{date('d/m/Y H:i:s')}}</p>
    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} {{ config('app.name') }} - P.IVA: 01660000546 | Tutti i diritti riservati
        @endcomponent
    @endslot
@endcomponent
