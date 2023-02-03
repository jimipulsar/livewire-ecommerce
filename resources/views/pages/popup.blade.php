<div class="login-popup" id="popupContent">
    <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
        <ul class="nav nav-tabs text-uppercase" role="tablist">
            <li class="nav-item">
                <a href="#sign-in" class="nav-link active">Area riservata</a>
            </li>

        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="sign-in">

                <form method="POST" action="{{ route('login', app()->getLocale()) }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="email">E-mail *</label>
                        <input id="email" type="email"
                               class="form-control @error('email') is-invalid @enderror" name="email"
                               value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group mb-0">
                        <label for="password">Password *</label>
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror" name="password"
                               required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-checkbox d-flex align-items-center justify-content-between">
                        <a href="{{ route('password.request', app()->getLocale()) }}">Last your password?</a>
                    </div>
                    <button type="submit" class="btn btn-primary">Accedi</button>
                </form>

            </div>
            <div class="tab-pane" id="sign-up">

            </div>
        </div>
        <p class="text-center">Sign in with social account</p>
        <div class="social-icons social-icon-border-color d-flex justify-content-center">
            <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
            <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
            <a href="#" class="social-icon social-google fab fa-google"></a>
        </div>
    </div>
</div>
