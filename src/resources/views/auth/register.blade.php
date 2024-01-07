@extends('layouts.app')

@section('title')
    新規登録
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card" style="width: 500px">
            <div class="card-body">
                <div class="font-weight-bold text-center" style="font-size: 24px">新規登録</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name">ユーザーネーム</label>

                            <div style="margin-bottom: 5px;"></div>

                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div style="margin-bottom: 20px;"></div>

                        <div class="form-group">
                            <label for="email">メールアドレス</label>

                            <div style="margin-bottom: 5px;"></div>

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div style="margin-bottom: 20px;"></div>

                        <div class="form-group">
                            <label for="password">パスワード</label>

                            <div style="margin-bottom: 5px;"></div>

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div style="margin-bottom: 20px;"></div>

                        <div class="form-group">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-block btn-secondary">
                                    登録
                                </button>
                            </div>
                        </div>

                        <div style="margin-bottom: 5px;"></div>

                        <div>
                            アカウントをお持ちの方は<a href="{{ route('login') }}">こちら</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
