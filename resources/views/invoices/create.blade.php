@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Додати рахунок
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
      <form method="post" action="{{ route('invoices.store') }}">

        <div class="form-group">
            @csrf
            <label for="number">Номер:</label>
            <input type="text" class="form-control" name="number" autofocus/>
        </div>

        <div class="form-group">
            @csrf
            <label for="date">Дата:</label>
            <input type="date" class="form-control" name="date" />
        </div>

        <div class="form-group">
            @csrf
            <label for="summ_1">Сума 1:</label>
            <input type="number" class="form-control" name="summ_1" />
        </div>


        <div class="form-group">
            <label for="company_id">Компанія:</label>
            <select name="company_id" class="form-control" style="width:250px">
                <option value="">--- Виберіть компанію ---</option>
                @foreach($companies as $id => $company)

                     <option value="{{ $id }}">{{ $company }} </option>
                @endforeach
            </select>
        </div>



          <button type="submit" class="btn btn-primary">Створити рахунок</button>
      </form>
  </div>
</div>
@endsection
