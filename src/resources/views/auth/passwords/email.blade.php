@extends('layouts.app')

@section('title', 'パスワードリセットリクエスト')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card" style="width: 500px">
                <div class="card-body">
                    <div class="font-weight-bold text-center pb-3" style="font-size: 24px">パスワードをお忘れの方</div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div style="margin-bottom: 5px;"></div>

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email">メールアドレス</label>

                            <div style="margin-bottom: 5px;"></div>

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div style="margin-bottom: 20px;"></div>

                        <div class="form-group">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-block">
                                    送信する
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
