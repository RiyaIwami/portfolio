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
                            @if(!empty($log->images[0]->path))
                                <img src="{{ asset('storage/' . $log->images[0]->path) }}" style="width: 100px; margin: 5px; border-radius: 5px;">
                            @else
                                <div style="width: 100px; height: 100px; margin: 5px; border-radius: 5px; background-color: #e9e7e4; display: flex; align-items: center; justify-content: center;">
                                    <p style="margin: 0;">No Photo</p>
                                </div>
                            @endif
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
                                    <button type="submit" style="border: none; color: #9b88b8;">詳細</button>
                                </form>
                            </small>
                            <small style="margin-right: 10px;">
                                <form action="{{ route('edit', ['log_id' => $log->id]) }}" method="GET" name="editForm">
                                    <button type="submit" style="border: none; color: #9b88b8;">編集</button>
                                </form>
                            </small>
                            <small style="margin-right: 10px;">
                                <form action="{{ route('delete', ['log_id' => $log->id]) }}" method="POST" name="deleteForm">
                                    @csrf
                                    <button type="submit" style="border: none; color: #9b88b8;">削除</button>
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
