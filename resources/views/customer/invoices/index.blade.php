@extends('theme.default')

@section('content')
<style>
    .uper {
        margin-top: 40px;
    }

    .font-10 {
        font-size: 10pt;
        text-align: right;
    }
</style>
<div class="uper">
    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div><br />
    @endif

    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h5>Рахунки</h5>

        </div>


        <div class="card-body">
            <div class="table-responsive font-10">

                <table class="table table-responsive" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Компанія</th>
                            <th>Номер</th>
                            <th>Дата</th>
                            <th>Обсяг споживання</th>
                            <th>Тариф</th>
                            <th>Нараховано</th>
                            <th>Сплачено</th>
                            <th>Дії</th>
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
                            <td>{{$invoice->consumption_volume}}</td>
                            <td>{{number_format($invoice->tariff_estimated, 2, ',', ' ')}}</td>
                            {{-- <td>{{$invoice->tariff_transmission}}</td> --}}
                            {{-- <td>{{$invoice->tariff_distribution}}</td> --}}
                            <td>{{$invoice->consumption_cost}}</td>
                            <td>{{number_format($invoice->paid_summ, 2, ',', ' ')}}</td>
                            {{-- <td>{{$invoice->consumption_actual}}</td> --}}
                            {{-- <td>{{$invoice->cost_actual}}</td> --}}
                            {{-- <td>{{$invoice->balance_end}}</td> --}}


                            <td>
                                <!-- Circle Buttons (Default) -->

                                <a href="{{ route('customer.invoices.show', $invoice->id)}}"
                                    class="btn btn-success btn-circle" data-toggle="tooltip" data-placement="top"
                                    title="Показати">
                                    <i class="fas fa-edit"></i>
                                </a>

                            </td>


                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    </div>
</div>
@endsection
