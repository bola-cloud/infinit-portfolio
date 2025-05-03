@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card p-4">
        <h2>{{ __('lang.add_service') }}</h2>
        <form action="{{ route('admin.services.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">{{ __('lang.title_en') }}</label>
                <input type="text" name="en_title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('lang.title_ar') }}</label>
                <input type="text" name="ar_title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('lang.description_en') }}</label>
                <textarea name="en_description" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('lang.description_ar') }}</label>
                <textarea name="ar_description" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">{{ __('lang.save') }}</button>
        </form>
    </div>
</div>
@endsection
