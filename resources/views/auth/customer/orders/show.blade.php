@extends('layouts.main')
@section('title', __('home.seo.title'))
@section('description', __('home.seo.description'))
@section('extraCss')
    <link rel="stylesheet" href="/assets/css/main.css?v=5.3"/>
@endsection
@section('content')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{route('home', app()->getLocale())}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span> </span> <a href="{{route('orders.index', app()->getLocale())}}" rel="nofollow"><i
                        class="fi-rs-list mr-5"></i>My Orders</a>
                <span> </span>Invoice No: {{$orderInfo->order_number}}

            </div>
        </div>
    </div>
    <div class="invoice invoice-content invoice-1">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="invoice-inner">
                        <div class="invoice-info" id="invoice_wrapper">
                            <div class="invoice-header">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="invoice-name">
                                            <div class="logo">
                                                <a href="index.html"><img src="/uploads/logo/logo.png"
                                                                          style="height:150px;" alt="logo"/></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="invoice-numb">
                                            <h6 class="text-end mb-10 mt-20">{{ Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:s') }}</h6>
                                            <h6 class="text-end invoice-header-1">Invoice
                                                No: {{$orderInfo->order_number}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-top">
                                <div class="row">
                                    <div class="col-lg-9 col-md-6">
                                        <div class="invoice-number">
                                            <h4 class="invoice-title-1 mb-10">Invoice To</h4>
                                            <p class="invoice-addr-1">
                                                <strong>AliThemes Pty Ltd</strong> <br/>
                                                contactalithemes.com <br/>
                                                PO Box 16122, Collins Street West, <br/>Australia
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="invoice-number">
                                            <h4 class="invoice-title-1 mb-10">Bill To</h4>
                                            <p class="invoice-addr-1">
                                                <strong>NestMart Inc</strong> <br/>
                                                billing@NestMart.com <br/>
                                                205 North Michigan Avenue, <br/>Suite 810 Chicago, 60601, USA
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-9 col-md-6">
                                        <h4 class="invoice-title-1 mb-10">Due Date:</h4>
                                        <p class="invoice-from-1">{{ Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }} </p>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        @if($orderInfo->status == 'pending' || $orderInfo->status == 'processing' || $orderInfo->status == 'completed')
                                            <div class="mt-3">
                                                @if($orderInfo->payment_method === 'paypal' && $orderInfo->is_paid === 1)
                                                    <dd class="-ml-4 ">
                                                        <div class="ml-3 mt-3">
                                                            <h4 class="invoice-title-1 mb-10">Payment Method</h4>
                                                            <img src="/uploads/icon/paypal.png" style="height:50px">

                                                        </div>
                                                    </dd>
                                                @endif
                                                @if($orderInfo->payment_method === 'card' && $orderInfo->is_paid === 1)
                                                    <dd class="-ml-4 ">
                                                        <div class="ml-3 mt-3">
                                                            <h4 class="invoice-title-1 mb-10">Payment Method</h4>
                                                            <img src="/uploads/icon/stripe.png" style="height:60px">

                                                        </div>
                                                    </dd>
                                                @endif
                                                @if($orderInfo->payment_method === 'wire transfer' && $orderInfo->is_paid === 1)
                                                    <dd class="-ml-4 ">

                                                        <div class="ml-3 mt-3">
                                                            <h4 class="invoice-title-1 mb-10">Payment Method</h4>
                                                            <img src="/uploads/icon/bonifico.png" style="height:70px">

                                                        </div>
                                                    </dd>
                                                @endif
                                                @if($orderInfo->payment_method === 'paypal' && $orderInfo->is_paid === 0)
                                                    <dd class="-ml-4 ">
                                                        <div class="ml-3 mt-3">
                                                            <h4 class="invoice-title-1 mb-10">Payment Method</h4>
                                                            <img src="/uploads/icon/paypal.png" style="height:50px">

                                                        </div>
                                                    </dd>
                                                @endif
                                                @if($orderInfo->payment_method === 'wire transfer' && $orderInfo->is_paid === 0)
                                                    <dd class="-ml-4 ">
                                                        <div class="ml-3 mt-3">
                                                            <h5 class="mb-2"><strong>Metodo di pagamento:</strong></h5>
                                                            <img src="/uploads/icon/bonifico.png" style="height:70px">

                                                        </div>
                                                    </dd>
                                                @endif
                                            </div>
                                        @else
                                            <div class="mt-3">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 ">
                                        Ordine annullato
                                    </span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-center">
                                <div class="table-responsive">
                                    <table class="table table-striped invoice-table">
                                        <thead class="bg-active">
                                        <tr>
                                            <th>Item name</th>
                                            <th class="text-center">Unit Price</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-right">Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orderInfo->orderItem as $item)
                                            <tr>
                                                <td>
                                                    <div class="item-desc-1">
                                                        <span>{{ $item->product->name}}</span>
                                                        <small>SKU: {{ $item->product->ItemCode}}</small>
                                                    </div>
                                                </td>
                                                <td class="text-center">€ {{ price($item->price) }}</td>
                                                <td class="text-center">{{ $item->quantity }}</td>
                                                <td class="text-right">€ {{ price($item->price) }}</td>
                                            </tr>
                                        @endforeach

                                        <tr>
                                            <td colspan="3" class="text-end f-w-600">Tax</td>
                                            <td class="text-right">€ {{ price($newTax)}}</td>
                                        </tr>
                                        @if($orderInfo->discount)
                                            <tr>
                                                <td colspan="3" class="text-end f-w-600">{{__('cart.coupon')}}:</td>
                                                <td class="text-right">- € {{ price($orderInfo->discount) }}</td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <td colspan="3" class="text-end f-w-600">Grand Total</td>
                                            <td class="text-right f-w-600">€ {{ price($orderInfo->grand_total) }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="invoice-bottom">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div>
                                            <h3 class="invoice-title-1">Important Note</h3>
                                            <ul class="important-notes-list-1">
                                                <li>All amounts shown on this invoice are in US dollars</li>
                                                <li>finance charge of 1.5% will be made on unpaid balances after 30
                                                    days.
                                                </li>
                                                <li>Once order done, money can't refund</li>
                                                <li>Delivery might delay due to some external dependency</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-offsite">
                                        <div class="text-end">
                                            <p class="mb-0 text-13">Thank you for your business</p>

                                            <div class="mobile-social-icon mt-50 print-hide">
                                                <h6>Follow Us</h6>
                                                <a href="#"><img src="/assets/imgs/theme/icons/icon-facebook-white.svg"
                                                                 alt=""/></a>
                                                <a href="#"><img src="/assets/imgs/theme/icons/icon-twitter-white.svg"
                                                                 alt=""/></a>
                                                <a href="#"><img src="/assets/imgs/theme/icons/icon-instagram-white.svg"
                                                                 alt=""/></a>
                                                <a href="#"><img src="/assets/imgs/theme/icons/icon-pinterest-white.svg"
                                                                 alt=""/></a>
                                                <a href="#"><img src="/assets/imgs/theme/icons/icon-youtube-white.svg"
                                                                 alt=""/></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-btn-section clearfix d-print-none">
                            <a href="javascript:window.print()" class="btn btn-lg btn-custom btn-print hover-up"> <img
                                    src="/assets/imgs/theme/icons/icon-print.svg" alt=""/> Print </a>
                            <a id="invoice_download_btn" class="btn btn-lg btn-custom btn-download hover-up"> <img
                                    src="/assets/imgs/theme/icons/icon-download.svg" alt=""/> Download </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('extraJs')
    <script src="/assets/js/invoice/jspdf.min.js"></script>
    <script src="/assets/js/invoice/invoice.js"></script>
@endsection
