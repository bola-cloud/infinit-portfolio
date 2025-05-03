@extends('layouts.app')

@section('content')
<div class="container-fluid m-0">
    <!-- Address Section -->
    <section class="address" style="background: linear-gradient(60deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset($settings->cover_image ?? 'https://www.qodra-egy.net/img/about/ab_4.jpg') }}'); background-size: cover; background-position: center;">
        <div class="container">
            <div class="col-lg-12 text-center">
                <h3 class="address-h3">{{ __('lang.projects_for_scope') }}: {{ app()->getLocale() === 'ar' ? $scope->ar_title : $scope->en_title }}</h3>
            </div>
        </div>
    </section>

    <!-- Page Header -->
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner-heading">
                        <ul class="breadcrumb">
                            <li>
                                <a href="{{ route('home') }}">{{ __('lang.breadcrumb_home') }}</a>
                                <i class="icon-angle-right"></i>
                            </li>
                            <li class="active">&nbsp; {{ __('lang.breadcrumb_projects') }}</li>
                        </ul>
                        <h2>{{ __('lang.projects_for_scope') }}: {{ app()->getLocale() === 'ar' ? $scope->ar_title : $scope->en_title }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" style="padding: 60px 0;">
        <div class="container">
            @if($projects->isEmpty())
                <div class="text-center">
                    <h4 class="text-muted">{{ __('lang.no_projects_available') }}</h4>
                </div>
            @else
                <div class="row">
                    @foreach($projects as $project)
                        <div class="col-md-6">
                            <div class="card project-card shadow-lg text-center">
                                @if($project->image)
                                    <img src="{{ asset('storage/' . $project->image) }}" class="card-img-top img-fluid" alt="{{ $project->en_name }}" style="height: 400px; object-fit: cover; border-radius: 10px 10px 0 0;">
                                @else
                                    <img src="https://via.placeholder.com/400x300?text=No+Image" class="card-img-top img-fluid" alt="No Image Available" style="height: 200px; object-fit: cover; border-radius: 10px 10px 0 0;">
                                @endif
                                <div class="card-body">
                                    <h4 class="card-title">
                                        {{ app()->getLocale() === 'ar' ? $project->ar_name : $project->en_name }}
                                    </h4>
                                    <!-- Button to trigger modal -->
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#projectModal{{ $project->id }}">
                                        {{ __('lang.view_details') }}
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Modal for Project Details -->
                        <div class="modal fade" id="projectModal{{ $project->id }}" tabindex="-1" aria-labelledby="projectModalLabel{{ $project->id }}" aria-hidden="true" style="z-index: 10000 !important;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="projectModalLabel{{ $project->id }}">
                                            {{ app()->getLocale() === 'ar' ? $project->ar_name : $project->en_name }}
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                        @if($project->image)
                                            <img src="{{ asset('storage/' . $project->image) }}" class="img-fluid rounded mb-3" alt="{{ $project->en_name }}" style="max-height: 400px; object-fit: contain;">
                                        @else
                                            <img src="https://via.placeholder.com/600x400?text=No+Image" class="img-fluid rounded mb-3" alt="No Image Available">
                                        @endif
                                        <p>{{ app()->getLocale() === 'ar' ? $project->ar_description : $project->en_description }}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('lang.close') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
</div>
@endsection
