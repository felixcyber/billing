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
    <div class="col-lg-12 well">
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


            <div class="form-group col-md-6">
                <label for="company_id">Компанія:</label>
                <select name="company_id" class="form-control">
                    <option value="">--- Виберіть компанію ---</option>
                    @foreach($companies as $id => $company)

                    <option value="{{ $id }}">{{ $company }} </option>
                    @endforeach
                </select>
            </div>



            <div class="form-row ">
                <div class="form-group col-md-3">
                    @csrf
                    <label for="number">Номер:</label>
                    <input type="text" class="form-control" name="number" autofocus />
                </div>

                <div class="form-group col-md-4">
                    <label for="date">Дата початку періоду:</label>
                    <input type="date" class="form-control" name="date" />
                </div>
                <div class="form-group col-md-4">
                    <label for="date_end">Дата закінчення періоду:</label>
                    <input type="date" class="form-control" name="date_end" />

                </div>

            </div>
            <div class="form-group row">
                <label for="balance_start" class="col-sm-6 col-form-label font-weight-bold">Сальдо на початок
                    розрахункового періоду:</label>
                <div class="col-sm-4"> <input type="text" class="form-control" name="balance_start" />
                </div>
                {{-- <div class="dropdown-divider"></div> --}}
            </div>


            <div class="form-group row">

                <label for="tariff_estimated" class="col-sm-6 col-form-label font-weight-bold">Прогнозний тариф на
                    електричну
                    енергію:</label>

                <div class="col-sm-4">
                    <input type="text" class="form-control" name="tariff_estimated" />
                </div>
            </div>

            <div class="form-group row">
                <label for="tariff_transmission" class="col-sm-6 col-form-label "> - тариф на передачу
                    електроенергії:</label>
                <div class="col-sm-4"> <input type="text" class="form-control" name="tariff_transmission" /></div>
            </div>

            <div class="form-group row">
                <label for="tariff_distribution" class="col-sm-6 col-form-label"> - тариф на розподіл
                    електроенергії:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="tariff_distribution" />
                </div>
            </div>




            <div class="row bg-light text-dark">
                <div class="col-md-6">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="consumption_volume" class="col-form-label">Замовлений обсяг споживання на
                                розрахунковий період:</label>
                            <div class="col-sm-8"> <input type="text" class="form-control" name="consumption_volume" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="consumption_cost" class="col-form-label">Вартість замовленого споживання на
                                розрахунковий період:</label>
                            <div class="col-sm-8"> <input type="text" class="form-control" name="consumption_cost" />
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="consumption_actual" class="col-form-label">Фактичний обсяг споживання:</label>
                            <div class="col-sm-8"> <input type="text" class="form-control" name="consumption_actual" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="cost_actual" class="col-form-label">Фактична вартість електричної
                                енергії:</label>
                            <div class="col-sm-8"> <input type="text" class="form-control" name="cost_actual" /></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="paid_summ" class="col-sm-6 col-form-label font-weight-bold">Сплачено в розрахунковому
                    періоді:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="paid_summ" />
                </div>
            </div>


            <div class="form-group row">
                <label for="balance_end" class="col-sm-6 col-form-label font-weight-bold">Сальдо на кінець
                    розрахункового
                    періоду:</label>
                <div class="col-sm-4"> <input type="text" class="form-control" name="balance_end" />
                </div>
                <div class="dropdown-divider"></div>
            </div>


            <button type="submit" class="btn btn-primary">Створити рахунок</button>
        </form>
    </div>

    <div class="container">
        <h1 class="well">Новий рахунок</h1>
        <div class="col-lg-12 well">
            <div class="row">
                <form>
                    <div class="col-sm-12 bg-light text-dark">
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>First Name</label>
                                <input type="text" placeholder="Enter First Name Here.." class="form-control">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Last Name</label>
                                <input type="text" placeholder="Enter Last Name Here.." class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea placeholder="Enter Address Here.." rows="3" class="form-control"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label>City</label>
                                <input type="text" placeholder="Enter City Name Here.." class="form-control">
                            </div>
                            <div class="col-sm-4 form-group">
                                <label>State</label>
                                <input type="text" placeholder="Enter State Name Here.." class="form-control">
                            </div>
                            <div class="col-sm-4 form-group">
                                <label>Zip</label>
                                <input type="text" placeholder="Enter Zip Code Here.." class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>Title</label>
                                <input type="text" placeholder="Enter Designation Here.." class="form-control">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Company</label>
                                <input type="text" placeholder="Enter Company Name Here.." class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" placeholder="Enter Phone Number Here.." class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="text" placeholder="Enter Email Address Here.." class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Website</label>
                            <input type="text" placeholder="Enter Website Name Here.." class="form-control">
                        </div>
                        <button type="button" class="btn btn-lg btn-info">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    @endsection
