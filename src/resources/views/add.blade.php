@extends('layouts.app')

@section('title', 'ログ登録')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="error">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div style="margin-bottom: 5px;"></div>

                <form method="POST" action="{{ route('add') }}" class="p-5" enctype="multipart/form-data">
                    @csrf

                    {{-- 店名 --}}
                    <div class="form-group">
                        <label for="name">店名</label>
                        <div style="margin-bottom: 5px;"></div>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div style="margin-bottom: 20px;"></div>

                    {{-- カテゴリ　--}}
                    <div class="form-group">
                        <label for="category">カテゴリ</label>
                        <div style="margin-bottom: 5px;"></div>
                        <select id="category" name="category"
                            class="custom-select form-control @error('category') is-invalid @enderror">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
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

                        <div class="form-check form-check-inline">
                            @foreach ($visitStatuses as $visitStatus)
                                <label>
                                    <input type="radio" name="visit_status" value="{{ $visitStatus->id }}" required>
                                    {{ $visitStatus->name }}
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div style="margin-bottom: 20px;"></div>


                    {{-- 点数 --}}
                    <div class="form-group">
                        <label for="score">点数</label>
                        <div class="cont">
                            <div class="stars">
                                @for ($i = 5; $i >= 1; $i--)
                                    <input class="star star-{{ $i }}" id="star-{{ $i }}"
                                        type="radio" name="score_id" value="{{ $i }}" />
                                    <label class="star star-{{ $i }}" for="star-{{ $i }}"></label>
                                @endfor
                            </div>
                        </div>
                    </div>


                    <div style="margin-bottom: 20px;"></div>

                    {{-- 感想 --}}
                    <div class="form-group">
                        <label for="review">感想</label>
                        <div style="margin-bottom: 5px;"></div>
                        <input id="review" type="text" class="form-control">
                    </div>

                    <div style="margin-bottom: 20px;"></div>

                    {{-- 画像 --}}
                    <div class="form-group">
                        <label for="images">画像 (最大5枚)</label>
                        <div style="margin-bottom: 5px;"></div>
                        <div class="d-flex">
                            <input id="images1" type="file" class="form-control @error('images') is-invalid @enderror"
                                name="images[]" accept="image/*" multiple>
                            <input id="images2" type="file" class="form-control @error('images') is-invalid @enderror"
                                name="images[]" accept="image/*" multiple>
                            <input id="images3" type="file" class="form-control @error('images') is-invalid @enderror"
                                name="images[]" accept="image/*" multiple>
                            <input id="images4" type="file" class="form-control @error('images') is-invalid @enderror"
                                name="images[]" accept="image/*" multiple>
                            <input id="images5" type="file" class="form-control @error('images') is-invalid @enderror"
                                name="images[]" accept="image/*" multiple>
                        </div>
                        @error('images')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


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
