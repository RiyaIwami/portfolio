@extends('layouts.app')

@section('title', 'ログイン')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card" style="width: 500px">
                <div class="card-body">
                    <div class="font-weight-bold text-center" style="font-size: 24px">ログイン</div>

                    <form method="POST" action="{{ route('login') }}" class="p-5">
                        @csrf

                        <div class="form-group">
                            <label for="email">メールアドレス</label>

                            <div style="margin-bottom: 5px;"></div>

                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @if ($errors->has('email'))
                                <div class="invalid-feedback" role="alert">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>

                        <div style="margin-bottom: 20px;"></div>

                        <div class="form-group">
                            <label for="password">パスワード</label>

                            <div style="margin-bottom: 5px;"></div>

                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="current-password">

                            @if ($errors->has('password'))
                                <div class="invalid-feedback" role="alert">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>

                        <div style="margin-bottom: 5px;"></div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">ログイン状態を保存する</label>
                            </div>
                        </div>

                        <div style="margin-bottom: 5px;"></div>

                        <div class="form-group">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-block">ログイン</button>
                            </div>
                        </div>

                        <div class="mt-3">
                            アカウントをお持ちでない方は<a href="{{ route('register') }}">こちら</a>
                        </div>

                        <div style="margin-bottom: 5px;"></div>

                        <div class="mt-1">
                            パスワードをお忘れの方は<a href="{{ route('password.request') }}">こちら</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection