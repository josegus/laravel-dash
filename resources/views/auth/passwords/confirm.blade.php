@extends(config('dash.layouts.auth'))

@section(config('dash.sections.content'))
    <h2>{{ __('Confirm Password') }}</h2>

    <div class="card">
        <div class="card-body">
            <div class="mb-4">
                {{ __('Please confirm your password before continuing.') }}
            </div>

            <form method="POST" action="{{ route(config('dash.route_prefix').'password.confirm') }}">
                @csrf

                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-block btn-primary">
                    {{ __('Confirm Password') }}
                </button>

                @if (Route::has(config('dash.route_prefix').'password.request'))
                    <div class="text-center mt-3">
                        <a href="{{ route(config('dash.route_prefix').'password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                @endif
            </form>
        </div>
    </div>
@endsection
