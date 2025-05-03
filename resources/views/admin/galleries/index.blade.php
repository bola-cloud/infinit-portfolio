@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card p-3">
        <div class="card-header d-flex justify-content-between">
            <h1>{{ __('lang.gallery_management') }}</h1>
            <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary">{{ __('lang.create_gallery') }}</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>{{ __('lang.title') }}</th>
                    <th>{{ __('lang.type') }}</th>
                    <th>{{ __('lang.featured_image') }}</th>
                    <th>{{ __('lang.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($galleries as $gallery)
                <tr>
                    <td>{{ app()->getLocale() === 'ar' ? $gallery->ar_title : $gallery->en_title }}</td>
                    <td>{{ __('lang.types.' . $gallery->type) }}</td>
                    <td>
                        @if ($gallery->featured_image_id && $gallery->featuredImage)
                            @if ($gallery->type == 'photo')
                                <a href="javascript:void(0)"
                                   data-bs-toggle="modal"
                                   data-bs-target="#mediaModal"
                                   data-content="<img src='{{ asset('storage/' . $gallery->featuredImage->image_path) }}' class='img-fluid'>">
                                    <img src="{{ asset('storage/' . $gallery->featuredImage->image_path) }}"
                                         alt="{{ $gallery->featuredImage->ar_subtitle }}"
                                         width="100"
                                         height="50">
                                </a>
                            @else
                                <a href="javascript:void(0)"
                                   data-bs-toggle="modal"
                                   data-bs-target="#mediaModal"
                                   data-content="<video src='{{ asset('storage/' . $gallery->featuredImage->image_path) }}' controls class='w-100'></video>">
                                    <video src="{{ asset('storage/' . $gallery->featuredImage->image_path) }}" controls width="100"></video>
                                </a>
                            @endif
                        @else
                            <span>{{ __('lang.no_featured_image') }}</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.gallery_images.index', $gallery->id) }}" class="btn btn-primary">{{ __('lang.media_gallery') }}</a>
                        <a href="{{ route('admin.galleries.edit', $gallery->id) }}" class="btn btn-warning">{{ __('lang.edit_gallery') }}</a>
                        <form action="{{ route('admin.galleries.destroy', $gallery->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">{{ __('lang.delete_gallery') }}</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">{{ __('lang.no_galleries_found') }}</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
@include('partials.media_modal')

@endsection
