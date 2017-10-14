<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF トークン -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@if (! Request::is('/')){{ $title }} | @endif{{ env('APP_NAME') }}</title>

    <!-- Bootstrap用CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
    <!-- グローバルナビ -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <!-- アプリ名 -->
        <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>

        <!-- モバイル画面用のメニュー開閉ボタン -->
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- メニュー項目 -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- 左詰め -->
            <ul class="navbar-nav mr-auto">
              <li class="nav-item @if (my_is_current_controller('profiles')) active @endif">
                  <a class="nav-link" href="{{ url('profiles') }}">
                      {{ __('Profile') }}
                      @if (my_is_current_controller('profiles'))
                          <span class="sr-only">(current)</span>
                      @endif
                  </a>
              </li>
               <li class="nav-item @if (my_is_current_controller('calendars')) active @endif">
                   <a class="nav-link" href="{{ url('calendars') }}">
                       {{ __('Calendars') }}
                       @if (my_is_current_controller('calendars'))
                           <span class="sr-only">(current)</span>
                       @endif
                   </a>
                </li>
               <li class="nav-item @if (my_is_current_controller('staffs')) active @endif">
                   <a class="nav-link" href="{{ url('staffs') }}">
                       {{ __('Staffs') }}
                       @if (my_is_current_controller('staffs'))
                           <span class="sr-only">(current)</span>
                       @endif
                   </a>
                </li>
               <li class="nav-item @if (my_is_current_controller('menus')) active @endif">
                   <a class="nav-link" href="{{ url('menus') }}">
                       {{ __('Menus') }}
                       @if (my_is_current_controller('menus'))
                           <span class="sr-only">(current)</span>
                       @endif
                   </a>
                </li>
            </ul>
            <!-- 右詰め (上で .mr-auto を指定しているため) -->
            <ul class="navbar-nav my-2 my-lg-0">

                <!-- 投稿ボタン -->
                <li class="nav-item">
                    <a href="{{ url('calendars/create') }}" id="new-calendar" class="btn btn-success">
                        {{ __('New Calendar') }}
                    </a>
                </li>

                <!-- ログイン・ログアウト -->
                @guest
                   <li class="nav-item @if (my_is_current_controller('login, password')) active @endif">
                       <a class="nav-link" href="{{ route('login') }}">
                           {{ __('Login') }}
                           @if (my_is_current_controller('login, password'))
                               <span class="sr-only">(current)</span>
                           @endif
                       </a>
                    </li>
                    <li class="nav-item @if (my_is_current_controller('register')) active @endif">
                        <a class="nav-link" href="{{ route('register') }}">
                            {{ __('Register') }}
                            @if (my_is_current_controller('register'))
                                <span class="sr-only">(current)</span>
                            @endif
                        </a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown-user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                            <a class="dropdown-item" href="{{ url('users/'.auth()->user()->id) }}">
                                {{ __('Profile') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
    <!-- 個別ページの内容 -->
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success mt-2">
                {{ session('status') }}
            </div>
        @endif
        @yield('content')
    </div>

    <!-- Bootstrap用JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>
