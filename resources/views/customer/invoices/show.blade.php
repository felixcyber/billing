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

        <div class="container">
            <h2 class="uper">Перегляд рахунку </h2>

            <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
                    <div class="card">
                        <div class="card-header p-4">
                            <a class="pt-2 d-inline-block" href="index.html" data-abc="true">Feli.co.ua</a>
                            <div class="float-right">
                                <h3 class="mb-0">Рахунок №{{ $invoice->number}}</h3>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-6">
                                    <h5 class="mb-2">Споживач:</h5>
                                    <h3 class="text-dark mb-2">{{ $invoice->company->title ?? '' }}</h3>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                                <div class="col-sm-6">
                                    <h6 class="text-dark mb-1">Розрахунковий період</h6>

                                    <div> Дата початку: {{$invoice->date}} </div>
                                    <div> Дата закінчення: {{$invoice->date_end}} </div>

                                </div>


                            </div>




                            <div class="row">

                                <div class="col-lg-11 col-sm-11 ml-auto">
                                    <table class="table table-clear">
                                        <tbody>

                                            <tr>
                                                <td class="left">
                                                    <strong class="text-dark">Сальдо на початок розрахункового
                                                        періоду, грн.:</strong>
                                                </td>
                                                <td class="right">{{$invoice->balance_start}}</td>
                                            </tr>
                                            <tr>
                                                <td class="left">
                                                    <strong class="text-dark">Замовлений бсяг споживання, кВт.год.:</strong>
                                                </td>
                                                <td class="right">{{$invoice->consumption_volume}}</td>
                                            </tr>

                                            <tr>
                                                <td class="left">
                                                    <strong class="text-dark">Прогнозний тариф на електричну енергію, грн/1 кВт.год.:
                                                    </strong>
                                                </td>
                                                <td class="right">{{$invoice->tariff_estimated}}</td>
                                            </tr>

                                            <tr>
                                                <td class="left">
                                                    - тариф на передачу електроенергії, грн/1 кВт.год.:
                                                </td>
                                                <td class="right">{{$invoice->tariff_transmission}}</td>
                                            </tr>

                                            <tr>
                                                <td class="left">
                                                    - тариф на розподіл електроенергії, грн/1 кВт.год.:
                                                </td>
                                                <td class="right"> {{$invoice->tariff_distribution}}</td>
                                            </tr>


                                            <tr>
                                                <td class="left">
                                                    <strong class="text-dark">Вартість замовленого споживання, грн.:</strong>
                                                </td>
                                                <td class="right">{{$invoice->consumption_cost}}</td>
                                            </tr>
                                            <tr>
                                                <td class="left">
                                                    <strong class="text-dark">Фактичний обсяг споживання, кВт.год.:</strong> </td>
                                                <td class="right">
                                                    <strong class="text-dark">{{$invoice->consumption_actual}}</strong>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="left">
                                                    <strong class="text-dark">Фактична вартість електричної енергії, грн.:</strong>
                                                </td>
                                                <td class="right">
                                                    <strong class="text-dark"> {{$invoice->cost_actual}}</strong>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="left">
                                                    <strong class="text-dark">Cплачено в розрахунковому
                                                        періоді, грн.:</strong> </td>
                                                <td class="right">
                                                    <strong class="text-dark">{{$invoice->paid_summ}}</strong>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td class="left">
                                                    <strong class="text-dark">Cальдо на кінець розрахункового
                                                        періоду, грн.:</strong> </td>
                                                <td class="right">
                                                    <strong class="text-dark">{{$invoice->balance_end}}</strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            <div class="pt-3 text-center">
                <p><a class="btn btn-primary" href="{{ URL::previous() }}" role="button">Назад</a></p>

            </div>
        </div>
    </div>
</div>




@endsection
