@php
    $title = __('Edit').': '.$staff->name;
@endphp
@extends('layouts.common')
@section('content')
<h1>{{ $title }}</h1>
<form action="{{ url('staffs/'.$staff->id) }}" method="post">
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
        <label for="yomi" class="col-md-4">{{ __('Yomi') }}</label>
        <div class="col-md-6">
            <input id="yomi" type="text" class="form-control @if ($errors->has('yomi')) is-invalid @endif" name="yomi" value="{{ old('yomi') }}" required>
            @if ($errors->has('yomi'))
                <span class="invalid-feedback">{{ $errors->first('yomi') }}</span>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label for="sex" class="col-md-4">{{ __('Sex') }}</label>
        <div class="col-md-6">
            <label class="btn btn-primary"><input type="radio" class="form-control" name="sex" value="f"> 男性</label>
            <label class="btn btn-primary"><input type="radio" class="form-control" name="sex" value="m"> 女性</label>
            <label class="btn btn-primary"><input type="radio" class="form-control" name="sex" value="o"> その他</label>
        </div>
    </div>
    <div class="form-group">
        <label for="photo" class="col-md-4">{{ __('Photo') }}</label>
        <div class="col-md-6">
            <input type="file" class="form-control" name="img">
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
