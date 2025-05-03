@extends('layouts.app')

@section('content')

<section class="address" style="background: linear-gradient(60deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset($settings->cover_image ?? 'https://www.qodra-egy.net/img/about/ab_4.jpg') }}'); background-size: cover; background-position: center;">
    <div class="container">
        <div class="col-lg-12 text-center">
            <h3 class="address-h3">{{ __('lang.gallery_section_title') }}</h3>
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
                            <li class="active">
                                &nbsp; {{ __('lang.breadcrumb_videos_gallery') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

<div class="text-center mb-5 mt-3">
    <h2 style="font-size: 2.5rem; font-weight: bold; color: #333;">
        {{ __('lang.photos_gallery_title') }} <strong>{{ __('lang.video_gallery') }}</strong>
    </h2>
</div>
<section class="video-gallery">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @forelse ($videos as $video)
            <div class="col">
                <div class="card h-100">
                    <button class="video-item btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#video-modal"
                        data-video="{{ asset('storage/' . $video->image_path) }}"
                        data-title="{{ app()->getLocale() === 'ar' ? $video->ar_subtitle : $video->en_subtitle }}">
                        <!-- Thumbnail generated dynamically -->
                        <canvas class="video-thumbnail img-fluid" data-video-src="{{ asset('storage/' . $video->image_path) }}"></canvas>
                    </button>
                    <div class="card-body text-center">
                        <!-- Display video title -->
                        <h5 class="card-title">
                            {{ app()->getLocale() === 'ar' ? $video->ar_subtitle : $video->en_subtitle }}
                        </h5>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p>{{ __('lang.no_videos_found') }}</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Video Modal -->
<div class="modal fade" id="video-modal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-header">
                <!-- Title displayed dynamically -->
                <h5 id="modal-video-title" class="modal-title text-center"></h5>
            </div>
            <div class="modal-body">
                <video id="modal-video" controls class="w-100">
                    <source src="" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <!-- Display video title below the video -->
                <div class="text-center mt-3">
                    <h5 id="modal-video-title-below" class="text-muted"></h5>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const videoModal = document.getElementById("video-modal");
        const modalVideo = document.getElementById("modal-video");
        const modalVideoTitle = document.getElementById("modal-video-title");
        const modalVideoTitleBelow = document.getElementById("modal-video-title-below");

        if (videoModal && modalVideo && modalVideoTitle && modalVideoTitleBelow) {
            // Load video into the modal on show
            videoModal.addEventListener("show.bs.modal", (e) => {
                const button = e.relatedTarget; // Button that triggered the modal
                const videoSrc = button.getAttribute("data-video"); // Get video source URL
                const videoTitle = button.getAttribute("data-title"); // Get video title

                // Update video source
                if (videoSrc) {
                    modalVideo.querySelector("source").setAttribute("src", videoSrc);
                    modalVideo.load(); // Load the new video
                }

                // Update titles
                modalVideoTitle.textContent = videoTitle || "";
                modalVideoTitleBelow.textContent = videoTitle || "";
            });

            // Pause video and clear titles when the modal is hidden
            videoModal.addEventListener("hidden.bs.modal", () => {
                modalVideo.pause(); // Stop video playback
                modalVideo.querySelector("source").setAttribute("src", ""); // Clear video source
                modalVideoTitle.textContent = ""; // Clear modal header title
                modalVideoTitleBelow.textContent = ""; // Clear title below the video
            });
        }
    });

    document.addEventListener('DOMContentLoaded', () => {
        const canvases = document.querySelectorAll('.video-thumbnail');

        canvases.forEach((canvas) => {
            const videoSrc = canvas.getAttribute('data-video-src');
            const video = document.createElement('video');

            video.src = videoSrc;
            video.crossOrigin = "anonymous"; // Helps prevent CORS issues if applicable
            video.muted = true; // Prevent audio

            video.addEventListener('loadeddata', () => {
                const ctx = canvas.getContext('2d');
                canvas.width = 320; // Fixed size to ensure consistency
                canvas.height = 180;

                video.currentTime = 1; // Seek to 1s to ensure a visible frame

                video.addEventListener('seeked', () => {
                    ctx.drawImage(video, 0, 0, canvas.width, canvas.height); // Draw thumbnail
                });
            });

            video.load(); // Start loading the video
        });
    });


</script>
@endpush
