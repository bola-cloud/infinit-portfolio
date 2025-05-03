@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card p-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="fw-bold">{{ __('lang.partner_categories') }}</h2>
            <button class="btn btn-primary" data-toggle="modal" data-target="#createCategoryModal">{{ __('lang.add_category') }}</button>
        </div>

        @if(session('success'))
            <div class="alert alert-success mt-3">{{ session('success') }}</div>
        @endif

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>{{ __('lang.arabic_name') }}</th>
                    <th>{{ __('lang.english_name') }}</th>
                    <th>{{ __('lang.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->ar_name }}</td>
                        <td>{{ $category->en_name }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm edit-btn" data-id="{{ $category->id }}" data-ar_name="{{ $category->ar_name }}" data-en_name="{{ $category->en_name }}" data-toggle="modal" data-target="#editCategoryModal">{{ __('lang.edit') }}</button>
                            <form action="{{ route('admin.partner_categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('{{ __('lang.confirm_delete') }}')">{{ __('lang.delete') }}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Create Category Modal -->
<div class="modal fade" id="createCategoryModal" tabindex="-1" aria-labelledby="createCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('lang.add_category') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.partner_categories.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>{{ __('lang.arabic_name') }}</label>
                        <input type="text" name="ar_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>{{ __('lang.english_name') }}</label>
                        <input type="text" name="en_name" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('lang.cancel') }}</button>
                    <button type="submit" class="btn btn-success">{{ __('lang.save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Category Modal -->
<div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('lang.edit_category') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editCategoryForm" method="POST">
                @csrf @method('PUT')
                <div class="modal-body">
                    <input type="hidden" name="id" id="editCategoryId">
                    <div class="form-group">
                        <label>{{ __('lang.arabic_name') }}</label>
                        <input type="text" name="ar_name" id="editArName" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>{{ __('lang.english_name') }}</label>
                        <input type="text" name="en_name" id="editEnName" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('lang.cancel') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('lang.update') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        $('.edit-btn').on('click', function() {
            let categoryId = $(this).data('id');
            let arName = $(this).data('ar_name');
            let enName = $(this).data('en_name');

            $('#editCategoryId').val(categoryId);
            $('#editArName').val(arName);
            $('#editEnName').val(enName);

            // Use Laravel route helper correctly
            $('#editCategoryForm').attr('action', "{{ route('admin.partner_categories.index') }}/" + categoryId);
        });
    });
</script>

@endsection
