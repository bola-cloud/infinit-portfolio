<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <title>ICTC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Your page description here" />
    <meta name="author" content="" />

    <!-- css -->
    <link href="https://fonts.googleapis.com/css?family=Handlee|Open+Sans:300,400,600,700,800" rel="stylesheet">
    {{-- <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{asset('css/bootstrap-responsive.css')}}" rel="stylesheet" /> --}}
    <link href="{{asset('css/flexslider.css')}}" rel="stylesheet" />
    <link href="{{asset('css/prettyPhoto.css')}}" rel="stylesheet" />
    <link href="{{asset('css/camera.css')}}" rel="stylesheet" />
    <link href="{{asset('css/jquery.bxslider.css')}}" rel="stylesheet" />
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <!-- Theme skin -->
    <link href="{{asset('color/default.css')}}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('ico/apple-touch-icon-144-precomposed.png')}}" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('ico/apple-touch-icon-114-precomposed.png')}}" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('ico/apple-touch-icon-72-precomposed.png')}}" />
    <link rel="apple-touch-icon-precomposed" href="{{asset('ico/apple-touch-icon-57-precomposed.png')}}" />
    <link rel="shortcut icon" href="{{asset('img/ictc.jpeg')}}" />
    <!-- Add Google Fonts -->
    @if(app()->getLocale() === 'ar')
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600&display=swap" rel="stylesheet">
    @else
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    @endif

    <style>
        body {
            font-family: {{ app()->getLocale() === 'ar' ? "'Tajawal', sans-serif" : "'Roboto', sans-serif" }};
            direction: {{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }};
            text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }};
            font-size: {{ app()->getLocale() === 'ar' ? '1.1rem' : '1rem' }};
        }

        h1, h2, h3, h4, h5, h6 {
            font-weight: {{ app()->getLocale() === 'ar' ? '700' : '500' }};
            letter-spacing: {{ app()->getLocale() === 'ar' ? '0.5px' : 'normal' }};
            word-spacing: {{ app()->getLocale() === 'ar' ? '2px' : 'normal' }};
            font-size: {{ app()->getLocale() === 'ar' ? '1.2em' : '1em' }};
        }

        p {
            font-weight: {{ app()->getLocale() === 'ar' ? '500' : '400' }};
            letter-spacing: {{ app()->getLocale() === 'ar' ? '0.5px' : 'normal' }};
            line-height: 1.8;
            word-spacing: {{ app()->getLocale() === 'ar' ? '1.5px' : 'normal' }};
            font-size: {{ app()->getLocale() === 'ar' ? '1.05rem' : '1rem' }};
        }
    </style>

</head>

