@extends('layouts.app')

@section('content')

<!-- Page Header -->
<section class="page-header address" style="background: linear-gradient(60deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset($settings->cover_image ?? 'https://www.qodra-egy.net/img/about/ab_4.jpg') }}'); background-size: cover; background-position: center;">
  <div class="container text-center">
    <h3 class="address-h3" style="font-size: 2.5rem; font-weight: bold;">
      {{ __('lang.contact_us_title') }}
    </h3>
    <p style="font-size: 1.2rem; margin-top: 10px;">
      {{ __('lang.contact_us_subtitle') }}
    </p>
  </div>
</section>

<!-- Contact Information Section -->
<section id="contact-info" class="contact-info-section" style="padding: 60px 0; background-color: #f8f9fa;">
  <div class="container">
    <div class="text-center mb-5">
      <h3 style="font-size: 2.5rem; font-weight: bold; color: #333;">
        {{ __('lang.contact_info_title') }}
      </h3>
      <p style="font-size: 1.1rem; color: #666;">
        {{ __('lang.contact_info_subtitle') }}
      </p>
    </div>
    <div class="row g-4">
        <!-- Address Card -->
        <div class="col-md-6 col-lg-3">
        <div class="card text-center shadow-sm p-4 h-100" style="border-radius: 15px; background-color: #fff;">
            <div class="icon mb-3" style="font-size: 3rem; color: #007bff;">
            <i class="fa fa-map-marker-alt"></i>
            </div>
            <h5 class="fw-bold" style="color: #333;">{{ __('lang.contact_address_title') }}</h5>
            <p style="font-size: 1rem; color: #666;">{{ __('lang.contact_address_description') }}</p>
        </div>
        </div>

        <!-- Phone Card -->
        <div class="col-md-6 col-lg-3">
            <div class="card text-center shadow-sm p-4 h-100" style="border-radius: 15px; background-color: #fff;">
            <div class="icon mb-3" style="font-size: 3rem; color: #28a745;">
                <i class="fa fa-phone"></i>
            </div>
            <h5 class="fw-bold" style="color: #333;">{{ __('lang.contact_phone_title') }}</h5>
            <p style="font-size: 1rem; color: #666;">
                <a href="tel:+971557474526" style="color: inherit; text-decoration: none;">{{ __('lang.contact_phone_description') }}</a>
            </p>
            </div>
        </div>

        <!-- Email Card -->
        <div class="col-md-6 col-lg-3">
            <div class="card text-center shadow-sm p-4 h-100" style="border-radius: 15px; background-color: #fff;">
            <div class="icon mb-3" style="font-size: 3rem; color: #ffc107;">
                <i class="fa fa-envelope"></i>
            </div>
            <h5 class="fw-bold" style="color: #333;">{{ __('lang.contact_email_title') }}</h5>
            <p style="font-size: 1rem; color: #666;">
                <a href="mailto:info@infinitsmart.com" style="color: inherit; text-decoration: none;">{{ __('lang.contact_email_description') }}</a>
            </p>
            </div>
        </div>

        <!-- Website Card -->
        <div class="col-md-6 col-lg-3">
            <div class="card text-center shadow-sm p-4 h-100" style="border-radius: 15px; background-color: #fff;">
            <div class="icon mb-3" style="font-size: 3rem; color: #17a2b8;">
                <i class="fa fa-globe"></i>
            </div>
            <h5 class="fw-bold" style="color: #333;">{{ __('lang.contact_website_title') }}</h5>
            <p style="font-size: 1rem; color: #666;">
                <a href="https://infinitsmart.com" target="_blank" style="color: inherit; text-decoration: none;">{{ __('lang.contact_website_description') }}</a>
            </p>
            </div>
        </div>

    </div>
  </div>
</section>

<!-- Contact Form Section -->
<section id="contact-form" class="contact-form-section" style="padding: 60px 0; background-color: #fff;">
  <div class="container">
    <div class="row">
        <!-- Contact Form -->
        <div class="col-md-6">
            <div class="contact-form bg-white shadow p-4 rounded" style="border-radius: 15px;">
                <h3 style="font-size: 1.8rem; font-weight: bold; color: #333; margin-bottom: 20px;">
                    {{ __('lang.contact_form_title') }}
                </h3>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('messages.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label" style="font-weight: bold; color: #666;">
                            {{ __('lang.contact_form_name_label') }}
                        </label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="{{ __('lang.contact_form_name_placeholder') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label" style="font-weight: bold; color: #666;">
                            {{ __('lang.contact_form_email_label') }}
                        </label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="{{ __('lang.contact_form_email_placeholder') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label" style="font-weight: bold; color: #666;">
                            {{ __('lang.contact_form_message_label') }}
                        </label>
                        <textarea name="message" id="message" class="form-control" rows="5" placeholder="{{ __('lang.contact_form_message_placeholder') }}" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100" style="background: linear-gradient(135deg, #007bff, #6a11cb); border: none; padding: 10px 20px; font-weight: bold;">
                        {{ __('lang.contact_form_button') }}
                    </button>
                </form>
            </div>
        </div>

        <!-- Google Map -->
        <div class="col-md-6">
            <div class="map-container" style="height: 400px; border-radius: 15px; overflow: hidden;">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3454.1844922525826!2d31.246182375361044!3d30.039741618192455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1458412a8e0c46c5%3A0x7a5e5ef0e87bb0df!2z2YXYr9mK2YUg2KfZhNmF2K_Ys9mK2Kkg2YbYp9iv2Yog2KfZhNix2YrYp9ivINin2YTYs9mI2Yog2KfZhNis2K_ZiNmE!5e0!3m2!1sar!2seg!4v1715083600000"
                width="100%"
                height="100%"
                frameborder="0"
                style="border:0;"
                allowfullscreen
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
            </div>
        </div>
    </div>
  </div>
</section>

@endsection
