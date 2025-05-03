@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card p-4">
        <h1 class="mb-3">{{ __('lang.add_project') }} - {{ $scope->en_title }}</h1>

        <form action="{{ route('admin.projects.store', $scope->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>{{ __('lang.ar_name') }}</label>
                <input type="text" name="ar_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label>{{ __('lang.en_name') }}</label>
                <input type="text" name="en_name" class="form-control" required>
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
                <label>{{ __('lang.image') }}</label>
                <input type="file" name="image" class="form-control-file">
            </div>

            <button type="submit" class="btn btn-primary">{{ __('lang.save') }}</button>
        </form>
    </div>
</div>
@endsection
