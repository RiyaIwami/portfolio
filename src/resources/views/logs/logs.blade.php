@extends('layouts.app')

@section('title', 'ログ一覧')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach($logs as $log)
            <div class="col-8">
                <div class="card">
                    <div class="position-relative overflow-hidden">
                        <div class="card-body">
                            <h5 class="card-title">{{$log->name}}</h5>
                            <small class="text-muted">{{$log->category->name}}</small>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">作成日時: {{ $log->created_at }}</small>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection