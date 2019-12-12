@extends('theme.default')

@section('content')
<style>
    .uper {
        margin: 40px;
        /* padding: 50px; */
    }
</style>
<div class="card uper">

    <div class="col-lg-12">
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

            <div class="container">
                <h2 class="uper">Новий рахунок</h2>
                <div class="col-lg-12 well">
                    <div class="row">
                        <form>
                            <div class="col-sm-12 bg-light text-dark">

                                <div class="form-group">
                                    <label for="company_id">Компанія:</label>
                                    <select name="company_id" class="form-control" autofocus>
                                        <option value="">--- Виберіть компанію ---</option>
                                        @foreach($companies as $id => $company)

                                        <option value="{{ $id }}">{{ $company }} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    @csrf
                                    <label for="number" class="font-weight-bold">Номер рахунку:</label>
                                    <input type="text" class="form-control col-sm-4" name="number" />
                                </div>

                                <div class="pt-3">
                                    <h5>Розрахунковий період</h5>
                                </div>
                                <div class="row pb-3">

                                    <div class="col-sm-6 form-group">
                                        <label for="date">Дата початку:</label>
                                        <input type="date" class="form-control" name="date" />
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="date_end">Дата закінчення:</label>
                                        <input type="date" class="form-control" name="date_end" />

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="balance_start" class="font-weight-bold">Сальдо на початок розрахункового
                                        періоду:</label>
                                    <input type="text" placeholder="Enter Phone Number Here.."
                                        class="form-control col-sm-4" name="balance_start">
                                </div>


                                <div class=" pt-3 well">
                                    <h5>Тарифи на електроенергію</h5>
                                </div>
                                <div class="row pb-3">
                                    <div class="col-sm-4 form-group">
                                        <label for="tariff_estimated">Прогнозний, у т.ч.:</label>
                                        <input type="text" class="form-control" name="tariff_estimated" />
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label for="tariff_transmission"> - на передачу:</label>
                                        <input type="text" class="form-control" name="tariff_transmission" />
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label for="tariff_distribution"> - на розподіл:</label>
                                        <input type="text" class="form-control" name="tariff_distribution" />
                                    </div>
                                </div>

                                <div class="pt-3">
                                    <h5>Замовлене споживання електроенергії на розрахунковий період</h5>
                                </div>
                                <div class="row pb-3">

                                    <div class="col-sm-6 form-group">
                                        <label for="consumption_volume">Обсяг споживання:</label>
                                        <input type="text" class="form-control" name="consumption_volume" />
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="consumption_cost">Вартість споживання:</label>
                                        <input type="text" class="form-control" name="consumption_cost" />

                                    </div>
                                </div>

                                <div class="pt-3">
                                    <h5>Фактичне споживання електроенергії за розрахунковий період</h5>
                                </div>
                                <div class="row pb-3">

                                    <div class="col-sm-6 form-group">
                                        <label for="consumption_actual">Фактичний обсяг:</label>
                                        <input type="text" class="form-control" name="consumption_actual" />
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="cost_actual">Фактична вартість:</label>
                                        <input type="text" class="form-control" name="cost_actual" />

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="paid_summ" class="font-weight-bold">Cплачено в розрахунковому
                                        періоді:</label>
                                    <input type="text" class="form-control col-sm-4" name="paid_summ" />
                                </div>

                                <div class="form-group">
                                    <label for="balance_en" class="font-weight-bold">Cальдо на кінець розрахункового
                                        періоду:</label>
                                    <input type="text" class="form-control col-sm-4" name="balance_end" />
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-12 uper">
                        <button type="submit" class="btn btn-primary">Створити рахунок</button>
                    </div>

            </div>


        </form>
    </div>
</div>

@endsection
