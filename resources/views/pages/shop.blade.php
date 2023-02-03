@extends('layouts.main')
@section('title', __('shop.seo.title'))
@section('description', __('shop.seo.description'))
@section('extraCss')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    <!-- Price nouislider-filter cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.css"
          integrity="sha512-MKxcSu/LDtbIYHBNAWUQwfB3iVoG9xeMCm32QV5hZ/9lFaQZJVaXfz9aFa0IZExWzCpm7OWvp9zq9gVip/nLMg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.min.js"--}}
{{--            integrity="sha512-T5Bneq9hePRO8JR0S/0lQ7gdW+ceLThvC80UjwkMRz+8q+4DARVZ4dqKoyENC7FcYresjfJ6ubaOgIE35irf4w=="--}}
{{--            crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
{{--    <style>--}}
{{--        .mall-slider-handles {--}}
{{--            margin-top: 50px;--}}
{{--        }--}}

{{--        .filter-container-1 {--}}
{{--            display: flex;--}}
{{--            justify-content: center;--}}
{{--            margin-top: 60px;--}}
{{--        }--}}

{{--        .filter-container-1 input {--}}
{{--            border: 1px solid #ddd;--}}
{{--            width: 100%;--}}
{{--            text-align: center;--}}
{{--            height: 30px;--}}
{{--            border-radius: 5px;--}}
{{--        }--}}

{{--        .filter-container-1 button {--}}
{{--            background: #51a179;--}}
{{--            color: #fff;--}}
{{--            padding: 5px 20px;--}}
{{--        }--}}

{{--        .filter-container-1 button:hover {--}}
{{--            background: #2e7552;--}}
{{--            color: #fff;--}}
{{--        }--}}

{{--    </style>--}}
@endsection
@section('content')

    <div class="page-header mt-30 mb-50">
        <div class="container">
            <div class="archive-header" style="background-image: url('/uploads/about/shop.jpg') !important;">
                <div class="row align-items-center">
                    <div class="col-xl-3">
                        <h2 class="mb-15" id="shopTitle">Shop</h2>
                        <div class="breadcrumb" id="shopTitle">
                            <a href="{{url('/')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                            <span id="shopTitle">Shop </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <livewire:search>
@endsection
