@extends('theme.default')

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
                <label for="company_id">Компанія:</label>
                <select name="company_id" class="form-control" style="width:250px">
                    <option value="">--- Виберіть компанію ---</option>
                    @foreach($companies as $id => $company)

                    <option value="{{ $id }}">{{ $company }} </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                @csrf
                <label for="number">Номер:</label>
                <input type="text" class="form-control" name="number" autofocus />
            </div>

            <div class="form-group">
                <label for="date">Дата початку періоду:</label>
                <input type="date" class="form-control" name="date" />
            </div>
            <div class="form-group">
                <label for="date_end">Дата закінчення періоду:</label>
                <input type="date" class="form-control" name="date_end" />
            </div>
            <div class="form-group">
                <label for="summ_1">Сальдо на початок розрахункового періоду:</label>
                <input type="text" class="form-control" name="balance_start" />
            </div>
            <div class="form-group">
                <label for="summ_1">Замовлений бсяг споживання на розрахунковий період:</label>
                <input type="text" class="form-control" name="consumption_volume" />
            </div>
            <div class="form-group">
                <label for="summ_1">Прогнозний тариф на електричну енергію:</label>
                <input type="text" class="form-control" name="tariff_estimated" />
            </div>
            <div class="form-group">
                <label for="summ_1">тариф на передачу електроенергії:</label>
                <input type="text" class="form-control" name="tariff_transmission" />
            </div>
            <div class="form-group">
                <label for="summ_1">тариф на розподіл електроенергії:</label>
                <input type="text" class="form-control" name="tariff_distribution" />
            </div>
            <div class="form-group">
                <label for="summ_1">Вартість замовленого споживання на розрахунковий період:</label>
                <input type="text" class="form-control" name="consumption_cost" />
            </div>
            <div class="form-group">
                <label for="summ_1">Сплачено в розрахунковому періоді:</label>
                <input type="text" class="form-control" name="paid_summ" />
            </div>
            <div class="form-group">
                <label for="summ_1">Фактичний обсяг споживання:</label>
                <input type="text" class="form-control" name="consumption_actual" />
            </div>
            <div class="form-group">
                <label for="cost_actual">Фактична вартість електричної енергії:</label>
                <input type="text" class="form-control" name="cost_actual" />
            </div>
            <div class="form-group">
                <label for="summ_1">Сальдо на кінець розрахункового періоду:</label>
                <input type="text" class="form-control" name="balance_end" />
            </div>

            <button type="submit" class="btn btn-primary">Створити рахунок</button>
        </form>
    </div>
</div>
@endsection
