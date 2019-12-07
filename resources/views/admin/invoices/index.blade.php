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
          <td>Номер</td>
          <td>Дата</td>
          <td>Сума 1</td>
          <td>Компанія</td>

          <td>Редагувати</td>
          <td>Видалити</td>

        </tr>
    </thead>
    <tbody>
        @foreach($invoices as $invoice)
        <tr>
            <td>{{$invoice->number}}</td>
            <td>{{$invoice->date}}</td>
            <td>{{$invoice->summ_1}}</td>


            <td>
                    {{ $invoice->company->title ?? '' }}
            </td>

            <td><a href="{{ route('invoices.edit', $invoice->id)}}" class="btn btn-primary">Редагувати</a></td>
            <td>
                <form action="{{ route('invoices.destroy', $invoice->id)}}" method="post">
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
