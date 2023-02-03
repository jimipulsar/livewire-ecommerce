@extends('layouts.main')
@section('title', __('home.seo.title'))
@section('description', __('home.seo.description'))

@section('content')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{route('home', app()->getLocale())}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                 <span></span> I miei indirizzi
            </div>
        </div>
    </div>
    <div class="page-content pt-60 pb-60 mb-160">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="dashboard-menu">
                                @include('auth.customer.partials.header')

                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card mb-3 mb-lg-0">
                                <form action="{{ route('addressUpdate', [app()->getLocale(),$customer->shipping_id]) }}"
                                      method="POST"
                                      enctype="multipart/form-data" class="contact-form-style mb-50">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-header">
                                        <h5 class="mb-6">Indirizzo di Spedizione</h5>
                                    </div>

                                    <div class="card-body contact-from-area">

                                        <!-- Billing Form -->
                                        <div class="notranslate row">
                                            <div class="notranslate col-md-6">
                                                <!-- Input -->
                                                <div class="notranslate js-form-message mb-6">
                                                    <label class="notranslate form-label">
                                                        {!! __('customer.address.2') !!}
                                                        <span class="notranslate text-danger">*</span>
                                                    </label>
                                                    <input type="text"
                                                           class="notranslate form-control form-control-md"
                                                           id="billing_name" name="billing_name"
                                                           value="{{$customer->billing_name}}" required=""
                                                           data-msg="Please enter your frist name."
                                                           data-error-class="notranslate u-has-error"
                                                           data-success-class="notranslate u-has-success"
                                                           autocomplete="off">
                                                </div>
                                                <!-- End Input -->
                                            </div>

                                            <div class="notranslate col-md-6">
                                                <!-- Input -->
                                                <div class="notranslate js-form-message mb-6">
                                                    <label class="notranslate form-label">
                                                        {!! __('customer.address.3') !!}
                                                        <span class="notranslate text-danger">*</span>
                                                    </label>
                                                    <input type="text"
                                                           class="notranslate form-control form-control-md"
                                                           id="billing_surname" name="billing_surname"
                                                           value="{{$customer->billing_surname}}">
                                                </div>
                                                <!-- End Input -->
                                            </div>

                                            <div class="notranslate w-100"></div>

                                            <div class="notranslate col-md-6">
                                                <!-- Input -->
                                                <div class="notranslate js-form-message mb-6">
                                                    <label class="notranslate form-label">
                                                        {!! __('customer.address.4') !!}
                                                    </label>
                                                    <input type="text"
                                                           class="notranslate form-control form-control-md"
                                                           id="billing_company" name="billing_company"

                                                           data-msg="Please enter a company name."
                                                           data-error-class="notranslate u-has-error"
                                                           data-success-class="notranslate u-has-success"
                                                           value="{{$customer->billing_company}}">
                                                </div>
                                                <!-- End Input -->
                                            </div>
                                            <div class="notranslate col-md-6">
                                                <!-- Input -->
                                                <div class="notranslate js-form-message mb-6">
                                                    <label class="notranslate form-label">
                                                        {!! __('customer.address.10') !!}
                                                    </label>
                                                    <input type="text"
                                                           class="notranslate form-control form-control-md"
                                                           id="billing_vat" name="billing_vat"

                                                           data-msg="Please enter a company name."
                                                           data-error-class="notranslate u-has-error"
                                                           data-success-class="notranslate u-has-success"
                                                           value="{{$customer->billing_vat}}">
                                                </div>
                                                <!-- End Input -->
                                            </div>

                                            <div class="notranslate col-md-4">
                                                <!-- Input -->
                                                <div class="notranslate js-form-message mb-6">
                                                    <label class="notranslate form-label">
                                                        {!! __('customer.address.6') !!}
                                                        <span class="notranslate text-danger">*</span>
                                                    </label>
                                                    <input type="text" id="billing_address"
                                                           name="billing_address"
                                                           class="notranslate form-control form-control-md"
                                                           value="{{$customer->billing_address}}"
                                                           required=""
                                                           data-msg="Please enter a valid address."
                                                           data-error-class="notranslate u-has-error"
                                                           data-success-class="notranslate u-has-success">
                                                </div>
                                                <!-- End Input -->
                                            </div>

                                            <div class="notranslate col-md-3">
                                                <!-- Input -->
                                                <div class="notranslate js-form-message mb-6">
                                                    <label class="notranslate form-label">
                                                        {!! __('customer.address.7') !!}
                                                        <span class="notranslate text-danger">*</span>
                                                    </label>
                                                    <input type="text"
                                                           class="notranslate form-control form-control-md"
                                                           id="billing_city" name="billing_city"
                                                           value="{{$customer->billing_city}}" required=""
                                                           data-msg="Please enter a valid address."
                                                           data-error-class="notranslate u-has-error"
                                                           data-success-class="notranslate u-has-success"
                                                           autocomplete="off">
                                                </div>
                                                <!-- End Input -->
                                            </div>
                                            <div class="notranslate col-md-3">
                                                <!-- Input -->
                                                <div class="notranslate js-form-message mb-6">
                                                    <label class="notranslate form-label">
                                                        {!! __('customer.address.8') !!}
                                                        <span class="notranslate text-danger">*</span>
                                                    </label>
                                                    <input type="text"
                                                           class="notranslate form-control form-control-md"
                                                           id="billing_province" name="billing_province"
                                                           value="{{$customer->billing_province}}"
                                                           autocomplete="off">
                                                </div>
                                                <!-- End Input -->
                                            </div>
                                            <div class="notranslate col-md-2">
                                                <!-- Input -->
                                                <div class="notranslate js-form-message mb-6">
                                                    <label class="notranslate form-label">
                                                        {!! __('customer.address.9') !!}
                                                        <span class="notranslate text-danger">*</span>
                                                    </label>
                                                    <input type="text"
                                                           class="notranslate form-control form-control-md"
                                                           name="billing_zipcode" id="billing_zipcode"
                                                           value="{{$customer->billing_zipcode}}">
                                                </div>
                                                <!-- End Input -->
                                            </div>
                                            <div class="notranslate col-md-6">
                                                <!-- Input -->
                                                <div class="notranslate js-form-message mb-6">
                                                    <label class="notranslate form-label">
                                                        {!! __('customer.address.5') !!}
                                                    </label>
                                                    <input type="number" id="billing_phone"
                                                           name="billing_phone"
                                                           class="notranslate form-control form-control-md"
                                                           value="{{$customer->billing_phone}}"
                                                           data-msg="Please enter your last name."
                                                           data-error-class="notranslate u-has-error"
                                                           data-success-class="notranslate u-has-success">
                                                </div>
                                                <!-- End Input -->
                                            </div>

                                            <div class="notranslate col-md-6">
                                                <!-- Input -->
                                                <div class="notranslate js-form-message mb-6">
                                                    <label class="notranslate form-label"
                                                           for="shipping_country">
                                                        {{__('checkout.address.10')}}
                                                        <span class="notranslate text-danger">*</span>
                                                    </label>
                                                    <select
                                                            class="notranslate form-control form-control-md js-select selectpicker dropdown-select"
                                                            data-msg="Please select country."
                                                            data-error-class="notranslate u-has-error"
                                                            data-success-class="notranslate u-has-success"
                                                            data-live-search="true"
                                                            data-style="form-control border-color-1 font-weight-normal"
                                                            name="shipping_country" id="shipping_country">
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
                                                <!-- End Input -->
                                            </div>

                                        </div>
                                    </div>
                                    <div class="card-header"
                                         style="margin-bottom:30px !important;margin-top:20px !important;">
                                        <h5 class="mb-5">Indirizzo di Fatturazione</h5>
                                    </div>
                                    <div class="card-body contact-from-area">
                                        <div class="notranslate row">
                                            <div class="notranslate col-lg-12 order-lg-1">
                                                <div class="notranslate pb-7 mb-7">

                                                    <!-- Billing Form -->
                                                    <div class="notranslate row">
                                                        <div class="notranslate col-md-6">
                                                            <!-- Input -->
                                                            <div class="notranslate js-form-message mb-6">
                                                                <label class="notranslate form-label">
                                                                    {!! __('customer.address.2') !!}
                                                                    <span class="notranslate text-danger">*</span>
                                                                </label>
                                                                <input type="text"
                                                                       class="notranslate form-control form-control-md"
                                                                       id="shipping_name" name="shipping_name"
                                                                       value="{{$customer->shipping_name}}" required=""
                                                                       data-msg="Please enter your frist name."
                                                                       data-error-class="notranslate u-has-error"
                                                                       data-success-class="notranslate u-has-success"
                                                                       autocomplete="off">
                                                            </div>
                                                            <!-- End Input -->
                                                        </div>

                                                        <div class="notranslate col-md-6">
                                                            <!-- Input -->
                                                            <div class="notranslate js-form-message mb-6">
                                                                <label class="notranslate form-label">
                                                                    {!! __('customer.address.3') !!}
                                                                    <span class="notranslate text-danger">*</span>
                                                                </label>
                                                                <input type="text"
                                                                       class="notranslate form-control form-control-md"
                                                                       id="shipping_surname" name="shipping_surname"
                                                                       value="{{$customer->shipping_surname}}">
                                                            </div>
                                                            <!-- End Input -->
                                                        </div>

                                                        <div class="notranslate w-100"></div>

                                                        <div class="notranslate col-md-6">
                                                            <!-- Input -->
                                                            <div class="notranslate js-form-message mb-6">
                                                                <label class="notranslate form-label">
                                                                    {!! __('customer.address.4') !!}
                                                                </label>
                                                                <input type="text"
                                                                       class="notranslate form-control form-control-md"
                                                                       id="shipping_company" name="shipping_company"

                                                                       data-msg="Please enter a company name."
                                                                       data-error-class="notranslate u-has-error"
                                                                       data-success-class="notranslate u-has-success"
                                                                       value="{{$customer->shipping_company}}">
                                                            </div>
                                                            <!-- End Input -->
                                                        </div>
                                                        <div class="notranslate col-md-6">
                                                            <!-- Input -->
                                                            <div class="notranslate js-form-message mb-6">
                                                                <label class="notranslate form-label">
                                                                    {!! __('customer.address.10') !!}
                                                                </label>
                                                                <input type="text"
                                                                       class="notranslate form-control form-control-md"
                                                                       id="shipping_vat" name="shipping_vat"

                                                                       data-msg="Please enter a company name."
                                                                       data-error-class="notranslate u-has-error"
                                                                       data-success-class="notranslate u-has-success"
                                                                       value="{{$customer->shipping_vat}}">
                                                            </div>
                                                            <!-- End Input -->
                                                        </div>

                                                        <div class="notranslate col-md-4">
                                                            <!-- Input -->
                                                            <div class="notranslate js-form-message mb-6">
                                                                <label class="notranslate form-label">
                                                                    {!! __('customer.address.6') !!}
                                                                    <span class="notranslate text-danger">*</span>
                                                                </label>
                                                                <input type="text" id="shipping_address"
                                                                       name="shipping_address"
                                                                       class="notranslate form-control form-control-md"
                                                                       value="{{$customer->shipping_address}}"
                                                                       required=""
                                                                       data-msg="Please enter a valid address."
                                                                       data-error-class="notranslate u-has-error"
                                                                       data-success-class="notranslate u-has-success">
                                                            </div>
                                                            <!-- End Input -->
                                                        </div>

                                                        <div class="notranslate col-md-3">
                                                            <!-- Input -->
                                                            <div class="notranslate js-form-message mb-6">
                                                                <label class="notranslate form-label">
                                                                    {!! __('customer.address.7') !!}
                                                                    <span class="notranslate text-danger">*</span>
                                                                </label>
                                                                <input type="text"
                                                                       class="notranslate form-control form-control-md"
                                                                       id="shipping_city" name="shipping_city"
                                                                       value="{{$customer->shipping_city}}" required=""
                                                                       data-msg="Please enter a valid address."
                                                                       data-error-class="notranslate u-has-error"
                                                                       data-success-class="notranslate u-has-success"
                                                                       autocomplete="off">
                                                            </div>
                                                            <!-- End Input -->
                                                        </div>
                                                        <div class="notranslate col-md-3">
                                                            <!-- Input -->
                                                            <div class="notranslate js-form-message mb-6">
                                                                <label class="notranslate form-label">
                                                                    {!! __('customer.address.8') !!}
                                                                    <span class="notranslate text-danger">*</span>
                                                                </label>
                                                                <input type="text"
                                                                       class="notranslate form-control form-control-md"
                                                                       id="shipping_province" name="shipping_province"
                                                                       value="{{$customer->shipping_province}}"
                                                                       autocomplete="off">
                                                            </div>
                                                            <!-- End Input -->
                                                        </div>
                                                        <div class="notranslate col-md-2">
                                                            <!-- Input -->
                                                            <div class="notranslate js-form-message mb-6">
                                                                <label class="notranslate form-label">
                                                                    {!! __('customer.address.9') !!}
                                                                    <span class="notranslate text-danger">*</span>
                                                                </label>
                                                                <input type="text"
                                                                       class="notranslate form-control form-control-md"
                                                                       name="shipping_zipcode" id="shipping_zipcode"
                                                                       value="{{$customer->shipping_zipcode}}">
                                                            </div>
                                                            <!-- End Input -->
                                                        </div>
                                                        <div class="notranslate col-md-6">
                                                            <!-- Input -->
                                                            <div class="notranslate js-form-message mb-6">
                                                                <label class="notranslate form-label">
                                                                    {!! __('customer.address.5') !!}
                                                                </label>
                                                                <input type="number" id="shipping_phone"
                                                                       name="shipping_phone"
                                                                       class="notranslate form-control form-control-md"
                                                                       value="{{$customer->shipping_phone}}"
                                                                       data-msg="Please enter your last name."
                                                                       data-error-class="notranslate u-has-error"
                                                                       data-success-class="notranslate u-has-success">
                                                            </div>
                                                            <!-- End Input -->
                                                        </div>

                                                        <div class="notranslate col-md-6">
                                                            <!-- Input -->
                                                            <div class="notranslate js-form-message mb-6">
                                                                <label class="notranslate form-label"
                                                                       for="shipping_country">
                                                                    {{__('checkout.address.10')}}
                                                                    <span class="notranslate text-danger">*</span>
                                                                </label>
                                                                <select
                                                                        class="notranslate form-control form-control-md js-select selectpicker dropdown-select"
                                                                        data-msg="Please select country."
                                                                        data-error-class="notranslate u-has-error"
                                                                        data-success-class="notranslate u-has-success"
                                                                        data-live-search="true"
                                                                        data-style="form-control border-color-1 font-weight-normal"
                                                                        name="shipping_country" id="shipping_country">
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
                                                            <!-- End Input -->
                                                        </div>

                                                        <div class="notranslate w-100"></div>
                                                        <div class="notranslate d-md-flex"
                                                             style="margin-top:30px !important;">
                                                            <button type="submit"
                                                                    class="btn btn-fill-out submit font-weight-bold">
                                                                {!! __('customer.save') !!}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection

