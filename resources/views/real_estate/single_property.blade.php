@extends('global.index')

@section('content')
    <section class="hotel-view-area">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-8">
                    <div id="mainImage" class="main-image">
                        @php
                        $imageUrl = $listing['meta_tags_for_listings']['banner'] ?? 'https://via.placeholder.com/600x400?text=No+Image+Available';
                    @endphp
                    <img src="{{ $imageUrl }}" alt="Banner Image" class="img-fluid">

                        @if (!empty($listing['meta_tags_for_listings']['promo_video']))
                            <button class="btn btn-primary view-video-btn" data-toggle="modal" data-target="#promoVideoModal"
                                data-video-url="{{ $listing['meta_tags_for_listings']['promo_video'] }}">watch
                                Video</button>
                        @endif




                        <button
                            class="btn btn-secondary tag-btn">{{ $listing['listing_type']['name'] ?? $listing['listing_attribute']['name'] }}</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="thumbnail-container">
                        @php
                            // Add main image to the beginning of the thumbnails array
                            $thumbnails = array_merge(
                                [$listing['meta_tags_for_listings']['banner']],
                                $listing['meta_tags_for_listings']['additional_gallery'],
                            );
                        @endphp

                        @foreach ($thumbnails as $index => $thumbnail)
                            <div class="thumbnail-item mb-2">
                                <img src="{{ $thumbnail }}" class="img-fluid thumb-image" alt="Image {{ $index + 1 }}"
                                    onclick="changeMainImage('{{ $thumbnail }}')">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- next section --}}
            <div class="row mt-5">
                <div class="col-md-8">
                    <div class="main-content">
                        <h1><span>AED</span> {{ $listing['listing_attribute_type']['price'] ?? "0" }} Yearly</h1>
                        <p style="font-weight: bold;">
                            {{ $listing['city'] ?? 'N/A' }},
                            {{ $listing['state'] ?? 'N/A' }},
                            {{ $listing['country'] ?? 'N/A' }}
                        </p>
                        <span><i class="fa-solid fa-bed mr-2"></i> {{ $listing['listing_attribute']['bedroom'] }} Bed
                            &nbsp;&nbsp;</span>
                        <span><i class="fa-solid fa-sink mr-2"></i> {{ $listing['listing_attribute']['bathroom'] }}
                            Bathroom
                            &nbsp;&nbsp;</span>
                        <span><i class="fa-solid fa-warehouse mr-2"></i> {{ $listing['listing_attribute']['garage'] }}
                            Garage &nbsp;&nbsp;</span>
                        <br><br>
                        <h1>{{ $listing['title'] }}</h1>
                        <br>
                        <p style="text-align: justify;">{{ $listing['meta_tags_for_listings']['long_description'] }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            @if (!empty($listing['user']['profile_picture']))
                                <img src="{{ $listing['user']['profile_picture'] }}" class="user-image rounded-circle mr-3"
                                    alt="User">
                            @else
                                <img src="https://via.placeholder.com/100" class="user-image rounded-circle mr-3"
                                    alt="User">
                            @endif
                            <div class="p-5">
                                <h5 class="card-title mb-0 user-name">{{ $listing['user']['name'] }}</h5>
                                <p class="card-text">User Profile</p>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="d-flex flex-row justify-content-between">
                                <a href="tel:+1234567890" class="btn btn-light d-flex align-items-center">
                                    <i class="fas fa-phone-alt mr-2"></i>&nbsp;&nbsp; Call
                                </a>
                                <a href="mailto:{{ $listing['user']['email'] }}"
                                    class="btn btn-light d-flex align-items-center mx-2">
                                    <i class="fas fa-envelope mr-2"></i>&nbsp;&nbsp; Email
                                </a>
                                <a href="https://wa.me/+1234567890" class="btn btn-light d-flex align-items-center">
                                    <i class="fab fa-whatsapp mr-2"></i>&nbsp;&nbsp; WhatsApp
                                </a>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <small class="text-muted">Additional information or footer content</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="promoVideoModal" tabindex="-1" role="dialog" aria-labelledby="promoVideoModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="promoVideoModalLabel">Promo Video</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <video id="promoVideo" width="100%" controls>
                            <source src="" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function changeMainImage(imageUrl) {
            const mainImage = document.querySelector('#mainImage img');
            mainImage.src = imageUrl;
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#promoVideoModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var videoUrl = button.data('video-url'); // Extract info from data-* attributes
                var modal = $(this);
                var video = modal.find('#promoVideo');

                video.attr('src', videoUrl);
                video[0].load();
            });

            $('#promoVideoModal').on('hidden.bs.modal', function() {
                var video = $(this).find('#promoVideo');
                video.attr('src', '');
            });
        });
    </script>
    <style>
        /* Ensure main image fits within the container */
        #mainImage {
            height: 400px;
            overflow: hidden;
            border: 2px solid #ddd;
            background-color: #f8f8f8;
            position: relative;
        }

        #mainImage img {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            min-width: 100%;
            min-height: 100%;
            object-fit: cover;
        }

        .view-video-btn,
        .tag-btn {
            width: 100px !important;
            padding: 5px 10px;
            /* Adjust padding as needed */
            font-size: 14px;
            /* Adjust font size as needed */
            position: absolute;
            bottom: 10px;
            /* Adjust as needed */
            z-index: 10;
        }

        /* Specific positioning for the buttons */
        .view-video-btn {
            left: 10px;
            /* Position from the left */
        }

        .tag-btn {
            left: 120px;
            width: 20% !important;
            /* Position to the right of the first button */
        }

        /* Styling for thumbnail container */
        .thumbnail-container {
            display: flex;
            flex-direction: column;
        }

        /* Styling for individual thumbnail items */
        .thumbnail-item {
            width: 100%;
            /* Ensure full width */
            height: 130px;
            /* Fixed height */
        }

        .thumb-image {
            border: 2px solid #ddd;
            border-radius: 8px;
            transition: border-color 0.3s, transform 0.3s;
            cursor: pointer;
            width: 100%;
            /* Fit within thumbnail item */
            height: 100%;
            /* Fit within thumbnail item height */
            object-fit: cover;
            /* Maintain aspect ratio */
        }

        .thumb-image:hover {
            border-color: #ddd;
            transform: scale(1.05);
        }

        .row {
            display: flex;
            flex-wrap: nowrap;
        }

        /* User image styling */
        .user-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
        }

        /* User name styling */
        .user-name {
            font-size: 1.2rem;
            font-weight: bold;
        }

        /* Button icons */
        .btn i {
            font-size: 1.2rem;
        }

        /* Button styling */
        .btn {
            width: 100%;
        }

        /* Margin for buttons */
        .btn:not(:last-child) {
            margin-right: 0.5rem;
        }

        .card-header {
            display: flex;
            align-items: center;
        }

        .card-footer {
            background-color: #f8f9fa;
        }
    </style>
@endsection
