<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ココロバ</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        ココロバ
                    </a>

                </div>

                <div class="search">
                    <input autocomplete="off" class="" maxlength="50" placeholder="エリア、カテゴリ、メニューで検索する" type="text">
                </div>
                <div class="serach-box">
                    <section>
                        <div class="search-box_title">ジャンル</div>
                        <div class="search-box_content">
                            <ul>
                                <li>占い</li><!-- 人気順に表示 -->
                                <li>ヒーリング</li><!-- 人気順に表示 -->
                                <li>瞑想</li><!-- 人気順に表示 -->
                                <li>音楽療法</li><!-- 人気順に表示 -->
                            </ul>
                        </div>
                    </section>
                    <section>
                        <div class="search-box_title">駅</div>
                        <div class="search-box_content">
                            <ul>
                                <li>用賀</li><!-- 現在位置の近くから表示。位置情報の許可 -->
                            </ul>
                        </div>
                    </section>
                    <section>
                        <div class="search-box_title">路線</div>
                        <div class="search-box_content">
                            <ul>
                                <li>東急田園都市線</li><!-- 現在位置の近くから表示。位置情報の許可 -->
                            </ul>
                        </div>
                    </section>
                    <section>
                        <div class="search-box_title">都道府県</div>
                        <div class="search-box_content">
                            <ul>
                                <li>東京都</li><!-- 現在位置の近くから表示。位置情報の許可 -->
                            </ul>
                        </div>
                    </section>
                </div>
                <div>
                    詳しい条件で探す
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        test
                    </ul>

                </div>
            </div>
        </nav>

        @yield('content')
        <nav>
          <ul class="nav-recruit">
            <li>
              <a href="{{ url('feel', [$feel->admin_users_id, 'top']) }}" class="nav-top">トップ</a>
            </li>
            <li>
              <a href="{{ url('feel', [$feel->admin_users_id, 'menu']) }}" class="nav-menu">メニュー</a>
            </li>
            <li>
              <a href="{{ url('feel', [$feel->admin_users_id, 'review']) }}" class="nav-review">口コミ</a>
            </li>
            <li>
              <a href="{{ url('feel', [$feel->admin_users_id, 'profile']) }}" class="nav-profile">プロフィール</a>
            </li>
          </ul>
        </nav>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
