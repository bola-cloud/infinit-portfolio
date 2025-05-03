@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card p-4">
        <div class="card-header d-flex justify-content-between">
            <h1 class="mb-3">{{ __('lang.partners_list') }}</h1>
            <a href="{{ route('admin.partners.create') }}" class="btn btn-primary mb-3">{{ __('lang.add_partner') }}</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>{{ __('lang.category') }}</th>
                    <th>{{ __('lang.image') }}</th>
                    <th>{{ __('lang.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($partners as $partner)
                <tr>
                    <td>

                        @if (!empty($partner->categories) && $partner->categories instanceof \App\Models\PartnerCategory)
                            {{ app()->getLocale() == 'ar' ? $partner->categories->ar_name : $partner->categories->en_name }}
                        @else
                            <span class="text-muted">{{ __('lang.no_category') }}</span>
                        @endif
                    </td>
                    <td><img src="{{ asset($partner->image_path) }}" width="80"></td>
                    <td>
                        <a href="{{ route('admin.partners.edit', $partner->id) }}" class="btn btn-warning btn-sm">{{ __('lang.edit') }}</a>
                        <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('{{ __('lang.confirm_delete') }}')">{{ __('lang.delete') }}</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection
