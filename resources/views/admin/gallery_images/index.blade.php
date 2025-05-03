@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card p-3">
        <div class="card-header d-flex justify-content-between">
            <h1>{{ __('lang.media_management') }} - {{ app()->getLocale() === 'ar' ? $gallery->ar_title : $gallery->en_title }}</h1>
            <a href="{{ route('admin.gallery_images.create', $gallery->id) }}" class="btn btn-primary">{{ __('lang.add_image') }}</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>{{ __('lang.file') }}</th>
                    <th>{{ __('lang.ar_subtitle') }}</th>
                    <th>{{ __('lang.en_subtitle') }}</th>
                    <th>{{ __('lang.featured_image') }}</th>
                    <th>{{ __('lang.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($images as $image)
                <tr>
                    <td>
                        @if ($gallery->type == 'photo')
                            <a href="javascript:void(0)"
                               data-bs-toggle="modal"
                               data-bs-target="#mediaModal"
                               data-content="<img src='{{ asset('storage/' . $image->image_path) }}' class='img-fluid'>">
                                <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->ar_subtitle }}" width="100" height="70">
                            </a>
                        @else
                            <a href="javascript:void(0)"
                               data-bs-toggle="modal"
                               data-bs-target="#mediaModal"
                               data-content="<video src='{{ asset('storage/' . $image->image_path) }}' controls class='w-100'></video>">
                                <video src="{{ asset('storage/' . $image->image_path) }}" controls width="100"></video>
                            </a>
                        @endif
                    </td>
                    <td>{{ $image->ar_subtitle }}</td>
                    <td>{{ $image->en_subtitle }}</td>
                    <td>{{ $gallery->featured_image_id == $image->id ? __('lang.yes') : __('lang.no') }}</td>
                    <td>
                        <a href="{{ route('admin.gallery_images.edit', [$gallery->id, $image->id]) }}" class="btn btn-warning">{{ __('lang.edit') }}</a>
                        <form action="{{ route('admin.gallery_images.destroy', [$gallery->id, $image->id]) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">{{ __('lang.delete') }}</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">{{ __('lang.no_images_found') }}</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
@include('partials.media_modal')

@endsection
