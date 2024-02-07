<nav class="navbar navbar-expand-md shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'mogurogu') }}
        </a>

        <!-- メニュートグルボタン -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- ナビゲーションの左側 -->
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <!-- 何も表示しない -->
            </ul>

            <!-- ナビゲーションの右側 -->
            <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                <!-- 認証関連リンク -->

                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('新規登録') }}</a>
                        </li>
                    @endif
                @else
                    <!-- ユーザーがログインしている場合のドロップダウンメニュー -->
                    <li class="nav-item dropdown ml-2"">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fa-solid fa-utensils"></i>
                            {{ Auth::user()->name }}
                        </a>

                        <!-- ドロップダウンメニュー -->
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <!-- トップリンク -->
                            <a class="dropdown-item" href="{{ route('top') }}" >
                                <i class="fa-solid fa-house"></i>トップ
                            </a>
                            <!-- 検索リンク -->
                            <a class="dropdown-item" href="{{ route('search') }}" >
                                <i class="fa-solid fa-magnifying-glass"></i>検索
                            </a>
                            <!-- ログ登録リンク -->
                            <a class="dropdown-item" href="{{ route('add.form') }}" >
                                <i class="fa-regular fa-pen-to-square"></i>ログ登録
                            </a>
                            <!-- プロフィール編集リンク -->
                            <a class="dropdown-item" href="{{ route('mypage.edit-profile.form') }}" >
                                <i class="fa-solid fa-address-card"></i>プロフィール編集
                            </a>
                            <!-- ログアウトリンク -->
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa-solid fa-right-from-bracket"></i>ログアウト
                            </a>

                            <!-- ログアウト用のフォーム -->
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
