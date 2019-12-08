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
            <h6 class="m-0 font-weight-bold text-primary">Користувачі</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <td>Ім'я</td>
                            <td>E-mail</td>
                            <td>Компанія</td>
                            <td>Адмін</td>

                            <td>Дії</td>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                {{ $user->company->title ?? '' }}
                            </td>
                            {{-- <td>{{$user->is_admin}}</td> --}}
                            <td>
                                <span style="display:none">{{ $user->is_admin ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $user->is_admin ? 'checked' : '' }}>
                            </td>



                            <td>
                                    <!-- Circle Buttons (Default) -->

                                    <a href="{{ route('users.edit', $user->id)}}" class="btn btn-success btn-circle" data-toggle="tooltip" data-placement="top" title="Редагувати">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('users.destroy', $user->id)}}" method="POST" onsubmit="return confirm('Вы уверены?');" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-circle"  data-toggle="tooltip" data-placement="top" title="Видалити">
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
