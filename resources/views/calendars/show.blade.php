@php
    $title = __('calendar') . ': ' . $calendar->name;
@endphp
@extends('layouts.my')
@section('content')
<h1>{{ $title }}</h1>

@can('edit', $calendar)
  <!-- 編集・削除ボタン -->
  <div>
      <a href="{{ url('calendars/'.$calendar->id.'/edit') }}" class="btn btn-primary">
          {{ __('Edit') }}
      </a>
      @component('components.btn-del')
        @slot('controller', 'calendars')
        @slot('id', $calendar->id)
        @slot('value', $calendar->available_time)
      @endcomponent
  </div>
@endcan

<!-- カレンダー一件の情報 -->
<dl class="row">
    <dt class="col-md-2">{{ __('Author') }}:</dt>
    <dd class="col-md-10">
        <a href="{{ url('users/'.$calendar->user->id) }}">
            {{ $calendar->user->name }}
        </a>
    </dd>
    <dt class="col-md-2">{{ __('ID') }}</dt>
    <dd class="col-md-10">{{ $calendar->id }}</dd>
    <dt class="col-md-2">{{ __('Name') }}</dt>
    <dd class="col-md-10">{{ $calendar->available_time }}</dd>
</dl>
@endsection
