@extends('theme.default')

@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>

<div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card uper">
        <div class="card-header">
            Додати юзера
        </div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
            @endif
            <form method="post" action="{{ route('users.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="name">Ім'я:</label>
                    <input type="text" class="form-control" name="name" autofocus />
                </div>
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" required
                        autocomplete="email" />
                </div>
                <div class="form-group">
                    <label for="password">Пароль:</label>
                    <input type="password" class="form-control" name="password" required autocomplete="new-password" />
                </div>
                {{-- <div class="form-group">
            <label for="password-confirm">Підтвердити пароль:</label>
            <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"/>
        </div> --}}

                <div class="form-group">
                    <label for="password_confirmation">Підтвердити пароль:</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>
                <div class="form-group">
                    <label for='is_admin'>Адмін?:</label>
                    <input type="checkbox" name='is_admin' value="1" />
                </div>

                <div class="form-group">
                    <label for="company_id">Компанія:</label>
                    <select name="company_id" class="form-control" style="width:250px">
                        <option value="">--- Виберіть компанію ---</option>
                        @foreach($companies as $id => $company)

                        <option value="{{ $id }}">{{ $company }} </option>
                        @endforeach
                    </select>
                </div>



                <button type="submit" class="btn btn-primary">Створити юзера</button>
            </form>
        </div>
    </div>
</div>

@endsection
