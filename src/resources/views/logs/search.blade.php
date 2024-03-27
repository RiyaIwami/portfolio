@extends('layouts.app')

@section('title', '検索')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">

            <form action="{{ route('results') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="category">カテゴリ</label>
                    <div style="margin-bottom: 5px;"></div>
                    <select id="category" name="category" class="custom-select form-control @error('category') is-invalid @enderror">
                        <option value="">選択してください</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>
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

                <div class="form-group">
                    <label for="visit_status">訪問状況</label>
                    <div style="margin-bottom: 5px;"></div>

                    <div class="form-check form-check-inline">
                        
                        @foreach ($visitStatuses as $visitStatus)
                            <label>
                                <input type="radio" name="visit_status" value="{{ $visitStatus->id }}">
                                {{ $visitStatus->name }}
                            </label>
                        @endforeach
                    </div>
                </div>

                <div style="margin-bottom: 20px;"></div>

                <div class="form-group">
                    <label for="score">点数</label>
                    <div class="cont">
                        <div class="stars">
                            
                            @for ($i = 5; $i >= 1; $i--)
                                <input class="star star-{{ $i }}" id="star-{{ $i }}" type="radio" name="score_id" value="{{ $i }}" />
                                <label class="star star-{{ $i }}" for="star-{{ $i }}"></label>
                            @endfor
                        </div>
                    </div>
                </div>

                <div style="margin-bottom: 20px;"></div>

                <div class="form-group">
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-block">検索</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
