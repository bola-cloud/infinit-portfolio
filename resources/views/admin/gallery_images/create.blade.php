@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card p-4">

        <h1 class="mb-3">{{ __('lang.add_image') }} - {{ app()->getLocale() === 'ar' ? $gallery->ar_title : $gallery->en_title }}</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.gallery_images.store', $gallery->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
        
            <div class="form-group">
                <label for="file">{{ $gallery->type == 'photo' ? __('lang.image') : __('lang.video') }}</label>
                <input type="file" name="file" class="form-control" accept="{{ $gallery->type == 'photo' ? 'image/*' : 'video/*' }}" required>
            </div>
        
            <div class="form-group">
                <label for="ar_subtitle">{{ __('lang.ar_subtitle') }}</label>
                <input type="text" name="ar_subtitle" class="form-control">
            </div>
        
            <div class="form-group">
                <label for="en_subtitle">{{ __('lang.en_subtitle') }}</label>
                <input type="text" name="en_subtitle" class="form-control">
            </div>
        
            <div class="form-group">
                <label>
                    <input type="checkbox" name="featured" value="1">
                    {{ __('lang.set_as_featured') }}
                </label>
            </div>
            
        
            <button type="submit" class="btn btn-primary">{{ __('lang.add') }}</button>
        </form>        
    </div>
</div>
@endsection
