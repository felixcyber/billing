@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Ім'я</td>
          <td>E-mail</td>
          <td>Компанія</td>
          <td>Адмін</td>
          {{-- <td>User</td> --}}
          <td>Редагувати</td>
          <td>Видалити</td>

        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                    {{ $user->company->title ?? '' }}
            </td>
            {{-- <td>{{$user->is_admin}}</td> --}}
            <td>
            <span style="display:none">{{ $user->is_admin ?? '' }}</span>
            <input type="checkbox" disabled="disabled" {{ $user->is_admin ? 'checked' : '' }}>
        </td>
            <td><a href="{{ route('users.edit', $user->id)}}" class="btn btn-primary">Редагувати</a></td>
            <td>
                <form action="{{ route('users.destroy', $user->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection
