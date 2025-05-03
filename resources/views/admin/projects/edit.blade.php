@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card p-4">
        <h1 class="mb-3">{{ __('lang.edit_project') }}</h1>

        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>{{ __('lang.scope') }}</label>
                <select name="scope_id" class="form-control" required>
                    <option value="">{{ __('lang.select_scope') }}</option>
                    @foreach($scopes as $scope)
                        <option value="{{ $scope->id }}" {{ $scope->id == $project->scope_id ? 'selected' : '' }}>{{ $scope->en_title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>{{ __('lang.ar_name') }}</label>
                <input type="text" name="ar_name" class="form-control" value="{{ $project->ar_name }}" required>
            </div>

            <div class="form-group">
                <label>{{ __('lang.en_name') }}</label>
                <input type="text" name="en_name" class="form-control" value="{{ $project->en_name }}" required>
            </div>

            <div class="form-group">
                <label>{{ __('lang.ar_description') }}</label>
                <textarea name="ar_description" class="form-control" required>{{ $project->ar_description }}</textarea>
            </div>

            <div class="form-group">
                <label>{{ __('lang.en_description') }}</label>
                <textarea name="en_description" class="form-control" required>{{ $project->en_description }}</textarea>
            </div>

            <div class="form-group">
                <label>{{ __('lang.image') }}</label>
                <input type="file" name="image" class="form-control-file">
                @if($project->image)
                    <img src="{{ asset('storage/' . $project->image) }}" width="100" alt="Project Image" class="mt-2">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">{{ __('lang.save') }}</button>
        </form>
    </div>
</div>
@endsection
