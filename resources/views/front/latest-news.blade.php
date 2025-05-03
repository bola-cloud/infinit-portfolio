@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <!-- Address Section -->
        <section class="address" style="background: linear-gradient(60deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset($settings->cover_image ?? 'https://www.qodra-egy.net/img/about/ab_4.jpg') }}'); background-size: cover; background-position: center;">
            <div class="container">
                <div class="col-lg-12 text-center">
                    <h3 class="address-h3">{{ __('lang.latest_news') }}</h3>
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
                                <li class="active">&nbsp; {{ __('lang.latest_news') }}</li>
                            </ul>
                            <h2 class="mt-3">{{ __('lang.latest_news') }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- News Section -->
        <section class="news-section py-5">
            <div class="container">
                <!-- Section Title -->
                <div class="row">
                    <div class="col-12 text-center mb-4">
                        <h2 style="font-size: 2.5rem; font-weight: bold; color: #333;">
                            {{ __('lang.latest_news_title') }} <strong>{{ __('lang.latest_news_title_strong') }}</strong>
                        </h2>
                    </div>
                </div>

                <!-- News Cards -->
                <div class="row justify-content-center">
                    @forelse ($news as $item)
                        <div class="col-lg-6 col-md-6 mb-4 d-flex align-items-stretch mt-3">
                            <div class="card news-card p-2 shadow-sm">
                                <div class="news-images">
                                    <img src="{{ asset('storage/' . $item->image1_path) }}" alt="{{ $item->ar_title }}" style="width: 100%; height: 300px; object-fit: cover; margin-bottom: 10px;">
                                    {{-- @if ($item->image2_path)
                                        <img src="{{ asset('storage/' . $item->image2_path) }}" alt="{{ $item->ar_title }}" style="width: 100%; height: 200px; object-fit: cover;">
                                    @endif --}}
                                </div>
                                <div class="card-body news-card-body">
                                    <h3 class="news-card-title" style="font-size: 1.5rem; font-weight: bold; color: #333;">
                                        <strong>{{ app()->getLocale() === 'ar' ? $item->ar_title : $item->en_title }}</strong>
                                    </h3>
                                    <p class="news-card-text" style="font-size: 1rem; color: #555;">
                                        {{ app()->getLocale() === 'ar' ? $item->ar_subtitle : $item->en_subtitle }}
                                    </p>
                                    <a href="{{ route('news-details', ['id' => $item->id]) }}" class="news-read-more" style="color: #007bff; text-decoration: none; font-weight: bold;">
                                        {{ __('lang.read_more') }} &raquo;
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <p class="text-muted">{{ __('lang.no_news_available') }}</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

    </div>
@endsection
