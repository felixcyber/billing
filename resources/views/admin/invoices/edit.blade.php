@extends('theme.default')

@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Редагувати рахунок
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
        <form method="post" action="{{ route('invoices.update', $invoice->id) }}">

            <div class="form-group">
                <label for="company_id">Компанія:</label>
                <select name="company_id" class="form-control" style="width:250px">

                    @foreach($companies as $id => $company)

                    <option value="{{ $id }}">{{ $company }} </option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                @csrf
                @method('PATCH')
                <label for="number">Номер:</label>
                <input type="text" class="form-control" name="number" value="{{ $invoice->number }}" />
            </div>
            <div class="form-group">
                <label for="date">Дата початку періоду:</label>
                <input type="date" class="form-control" name="date" value="{{ $invoice->date }}" style="width:200px" />
            </div>
            <div class="form-group">
                <label for="date_end">Дата закінчення періоду:</label>
                <input type="date" class="form-control" name="date_end" value="{{ $invoice->date_end }}"
                    style="width:200px" />
            </div>
            <div class="form-group">
                <label for="balance_start">Сальдо на початок розрахункового періоду:</label>
                <input type="text" class="form-control" name="balance_start" value="{{ $invoice->balance_start }}" />
            </div>
            <div class="form-group">
                <label for="consumption_volume">Замовлений бсяг споживання на розрахунковий період:</label>
                <input type="text" class="form-control" name="consumption_volume"
                    value="{{ $invoice->consumption_volume }}" />
            </div>
            <div class="form-group">
                <label for="tariff_estimated">Прогнозний тариф на електричну енергію:</label>
                <input type="text" class="form-control" name="tariff_estimated"
                    value="{{ $invoice->tariff_estimated }}" />
            </div>
            <div class="form-group">
                <label for="tariff_transmission">тариф на передачу електроенергії:</label>
                <input type="text" class="form-control" name="tariff_transmission"
                    value="{{ $invoice->tariff_transmission }}" />
            </div>
            <div class="form-group">
                <label for="tariff_distribution">тариф на розподіл електроенергії:</label>
                <input type="text" class="form-control" name="tariff_distribution"
                    value="{{ $invoice->tariff_distribution }}" />
            </div>
            <div class="form-group">
                <label for="consumption_cost">Вартість замовленого споживання на розрахунковий період:</label>
                <input type="text" class="form-control" name="consumption_cost"
                    value="{{ $invoice->consumption_cost }}" />
            </div>
            <div class="form-group">
                <label for="paid_summ">Сплачено в розрахунковому періоді:</label>
                <input type="text" class="form-control" name="paid_summ" value="{{ $invoice->paid_summ }}" />
            </div>
            <div class="form-group">
                <label for="consumption_actual">Фактичний обсяг споживання:</label>
                <input type="text" class="form-control" name="consumption_actual"
                    value="{{ $invoice->consumption_actual }}" />
            </div>
            <div class="form-group">
                <label for="cost_actual">Фактична вартість електричної енергії:</label>
                <input type="text" class="form-control" name="cost_actual" value="{{ $invoice->cost_actual }}" />
            </div>
            <div class="form-group">
                <label for="balance_end">Сальдо на кінець розрахункового періоду:</label>
                <input type="text" class="form-control" name="balance_end" value="{{ $invoice->balance_end }}" />
            </div>




            <button type="submit" class="btn btn-primary">Відновити</button>
        </form>
    </div>
</div>
@endsection
