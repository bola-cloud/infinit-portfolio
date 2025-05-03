@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card p-4">

        <h1 class="mb-3">{{ __('lang.create_gallery') }}</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.galleries.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="ar_title">{{ __('lang.ar_title') }}</label>
                <input type="text" name="ar_title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="en_title">{{ __('lang.en_title') }}</label>
                <input type="text" name="en_title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="type">{{ __('lang.type') }}</label>
                <select name="type" class="form-control" required>
                    <option value="photo">{{ __('lang.types.photo') }}</option>
                    <option value="video">{{ __('lang.types.video') }}</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">{{ __('lang.create') }}</button>
        </form>
    </div>
</div>
@endsection
