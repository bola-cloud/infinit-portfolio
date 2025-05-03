@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card p-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="fw-bold">{{ __('lang.website_settings') }}</h2>
        </div>

        @if(session('success'))
            <div class="alert alert-success mt-3">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Logo Upload -->
            <div class="form-group mt-3">
                <label>{{ __('lang.logo') }}</label><br>
                @if(!empty($settings->logo))
                    <div style="display: inline-block; padding: 10px; background-color: #f1f1f1; border-radius: 8px;">
                        <img src="{{ asset($settings->logo) }}" width="150" alt="{{ __('lang.logo') }}">
                    </div>
                @else
                    <p>{{ __('lang.no_logo') }}</p>
                @endif
                <input type="file" name="logo" class="form-control mt-2" accept=".jpeg,.jpg,.png,.gif,.webp">
                @error('logo')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Cover Image Upload -->
            <div class="form-group mt-3">
                <label>{{ __('lang.cover_image') }}</label><br>
                @if(!empty($settings->cover_image))
                    <div style="display: inline-block; padding: 10px; background-color: #222; border-radius: 8px;">
                        <img src="{{ asset($settings->cover_image) }}" width="300" alt="{{ __('lang.cover_image') }}">
                    </div>
                @else
                    <p>{{ __('lang.no_cover') }}</p>
                @endif
                <input type="file" name="cover_image" class="form-control mt-2" accept=".jpeg,.jpg,.png,.gif,.webp">
                @error('cover_image')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Social Media Links -->
            <div class="form-group mt-3">
                <label>{{ __('lang.facebook_link') }}</label>
                <input type="url" name="facebook" class="form-control" value="{{ $settings->facebook ?? '' }}">
                @error('facebook')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label>{{ __('lang.linkedin_link') }}</label>
                <input type="url" name="linkedin" class="form-control" value="{{ $settings->linkedin ?? '' }}">
                @error('linkedin')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label>{{ __('lang.youtube_link') }}</label>
                <input type="url" name="youtube" class="form-control" value="{{ $settings->youtube ?? '' }}">
                @error('youtube')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label>{{ __('lang.whatsapp_number') }}</label>
                <input type="text" name="whatsapp" class="form-control" value="{{ $settings->whatsapp ?? '' }}">
                @error('whatsapp')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label>{{ __('lang.email_address') }}</label>
                <input type="email" name="email" class="form-control" value="{{ $settings->email ?? '' }}">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-3">{{ __('lang.save_settings') }}</button>
        </form>
    </div>
</div>
@endsection
