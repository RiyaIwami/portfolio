@extends('layouts.app')

@section('title', 'ログ一覧')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach($logs as $log)
            <div class="col-8">
                <div class="card">
                    <div class="position-relative overflow-hidden">
                        <div class="d-flex align-items-center">
                            <img src="{{ $log->image_path ? asset($log->image_path) : 'https://via.placeholder.com/150' }}" alt="Log Image">
                            <div class="card-body">
                                <h4 class="card-title">{{$log->name}}</h4>
                                <small class="text-muted">
                                    {{$log->category->name}} / {{ $log->visitStatus->name }}
                                </small>
                                <div id="rating">
                                    @php
                                        $starColor = 'gray';
                                        if ($log->score_id > 0) {
                                            $starColor = 'yellow';
                                        }
                                    @endphp

                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="fa fa-star" style="color: {{ $i <= $log->score_id ? $starColor : 'gray' }}"></i>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-muted d-flex justify-content-end">
                            <small style="margin-right: 10px;">
                                <a href="{{ route('log', ['log_id' => $log->id]) }}">詳細</a>
                            </small>
                            <small style="margin-right: 10px;">
                                <a href="{{ route('edit', ['log_id' => $log->id]) }}">編集</a>
                            </small>
                            <small>
                                <a href="{{ route('delete', ['log_id' => $log->id])}}">削除</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div style="margin-bottom: 20px;"></div>
            </div>
        @endforeach
    </div>
</div>
@endsection
