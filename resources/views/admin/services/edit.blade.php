@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card p-4">
        <h2>{{ __('lang.edit_service') }}</h2>
        <form action="{{ route('admin.services.update', $service->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label">{{ __('lang.title_en') }}</label>
                <input type="text" name="en_title" class="form-control" value="{{ $service->en_title }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('lang.title_ar') }}</label>
                <input type="text" name="ar_title" class="form-control" value="{{ $service->ar_title }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('lang.description_en') }}</label>
                <textarea name="en_description" class="form-control" required>{{ $service->en_description }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('lang.description_ar') }}</label>
                <textarea name="ar_description" class="form-control" required>{{ $service->ar_description }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">{{ __('lang.update') }}</button>
        </form>
    </div>
</div>
@endsection
