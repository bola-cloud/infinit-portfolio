@extends('layouts.app')

@section('content')
<div class="container-fluid m-0">

    <section class="address" style="background: linear-gradient(60deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset($settings->cover_image ?? 'https://www.qodra-egy.net/img/about/ab_4.jpg') }}'); background-size: cover; background-position: center;">
        <div class="container">
            <div class="col-lg-12 text-center">
                <h3 class="address-h3">{{ __('lang.address_title') }}</h3>
            </div>
        </div>
    </section>


    <!-- Scopes Filter Section -->
    <section class="scopes-filter text-center my-4">
        <div class="container d-flex justify-content-center flex-wrap gap-3">
            <!-- Show "All" Button -->
            <button class="scope-btn active" onclick="filterProjects('all')" style="border: 1px solid #000; color: #000;">
                {{ __('lang.all_projects') }}
            </button>

            @foreach($scopes as $scope)
                <button class="scope-btn" onclick="filterProjects('{{ $scope->id }}')"
                        style="border: 1px solid {{ getBootstrapColor($scope->color) }};
                               color: {{ getBootstrapColor($scope->color) }};
                               background: transparent;">
                    {{ app()->getLocale() === 'ar' ? $scope->ar_title : $scope->en_title }}
                </button>
            @endforeach
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
                <div class="row" id="projectsContainer">
                    @foreach($projects as $project)
                        <div class="col-md-6 project-card" data-scope="{{ $project->scope_id }}">
                            <div class="card shadow-lg text-center">
                                @if($project->image)
                                    <img src="{{ asset('storage/' . $project->image) }}" class="card-img-top img-fluid" alt="{{ $project->en_name }}"
                                         style="height: 350px; object-fit: cover; border-radius: 10px 10px 0 0;">
                                @else
                                    <img src="https://via.placeholder.com/400x300?text=No+Image" class="card-img-top img-fluid">
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
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                        @if($project->image)
                                            <img src="{{ asset('storage/' . $project->image) }}" class="img-fluid rounded mb-3" style="max-height: 400px; object-fit: contain;">
                                        @else
                                            <img src="https://via.placeholder.com/600x400?text=No+Image" class="img-fluid rounded mb-3">
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

<!-- JavaScript for Filtering -->
<script>
    function filterProjects(scopeId) {
        // Remove active class from all buttons
        document.querySelectorAll('.scope-btn').forEach(btn => btn.classList.remove('active'));

        // Highlight the selected filter
        event.target.classList.add('active');

        // Show/Hide projects based on the selected scope
        document.querySelectorAll('.project-card').forEach(card => {
            if (scopeId === 'all' || card.getAttribute('data-scope') === scopeId) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }
</script>

<style>
    .scope-btn {
        padding: 10px 20px;
        border-radius: 20px;
        font-size: 1.2rem;
        background: transparent;
        transition: 0.3s;
    }

    .scope-btn.active {
        background: rgba(0, 0, 0, 0.1);
    }

    .project-card {
        margin-bottom: 30px;
    }
</style>

@endsection
