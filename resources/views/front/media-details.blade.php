@extends('layouts.app')

@section('content')

    <section class="address" style="background: linear-gradient(60deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset($settings->cover_image ?? 'https://www.qodra-egy.net/img/about/ab_4.jpg') }}'); background-size: cover; background-position: center;">
        <div class="container">
            <div class="col-lg-12 text-center">
                <h3 class="address-h3">
                    {{ __('lang.gallery_section_title') }}
                </h3>
            </div>
        </div>
    </section>

    <svg class="d-none" xmlns="http://www.w3.org/2000/svg">
    <symbol id="enlarge" viewBox="0 0 16 16">
        <path d="M1.5 1a.5.5 0 0 0-.5.5v4a.5.5 0 0 1-1 0v-4A1.5 1.5 0 0 1 1.5 0h4a.5.5 0 0 1 0 1h-4zM10 .5a.5.5 0 0 1 .5-.5h4A1.5 1.5 0 0 1 16 1.5v4a.5.5 0 0 1-1 0v-4a.5.5 0 0 0-.5-.5h-4a.5.5 0 0 1-.5-.5zM.5 10a.5.5 0 0 1 .5.5v4a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 0 14.5v-4a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v4a1.5 1.5 0 0 1-1.5 1.5h-4a.5.5 0 0 1 0-1h4a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 1 .5-.5z"/>
    </symbol>
    </svg>

    <!-- Page Header -->
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner-heading">
                        <ul class="breadcrumb">
                            <li><a href="{{ route('home') }}">{{ __('lang.breadcrumb_home') }}</a> <i class="icon-angle-right"></i></li>
                            <li class="active"> &nbsp; {{ __('lang.breadcrumb_photos_gallery') }} <i class="icon-angle-right"></i></li>

                            @if (!empty($images) && isset($images[0]) && $images[0]->gallery)
                                <li class="active">
                                    {{ app()->getLocale() === 'ar' ? $images[0]->gallery->ar_title : $images[0]->gallery->en_title }}
                                </li>
                            @else
                                <li class="active text-muted">{{ __('lang.no_gallery_found') }}</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="text-center mb-5 mt-3">
        <h2 style="font-size: 2.5rem; font-weight: bold; color: #333;">
            {{ __('lang.photos_gallery_title') }} <strong>{{ __('lang.photos_gallery_title_strong') }}</strong>
        </h2>
    </div>
    <!-- Gallery Section -->
    <section class="photo-gallery">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 gallery-grid">
                @forelse ($images as $index => $image)
                    <div class="col">
                        <div class="card gallery-card position-relative">
                            <a href="#" data-index="{{ $index }}" class="gallery-item" data-bs-toggle="modal" data-bs-target="#lightbox-modal">
                                <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ __('lang.news_title') }}">
                            </a>
                            <div class="card-body text-center">
                                <h5 class="card-title">
                                    {{ app()->getLocale() === 'ar' ? $image->ar_subtitle : $image->en_subtitle }}
                                </h5>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">{{ __('lang.no_images_available') }}</p>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Lightbox Modal -->
    <div class="modal fade" id="lightbox-modal" tabindex="-1" aria-labelledby="lightboxLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body p-0">
                    <!-- Swiper -->
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach ($images as $image)
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/' . $image->image_path) }}" class="img-fluid"
                                     alt="{{ $image->ar_subtitle }}" style="max-height: unset !important;">
                                    <div class="text-center mt-2">
                                        <h5>{{ app()->getLocale() === 'ar' ? $image->ar_subtitle : $image->en_subtitle }}</h5>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- Swiper navigation -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
