@extends(config('dash.layouts.auth'))

@section(config('dash.sections.content'))
    @if (config('dash.logo'))
        <div class="mb-4 text-center">
            <a href="{{ config('dash.base_url') }}">
                <img class="logo-img" src="{{ asset(config('dash.logo')) }}" alt="logo">
            </a>
        </div>
    @endif

    <div class="card ">
        <div class="card-body">
            <form method="POST" action="{{ route(config('dash.route_prefix').'login') }}">
                @csrf

                <div class="form-group">
                    <input class="form-control @error('email') is-invalid @enderror" name="email" type="email" placeholder="{{ __('E-Mail Address') }}" autocomplete="off">
                    @error('email')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <input class="form-control @error('password') is-invalid @enderror" name="password" type="password" placeholder="{{ __('Password') }}">
                    @error('password')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox"><span class="custom-control-label">{{ __('Remember Me') }}</span>
                    </label>
                </div>

                <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
            </form>
        </div>
    </div>

    @if (Route::has(config('dash.route_prefix').'register'))
        <div class="text-center">
            <a class="btn btn-link" href="{{ route(config('dash.route_prefix').'register') }}">
                {{ __('Register') }}
            </a>
        </div>
    @endif

    @if (Route::has(config('dash.route_prefix').'password.request'))
        <div class="text-center">
            <a class="btn btn-link" href="{{ route(config('dash.route_prefix').'password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        </div>
    @endif
@endsection
