@extends('backend.adminlayouts.master')

@section('body')

    <h3 class="text-gray-700 text-3xl font-medium">Utenti</h3>

    <livewire:search-user></livewire:search-user>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
@endsection
