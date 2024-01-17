@extends('layouts.app')

@section('title', 'ログ登録')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="font-weight-bold text-center" style="font-size: 24px">ログ登録</div>

                <form method="POST" action="{{ route('add') }}" class="p-5" enctype="multipart/form-data">
                    @csrf

                    {{-- 店名 --}}
                    <div class="form-group">
                        <label for="location">店名</label>
                        <div style="margin-bottom: 5px;"></div>
                        <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') }}" required autocomplete="location" autofocus>
                        @error('location')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div style="margin-bottom: 20px;"></div>

                    {{-- カテゴリ --}}
                    <div class="form-group">
                        <label for="category">カテゴリ</label>
                        <div style="margin-bottom: 5px;"></div>
                        <select name="category" class="custom-select form-control @error('category') is-invalid @enderror">
                            {{-- 次のパートで実装します --}}
                        </select>
                        @error('category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div style="margin-bottom: 20px;"></div>

                    {{-- 訪問状況 --}}
                    <div class="form-group">
                        <label for="visit_status">訪問状況</label>
                        <div style="margin-bottom: 5px;"></div>
                        <div class="form-check-inline">
                            <input class="form-check-input" type="radio" name="visit_status" id="visit_status1">
                            <label class="form-check-label" for="visit_status1">
                                訪問済み
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <input class="form-check-input" type="radio" name="visit_status" id="visit_status2" checked>
                            <label class="form-check-label" for="visit_status2">
                                未訪問
                            </label>
                        </div>
                    </div>

                    <div style="margin-bottom: 20px;"></div>

                    {{-- 点数 --}}
                    <div class="form-group">
                        <label for="score">点数</label>
                        <div class="cont">
                            <div class="stars">
                                    <input class="star star-5" id="star-5" type="radio" name="star"/>
                                    <label class="star star-5" for="star-5"></label>
                                    <input class="star star-4" id="star-4" type="radio" name="star"/>
                                    <label class="star star-4" for="star-4"></label>
                                    <input class="star star-3" id="star-3" type="radio" name="star"/>
                                    <label class="star star-3" for="star-3"></label>
                                    <input class="star star-2" id="star-2" type="radio" name="star"/>
                                    <label class="star star-2" for="star-2"></label>
                                    <input class="star star-1" id="star-1" type="radio" name="star"/>
                                    <label class="star star-1" for="star-1"></label>
                            </div>
                        </div>
                    </div>

                    <div style="margin-bottom: 20px;"></div>

                    {{-- 感想 --}}
                    <div class="form-group">
                        <label for="impression">感想</label>
                        <div style="margin-bottom: 5px;"></div>
                        <input id="impression" type="text" class="form-control">
                    </div>

                    <div style="margin-bottom: 20px;"></div>

                    {{-- 画像 --}}
                    <div>画像</div>
                    <span class="item-image-form image-picker">
                        <input type="file" name="item-image" class="d-none" accept="image/png,image/jpeg,image/gif" id="item-image" />
                        <label for="item-image" class="d-inline-block" role="button">
                            <img src="/images/item-image-default.png" style="object-fit: cover; width: 200px; height: 200px;">
                        </label>
                    </span>
                    @error('item-image')
                        <div style="color: #E4342E;" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror

                    <div style="margin-bottom: 20px;"></div>

                    <div class="form-group">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-block">登録</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
