@extends('layouts.app')

@section('title', 'ログ詳細')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div style="margin-bottom: 20px;"></div>

                <div class="card" style="padding: 15px;">
                    <div class="position-relative overflow-hidden">
                        <div class="d-flex align-items-center">
                            <div class="card-body">
                                <h3>{{$log->name}}</h3>
                                <div style="margin-bottom: 20px;"></div>

                                <p>カテゴリー: {{$log->category->name}}</p>
                                <div style="margin-bottom: 15px;"></div>
                                <p>訪問状況: {{$log->visitStatus->name}}</p>

                                <div id="rating">
                                    @php
                                        $starColor = ($log->score_id > 0) ? 'yellow' : 'gray';
                                    @endphp

                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="fa fa-star" style="color: {{ $i <= $log->score_id ? $starColor : 'gray' }}; font-size: 25px;"></i>
                                    @endfor
                                </div>

                                @if($log->review)
                                    <p>感想: {{$log->review}}</p>
                                @endif

                                @if($log->image)
                                    <img src="{{ $log->image }}" alt="Log Image" class="img-fluid">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

