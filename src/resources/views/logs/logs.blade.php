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
                            
                            <img src="{{ !empty($log->images[0]->path) ? asset('storage/' . $log->images[0]->path) : '' }}" />
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
                                <form action="{{ route('log', ['log_id' => $log->id]) }}" method="GET" name="detailForm">
                                    <button type="submit">詳細</button>
                                </form>
                            </small>
                            <small style="margin-right: 10px;">
                                <form action="{{ route('edit', ['log_id' => $log->id]) }}" method="GET" name="editForm">
                                    <button type="submit">編集</button>
                                </form>
                            </small>
                            <small style="margin-right: 10px;">
                                <form action="{{ route('delete', ['log_id' => $log->id]) }}" method="POST" name="deleteForm">
                                    @csrf
                                    <button type="submit">削除</button>
                                </form>
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
