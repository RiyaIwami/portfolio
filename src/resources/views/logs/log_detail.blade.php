@extends('layouts.app')

@section('title', 'ログ詳細')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">

                <div style="margin-bottom: 20px;"></div>

                <h4>{{$log->name}}</h4>
                <div style="margin-bottom: 10px;"></div>
                <p>{{$log->category->name}}</p>
                {{-- 
                カテゴリー
                訪問状況
                星
                感想
                画像 --}}
            </div>
        </div>
    </div>
@endsection
