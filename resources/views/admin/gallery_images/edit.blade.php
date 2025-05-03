@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card p-4">

        <h1 class="mb-3">{{ __('lang.edit_image') }} - {{ app()->getLocale() === 'ar' ? $gallery->ar_title : $gallery->en_title }}</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.gallery_images.update', [$gallery->id, $image->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        
            <div class="form-group">
                <label for="file">{{ $gallery->type == 'photo' ? __('lang.image') : __('lang.video') }}</label>
                <input type="file" name="file" class="form-control" accept="{{ $gallery->type == 'photo' ? 'image/*' : 'video/*' }}">
            </div>
        
            <div class="form-group">
                <label for="ar_subtitle">{{ __('lang.ar_subtitle') }}</label>
                <input type="text" name="ar_subtitle" class="form-control" value="{{ $image->ar_subtitle }}">
            </div>
        
            <div class="form-group">
                <label for="en_subtitle">{{ __('lang.en_subtitle') }}</label>
                <input type="text" name="en_subtitle" class="form-control" value="{{ $image->en_subtitle }}">
            </div>
        
            <div class="form-group">
                <label>
                    <input type="checkbox" name="featured" value="1" {{ $gallery->featured_image_id == $image->id ? 'checked' : '' }}>
                    {{ __('lang.set_as_featured') }}
                </label>
            </div>            
        
            <button type="submit" class="btn btn-primary">{{ __('lang.update') }}</button>
        </form>
        
    </div>
</div>
@endsection
