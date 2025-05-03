@extends('layouts.app')

@section('content')

<!-- Address Section -->
<section class="address" style="background: linear-gradient(60deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset($settings->cover_image ?? 'https://www.qodra-egy.net/img/about/ab_4.jpg') }}'); background-size: cover; background-position: center;">
    <div class="container">
        <div class="col-lg-12 text-center">
            <h3 class="address-h3">
                {{ __('lang.partners_heading') }}
            </h3>
        </div>
    </div>
</section>

<section class="partners-section">
    <div class="container">
        <!-- Title -->
        <div class="text-center mb-4">
            <h3 class="title">
                {{ __('lang.partners_section_title') }} <strong>{{ __('lang.partners_section_strong') }}</strong>
            </h3>
        </div>

        <!-- Dynamic Partners Section -->
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-12 mb-5">
                    <h4 class="category-title text-center mb-3">
                        {{ app()->getLocale() === 'ar' ? $category->ar_name : $category->en_name }}
                    </h4>
                    <div class="row">
                        @foreach ($category->partners as $partner)
                            <div class="col-md-3 col-sm-6 mb-4">
                                <div class="card">
                                    <img src="{{ asset($partner->image_path) }}" class="card-img-top" alt="Partner">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
