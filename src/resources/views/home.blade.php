@extends('layouts.app')

@section('title', 'ログイン')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card" style="width: 500px">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('ログイン完了！') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
