@if (session()->has('success'))
    <div class="alert alert-success alert-simple alert-inline show-code-action animated slideInRight" id="hideMe">
        <h4 class="alert-title">Operazione completata! </h4> {!! __(session()->get('success'))!!}
    </div>
@endif
@if (session()->has('mailSuccess'))
    <div class="alert alert-success alert-simple alert-inline show-code-action animated slideInRight" id="hideMe">
        <h4 class="alert-title">Operazione completata! </h4> {!! __(session()->get('mailSuccess'))!!}
    </div>
@endif
@if (session()->has('danger'))
    <div class="alert alert-warning alert-simple alert-inline show-code-action animated slideInRight" id="hideMe">
        <h4 class="alert-title">Attenzione! </h4> {!! __(session()->get('danger'))!!}
    </div>
@endif
@if (session()->has('status'))
    <div class="alert alert-success alert-simple alert-inline show-code-action animated slideInRight" id="hideMe">
        <p> <h4 class="alert-title">Operazione completata! </h4> {!! __(session()->get('status'))!!} </p>
    </div>
@endif
