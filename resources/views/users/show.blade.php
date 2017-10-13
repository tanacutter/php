@php
    $title = __('User') . ': ' . $user->name;
@endphp
@extends('layouts.my')
@section('content')
    <h1>{{ $title }}</h1>

    @can('edit', $user)
      <!-- 編集・削除ボタン -->
      <div>
          <a href="{{ url('users/'.$user->id.'/edit') }}" class="btn btn-primary">
              {{ __('Edit') }}
          </a>
          @component('components.btn-del')
              @slot('controller', 'users')
              @slot('id', $user->id)
              @slot('value', $user->name)
          @endcomponent
      </div>
    @endcan

    <!-- ユーザー情報 -->
    <dl class="row">
        <dt class="col-md-2">{{ __('ID') }}</dt>
        <dd class="col-md-10">{{ $user->id }}</dd>
        <dt class="col-md-2">{{ __('Name') }}</dt>
        <dd class="col-md-10">{{ $user->name }}</dd>
        <dt class="col-md-2">{{ __('Email') }}</dt>
        <dd class="col-md-10">{{ $user->email }}</dd>
    </dl>

    <!-- ユーザーの全てのカレンダーを表示 -->
    <h2>{{ __('Calendars') }}</h2>
    {{ $user->calendars->links() }}<!--　ページネーション -->
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{ __('id') }}</th>
                    <th>{{ __('available_time') }}</th>
                    <th>{{ __('Created') }}</th>
                    <th>{{ __('Updated') }}</th>
                    @can('edit', $user)
                      <th></th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @foreach ($user->calendars as $calendar)
                    <tr>
                        <td>
                            <a href="{{ url('calendars/'.$calendar->id) }}">
                                {{ $calendar->id }}
                            </a>
                        </td>
                        <td>{{ $calendar->available_time }}</td>
                        <td>{{ $calendar->created_at }}</td>
                        <td>{{ $calendar->updated_at }}</td>
                        @can('edit', $user)
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
