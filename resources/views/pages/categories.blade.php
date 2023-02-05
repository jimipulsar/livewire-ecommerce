@extends('layouts.main')
@section('title', ucFirst($ucFirst) . ' | ' . __('categories.seo.title'))

@section('description', __('categories.seo.description'))
@section('extraCss')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    <!-- Price nouislider-filter cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.css"
          integrity="sha512-MKxcSu/LDtbIYHBNAWUQwfB3iVoG9xeMCm32QV5hZ/9lFaQZJVaXfz9aFa0IZExWzCpm7OWvp9zq9gVip/nLMg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
@endsection
@section('content')
    <div class="page-header mt-30 mb-50">
        <div class="container">
            <div class="archive-header" style="background-image: url('/uploads/about/category.jpg') !important;">
                <div class="row align-items-center">
                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <h2 class="mb-15" id="shopTitle">Categorie</h2>
                        <div class="breadcrumb" id="shopTitle">
                            <a href="{{route('index', app()->getLocale())}}" rel="nofollow"><i
                                        class="fi-rs-home mr-5"></i>Home</a>
                            <span></span> <a href="{{route('mainCategory', app()->getLocale())}}" rel="nofollow">Categorie </a>@if(isset($categoryName))<span></span> {{$categoryName }}@endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <livewire:category-search></livewire:category-search>

    <!-- ========== END MAIN CONTENT ========== -->
@endsection
