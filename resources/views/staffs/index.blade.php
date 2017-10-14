@php
    $title = __('Staffs');
@endphp
@extends('layouts.common')
@section('content')
<h1>{{ $title }}</h1>

<button><a href="{{ url('staffs/create') }}">スタッフ追加</a></button>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>{{ __('Name') }}</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($staffs as $staff)
                <tr>
                    <td><a href="{{ url('staffs/'.$staff->id) }}">{{ $staff->name }}</a></td>
                    <td nowrap>
                        <a href="{{ url('staffs/'.$staff->id.'/edit') }}" class="btn btn-primary">
                            {{ __('Edit') }}
                        </a>
                        @component('components.btn-del')
                            @slot('controller', 'staffs')
                            @slot('id', $staff->id)
                            @slot('value', $staff->name)
                        @endcomponent
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
