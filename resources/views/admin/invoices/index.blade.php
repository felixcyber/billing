@extends('theme.default')

@section('content')
<style>
    .uper {
        margin-top: 40px;
    }

    .font-10 {
        font-size: 10pt;
    }
</style>
<div>
    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div><br />
    @endif

    <div class="container">
        <div class="card">
            <div class="card-header">
                {{-- <strong>01/01/01/2018</strong>
            <span class="float-right"> <strong>Status:</strong> Pending</span> --}}
                <a class="btn btn-success" href="{{ route("invoices.create") }}">
                    Новий рахунок
                </a>

            </div>
            <div class="card-body">

                <div class="table-responsive-sm font-10">
                    <table class="table" id="dataTable">
                        <thead>
                            <tr>
                                <th class="center">Компанія</th>
                                <th class="center">Номер</th>
                                <th class="center">Дата</th>
                                {{-- <th class="center">Обсяг споживання</th> --}}
                                {{-- <th class="center">Тариф</th> --}}
                                <th class="center">Нараховано</th>
                                <th class="center">Сплачено</th>
                                <th class="center">Дії</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($invoices as $invoice)
                            <tr>
                                <td>
                                    {{ $invoice->company->title ?? '' }}
                                </td>
                                <td>{{$invoice->number}}</td>
                                <td>{{$invoice->date}}</td>
                                {{-- <td>{{$invoice->date_end}}</td> --}}
                                {{-- <td>{{$invoice->balance_start}}</td> --}}
                                {{-- <td>{{$invoice->consumption_volume}}</td> --}}
                                {{-- <td>{{number_format($invoice->tariff_estimated, 2, ',', ' ')}}</td> --}}
                                {{-- <td>{{$invoice->tariff_transmission}}</td> --}}
                                {{-- <td>{{$invoice->tariff_distribution}}</td> --}}
                                <td>{{number_format($invoice->consumption_cost, 2, ',', ' ')}}</td>
                                <td>{{number_format($invoice->paid_summ, 2, ',', ' ')}}</td>
                                {{-- <td>{{$invoice->consumption_actual}}</td> --}}
                                {{-- <td>{{$invoice->cost_actual}}</td> --}}
                                {{-- <td>{{$invoice->balance_end}}</td> --}}


                                <td>
                                    <!-- Circle Buttons (Default) -->

                                    <a href="{{ route('invoices.edit', $invoice->id)}}"
                                        class="btn btn-success btn-circle" data-toggle="tooltip" data-placement="top"
                                        title="Редагувати">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('invoices.destroy', $invoice->id)}}" method="POST"
                                        onsubmit="return confirm('Вы уверены?');" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-circle" data-toggle="tooltip"
                                            data-placement="top" title="Видалити">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>

                                </td>


                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

                <!-- Итоги таблицы -->
                <!--<div class="row mt-5">
                    <div class="col-lg-4 col-sm-5">

                    </div>

                    <div class="col-lg-4 col-sm-5 ml-auto">
                        <table class="table table-clear">
                            <tbody>
                                <tr>
                                    <td class="left">
                                        <strong>Сплачено</strong>
                                    </td>
                                    <td class="right">{{number_format($invoice->sum('paid_summ'), 2, ',', ' ')}}</td>

                                </tr>
                                <tr>
                                    <td class="left">
                                        <strong>Нараховано</strong>
                                    </td>
                                    <td class="right">{{ number_format($invoice->sum('consumption_cost'), 2, ',', ' ')}}
                                    </td>
                                </tr>

                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>-->

            </div>
        </div>
    </div>
</div>
@endsection