<body>

    <div id="wrapper">
        <!-- start header -->
        <header>
            <div class="container">
                <div class="row nomargin">
                    <div class="col-md-3 d-flex justify-content-center">
                        <div class="logo">
                            <a href="{{ route('home') }}" class="d-flex">
                                <img src="{{ asset($settings->logo ?? 'img/white logo.png') }}" alt="Logo" style="max-height: 60px;">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-8 d-none d-md-flex">
                        <!-- Regular Navigation (Visible on Desktop) -->
                        <div class="navbar navbar-static-top navigation">
                            <nav>
                                <ul class="nav topnav" style="display: flex; gap: 10px; list-style: none; padding: 0; margin: 0;">
                                    {{-- <li class="dropdown {{ request()->routeIs('home') ? 'active' : '' }}">
                                        <a href="{{ route('home') }}" class="nav-btn {{ request()->routeIs('home') ? 'btn-highlight' : '' }}">
                                            <i class="icon-home"></i> {{ __('lang.home') }}
                                        </a>
                                    </li> --}}
                                    <li class="dropdown {{ request()->routeIs('about') ? 'active' : '' }}">
                                        <a href="{{ route('about') }}" class="nav-btn {{ request()->routeIs('about') ? 'btn-highlight' : '' }}">
                                            {{ __('lang.about') }}
                                        </a>
                                    </li>
                                    <li class="dropdown {{ request()->routeIs('services') ? 'active' : '' }}">
                                        <a href="{{ route('services') }}" class="nav-btn {{ request()->routeIs('services') ? 'btn-highlight' : '' }}">
                                            {{ __('lang.services') }}
                                        </a>
                                    </li>
                                    <li class="dropdown {{ request()->routeIs('all-projects') ? 'active' : '' }}">
                                        <a href="{{ route('all-projects') }}" class="nav-btn {{ request()->routeIs('all-projects') ? 'btn-highlight' : '' }}">
                                            {{ __('lang.projects') }}
                                        </a>
                                    </li>
                                    <li class="dropdown {{ request()->routeIs(['image-gallery', 'video-gallery','latest.news']) ? 'active' : '' }}">
                                        <a href="#" class="nav-btn">{{ __('lang.media') }} <i class="icon-angle-down"></i></a>
                                        <ul class="dropdown-menu" style="top: 60% !important;">
                                            <li><a href="{{ route('image-gallery') }}">{{ __('lang.photos_gallery') }}</a></li>
                                            <li><a href="{{ route('video-gallery') }}">{{ __('lang.videos_gallery') }}</a></li>
                                            <li><a href="{{ route('latest.news') }}">{{ __('lang.latest_news') }}</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown {{ request()->routeIs('partners') ? 'active' : '' }}">
                                        <a href="{{ route('partners') }}" class="nav-btn">{{ __('lang.partners') }}</a>
                                    </li>
                                    <li class="dropdown {{ request()->routeIs('contact') ? 'active' : '' }}">
                                        <a href="{{ route('contact') }}" class="nav-btn">{{ __('lang.contact') }}</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <div class="col-md-1 d-flex align-items-center justify-content-end lang">
                        <!-- Language Dropdown -->
                        <div class="dropdown">
                            <button
                                class="btn btn-light dropdown-toggle p-2"
                                type="button"
                                id="languageDropdown"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                                style="border-radius: 12px; min-width: 80px;"
                            >
                                <i class="fa-solid fa-globe"></i>
                                {{ App::getLocale() == 'ar' ? 'AR' : 'EN' }}
                            </button>
                            <ul
                                class="dropdown-menu dropdown-menu-end custom-dropdown"
                                aria-labelledby="languageDropdown"
                            >
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="{{ LaravelLocalization::getLocalizedURL('en') }}"
                                    >
                                        English
                                    </a>
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="{{ LaravelLocalization::getLocalizedURL('ar') }}"
                                    >
                                        العربية
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Hamburger Menu for Mobile -->
                    <div class="col-md-1 d-flex align-items-center justify-content-end d-md-none">
                        <div class="hamburger-menu">
                            <button class="hamburger-btn">
                                <i class="fa fa-bars"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Side Navigation (Visible on Mobile) -->
            <div class="side-nav">
                <nav>
                    <ul class="nav topnav">
                        {{-- <li class="dropdown {{ request()->routeIs('home') ? 'active' : '' }}">
                            <a href="{{ route('home') }}">{{ __('lang.home') }}</a>
                        </li> --}}
                        <li class="dropdown {{ request()->routeIs('about') ? 'active' : '' }}">
                            <a href="{{ route('about') }}">{{ __('lang.about') }}</a>
                        </li>
                        <li class="dropdown {{ request()->routeIs('services') ? 'active' : '' }}">
                            <a href="{{ route('services') }}">{{ __('lang.services') }}</a>
                        </li>
                        <li class="dropdown {{ request()->routeIs('all-projects') ? 'active' : '' }}">
                            <a href="{{ route('all-projects') }}">{{ __('lang.projects') }}</a>
                        </li>
                        <li class="dropdown {{ request()->routeIs(['image-gallery', 'video-gallery','latest.news']) ? 'active' : '' }}">
                            <a href="#" class="nav-btn">{{ __('lang.media') }} <i class="icon-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('image-gallery') }}">{{ __('lang.photos_gallery') }}</a></li>
                                <li><a href="{{ route('video-gallery') }}">{{ __('lang.videos_gallery') }}</a></li>
                                <li><a href="{{ route('latest.news') }}">{{ __('lang.latest_news') }}</a></li>
                            </ul>
                        </li>
                        <li class="dropdown {{ request()->routeIs('partners') ? 'active' : '' }}">
                            <a href="{{ route('partners') }}">{{ __('lang.partners') }}</a>
                        </li>
                        <li class="dropdown {{ request()->routeIs('contact') ? 'active' : '' }}">
                            <a href="{{ route('contact') }}">{{ __('lang.contact') }}</a>
                        </li>
                        <div>
                            <!-- Language Dropdown -->
                            <div class="dropdown">
                                <button class="btn btn-light dropdown-toggle p-2" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-globe"></i> {{ App::getLocale() == 'ar' ? 'AR' : 'EN' }}
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown" style="border-radius: 12px; min-width: 100px;">
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{ LaravelLocalization::getLocalizedURL('en') }}"
                                        >
                                            English
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{ LaravelLocalization::getLocalizedURL('ar') }}"
                                        >
                                            العربية
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </ul>
                </nav>
            </div>
        </header>

        <!-- end header -->
        <div class="spinner-overlay" id="loadingSpinner">
            <div class="grow-pulse"></div>
        </div>
        <div>
            @yield('content')
        </div>
        <div class="share-container">
            <!-- Share Icon -->
            <button class="share__button">
                <i class="fa-solid fa-share-nodes"></i>
            </button>

            <!-- Social Icons -->
            <ul class="share__icons">
                <!-- Facebook -->
                <li style="--rotate: -18deg;">
                    <a href="{{ !empty($settings->facebook) ? $settings->facebook : '#' }}" target="_blank" style="background-color: #1877F2;">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                </li>

                <!-- LinkedIn -->
                <li style="--rotate: 27deg;">
                    <a href="{{ !empty($settings->linkedin) ? $settings->linkedin : '#' }}" target="_blank" style="background-color: #0077b5;">
                        <i class="fa-brands fa-linkedin"></i>
                    </a>
                </li>

                <!-- WhatsApp -->
                <li style="--rotate: 72deg;">
                    <a href="{{ !empty($settings->whatsapp) ? 'https://wa.me/' . $settings->whatsapp : '#' }}" target="_blank" style="background-color: #25D366;">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                </li>

                <!-- YouTube -->
                <li style="--rotate: 117deg;">
                    <a href="{{ !empty($settings->youtube) ? $settings->youtube : '#' }}" target="_blank" style="background-color: #FF0000;">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                </li>
            </ul>
        </div>


        <footer style="background-color:#1a2333; color: #fff; padding: 40px 0;">
            <div class="container">
                <div class="row d-flex justify-content-between align-items-center">

                    <!-- Left Column: Logo and Description -->
                    <div class="col-md-4">
                        <div>
                            <a href="{{route('dashboard')}}">
                                <img src="{{ asset($settings->logo ?? 'img/white logo.png') }}" alt="Logo" style="max-height: 60px; margin-bottom: 15px;">
                            </a>
                            <p style="margin: 0;">
                                {{ __('lang.company_name') }}
                            </p>
                        </div>
                    </div>

                    <!-- Center Column: Useful Links -->
                    {{-- <div class="col-md-4">
                        <h5 style="color: #fff; font-weight: bold;">{{ __('lang.useful_links') }}</h5>
                        <div style="display: flex; flex-wrap: wrap; gap: 10px;">
                            <a href="{{ route('about') }}"
                                style="color: #fff; background-color: {{ Request::routeIs('about') ? '#0d6efd' : '#2f2f2f' }}; border-radius: 20px; padding: 5px 15px; text-decoration: none;">
                                {{ __('lang.about_us') }}
                            </a>
                            <a href="{{ route('services') }}"
                                style="color: #fff; background-color: {{ Request::routeIs('services') ? '#0d6efd' : '#2f2f2f' }}; border-radius: 20px; padding: 5px 15px; text-decoration: none;">
                                {{ __('lang.working_area') }}
                            </a>
                            <a href="{{ route('partners') }}"
                                style="color: #fff; background-color: {{ Request::routeIs('partners') ? '#0d6efd' : '#2f2f2f' }}; border-radius: 20px; padding: 5px 15px; text-decoration: none;">
                                {{ __('lang.partners') }}
                            </a>
                            <a href="{{ route('image-gallery') }}"
                                style="color: #fff; background-color: {{ Request::routeIs('image-gallery') ? '#0d6efd' : '#2f2f2f' }}; border-radius: 20px; padding: 5px 15px; text-decoration: none;">
                                {{ __('lang.photos_gallery') }}
                            </a>
                            <a href="{{ route('all-projects') }}"
                                style="color: #fff; background-color: {{ Request::routeIs('all-projects') ? '#0d6efd' : '#2f2f2f' }}; border-radius: 20px; padding: 5px 15px; text-decoration: none;">
                                {{ __('lang.projects') }}
                            </a>
                            <a href="{{ route('video-gallery') }}"
                                style="color: #fff; background-color: {{ Request::routeIs('video-gallery') ? '#0d6efd' : '#2f2f2f' }}; border-radius: 20px; padding: 5px 15px; text-decoration: none;">
                                {{ __('lang.videos_gallery') }}
                            </a>
                            <a href="{{ route('latest.news') }}"
                                style="color: #fff; background-color: {{ Request::routeIs('latest.news') ? '#0d6efd' : '#2f2f2f' }}; border-radius: 20px; padding: 5px 15px; text-decoration: none;">
                                {{ __('lang.latest_news') }}
                            </a>
                            <a href="{{ route('contact') }}"
                                style="color: #fff; background-color: {{ Request::routeIs('contact') ? '#0d6efd' : '#2f2f2f' }}; border-radius: 20px; padding: 5px 15px; text-decoration: none;">
                                {{ __('lang.contact_us') }}
                            </a>
                        </div>
                    </div> --}}

                    <!-- Right Column: Contact Info -->
                    <div class="col-md-4">
                        <h5 style="color: #fff; font-weight: bold;">{{ __('lang.contact') }}</h5>
                        <p>
                            <i class="fa fa-phone"></i> {{ __('lang.support') }}&nbsp; :&nbsp; 020000000<br>
                            <i class="fa fa-envelope"></i> {{ __('lang.email') }}&nbsp; : &nbsp;contact@ictc-egy.com
                        </p>
                        <div style="display: flex; gap: 10px;">
                            <!-- Facebook -->
                            <a href="{{ !empty($settings->facebook) ? $settings->facebook : '#' }}" target="_blank"
                                style="color: #fff; background-color: #2f2f2f; border-radius: 50%; width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;">
                                <i class="fa-brands fa-facebook"></i>
                            </a>

                            <!-- WhatsApp -->
                            <a href="{{ !empty($settings->whatsapp) ? 'https://wa.me/' . $settings->whatsapp : '#' }}" target="_blank"
                                style="color: #fff; background-color: #2f2f2f; border-radius: 50%; width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a>

                            <!-- Email -->
                            <a href="{{ !empty($settings->email) ? 'mailto:' . $settings->email : '#' }}" target="_blank"
                                style="color: #fff; background-color: #2f2f2f; border-radius: 50%; width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;">
                                <i class="fa fa-envelope"></i>
                            </a>

                            <!-- LinkedIn -->
                            <a href="{{ !empty($settings->linkedin) ? $settings->linkedin : '#' }}" target="_blank"
                                style="color: #fff; background-color: #2f2f2f; border-radius: 50%; width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;">
                                <i class="fa-brands fa-linkedin"></i>
                            </a>

                            <!-- YouTube -->
                            <a href="{{ !empty($settings->youtube) ? $settings->youtube : '#' }}" target="_blank"
                                style="color: #fff; background-color: #2f2f2f; border-radius: 50%; width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;">
                                <i class="fa-brands fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Footer Bottom -->
                <div style="border-top: 1px solid #333; margin-top: 20px; padding-top: 15px; text-align: center;">
                    {{-- <p style="margin: 0; color: #ccc;">{{ __('lang.copyright') }}</p> --}}
                    <p style="margin: 5px 0 0; color: #ccc;">
                        {{ __('lang.developed_by') }}
                        <a href="https://wa.me/201555622169" target="_blank" style="color: #25D366; text-decoration: none;">
                            <strong>Eng: Bola Eshaq</strong>
                        </a>
                    </p>
                </div>
            </div>
        </footer>

    </div>
    <a href="#" class="scrollup"><i class="icon-angle-up icon-square icon-bglight icon-2x active"></i></a>

    <!-- javascript
      ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{asset('js/jquery.js')}}"></script>
    {{-- <script src="{{asset('js/jquery.easing.1.3.js')}}"></script> --}}
    {{-- <script src="{{asset('js/bootstrap.js')}}"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap 5 JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{asset('js/modernizr.custom.js')}}"></script>
    <script src="{{asset('js/toucheffects.js')}}"></script>
    <script src="{{asset('js/google-code-prettify/prettify.js')}}"></script>
    <script src="{{asset('js/jquery.bxslider.min.js')}}"></script>
    <script src="{{asset('js/camera/camera.js')}}"></script>
    <script src="{{asset('js/camera/setting.js')}}"></script>

    <script src="{{asset('js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('js/portfolio/jquery.quicksand.js')}}"></script>
    <script src="{{asset('js/portfolio/setting.js')}}"></script>

    <script src="{{asset('js/jquery.flexslider.js')}}"></script>
    <script src="{{asset('js/animate.js')}}"></script>
    <script src="{{asset('js/inview.js')}}"></script>

    <!-- Template Custom JavaScript File -->
    <script src="{{asset('js/custom.js')}}"></script>


    <script>
        // Initialize the thumbs gallery first
        document.addEventListener("DOMContentLoaded", () => {
            const swiperThumbs = new Swiper(".thumbs-gallery", {
                spaceBetween: 10,
                slidesPerView: 5,
                freeMode: true,
                watchSlidesVisibility: true,
                watchSlidesProgress: true,
            });

            // Initialize the main gallery, linking to the thumbs gallery
            const swiperMain = new Swiper(".main-gallery", {
                spaceBetween: 10,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                thumbs: {
                    swiper: swiperThumbs, // Link the thumbs swiper here
                },
            });
        });

        // Partners slider
        document.addEventListener("DOMContentLoaded", () => {
            const partnersSwiper = new Swiper(".partners-slider-unique", {
            slidesPerView: 5, // Number of visible logos
            spaceBetween: 20, // Space between slides
            loop: true, // Continuous looping
            autoplay: {
                delay: 0, // No delay for continuous scroll
                disableOnInteraction: false,
            },
            speed: 3000, // Adjust speed for smoother scrolling
            allowTouchMove: false, // Disable manual sliding
            breakpoints: {
                768: {
                slidesPerView: 5, // Adjust for tablet
                },
                480: {
                slidesPerView: 2, // Adjust for mobile
                },
            },
            });
        });

        // Share button toggle
        document.addEventListener("DOMContentLoaded", () => {
            const shareButton = document.querySelector(".share__button");
            const shareContainer = document.querySelector(".share-container");

            if (shareButton && shareContainer) {
                shareButton.addEventListener("click", () => {
                    shareContainer.classList.toggle("active");
                });
            }
        });

        // Header scroll effect
        document.addEventListener("DOMContentLoaded", () => {
            const header = document.querySelector("header");
            window.addEventListener("scroll", () => {
                if (window.scrollY > 50) {
                    header.classList.add("scrolled");
                } else {
                    header.classList.remove("scrolled");
                }
            });
        });

        // Text slider
        document.addEventListener("DOMContentLoaded", () => {
            const textSwiper = new Swiper(".text-slider", {
                loop: true,
                autoplay: {
                    delay: 4000, // Auto-slide every 4 seconds
                    disableOnInteraction: false,
                },
                effect: "fade", // Smooth fade effect
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                    bulletClass: "swiper-pagination-bullet",
                    bulletActiveClass: "swiper-pagination-bullet-active",
                },
                allowTouchMove: false, // Disable manual swipe
            });
        });

        // Photo Gallery Lightbox
        document.addEventListener('DOMContentLoaded', () => {
            // Initialize Swiper
            const swiper = new Swiper('.swiper-container', {
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });

            // Open modal and navigate to the clicked image
            const galleryItems = document.querySelectorAll('.gallery-item');
            const modal = document.getElementById('lightbox-modal');
            const modalInstance = new bootstrap.Modal(modal);

            galleryItems.forEach((item, index) => {
                item.addEventListener('click', (e) => {
                    e.preventDefault();
                    swiper.slideTo(index, 0); // Go to the clicked image
                    modalInstance.show(); // Open the modal
                });
            });
        });

        // Show spinner on page load
        document.addEventListener('DOMContentLoaded', () => {
            const spinner = document.getElementById('loadingSpinner');
            spinner.classList.add('active');

            // Hide spinner after page fully loads
            window.addEventListener('load', () => {
                spinner.classList.remove('active');
            });

            // Handle route changes for Single Page Applications (SPAs)
            if (window.history.pushState) {
                document.addEventListener('click', (e) => {
                    const target = e.target.closest('a'); // Find the closest anchor tag
                    if (
                        target &&
                        target.href &&
                        target.target !== '_blank' &&
                        target.getAttribute('href') !== '#' &&
                        target.getAttribute('href') !== ''
                    ) {
                        e.preventDefault(); // Prevent default navigation
                        spinner.classList.add('active'); // Show spinner

                        // Simulate loading (replace this part with your actual page navigation logic)
                        setTimeout(() => {
                            window.location.href = target.href; // Perform navigation
                        }, 1000); // Adjust the delay as needed
                    }
                });
            }

            // Hide spinner on popstate (back/forward button)
            window.addEventListener('popstate', () => {
                spinner.classList.remove('active');
            });
        });


        // Toggle the side navigation
        $(document).ready(function () {
            // Toggle the side navigation
            $(".hamburger-btn").on("click", function () {
                $(".side-nav").toggleClass("open");
            });

            // Close side navigation when clicking outside
            $(document).on("click", function (e) {
                if (!$(e.target).closest(".side-nav, .hamburger-btn").length) {
                    $(".side-nav").removeClass("open");
                }
            });
        });

    </script>
    @stack('js')
</body>
</html>
