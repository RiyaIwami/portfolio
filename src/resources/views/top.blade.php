@extends('layouts.app')

@section('title', 'トップ')

@section('content')
    <style>
        .py-4 {
            padding-top: 0 !important;
            padding-bottom: 0 !important;
        }
        .text-color {
            color: #555652;
        }
    </style>
    <div style="background: linear-gradient(rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.3)), url('{{ asset('top.avif') }}') no-repeat center center; background-size: cover; height: 95vh; margin: 0; padding: 0; display: flex; justify-content: center; align-items: center;"> 
        <div class="text-center">
            <div class="font-weight-bold" style="font-size: 70px;">mogurogu</div>
            <div class="text-color" style="font-size: 20px;">あなただけのお気に入りのお店を記録しよう</div>
        </div>
    </div>
@endsection
