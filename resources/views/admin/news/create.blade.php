@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card p-4">
        <h1 class="mb-3">{{ __('lang.create_news') }}</h1>

        <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="ar_title">{{ __('lang.ar_title') }}</label>
                <input type="text" name="ar_title" class="form-control @error('ar_title') is-invalid @enderror" value="{{ old('ar_title') }}" required>
                @error('ar_title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="en_title">{{ __('lang.en_title') }}</label>
                <input type="text" name="en_title" class="form-control @error('en_title') is-invalid @enderror" value="{{ old('en_title') }}" required>
                @error('en_title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="ar_subtitle">{{ __('lang.ar_subtitle') }}</label>
                <input type="text" name="ar_subtitle" class="form-control @error('ar_subtitle') is-invalid @enderror" value="{{ old('ar_subtitle') }}">
                @error('ar_subtitle')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="en_subtitle">{{ __('lang.en_subtitle') }}</label>
                <input type="text" name="en_subtitle" class="form-control @error('en_subtitle') is-invalid @enderror" value="{{ old('en_subtitle') }}">
                @error('en_subtitle')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="ar_head">{{ __('lang.ar_head') }}</label>
                <input type="text" name="ar_head" class="form-control @error('ar_head') is-invalid @enderror" value="{{ old('ar_head') }}">
                @error('ar_head')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="en_head">{{ __('lang.en_head') }}</label>
                <input type="text" name="en_head" class="form-control @error('en_head') is-invalid @enderror" value="{{ old('en_head') }}">
                @error('en_head')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="ar_content">{{ __('lang.ar_content') }}</label>
                <textarea name="ar_content" class="form-control @error('ar_content') is-invalid @enderror" rows="5" required>{{ old('ar_content') }}</textarea>
                @error('ar_content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="en_content">{{ __('lang.en_content') }}</label>
                <textarea name="en_content" class="form-control @error('en_content') is-invalid @enderror" rows="5" required>{{ old('en_content') }}</textarea>
                @error('en_content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image1_path">{{ __('lang.image1') }}</label>
                <input type="file" name="image1_path" class="form-control @error('image1_path') is-invalid @enderror" accept="image/*" required>
                @error('image1_path')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image2_path">{{ __('lang.image2') }}</label>
                <input type="file" name="image2_path" class="form-control @error('image2_path') is-invalid @enderror" accept="image/*" required>
                @error('image2_path')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>
                    <input type="checkbox" name="flag" value="1" {{ old('flag') ? 'checked' : '' }}>
                    {{ __('lang.set_as_main_news') }}
                </label>
                @error('flag')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">{{ __('lang.create') }}</button>
        </form>
    </div>
</div>
@endsection
