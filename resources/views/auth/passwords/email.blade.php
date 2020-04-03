@extends(config('dash.layouts.auth'))

@section(config('dash.sections.content'))
    <h1>{{ __('Reset Password') }}</h1>
    <div class="card">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route(config('dash.route_prefix').'password.email') }}">
                @csrf

                <div class="form-group">
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-block btn-primary">
                    {{ __('Send Password Reset Link') }}
                </button>
            </form>
        </div>
    </div>
@endsection
