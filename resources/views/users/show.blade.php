@php
    $title = __('User') . ': ' . $user->name;
@endphp
@extends('layouts.my')
@section('content')
<h1>{{ $title }}</h1>

<!-- 編集・削除ボタン -->
<div>
    <a href="{{ url('users/'.$user->id.'/edit') }}" class="btn btn-primary">
        {{ __('Edit') }}
    </a>
    <!-- 削除ボタンは後で正式なものに置き換えます -->
    @component('components.btn-del')
        @slot('table', 'users')
        @slot('id', $user->id)
    @endcomponent</div>

    <!-- ユーザー1件の情報 -->
    <dl class="row">
        <dt class="col-md-2">{{ __('ID') }}</dt>
        <dd class="col-md-10">{{ $user->id }}</dd>
        <dt class="col-md-2">{{ __('Name') }}</dt>
        <dd class="col-md-10">{{ $user->name }}</dd>
        <dt class="col-md-2">{{ __('Email') }}</dt>
        <dd class="col-md-10">{{ $user->email }}</dd>
    </dl>

    <!-- ユーザーの全てのカレンダーを表示 -->
    <h2>{{ __('Posts') }}</h2>
    {{ $user->calendars->links() }}
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{ __('id') }}</th>
                    <th>{{ __('available_time') }}</th>
                    <th>{{ __('Created') }}</th>
                    <th>{{ __('Updated') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user->calendars as $calendar)
                    <tr>
                        <td>
                            <a href="{{ url('calendars/'.$calendar->id) }}">
                                {{ $calendar->id }}
                            </a>
                        </td>
                        <td>{{ $calendar->available_time }}</td>
                        <td>{{ $calendar->created_at }}</td>
                        <td>{{ $calendar->updated_at }}</td>
                        <td nowrap>
                            <a href="{{ url('calendars/'.$calendar->id.'/edit') }}" class="btn btn-primary">
                                {{ __('Edit') }}
                            </a>
                            @component('components.btn-del')
                                @slot('table', 'calendars')
                                @slot('id', $calendar->id)
                            @endcomponent
                        </td>
                     </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
