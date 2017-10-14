@php
    $title = __('Menu') . ': ' . $menu->name;
@endphp
@extends('layouts.common')
@section('content')
    <h1>{{ $title }}</h1>

    detail is now preparing...

    @task authorization

    @can('edit', $menu)
      <!-- 編集・削除ボタン -->
      <div>
          <a href="{{ url('menus/'.$menu->id.'/edit') }}" class="btn btn-primary">
              {{ __('Edit') }}
          </a>
          @component('components.btn-del')
              @slot('controller', 'menus')
              @slot('id', $menu->id)
              @slot('value', $menu->name)
          @endcomponent
      </div>
    @endcan

@endsection
