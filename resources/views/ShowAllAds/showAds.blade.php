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

        <!-- Property Listings -->
        <div class="container">
            <div class="row">
                <!-- Sidebar Filters (Optional) -->
                <div class="col-lg-3 d-none d-lg-block">
                    <div class="card border-0 shadow-sm rounded-4 sticky-top" style="top: 20px; z-index: 10;">
                        <div class="card-header bg-white border-0 pt-4 pb-2">
                            <h5 class="fw-bold mb-0"><i class="fas fa-filter me-2 text-danger"></i> Filter Results</h5>
                        </div>
                        <div class="card-body">
                            <!-- Inside sidebar filters form -->
                            <form method="GET" action="{{ route('applyFilterShowAds') }}">
                                <!-- Price Range -->
                                <div class="mb-4">
                                    <label class="form-label fw-semibold">Price Range</label>
                                    <div class="d-flex align-items-center">
                                        <input type="number" name="min" class="form-control form-control-sm"
                                            placeholder="Min" value="{{ request('min') }}">
                                        <div class="mx-2">-</div>
                                        <input type="number" name="max" class="form-control form-control-sm"
                                            placeholder="Max" value="{{ request('max') }}">
                                    </div>
                                </div>

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

                                {{-- purpose --}}

                                <div class="mb-4">
                                    <label class="form-label fw-semibold">Purpose</label>
                                    <select class="form-control rounded-0 form-control-sm" name="postAd_for">
                                        <option value="" selected>Purpose</option>
                                        <option value="Rent">Rent</option>
                                        <option value="Sell">Sell</option>
                                    </select>
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

                <!-- Property Cards -->
                <div class="col-lg-9">
                    @if (count($posts) > 0)
                        @foreach ($posts as $post)
                            <div class=" mb-4">
                                <div class="card border-0 shadow-sm rounded-4 hover-lift">
                                    <div class="row g-0">
                                        <!-- Property Images Carousel -->
                                        <div class="col-md-4 position-relative">
                                            <div id="carousel-{{ $post->id }}" class="carousel slide h-100"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner h-100">
                                                    @if ($post->images->count() > 0)
                                                        @foreach ($post->images as $index => $image)
                                                            <div
                                                                class="carousel-item h-100 {{ $index == 0 ? 'active' : '' }}">
                                                                <img src="{{ $image->image_path }}"
                                                                    class="d-block w-100 h-100" alt="Property Image"
                                                                    style="object-fit: cover;">
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <div class="carousel-item h-100 active">
                                                            <div
                                                                class="d-flex align-items-center justify-content-center h-100 bg-light">
                                                                <i class="fas fa-home fa-3x text-muted"></i>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>

                                                @if ($post->images->count() > 1)
                                                    <button class="carousel-control-prev" type="button"
                                                        data-bs-target="#carousel-{{ $post->id }}"
                                                        data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon bg-dark rounded-circle p-1"
                                                            aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button"
                                                        data-bs-target="#carousel-{{ $post->id }}"
                                                        data-bs-slide="next">
                                                        <span class="carousel-control-next-icon bg-dark rounded-circle p-1"
                                                            aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>
                                                @endif

                                                <!-- Image Counter Badge -->
                                                @if ($post->images->count() > 0)
                                                    <div class="position-absolute bottom-0 end-0 m-3">
                                                        <span class="badge bg-dark px-2 py-1 rounded-pill">
                                                            <i class="fas fa-camera me-1"></i>
                                                            {{ $post->images->count() }}
                                                        </span>s
                                                    </div>
                                                @endif

                                                <!-- Property Type Badge -->
                                                <div class="position-absolute top-0 start-0 m-3">
                                                    <span class="badge bg-danger rounded-pill px-3 py-2">
                                                        {{ $post->postAd_for ?? 'For Sale' }}
                                                    </span>
                                                </div>
                                            </div>

                                        </div>

                                        <!-- Property Details -->
                                        <div class="col-md-8">
                                            <div class="card-body h-100 d-flex flex-column p-4">
                                                <div class="d-flex justify-content-between align-items-start mb-2">
                                                    <div>
                                                        <h3 class="card-title fw-bold mb-1">{{ $post->postAd_address }}
                                                        </h3>
                                                        <p class="text-muted mb-0">
                                                            <i class="fas fa-map-marker-alt me-1 text-danger"></i>
                                                            {{ $post->postAd_city }}
                                                        </p>
                                                    </div>
                                                    <div class="text-end">
                                                        <h4 class="text-danger fw-bold mb-1">PKR
                                                            {{ $post->postAd_price }}</h4>
                                                        <span
                                                            class="badge bg-light text-dark border">{{ $post->category_name }}</span>
                                                    </div>
                                                </div>

                                                <div class="property-features my-3 py-3 border-top border-bottom">
                                                    <div class="row">
                                                        @if (isset($post->postAd_building_structure) && $post->postAd_building_structure)
                                                            <div class="col-6 col-md-4 mb-2">
                                                                <div class="d-flex align-items-center">
                                                                    <div
                                                                        class="feature-icon bg-primary-subtle rounded-circle p-2 me-2">
                                                                        <i class="fas fa-building text-primary"></i>
                                                                    </div>
                                                                    <span
                                                                        class="text-truncate">{{ $post->postAd_building_structure }}</span>
                                                                </div>
                                                            </div>
                                                        @endif

                                                        @if (isset($post->postAd_direction) && $post->postAd_direction)
                                                            <div class="col-6 col-md-4 mb-2">
                                                                <div class="d-flex align-items-center">
                                                                    <div
                                                                        class="feature-icon bg-primary-subtle rounded-circle p-2 me-2">
                                                                        <i class="fas fa-compass text-primary"></i>
                                                                    </div>
                                                                    <span
                                                                        class="text-truncate">{{ $post->postAd_direction }}</span>
                                                                </div>
                                                            </div>
                                                        @endif

                                                        @if (isset($post->postAd_owner_name) && $post->postAd_owner_name)
                                                            <div class="col-6 col-md-4 mb-2">
                                                                <div class="d-flex align-items-center">
                                                                    <div
                                                                        class="feature-icon bg-primary-subtle rounded-circle p-2 me-2">
                                                                        <i class="fas fa-user text-primary"></i>
                                                                    </div>
                                                                    <span
                                                                        class="text-truncate">{{ $post->postAd_owner_name }}</span>
                                                                </div>
                                                            </div>
                                                        @endif

                                                        @if (isset($post->postAd_storey) && $post->postAd_storey)
                                                            <div class="col-6 col-md-4 mb-2">
                                                                <div class="d-flex align-items-center">
                                                                    <div
                                                                        class="feature-icon bg-primary-subtle rounded-circle p-2 me-2">
                                                                        <i class="fas fa-layer-group text-primary"></i>
                                                                    </div>
                                                                    <span
                                                                        class="text-truncate">{{ $post->postAd_storey }}</span>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="mt-auto d-flex justify-content-between align-items-center">
                                                    <div class="text-muted small">
                                                        <i class="far fa-calendar-alt me-1"></i> Posted:
                                                        {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                                    </div>
                                                    <div class="d-flex gap-2">
                                                        <a href="{{ route('ShowOneAds.detail', $post->id) }}"
                                                            class="btn btn-danger">
                                                            <i class="fas fa-danger-circle me-1"></i> View Details
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12">
                            <div class="alert alert-danger rounded-4 shadow-sm p-4 text-center">
                                <i class="fas fa-danger-circle fa-2x mb-3 text-primary"></i>
                                <h4>No Properties Found</h4>
                                <p class="mb-0">No listings found for {{ $filter_value ?? '' }}
                                    {{ $filter_type ?? '' }}.</p>
                            </div>
                        </div>
                    @endif

                    <!-- Pagination Links -->
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

                                    <!-- Previous Page -->
                                    <li class="page-item {{ $posts->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $posts->previousPageUrl() }}"
                                            aria-label="Previous">
                                            <i class="fas fa-angle-left"></i>
                                        </a>
                                    </li>

                                    <!-- Current Page Indicator with Dropdown -->
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

                                    <!-- Next Page -->
                                    <li class="page-item {{ !$posts->hasMorePages() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $posts->nextPageUrl() }}" aria-label="Next">
                                            <i class="fas fa-angle-right"></i>
                                        </a>
                                    </li>

                                    <!-- Last Page -->
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
        /* Custom Styles */
        .property-listings-page {
            background-color: #f8f9fa;
        }

        .rounded-4 {
            border-radius: 0.75rem !important;
        }

        .bg-gradient-primary {
            background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
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

        .bg-primary-subtle {
            background-color: rgba(13, 110, 253, 0.1);
        }

        .carousel-item img {
            height: 250px;
            border-top-left-radius: 0.75rem;
            border-bottom-left-radius: 0.75rem;
        }

        .dropdown-menu-center {
            left: 50% !important;
            right: auto !important;
            transform: translateX(-50%) !important;
        }

        .page-link {
            border: none;
            padding: 0.75rem 1rem;
            color: #0d6efd;
            background-color: white;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            margin: 0 2px;
        }

        .page-item.active .page-link {
            background-color: #0d6efd;
            color: white;
        }

        .page-item.disabled .page-link {
            color: #6c757d;
            background-color: #f8f9fa;
        }

        @media (max-width: 767.98px) {
            .carousel-item img {
                border-radius: 0.75rem 0.75rem 0 0;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize all carousels with custom options
            const carousels = document.querySelectorAll('.carousel');
            carousels.forEach(carouselEl => {
                const carousel = new bootstrap.Carousel(carouselEl, {
                    interval: false,
                    wrap: true,
                    touch: true
                });
            });

            // Add hover effect to save buttons
            const saveButtons = document.querySelectorAll('.btn-outline-secondary');
            saveButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    this.classList.toggle('active');
                    const icon = this.querySelector('i');
                    if (icon.classList.contains('far')) {
                        icon.classList.replace('far', 'fas');
                        this.classList.add('text-danger');
                        this.classList.add('border-danger');
                    } else {
                        icon.classList.replace('fas', 'far');
                        this.classList.remove('text-danger');
                        this.classList.remove('border-danger');
                    }
                });
            });
        });
    </script>
@endsection
