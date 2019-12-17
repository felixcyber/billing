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
            Змінити компанію
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
            <form method="post" action="{{ route('companies.update', $company->id) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="name">Найменування:</label>
                    <input type="text" class="form-control" name="title" value="{{ $company->title }}" />
                </div>
                <div class="form-group">
                    <label for="price">Опис:</label>
                    <input type="text" class="form-control" name="description" value="{{ $company->description }}" />
                </div>
                {{-- <div class="form-group">
              <label for="price">Користувач:</label>
              <input type="text" class="form-control" name="user_id" value="{{ number_format($company->user_id, 0) }}"/>
        </div> --}}

        <button type="submit" class="btn btn-primary">Відновити компанію</button>
        </form>
    </div>
</div>
</div>
@endsection
