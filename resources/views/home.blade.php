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
                        <div class=”panel-heading”>Не сотрудник</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
