@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card p-4">
        <h1 class="mb-3">{{ __('lang.edit_news') }}</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="ar_title">{{ __('lang.ar_title') }}</label>
                <input type="text" name="ar_title" class="form-control" value="{{ $news->ar_title }}" required>
            </div>

            <div class="form-group">
                <label for="en_title">{{ __('lang.en_title') }}</label>
                <input type="text" name="en_title" class="form-control" value="{{ $news->en_title }}" required>
            </div>

            <div class="form-group">
                <label for="ar_subtitle">{{ __('lang.ar_subtitle') }}</label>
                <input type="text" name="ar_subtitle" class="form-control" value="{{ $news->ar_subtitle }}">
            </div>

            <div class="form-group">
                <label for="en_subtitle">{{ __('lang.en_subtitle') }}</label>
                <input type="text" name="en_subtitle" class="form-control" value="{{ $news->en_subtitle }}">
            </div>

            <div class="form-group">
                <label for="ar_head">{{ __('lang.ar_head') }}</label>
                <input type="text" name="ar_head" class="form-control" value="{{ $news->ar_head }}">
            </div>

            <div class="form-group">
                <label for="en_head">{{ __('lang.en_head') }}</label>
                <input type="text" name="en_head" class="form-control" value="{{ $news->en_head }}">
            </div>

            <div class="form-group">
                <label for="ar_content">{{ __('lang.ar_content') }}</label>
                <textarea name="ar_content" class="form-control" rows="5" required>{{ $news->ar_content }}</textarea>
            </div>

            <div class="form-group">
                <label for="en_content">{{ __('lang.en_content') }}</label>
                <textarea name="en_content" class="form-control" rows="5" required>{{ $news->en_content }}</textarea>
            </div>

            <div class="form-group">
                <label for="image1_path">{{ __('lang.image1') }}</label>
                <input type="file" name="image1_path" class="form-control">
                @if($news->image1_path)
                    <img src="{{ asset('storage/' . $news->image1_path) }}" alt="Image 1" width="100" class="mt-2">
                @endif
            </div>

            <div class="form-group">
                <label for="image2_path">{{ __('lang.image2') }}</label>
                <input type="file" name="image2_path" class="form-control">
                @if($news->image2_path)
                    <img src="{{ asset('storage/' . $news->image2_path) }}" alt="Image 2" width="100" class="mt-2">
                @endif
            </div>

            <div class="form-group">
                <label>
                    <input type="checkbox" name="flag" value="1" {{ $news->flag ? 'checked' : '' }}>
                    {{ __('lang.set_as_main_news') }}
                </label>
            </div>

            <button type="submit" class="btn btn-primary">{{ __('lang.update') }}</button>
        </form>
    </div>
</div>
@endsection
