@php
    $title = __('Edit').': '.$menu->name;
@endphp
@extends('layouts.common')
@section('content')
<h1>{{ $title }}</h1>
<form action="{{ url('menus/'.$menu->id) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="form-group">
        <label for="name" class="col-md-4">{{ __('Name') }}</label>
        <div class="col-md-6">
          <input id="name" type="text" class="form-control @if ($errors->has('name')) is-invalid @endif" name="name" value="{{ old('name') }}" required autofocus>
          @if ($errors->has('name'))
              <span class="invalid-feedback">{{ $errors->first('name') }}</span>
          @endif
        </div>
    </div>
    <div class="form-group">
        <label for="minutes" class="col-md-4">{{ __('所要時間') }}</label>
        <div class="col-md-6">
          <input id="minutes" type="text" class="form-control @if ($errors->has('minutes')) is-invalid @endif" name="minutes" value="{{ old('minutes') }}" required autofocus>
          @if ($errors->has('minutes'))
              <span class="invalid-feedback">{{ $errors->first('minutes') }}</span>
          @endif
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
