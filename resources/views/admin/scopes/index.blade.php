@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card p-4">
        <div class="card-header d-flex justify-content-between">
            <h1 class="mb-3">{{ __('lang.scopes_list') }}</h1>
            <a href="{{ route('admin.scopes.create') }}" class="btn btn-primary mb-3">{{ __('lang.add_scope') }}</a>
        </div>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>{{ __('lang.ar_title') }}</th>
                    <th>{{ __('lang.en_title') }}</th>
                    <th>{{ __('lang.icon') }}</th>
                    <th>{{ __('lang.color') }}</th>
                    <th>{{ __('lang.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($scopes as $scope)
                <tr>
                    <td>{{ $scope->ar_title }}</td>
                    <td>{{ $scope->en_title }}</td>
                    <td><i class="{{ $scope->icon }}"></i></td>
                    <td><span class="badge bg-{{ $scope->color }}">{{ $scope->color }}</span></td>
                    <td>
                        <a href="{{ route('admin.scopes.edit', $scope->id) }}" class="btn btn-warning btn-sm">{{ __('lang.edit') }}</a>
                        <form action="{{ route('admin.scopes.destroy', $scope->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('{{ __('lang.confirm_delete') }}')">{{ __('lang.delete') }}</button>
                        </form>
                        <!-- New Show Button -->
                        <a href="{{ route('admin.scopes.show', $scope->id) }}" class="btn btn-info btn-sm">{{ __('lang.show_projects') }}</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
