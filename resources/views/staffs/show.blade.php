@php
    $title = __('Staff') . ': ' . $staff->name;
@endphp
@extends('layouts.common')
@section('content')
    <h1>{{ $title }}</h1>

    @can('edit', $staff)
      <!-- 編集・削除ボタン -->
      <div>
          <a href="{{ url('staffs/'.$staff->id.'/edit') }}" class="btn btn-primary">
              {{ __('Edit') }}
          </a>
          @component('components.btn-del')
              @slot('controller', 'staffs')
              @slot('id', $staff->id)
              @slot('value', $staff->name)
          @endcomponent
      </div>
    @endcan

    <!-- ユーザー情報 -->
    <dl class="row">
        <dt class="col-md-2">{{ __('ID') }}</dt>
        <dd class="col-md-10">{{ $staff->id }}</dd>
        <dt class="col-md-2">{{ __('Name') }}</dt>
        <dd class="col-md-10">{{ $staff->name }}</dd>
        <dt class="col-md-2">{{ __('Yomi') }}</dt>
        <dd class="col-md-10">{{ $staff->yomi }}</dd>
        <dt class="col-md-2">{{ __('Img') }}</dt>
        <dd class="col-md-10">{{ $staff->img }}</dd>
    </dl>

    <!-- スタッフの全てのカレンダーを表示 -->
    <h2>{{ __('Calendars') }}</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{ __('id') }}</th>
                    <th>{{ __('available_time') }}</th>
                    <th>{{ __('Created') }}</th>
                    <th>{{ __('Updated') }}</th>
                    @can('edit', $staff)
                      <th></th>
                    @endcan
                </tr>
            </thead>
            <tbody>
              {{$staff->calendars}}
                @foreach ($staff->calendars as $calendar)
                    <tr>
                        <td>
                            <a href="{{ url('calendars/'.$calendar->id) }}">
                                {{ $calendar->id }}
                            </a>
                        </td>
                        <td>{{ $calendar->available_time }}</td>
                        <td>{{ $calendar->created_at }}</td>
                        <td>{{ $calendar->updated_at }}</td>
                        @can('edit', $staff)
                          <td nowrap>
                              <a href="{{ url('calendars/'.$calendar->id.'/edit') }}" class="btn btn-primary">
                                  {{ __('Edit') }}
                              </a>
                              @component('components.btn-del')
                                  @slot('controller', 'calendars')
                                  @slot('id', $calendar->id)
                                  @slot('value', $calendar->available_time)
                              @endcomponent
                          </td>
                        @endcan
                     </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
