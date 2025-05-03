@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card p-4">

        <h1 class="mb-3">{{ __('lang.edit_gallery') }}</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.galleries.update', $gallery->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="ar_title">{{ __('lang.ar_title') }}</label>
                <input type="text" name="ar_title" class="form-control" value="{{ $gallery->ar_title }}" required>
            </div>

            <div class="form-group">
                <label for="en_title">{{ __('lang.en_title') }}</label>
                <input type="text" name="en_title" class="form-control" value="{{ $gallery->en_title }}" required>
            </div>

            <div class="form-group">
                <label for="type">{{ __('lang.type') }}</label>
                <select name="type" class="form-control" required>
                    <option value="photo" {{ $gallery->type == 'photo' ? 'selected' : '' }}>{{ __('lang.types.photo') }}</option>
                    <option value="video" {{ $gallery->type == 'video' ? 'selected' : '' }}>{{ __('lang.types.video') }}</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">{{ __('lang.update') }}</button>
        </form>
    </div>
</div>
@endsection
