@php
    $title = __('Menus');
@endphp
@extends('layouts.common')
@section('content')
<h1>{{ $title }}</h1>

<button><a href="{{ url('menus/create') }}">メニュー追加</a></button>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>{{ __('Name') }}</th>
                <th>{{ __('所要時間') }}</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($menus as $menu)
                <tr>
                    <td><a href="{{ url('menus/'.$menu->id) }}">{{ $menu->name }}</a></td>
                    <td>{{ $menu->minutes }}</td>
                    <td nowrap>
                        <a href="{{ url('menus/'.$menu->id.'/edit') }}" class="btn btn-primary">
                            {{ __('Edit') }}
                        </a>
                        @component('components.btn-del')
                            @slot('controller', 'menus')
                            @slot('id', $menu->id)
                            @slot('value', $menu->name)
                        @endcomponent
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
