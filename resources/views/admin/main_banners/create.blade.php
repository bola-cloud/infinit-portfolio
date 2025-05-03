@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card p-4">
        <h1 class="mb-3">{{ __('lang.create_banner') }}</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.main_banners.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group mb-3">
                <label for="media_type">{{ __('lang.type') }}</label>
                <select name="media_type" id="media_type" class="form-control" required>
                    <option value="image">{{ __('lang.image') }}</option>
                    <option value="video">{{ __('lang.video') }}</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="media_path">{{ __('lang.media') }}</label>
                <input type="file" name="media_path" id="media_path" class="form-control" accept="image/*" required>
            </div>

            <div class="form-group mb-3">
                <label>
                    <input type="checkbox" name="flag" value="1">
                    {{ __('lang.set_as_active') }}
                </label>
            </div>

            <button type="submit" class="btn btn-primary">{{ __('lang.create') }}</button>
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