{{--<main class="main">--}}
{{--    @include('auth.customer.partials.header')--}}

{{--    <!-- Start of PageContent -->--}}
{{--        <div class="page-content">--}}
{{--            <div class="container">--}}
{{--                <div class="tab tab-vertical row gutter-lg">--}}
{{--                    @include('auth.customer.partials.sidebar')--}}
{{--                    <div class="tab-content">--}}
{{--                        <div class="tab-pane active in" id="account-dashboard">--}}

{{--                            <div class="tab-pane" id="account-addresses">--}}
{{--                                <div class="icon-box icon-box-side icon-box-light">--}}
{{--                                    <span class="icon-box-icon icon-map-marker">--}}
{{--                                        <i class="w-icon-map-marker"></i>--}}
{{--                                    </span>--}}
{{--                                    <div class="icon-box-content">--}}
{{--                                        <h4 class="icon-box-title mb-0 ls-normal">I miei indirizzi</h4>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="row mt-10">--}}
{{--                                    <div class="col-sm-12 mb-6">--}}
{{--                                        <div class="ecommerce-address billing-address pr-lg-8">--}}
{{--                                            <h4 class="title title-underline ls-25 font-weight-bold">Indirizzo di fatturazione</h4>--}}

{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- End of PageContent -->--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </main>--}}


