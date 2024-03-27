@extends('layouts.app')

@section('title', 'プロフィール編集')

@section('content')
<div id="profile-edit-form" class="container">
    <div class="row justify-content-center">
        <div class="card" style="width: 500px">
            <div class="card-body">
                <div class="font-weight-bold text-center" style="font-size: 24px">プロフィール編集</div>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('mypage.edit-profile') }}" class="p-5" enctype="multipart/form-data">
                    @csrf

                    {{-- ニックネーム --}}
                    <div class="form-group">
                        <label for="name">ニックネーム</label>

                        <div style="margin-bottom: 5px;"></div>

                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div style="margin-bottom: 20px;"></div>

                    <div class="form-group">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-block">保存</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
