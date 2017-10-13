@php
    $title = __('Edit').': '.$calendar->available_time;
@endphp
@extends('layouts.my')
@section('content')
<h1>{{ $title }}</h1>
<form action="{{ url('calendars/'.$calendar->id) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="form-group">
        <label for="available_time" class="col-md-4">{{ __('Available_time') }}</label>
        <div class="col-md-6">
            <input id="available_time" type="text" class="form-control" name="available_time" value="{{ $calendar->available_time }}" required autofocus>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-8">
            <button type="submit" name="submit" class="btn btn-success">
                {{ __('Submit') }}
            </button>
        </div>
    </div>
</form>
@endsection
