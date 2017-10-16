@php
    $title = $user->id . __('さんへのご予約');
@endphp
@extends('layouts.common')
@section('content')
<h1>{{ $title }}</h1>

userid: {{ $user->id }}

Reactで実装。

@endsection
