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
          <td>ID</td>
          <td>Назва</td>
          <td>Опис</td>
          <td>User</td>
          <td>Редагувати</td>
          <td>Видалити</td>

        </tr>
    </thead>
    <tbody>
        @foreach($companies as $company)
        <tr>
            <td>{{$company->id}}</td>
            <td>{{$company->title}}</td>
            <td>{{$company->description}}</td>
            <td>{{number_format($company->user_id,0)}}</td>

            <td><a href="{{ route('companies.edit', $company->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('companies.destroy', $company->id)}}" method="post">
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
