@if($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-warning alert-simple alert-inline show-code-action animated slideInRight" id="hideMe">
            <h4 class="alert-title">Attenzione!</h4>{{ __($error) }}
        </div>
    @endforeach
@endif
