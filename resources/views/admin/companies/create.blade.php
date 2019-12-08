@extends('theme.default')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Додати компанію
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('companies.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Найменування:</label>
              <input type="text" class="form-control" name="title"/>
          </div>
          <div class="form-group">
              <label for="description">Опис:</label>
              <input type="text" class="form-control" name="description"/>
          </div>
          {{-- <div class="form-group">
            <label for="price">Користувач:</label>
            <input type="number" class="form-control" name='user_id'/>
        </div> --}}

          <button type="submit" class="btn btn-primary">Створити компанію</button>
      </form>
  </div>
</div>
@endsection
