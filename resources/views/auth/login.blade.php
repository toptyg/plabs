@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="/physlabs/login">
                        @csrf

    <!--                    <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
-->
			@include('layouts.spbstu')
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<style>
.auth0-lock-social-button .auth0-lock-social-button-icon {
    width: 40px;
    height: 40px;
    position: absolute;
    top: 0;
    left: 0;
    transition: background-color 0.3s;
    -webkit-transition: background-color 0.3s;
}

.button-icon {
    width: 40px;
    height: 40px;
    position: absolute;
    top: 0;
    left: 0;
    transition: background-color 0.3s;
    -webkit-transition: background-color 0.3s;
}

.auth0-lock-social-button[data-provider^=scos] .auth0-lock-social-button-icon {
    background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz48c3ZnIHZlcnNpb249IjEuMSIgaWQ9ItCh0LvQvtC5XzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSItMzEgMzEuNCAzNi44IDM2LjgiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgLTMxIDMxLjQgMzYuOCAzNi44OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+PHN0eWxlIHR5cGU9InRleHQvY3NzIj4uc3Qwe2ZpbGw6I0ZGRkZGRjt9PC9zdHlsZT48cGF0aCBjbGFzcz0ic3QwIiBkPSJNLTMwLjEsMzEuNGMtMC40LDAtMC44LDAuNC0wLjgsMC44YzAsMC40LDAuMywwLjcsMC43LDAuN2MwLjQsMCwwLjctMC4zLDAuNy0wLjdDLTI5LjUsMzEuOC0yOS43LDMxLjQtMzAuMSwzMS40IE0tMjUuOCwzMi45YzAuNCwwLDAuNy0wLjMsMC43LTAuN3MtMC4zLTAuOC0wLjctMC44cy0wLjcsMC4zLTAuNywwLjdDLTI2LjUsMzIuNS0yNi4yLDMyLjktMjUuOCwzMi45IE0tMjEuNCwzMi45YzAuNCwwLDAuNy0wLjMsMC43LTAuN3MtMC4zLTAuOC0wLjctMC44cy0wLjcsMC4zLTAuNywwLjdDLTIyLjEsMzIuNS0yMS44LDMyLjktMjEuNCwzMi45IE0tMzAuMSw2Mi40Yy0wLjQsMC0wLjgsMC4zLTAuOCwwLjdzMC4zLDAuNywwLjcsMC43YzAuNCwwLDAuNy0wLjMsMC43LTAuN0MtMjkuNCw2Mi43LTI5LjcsNjIuNC0zMC4xLDYyLjQgTS0yNS44LDYyLjRjLTAuNCwwLTAuNywwLjMtMC43LDAuN3MwLjMsMC43LDAuNywwLjdzMC43LTAuMywwLjctMC43Qy0yNSw2Mi43LTI1LjQsNjIuNC0yNS44LDYyLjQgTS0yMS40LDYyLjRjLTAuNCwwLTAuNywwLjMtMC43LDAuN3MwLjMsMC43LDAuNywwLjdzMC43LTAuMywwLjctMC43Qy0yMC42LDYyLjctMjEsNjIuNC0yMS40LDYyLjQgTS0xNywzMi45YzAuNCwwLDAuNy0wLjMsMC43LTAuN3MtMC4zLTAuOC0wLjctMC44cy0wLjcsMC4zLTAuNywwLjdDLTE3LjcsMzIuNS0xNy40LDMyLjktMTcsMzIuOSBNLTEyLjYsMzIuOWMwLjQsMCwwLjctMC4zLDAuNy0wLjdzLTAuMy0wLjgtMC43LTAuOHMtMC43LDAuMy0wLjcsMC43Qy0xMy4zLDMyLjUtMTMsMzIuOS0xMi42LDMyLjkgTS04LjIsMzIuOWMwLjQsMCwwLjctMC4zLDAuNy0wLjdzLTAuMy0wLjgtMC43LTAuOHMtMC43LDAuMy0wLjcsMC43Qy04LjksMzIuNS04LjYsMzIuOS04LjIsMzIuOSBNLTMuOCwzMi45YzAuNCwwLDAuNy0wLjMsMC43LTAuN3MtMC4zLTAuOC0wLjctMC44cy0wLjcsMC4zLTAuNywwLjdDLTQuNSwzMi41LTQuMiwzMi45LTMuOCwzMi45IE0wLjYsMzIuOWMwLjQsMCwwLjctMC4zLDAuNy0wLjdTMSwzMS40LDAuNiwzMS40cy0wLjcsMC4zLTAuNywwLjdDLTAuMSwzMi41LDAuMiwzMi45LDAuNiwzMi45IE0tMzAuMSw2Ni44Yy0wLjQsMC0wLjcsMC4zLTAuNywwLjdzMC4zLDAuNywwLjcsMC43YzAuNCwwLDAuNy0wLjMsMC43LTAuN1MtMjkuNyw2Ni44LTMwLjEsNjYuOCBNLTI1LjgsNjYuOGMtMC40LDAtMC43LDAuMy0wLjcsMC43czAuMywwLjcsMC43LDAuN3MwLjctMC4zLDAuNy0wLjdDLTI1LDY3LjEtMjUuNCw2Ni44LTI1LjgsNjYuOCBNLTIxLjQsNjYuOGMtMC40LDAtMC43LDAuMy0wLjcsMC43czAuMywwLjcsMC43LDAuN3MwLjctMC4zLDAuNy0wLjdDLTIwLjYsNjcuMS0yMSw2Ni44LTIxLjQsNjYuOCBNLTE3LDY2LjhjLTAuNCwwLTAuNywwLjMtMC43LDAuN3MwLjMsMC43LDAuNywwLjdzMC43LTAuMywwLjctMC43Qy0xNi4zLDY3LjEtMTYuNiw2Ni44LTE3LDY2LjggTS0xMi42LDY2LjhjLTAuNCwwLTAuNywwLjMtMC43LDAuN3MwLjMsMC43LDAuNywwLjdzMC43LTAuMywwLjctMC43Uy0xMi4yLDY2LjgtMTIuNiw2Ni44IE0tOC4yLDY2LjhjLTAuNCwwLTAuNywwLjMtMC43LDAuN3MwLjMsMC43LDAuNywwLjdzMC43LTAuMywwLjctMC43Qy03LjUsNjcuMS03LjgsNjYuOC04LjIsNjYuOCBNLTMuOCw2Ni44Yy0wLjQsMC0wLjcsMC4zLTAuNywwLjdzMC4zLDAuNywwLjcsMC43czAuNy0wLjMsMC43LTAuN0MtMy4xLDY3LjEtMy40LDY2LjgtMy44LDY2LjggTTAuNiw2Ni44Yy0wLjQsMC0wLjcsMC4zLTAuNywwLjdzMC4zLDAuNywwLjcsMC43czAuNy0wLjMsMC43LTAuN1MxLDY2LjgsMC42LDY2LjggTS0zLjgsNjIuNGMtMC40LDAtMC43LDAuMy0wLjcsMC43czAuMywwLjcsMC43LDAuN3MwLjctMC4zLDAuNy0wLjdDLTMuMSw2Mi43LTMuNCw2Mi40LTMuOCw2Mi40IE0wLjYsNjIuNGMtMC40LDAtMC43LDAuMy0wLjcsMC43czAuMywwLjcsMC43LDAuN3MwLjctMC4zLDAuNy0wLjdTMSw2Mi40LDAuNiw2Mi40IE0wLjYsNThjLTAuNCwwLTAuNywwLjMtMC43LDAuN3MwLjMsMC43LDAuNywwLjdzMC43LTAuMywwLjctMC43UzEsNTgsMC42LDU4IE01LDMyLjljMC40LDAsMC43LTAuMywwLjctMC43UzUuNCwzMS40LDUsMzEuNGMtMC40LDAtMC43LDAuMy0wLjcsMC43QzQuMywzMi41LDQuNiwzMi45LDUsMzIuOSBNLTMwLjEsNDQuN2MtMC40LDAtMC44LDAuMy0wLjgsMC43czAuMywwLjcsMC43LDAuN2MwLjQsMCwwLjctMC4zLDAuNy0wLjdDLTI5LjQsNDUtMjkuNyw0NC43LTMwLjEsNDQuNyBNLTEyLjYsNDguNWMtMC43LDAtMS4zLDAuNi0xLjMsMS4zbDAsMGMwLDAuNywwLjYsMS4zLDEuMywxLjNsMCwwYzAuNywwLDEuMy0wLjYsMS4zLTEuM2wwLDBDLTExLjMsNDkuMS0xMS45LDQ4LjYtMTIuNiw0OC41IE01LDQ0LjdjLTAuNCwwLTAuNywwLjMtMC43LDAuN3MwLjMsMC43LDAuNywwLjdzMC43LTAuMywwLjctMC43UzUuNCw0NC43LDUsNDQuN0w1LDQ0LjcgTS0zMC4xLDM1LjhjLTAuNCwwLTAuOCwwLjQtMC44LDAuOHMwLjMsMC43LDAuNywwLjdjMC40LDAsMC43LTAuMywwLjctMC43Qy0yOS40LDM2LjItMjkuNywzNS44LTMwLjEsMzUuOCBNLTI1LjgsMzcuM2MwLjQsMCwwLjctMC4zLDAuNy0wLjdzLTAuMy0wLjctMC43LTAuN3MtMC43LDAuMy0wLjcsMC43Uy0yNi4yLDM3LjMtMjUuOCwzNy4zIE0tMjEuNCwzNy4zYzAuNCwwLDAuNy0wLjMsMC43LTAuN3MtMC4zLTAuNy0wLjctMC43cy0wLjcsMC4zLTAuNywwLjdTLTIxLjgsMzcuMy0yMS40LDM3LjMgTS0zLjgsMzcuM2MwLjQsMCwwLjctMC4zLDAuNy0wLjdzLTAuMy0wLjctMC43LTAuN3MtMC43LDAuMy0wLjcsMC43Qy00LjYsMzctNC4yLDM3LjMtMy44LDM3LjMgTTAuNiwzNy4zYzAuNCwwLDAuNy0wLjMsMC43LTAuN1MxLDM1LjksMC42LDM1LjlzLTAuNywwLjMtMC43LDAuN0MtMC4yLDM3LDAuMiwzNy4zLDAuNiwzNy4zIE01LDM1LjhjLTAuNCwwLTAuNywwLjMtMC43LDAuN3MwLjMsMC43LDAuNywwLjdzMC43LTAuMywwLjctMC43QzUuNywzNi4yLDUuNCwzNS44LDUsMzUuOCBNLTMwLjEsNDAuM2MtMC40LDAtMC44LDAuMy0wLjgsMC43czAuMywwLjcsMC43LDAuN2MwLjQsMCwwLjctMC4zLDAuNy0wLjdDLTI5LjQsNDAuNi0yOS43LDQwLjMtMzAuMSw0MC4zIE0tMjUuOCw0MS43YzAuNCwwLDAuNy0wLjMsMC43LTAuN3MtMC4zLTAuNy0wLjctMC43cy0wLjcsMC4zLTAuNywwLjdTLTI2LjIsNDEuNy0yNS44LDQxLjcgTTAuNiw0MS43YzAuNCwwLDAuNy0wLjMsMC43LTAuN1MxLDQwLjMsMC42LDQwLjNzLTAuNywwLjMtMC43LDAuN0MtMC4yLDQxLjQsMC4yLDQxLjcsMC42LDQxLjcgTTUsNDAuM2MtMC40LDAtMC43LDAuMy0wLjcsMC43czAuMywwLjcsMC43LDAuN3MwLjctMC4zLDAuNy0wLjdTNS40LDQwLjMsNSw0MC4zTDUsNDAuMyBNNSw0OS4xYy0wLjQsMC0wLjcsMC4zLTAuNywwLjdzMC4zLDAuNywwLjcsMC43czAuNy0wLjMsMC43LTAuN0M1LjcsNDkuNCw1LjQsNDkuMSw1LDQ5LjEgTTUsNjIuNGMtMC40LDAtMC43LDAuMy0wLjcsMC43czAuMywwLjcsMC43LDAuN3MwLjctMC4zLDAuNy0wLjdTNS40LDYyLjQsNSw2Mi40IE01LDY2LjhjLTAuNCwwLTAuNywwLjMtMC43LDAuN3MwLjMsMC43LDAuNywwLjdzMC43LTAuMywwLjctMC43QzUuNyw2Ny4xLDUuNCw2Ni44LDUsNjYuOCBNNSw1My41Yy0wLjQsMC0wLjcsMC4zLTAuNywwLjdzMC4zLDAuNywwLjcsMC43czAuNy0wLjMsMC43LTAuN0M1LjcsNTMuOSw1LjQsNTMuNSw1LDUzLjUgTTUsNThjLTAuNCwwLTAuNywwLjMtMC43LDAuN3MwLjMsMC43LDAuNywwLjdzMC43LTAuMywwLjctMC43UzUuNCw1OCw1LDU4IE0tMzAuMSw1OGMtMC40LDAtMC43LDAuMy0wLjcsMC43czAuMywwLjcsMC43LDAuN2MwLjQsMCwwLjctMC4zLDAuNy0wLjdTLTI5LjcsNTgtMzAuMSw1OCBNLTMwLjEsNTMuNWMtMC40LDAtMC43LDAuMy0wLjcsMC43czAuMywwLjcsMC43LDAuN2MwLjQsMCwwLjctMC4zLDAuNy0wLjdDLTI5LjQsNTMuOS0yOS43LDUzLjUtMzAuMSw1My41IE0tMzAuMSw0OS4xYy0wLjQsMC0wLjgsMC4zLTAuOCwwLjdzMC4zLDAuNywwLjcsMC43YzAuNCwwLDAuNy0wLjMsMC43LTAuN0MtMjkuNCw0OS40LTI5LjcsNDkuMS0zMC4xLDQ5LjEgTS0yNS44LDU4Yy0wLjQsMC0wLjcsMC4zLTAuNywwLjdzMC4zLDAuNywwLjcsMC43czAuNy0wLjMsMC43LTAuN0MtMjUsNTguMy0yNS40LDU4LTI1LjgsNTggTS0xMi42LDYyLjJjLTAuNSwwLTAuOSwwLjQtMC45LDFjMCwwLjUsMC40LDEsMC45LDFzMC45LTAuNCwwLjktMUMtMTEuNiw2Mi42LTEyLjEsNjIuMi0xMi42LDYyLjIgTS04LjIsNjIuMmMtMC41LDAtMC45LDAuNC0wLjksMWMwLDAuNSwwLjQsMSwwLjksMXMwLjktMC40LDAuOS0xQy03LjIsNjIuNi03LjcsNjIuMi04LjIsNjIuMiBNLTE3LDYyLjJjLTAuNSwwLTAuOSwwLjQtMC45LDFjMCwwLjUsMC40LDEsMC45LDFzMC45LTAuNCwwLjktMUMtMTYsNjIuNi0xNi41LDYyLjItMTcsNjIuMiBNLTEyLjYsMzcuNWMwLjUsMCwwLjktMC40LDAuOS0xYzAtMC41LTAuNC0xLTAuOS0xcy0wLjksMC40LTAuOSwxQy0xMy42LDM3LjEtMTMuMSwzNy41LTEyLjYsMzcuNSBNLTguMiwzNy41YzAuNSwwLDAuOS0wLjQsMC45LTFjMC0wLjUtMC40LTEtMC45LTFzLTAuOSwwLjQtMC45LDFDLTkuMiwzNy4xLTguNywzNy41LTguMiwzNy41IE0tMy44LDQyYzAuNSwwLDAuOS0wLjQsMC45LTFjMC0wLjUtMC40LTEtMC45LTFzLTAuOSwwLjQtMC45LDFDLTQuOCw0MS41LTQuMyw0Mi0zLjgsNDIgTTAuNiw0NC41Yy0wLjUsMC0wLjksMC40LTAuOSwxYzAsMC41LDAuNCwxLDAuOSwxczAuOS0wLjQsMC45LTFTMS4xLDQ0LjUsMC42LDQ0LjUgTTAuNiw0OC45Yy0wLjUsMC0wLjksMC40LTAuOSwxYzAsMC41LDAuNCwxLDAuOSwxczAuOS0wLjQsMC45LTFDMS41LDQ5LjMsMS4xLDQ4LjksMC42LDQ4LjlMMC42LDQ4LjkgTTAuNiw1My4zYy0wLjUsMC0wLjksMC40LTAuOSwxYzAsMC41LDAuNCwxLDAuOSwxczAuOS0wLjQsMC45LTFTMS4xLDUzLjMsMC42LDUzLjNMMC42LDUzLjMgTS0yNS44LDQ0LjVjLTAuNSwwLTAuOSwwLjQtMC45LDFzMC40LDEsMC45LDFzMC45LTAuNCwwLjktMUMtMjQuOCw0NC45LTI1LjIsNDQuNS0yNS44LDQ0LjUgTS0yNS44LDQ4LjljLTAuNSwwLTAuOSwwLjQtMC45LDFjMCwwLjUsMC40LDEsMC45LDFzMC45LTAuNCwwLjktMUMtMjQuOCw0OS4zLTI1LjIsNDguOS0yNS44LDQ4LjkgTS0yNS44LDUzLjNjLTAuNSwwLTAuOSwwLjQtMC45LDFjMCwwLjUsMC40LDEsMC45LDFzMC45LTAuNCwwLjktMUMtMjQuOCw1My43LTI1LjIsNTMuMy0yNS44LDUzLjMgTS0zLjgsNTcuN2MtMC41LDAtMC45LDAuNC0wLjksMXMwLjQsMSwwLjksMXMwLjktMC40LDAuOS0xQy0yLjksNTguMS0zLjMsNTcuNy0zLjgsNTcuNyBNLTIxLjQsNDJjMC41LDAsMC45LTAuNCwwLjktMWMwLTAuNS0wLjQtMS0wLjktMXMtMC45LDAuNC0wLjksMUMtMjIuMyw0MS41LTIxLjksNDItMjEuNCw0MiBNLTIxLjQsNTcuN2MtMC41LDAtMC45LDAuNC0wLjksMXMwLjQsMSwwLjksMXMwLjktMC40LDAuOS0xQy0yMC40LDU4LjEtMjAuOSw1Ny43LTIxLjQsNTcuNyBNLTE3LDM3LjVjMC41LDAsMC45LTAuNCwwLjktMWMwLTAuNS0wLjQtMS0wLjktMXMtMC45LDAuNC0wLjksMVMtMTcuNSwzNy41LTE3LDM3LjVMLTE3LDM3LjUgTS0xMi42LDUzLjFjLTAuNiwwLTEuMiwwLjUtMS4yLDEuMmwwLDBjMCwwLjcsMC41LDEuMiwxLjIsMS4ybDAsMGMwLjYsMCwxLjItMC41LDEuMi0xLjJsMCwwQy0xMS40LDUzLjYtMTIsNTMuMS0xMi42LDUzLjEgTS04LjIsNTMuMWMtMC42LDAtMS4yLDAuNS0xLjIsMS4ybDAsMGMwLDAuNywwLjUsMS4yLDEuMiwxLjJsMCwwYzAuNiwwLDEuMi0wLjUsMS4yLTEuMmwwLDBDLTcsNTMuNi03LjYsNTMuMS04LjIsNTMuMUwtOC4yLDUzLjEgTS0xNyw1My4xYy0wLjYsMC0xLjIsMC41LTEuMiwxLjJsMCwwYzAsMC43LDAuNSwxLjIsMS4yLDEuMmwwLDBjMC42LDAsMS4yLTAuNSwxLjItMS4ybDAsMEMtMTUuOCw1My42LTE2LjMsNTMuMS0xNyw1My4xTC0xNyw1My4xIE0tMTIuNiw0Ni42YzAuNiwwLDEuMi0wLjUsMS4yLTEuMmwwLDBjMC0wLjctMC41LTEuMi0xLjItMS4ybDAsMGMtMC42LDAtMS4yLDAuNS0xLjIsMS4ybDAsMEMtMTMuOCw0Ni4xLTEzLjIsNDYuNi0xMi42LDQ2LjZMLTEyLjYsNDYuNiBNLTguMiw0NC4yYy0wLjYsMC0xLjIsMC41LTEuMiwxLjJsMCwwYzAsMC43LDAuNSwxLjIsMS4yLDEuMmwwLDBjMC42LDAsMS4yLTAuNSwxLjItMS4ybDAsMEMtNyw0NC44LTcuNiw0NC4yLTguMiw0NC4yTC04LjIsNDQuMiBNLTE3LDQ0LjJjLTAuNiwwLTEuMiwwLjUtMS4yLDEuMmwwLDBjMCwwLjcsMC41LDEuMiwxLjIsMS4ybDAsMGMwLjYsMCwxLjItMC41LDEuMi0xLjJsMCwwQy0xNS44LDQ0LjgtMTYuMyw0NC4yLTE3LDQ0LjJMLTE3LDQ0LjIgTS04LjIsNDguN2MtMC42LDAtMS4yLDAuNS0xLjIsMS4ybDAsMGMwLDAuNywwLjUsMS4yLDEuMiwxLjJsMCwwYzAuNiwwLDEuMi0wLjUsMS4yLTEuMmwwLDBDLTcsNDkuMi03LjYsNDguNy04LjIsNDguN0wtOC4yLDQ4LjcgTS0xNyw0OC43Yy0wLjYsMC0xLjIsMC41LTEuMiwxLjJsMCwwYzAsMC43LDAuNSwxLjIsMS4yLDEuMmwwLDBjMC42LDAsMS4yLTAuNSwxLjItMS4ybDAsMEMtMTUuOCw0OS4yLTE2LjMsNDguNy0xNyw0OC43TC0xNyw0OC43IE0tOC4yLDU3LjZjLTAuNiwwLTEuMSwwLjUtMS4xLDEuMXMwLjUsMS4xLDEuMSwxLjFzMS4xLTAuNSwxLjEtMS4xQy03LjEsNTguMS03LjYsNTcuNi04LjIsNTcuNiBNLTEyLjYsNTcuNmMtMC42LDAtMS4xLDAuNS0xLjEsMS4xczAuNSwxLjEsMS4xLDEuMXMxLTAuNSwxLjEtMS4xQy0xMS41LDU4LjEtMTIsNTcuNi0xMi42LDU3LjYgTS0xNyw1Ny42Yy0wLjYsMC0xLjEsMC41LTEuMSwxLjFzMC41LDEuMSwxLjEsMS4xczEtMC41LDEuMS0xLjFDLTE1LjksNTguMS0xNi40LDU3LjYtMTcsNTcuNiBNLTguMiw0Mi4xYzAuNiwwLDEuMS0wLjUsMS4xLTEuMXMtMC41LTEuMS0xLjEtMS4xcy0xLjEsMC41LTEuMSwxLjFDLTkuMyw0MS42LTguOCw0Mi4xLTguMiw0Mi4xIE0tMy44LDQ0LjRjLTAuNiwwLTEsMC41LTEuMSwxLjFjMCwwLjYsMC41LDEuMSwxLjEsMS4xczEtMC41LDEuMS0xLjFDLTIuOCw0NC44LTMuMiw0NC40LTMuOCw0NC40IE0tMy44LDQ4LjhjLTAuNiwwLTEsMC41LTEuMSwxLjFjMCwwLjYsMC41LDEuMSwxLjEsMS4xczEtMC41LDEuMS0xLjFDLTIuOCw0OS4zLTMuMiw0OC44LTMuOCw0OC44IE0tMy44LDUzLjJjLTAuNiwwLTEsMC41LTEuMSwxLjFjMCwwLjYsMC41LDEuMSwxLjEsMS4xczEtMC41LDEuMS0xLjFDLTIuOCw1My43LTMuMiw1My4yLTMuOCw1My4yIE0tMjEuNCw0NC40Yy0wLjYsMC0xLjEsMC41LTEuMSwxLjFzMC41LDEuMSwxLjEsMS4xczEtMC41LDEuMS0xLjFDLTIwLjMsNDQuOC0yMC44LDQ0LjQtMjEuNCw0NC40IE0tMjEuNCw0OC44Yy0wLjYsMC0xLjEsMC41LTEuMSwxLjFTLTIyLDUxLTIxLjQsNTFzMS0wLjUsMS4xLTEuMUMtMjAuMyw0OS4zLTIwLjgsNDguOC0yMS40LDQ4LjggTS0yMS40LDUzLjJjLTAuNiwwLTEuMSwwLjUtMS4xLDEuMXMwLjUsMS4xLDEuMSwxLjFzMS0wLjUsMS4xLTEuMUMtMjAuMyw1My43LTIwLjgsNTMuMi0yMS40LDUzLjIgTS0xMi42LDQyLjFjMC42LDAsMS0wLjUsMS4xLTEuMWMwLTAuNi0wLjUtMS4xLTEuMS0xLjFzLTEsMC41LTEuMSwxLjFDLTEzLjYsNDEuNi0xMy4yLDQyLjEtMTIuNiw0Mi4xIE0tMTcsNDIuMWMwLjYsMCwxLTAuNSwxLjEtMS4xYzAtMC42LTAuNS0xLjEtMS4xLTEuMXMtMSwwLjUtMS4xLDEuMUMtMTgsNDEuNi0xNy42LDQyLjEtMTcsNDIuMSIvPjwvc3ZnPg==);
}

