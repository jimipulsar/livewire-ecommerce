@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            <img src="{{(asset('/uploads/logo/logo.png'))}}" style="height:80px;">
        @endcomponent
    @endslot
    <h2>Il tuo Ordine N. {{$order->order_number}} è stato spedito</h2>
    <strong>
    <table class="table table-striped pt-3" style="width:100% !important">
        <thead style="padding:10px">
        <tr style="padding:10px">
            <th style="text-align:left;padding:10px">Nome prodotto</th>
            <th style="text-align:left;padding:10px">Quantità</th>
            <th style="text-align:left;padding:10px">Prezzo</th>
        </tr>
        </thead>
        <tbody>
        @foreach($order->items as $item)
            <tr style="padding:10px">
                <td scope="row" style="padding:10px">{{ $item->short_description }}</td>
                <td style="padding:10px">{{ $item->pivot->quantity }}</td>
                <td style="padding:10px">€ {{ price($item->pivot->price)}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </strong>
    <hr style="border:1px solid #e3e3e3">
    <p style="text-align:right; font-size:14px" class="pt-2">IVA : + 22%</p>
    <p style="text-align:right; font-size:14px">Spedizione : + € {{ price(7.00)}}</p>
    @if($order->discount)
        <p style="text-align:right;  font-size:14px">Coupon : - € {{ price($order->discount)}}</p>
    @endif
    <p style="text-align:right; font-weight:bold">Totale ordine : € {{ price($order->grand_total)}}</p>
    <hr style="border:1px solid #e3e3e3">
    <p class="pt-3" style="font-size:14px">Grazie per il tuo acquisto</p>
    <p class="pt-3" style="font-size:14px">La spedizione è partita</p>
    <p style="font-size:14px">La Direzione</p>
    <p style="font-size:14px"><strong>{{ config('app.name') }}</strong></p>
    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} {{ config('app.name') }}.  P.IVA: 01660000546  | Tutti i diritti riservati
        @endcomponent
    @endslot
@endcomponent
