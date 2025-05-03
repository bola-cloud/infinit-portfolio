@extends('layouts.app')

@section('content')


    <div class="container-fluid m-0">
        <!-- Address Section -->
        <section class="address" style="background: linear-gradient(60deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset($settings->cover_image ?? 'https://www.qodra-egy.net/img/about/ab_4.jpg') }}'); background-size: cover; background-position: center;">
            <div class="container">
                <div class="col-lg-12 text-center">
                    <h3 class="address-h3">{{ __('lang.address_title') }}</h3>
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
                                <li class="active">&nbsp; {{ __('lang.breadcrumb_about') }}</li>
                            </ul>
                            <h2>{{ __('lang.page_header_about_us') }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="row d-flex justify-content-center align-items-center mb-4">
            <div class="col-md-6 text-center">
                <!-- Adjusted logo size -->
                <img src="{{ asset('img/461161.png') }}" alt="ICTC Logo" class="img-fluid" style="max-width: 200px; height: auto;">
            </div>
        </div>

        <!-- About ICTC Section -->
        <div class="row d-flex justify-content-center">
            <div class="col-md-9">
                <section id="about" class="about-section position-relative" style="padding: 60px 0; background-color: #f8f9fa;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 mx-auto">
                                <div class="text-justify mb-5">
                                    <h2 class="text-center" style="font-size: 2rem; font-weight: bold; color: #333; border-bottom: 2px solid #FFC857; display: inline-block; padding-bottom: 5px;">
                                        <strong>{{ __('lang.about_section_title') }}</strong>
                                    </h2>
                                    <p class="section-description" style="font-size: 1.2rem; line-height: 1.8; color: #555; margin-top: 20px;">
                                        {{ __('lang.about_section_description') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div id="nav-about" class="col-md-2 hidden-navigation d-flex align-items-center p-3 m-3 nav-border">
                <div class="btn-group-vertical w-100">
                    <button class="btn btn-outline-primary mb-2 scroll-btn" data-target="#about">{{ __('lang.nav_about') }}</button>
                    <button class="btn btn-outline-warning mb-2 scroll-btn" data-target="#vision-mission">{{ __('lang.nav_vision_mission') }}</button>
                    <button class="btn btn-outline-danger mb-2 scroll-btn" data-target="#core-values">{{ __('lang.nav_core_values') }}</button>
                    <button class="btn btn-outline-secondary mb-2 scroll-btn" data-target="#scope">{{ __('lang.nav_scope') }}</button>
                    <button class="btn btn-outline-info scroll-btn" data-target="#experience">{{ __('lang.nav_experience') }}</button>
                </div>
            </div>
        </div>

        <!-- Vision and Mission Section -->
        <div class="row d-flex justify-content-center">
            <div class="col-md-9">
                <section id="vision-mission" class="vision-mission-section position-relative" style="padding: 60px 0; background-color: #f8f9fa;">
                    <div class="container">
                        <div class="row align-items-center mb-5">
                        <!-- Vision -->
                        <div class="col-md-6">
                            <img src="https://aha-disc.co.uk/wp-content/uploads/2022/07/bigstock-Business-Technology-Internet-442835366.jpg" alt="{{ __('lang.vision_title') }}" class="img-fluid rounded shadow" style="height:280px;">
                        </div>
                        <div class="col-md-6">
                            <h4 class="section-title"><span style="color: #6a11cb;">{{ __('lang.vision_title') }}</span></h4>
                            <p class="section-description">
                               {{ __('lang.vision_description') }}
                            </p>
                        </div>
                        </div>
                        <div class="row align-items-center">
                        <!-- Mission -->
                        <div class="col-md-6 order-md-2">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQFnQGIjOPURt9sr00J3hya7KnL0O_U7hjLog&s" alt="{{ __('lang.mission_title') }}" class="img-fluid rounded shadow" style="height:280px;">
                        </div>
                        <div class="col-md-6 order-md-1">
                            <h4 class="section-title"><span style="color: #2575fc;">{{ __('lang.mission_title') }}</span></h4>
                            <p class="section-description">
                                {{ __('lang.mission_description') }}
                            </p>
                        </div>
                        </div>
                    </div>
                </section>
            </div>
            <div id="nav-vision-mission" class="col-md-2 hidden-navigation d-flex align-items-center p-3 m-3 nav-border">
                <div class="btn-group-vertical w-100">
                    <button class="btn btn-outline-primary mb-2 scroll-btn" data-target="#about">{{ __('lang.nav_about') }}</button>
                    <button class="btn btn-outline-warning mb-2 scroll-btn" data-target="#vision-mission">{{ __('lang.nav_vision_mission') }}</button>
                    <button class="btn btn-outline-danger mb-2 scroll-btn" data-target="#core-values">{{ __('lang.nav_core_values') }}</button>
                    <button class="btn btn-outline-secondary mb-2 scroll-btn" data-target="#scope">{{ __('lang.nav_scope') }}</button>
                    <button class="btn btn-outline-info scroll-btn" data-target="#experience">{{ __('lang.nav_experience') }}</button>
                </div>
            </div>
        </div>

        <!-- Core Values Section -->
        <div class="row d-flex justify-content-center">
            <div class="col-md-9">
                <section id="core-values" class="core-values-section" style="padding: 60px 0; background-color: #f8f9fa;">
                <div class="container">
                    <div class="text-center mb-5">
                    <h3 style="font-size: 2.5rem; font-weight: bold; color: #333;">
                        <strong>{{ __('lang.core_values_title') }}</strong>
                    </h3>
                    <p style="font-size: 1.1rem; color: #666;">
                        {{ __('lang.core_values_subtitle') }}
                    </p>
                    </div>
                    <div class="row g-4">
                    @foreach (__('lang.core_values') as $value)
                    <div class="col-md-4">
                        <div class="card text-center shadow-sm p-4 h-100" style="border-radius: 15px; background-color: #fff;">
                        <div class="icon mb-3" style="font-size: 3rem; color: {{ $value['color'] }};">
                            <i class="{{ $value['icon'] }}"></i>
                        </div>
                        <h5 class="fw-bold" style="color: #333;">{{ $value['title'] }}</h5>
                        </div>
                    </div>
                    @endforeach
                    </div>
                </div>
                </section>
            </div>
            <div id="nav-core-values" class="col-md-2 hidden-navigation d-flex align-items-center p-3 m-3 nav-border">
                <div class="btn-group-vertical w-100">
                    <button class="btn btn-outline-primary mb-2 scroll-btn" data-target="#about">{{ __('lang.nav_about') }}</button>
                    <button class="btn btn-outline-warning mb-2 scroll-btn" data-target="#vision-mission">{{ __('lang.nav_vision_mission') }}</button>
                    <button class="btn btn-outline-danger mb-2 scroll-btn" data-target="#core-values">{{ __('lang.nav_core_values') }}</button>
                    <button class="btn btn-outline-secondary mb-2 scroll-btn" data-target="#scope">{{ __('lang.nav_scope') }}</button>
                    <button class="btn btn-outline-info scroll-btn" data-target="#experience">{{ __('lang.nav_experience') }}</button>
                </div>
            </div>
        </div>

        <!-- Scope of Work Section -->
        <div class="row d-flex justify-content-center">
            <div class="col-md-9">
                <section id="scope" class="scope-section" style="padding: 60px 0; background-color: #fff;">
                    <div class="container">
                        <div class="text-center mb-5">
                            <h3 style="font-size: 2.5rem; font-weight: bold; color: #333;">
                                <strong>{{ __('lang.scope_title') }}</strong>
                            </h3>
                            <p style="font-size: 1.1rem; color: #666;">
                                {{ __('lang.scope_subtitle') }}
                            </p>
                        </div>
                        <div class="row g-4">
                            @foreach ($scopes as $scope)
                                <div class="col-md-6 col-lg-3">
                                    <div class="card text-center shadow-sm p-4 h-100" style="border-radius: 15px; background-color: #fff;">
                                        <div class="icon mb-3 text-{{ $scope->color }}" style="font-size: 3.5rem;">
                                            <i class="{{ $scope->icon }}"></i>
                                        </div>
                                        <h5 class="fw-bold" style="color: #333;">{{ $scope->title }}</h5>
                                        <p style="font-size: 1rem; color: #666;">{{ $scope->description }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>

            <!-- Navigation Sidebar -->
            <div id="nav-scope" class="col-md-2 hidden-navigation d-flex align-items-center p-3 m-3 nav-border">
                <div class="btn-group-vertical w-100">
                    <button class="btn btn-outline-primary mb-2 scroll-btn" data-target="#about">{{ __('lang.nav_about') }}</button>
                    <button class="btn btn-outline-warning mb-2 scroll-btn" data-target="#vision-mission">{{ __('lang.nav_vision_mission') }}</button>
                    <button class="btn btn-outline-danger mb-2 scroll-btn" data-target="#core-values">{{ __('lang.nav_core_values') }}</button>
                    <button class="btn btn-outline-secondary mb-2 scroll-btn" data-target="#scope">{{ __('lang.nav_scope') }}</button>
                    <button class="btn btn-outline-info scroll-btn" data-target="#experience">{{ __('lang.nav_experience') }}</button>
                </div>
            </div>
        </div>

        <!-- Experience Section -->
        <div class="row d-flex justify-content-center">
            <div class="col-md-9">
                <section id="experience" class="experience-section" style="padding: 60px 0; background-color: #fff;">
                <div class="container">
                    <div class="text-center mb-5">
                    <h3 style="font-size: 2.5rem; font-weight: bold; color: #333;">
                        <strong>{{ __('lang.experience_title') }}</strong>
                    </h3>
                    <p style="font-size: 1.1rem; color: #666;">
                        {{ __('lang.experience_subtitle') }}
                    </p>
                    </div>
                    <div class="row g-4">
                    @foreach (__('lang.experience_items') as $experience)
                    <div class="col-md-6 col-lg-3">
                        <div class="card text-center shadow-sm p-4 h-100 experience-card" style="border-radius: 15px; background-color: #fff; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                            <div class="icon mb-3" style="font-size: 3.5rem; color: {{ $experience['color'] }};">
                                <i class="{{ $experience['icon'] }}"></i>
                            </div>
                            <h5 class="fw-bold" style="color: #333;">{{ $experience['title'] }}</h5>
                            <p style="font-size: 1rem; color: #666;">{{ $experience['description'] }}</p>
                        </div>
                    </div>
                    @endforeach
                    </div>
                </div>
                </section>
            </div>
            <div id="nav-experience" class="col-md-2 hidden-navigation d-flex align-items-center p-3 m-3 nav-border">
                <div class="btn-group-vertical w-100">
                    <button class="btn btn-outline-primary mb-2 scroll-btn" data-target="#about">{{ __('lang.nav_about') }}</button>
                    <button class="btn btn-outline-warning mb-2 scroll-btn" data-target="#vision-mission">{{ __('lang.nav_vision_mission') }}</button>
                    <button class="btn btn-outline-danger mb-2 scroll-btn" data-target="#core-values">{{ __('lang.nav_core_values') }}</button>
                    <button class="btn btn-outline-secondary mb-2 scroll-btn" data-target="#scope">{{ __('lang.nav_scope') }}</button>
                    <button class="btn btn-outline-info scroll-btn" data-target="#experience">{{ __('lang.nav_experience') }}</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
    document.addEventListener("DOMContentLoaded", () => {
        const scrollButtons = document.querySelectorAll('.scroll-btn'); // All buttons
        const navigationSections = {
        'about': document.getElementById('nav-about'),
        'vision-mission': document.getElementById('nav-vision-mission'),
        'core-values': document.getElementById('nav-core-values'),
        'scope': document.getElementById('nav-scope'),
        'experience': document.getElementById('nav-experience')
        }; // Unique navigation containers
        const sections = document.querySelectorAll('section'); // All sections with IDs

        // Smooth scrolling for navigation buttons
        scrollButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            const target = document.querySelector(button.dataset.target);
            if (target) {
            window.scrollTo({
                top: target.offsetTop - 50, // Adjust for fixed header
                behavior: 'smooth'
            });
            }
        });
        });

        // Scroll event listener to handle navigation visibility and active state
        window.addEventListener('scroll', () => {
        let currentSectionId = null;

        // Detect the section currently in the viewport
        sections.forEach(section => {
            const sectionTop = section.offsetTop; // Top of the section
            const sectionHeight = section.offsetHeight; // Height of the section
            const sectionBottom = sectionTop + sectionHeight; // Bottom of the section
            const currentScroll = window.scrollY + window.innerHeight / 2; // Midpoint of the viewport

            if (currentScroll >= sectionTop && currentScroll <= sectionBottom) {
            currentSectionId = section.id; // Get the section ID
            }
        });

        // Show the navigation for the current section and hide others
        Object.keys(navigationSections).forEach(sectionId => {
            if (sectionId === currentSectionId) {
            navigationSections[sectionId].classList.add('visible-navigation');
            navigationSections[sectionId].classList.remove('hidden-navigation');
            } else {
            navigationSections[sectionId].classList.add('hidden-navigation');
            navigationSections[sectionId].classList.remove('visible-navigation');
            }
        });

        // Mark the corresponding button as active
        if (currentSectionId !== null) {
            scrollButtons.forEach(button => {
            if (button.dataset.target === `#${currentSectionId}`) {
                button.classList.add('active'); // Highlight active button
            } else {
                button.classList.remove('active'); // Remove highlight from inactive buttons
            }
            });
        }
        });
    });
    </script>
@endpush
