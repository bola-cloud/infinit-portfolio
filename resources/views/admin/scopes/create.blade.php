@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card p-4">
        <h1 class="mb-3">{{ __('lang.add_scope') }}</h1>

        <form action="{{ route('admin.scopes.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>{{ __('lang.ar_title') }}</label>
                <input type="text" name="ar_title" class="form-control" required>
            </div>

            <div class="form-group">
                <label>{{ __('lang.en_title') }}</label>
                <input type="text" name="en_title" class="form-control" required>
            </div>

            <div class="form-group">
                <label>{{ __('lang.ar_description') }}</label>
                <textarea name="ar_description" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label>{{ __('lang.en_description') }}</label>
                <textarea name="en_description" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label>{{ __('lang.icon') }}</label>
                <input type="text" name="icon" class="form-control" placeholder="e.g., fas fa-search" required>
            </div>

            <div class="form-group">
                <label>{{ __('lang.color') }}</label>
                <select name="color" class="form-control" id="colorSelect">
                    <option value="primary" class="text-primary">{{ __('lang.primary') }}</option>
                    <option value="success" class="text-success">{{ __('lang.success') }}</option>
                    <option value="warning" class="text-warning">{{ __('lang.warning') }}</option>
                    <option value="danger" class="text-danger">{{ __('lang.danger') }}</option>
                    <option value="info" class="text-info">{{ __('lang.info') }}</option>
                    <option value="secondary" class="text-secondary">{{ __('lang.secondary') }}</option>
                    <option value="dark" class="text-dark">{{ __('lang.dark') }}</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">{{ __('lang.save') }}</button>
        </form>
    </div>
</div>
@endsection
