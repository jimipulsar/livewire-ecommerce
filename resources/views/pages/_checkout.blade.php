@extends('layouts.main')

@section('title', __('checkout.seo.title'))

@section('description', __('checkout.seo.description'))
@section('extra-css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://js.stripe.com/v3/"></script>

@endsection
@section('content')
    <div id="pageloader">
        <img src="/uploads/gif/loader3.gif" alt="Caricamento..." style="background-size:cover;width:150px;"/>
    </div>
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Shop
                <span></span> Checkout
            </div>
        </div>
    </div>
    <div class="container mb-80 mt-50">
        <div class="row">
            <div class="col-lg-8 mb-40">
                <h1 class="heading-2 mb-10">Checkout</h1>
                <div class="d-flex justify-content-between">
                    <h6 class="text-body">There are <span class="text-brand">3</span> products in your cart</h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7">
                <div class="row">
                    <h4 class="mb-30">{!! __('checkout.address.first') !!}</h4>
                    <form action="{{ route('checkout.store', app()->getLocale()) }}" method="POST"
                          enctype="multipart/form-data"
                          id="payment-form">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label>{!! __('checkout.address.2') !!} *</label>
                                    <input type="text" class="notranslate "
                                           id="billing_name"
                                           name="billing_name"
                                           value="{{$customer->billing_name}}" required=""
                                           data-msg="Please enter your frist name."
                                           data-error-class="notranslate u-has-error"
                                           data-success-class="notranslate u-has-success"
                                           autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label>{!! __('checkout.address.3') !!} *</label>
                                    <input type="text" class="notranslate "
                                           id="billing_surname"
                                           name="billing_surname" value="{{$customer->billing_surname}}"
                                           data-msg="Please enter your last name."
                                           data-error-class="notranslate u-has-error"
                                           data-success-class="notranslate u-has-success">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label>{{__('customer.address.4')}}</label>
                                <input type="text" class="notranslate " id="billing_company"
                                       name="billing_company" value="{{$customer->billing_company}}"
                                       aria-label=""
                                       data-msg="Please enter a company name."
                                       data-error-class="notranslate u-has-error"
                                       data-success-class="notranslate u-has-success">
                            </div>

                            <div class="form-group">
                                <label>{!! __('checkout.address.6') !!} *</label>
                                <input type="text" class="notranslate " id="billing_address"
                                       name="billing_address" value="{{$customer->billing_address}}" required=""
                                       data-msg="Please enter a valid address."
                                       data-error-class="notranslate u-has-error"
                                       data-success-class="notranslate u-has-success">
                            </div>
                        </div>
                        <div class="row shipping_calculator">
                            <div class="form-group col-lg-4">
                                <label>Nazione *</label>
                                <div class="notranslate custom_select">
                                    <select name="shipping_country" class="form-control select-active">
                                        <option
                                                value="AF" {{ $customer->shipping_country == 'AF' ? 'selected' : '' }}>
                                            Afghanistan
                                        </option>
                                        <option
                                                value="AX" {{ $customer->shipping_country == 'AX' ? 'selected' : '' }}>
                                            Åland Islands
                                        </option>
                                        <option
                                                value="AL" {{ $customer->shipping_country == 'AL' ? 'selected' : '' }}>
                                            Albania
                                        </option>
                                        <option
                                                value="DZ" {{ $customer->shipping_country == 'DZ' ? 'selected' : '' }}>
                                            Algeria
                                        </option>
                                        <option
                                                value="AS" {{ $customer->shipping_country == 'AS' ? 'selected' : '' }}>
                                            American Samoa
                                        </option>
                                        <option
                                                value="AD" {{ $customer->shipping_country == 'AD' ? 'selected' : '' }}>
                                            Andorra
                                        </option>
                                        <option
                                                value="AO" {{ $customer->shipping_country == 'AO' ? 'selected' : '' }}>
                                            Angola
                                        </option>
                                        <option
                                                value="AI" {{ $customer->shipping_country == 'AI' ? 'selected' : '' }}>
                                            Anguilla
                                        </option>
                                        <option
                                                value="AQ" {{ $customer->shipping_country == 'AQ' ? 'selected' : '' }}>
                                            Antarctica
                                        </option>
                                        <option
                                                value="AG" {{ $customer->shipping_country == 'AG' ? 'selected' : '' }}>
                                            Antigua and Barbuda
                                        </option>
                                        <option
                                                value="AR" {{ $customer->shipping_country == 'AR' ? 'selected' : '' }}>
                                            Argentina
                                        </option>
                                        <option
                                                value="AM" {{ $customer->shipping_country == 'AM' ? 'selected' : '' }}>
                                            Armenia
                                        </option>
                                        <option
                                                value="AW" {{ $customer->shipping_country == 'AW' ? 'selected' : '' }}>
                                            Aruba
                                        </option>
                                        <option
                                                value="AU" {{ $customer->shipping_country == 'AU' ? 'selected' : '' }}>
                                            Australia
                                        </option>
                                        <option
                                                value="AT" {{ $customer->shipping_country == 'AT' ? 'selected' : '' }}>
                                            Austria
                                        </option>
                                        <option
                                                value="AZ" {{ $customer->shipping_country == 'AZ' ? 'selected' : '' }}>
                                            Azerbaijan
                                        </option>
                                        <option
                                                value="BS" {{ $customer->shipping_country == 'BS' ? 'selected' : '' }}>
                                            Bahamas
                                        </option>
                                        <option
                                                value="BH" {{ $customer->shipping_country == 'BH' ? 'selected' : '' }}>
                                            Bahrain
                                        </option>
                                        <option
                                                value="BD" {{ $customer->shipping_country == 'BD' ? 'selected' : '' }}>
                                            Bangladesh
                                        </option>
                                        <option
                                                value="BB" {{ $customer->shipping_country == 'BB' ? 'selected' : '' }}>
                                            Barbados
                                        </option>
                                        <option
                                                value="BY" {{ $customer->shipping_country == 'BY' ? 'selected' : '' }}>
                                            Belarus
                                        </option>
                                        <option
                                                value="BE" {{ $customer->shipping_country == 'BE' ? 'selected' : '' }}>
                                            Belgium
                                        </option>
                                        <option
                                                value="BZ" {{ $customer->shipping_country == 'BZ' ? 'selected' : '' }}>
                                            Belize
                                        </option>
                                        <option
                                                value="BJ" {{ $customer->shipping_country == 'BJ' ? 'selected' : '' }}>
                                            Benin
                                        </option>
                                        <option
                                                value="BM" {{ $customer->shipping_country == 'BM' ? 'selected' : '' }}>
                                            Bermuda
                                        </option>
                                        <option
                                                value="BT" {{ $customer->shipping_country == 'BT' ? 'selected' : '' }}>
                                            Bhutan
                                        </option>
                                        <option
                                                value="BO" {{ $customer->shipping_country == 'BO' ? 'selected' : '' }}>
                                            Bolivia, Plurinational State of
                                        </option>
                                        <option
                                                value="BQ" {{ $customer->shipping_country == 'BQ' ? 'selected' : '' }}>
                                            Bonaire, Sint Eustatius and Saba
                                        </option>
                                        <option
                                                value="BA" {{ $customer->shipping_country == 'BA' ? 'selected' : '' }}>
                                            Bosnia and Herzegovina
                                        </option>
                                        <option
                                                value="BW" {{ $customer->shipping_country == 'BW' ? 'selected' : '' }}>
                                            Botswana
                                        </option>
                                        <option
                                                value="BV" {{ $customer->shipping_country == 'BV' ? 'selected' : '' }}>
                                            Bouvet Island
                                        </option>
                                        <option
                                                value="BR" {{ $customer->shipping_country == 'BR' ? 'selected' : '' }}>
                                            Brazil
                                        </option>
                                        <option
                                                value="IO" {{ $customer->shipping_country == 'IO' ? 'selected' : '' }}>
                                            British Indian Ocean Territory
                                        </option>
                                        <option
                                                value="BN" {{ $customer->shipping_country == 'BN' ? 'selected' : '' }}>
                                            Brunei Darussalam
                                        </option>
                                        <option
                                                value="BG" {{ $customer->shipping_country == 'BG' ? 'selected' : '' }}>
                                            Bulgaria
                                        </option>
                                        <option
                                                value="BF" {{ $customer->shipping_country == 'BF' ? 'selected' : '' }}>
                                            Burkina Faso
                                        </option>
                                        <option
                                                value="BI" {{ $customer->shipping_country == 'BI' ? 'selected' : '' }}>
                                            Burundi
                                        </option>
                                        <option
                                                value="KH" {{ $customer->shipping_country == 'KH' ? 'selected' : '' }}>
                                            Cambodia
                                        </option>
                                        <option
                                                value="CM" {{ $customer->shipping_country == 'CM' ? 'selected' : '' }}>
                                            Cameroon
                                        </option>
                                        <option
                                                value="CA" {{ $customer->shipping_country == 'CA' ? 'selected' : '' }}>
                                            Canada
                                        </option>
                                        <option
                                                value="CV" {{ $customer->shipping_country == 'CV' ? 'selected' : '' }}>
                                            Cape Verde
                                        </option>
                                        <option
                                                value="KY" {{ $customer->shipping_country == 'KY' ? 'selected' : '' }}>
                                            Cayman Islands
                                        </option>
                                        <option
                                                value="CF" {{ $customer->shipping_country == 'CF' ? 'selected' : '' }}>
                                            Central African Republic
                                        </option>
                                        <option
                                                value="TD" {{ $customer->shipping_country == 'TD' ? 'selected' : '' }}>
                                            Chad
                                        </option>
                                        <option
                                                value="CL" {{ $customer->shipping_country == 'CL' ? 'selected' : '' }}>
                                            Chile
                                        </option>
                                        <option
                                                value="CN" {{ $customer->shipping_country == 'CN' ? 'selected' : '' }}>
                                            China
                                        </option>
                                        <option
                                                value="CX" {{ $customer->shipping_country == 'CX' ? 'selected' : '' }}>
                                            Christmas Island
                                        </option>
                                        <option
                                                value="CC" {{ $customer->shipping_country == 'CC' ? 'selected' : '' }}>
                                            Cocos (Keeling) Islands
                                        </option>
                                        <option
                                                value="CO" {{ $customer->shipping_country == 'CO' ? 'selected' : '' }}>
                                            Colombia
                                        </option>
                                        <option
                                                value="KM" {{ $customer->shipping_country == 'KM' ? 'selected' : '' }}>
                                            Comoros
                                        </option>
                                        <option
                                                value="CG" {{ $customer->shipping_country == 'CG' ? 'selected' : '' }}>
                                            Congo
                                        </option>
                                        <option
                                                value="CD" {{ $customer->shipping_country == 'CD' ? 'selected' : '' }}>
                                            Congo, the Democratic Republic of the
                                        </option>
                                        <option
                                                value="CK" {{ $customer->shipping_country == 'CK' ? 'selected' : '' }}>
                                            Cook Islands
                                        </option>
                                        <option
                                                value="CR" {{ $customer->shipping_country == 'CR' ? 'selected' : '' }}>
                                            Costa Rica
                                        </option>
                                        <option
                                                value="CI" {{ $customer->shipping_country == 'CI' ? 'selected' : '' }}>
                                            Côte d'Ivoire
                                        </option>
                                        <option
                                                value="HR" {{ $customer->shipping_country == 'HR' ? 'selected' : '' }}>
                                            Croatia
                                        </option>
                                        <option
                                                value="CU" {{ $customer->shipping_country == 'CU' ? 'selected' : '' }}>
                                            Cuba
                                        </option>
                                        <option
                                                value="CW" {{ $customer->shipping_country == 'CW' ? 'selected' : '' }}>
                                            Curaçao
                                        </option>
                                        <option
                                                value="CY" {{ $customer->shipping_country == 'CY' ? 'selected' : '' }}>
                                            Cyprus
                                        </option>
                                        <option
                                                value="CZ" {{ $customer->shipping_country == 'CZ' ? 'selected' : '' }}>
                                            Czech Republic
                                        </option>
                                        <option
                                                value="DK" {{ $customer->shipping_country == 'DK' ? 'selected' : '' }}>
                                            Denmark
                                        </option>
                                        <option
                                                value="DJ" {{ $customer->shipping_country == 'DJ' ? 'selected' : '' }}>
                                            Djibouti
                                        </option>
                                        <option
                                                value="DM" {{ $customer->shipping_country == 'DM' ? 'selected' : '' }}>
                                            Dominica
                                        </option>
                                        <option
                                                value="DO" {{ $customer->shipping_country == 'DO' ? 'selected' : '' }}>
                                            Dominican Republic
                                        </option>
                                        <option
                                                value="EC" {{ $customer->shipping_country == 'EC' ? 'selected' : '' }}>
                                            Ecuador
                                        </option>
                                        <option
                                                value="EG" {{ $customer->shipping_country == 'EG' ? 'selected' : '' }}>
                                            Egypt
                                        </option>
                                        <option
                                                value="SV" {{ $customer->shipping_country == 'SV' ? 'selected' : '' }}>
                                            El Salvador
                                        </option>
                                        <option
                                                value="GQ" {{ $customer->shipping_country == 'GQ' ? 'selected' : '' }}>
                                            Equatorial Guinea
                                        </option>
                                        <option
                                                value="ER" {{ $customer->shipping_country == 'ER' ? 'selected' : '' }}>
                                            Eritrea
                                        </option>
                                        <option
                                                value="EE" {{ $customer->shipping_country == 'EE' ? 'selected' : '' }}>
                                            Estonia
                                        </option>
                                        <option
                                                value="ET" {{ $customer->shipping_country == 'ET' ? 'selected' : '' }}>
                                            Ethiopia
                                        </option>
                                        <option
                                                value="FK" {{ $customer->shipping_country == 'FK' ? 'selected' : '' }}>
                                            Falkland Islands (Malvinas)
                                        </option>
                                        <option
                                                value="FO" {{ $customer->shipping_country == 'FO' ? 'selected' : '' }}>
                                            Faroe Islands
                                        </option>
                                        <option
                                                value="FJ" {{ $customer->shipping_country == 'FJ' ? 'selected' : '' }}>
                                            Fiji
                                        </option>
                                        <option
                                                value="FI" {{ $customer->shipping_country == 'FI' ? 'selected' : '' }}>
                                            Finland
                                        </option>
                                        <option
                                                value="FR" {{ $customer->shipping_country == 'FR' ? 'selected' : '' }}>
                                            France
                                        </option>
                                        <option
                                                value="GF" {{ $customer->shipping_country == 'GF' ? 'selected' : '' }}>
                                            French Guiana
                                        </option>
                                        <option
                                                value="PF" {{ $customer->shipping_country == 'PF' ? 'selected' : '' }}>
                                            French Polynesia
                                        </option>
                                        <option
                                                value="TF" {{ $customer->shipping_country == 'TF' ? 'selected' : '' }}>
                                            French Southern Territories
                                        </option>
                                        <option
                                                value="GA" {{ $customer->shipping_country == 'GA' ? 'selected' : '' }}>
                                            Gabon
                                        </option>
                                        <option
                                                value="GM" {{ $customer->shipping_country == 'GM' ? 'selected' : '' }}>
                                            Gambia
                                        </option>
                                        <option
                                                value="GE" {{ $customer->shipping_country == 'GE' ? 'selected' : '' }}>
                                            Georgia
                                        </option>
                                        <option
                                                value="DE" {{ $customer->shipping_country == 'DE' ? 'selected' : '' }}>
                                            Germany
                                        </option>
                                        <option
                                                value="GH" {{ $customer->shipping_country == 'GH' ? 'selected' : '' }}>
                                            Ghana
                                        </option>
                                        <option
                                                value="GI" {{ $customer->shipping_country == 'GI' ? 'selected' : '' }}>
                                            Gibraltar
                                        </option>
                                        <option
                                                value="GR" {{ $customer->shipping_country == 'GR' ? 'selected' : '' }}>
                                            Greece
                                        </option>
                                        <option
                                                value="GL" {{ $customer->shipping_country == 'GL' ? 'selected' : '' }}>
                                            Greenland
                                        </option>
                                        <option
                                                value="GD" {{ $customer->shipping_country == 'GD' ? 'selected' : '' }}>
                                            Grenada
                                        </option>
                                        <option
                                                value="GP" {{ $customer->shipping_country == 'GP' ? 'selected' : '' }}>
                                            Guadeloupe
                                        </option>
                                        <option
                                                value="GU" {{ $customer->shipping_country == 'GU' ? 'selected' : '' }}>
                                            Guam
                                        </option>
                                        <option
                                                value="GT" {{ $customer->shipping_country == 'GT' ? 'selected' : '' }}>
                                            Guatemala
                                        </option>
                                        <option
                                                value="GG" {{ $customer->shipping_country == 'GG' ? 'selected' : '' }}>
                                            Guernsey
                                        </option>
                                        <option
                                                value="GN" {{ $customer->shipping_country == 'GN' ? 'selected' : '' }}>
                                            Guinea
                                        </option>
                                        <option
                                                value="GW" {{ $customer->shipping_country == 'GW' ? 'selected' : '' }}>
                                            Guinea-Bissau
                                        </option>
                                        <option
                                                value="GY" {{ $customer->shipping_country == 'GY' ? 'selected' : '' }}>
                                            Guyana
                                        </option>
                                        <option
                                                value="HT" {{ $customer->shipping_country == 'HT' ? 'selected' : '' }}>
                                            Haiti
                                        </option>
                                        <option
                                                value="HM" {{ $customer->shipping_country == 'HM' ? 'selected' : '' }}>
                                            Heard Island and McDonald Islands
                                        </option>
                                        <option
                                                value="VA" {{ $customer->shipping_country == 'VA' ? 'selected' : '' }}>
                                            Holy See (Vatican City State)
                                        </option>
                                        <option
                                                value="HN" {{ $customer->shipping_country == 'HN' ? 'selected' : '' }}>
                                            Honduras
                                        </option>
                                        <option
                                                value="HK" {{ $customer->shipping_country == 'HK' ? 'selected' : '' }}>
                                            Hong Kong
                                        </option>
                                        <option
                                                value="HU" {{ $customer->shipping_country == 'HU' ? 'selected' : '' }}>
                                            Hungary
                                        </option>
                                        <option
                                                value="IS" {{ $customer->shipping_country == 'IS' ? 'selected' : '' }}>
                                            Iceland
                                        </option>
                                        <option
                                                value="IN" {{ $customer->shipping_country == 'IN' ? 'selected' : '' }}>
                                            India
                                        </option>
                                        <option
                                                value="ID" {{ $customer->shipping_country == 'ID' ? 'selected' : '' }}>
                                            Indonesia
                                        </option>
                                        <option
                                                value="IR" {{ $customer->shipping_country == 'IR' ? 'selected' : '' }}>
                                            Iran, Islamic Republic of
                                        </option>
                                        <option
                                                value="IQ" {{ $customer->shipping_country == 'IQ' ? 'selected' : '' }}>
                                            Iraq
                                        </option>
                                        <option
                                                value="IE" {{ $customer->shipping_country == 'IE' ? 'selected' : '' }}>
                                            Ireland
                                        </option>
                                        <option
                                                value="IM" {{ $customer->shipping_country == 'IM' ? 'selected' : '' }}>
                                            Isle of Man
                                        </option>
                                        <option
                                                value="IL" {{ $customer->shipping_country == 'IL' ? 'selected' : '' }}>
                                            Israel
                                        </option>
                                        <option
                                                value="IT" {{ $customer->shipping_country == 'IT' ? 'selected' : '' }}>
                                            Italy
                                        </option>
                                        <option
                                                value="JM" {{ $customer->shipping_country == 'JM' ? 'selected' : '' }}>
                                            Jamaica
                                        </option>
                                        <option
                                                value="JP" {{ $customer->shipping_country == 'JP' ? 'selected' : '' }}>
                                            Japan
                                        </option>
                                        <option
                                                value="JE" {{ $customer->shipping_country == 'JE' ? 'selected' : '' }}>
                                            Jersey
                                        </option>
                                        <option
                                                value="JO" {{ $customer->shipping_country == 'JO' ? 'selected' : '' }}>
                                            Jordan
                                        </option>
                                        <option
                                                value="KZ" {{ $customer->shipping_country == 'KZ' ? 'selected' : '' }}>
                                            Kazakhstan
                                        </option>
                                        <option
                                                value="KE" {{ $customer->shipping_country == 'KE' ? 'selected' : '' }}>
                                            Kenya
                                        </option>
                                        <option
                                                value="KI" {{ $customer->shipping_country == 'KI' ? 'selected' : '' }}>
                                            Kiribati
                                        </option>
                                        <option
                                                value="KP" {{ $customer->shipping_country == 'KP' ? 'selected' : '' }}>
                                            Korea, Democratic People's Republic of
                                        </option>
                                        <option
                                                value="KR" {{ $customer->shipping_country == 'KR' ? 'selected' : '' }}>
                                            Korea, Republic of
                                        </option>
                                        <option
                                                value="KW" {{ $customer->shipping_country == 'KW' ? 'selected' : '' }}>
                                            Kuwait
                                        </option>
                                        <option
                                                value="KG" {{ $customer->shipping_country == 'KG' ? 'selected' : '' }}>
                                            Kyrgyzstan
                                        </option>
                                        <option
                                                value="LA" {{ $customer->shipping_country == 'LA' ? 'selected' : '' }}>
                                            Lao People's Democratic Republic
                                        </option>
                                        <option
                                                value="LV" {{ $customer->shipping_country == 'LV' ? 'selected' : '' }}>
                                            Latvia
                                        </option>
                                        <option
                                                value="LB" {{ $customer->shipping_country == 'LB' ? 'selected' : '' }}>
                                            Lebanon
                                        </option>
                                        <option
                                                value="LS" {{ $customer->shipping_country == 'LS' ? 'selected' : '' }}>
                                            Lesotho
                                        </option>
                                        <option
                                                value="LR" {{ $customer->shipping_country == 'LR' ? 'selected' : '' }}>
                                            Liberia
                                        </option>
                                        <option
                                                value="LY" {{ $customer->shipping_country == 'LY' ? 'selected' : '' }}>
                                            Libya
                                        </option>
                                        <option
                                                value="LI" {{ $customer->shipping_country == 'LI' ? 'selected' : '' }}>
                                            Liechtenstein
                                        </option>
                                        <option
                                                value="LT" {{ $customer->shipping_country == 'LT' ? 'selected' : '' }}>
                                            Lithuania
                                        </option>
                                        <option
                                                value="LU" {{ $customer->shipping_country == 'LU' ? 'selected' : '' }}>
                                            Luxembourg
                                        </option>
                                        <option
                                                value="MO" {{ $customer->shipping_country == 'MO' ? 'selected' : '' }}>
                                            Macao
                                        </option>
                                        <option
                                                value="MK" {{ $customer->shipping_country == 'MK' ? 'selected' : '' }}>
                                            Macedonia, the former Yugoslav Republic
                                            of
                                        </option>
                                        <option
                                                value="MG" {{ $customer->shipping_country == 'MG' ? 'selected' : '' }}>
                                            Madagascar
                                        </option>
                                        <option
                                                value="MW" {{ $customer->shipping_country == 'MW' ? 'selected' : '' }}>
                                            Malawi
                                        </option>
                                        <option
                                                value="MY" {{ $customer->shipping_country == 'MY' ? 'selected' : '' }}>
                                            Malaysia
                                        </option>
                                        <option
                                                value="MV" {{ $customer->shipping_country == 'MV' ? 'selected' : '' }}>
                                            Maldives
                                        </option>
                                        <option
                                                value="ML" {{ $customer->shipping_country == 'ML' ? 'selected' : '' }}>
                                            Mali
                                        </option>
                                        <option
                                                value="MT" {{ $customer->shipping_country == 'MT' ? 'selected' : '' }}>
                                            Malta
                                        </option>
                                        <option
                                                value="MH" {{ $customer->shipping_country == 'MH' ? 'selected' : '' }}>
                                            Marshall Islands
                                        </option>
                                        <option
                                                value="MQ" {{ $customer->shipping_country == 'MQ' ? 'selected' : '' }}>
                                            Martinique
                                        </option>
                                        <option
                                                value="MR" {{ $customer->shipping_country == 'MR' ? 'selected' : '' }}>
                                            Mauritania
                                        </option>
                                        <option
                                                value="MU" {{ $customer->shipping_country == 'MU' ? 'selected' : '' }}>
                                            Mauritius
                                        </option>
                                        <option
                                                value="YT" {{ $customer->shipping_country == 'YT' ? 'selected' : '' }}>
                                            Mayotte
                                        </option>
                                        <option
                                                value="MX" {{ $customer->shipping_country == 'MX' ? 'selected' : '' }}>
                                            Mexico
                                        </option>
                                        <option
                                                value="FM" {{ $customer->shipping_country == 'FM' ? 'selected' : '' }}>
                                            Micronesia, Federated States of
                                        </option>
                                        <option
                                                value="MD" {{ $customer->shipping_country == 'MD' ? 'selected' : '' }}>
                                            Moldova, Republic of
                                        </option>
                                        <option
                                                value="MC" {{ $customer->shipping_country == 'MC' ? 'selected' : '' }}>
                                            Monaco
                                        </option>
                                        <option
                                                value="MN" {{ $customer->shipping_country == 'MN' ? 'selected' : '' }}>
                                            Mongolia
                                        </option>
                                        <option
                                                value="ME" {{ $customer->shipping_country == 'ME' ? 'selected' : '' }}>
                                            Montenegro
                                        </option>
                                        <option
                                                value="MS" {{ $customer->shipping_country == 'MS' ? 'selected' : '' }}>
                                            Montserrat
                                        </option>
                                        <option
                                                value="MA" {{ $customer->shipping_country == 'MA' ? 'selected' : '' }}>
                                            Morocco
                                        </option>
                                        <option
                                                value="MZ" {{ $customer->shipping_country == 'MZ' ? 'selected' : '' }}>
                                            Mozambique
                                        </option>
                                        <option
                                                value="MM" {{ $customer->shipping_country == 'MM' ? 'selected' : '' }}>
                                            Myanmar
                                        </option>
                                        <option
                                                value="NA" {{ $customer->shipping_country == 'NA' ? 'selected' : '' }}>
                                            Namibia
                                        </option>
                                        <option
                                                value="NR" {{ $customer->shipping_country == 'NR' ? 'selected' : '' }}>
                                            Nauru
                                        </option>
                                        <option
                                                value="NP" {{ $customer->shipping_country == 'NP' ? 'selected' : '' }}>
                                            Nepal
                                        </option>
                                        <option
                                                value="NL" {{ $customer->shipping_country == 'NL' ? 'selected' : '' }}>
                                            Netherlands
                                        </option>
                                        <option
                                                value="NC" {{ $customer->shipping_country == 'NC' ? 'selected' : '' }}>
                                            New Caledonia
                                        </option>
                                        <option
                                                value="NZ" {{ $customer->shipping_country == 'NZ' ? 'selected' : '' }}>
                                            New Zealand
                                        </option>
                                        <option
                                                value="NI" {{ $customer->shipping_country == 'NI' ? 'selected' : '' }}>
                                            Nicaragua
                                        </option>
                                        <option
                                                value="NE" {{ $customer->shipping_country == 'NE' ? 'selected' : '' }}>
                                            Niger
                                        </option>
                                        <option
                                                value="NG" {{ $customer->shipping_country == 'NG' ? 'selected' : '' }}>
                                            Nigeria
                                        </option>
                                        <option
                                                value="NU" {{ $customer->shipping_country == 'NU' ? 'selected' : '' }}>
                                            Niue
                                        </option>
                                        <option
                                                value="NF" {{ $customer->shipping_country == 'NF' ? 'selected' : '' }}>
                                            Norfolk Island
                                        </option>
                                        <option
                                                value="MP" {{ $customer->shipping_country == 'MP' ? 'selected' : '' }}>
                                            Northern Mariana Islands
                                        </option>
                                        <option
                                                value="NO" {{ $customer->shipping_country == 'NO' ? 'selected' : '' }}>
                                            Norway
                                        </option>
                                        <option
                                                value="OM" {{ $customer->shipping_country == 'OM' ? 'selected' : '' }}>
                                            Oman
                                        </option>
                                        <option
                                                value="PK" {{ $customer->shipping_country == 'PK' ? 'selected' : '' }}>
                                            Pakistan
                                        </option>
                                        <option
                                                value="PW" {{ $customer->shipping_country == 'PW' ? 'selected' : '' }}>
                                            Palau
                                        </option>
                                        <option
                                                value="PS" {{ $customer->shipping_country == 'PS' ? 'selected' : '' }}>
                                            Palestinian Territory, Occupied
                                        </option>
                                        <option
                                                value="PA" {{ $customer->shipping_country == 'PA' ? 'selected' : '' }}>
                                            Panama
                                        </option>
                                        <option
                                                value="PG" {{ $customer->shipping_country == 'PG' ? 'selected' : '' }}>
                                            Papua New Guinea
                                        </option>
                                        <option
                                                value="PY" {{ $customer->shipping_country == 'PY' ? 'selected' : '' }}>
                                            Paraguay
                                        </option>
                                        <option
                                                value="PE" {{ $customer->shipping_country == 'PE' ? 'selected' : '' }}>
                                            Peru
                                        </option>
                                        <option
                                                value="PH" {{ $customer->shipping_country == 'PH' ? 'selected' : '' }}>
                                            Philippines
                                        </option>
                                        <option
                                                value="PN" {{ $customer->shipping_country == 'PN' ? 'selected' : '' }}>
                                            Pitcairn
                                        </option>
                                        <option
                                                value="PL" {{ $customer->shipping_country == 'PL' ? 'selected' : '' }}>
                                            Poland
                                        </option>
                                        <option
                                                value="PT" {{ $customer->shipping_country == 'PT' ? 'selected' : '' }}>
                                            Portugal
                                        </option>
                                        <option
                                                value="PR" {{ $customer->shipping_country == 'PR' ? 'selected' : '' }}>
                                            Puerto Rico
                                        </option>
                                        <option
                                                value="QA" {{ $customer->shipping_country == 'QA' ? 'selected' : '' }}>
                                            Qatar
                                        </option>
                                        <option
                                                value="RE" {{ $customer->shipping_country == 'RE' ? 'selected' : '' }}>
                                            Réunion
                                        </option>
                                        <option
                                                value="RO" {{ $customer->shipping_country == 'RO' ? 'selected' : '' }}>
                                            Romania
                                        </option>
                                        <option
                                                value="RU" {{ $customer->shipping_country == 'RU' ? 'selected' : '' }}>
                                            Russian Federation
                                        </option>
                                        <option
                                                value="RW" {{ $customer->shipping_country == 'RW' ? 'selected' : '' }}>
                                            Rwanda
                                        </option>
                                        <option
                                                value="BL" {{ $customer->shipping_country == 'BL' ? 'selected' : '' }}>
                                            Saint Barthélemy
                                        </option>
                                        <option
                                                value="SH" {{ $customer->shipping_country == 'SH' ? 'selected' : '' }}>
                                            Saint Helena, Ascension and Tristan da
                                            Cunha
                                        </option>
                                        <option
                                                value="KN" {{ $customer->shipping_country == 'KN' ? 'selected' : '' }}>
                                            Saint Kitts and Nevis
                                        </option>
                                        <option
                                                value="LC" {{ $customer->shipping_country == 'LC' ? 'selected' : '' }}>
                                            Saint Lucia
                                        </option>
                                        <option
                                                value="MF" {{ $customer->shipping_country == 'MF' ? 'selected' : '' }}>
                                            Saint Martin (French part)
                                        </option>
                                        <option
                                                value="PM" {{ $customer->shipping_country == 'PM' ? 'selected' : '' }}>
                                            Saint Pierre and Miquelon
                                        </option>
                                        <option
                                                value="VC" {{ $customer->shipping_country == 'VC' ? 'selected' : '' }}>
                                            Saint Vincent and the Grenadines
                                        </option>
                                        <option
                                                value="WS" {{ $customer->shipping_country == 'WS' ? 'selected' : '' }}>
                                            Samoa
                                        </option>
                                        <option
                                                value="SM" {{ $customer->shipping_country == 'SM' ? 'selected' : '' }}>
                                            San Marino
                                        </option>
                                        <option
                                                value="ST" {{ $customer->shipping_country == 'ST' ? 'selected' : '' }}>
                                            Sao Tome and Principe
                                        </option>
                                        <option
                                                value="SA" {{ $customer->shipping_country == 'SA' ? 'selected' : '' }}>
                                            Saudi Arabia
                                        </option>
                                        <option
                                                value="SN" {{ $customer->shipping_country == 'SN' ? 'selected' : '' }}>
                                            Senegal
                                        </option>
                                        <option
                                                value="RS" {{ $customer->shipping_country == 'RS' ? 'selected' : '' }}>
                                            Serbia
                                        </option>
                                        <option
                                                value="SC" {{ $customer->shipping_country == 'SC' ? 'selected' : '' }}>
                                            Seychelles
                                        </option>
                                        <option
                                                value="SL" {{ $customer->shipping_country == 'SL' ? 'selected' : '' }}>
                                            Sierra Leone
                                        </option>
                                        <option
                                                value="SG" {{ $customer->shipping_country == 'SG' ? 'selected' : '' }}>
                                            Singapore
                                        </option>
                                        <option
                                                value="SX" {{ $customer->shipping_country == 'SX' ? 'selected' : '' }}>
                                            Sint Maarten (Dutch part)
                                        </option>
                                        <option
                                                value="SK" {{ $customer->shipping_country == 'SK' ? 'selected' : '' }}>
                                            Slovakia
                                        </option>
                                        <option
                                                value="SI" {{ $customer->shipping_country == 'SI' ? 'selected' : '' }}>
                                            Slovenia
                                        </option>
                                        <option
                                                value="SB" {{ $customer->shipping_country == 'SB' ? 'selected' : '' }}>
                                            Solomon Islands
                                        </option>
                                        <option
                                                value="SO" {{ $customer->shipping_country == 'SO' ? 'selected' : '' }}>
                                            Somalia
                                        </option>
                                        <option
                                                value="ZA" {{ $customer->shipping_country == 'ZA' ? 'selected' : '' }}>
                                            South Africa
                                        </option>
                                        <option
                                                value="GS" {{ $customer->shipping_country == 'GS' ? 'selected' : '' }}>
                                            South Georgia and the South Sandwich
                                            Islands
                                        </option>
                                        <option
                                                value="SS" {{ $customer->shipping_country == 'SS' ? 'selected' : '' }}>
                                            South Sudan
                                        </option>
                                        <option
                                                value="ES" {{ $customer->shipping_country == 'ES' ? 'selected' : '' }}>
                                            Spain
                                        </option>
                                        <option
                                                value="LK" {{ $customer->shipping_country == 'LK' ? 'selected' : '' }}>
                                            Sri Lanka
                                        </option>
                                        <option
                                                value="SD" {{ $customer->shipping_country == 'SD' ? 'selected' : '' }}>
                                            Sudan
                                        </option>
                                        <option
                                                value="SR" {{ $customer->shipping_country == 'SR' ? 'selected' : '' }}>
                                            Suriname
                                        </option>
                                        <option
                                                value="SJ" {{ $customer->shipping_country == 'SJ' ? 'selected' : '' }}>
                                            Svalbard and Jan Mayen
                                        </option>
                                        <option
                                                value="SZ" {{ $customer->shipping_country == 'SZ' ? 'selected' : '' }}>
                                            Swaziland
                                        </option>
                                        <option
                                                value="SE" {{ $customer->shipping_country == 'SE' ? 'selected' : '' }}>
                                            Sweden
                                        </option>
                                        <option
                                                value="CH" {{ $customer->shipping_country == 'CH' ? 'selected' : '' }}>
                                            Switzerland
                                        </option>
                                        <option
                                                value="SY" {{ $customer->shipping_country == 'SY' ? 'selected' : '' }}>
                                            Syrian Arab Republic
                                        </option>
                                        <option
                                                value="TW" {{ $customer->shipping_country == 'TW' ? 'selected' : '' }}>
                                            Taiwan, Province of China
                                        </option>
                                        <option
                                                value="TJ" {{ $customer->shipping_country == 'TJ' ? 'selected' : '' }}>
                                            Tajikistan
                                        </option>
                                        <option
                                                value="TZ" {{ $customer->shipping_country == 'TZ' ? 'selected' : '' }}>
                                            Tanzania, United Republic of
                                        </option>
                                        <option
                                                value="TH" {{ $customer->shipping_country == 'TH' ? 'selected' : '' }}>
                                            Thailand
                                        </option>
                                        <option
                                                value="TL" {{ $customer->shipping_country == 'TL' ? 'selected' : '' }}>
                                            Timor-Leste
                                        </option>
                                        <option
                                                value="TG" {{ $customer->shipping_country == 'TG' ? 'selected' : '' }}>
                                            Togo
                                        </option>
                                        <option
                                                value="TK" {{ $customer->shipping_country == 'TK' ? 'selected' : '' }}>
                                            Tokelau
                                        </option>
                                        <option
                                                value="TO" {{ $customer->shipping_country == 'TO' ? 'selected' : '' }}>
                                            Tonga
                                        </option>
                                        <option
                                                value="TT" {{ $customer->shipping_country == 'TT' ? 'selected' : '' }}>
                                            Trinidad and Tobago
                                        </option>
                                        <option
                                                value="TN" {{ $customer->shipping_country == 'TN' ? 'selected' : '' }}>
                                            Tunisia
                                        </option>
                                        <option
                                                value="TR" {{ $customer->shipping_country == 'TR' ? 'selected' : '' }}>
                                            Turkey
                                        </option>
                                        <option
                                                value="TM" {{ $customer->shipping_country == 'TM' ? 'selected' : '' }}>
                                            Turkmenistan
                                        </option>
                                        <option
                                                value="TC" {{ $customer->shipping_country == 'TC' ? 'selected' : '' }}>
                                            Turks and Caicos Islands
                                        </option>
                                        <option
                                                value="TV" {{ $customer->shipping_country == 'TV' ? 'selected' : '' }}>
                                            Tuvalu
                                        </option>
                                        <option
                                                value="UG" {{ $customer->shipping_country == 'UG' ? 'selected' : '' }}>
                                            Uganda
                                        </option>
                                        <option
                                                value="UA" {{ $customer->shipping_country == 'UA' ? 'selected' : '' }}>
                                            Ukraine
                                        </option>
                                        <option
                                                value="AE" {{ $customer->shipping_country == 'AE' ? 'selected' : '' }}>
                                            United Arab Emirates
                                        </option>
                                        <option
                                                value="GB" {{ $customer->shipping_country == 'GB' ? 'selected' : '' }}>
                                            United Kingdom
                                        </option>
                                        <option
                                                value="US" {{ $customer->shipping_country == 'US' ? 'selected' : '' }}>
                                            United States
                                        </option>
                                        <option
                                                value="UM" {{ $customer->shipping_country == 'UM' ? 'selected' : '' }}>
                                            United States Minor Outlying Islands
                                        </option>
                                        <option
                                                value="UY" {{ $customer->shipping_country == 'UY' ? 'selected' : '' }}>
                                            Uruguay
                                        </option>
                                        <option
                                                value="UZ" {{ $customer->shipping_country == 'UZ' ? 'selected' : '' }}>
                                            Uzbekistan
                                        </option>
                                        <option
                                                value="VU" {{ $customer->shipping_country == 'VU' ? 'selected' : '' }}>
                                            Vanuatu
                                        </option>
                                        <option
                                                value="VE" {{ $customer->shipping_country == 'VE' ? 'selected' : '' }}>
                                            Venezuela, Bolivarian Republic of
                                        </option>
                                        <option
                                                value="VN" {{ $customer->shipping_country == 'VN' ? 'selected' : '' }}>
                                            Viet Nam
                                        </option>
                                        <option
                                                value="VG" {{ $customer->shipping_country == 'VG' ? 'selected' : '' }}>
                                            Virgin Islands, British
                                        </option>
                                        <option
                                                value="VI" {{ $customer->shipping_country == 'VI' ? 'selected' : '' }}>
                                            Virgin Islands, U.S.
                                        </option>
                                        <option
                                                value="WF" {{ $customer->shipping_country == 'WF' ? 'selected' : '' }}>
                                            Wallis and Futuna
                                        </option>
                                        <option
                                                value="EH" {{ $customer->shipping_country == 'EH' ? 'selected' : '' }}>
                                            Western Sahara
                                        </option>
                                        <option
                                                value="YE" {{ $customer->shipping_country == 'YE' ? 'selected' : '' }}>
                                            Yemen
                                        </option>
                                        <option
                                                value="ZM" {{ $customer->shipping_country == 'ZM' ? 'selected' : '' }}>
                                            Zambia
                                        </option>
                                        <option
                                                value="ZW" {{ $customer->shipping_country == 'ZW' ? 'selected' : '' }}>
                                            Zimbabwe
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-lg-4">
                                <label>{!! __('checkout.address.7') !!}*</label>
                                <input type="text" class="notranslate "
                                       id="billing_city"
                                       name="billing_city"
                                       value="{{$customer->billing_city}}" required=""
                                       data-msg="Please enter a valid address."
                                       data-error-class="notranslate u-has-error"
                                       data-success-class="notranslate u-has-success"
                                       autocomplete="off">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>{!! __('checkout.address.9') !!} *</label>
                                <input type="number" class="notranslate "
                                       id="billing_zipcode"
                                       name="billing_zipcode" value="{{$customer->billing_zipcode}}" required=""
                                       data-msg="Please enter a valid address."
                                       data-error-class="notranslate u-has-error"
                                       data-success-class="notranslate u-has-success"
                                       autocomplete="off">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{!! __('checkout.address.8') !!}*</label>
                                    <input type="text" class="notranslate "
                                           id="billing_province"
                                           name="billing_province" value="{{$customer->billing_province}}"
                                           data-msg="Please enter your last name."
                                           data-error-class="notranslate u-has-error"
                                           data-success-class="notranslate u-has-success">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{!! __('checkout.address.5') !!} *</label>
                                    <input type="number" class="notranslate "
                                           id="shipping_phone"
                                           name="shipping_phone"
                                           value="{{$customer->billing_phone}}"
                                           data-msg="Please enter your last name."
                                           data-error-class="notranslate u-has-error"
                                           data-success-class="notranslate u-has-success" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-7" hidden>
                            <label>E-mail *</label>
                            <input type="email" id="email" name="email"
                                   class="notranslate form-control"
                                   value="{{$customer->email}}" required=""
                                   data-msg="Please enter a valid email address."
                                   data-error-class="notranslate u-has-error"
                                   data-success-class="notranslate u-has-success" hidden></div>
                        <div class="form-group mb-30">
                            <textarea rows="5" placeholder="Additional information"></textarea>
                        </div>
                        <div id="collapsePassword" class="form-group create-account collapse in">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input required="" type="password" placeholder="Password" name="password">
                                </div>
                            </div>
                        </div>
                        <div class="ship_detail">
                            <div class="form-group">
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox"
                                               id="differentaddress">
                                        <label class="form-check-label label_info" data-bs-toggle="collapse"
                                               data-target="#collapseAddress" href="#collapseAddress"
                                               aria-controls="collapseAddress" for="differentaddress"><span>Vuoi spedire a un altro indirizzo?</span></label>
                                    </div>
                                </div>
                            </div>
                            <div id="collapseAddress" class="different_address collapse in">
                                <h4 class="mb-30">
                                    Indirizzo di Spedizione</h4>

                                <div class="checkbox-content open" style="display:block !important;">
                                    <div class="row ">
                                        <div class="col-lg-6 col-lg-6 col-xs-6">
                                            <div class="form-group">
                                                <label>{!! __('checkout.address.2') !!} *</label>
                                                <input type="text" class="notranslate "
                                                       id="shipping_name"
                                                       name="shipping_name"
                                                       value="{{$customer->shipping_name}}"
                                                       data-msg="Please enter your frist name."
                                                       data-error-class="notranslate u-has-error"
                                                       data-success-class="notranslate u-has-success"
                                                       autocomplete="off" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-lg-6 col-xs-6">
                                            <div class="form-group">
                                                <label>{!! __('checkout.address.3') !!} *</label>
                                                <input type="text" class="notranslate "
                                                       id="shipping_surname"
                                                       name="shipping_surname"
                                                       value="{{$customer->shipping_surname}}"
                                                       data-msg="Please enter your last name."
                                                       data-error-class="notranslate u-has-error"
                                                       data-success-class="notranslate u-has-success" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>{{__('customer.address.4')}}</label>
                                        <input type="text" class="notranslate "
                                               id="shipping_company"
                                               name="shipping_company"
                                               value="{{$customer->shipping_company}}"
                                               data-msg="Please enter a company name."
                                               data-error-class="notranslate u-has-error"
                                               data-success-class="notranslate u-has-success"></div>
                                    <div class="row shipping_calculator">

                                        <div class="form-group col-lg-6">
                                            <label>  {{__('checkout.address.10')}} *</label>
                                            <div class="custom_select">
                                                <select

                                                        data-msg="Please select country."
                                                        data-error-class="notranslate u-has-error"
                                                        data-success-class="notranslate u-has-success"
                                                        data-live-search="false"
                                                        class="notranslate form-control select-active"
                                                        name="shipping_country">
                                                    <option value="">Select country</option>
                                                    <option
                                                            value="AF" {{ $customer->shipping_country == 'AF' ? 'selected' : '' }}>
                                                        Afghanistan
                                                    </option>
                                                    <option
                                                            value="AX" {{ $customer->shipping_country == 'AX' ? 'selected' : '' }}>
                                                        Åland Islands
                                                    </option>
                                                    <option
                                                            value="AL" {{ $customer->shipping_country == 'AL' ? 'selected' : '' }}>
                                                        Albania
                                                    </option>
                                                    <option
                                                            value="DZ" {{ $customer->shipping_country == 'DZ' ? 'selected' : '' }}>
                                                        Algeria
                                                    </option>
                                                    <option
                                                            value="AS" {{ $customer->shipping_country == 'AS' ? 'selected' : '' }}>
                                                        American Samoa
                                                    </option>
                                                    <option
                                                            value="AD" {{ $customer->shipping_country == 'AD' ? 'selected' : '' }}>
                                                        Andorra
                                                    </option>
                                                    <option
                                                            value="AO" {{ $customer->shipping_country == 'AO' ? 'selected' : '' }}>
                                                        Angola
                                                    </option>
                                                    <option
                                                            value="AI" {{ $customer->shipping_country == 'AI' ? 'selected' : '' }}>
                                                        Anguilla
                                                    </option>
                                                    <option
                                                            value="AQ" {{ $customer->shipping_country == 'AQ' ? 'selected' : '' }}>
                                                        Antarctica
                                                    </option>
                                                    <option
                                                            value="AG" {{ $customer->shipping_country == 'AG' ? 'selected' : '' }}>
                                                        Antigua and Barbuda
                                                    </option>
                                                    <option
                                                            value="AR" {{ $customer->shipping_country == 'AR' ? 'selected' : '' }}>
                                                        Argentina
                                                    </option>
                                                    <option
                                                            value="AM" {{ $customer->shipping_country == 'AM' ? 'selected' : '' }}>
                                                        Armenia
                                                    </option>
                                                    <option
                                                            value="AW" {{ $customer->shipping_country == 'AW' ? 'selected' : '' }}>
                                                        Aruba
                                                    </option>
                                                    <option
                                                            value="AU" {{ $customer->shipping_country == 'AU' ? 'selected' : '' }}>
                                                        Australia
                                                    </option>
                                                    <option
                                                            value="AT" {{ $customer->shipping_country == 'AT' ? 'selected' : '' }}>
                                                        Austria
                                                    </option>
                                                    <option
                                                            value="AZ" {{ $customer->shipping_country == 'AZ' ? 'selected' : '' }}>
                                                        Azerbaijan
                                                    </option>
                                                    <option
                                                            value="BS" {{ $customer->shipping_country == 'BS' ? 'selected' : '' }}>
                                                        Bahamas
                                                    </option>
                                                    <option
                                                            value="BH" {{ $customer->shipping_country == 'BH' ? 'selected' : '' }}>
                                                        Bahrain
                                                    </option>
                                                    <option
                                                            value="BD" {{ $customer->shipping_country == 'BD' ? 'selected' : '' }}>
                                                        Bangladesh
                                                    </option>
                                                    <option
                                                            value="BB" {{ $customer->shipping_country == 'BB' ? 'selected' : '' }}>
                                                        Barbados
                                                    </option>
                                                    <option
                                                            value="BY" {{ $customer->shipping_country == 'BY' ? 'selected' : '' }}>
                                                        Belarus
                                                    </option>
                                                    <option
                                                            value="BE" {{ $customer->shipping_country == 'BE' ? 'selected' : '' }}>
                                                        Belgium
                                                    </option>
                                                    <option
                                                            value="BZ" {{ $customer->shipping_country == 'BZ' ? 'selected' : '' }}>
                                                        Belize
                                                    </option>
                                                    <option
                                                            value="BJ" {{ $customer->shipping_country == 'BJ' ? 'selected' : '' }}>
                                                        Benin
                                                    </option>
                                                    <option
                                                            value="BM" {{ $customer->shipping_country == 'BM' ? 'selected' : '' }}>
                                                        Bermuda
                                                    </option>
                                                    <option
                                                            value="BT" {{ $customer->shipping_country == 'BT' ? 'selected' : '' }}>
                                                        Bhutan
                                                    </option>
                                                    <option
                                                            value="BO" {{ $customer->shipping_country == 'BO' ? 'selected' : '' }}>
                                                        Bolivia, Plurinational State of
                                                    </option>
                                                    <option
                                                            value="BQ" {{ $customer->shipping_country == 'BQ' ? 'selected' : '' }}>
                                                        Bonaire, Sint Eustatius and Saba
                                                    </option>
                                                    <option
                                                            value="BA" {{ $customer->shipping_country == 'BA' ? 'selected' : '' }}>
                                                        Bosnia and Herzegovina
                                                    </option>
                                                    <option
                                                            value="BW" {{ $customer->shipping_country == 'BW' ? 'selected' : '' }}>
                                                        Botswana
                                                    </option>
                                                    <option
                                                            value="BV" {{ $customer->shipping_country == 'BV' ? 'selected' : '' }}>
                                                        Bouvet Island
                                                    </option>
                                                    <option
                                                            value="BR" {{ $customer->shipping_country == 'BR' ? 'selected' : '' }}>
                                                        Brazil
                                                    </option>
                                                    <option
                                                            value="IO" {{ $customer->shipping_country == 'IO' ? 'selected' : '' }}>
                                                        British Indian Ocean Territory
                                                    </option>
                                                    <option
                                                            value="BN" {{ $customer->shipping_country == 'BN' ? 'selected' : '' }}>
                                                        Brunei Darussalam
                                                    </option>
                                                    <option
                                                            value="BG" {{ $customer->shipping_country == 'BG' ? 'selected' : '' }}>
                                                        Bulgaria
                                                    </option>
                                                    <option
                                                            value="BF" {{ $customer->shipping_country == 'BF' ? 'selected' : '' }}>
                                                        Burkina Faso
                                                    </option>
                                                    <option
                                                            value="BI" {{ $customer->shipping_country == 'BI' ? 'selected' : '' }}>
                                                        Burundi
                                                    </option>
                                                    <option
                                                            value="KH" {{ $customer->shipping_country == 'KH' ? 'selected' : '' }}>
                                                        Cambodia
                                                    </option>
                                                    <option
                                                            value="CM" {{ $customer->shipping_country == 'CM' ? 'selected' : '' }}>
                                                        Cameroon
                                                    </option>
                                                    <option
                                                            value="CA" {{ $customer->shipping_country == 'CA' ? 'selected' : '' }}>
                                                        Canada
                                                    </option>
                                                    <option
                                                            value="CV" {{ $customer->shipping_country == 'CV' ? 'selected' : '' }}>
                                                        Cape Verde
                                                    </option>
                                                    <option
                                                            value="KY" {{ $customer->shipping_country == 'KY' ? 'selected' : '' }}>
                                                        Cayman Islands
                                                    </option>
                                                    <option
                                                            value="CF" {{ $customer->shipping_country == 'CF' ? 'selected' : '' }}>
                                                        Central African Republic
                                                    </option>
                                                    <option
                                                            value="TD" {{ $customer->shipping_country == 'TD' ? 'selected' : '' }}>
                                                        Chad
                                                    </option>
                                                    <option
                                                            value="CL" {{ $customer->shipping_country == 'CL' ? 'selected' : '' }}>
                                                        Chile
                                                    </option>
                                                    <option
                                                            value="CN" {{ $customer->shipping_country == 'CN' ? 'selected' : '' }}>
                                                        China
                                                    </option>
                                                    <option
                                                            value="CX" {{ $customer->shipping_country == 'CX' ? 'selected' : '' }}>
                                                        Christmas Island
                                                    </option>
                                                    <option
                                                            value="CC" {{ $customer->shipping_country == 'CC' ? 'selected' : '' }}>
                                                        Cocos (Keeling) Islands
                                                    </option>
                                                    <option
                                                            value="CO" {{ $customer->shipping_country == 'CO' ? 'selected' : '' }}>
                                                        Colombia
                                                    </option>
                                                    <option
                                                            value="KM" {{ $customer->shipping_country == 'KM' ? 'selected' : '' }}>
                                                        Comoros
                                                    </option>
                                                    <option
                                                            value="CG" {{ $customer->shipping_country == 'CG' ? 'selected' : '' }}>
                                                        Congo
                                                    </option>
                                                    <option
                                                            value="CD" {{ $customer->shipping_country == 'CD' ? 'selected' : '' }}>
                                                        Congo, the Democratic Republic of the
                                                    </option>
                                                    <option
                                                            value="CK" {{ $customer->shipping_country == 'CK' ? 'selected' : '' }}>
                                                        Cook Islands
                                                    </option>
                                                    <option
                                                            value="CR" {{ $customer->shipping_country == 'CR' ? 'selected' : '' }}>
                                                        Costa Rica
                                                    </option>
                                                    <option
                                                            value="CI" {{ $customer->shipping_country == 'CI' ? 'selected' : '' }}>
                                                        Côte d'Ivoire
                                                    </option>
                                                    <option
                                                            value="HR" {{ $customer->shipping_country == 'HR' ? 'selected' : '' }}>
                                                        Croatia
                                                    </option>
                                                    <option
                                                            value="CU" {{ $customer->shipping_country == 'CU' ? 'selected' : '' }}>
                                                        Cuba
                                                    </option>
                                                    <option
                                                            value="CW" {{ $customer->shipping_country == 'CW' ? 'selected' : '' }}>
                                                        Curaçao
                                                    </option>
                                                    <option
                                                            value="CY" {{ $customer->shipping_country == 'CY' ? 'selected' : '' }}>
                                                        Cyprus
                                                    </option>
                                                    <option
                                                            value="CZ" {{ $customer->shipping_country == 'CZ' ? 'selected' : '' }}>
                                                        Czech Republic
                                                    </option>
                                                    <option
                                                            value="DK" {{ $customer->shipping_country == 'DK' ? 'selected' : '' }}>
                                                        Denmark
                                                    </option>
                                                    <option
                                                            value="DJ" {{ $customer->shipping_country == 'DJ' ? 'selected' : '' }}>
                                                        Djibouti
                                                    </option>
                                                    <option
                                                            value="DM" {{ $customer->shipping_country == 'DM' ? 'selected' : '' }}>
                                                        Dominica
                                                    </option>
                                                    <option
                                                            value="DO" {{ $customer->shipping_country == 'DO' ? 'selected' : '' }}>
                                                        Dominican Republic
                                                    </option>
                                                    <option
                                                            value="EC" {{ $customer->shipping_country == 'EC' ? 'selected' : '' }}>
                                                        Ecuador
                                                    </option>
                                                    <option
                                                            value="EG" {{ $customer->shipping_country == 'EG' ? 'selected' : '' }}>
                                                        Egypt
                                                    </option>
                                                    <option
                                                            value="SV" {{ $customer->shipping_country == 'SV' ? 'selected' : '' }}>
                                                        El Salvador
                                                    </option>
                                                    <option
                                                            value="GQ" {{ $customer->shipping_country == 'GQ' ? 'selected' : '' }}>
                                                        Equatorial Guinea
                                                    </option>
                                                    <option
                                                            value="ER" {{ $customer->shipping_country == 'ER' ? 'selected' : '' }}>
                                                        Eritrea
                                                    </option>
                                                    <option
                                                            value="EE" {{ $customer->shipping_country == 'EE' ? 'selected' : '' }}>
                                                        Estonia
                                                    </option>
                                                    <option
                                                            value="ET" {{ $customer->shipping_country == 'ET' ? 'selected' : '' }}>
                                                        Ethiopia
                                                    </option>
                                                    <option
                                                            value="FK" {{ $customer->shipping_country == 'FK' ? 'selected' : '' }}>
                                                        Falkland Islands (Malvinas)
                                                    </option>
                                                    <option
                                                            value="FO" {{ $customer->shipping_country == 'FO' ? 'selected' : '' }}>
                                                        Faroe Islands
                                                    </option>
                                                    <option
                                                            value="FJ" {{ $customer->shipping_country == 'FJ' ? 'selected' : '' }}>
                                                        Fiji
                                                    </option>
                                                    <option
                                                            value="FI" {{ $customer->shipping_country == 'FI' ? 'selected' : '' }}>
                                                        Finland
                                                    </option>
                                                    <option
                                                            value="FR" {{ $customer->shipping_country == 'FR' ? 'selected' : '' }}>
                                                        France
                                                    </option>
                                                    <option
                                                            value="GF" {{ $customer->shipping_country == 'GF' ? 'selected' : '' }}>
                                                        French Guiana
                                                    </option>
                                                    <option
                                                            value="PF" {{ $customer->shipping_country == 'PF' ? 'selected' : '' }}>
                                                        French Polynesia
                                                    </option>
                                                    <option
                                                            value="TF" {{ $customer->shipping_country == 'TF' ? 'selected' : '' }}>
                                                        French Southern Territories
                                                    </option>
                                                    <option
                                                            value="GA" {{ $customer->shipping_country == 'GA' ? 'selected' : '' }}>
                                                        Gabon
                                                    </option>
                                                    <option
                                                            value="GM" {{ $customer->shipping_country == 'GM' ? 'selected' : '' }}>
                                                        Gambia
                                                    </option>
                                                    <option
                                                            value="GE" {{ $customer->shipping_country == 'GE' ? 'selected' : '' }}>
                                                        Georgia
                                                    </option>
                                                    <option
                                                            value="DE" {{ $customer->shipping_country == 'DE' ? 'selected' : '' }}>
                                                        Germany
                                                    </option>
                                                    <option
                                                            value="GH" {{ $customer->shipping_country == 'GH' ? 'selected' : '' }}>
                                                        Ghana
                                                    </option>
                                                    <option
                                                            value="GI" {{ $customer->shipping_country == 'GI' ? 'selected' : '' }}>
                                                        Gibraltar
                                                    </option>
                                                    <option
                                                            value="GR" {{ $customer->shipping_country == 'GR' ? 'selected' : '' }}>
                                                        Greece
                                                    </option>
                                                    <option
                                                            value="GL" {{ $customer->shipping_country == 'GL' ? 'selected' : '' }}>
                                                        Greenland
                                                    </option>
                                                    <option
                                                            value="GD" {{ $customer->shipping_country == 'GD' ? 'selected' : '' }}>
                                                        Grenada
                                                    </option>
                                                    <option
                                                            value="GP" {{ $customer->shipping_country == 'GP' ? 'selected' : '' }}>
                                                        Guadeloupe
                                                    </option>
                                                    <option
                                                            value="GU" {{ $customer->shipping_country == 'GU' ? 'selected' : '' }}>
                                                        Guam
                                                    </option>
                                                    <option
                                                            value="GT" {{ $customer->shipping_country == 'GT' ? 'selected' : '' }}>
                                                        Guatemala
                                                    </option>
                                                    <option
                                                            value="GG" {{ $customer->shipping_country == 'GG' ? 'selected' : '' }}>
                                                        Guernsey
                                                    </option>
                                                    <option
                                                            value="GN" {{ $customer->shipping_country == 'GN' ? 'selected' : '' }}>
                                                        Guinea
                                                    </option>
                                                    <option
                                                            value="GW" {{ $customer->shipping_country == 'GW' ? 'selected' : '' }}>
                                                        Guinea-Bissau
                                                    </option>
                                                    <option
                                                            value="GY" {{ $customer->shipping_country == 'GY' ? 'selected' : '' }}>
                                                        Guyana
                                                    </option>
                                                    <option
                                                            value="HT" {{ $customer->shipping_country == 'HT' ? 'selected' : '' }}>
                                                        Haiti
                                                    </option>
                                                    <option
                                                            value="HM" {{ $customer->shipping_country == 'HM' ? 'selected' : '' }}>
                                                        Heard Island and McDonald Islands
                                                    </option>
                                                    <option
                                                            value="VA" {{ $customer->shipping_country == 'VA' ? 'selected' : '' }}>
                                                        Holy See (Vatican City State)
                                                    </option>
                                                    <option
                                                            value="HN" {{ $customer->shipping_country == 'HN' ? 'selected' : '' }}>
                                                        Honduras
                                                    </option>
                                                    <option
                                                            value="HK" {{ $customer->shipping_country == 'HK' ? 'selected' : '' }}>
                                                        Hong Kong
                                                    </option>
                                                    <option
                                                            value="HU" {{ $customer->shipping_country == 'HU' ? 'selected' : '' }}>
                                                        Hungary
                                                    </option>
                                                    <option
                                                            value="IS" {{ $customer->shipping_country == 'IS' ? 'selected' : '' }}>
                                                        Iceland
                                                    </option>
                                                    <option
                                                            value="IN" {{ $customer->shipping_country == 'IN' ? 'selected' : '' }}>
                                                        India
                                                    </option>
                                                    <option
                                                            value="ID" {{ $customer->shipping_country == 'ID' ? 'selected' : '' }}>
                                                        Indonesia
                                                    </option>
                                                    <option
                                                            value="IR" {{ $customer->shipping_country == 'IR' ? 'selected' : '' }}>
                                                        Iran, Islamic Republic of
                                                    </option>
                                                    <option
                                                            value="IQ" {{ $customer->shipping_country == 'IQ' ? 'selected' : '' }}>
                                                        Iraq
                                                    </option>
                                                    <option
                                                            value="IE" {{ $customer->shipping_country == 'IE' ? 'selected' : '' }}>
                                                        Ireland
                                                    </option>
                                                    <option
                                                            value="IM" {{ $customer->shipping_country == 'IM' ? 'selected' : '' }}>
                                                        Isle of Man
                                                    </option>
                                                    <option
                                                            value="IL" {{ $customer->shipping_country == 'IL' ? 'selected' : '' }}>
                                                        Israel
                                                    </option>
                                                    <option
                                                            value="IT" {{ $customer->shipping_country == 'IT' ? 'selected' : '' }}>
                                                        Italy
                                                    </option>
                                                    <option
                                                            value="JM" {{ $customer->shipping_country == 'JM' ? 'selected' : '' }}>
                                                        Jamaica
                                                    </option>
                                                    <option
                                                            value="JP" {{ $customer->shipping_country == 'JP' ? 'selected' : '' }}>
                                                        Japan
                                                    </option>
                                                    <option
                                                            value="JE" {{ $customer->shipping_country == 'JE' ? 'selected' : '' }}>
                                                        Jersey
                                                    </option>
                                                    <option
                                                            value="JO" {{ $customer->shipping_country == 'JO' ? 'selected' : '' }}>
                                                        Jordan
                                                    </option>
                                                    <option
                                                            value="KZ" {{ $customer->shipping_country == 'KZ' ? 'selected' : '' }}>
                                                        Kazakhstan
                                                    </option>
                                                    <option
                                                            value="KE" {{ $customer->shipping_country == 'KE' ? 'selected' : '' }}>
                                                        Kenya
                                                    </option>
                                                    <option
                                                            value="KI" {{ $customer->shipping_country == 'KI' ? 'selected' : '' }}>
                                                        Kiribati
                                                    </option>
                                                    <option
                                                            value="KP" {{ $customer->shipping_country == 'KP' ? 'selected' : '' }}>
                                                        Korea, Democratic People's Republic of
                                                    </option>
                                                    <option
                                                            value="KR" {{ $customer->shipping_country == 'KR' ? 'selected' : '' }}>
                                                        Korea, Republic of
                                                    </option>
                                                    <option
                                                            value="KW" {{ $customer->shipping_country == 'KW' ? 'selected' : '' }}>
                                                        Kuwait
                                                    </option>
                                                    <option
                                                            value="KG" {{ $customer->shipping_country == 'KG' ? 'selected' : '' }}>
                                                        Kyrgyzstan
                                                    </option>
                                                    <option
                                                            value="LA" {{ $customer->shipping_country == 'LA' ? 'selected' : '' }}>
                                                        Lao People's Democratic Republic
                                                    </option>
                                                    <option
                                                            value="LV" {{ $customer->shipping_country == 'LV' ? 'selected' : '' }}>
                                                        Latvia
                                                    </option>
                                                    <option
                                                            value="LB" {{ $customer->shipping_country == 'LB' ? 'selected' : '' }}>
                                                        Lebanon
                                                    </option>
                                                    <option
                                                            value="LS" {{ $customer->shipping_country == 'LS' ? 'selected' : '' }}>
                                                        Lesotho
                                                    </option>
                                                    <option
                                                            value="LR" {{ $customer->shipping_country == 'LR' ? 'selected' : '' }}>
                                                        Liberia
                                                    </option>
                                                    <option
                                                            value="LY" {{ $customer->shipping_country == 'LY' ? 'selected' : '' }}>
                                                        Libya
                                                    </option>
                                                    <option
                                                            value="LI" {{ $customer->shipping_country == 'LI' ? 'selected' : '' }}>
                                                        Liechtenstein
                                                    </option>
                                                    <option
                                                            value="LT" {{ $customer->shipping_country == 'LT' ? 'selected' : '' }}>
                                                        Lithuania
                                                    </option>
                                                    <option
                                                            value="LU" {{ $customer->shipping_country == 'LU' ? 'selected' : '' }}>
                                                        Luxembourg
                                                    </option>
                                                    <option
                                                            value="MO" {{ $customer->shipping_country == 'MO' ? 'selected' : '' }}>
                                                        Macao
                                                    </option>
                                                    <option
                                                            value="MK" {{ $customer->shipping_country == 'MK' ? 'selected' : '' }}>
                                                        Macedonia, the former Yugoslav Republic
                                                        of
                                                    </option>
                                                    <option
                                                            value="MG" {{ $customer->shipping_country == 'MG' ? 'selected' : '' }}>
                                                        Madagascar
                                                    </option>
                                                    <option
                                                            value="MW" {{ $customer->shipping_country == 'MW' ? 'selected' : '' }}>
                                                        Malawi
                                                    </option>
                                                    <option
                                                            value="MY" {{ $customer->shipping_country == 'MY' ? 'selected' : '' }}>
                                                        Malaysia
                                                    </option>
                                                    <option
                                                            value="MV" {{ $customer->shipping_country == 'MV' ? 'selected' : '' }}>
                                                        Maldives
                                                    </option>
                                                    <option
                                                            value="ML" {{ $customer->shipping_country == 'ML' ? 'selected' : '' }}>
                                                        Mali
                                                    </option>
                                                    <option
                                                            value="MT" {{ $customer->shipping_country == 'MT' ? 'selected' : '' }}>
                                                        Malta
                                                    </option>
                                                    <option
                                                            value="MH" {{ $customer->shipping_country == 'MH' ? 'selected' : '' }}>
                                                        Marshall Islands
                                                    </option>
                                                    <option
                                                            value="MQ" {{ $customer->shipping_country == 'MQ' ? 'selected' : '' }}>
                                                        Martinique
                                                    </option>
                                                    <option
                                                            value="MR" {{ $customer->shipping_country == 'MR' ? 'selected' : '' }}>
                                                        Mauritania
                                                    </option>
                                                    <option
                                                            value="MU" {{ $customer->shipping_country == 'MU' ? 'selected' : '' }}>
                                                        Mauritius
                                                    </option>
                                                    <option
                                                            value="YT" {{ $customer->shipping_country == 'YT' ? 'selected' : '' }}>
                                                        Mayotte
                                                    </option>
                                                    <option
                                                            value="MX" {{ $customer->shipping_country == 'MX' ? 'selected' : '' }}>
                                                        Mexico
                                                    </option>
                                                    <option
                                                            value="FM" {{ $customer->shipping_country == 'FM' ? 'selected' : '' }}>
                                                        Micronesia, Federated States of
                                                    </option>
                                                    <option
                                                            value="MD" {{ $customer->shipping_country == 'MD' ? 'selected' : '' }}>
                                                        Moldova, Republic of
                                                    </option>
                                                    <option
                                                            value="MC" {{ $customer->shipping_country == 'MC' ? 'selected' : '' }}>
                                                        Monaco
                                                    </option>
                                                    <option
                                                            value="MN" {{ $customer->shipping_country == 'MN' ? 'selected' : '' }}>
                                                        Mongolia
                                                    </option>
                                                    <option
                                                            value="ME" {{ $customer->shipping_country == 'ME' ? 'selected' : '' }}>
                                                        Montenegro
                                                    </option>
                                                    <option
                                                            value="MS" {{ $customer->shipping_country == 'MS' ? 'selected' : '' }}>
                                                        Montserrat
                                                    </option>
                                                    <option
                                                            value="MA" {{ $customer->shipping_country == 'MA' ? 'selected' : '' }}>
                                                        Morocco
                                                    </option>
                                                    <option
                                                            value="MZ" {{ $customer->shipping_country == 'MZ' ? 'selected' : '' }}>
                                                        Mozambique
                                                    </option>
                                                    <option
                                                            value="MM" {{ $customer->shipping_country == 'MM' ? 'selected' : '' }}>
                                                        Myanmar
                                                    </option>
                                                    <option
                                                            value="NA" {{ $customer->shipping_country == 'NA' ? 'selected' : '' }}>
                                                        Namibia
                                                    </option>
                                                    <option
                                                            value="NR" {{ $customer->shipping_country == 'NR' ? 'selected' : '' }}>
                                                        Nauru
                                                    </option>
                                                    <option
                                                            value="NP" {{ $customer->shipping_country == 'NP' ? 'selected' : '' }}>
                                                        Nepal
                                                    </option>
                                                    <option
                                                            value="NL" {{ $customer->shipping_country == 'NL' ? 'selected' : '' }}>
                                                        Netherlands
                                                    </option>
                                                    <option
                                                            value="NC" {{ $customer->shipping_country == 'NC' ? 'selected' : '' }}>
                                                        New Caledonia
                                                    </option>
                                                    <option
                                                            value="NZ" {{ $customer->shipping_country == 'NZ' ? 'selected' : '' }}>
                                                        New Zealand
                                                    </option>
                                                    <option
                                                            value="NI" {{ $customer->shipping_country == 'NI' ? 'selected' : '' }}>
                                                        Nicaragua
                                                    </option>
                                                    <option
                                                            value="NE" {{ $customer->shipping_country == 'NE' ? 'selected' : '' }}>
                                                        Niger
                                                    </option>
                                                    <option
                                                            value="NG" {{ $customer->shipping_country == 'NG' ? 'selected' : '' }}>
                                                        Nigeria
                                                    </option>
                                                    <option
                                                            value="NU" {{ $customer->shipping_country == 'NU' ? 'selected' : '' }}>
                                                        Niue
                                                    </option>
                                                    <option
                                                            value="NF" {{ $customer->shipping_country == 'NF' ? 'selected' : '' }}>
                                                        Norfolk Island
                                                    </option>
                                                    <option
                                                            value="MP" {{ $customer->shipping_country == 'MP' ? 'selected' : '' }}>
                                                        Northern Mariana Islands
                                                    </option>
                                                    <option
                                                            value="NO" {{ $customer->shipping_country == 'NO' ? 'selected' : '' }}>
                                                        Norway
                                                    </option>
                                                    <option
                                                            value="OM" {{ $customer->shipping_country == 'OM' ? 'selected' : '' }}>
                                                        Oman
                                                    </option>
                                                    <option
                                                            value="PK" {{ $customer->shipping_country == 'PK' ? 'selected' : '' }}>
                                                        Pakistan
                                                    </option>
                                                    <option
                                                            value="PW" {{ $customer->shipping_country == 'PW' ? 'selected' : '' }}>
                                                        Palau
                                                    </option>
                                                    <option
                                                            value="PS" {{ $customer->shipping_country == 'PS' ? 'selected' : '' }}>
                                                        Palestinian Territory, Occupied
                                                    </option>
                                                    <option
                                                            value="PA" {{ $customer->shipping_country == 'PA' ? 'selected' : '' }}>
                                                        Panama
                                                    </option>
                                                    <option
                                                            value="PG" {{ $customer->shipping_country == 'PG' ? 'selected' : '' }}>
                                                        Papua New Guinea
                                                    </option>
                                                    <option
                                                            value="PY" {{ $customer->shipping_country == 'PY' ? 'selected' : '' }}>
                                                        Paraguay
                                                    </option>
                                                    <option
                                                            value="PE" {{ $customer->shipping_country == 'PE' ? 'selected' : '' }}>
                                                        Peru
                                                    </option>
                                                    <option
                                                            value="PH" {{ $customer->shipping_country == 'PH' ? 'selected' : '' }}>
                                                        Philippines
                                                    </option>
                                                    <option
                                                            value="PN" {{ $customer->shipping_country == 'PN' ? 'selected' : '' }}>
                                                        Pitcairn
                                                    </option>
                                                    <option
                                                            value="PL" {{ $customer->shipping_country == 'PL' ? 'selected' : '' }}>
                                                        Poland
                                                    </option>
                                                    <option
                                                            value="PT" {{ $customer->shipping_country == 'PT' ? 'selected' : '' }}>
                                                        Portugal
                                                    </option>
                                                    <option
                                                            value="PR" {{ $customer->shipping_country == 'PR' ? 'selected' : '' }}>
                                                        Puerto Rico
                                                    </option>
                                                    <option
                                                            value="QA" {{ $customer->shipping_country == 'QA' ? 'selected' : '' }}>
                                                        Qatar
                                                    </option>
                                                    <option
                                                            value="RE" {{ $customer->shipping_country == 'RE' ? 'selected' : '' }}>
                                                        Réunion
                                                    </option>
                                                    <option
                                                            value="RO" {{ $customer->shipping_country == 'RO' ? 'selected' : '' }}>
                                                        Romania
                                                    </option>
                                                    <option
                                                            value="RU" {{ $customer->shipping_country == 'RU' ? 'selected' : '' }}>
                                                        Russian Federation
                                                    </option>
                                                    <option
                                                            value="RW" {{ $customer->shipping_country == 'RW' ? 'selected' : '' }}>
                                                        Rwanda
                                                    </option>
                                                    <option
                                                            value="BL" {{ $customer->shipping_country == 'BL' ? 'selected' : '' }}>
                                                        Saint Barthélemy
                                                    </option>
                                                    <option
                                                            value="SH" {{ $customer->shipping_country == 'SH' ? 'selected' : '' }}>
                                                        Saint Helena, Ascension and Tristan da
                                                        Cunha
                                                    </option>
                                                    <option
                                                            value="KN" {{ $customer->shipping_country == 'KN' ? 'selected' : '' }}>
                                                        Saint Kitts and Nevis
                                                    </option>
                                                    <option
                                                            value="LC" {{ $customer->shipping_country == 'LC' ? 'selected' : '' }}>
                                                        Saint Lucia
                                                    </option>
                                                    <option
                                                            value="MF" {{ $customer->shipping_country == 'MF' ? 'selected' : '' }}>
                                                        Saint Martin (French part)
                                                    </option>
                                                    <option
                                                            value="PM" {{ $customer->shipping_country == 'PM' ? 'selected' : '' }}>
                                                        Saint Pierre and Miquelon
                                                    </option>
                                                    <option
                                                            value="VC" {{ $customer->shipping_country == 'VC' ? 'selected' : '' }}>
                                                        Saint Vincent and the Grenadines
                                                    </option>
                                                    <option
                                                            value="WS" {{ $customer->shipping_country == 'WS' ? 'selected' : '' }}>
                                                        Samoa
                                                    </option>
                                                    <option
                                                            value="SM" {{ $customer->shipping_country == 'SM' ? 'selected' : '' }}>
                                                        San Marino
                                                    </option>
                                                    <option
                                                            value="ST" {{ $customer->shipping_country == 'ST' ? 'selected' : '' }}>
                                                        Sao Tome and Principe
                                                    </option>
                                                    <option
                                                            value="SA" {{ $customer->shipping_country == 'SA' ? 'selected' : '' }}>
                                                        Saudi Arabia
                                                    </option>
                                                    <option
                                                            value="SN" {{ $customer->shipping_country == 'SN' ? 'selected' : '' }}>
                                                        Senegal
                                                    </option>
                                                    <option
                                                            value="RS" {{ $customer->shipping_country == 'RS' ? 'selected' : '' }}>
                                                        Serbia
                                                    </option>
                                                    <option
                                                            value="SC" {{ $customer->shipping_country == 'SC' ? 'selected' : '' }}>
                                                        Seychelles
                                                    </option>
                                                    <option
                                                            value="SL" {{ $customer->shipping_country == 'SL' ? 'selected' : '' }}>
                                                        Sierra Leone
                                                    </option>
                                                    <option
                                                            value="SG" {{ $customer->shipping_country == 'SG' ? 'selected' : '' }}>
                                                        Singapore
                                                    </option>
                                                    <option
                                                            value="SX" {{ $customer->shipping_country == 'SX' ? 'selected' : '' }}>
                                                        Sint Maarten (Dutch part)
                                                    </option>
                                                    <option
                                                            value="SK" {{ $customer->shipping_country == 'SK' ? 'selected' : '' }}>
                                                        Slovakia
                                                    </option>
                                                    <option
                                                            value="SI" {{ $customer->shipping_country == 'SI' ? 'selected' : '' }}>
                                                        Slovenia
                                                    </option>
                                                    <option
                                                            value="SB" {{ $customer->shipping_country == 'SB' ? 'selected' : '' }}>
                                                        Solomon Islands
                                                    </option>
                                                    <option
                                                            value="SO" {{ $customer->shipping_country == 'SO' ? 'selected' : '' }}>
                                                        Somalia
                                                    </option>
                                                    <option
                                                            value="ZA" {{ $customer->shipping_country == 'ZA' ? 'selected' : '' }}>
                                                        South Africa
                                                    </option>
                                                    <option
                                                            value="GS" {{ $customer->shipping_country == 'GS' ? 'selected' : '' }}>
                                                        South Georgia and the South Sandwich
                                                        Islands
                                                    </option>
                                                    <option
                                                            value="SS" {{ $customer->shipping_country == 'SS' ? 'selected' : '' }}>
                                                        South Sudan
                                                    </option>
                                                    <option
                                                            value="ES" {{ $customer->shipping_country == 'ES' ? 'selected' : '' }}>
                                                        Spain
                                                    </option>
                                                    <option
                                                            value="LK" {{ $customer->shipping_country == 'LK' ? 'selected' : '' }}>
                                                        Sri Lanka
                                                    </option>
                                                    <option
                                                            value="SD" {{ $customer->shipping_country == 'SD' ? 'selected' : '' }}>
                                                        Sudan
                                                    </option>
                                                    <option
                                                            value="SR" {{ $customer->shipping_country == 'SR' ? 'selected' : '' }}>
                                                        Suriname
                                                    </option>
                                                    <option
                                                            value="SJ" {{ $customer->shipping_country == 'SJ' ? 'selected' : '' }}>
                                                        Svalbard and Jan Mayen
                                                    </option>
                                                    <option
                                                            value="SZ" {{ $customer->shipping_country == 'SZ' ? 'selected' : '' }}>
                                                        Swaziland
                                                    </option>
                                                    <option
                                                            value="SE" {{ $customer->shipping_country == 'SE' ? 'selected' : '' }}>
                                                        Sweden
                                                    </option>
                                                    <option
                                                            value="CH" {{ $customer->shipping_country == 'CH' ? 'selected' : '' }}>
                                                        Switzerland
                                                    </option>
                                                    <option
                                                            value="SY" {{ $customer->shipping_country == 'SY' ? 'selected' : '' }}>
                                                        Syrian Arab Republic
                                                    </option>
                                                    <option
                                                            value="TW" {{ $customer->shipping_country == 'TW' ? 'selected' : '' }}>
                                                        Taiwan, Province of China
                                                    </option>
                                                    <option
                                                            value="TJ" {{ $customer->shipping_country == 'TJ' ? 'selected' : '' }}>
                                                        Tajikistan
                                                    </option>
                                                    <option
                                                            value="TZ" {{ $customer->shipping_country == 'TZ' ? 'selected' : '' }}>
                                                        Tanzania, United Republic of
                                                    </option>
                                                    <option
                                                            value="TH" {{ $customer->shipping_country == 'TH' ? 'selected' : '' }}>
                                                        Thailand
                                                    </option>
                                                    <option
                                                            value="TL" {{ $customer->shipping_country == 'TL' ? 'selected' : '' }}>
                                                        Timor-Leste
                                                    </option>
                                                    <option
                                                            value="TG" {{ $customer->shipping_country == 'TG' ? 'selected' : '' }}>
                                                        Togo
                                                    </option>
                                                    <option
                                                            value="TK" {{ $customer->shipping_country == 'TK' ? 'selected' : '' }}>
                                                        Tokelau
                                                    </option>
                                                    <option
                                                            value="TO" {{ $customer->shipping_country == 'TO' ? 'selected' : '' }}>
                                                        Tonga
                                                    </option>
                                                    <option
                                                            value="TT" {{ $customer->shipping_country == 'TT' ? 'selected' : '' }}>
                                                        Trinidad and Tobago
                                                    </option>
                                                    <option
                                                            value="TN" {{ $customer->shipping_country == 'TN' ? 'selected' : '' }}>
                                                        Tunisia
                                                    </option>
                                                    <option
                                                            value="TR" {{ $customer->shipping_country == 'TR' ? 'selected' : '' }}>
                                                        Turkey
                                                    </option>
                                                    <option
                                                            value="TM" {{ $customer->shipping_country == 'TM' ? 'selected' : '' }}>
                                                        Turkmenistan
                                                    </option>
                                                    <option
                                                            value="TC" {{ $customer->shipping_country == 'TC' ? 'selected' : '' }}>
                                                        Turks and Caicos Islands
                                                    </option>
                                                    <option
                                                            value="TV" {{ $customer->shipping_country == 'TV' ? 'selected' : '' }}>
                                                        Tuvalu
                                                    </option>
                                                    <option
                                                            value="UG" {{ $customer->shipping_country == 'UG' ? 'selected' : '' }}>
                                                        Uganda
                                                    </option>
                                                    <option
                                                            value="UA" {{ $customer->shipping_country == 'UA' ? 'selected' : '' }}>
                                                        Ukraine
                                                    </option>
                                                    <option
                                                            value="AE" {{ $customer->shipping_country == 'AE' ? 'selected' : '' }}>
                                                        United Arab Emirates
                                                    </option>
                                                    <option
                                                            value="GB" {{ $customer->shipping_country == 'GB' ? 'selected' : '' }}>
                                                        United Kingdom
                                                    </option>
                                                    <option
                                                            value="US" {{ $customer->shipping_country == 'US' ? 'selected' : '' }}>
                                                        United States
                                                    </option>
                                                    <option
                                                            value="UM" {{ $customer->shipping_country == 'UM' ? 'selected' : '' }}>
                                                        United States Minor Outlying Islands
                                                    </option>
                                                    <option
                                                            value="UY" {{ $customer->shipping_country == 'UY' ? 'selected' : '' }}>
                                                        Uruguay
                                                    </option>
                                                    <option
                                                            value="UZ" {{ $customer->shipping_country == 'UZ' ? 'selected' : '' }}>
                                                        Uzbekistan
                                                    </option>
                                                    <option
                                                            value="VU" {{ $customer->shipping_country == 'VU' ? 'selected' : '' }}>
                                                        Vanuatu
                                                    </option>
                                                    <option
                                                            value="VE" {{ $customer->shipping_country == 'VE' ? 'selected' : '' }}>
                                                        Venezuela, Bolivarian Republic of
                                                    </option>
                                                    <option
                                                            value="VN" {{ $customer->shipping_country == 'VN' ? 'selected' : '' }}>
                                                        Viet Nam
                                                    </option>
                                                    <option
                                                            value="VG" {{ $customer->shipping_country == 'VG' ? 'selected' : '' }}>
                                                        Virgin Islands, British
                                                    </option>
                                                    <option
                                                            value="VI" {{ $customer->shipping_country == 'VI' ? 'selected' : '' }}>
                                                        Virgin Islands, U.S.
                                                    </option>
                                                    <option
                                                            value="WF" {{ $customer->shipping_country == 'WF' ? 'selected' : '' }}>
                                                        Wallis and Futuna
                                                    </option>
                                                    <option
                                                            value="EH" {{ $customer->shipping_country == 'EH' ? 'selected' : '' }}>
                                                        Western Sahara
                                                    </option>
                                                    <option
                                                            value="YE" {{ $customer->shipping_country == 'YE' ? 'selected' : '' }}>
                                                        Yemen
                                                    </option>
                                                    <option
                                                            value="ZM" {{ $customer->shipping_country == 'ZM' ? 'selected' : '' }}>
                                                        Zambia
                                                    </option>
                                                    <option
                                                            value="ZW" {{ $customer->shipping_country == 'ZW' ? 'selected' : '' }}>
                                                        Zimbabwe
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>{!! __('checkout.address.6') !!} *</label>
                                                <input type="text" class="notranslate "
                                                       id="shipping_address"
                                                       name="shipping_address"
                                                       value="{{$customer->shipping_address}}"
                                                       data-msg="Please enter a valid address."
                                                       data-error-class="notranslate u-has-error"
                                                       data-success-class="notranslate u-has-success" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>{!! __('checkout.address.7') !!} *</label>
                                                <input type="text" class="notranslate "
                                                       id="shipping_city"
                                                       name="shipping_city"
                                                       value="{{$customer->shipping_city}}"
                                                       data-msg="Please enter a valid address."
                                                       data-error-class="notranslate u-has-error"
                                                       data-success-class="notranslate u-has-success"
                                                       autocomplete="off" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>{!! __('checkout.address.8') !!} *</label>
                                                <input type="text" class="notranslate "
                                                       id="shipping_province"
                                                       name="shipping_province"
                                                       value="{{$customer->shipping_province}}"
                                                       data-msg="Please enter your last name."
                                                       data-error-class="notranslate u-has-error"
                                                       data-success-class="notranslate u-has-success" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>{!! __('checkout.address.9') !!} *</label>
                                                <input type="text" class="notranslate "
                                                       id="shipping_zipcode"
                                                       name="shipping_zipcode"
                                                       value="{{$customer->shipping_zipcode}}"
                                                       data-msg="Please enter a valid address."
                                                       data-error-class="notranslate u-has-error"
                                                       data-success-class="notranslate u-has-success"
                                                       autocomplete="off" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
            </div>
            <div class="col-lg-5">
                <div class="border p-40 cart-totals ml-30 mb-50">
                    <div class="d-flex align-items-end justify-content-between mb-30">
                        <h4>Your Order</h4>
                        <h6 class="text-muted">Subtotal</h6>
                    </div>
                    <div class="divider-2 mb-30"></div>
                    <div class="table-responsive order_table checkout">
                        <table class="table no-border">
                            <tbody>
                            @if(session('cart'))
                                @foreach(session('cart') as $id => $details)
                                    <tr>
                                        <td class="image product-thumbnail"><img
                                                    src="{{'/storage/images/' . $details['img_01'] }}"
                                                    alt="{{ route('shop.show',['lang'=>app()->getLocale(),$id,$details['slug']]) }}">
                                        </td>
                                        <td>
                                            <h6 class="w-160 mb-5"><a
                                                        href="{{ route('shop.show',['lang'=>app()->getLocale(),$id,$details['slug']]) }}"
                                                        class="text-heading">{!! substr($details['name'], 0, 30)!!}{!! strlen($details['name']) > 30 ? '...' : ""!!}</a>
                                            </h6>

                                        </td>
                                        <td>
                                            <h6 class="text-muted pl-20 pr-20">x {{ $details['quantity'] }}</h6>
                                        </td>
                                        <td>
                                            <h4 class="text-brand">
                                                € {{ priceView($details['quantity'] * $details['price'])}}</h4>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="payment ml-30">
                    <h4 class="mb-30">Metodo di pagamento</h4>
                    <div class="payment_option" id="payment_method">
                        <div class="accordion-detail">
                            <div class="custome-radio">
                                <div class="tab-style3">
                                    <ul class="nav nav-tabs text-uppercase">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="WireTransfer-tab" data-bs-toggle="tab"
                                               href="#WireTransfer">Bonifico Bancario</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="Stripe-tab" data-bs-toggle="tab"
                                               href="#Stripe">Stripe</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content shop_info_tab entry-main-content">
                                        <div class="tab-pane fade show active" id="WireTransfer">
                                            <div class="">
                                                <div id="cash-on-delivery" class="card-body expanded">
                                                    <p class="mt-3">
                                                        {!! __('checkout.payments.2') !!}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="Stripe">
                                            <div id="payment" class="card-body collapsed">
                                                <a href="#" class="AddStripeDialog"
                                                   style="cursor:pointer"
                                                   data-toggle="modal" data-target="#stripePayment">
                                                    <img src="/uploads/icon/stripe-payment-logo.png"
                                                         style="height:100px;">
                                                </a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="stripePayment" tabindex="-1"
                                                     role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                     aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered"
                                                         role="document">
                                                        <div class="modal-content " style="padding:50px">
                                                            <div class="form-group">
                                                                <label for="name_on_card">Nome sulla
                                                                    carta</label>
                                                                <input type="text" class="form-control"
                                                                       id="name_on_card"
                                                                       name="name_on_card" value="">
                                                            </div>

                                                            <div class="form-group pb-4">
                                                                <label for="card-element">
                                                                    Carta di credito o debito
                                                                </label>
                                                                <div id="card-element">
                                                                    <!-- a Stripe Element will be inserted here. -->
                                                                </div>
                                                                <!-- Used to display form errors -->
                                                                <div id="card-errors" role="alert"></div>
                                                            </div>

                                                            @if(session()->has('cart'))
                                                                <button
                                                                        class="notranslate btn btn-third btn-block btn-pill bg-indigo-500 hover:bg-indigo-800 focus:bg-indigo-500 font-size-20 mb-3 py-3"
                                                                        id="complete-order" type="submit">
                                                                    <i class="notranslate fas fa-lock"></i> {!! __('checkout.payments.5') !!}
                                                                </button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="radio" class="notranslate form-check-input"
                                                   name="stripe_payment" id="stripe_payment"
                                                   value="stripe"
                                                   hidden>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="payment-logo d-flex">
                        <img class="mr-15" src="/assets/imgs/theme/icons/payment-paypal.svg" alt="">
                        <img class="mr-15" src="/assets/imgs/theme/icons/payment-visa.svg" alt="">
                        <img class="mr-15" src="/assets/imgs/theme/icons/payment-master.svg" alt="">
                        <img src="/assets/imgs/theme/icons/payment-zapper.svg" alt="">
                    </div>
                    @if(session()->has('cart'))
                        <div class="form-group place-order pt-6">
                            <button type="submit" class="btn btn-fill-out btn-block mt-30" id="button-order"
                            >{{__('home.proceed')}}<i class="fi-rs-sign-out ml-15"></i>
                            </button>
                        </div>
                    @endif
                    {{--                    <a href="#" class="btn btn-fill-out btn-block mt-30">Place an Order<i--}}
                    {{--                                class="fi-rs-sign-out ml-15"></i></a>--}}

                </div>
                </form>
            </div>

        </div>
    </div>
    <!-- ========== MAIN CONTENT ========== -->


    {{--                        <div class="col-lg-5 mb-4 sticky-sidebar-wrapper">--}}
    {{--                            <div class="order-summary-wrapper sticky-sidebar">--}}
    {{--                                <h3 class="title text-uppercase ls-10">Il tuo ordine</h3>--}}
    {{--                                <div class="order-summary">--}}
    {{--                                    <table class="order-table">--}}
    {{--                                        <thead>--}}
    {{--                                        <tr>--}}
    {{--                                            <th colspan="2">--}}
    {{--                                                <b>Prodotti</b>--}}
    {{--                                            </th>--}}
    {{--                                        </tr>--}}
    {{--                                        </thead>--}}
    {{--                                        <tbody>--}}
    {{--                                        @if(session('cart'))--}}
    {{--                                            @foreach(session('cart') as $id => $details)--}}
    {{--                                                <tr class="bb-no">--}}
    {{--                                                    <td class="product-name">{!! substr($details['name'], 0, 30)!!}{!! strlen($details['name']) > 30 ? '...' : ""!!}--}}
    {{--                                                        <i--}}
    {{--                                                                class="fas fa-times"></i> <span--}}
    {{--                                                                class="product-quantity">{{ $details['quantity'] }}</span>--}}
    {{--                                                    </td>--}}
    {{--                                                    <td class="product-total">--}}
    {{--                                                        € {{ priceView($details['quantity'] * $details['price'])}}</td>--}}
    {{--                                                </tr>--}}
    {{--                                            @endforeach--}}
    {{--                                        @endif--}}
    {{--                                        <hr>--}}

    {{--                                        --}}{{--                                        <tr class="cart-subtotal bb-no">--}}
    {{--                                        --}}{{--                                            <td>--}}
    {{--                                        --}}{{--                                                <b>IVA</b>--}}
    {{--                                        --}}{{--                                            </td>--}}
    {{--                                        --}}{{--                                            <td>--}}
    {{--                                        --}}{{--                                                <b>+ € {{ priceView(getNumbers()->get('newTax'))}}</b>--}}
    {{--                                        --}}{{--                                            </td>--}}

    {{--                                        --}}{{--                                        </tr>--}}
    {{--                                        <tr class="cart-subtotal bb-no">--}}
    {{--                                            <td>--}}
    {{--                                                <b>Spedizione<br> <span--}}
    {{--                                                            class="pt-2" style="font-weight:400;"> <br>Corriere: Poste Italiane</span></b>--}}
    {{--                                            </td>--}}
    {{--                                            <td>--}}
    {{--                                                <b>+ € {{priceView(7.00)}}</b>--}}
    {{--                                            </td>--}}

    {{--                                        </tr>--}}
    {{--                                        @if (session()->has('coupon'))--}}
    {{--                                            <tr class="cart-subtotal bb-no">--}}
    {{--                                                <td class="notranslate text-left font-weight-bold">COUPON</td>--}}
    {{--                                                <td class="notranslate text-right font-weight-bold"><span--}}
    {{--                                                            class="amount"> <strong>{{ session()->get('coupon')['name'] }}</strong> ( - {{ priceView($discount) }})</span>--}}
    {{--                                                </td>--}}
    {{--                                            </tr>--}}
    {{--                                        @endif--}}
    {{--                                        </tbody>--}}
    {{--                                        <tfoot>--}}

    {{--                                        <tr class="order-total">--}}
    {{--                                            <th>--}}
    {{--                                                <b>Totale</b>--}}
    {{--                                            </th>--}}
    {{--                                            <td>--}}
    {{--                                                <b>€ {{ priceView( $newTotal) }}</b>--}}
    {{--                                            </td>--}}
    {{--                                        </tr>--}}
    {{--                                        </tfoot>--}}
    {{--                                    </table>--}}

    {{--                                    <div class="payment-methods" id="payment_method">--}}
    {{--                                        <h4 class="title font-weight-bold ls-25 pb-0 mb-1">Metodo di pagamento</h4>--}}
    {{--                                        <div class="accordion payment-accordion">--}}
    {{--                                            <div class="card">--}}
    {{--                                                <div class="card-header">--}}
    {{--                                                    <a href="#cash-on-delivery" class="expand" id="WireTransfer">Bonifico--}}
    {{--                                                        bancario</a>--}}
    {{--                                                    <input type="radio" class="notranslate form-check-input"--}}
    {{--                                                           name="wire_transfer" id="wire_transfer"--}}
    {{--                                                           value="wire_transfer" hidden>--}}
    {{--                                                </div>--}}
    {{--                                                <div id="cash-on-delivery" class="card-body expanded">--}}
    {{--                                                    <p class="mt-3">--}}
    {{--                                                        {!! __('checkout.payments.2') !!}--}}
    {{--                                                    </p>--}}
    {{--                                                </div>--}}
    {{--                                            </div>--}}
    {{--                                            <div class="card">--}}
    {{--                                                <div class="card-header">--}}
    {{--                                                    <a href="#payment" id="Stripe" class="expand">Stripe</a>--}}
    {{--                                                    <input type="radio" class="notranslate custom-control-input"--}}
    {{--                                                           name="stylishRadio" id="stripe_payment" hidden>--}}
    {{--                                                </div>--}}
    {{--                                                <div id="payment" class="card-body collapsed">--}}
    {{--                                                    <a href="#" class="AddStripeDialog"--}}
    {{--                                                       style="cursor:pointer"--}}
    {{--                                                       data-toggle="modal" data-target="#stripePayment">--}}
    {{--                                                        <img src="/uploads/icon/stripe-payment-logo.png"--}}
    {{--                                                             style="height:100px;">--}}
    {{--                                                    </a>--}}
    {{--                                                    <!-- Modal -->--}}
    {{--                                                    <div class="modal fade" id="stripePayment" tabindex="-1"--}}
    {{--                                                         role="dialog" aria-labelledby="exampleModalCenterTitle"--}}
    {{--                                                         aria-hidden="true">--}}
    {{--                                                        <div class="modal-dialog modal-dialog-centered"--}}
    {{--                                                             role="document">--}}
    {{--                                                            <div class="modal-content " style="padding:50px">--}}
    {{--                                                                <div class="form-group">--}}
    {{--                                                                    <label for="name_on_card">Nome sulla--}}
    {{--                                                                        carta</label>--}}
    {{--                                                                    <input type="text" class="form-control"--}}
    {{--                                                                           id="name_on_card"--}}
    {{--                                                                           name="name_on_card" value="">--}}
    {{--                                                                </div>--}}

    {{--                                                                <div class="form-group pb-4">--}}
    {{--                                                                    <label for="card-element">--}}
    {{--                                                                        Carta di credito o debito--}}
    {{--                                                                    </label>--}}
    {{--                                                                    <div id="card-element">--}}
    {{--                                                                        <!-- a Stripe Element will be inserted here. -->--}}
    {{--                                                                    </div>--}}
    {{--                                                                    <!-- Used to display form errors -->--}}
    {{--                                                                    <div id="card-errors" role="alert"></div>--}}
    {{--                                                                </div>--}}

    {{--                                                                @if(session()->has('cart'))--}}
    {{--                                                                    <button--}}
    {{--                                                                            class="notranslate btn btn-third btn-block btn-pill bg-indigo-500 hover:bg-indigo-800 focus:bg-indigo-500 font-size-20 mb-3 py-3"--}}
    {{--                                                                            id="complete-order" type="submit">--}}
    {{--                                                                        <i class="notranslate fas fa-lock"></i> {!! __('checkout.payments.5') !!}--}}
    {{--                                                                    </button>--}}
    {{--                                                                @endif--}}
    {{--                                                            </div>--}}
    {{--                                                        </div>--}}
    {{--                                                    </div>--}}
    {{--                                                </div>--}}
    {{--                                                <input type="radio" class="notranslate form-check-input"--}}
    {{--                                                       name="stripe_payment" id="stripe_payment"--}}
    {{--                                                       value="stripe"--}}
    {{--                                                       hidden>--}}
    {{--                                            </div>--}}

    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                    @if(session()->has('cart'))--}}
    {{--                                        <div class="form-group place-order pt-6">--}}
    {{--                                            <button type="submit" class="btn btn-dark btn-block btn-rounded" id="button-order"--}}
    {{--                                                    disabled>{{__('home.proceed')}}--}}
    {{--                                            </button>--}}
    {{--                                        </div>--}}
    {{--                                    @endif--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </form>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <!-- End of PageContent -->--}}
    {{--    </main>--}}
    <!-- End of Main -->

    <!-- ========== END MAIN CONTENT ========== -->
