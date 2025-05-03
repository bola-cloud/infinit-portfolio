@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card p-4">
        <div class="card-header d-flex justify-content-between">
            <h1 class="mb-3">{{ __('lang.news_management') }}</h1>
            <a href="{{ route('admin.news.create') }}" class="btn btn-primary mb-3">{{ __('lang.create_news') }}</a>
        </div>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>{{ __('lang.image') }}</th>
                    <th>{{ __('lang.title') }}</th>
                    <th>{{ __('lang.head') }}</th>
                    <th>{{ __('lang.flag') }}</th>
                    <th>{{ __('lang.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($news as $item)
                <tr>
                    <!-- Display the first image -->
                    <td>
                        @if($item->image1_path)
                            <img src="{{ asset('storage/' . $item->image1_path) }}" alt="News Image" width="100" class="rounded">
                        @else
                            <span>{{ __('lang.no_image') }}</span>
                        @endif
                    </td>

                    <!-- Display the localized title -->
                    <td>{{ app()->getLocale() === 'ar' ? $item->ar_title : $item->en_title }}</td>

                    <!-- Display the localized head -->
                    <td>{{ app()->getLocale() === 'ar' ? $item->ar_head : $item->en_head }}</td>

                    <!-- Display the flag status -->
                    <td>{{ $item->flag ? __('lang.yes') : __('lang.no') }}</td>

                    <!-- Action buttons -->
                    <td>
                        <a href="{{ route('admin.news.edit', $item->id) }}" class="btn btn-warning">{{ __('lang.edit') }}</a>
                        <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">{{ __('lang.delete') }}</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">{{ __('lang.no_news_found') }}</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
