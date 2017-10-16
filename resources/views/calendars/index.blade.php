@php
    $title = __('Calendars');
@endphp
@extends('layouts.common')
@section('content')
<h1>{{ $title }}</h1>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>{{ __('ID') }}</th>
                <th>{{ __('User_id') }}</th>
                <th>{{ __('Date') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($calendars as $calendar)
                <tr>
                    <td>{{ $calendar->id }}</td>
                    <td><a href="{{ url('users/'.$calendar->user->id) }}">{{ $calendar->user_id}} ({{ $calendar->user->name }})</a></td>
                    <td><a href="{{ url('calendars/'.$calendar->id) }}">{{ $calendar->available_time }}</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