@endsection
@section('extra-js')
    <script type="text/javascript">

        (function () {
            $("#Stripe").click(function () {
                $(".AddStripeDialog").click(function () {

                    (function () {
                        // Create a Stripe client
                        var stripe = Stripe('{{ config('services.stripe.key') }}');

                        // Create an instance of Elements
                        var elements = stripe.elements();

                        // Custom styling can be passed to options when creating an Element.
                        // (Note that this demo uses a wider set of styles than the guide below.)
                        var style = {
                            base: {
                                color: '#32325d',
                                lineHeight: '20px',
                                fontFamily: '"Roboto", Helvetica Neue", Helvetica, sans-serif',
                                fontSmoothing: 'antialiased',
                                fontSize: '18px',
                                '::placeholder': {
                                    color: '#aab7c4'
                                }
                            },
                            invalid: {
                                color: '#fa755a',
                                iconColor: '#fa755a'
                            }
                        };

                        // Create an instance of the card Element
                        var card = elements.create('card', {

                            style: style,
                            hidePostalCode: true
                        });

                        // Add an instance of the card Element into the `card-element` <div>
                        card.mount('#card-element');

                        // Handle real-time validation errors from the card Element.
                        card.addEventListener('change', function (event) {
                            var displayError = document.getElementById('card-errors');
                            if (event.error) {
                                displayError.textContent = event.error.message;
                            } else {
                                displayError.textContent = '';
                            }
                        });

                        // Handle form submission
                        var form = document.getElementById('payment-form');
                        form.addEventListener('submit', function (event) {
                            event.preventDefault();

                            // Disable the submit button to prevent repeated clicks
                            document.getElementById('complete-order').disabled = true;

                            var options = {
                                name: document.getElementById('name_on_card').value,
                                address_line1: document.getElementById('shipping_address').value,
                                address_city: document.getElementById('shipping_city').value,
                                address_state: document.getElementById('shipping_province').value,
                                address_zip: document.getElementById('shipping_zipcode').value
                            }

                            stripe.createToken(card, options).then(function (result) {
                                if (result.error) {
                                    // Inform the user if there was an error
                                    var errorElement = document.getElementById('card-errors');
                                    errorElement.textContent = result.error.message;

                                    // Enable the submit button
                                    document.getElementById('complete-order').disabled = false;
                                } else {
                                    // Send the token to your server
                                    stripeTokenHandler(result.token);
                                    document.getElementById('complete-order').disabled = true;
                                }
                            });
                        });

                        function stripeTokenHandler(token) {
                            // Insert the token ID into the form so it gets submitted to the server
                            var form = document.getElementById('payment-form');
                            var hiddenInput = document.createElement('input');
                            hiddenInput.setAttribute('type', 'hidden');
                            hiddenInput.setAttribute('name', 'stripeToken');
                            hiddenInput.setAttribute('value', token.id);
                            form.appendChild(hiddenInput);

                            // Submit the form
                            form.submit();
                        }
                    })();

                });

            });
        })();
    </script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>

@endsection


