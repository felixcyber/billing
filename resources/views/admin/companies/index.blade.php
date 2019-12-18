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

            <div class="card-header py-3">
                    <h5 >Компанії</h5>
                    <a class="btn btn-success" href="{{ route("companies.create") }}">
                        Нова компанія
                    </a>
                </div>
        <div class="card-body">
            <div class="table-responsive">



                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Назва</td>
                            <td>Опис</td>
                            <td>Дії</td>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach($companies as $company)
                        <tr>
                            <td>{{$company->id}}</td>
                            <td>{{$company->title}}</td>
                            <td>{{$company->description}}</td>

                            <td>
                                {{-- {{-- Circle Buttons (Default) --}}
                                
                                <a href="{{ route('companies.edit', $company->id)}}" class="btn btn-success btn-circle" data-toggle="tooltip" data-placement="top" title="Редагувати">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('companies.destroy', $company->id)}}" method="POST" onsubmit="return confirm('Вы уверены?');" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-circle" data-toggle="tooltip" data-placement="top" title="Видалити">
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

    @endsection
