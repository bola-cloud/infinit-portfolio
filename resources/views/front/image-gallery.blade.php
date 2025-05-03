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
                            <li>
                                <a href="{{ route('home') }}">{{ __('lang.breadcrumb_home') }}</a>
                                <i class="icon-angle-right"></i>
                            </li>
                            <li class="active">
                                &nbsp; {{ __('lang.breadcrumb_photos_gallery') }}
                            </li>
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


    <section class="photo-gallery">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 gallery-grid">
                @forelse ($galleries as $gallery)
                    <div class="col">
                        <div class="card gallery-card position-relative">
                            <a href="{{ route('media-details', $gallery->id) }}">
                                @if ($gallery->featuredImage)
                                    <img src="{{ asset('storage/' . $gallery->featuredImage->image_path) }}" class="card-img-top" alt="{{ __('lang.news_title') }}">
                                @else
                                    <img src="https://via.placeholder.com/480x320?text=No+Image" class="card-img-top" alt="No Image Available">
                                @endif
                                <span class="image-counter badge">{{ $gallery->images()->count() }}</span>
                            </a>
                            <div class="card-body text-center">
                                <h5 class="card-title">
                                    {{ app()->getLocale() === 'ar' ? $gallery->ar_title : $gallery->en_title }}
                                </h5>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">{{ __('lang.no_galleries_found') }}</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

@endsection
