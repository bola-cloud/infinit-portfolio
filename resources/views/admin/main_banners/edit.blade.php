@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card p-4">
        <h1 class="mb-3">{{ __('lang.edit_banner') }}</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.main_banners.update', $mainBanner->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="media_type">{{ __('lang.type') }}</label>
                <select name="media_type" id="media_type" class="form-control" required>
                    <option value="image" {{ $mainBanner->media_type === 'image' ? 'selected' : '' }}>{{ __('lang.image') }}</option>
                    <option value="video" {{ $mainBanner->media_type === 'video' ? 'selected' : '' }}>{{ __('lang.video') }}</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="media_path">{{ __('lang.media') }}</label>
                <input type="file" name="media_path" id="media_path" class="form-control" accept="{{ $mainBanner->media_type === 'image' ? 'image/*' : 'video/*' }}">
                <small class="text-muted">{{ __('lang.leave_blank_to_keep_current') }}</small>
                <div class="mt-2">
                    @if ($mainBanner->media_type === 'image')
                        <img src="{{ asset('storage/' . $mainBanner->media_path) }}" alt="Current Media" width="150">
                    @else
                        <video src="{{ asset('storage/' . $mainBanner->media_path) }}" controls width="150"></video>
                    @endif
                </div>
            </div>

            <div class="form-group mb-3">
                <label>
                    <input type="checkbox" name="flag" value="1" {{ $mainBanner->flag ? 'checked' : '' }}>
                    {{ __('lang.set_as_active') }}
                </label>
            </div>

            <button type="submit" class="btn btn-primary">{{ __('lang.update') }}</button>
        </form>
    </div>
</div>

<script>
    document.getElementById('media_type').addEventListener('change', function() {
        const mediaInput = document.getElementById('media_path');
        mediaInput.setAttribute('accept', this.value === 'image' ? 'image/*' : 'video/*');
    });
</script>
@endsection
