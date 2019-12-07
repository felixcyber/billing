@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if(auth()->user()->is_admin == 1)
                        <a href="{{url('admin/companies')}}">Компанії</a>
                        <a href="{{url('admin/users')}}">Користувачі</a>
                        <a href="{{url('admin/invoices')}}">Рахунки</a>
                    @else
                        <div class="card">
                            @if (Auth::check())
                                <div class="card-header">Tasks List</div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Дата</th>
                                            </tr>

                                        </thead>
                                    <tbody>

                                    @foreach($invoices as $invoice)
                                        <tr>
                                            <td>
                                                {{$invoice->number}}
                                            </td>
                                            <td>
                                                {{$invoice->date}}
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="card-body">
                                    <h3>You need to log in. <a href="/login">Click here to login</a></h3>
                                </div>
                            @endif
                        </div>









                    @endif
                </div>
            </div>
        </div>
    </div>
</div>





{{-- <div class="card">
    @if (Auth::check())
        <div class="card-header">Tasks List</div>
        <div class="card-body">
            <a href="/task" class="btn btn-primary">Рахунки</a>
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th colspan="2">Tasks</th>
                        <th colspan="2">Tasks</th>
                        <th colspan="2">Tasks</th>
                    </tr>
                </thead>
            <tbody>
            @foreach($user->invoices as $invoice)
                <tr>
                    <td>
                        {{$invoice->number}}
                    </td>
                    <td>
                        {{$invoice->summ_1}}
                    </td>
                    <td>
                        {{$company->date}}
                    </td>

                    <td>

                        <form action="/invoices/{{$invoice->id}}">
                            <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                            <button type="submit" name="delete" formmethod="POST" class="btn btn-danger">Delete</button>
                            {{ csrf_field() }}
                        </form>
                    </td>
                </tr>


            @endforeach
            </tbody>
            </table>
        </div>
    @else
        <div class="card-body">
            <h3>You need to log in. <a href="/login">Click here to login</a></h3>
        </div>
    @endif
</div> --}}
@endsection
