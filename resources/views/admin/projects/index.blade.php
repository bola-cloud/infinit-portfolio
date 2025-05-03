@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card p-4">
        <div class="card-header d-flex justify-content-between">
            <h1>{{ __('lang.projects_list') }} - {{  app()->getLocale() === 'ar' ? $scope->ar_title :$scope->en_title }}</h1>
            <a href="{{ route('admin.projects.create', $scope->id) }}" class="btn btn-primary">{{ __('lang.add_project') }}</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>{{ __('lang.ar_name') }}</th>
                    <th>{{ __('lang.en_name') }}</th>
                    <th>{{ __('lang.image') }}</th>
                    <th>{{ __('lang.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                <tr>
                    <td>{{ $project->ar_name }}</td>
                    <td>{{ $project->en_name }}</td>
                    <td><img src="{{ asset('storage/' . $project->image) }}" width="50" alt="Project Image"></td>
                    <td>
                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning btn-sm">{{ __('lang.edit') }}</a>
                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" style="display:inline;">
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
