@extends('layouts.app')

@section('title', 'トップ')

@section('content')
    <div style="background: linear-gradient(rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.3)), url('{{ asset('top.avif') }}') no-repeat center center; background-size: cover; height: 100vh; margin: 0; padding: 0;"> 
    </div>
@endsection

