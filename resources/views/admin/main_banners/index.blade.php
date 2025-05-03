@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card p-4">
        <div class="card-header d-flex justify-content-between">
            <h1 class="mb-3">{{ __('lang.banner_management') }}</h1>
            <a href="{{ route('admin.main_banners.create') }}" class="btn btn-primary mb-3">{{ __('lang.create_banner') }}</a>
        </div>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>{{ __('lang.media') }}</th>
                    <th>{{ __('lang.type') }}</th>
                    <th>{{ __('lang.flag') }}</th>
                    <th>{{ __('lang.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($banners as $banner)
                <tr>
                    <td>
                        @if ($banner->media_type == 'image')
                            <img src="{{ asset('storage/' . $banner->media_path) }}" alt="Banner Image" width="100">
                        @else
                            <video src="{{ asset('storage/' . $banner->media_path) }}" controls width="100"></video>
                        @endif
                    </td>
                    <td>{{ $banner->media_type }}</td>
                    <td>{{ $banner->flag ? __('lang.yes') : __('lang.no') }}</td>
                    <td>
                        <a href="{{ route('admin.main_banners.edit', $banner->id) }}" class="btn btn-warning">{{ __('lang.edit') }}</a>
                        <form action="{{ route('admin.main_banners.destroy', $banner->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">{{ __('lang.delete') }}</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">{{ __('lang.no_banners_found') }}</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
