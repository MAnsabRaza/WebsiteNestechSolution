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
            <div class="card border-0 shadow-sm rounded-4 mb-4 property-highlight-card">
                <div class="card-body p-0">
                    <div class="property-header p-4 border-bottom">
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <div>
                                <span class="badge bg-danger mb-2">{{ $post->postAd_for }} • {{ $post->postAd_type }}</span>
                                <h2 class="h3 fw-bold mb-0">{{ $post->postAd_owner_name }}</h2>
                            </div>
                            <div class="mt-2 mt-md-0">
                                <span
                                    class="badge bg-light text-dark border">{{ $post->category->category_name ?? 'N/A' }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="property-description p-4 bg-light">
                        <div class="description-header d-flex align-items-center mb-3">
                            <i class="fas fa-file-alt text-danger me-2"></i>
                            <h3 class="h5 fw-bold mb-0">About this property</h3>
                        </div>
                        <div class="description-content">
                            {!! nl2br(e($post->postAd_description)) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-header bg-white p-4 border-0">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-list-ul text-danger me-2"></i>
                                <h3 class="h5 fw-bold mb-0">Property Features</h3>
                            </div>
                        </div>
                        <div class="card-body p-4 pt-0">
                            <div class="row g-4">
                                @if (isset($post->postAd_residential_type) && $post->postAd_residential_type)
                                    <div class="col-md-6">
                                        <div class="feature-item d-flex align-items-center">
                                            <div class="feature-icon bg-danger-subtle rounded-circle p-3 me-3">
                                                <i class="fas fa-home text-danger"></i>
                                            </div>
                                            <div>
                                                <span class="text-muted small d-block">Residential Type</span>
                                                <span class="fw-medium">{{ $post->postAd_residential_type }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if (isset($post->postAd_commercial_type) && $post->postAd_commercial_type)
                                    <div class="col-md-6">
                                        <div class="feature-item d-flex align-items-center">
                                            <div class="feature-icon bg-danger-subtle rounded-circle p-3 me-3">
                                                <i class="fas fa-building text-danger"></i>
                                            </div>
                                            <div>
                                                <span class="text-muted small d-block">Commercial Type</span>
                                                <span class="fw-medium">{{ $post->postAd_commercial_type }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if (isset($post->postAd_storey) && $post->postAd_storey)
                                    <div class="col-md-6">
                                        <div class="feature-item d-flex align-items-center">
                                            <div class="feature-icon bg-danger-subtle rounded-circle p-3 me-3">
                                                <i class="fas fa-layer-group text-danger"></i>
                                            </div>
                                            <div>
                                                <span class="text-muted small d-block">Storey</span>
                                                <span class="fw-medium">{{ $post->postAd_storey }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if (isset($post->postAd_direction) && $post->postAd_direction)
                                    <div class="col-md-6">
                                        <div class="feature-item d-flex align-items-center">
                                            <div class="feature-icon bg-danger-subtle rounded-circle p-3 me-3">
                                                <i class="fas fa-compass text-danger"></i>
                                            </div>
                                            <div>
                                                <span class="text-muted small d-block">Direction</span>
                                                <span class="fw-medium">{{ $post->postAd_direction }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if (isset($post->postAd_building_structure) && $post->postAd_building_structure)
                                    <div class="col-md-6">
                                        <div class="feature-item d-flex align-items-center">
                                            <div class="feature-icon bg-danger-subtle rounded-circle p-3 me-3">
                                                <i class="fas fa-building text-danger"></i>
                                            </div>
                                            <div>
                                                <span class="text-muted small d-block">Building Structure</span>
                                                <span class="fw-medium">{{ $post->postAd_building_structure }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Location Card -->
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-header bg-white p-4 border-0">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-map-marker-alt text-danger me-2"></i>
                                <h3 class="h5 fw-bold mb-0">Location</h3>
                            </div>
                        </div>
                        <div class="card-body p-4 pt-0">
                            <div class="location-details p-4 bg-light rounded-4">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-map-pin text-danger me-3 fs-4"></i>
                                    <div>
                                        <p class="mb-0 text-muted">{{ $post->postAd_society }}</p>
                                        <p class="mb-0 text-muted">{{ $post->postAd_city }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-header bg-white p-4 border-0">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-info-circle text-danger me-2"></i>
                                <h3 class="h5 fw-bold mb-0">Property Details</h3>
                            </div>
                        </div>
                        <div class="card-body p-4 pt-0">
                            <div class="property-details">
                                <div class="detail-item d-flex align-items-center p-3 border-bottom">
                                    <i class="fas fa-tag text-muted me-3 fs-5"></i>
                                    <div>
                                        <span class="text-muted small d-block">Category</span>
                                        <span class="fw-medium">{{ $post->category->category_name ?? 'N/A' }}</span>
                                    </div>
                                </div>
                                <div class="detail-item d-flex align-items-center p-3 border-bottom">
                                    <i class="fas fa-phone text-muted me-3 fs-5"></i>
                                    <div>
                                        <span class="text-muted small d-block">Contact</span>
                                        <span class="fw-medium">{{ $post->postAd_contact_number }}</span>
                                    </div>
                                </div>
                                <div class="detail-item d-flex align-items-center p-3">
                                    <i class="fas fa-calendar text-muted me-3 fs-5"></i>
                                    <div>
                                        <span class="text-muted small d-block">Posted</span>
                                        <span class="fw-medium">{{ date('M d, Y', strtotime($post->created_at)) }}</span>
                                    </div>
                                </div>
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

        .rounded-4 {
            border-radius: 0.75rem !important;
        }

        .bg-gradient-header {
            background: linear-gradient(135deg, #dc3545 0%, #a71d2a 100%);
        }

        .property-highlight-card {
            border-left: 5px solid #dc3545 !important;
        }

        .property-description {
            line-height: 1.8;
            white-space: pre-line;
        }

        .description-content {
            font-size: 1.05rem;
            color: #495057;
        }

        .bg-danger-subtle {
            background-color: rgba(220, 53, 69, 0.1);
        }

        .feature-icon {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .feature-item {
            transition: all 0.3s ease;
        }

        .feature-item:hover {
            transform: translateY(-3px);
        }

        .detail-item {
            transition: all 0.3s ease;
        }

        .detail-item:hover {
            background-color: #f8f9fa;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            padding: 0.6rem 1rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(220, 53, 69, 0.2);
        }

        .location-details {
            transition: all 0.3s ease;
        }

        .location-details:hover {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
        }

        .price-section {
            transition: all 0.3s ease;
        }

        .price-section:hover {
            transform: scale(1.02);
        }
    </style>
@endsection
