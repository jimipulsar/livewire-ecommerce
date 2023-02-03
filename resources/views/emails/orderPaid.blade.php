@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            <img src="{{(asset('/uploads/logo/logo.png'))}}" style="height:80px;">
        @endcomponent
    @endslot
    <h2 style="margin-bottom:20px;">Ordine N. {{$order->order_number}}<br></h2>
    <strong>
        <table class="table table-bordered pt-3" style="width:100% !important">
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
    <hr style="border:1px solid #e3e3e3; margin-bottom:20px;">
    <p style="text-align:right; font-size:14px">Spedizione : + € {{ price(7.00)}}</p>
    @if($order->discount)
        <p style="text-align:right;  font-size:14px">Coupon : - € {{ price($order->discount)}}</p>
    @endif
    <p style="text-align:right; font-weight:bold">Totale ordine : € {{ price($order->grand_total)}}</p>
    <hr style="border:1px solid #e3e3e3">
    @if($order->payment_method === 'wire transfer')
        <p class="pt-3" style="font-size:14px">Ecco le coordinate bancarie per effettuare l'acquisto:</p>
        <p class="pt-3" style="font-size:14px">IBAN:  </p>
        <p class="pt-3" style="font-size:14px">BIC:  </p>
        <p class="pt-3" style="font-size:14px">Banca: </p>
        <p class="pt-3" style="font-size:14px">CAUSALE: Ordine N. {{$order->order_number}}</p>
        <p class="pt-3 font-weight-bold" style="font-size:14px">Importo totale:
            € {{ number_format($order->grand_total , 2, ',', ' ')}}</p>
        <hr>
        <p style="font-size:14px">Non appena avremo ricevuto il bonifico, procederemo con la spedizione.</p>
    @endif
    <p class="pt-3" style="font-size:14px">Grazie per il tuo acquisto</p>
    <p style="font-size:14px">La Direzione</p>
    <p style="font-size:14px"><strong>{{ config('app.name') }}</strong></p>
    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} {{ config('app.name') }}.  P.IVA: 01660000546  | Tutti i diritti riservati
        @endcomponent
    @endslot
@endcomponent
