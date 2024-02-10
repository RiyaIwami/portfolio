@extends('layouts.app')

@section('title', 'パスワードリセット')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card" style="width: 500px">
                <div class="card-body">
                    <div class="font-weight-bold text-center border-bottom pb-3" style="font-size: 24px">パスワード再設定</div>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">


                        <div class="form-group">
                            <label for="email">メールアドレス</label>

                            <div style="margin-bottom: 5px;"></div>

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

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
                                <button type="submit" class="btn btn-block">
                                    変更する
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