.auth0-lock-social-button-icon {
    background-repeat: no-repeat;
    background-size: 50%;
    background-position: center center;
}

.auth0-lock select {
    text-transform: none;
}

.auth0-lock button, .auth0-lock input, .auth0-lock optgroup, .auth0-lock select, .auth0-lock textarea {
    color: inherit;
    font: inherit;
    margin: 0;
}

.auth0-lock-content {
    padding-top: 20px;
    box-sizing: border-box;
}

.auth0-lock-social-button.auth0-lock-social-big-button .auth0-lock-social-button-icon {
    background-color: rgba(0,0,0,0.3);
}

.auth0-lock-social-button.auth0-lock-social-big-button:first-child {
    margin-top: 0;
}

.auth0-lock-social-button.auth0-lock-social-big-button {
    display: block;
    margin: 10px 0 0;
    width: 100%;
}

.auth0-lock-social-button {
    border: 0;
    padding: 0;
    display: inline-block;
    box-sizing: border-box;
    overflow: hidden;
    border-radius: 3px;
    margin: 4px;
    position: relative;
    width: 40px;
    height: 40px;
    -webkit-transition: background-color 0.2s ease-in-out;
    transition: background-color 0.2s ease-in-out;
}

.page-login-v2 .page-login-main .brand {
    margin-bottom: 10px;
}

.auth0-lock.auth0-lock * {
    box-sizing: initial;
}

.auth0-lock-social-button[data-provider="scos"] {
    background-color: #F54A52;
    height: 40px;
}

.auth0-lock-social-button[data-provider="spbstu-oauth2"] .auth0-lock-social-button-icon {
    background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyOS43ODEiIGhlaWdodD0iMzAiIHZpZXdCb3g9IjAgMCA1Ny43ODEgNTgiPiAgPGRlZnM+ICAgIDxzdHlsZT4gICAgICAuY2xzLTEgeyAgICAgICAgZmlsbDogI2QyZDJkMjsgICAgICAgIGZpbGwtcnVsZTogZXZlbm9kZDsgICAgICB9ICAgIDwvc3R5bGU+ICA8L2RlZnM+ICA8cGF0aCBpZD0icG9seS1sb2dvLnN2ZyIgY2xhc3M9ImNscy0xIiBkPSJNMTQ2LjIsNjcuNTIyYzEuMywwLjU0OCwzLjUxOCwzLjgzOCwzLjAyNSw3LjQzMmExOC4zMTMsMTguMzEzLDAsMCwxLTguNDU3LDMuODM4VjEwMS43aDguNjQxYzAsMy41MzItLjU1NSw2LjMzNS0xLjE3Miw3LjM3MWgtMTUuOFY3OS4xNTdIMTIxLjQ0NVY5Ny4wMDZjMCw5LjAxNi01LjEyNCwxMy40LTExLjY2NiwxMy40YTIyLjM1NCwyMi4zNTQsMCwwLDEtNS45MjUtLjc5MmMtMC44NjUtMS4xNTctMS4zLTQuNjMtMS40Mi04Ljk1NSw0LjMyMSwyLjA3MSwxMC4yNDYsMy4wNDYsMTAuNzQtMy42NTVWODAuMzE1Yy02LjYwNS42Ny05LjAxMiw1LjIzOS0xMS4zLDguMjg1LDAuMDYxLTQuMDgyLjI0Ny03LjgsMC40OTMtMTAuMyw0LjUwNi00LjgxMiw5LjU2OC03LjA2NiwxOS41NjgtNy4wNjZIMTM2LjJhMTUuNTgsMTUuNTgsMCwwLDAsMTAtMy43MTZNMTI1Ljg4OSw2MWMtMTIuODM5LDAtMTguMDI0Ljc5Mi0xOC4wMjQsMC43OTItNS40OTQuMjQzLTkuMzgyLDMuOTU5LTkuOTM4LDEwLjI5NCwwLDAtLjkyNiw4LjI4NC0wLjkyNiwxNy45MXMwLjkyNiwxNy45MS45MjYsMTcuOTFjMC41NTUsNi4zMzUsNC40NDQsMTAuMTEyLDkuOTM4LDEwLjMsMCwwLDUuMTg2Ljc5MywxOC4wMjUsMC43OTNzMTguMDI0LS43OTMsMTguMDI0LTAuNzkzYzUuNDkzLS4yNDQsOS4zODMtMy45NTksOS45MzgtMTAuM0ExNzMuMjcyLDE3My4yNzIsMCwwLDAsMTU0Ljc3OCw5MGMwLTkuNTY0LS45MjYtMTcuOTEtMC45MjYtMTcuOTEtMC41NTUtNi4zMzUtNC40NDQtMTAuMTEyLTkuOTM4LTEwLjMsMC0uMDYxLTUuMTg2LTAuNzkxLTE4LjAyNS0wLjc5MSIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoLTk3IC02MSkiLz48L3N2Zz4=);
}

html input[type="button"], .auth0-lock input[type="reset"], .auth0-lock input[type="submit"] {
    -webkit-appearance: button;
    cursor: pointer;
}

.auth0-lock select {
    text-transform: none;
}

.auth0-lock button {
    overflow: visible;
}

.auth0-lock button, .auth0-lock input, .auth0-lock optgroup, .auth0-lock select, .auth0-lock textarea {
    color: inherit;
    font: inherit;
    margin: 0;
}

/*.auth0-lock-social-button.auth0-lock-social-big-button {
    display: block;
    margin: 10px 0 0;
    width: 100%;
}*/
.auth0-lock-social-button {
    border: 0;
    padding: 0;
    display: inline-block;
    box-sizing: border-box;
    overflow: hidden;
    border-radius: 3px;
    margin: 4px;
    position: relative;
    width: 40px;
    height: 40px;
    -webkit-transition: background-color 0.2s ease-in-out;
    transition: background-color 0.2s ease-in-out;
}

.auth0-lock.auth0-lock * {
    box-sizing: initial;
}

.auth0-lock-social-button[data-provider^="spbstu"] {
    background-color: #45b45a;
}

.auth0-lock-social-buttons-container {
    color: #fff;
}

.auth0-lock-social-button.auth0-lock-social-big-button .auth0-lock-social-button-text {
    box-sizing: border-box;
    display: block;
    overflow: hidden;
    width: 100%;
    padding-left: 54px;
    padding-right: 15px;
    line-height: 40px;
    text-align: left;
    text-transform: uppercase;
    text-overflow: ellipsis;
    font-size: 10px;
    font-weight: 600;
    letter-spacing: 0.7px;
    color: #fff;
    white-space: nowrap;
    transition: background 0.3s;
    -webkit-transition: background 0.3s;
}

</style>