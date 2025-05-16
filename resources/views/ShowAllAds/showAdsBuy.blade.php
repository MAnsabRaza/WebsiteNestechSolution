@extends('layouts.app')
@section('title', 'Property Listings')
@section('content')
    <div class="property-listings-page py-5">
        <!-- Page Header -->
        <div class="container mb-5 mt-5">
            <div class="card border-0 shadow-sm rounded-4 bg-[#ecf1f6]">
                <div class="card-body py-4">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="d-flex align-items-center">
                                <i class="{{ $icon }} me-3 fs-3 text-danger"></i>
                                <h1 class="h3 fw-bold mb-0">{{ $title }}</h1>
                            </div>
                            @if (isset($filter_type) && isset($filter_value))
                                <p class="text-muted small ms-4 mt-2 mb-0">
                                    Showing properties filtered by {{ $filter_type }}: <span
                                        class="fw-semibold">{{ $filter_value }}</span>
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 d-none d-lg-block">
                    <div class="card border-0 shadow-sm rounded-4 sticky-top" style="top: 20px; z-index: 10;">
                        <div class="card-header bg-white border-0 pt-4 pb-2">
                            <h5 class="fw-bold mb-0"><i class="fas fa-filter me-2 text-danger"></i> Filter Results</h5>
                        </div>
                        <div class="card-body">
                            <form method="GET" action="{{ route('applyFilterShowAdsBuy') }}">

                                <!-- Property Type -->
                                <div class="mb-4">
                                    <label class="form-label fw-semibold">Property Type</label>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" name="property_type[]"
                                            value="Residential" id="residential"
                                            {{ in_array('Residential', request('property_type', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="residential">Residential</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" name="property_type[]"
                                            value="Commercial" id="commercial"
                                            {{ in_array('Commercial', request('property_type', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="commercial">Commercial</label>
                                    </div>

                                </div>



                                <!-- City -->
                                <div class="mb-4">

                                    <label class="form-label fw-semibold">City</label>
                                    <select class="form-control rounded-0 form-control-sm" name="city">
                                        <option value="" selected>All Cities</option>
                                        <option value="Faisalabad">Faisalabad</option>
                                        <option value="Karachi">Karachi</option>
                                        <option value="Lahore">Lahore</option>
                                        <option value="Islamabad">Islamabad</option>
                                        <option value="Peshawar">Peshawar</option>
                                        <option value="Quetta">Quetta</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-danger w-100">
                                    <i class="fas fa-search me-2"></i> Apply Filters
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    @if (count($posts) > 0)
                        @foreach ($posts as $post)
                            <div class="mb-4">
                                <div class="card border-0 shadow-sm rounded-4 hover-lift">
                                    <div class="card-body p-0">
                                        <div class="property-header p-4 border-bottom">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <div
                                                        class="location-badge bg-danger text-white rounded-pill px-3 py-1 me-3">
                                                        <i class="fas fa-map-marker-alt me-1"></i>
                                                        {{ $post->postAd_city }}
                                                    </div>
                                                    <span
                                                        class="badge bg-light text-dark border">{{ $post->category_name }}</span>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="property-description p-4 bg-light">
                                            @if (isset($post->postAd_description))
                                                <p class="mb-0 description-text">{{ $post->postAd_description }}</p>
                                            @else
                                                <p class="mb-0 text-muted fst-italic">No description available</p>
                                            @endif
                                        </div>
                                        <div class="property-features p-4">
                                            <div class="row">
                                                @if (isset($post->postAd_building_structure) && $post->postAd_building_structure)
                                                    <div class="col-6 col-md-3 mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <div
                                                                class="feature-icon bg-danger-subtle rounded-circle p-2 me-2">
                                                                <i class="fas fa-building text-danger"></i>
                                                            </div>
                                                            <span
                                                                class="text-truncate">{{ $post->postAd_building_structure }}</span>
                                                        </div>
                                                    </div>
                                                @endif

                                                @if (isset($post->postAd_direction) && $post->postAd_direction)
                                                    <div class="col-6 col-md-3 mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <div
                                                                class="feature-icon bg-danger-subtle rounded-circle p-2 me-2">
                                                                <i class="fas fa-compass text-danger"></i>
                                                            </div>
                                                            <span
                                                                class="text-truncate">{{ $post->postAd_direction }}</span>
                                                        </div>
                                                    </div>
                                                @endif

                                                @if (isset($post->postAd_owner_name) && $post->postAd_owner_name)
                                                    <div class="col-6 col-md-3 mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <div
                                                                class="feature-icon bg-danger-subtle rounded-circle p-2 me-2">
                                                                <i class="fas fa-user text-danger"></i>
                                                            </div>
                                                            <span
                                                                class="text-truncate">{{ $post->postAd_owner_name }}</span>
                                                        </div>
                                                    </div>
                                                @endif

                                                @if (isset($post->postAd_storey) && $post->postAd_storey)
                                                    <div class="col-6 col-md-3 mb-3">
                                                        <div class="d-flex align-items-center">
                                                            <div
                                                                class="feature-icon bg-danger-subtle rounded-circle p-2 me-2">
                                                                <i class="fas fa-layer-group text-danger"></i>
                                                            </div>
                                                            <span class="text-truncate">{{ $post->postAd_storey }}</span>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div
                                            class="property-footer p-4 border-top d-flex justify-content-between align-items-center">
                                            <div class="text-muted small">
                                                <i class="far fa-calendar-alt me-1"></i> Posted:
                                                {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                            </div>
                                            <a href="{{ route('ShowOneAdsBuy.detail', $post->id) }}"
                                                class="btn btn-danger">
                                                <i class="fas fa-eye me-1"></i> View Details
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12">
                            <div class="alert alert-danger rounded-4 shadow-sm p-4 text-center">
                                <i class="fas fa-exclamation-circle fa-2x mb-3 text-danger"></i>
                                <h4>No Properties Found</h4>
                                <p class="mb-0">No listings found for {{ $filter_value ?? '' }}
                                    {{ $filter_type ?? '' }}.</p>
                            </div>
                        </div>
                    @endif
                    @if (isset($posts) && $posts->hasPages())
                        <div class="pagination-container mt-5 mb-3">
                            <nav aria-label="Property listings pagination">
                                <ul class="pagination pagination-lg justify-content-center">
                                    <!-- First Page -->
                                    <li class="page-item {{ $posts->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link rounded-start" href="{{ $posts->url(1) }}"
                                            aria-label="First">
                                            <i class="fas fa-angle-double-left"></i>
                                        </a>
                                    </li>
                                    <li class="page-item {{ $posts->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $posts->previousPageUrl() }}"
                                            aria-label="Previous">
                                            <i class="fas fa-angle-left"></i>
                                        </a>
                                    </li>
                                    <li class="page-item active">
                                        <div class="dropdown">
                                            <button class="page-link dropdown-toggle" type="button" id="pageDropdown"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                {{ $posts->currentPage() }} of {{ $posts->lastPage() }}
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-center" aria-labelledby="pageDropdown"
                                                style="max-height: 200px; overflow-y: auto;">
                                                @for ($i = 1; $i <= $posts->lastPage(); $i++)
                                                    <li><a class="dropdown-item {{ $i == $posts->currentPage() ? 'active' : '' }}"
                                                            href="{{ $posts->url($i) }}">Page {{ $i }}</a>
                                                    </li>
                                                @endfor
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="page-item {{ !$posts->hasMorePages() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $posts->nextPageUrl() }}" aria-label="Next">
                                            <i class="fas fa-angle-right"></i>
                                        </a>
                                    </li>
                                    <li class="page-item {{ !$posts->hasMorePages() ? 'disabled' : '' }}">
                                        <a class="page-link rounded-end" href="{{ $posts->url($posts->lastPage()) }}"
                                            aria-label="Last">
                                            <i class="fas fa-angle-double-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <style>
        .property-listings-page {
            background-color: #f8f9fa;
        }

        .rounded-4 {
            border-radius: 0.75rem !important;
        }

        .hover-lift {
            transition: all 0.3s ease;
            border-radius: 0.75rem !important;
            overflow: hidden;
        }

        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, .15) !important;
        }

        .feature-icon {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .bg-danger-subtle {
            background-color: rgba(220, 53, 69, 0.1);
        }

        .dropdown-menu-center {
            left: 50% !important;
            right: auto !important;
            transform: translateX(-50%) !important;
        }

        .page-link {
            border: none;
            padding: 0.75rem 1rem;
            color: #dc3545;
            background-color: white;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            margin: 0 2px;
        }

        .page-item.active .page-link {
            background-color: #dc3545;
            color: white;
        }

        .page-item.disabled .page-link {
            color: #6c757d;
            background-color: #f8f9fa;
        }

        /* New styles for the redesigned cards */
        .property-header {
            background-color: #ffffff;
        }

        .property-description {
            background-color: #f8f9fa;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .description-text {
            line-height: 1.6;
            color: #495057;
        }

        .location-badge {
            font-size: 0.85rem;
            font-weight: 500;
        }

        .property-features {
            background-color: #ffffff;
        }

        .property-footer {
            background-color: #ffffff;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            transition: all 0.2s ease;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(220, 53, 69, 0.2);
        }
    </style>
@endsection
