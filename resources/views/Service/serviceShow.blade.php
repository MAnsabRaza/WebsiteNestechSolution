@extends('layouts.app')
@section('title', $title)
@section('content')
    <div class="property-listings-page py-5">
        <!-- Page Header -->
        <div class="container mb-5 mt-5">
            <div class="card border-0 shadow-sm rounded-4 bg-[#ecf1f6]">
                <div class="card-body py-4">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h1 class="display-4 fw-bold text-danger">{{ $service->service_name }}</h1>
                            <h3 class="mt-3">{{ $service->service_title }}</h3>
                        </div>
                        <div class="col-md-4 text-center text-md-end">
                            <i class="{{ $service->service_icon }} service-icon-large text-danger fs-1"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8">
                    <h2 class="mb-4 text-danger fw-bold">About This Service</h2>
                    <div class="service-description">
                        <h5> {{ $service->service_description }}</h5>
                    </div>
                </div>
            </div>

            {{-- <div class="col-md-5">
                    @if ($service->service_image)
                        <div class="text-center">
                            <img src="{{ $service->service_image }}" alt="{{ $service->service_name }}"
                                class="service-image">
                        </div>
                    @endif
                </div> --}}

            <!-- Features Section -->
            @if (count($serviceIcons) > 0)
                <div class="row">
                    @foreach ($serviceIcons as $icon)
                        <div class="col-md-6 mb-4">
                            <div class="feature-card d-flex align-items-center">
                                <div class="feature-icon-container bg-danger rounded-circle p-3 me-3 text-white">
                                    <i class="{{ $icon->icon }} feature-icon"></i>
                                </div>
                                <div class="feature-text">
                                    <h4 class="mb-1">{{ $icon->icon_heading }}</h4>
                                    <p class="mb-0">{{ $icon->icon_sub_heading }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if ($service->service_image)
                    <div class="row mt-4">
                        <div class="col-6">

                        </div>
                        <div class="col-6">
                            <img src="{{ $service->service_image }}" alt="" class="img-fluid">
                        </div>
                    </div>
                @endif
            @endif

            <!-- Call to Action -->
            <div id="serviceShowOrder" class="container-fluid mt-5 pb-5">
                <div class="cta-section">
                    <div class="row justify-content-center text-center">
                        <div class="col-md-8 mt-5">
                            <h2 class="mb-4">Ready to Get Started?</h2>
                            <p class="lead mb-4">Experience our professional {{ $service->service_name }} service today!</p>
                            <a href="{{ route('serviceOrder', ['service_id' => $service->id]) }}"
                                class="btn btn-danger btn-lg">
                                Order Now
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Back to Services -->
                <div class="text-center mt-5 mb-5">
                    <a href="{{ route('home') }}" class="btn btn-outline-danger">
                        <i class="fas fa-arrow-left me-2"></i> Back to All Services
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
