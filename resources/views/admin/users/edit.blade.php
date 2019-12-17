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
            Редагувати користувача
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
            <form method="post" action="{{ route('users.update', $user->id) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="name">Ім'я:</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}" />
                </div>
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ $user->email }}" required autocomplete="email" />
                </div>
                <div class="form-group">
                    <label for="password">Пароль:</label>
                    <input type="password" class="form-control" name="password" value="{{ $user->password }}" required
                        autocomplete="new-password" />
                </div>
                {{-- <div class="form-group">
                <label for='is_admin'>Адмін?</label>
                <input type="hidden" name="is_admin" value="0">
                <input type="checkbox" name='is_admin' value="{{ $user->is_admin }}"/>

        </div> --}}
        <div class="form-group">
            <input type="hidden" name="is_admin" value="0">
            <input type="checkbox" name="is_admin" id="is_admin" value="1"
                {{ $user->is_admin || old('is_admin', 0) === 1 ? 'checked' : '' }}>
            <label for="is_admin">Адмін?</label>

        </div>
        <div class="form-group">
            <label for="company_id">Компанія:</label>
            <select name="company_id" class="form-control" style="width:250px">
                {{-- <option value="">--- Виберіть компанію ---</option> --}}
                @foreach($companies as $id => $company)

                <option value="{{ $id }}">{{ $company }} </option>
                @endforeach
            </select>
        </div>
        {{-- <div class="form-group">
              <label for="price">Користувач:</label>
              <input type="text" class="form-control" name="user_id" value="{{ number_format($company->user_id, 0) }}"/>
    </div> --}}

    <button type="submit" class="btn btn-primary">Відновити</button>
    </form>
</div>
</div>
</div>

@endsection
