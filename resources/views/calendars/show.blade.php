@php
    $title = __('calendar') . ': ' . $calendar->name;
@endphp
@extends('layouts.my')
@section('content')
<h1>{{ $title }}</h1>

<!-- 編集・削除ボタン -->
<div>
    <a href="{{ url('calendars/'.$calendar->id.'/edit') }}" class="btn btn-primary">
        {{ __('Edit') }}
    </a>
    <!-- 削除ボタンは後で正式なものに置き換えます -->
    @component('components.btn-del')
        @slot('table', 'calendars')
        @slot('id', $calendar->id)
    @endcomponent</div>

<!-- カレンダー一件の情報 -->
<dl class="row">
    <dt class="col-md-2">{{ __('ID') }}</dt>
    <dd class="col-md-10">{{ $calendar->id }}</dd>
    <dt class="col-md-2">{{ __('Name') }}</dt>
    <dd class="col-md-10">{{ $calendar->available_time }}</dd>
</dl>
@endsection
