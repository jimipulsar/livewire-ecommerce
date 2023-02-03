@extends('backend.adminlayouts.master')

@section('body')

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2> Modifica Profilo</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-primary" href="{{ route('customers.index') }}"> Indietro</a>

        </div>

    </div>

</div>


<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Nome:</strong>

            {{ $user->name }}

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Username:</strong>

            {{ $user->username }}

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Roles:</strong>

            @if(!empty($user->getRoleNames()))

                @foreach($user->getRoleNames() as $v)

                    <label class="badge badge-success">{{ $v }}</label>

                @endforeach

            @endif

        </div>

    </div>

</div>

@endsection
