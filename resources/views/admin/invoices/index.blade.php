@extends('theme.default')

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

    <div class="card shadow mb-4">
        {{-- <a class="btn btn-success" href="{{ route("invoices.create") }}">
        Новий рахунок
        </a> --}}
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Користувачі</h6>
        </div>
        {{-- <div class="card-header py-3">
            <h5 class="card-title">Рахунки</h5>
        </div> --}}
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <td>Компанія</td>
                            <td>Номер</td>
                            <td>Дата</td>
                            <td>Обсяг споживання</td>
                            <td>Тариф</td>
                            <td>Нараховано</td>
                            <td>Сплачено</td>
                            <td>Дії</td>
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

                                <a href="{{ route('invoices.edit', $invoice->id)}}" class="btn btn-success btn-circle"
                                    data-toggle="tooltip" data-placement="top" title="Редагувати">
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
        </div>
    </div>
</div>
@endsection
