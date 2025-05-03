@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card p-4">
        <h1 class="mb-3">{{ __('lang.edit_scope') }}</h1>

        <form action="{{ route('admin.scopes.update', $scope->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>{{ __('lang.ar_title') }}</label>
                <input type="text" name="ar_title" class="form-control" value="{{ $scope->ar_title }}" required>
            </div>

            <div class="form-group">
                <label>{{ __('lang.en_title') }}</label>
                <input type="text" name="en_title" class="form-control" value="{{ $scope->en_title }}" required>
            </div>

            <div class="form-group">
                <label>{{ __('lang.ar_description') }}</label>
                <textarea name="ar_description" class="form-control" required>{{ $scope->ar_description }}</textarea>
            </div>

            <div class="form-group">
                <label>{{ __('lang.en_description') }}</label>
                <textarea name="en_description" class="form-control" required>{{ $scope->en_description }}</textarea>
            </div>

            <div class="form-group">
                <label>{{ __('lang.icon') }}</label>
                <input type="text" name="icon" class="form-control" value="{{ $scope->icon }}" required>
            </div>

            <div class="form-group">
                <label>{{ __('lang.color') }}</label>
                <select name="color" class="form-control" id="colorSelect">
                    <option value="primary" class="text-primary" {{ $scope->color == 'primary' ? 'selected' : '' }}>
                        {{ __('lang.primary') }}
                    </option>
                    <option value="success" class="text-success" {{ $scope->color == 'success' ? 'selected' : '' }}>
                        {{ __('lang.success') }}
                    </option>
                    <option value="warning" class="text-warning" {{ $scope->color == 'warning' ? 'selected' : '' }}>
                        {{ __('lang.warning') }}
                    </option>
                    <option value="danger" class="text-danger" {{ $scope->color == 'danger' ? 'selected' : '' }}>
                        {{ __('lang.danger') }}
                    </option>
                    <option value="info" class="text-info" {{ $scope->color == 'info' ? 'selected' : '' }}>
                        {{ __('lang.info') }}
                    </option>
                    <option value="secondary" class="text-secondary" {{ $scope->color == 'secondary' ? 'selected' : '' }}>
                        {{ __('lang.secondary') }}
                    </option>
                    <option value="dark" class="text-dark" {{ $scope->color == 'dark' ? 'selected' : '' }}>
                        {{ __('lang.dark') }}
                    </option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">{{ __('lang.save') }}</button>
        </form>
    </div>
</div>
@endsection
