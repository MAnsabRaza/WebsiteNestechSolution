@extends('layouts.app')
@section('title', 'Property Details')
@section('content')
    <div class="property-details-page min-vh-100 py-5">
        <div class="mt-3">
            <div class="container mb-4 mt-5">
                <div class="card border-0 shadow-sm rounded-4 bg-gradient-header ">
                    <div class="card-body py-4">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="d-flex align-items-center">
                                    <i class="{{ $icon }} me-3 fs-3 text-white"></i>
                                    <h1 class="h3 fw-bold mb-0 text-white">{{ $title }}</h1>
                                </div>
                                @if (isset($filter_type) && isset($filter_value))
                                    <p class="text-white-50 small ms-4 mt-2 mb-0">
                                        Showing properties filtered by {{ $filter_type }}: <span
                                            class="fw-semibold text-white">{{ $filter_value }}</span>
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm rounded-3 overflow-hidden mb-4">
                        <div class="position-relative">
                            <div id="propertyGallery" class="carousel slide" data-bs-ride="false" data-bs-touch="true">
                                <div class="carousel-inner">
                                    @php
                                        $hasMainImage = isset($post->postAd_images) && $post->postAd_images;
                                        $totalImages = count($post->images) + ($hasMainImage ? 1 : 0);
                                    @endphp
                                    @if ($hasMainImage)
                                        <div class="carousel-item active">
                                            <div class="ratio ratio-16x9" style="max-height: 500px;">
                                                <img src="{{ $post->postAd_images }}"
                                                    class="img-fluid d-block w-100 object-fit-contain"
                                                    alt="Main Property Image">
                                            </div>
                                        </div>
                                    @endif
                                    @foreach ($post->images as $index => $image)
                                        <div class="carousel-item {{ !$hasMainImage && $index === 0 ? 'active' : '' }}">
                                            <div class="ratio ratio-16x9" style="max-height: 500px;">
                                                <img src="{{ $image->image_path }}"
                                                    class="img-fluid d-block w-100 object-fit-contain"
                                                    alt="Property Image {{ $index + 1 }}">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                @if ($totalImages > 1)
                                    <button class="carousel-control-prev" type="button" data-bs-target="#propertyGallery"
                                        data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon bg-dark rounded-circle p-2"
                                            aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#propertyGallery"
                                        data-bs-slide="next">
                                        <span class="carousel-control-next-icon bg-dark rounded-circle p-2"
                                            aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                    <div class="position-absolute bottom-0 end-0 m-3">
                                        <span class="badge bg-dark px-3 py-2 rounded-pill" id="imageCounter">1 /
                                            {{ $totalImages }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        @if ($totalImages > 1)
                            <div class="p-3 border-top">
                                <div class="d-flex overflow-auto gap-2 pb-2 thumbnail-container">
                                    @if ($hasMainImage)
                                        <div class="thumbnail-item active" data-bs-target="#propertyGallery"
                                            data-bs-slide-to="0">
                                            <img src="{{ $post->postAd_images }}" class="img-thumbnail" alt="Thumbnail"
                                                style="width: 80px; height: 60px; object-fit: cover;">
                                        </div>
                                    @endif

                                    @foreach ($post->images as $index => $image)
                                        <div class="thumbnail-item" data-bs-target="#propertyGallery"
                                            data-bs-slide-to="{{ $hasMainImage ? $index + 1 : $index }}">
                                            <img src="{{ $image->image_path }}" class="img-thumbnail"
                                                alt="Thumbnail {{ $index + 1 }}"
                                                style="width: 80px; height: 60px; object-fit: cover;">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm rounded-3 mb-4">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <span class="badge bg-danger-subtle text-danger mb-2">{{ $post->postAd_for }} •
                                        {{ $post->postAd_type }}</span>
                                    <h2 class="h4 fw-bold">{{ $post->postAd_owner_name }}</h2>
                                </div>
                            </div>

                            <div class="mb-4">
                                <h3 class="h2 fw-bold text-danger">PKR {{ number_format($post->postAd_price) }}</h3>
                                @if (isset($post->advance_payment) && $post->advance_payment)
                                    <p class="text-muted small">Advance Payment: {{ $post->advance_payment }}</p>
                                @endif
                            </div>

                            <hr>

                            <div class="property-details">
                                <div class="d-flex align-items-start gap-3 mb-3">
                                    <i class="fas fa-map-marker-alt text-muted mt-1"></i>
                                    <div>
                                        <h6 class="fw-bold mb-1">Location</h6>
                                        <p class="text-muted mb-0">{{ $post->postAd_address }}, {{ $post->postAd_city }}
                                        </p>
                                    </div>
                                </div>

                                <div class="d-flex align-items-start gap-3 mb-3">
                                    <i class="fas fa-tag text-muted mt-1"></i>
                                    <div>
                                        <h6 class="fw-bold mb-1">Category</h6>
                                        <p class="text-muted mb-0">{{ $post->category->category_name ?? 'N/A' }}</p>
                                    </div>
                                </div>

                                <div class="d-flex align-items-start gap-3 mb-3">
                                    <i class="fas fa-phone text-muted mt-1"></i>
                                    <div>
                                        <h6 class="fw-bold mb-1">Contact</h6>
                                        <p class="text-muted mb-0">{{ $post->postAd_contact_number }}</p>
                                    </div>
                                </div>

                                <div class="d-flex align-items-start gap-3">
                                    <i class="fas fa-calendar text-muted mt-1"></i>
                                    <div>
                                        <h6 class="fw-bold mb-1">Posted</h6>
                                        <p class="text-muted mb-0">{{ date('M d, Y', strtotime($post->created_at)) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mb-3 pb-3">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-white p-0 border-0">
                    <ul class="nav nav-tabs" id="propertyTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active px-4 py-3" id="description-tab" data-bs-toggle="tab"
                                data-bs-target="#description" type="button" role="tab" aria-controls="description"
                                aria-selected="true">
                                Description
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link px-4 py-3" id="features-tab" data-bs-toggle="tab"
                                data-bs-target="#features" type="button" role="tab" aria-controls="features"
                                aria-selected="false">
                                Features
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link px-4 py-3" id="location-tab" data-bs-toggle="tab"
                                data-bs-target="#location" type="button" role="tab" aria-controls="location"
                                aria-selected="false">
                                Location
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-4">
                    <div class="tab-content" id="propertyTabsContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel"
                            aria-labelledby="description-tab">
                            <h3 class="h4 fw-bold mb-3">About this property</h3>
                            <div class="property-description">
                                {!! nl2br(e($post->postAd_description)) !!}
                            </div>
                        </div>
                        <div class="tab-pane fade" id="features" role="tabpanel" aria-labelledby="features-tab">
                            <h3 class="h4 fw-bold mb-3">Property Features</h3>
                            <div class="row g-3">
                                @if (isset($post->postAd_residential_type) && $post->postAd_residential_type)
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-home text-danger me-2"></i>
                                            <span>Type: {{ $post->postAd_residential_type }}</span>
                                        </div>
                                    </div>
                                @endif

                                @if (isset($post->postAd_commercial_type) && $post->postAd_commercial_type)
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-building text-danger me-2"></i>
                                            <span>Commercial: {{ $post->postAd_commercial_type }}</span>
                                        </div>
                                    </div>
                                @endif

                                @if (isset($post->postAd_storey) && $post->postAd_storey)
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-layer-group text-danger me-2"></i>
                                            <span>Storey: {{ $post->postAd_storey }}</span>
                                        </div>
                                    </div>
                                @endif

                                @if (isset($post->postAd_direction) && $post->postAd_direction)
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-compass text-danger me-2"></i>
                                            <span>Direction: {{ $post->postAd_direction }}</span>
                                        </div>
                                    </div>
                                @endif

                                @if (isset($post->postAd_building_structure) && $post->postAd_building_structure)
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-building text-danger me-2"></i>
                                            <span>Structure: {{ $post->postAd_building_structure }}</span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="location" role="tabpanel" aria-labelledby="location-tab">
                            <h3 class="h4 fw-bold mb-3">Location</h3>
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-map-marker-alt text-danger me-2"></i>
                                <span>{{ $post->postAd_address }}, {{ $post->postAd_city }}</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .property-details-page {
            background-color: #f8f9fa;
        }

        .bg-gradient-header {
            background: linear-gradient(135deg, #dc3545 0%, #a71d2a 100%);
        }

        .object-fit-contain {
            object-fit: contain;
        }

        .thumbnail-container {
            scrollbar-width: thin;
            scrollbar-color: #dee2e6 #ffffff;
        }

        .thumbnail-container::-webkit-scrollbar {
            height: 6px;
        }

        .thumbnail-container::-webkit-scrollbar-track {
            background: #ffffff;
        }

        .thumbnail-container::-webkit-scrollbar-thumb {
            background-color: #dee2e6;
            border-radius: 6px;
        }

        .thumbnail-item {
            cursor: pointer;
            border: 2px solid transparent;
            border-radius: 0.25rem;
            transition: all 0.2s ease;
        }

        .thumbnail-item.active,
        .thumbnail-item:hover {
            border-color: #dc3545;
        }

        .nav-tabs .nav-link {
            border: none;
            border-bottom: 3px solid transparent;
            color: #6c757d;
            font-weight: 500;
        }

        .nav-tabs .nav-link.active {
            border-bottom: 3px solid #dc3545;
            color: #212529;
        }

        .property-description {
            line-height: 1.7;
            white-space: pre-line;
        }

        .bg-danger-subtle {
            background-color: rgba(220, 53, 69, 0.1);
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const propertyGallery = document.getElementById('propertyGallery');
            const carousel = new bootstrap.Carousel(propertyGallery, {
                interval: false
            });

            const imageCounter = document.getElementById('imageCounter');
            if (propertyGallery && imageCounter) {
                propertyGallery.addEventListener('slide.bs.carousel', function(event) {
                    const slideIndex = event.to + 1;
                    const totalSlides = document.querySelectorAll('#propertyGallery .carousel-item').length;
                    imageCounter.textContent = slideIndex + ' / ' + totalSlides;
                });
            }
            const thumbnails = document.querySelectorAll('.thumbnail-item');
            thumbnails.forEach(function(thumbnail, index) {
                thumbnail.addEventListener('click', function() {
                    thumbnails.forEach(t => t.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        });
    </script>
@endsection
