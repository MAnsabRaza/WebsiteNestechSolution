@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div class="content-wrapper">
        <section class="hero d-flex align-items-center text-white"
            id="homeSection"style="background-image: url('{{ asset('asset/image/Landingpage.png') }}');background-size: cover;background-position: center;height: 100vh;">
            <div class="container-fluid text-left mx-5">
                <div class="row">

                    <div class="col-md-8">
                        <h2 class="display-4 font-weight-bold">
                            Commission-Free Real Estate
                        </h2>
                        <h2 class="display-4 font-weight-bold">
                            Solutions for Pakistan and Beyond
                        </h2>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="search-container px-0">
                            <form method="GET" action="{{ route('applyFilterHome') }}">
                                <div class="row g-0">
                                    <div class="col-md-3 mb-1">
                                        <select class="form-control rounded-0 form-control-lg" name="property_type[]">
                                            <option value="" selected>Property Type</option>
                                            <option value="Commercial">Commercial</option>
                                            <option value="Residential">Residential</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 mb-1">
                                        <select class="form-control rounded-0 form-control-lg" name="postAd_for">
                                            <option value="" selected>Purpose</option>
                                            <option value="Rent">Rent</option>
                                            <option value="Sell">Sell</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 mb-1">
                                        <select class="form-control rounded-0 form-control-lg" name="city">
                                            <option value="" selected>All Cities</option>
                                            <option value="Faisalabad">Faisalabad</option>
                                            <option value="Karachi">Karachi</option>
                                            <option value="Lahore">Lahore</option>
                                            <option value="Islamabad">Islamabad</option>
                                            <option value="Peshawar">Peshawar</option>
                                            <option value="Quetta">Quetta</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-1">
                                        <div class="input-group">
                                            <input type="number" class="form-control rounded-0 form-control-lg"
                                                name="min" placeholder="Min Price" min="0">
                                            <input type="number" class="form-control rounded-0 form-control-lg"
                                                name="max" placeholder="Max Price" min="0">
                                        </div>
                                    </div>
                                    <div class="col-md-1 mb-1">
                                        <button class="btn search-btn text-white w-100 rounded-0 h-100" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>


    <style>
        .bg-gradient-header {
            background: linear-gradient(135deg, #dc3545 0%, #a71d2a 100%);
        }

        .bg-gradient-illustration {
            background: linear-gradient(to bottom right, #e9ecef, #f8f9fa);
        }

        .feature-icon {
            height: 24px;
            width: 24px;
            border-radius: 50%;
            background-color: #d1e7dd;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            flex-shrink: 0;
        }

        .red-underline {
            height: 4px;
            width: 64px;
            background-color: #dc3545;
            margin: 8px auto;
        }

        .nav-tabs .nav-link {
            color: #6c757d;
            border: 1px solid transparent;
        }

        .nav-tabs .nav-link.active {
            color: #dc3545;
            border-color: #dee2e6 #dee2e6 #fff;
        }

        .feature-card {
            aspect-ratio: 1/1;
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        .btn-post-ad {
            border-radius: 50rem;
            padding: 0.75rem 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.2s;
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-post-ad:hover {
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
            background-color: #c82333;
            border-color: #bd2130;
        }
    </style>
    <section class="py-5 bg-light">
        <div class="container px-4 mx-auto" style="max-width: 1140px;">
            <div class="card border-0 shadow">
                <div class="bg-gradient-header text-white text-center py-4 px-4">
                    <h2 class="display-6 fw-bold">
                        Catch Your Property Dreams on Nestech — Unlock the Best Deals Today!
                    </h2>
                    <p class="text-white-50 mt-2">
                        The smart way to buy, sell, rent and tenant properties
                    </p>
                </div>

                <div class="p-0">
                    <div class="row g-0">
                        <!-- Left side image/illustration -->
                        <div class="col-md-5 d-none d-md-flex bg-light align-items-center justify-content-center p-4">
                            <div class="position-relative h-100 w-100">
                                <div
                                    class="position-absolute top-0 start-0 end-0 bottom-0 bg-gradient-illustration rounded d-flex align-items-center justify-content-center">
                                    <div class="row row-cols-2 g-3 p-4 w-100" style="max-width: 300px;">
                                        <div class="col">
                                            <div class="feature-card">
                                                <i class="fas fa-home fs-3 text-secondary mb-2"></i>
                                                <span class="small fw-medium text-secondary">Properties</span>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="feature-card">
                                                <i class="fas fa-dollar-sign fs-3 text-secondary mb-2"></i>
                                                <span class="small fw-medium text-secondary">Investments</span>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="feature-card">
                                                <i class="fas fa-building fs-3 text-secondary mb-2"></i>
                                                <span class="small fw-medium text-secondary">Apartments</span>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="feature-card">
                                                <i class="fas fa-key fs-3 text-secondary mb-2"></i>
                                                <span class="small fw-medium text-secondary">Rentals</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right side tabs -->
                        <div class="col-md-7 p-4 p-md-5">
                            <ul class="nav nav-tabs mb-4 nav-fill" id="propertyTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active py-2 px-3" id="sell-tab" data-bs-toggle="tab"
                                        data-bs-target="#sell" type="button" role="tab" aria-controls="sell"
                                        aria-selected="true">Sell</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link py-2 px-3" id="buy-tab" data-bs-toggle="tab"
                                        data-bs-target="#buy" type="button" role="tab" aria-controls="buy"
                                        aria-selected="false">Buy</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link py-2 px-3" id="rent-tab" data-bs-toggle="tab"
                                        data-bs-target="#rent" type="button" role="tab" aria-controls="rent"
                                        aria-selected="false">Rent</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link py-2 px-3" id="tenant-tab" data-bs-toggle="tab"
                                        data-bs-target="#tenant" type="button" role="tab" aria-controls="tenant"
                                        aria-selected="false">Tenant</button>
                                </li>
                            </ul>

                            <div class="tab-content mt-4" id="propertyTabContent">
                                <!-- Sell Tab -->
                                <div class="tab-pane fade show active" id="sell" role="tabpanel"
                                    aria-labelledby="sell-tab">
                                    <div class="text-center mb-4">
                                        <h3 class="fw-bold text-dark">Post your Ad to Sell</h3>
                                        <div class="red-underline"></div>
                                    </div>

                                    <ul class="list-unstyled mx-auto" style="max-width: 450px;">
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="feature-icon">
                                                <i class="fas fa-check text-success small"></i>
                                            </div>
                                            <span class="text-secondary">Exclusive Portal for Scalable Properties</span>
                                        </li>
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="feature-icon">
                                                <i class="fas fa-check text-success small"></i>
                                            </div>
                                            <span class="text-secondary">Post your Ad for Free in 3 Easy Steps</span>
                                        </li>
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="feature-icon">
                                                <i class="fas fa-check text-success small"></i>
                                            </div>
                                            <span class="text-secondary">Get Genuine offers from Verified Buyers</span>
                                        </li>
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="feature-icon">
                                                <i class="fas fa-check text-success small"></i>
                                            </div>
                                            <span class="text-secondary">Sell your Property Fast at the Best Price</span>
                                        </li>
                                    </ul>

                                    <div class="text-center mt-4">
                                        <a href="{{ route('postAdSell') }}" class="btn btn-danger btn-post-ad">
                                            Post Your Ad
                                        </a>
                                    </div>
                                </div>

                                <!-- Buy Tab -->
                                <div class="tab-pane fade" id="buy" role="tabpanel" aria-labelledby="buy-tab">
                                    <div class="text-center mb-4">
                                        <h3 class="fw-bold text-dark">Post Your Ad for Property You Want to Buy</h3>
                                        <div class="red-underline"></div>
                                    </div>

                                    <ul class="list-unstyled mx-auto" style="max-width: 450px;">
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="feature-icon">
                                                <i class="fas fa-check text-success small"></i>
                                            </div>
                                            <span class="text-secondary">Exclusive Portal for Posting Property
                                                Requirements</span>
                                        </li>
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="feature-icon">
                                                <i class="fas fa-check text-success small"></i>
                                            </div>
                                            <span class="text-secondary">Post your Ad for Free in 3 Easy Steps</span>
                                        </li>
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="feature-icon">
                                                <i class="fas fa-check text-success small"></i>
                                            </div>
                                            <span class="text-secondary">Find and Buy Your Ideal Property at the Best
                                                Price</span>
                                        </li>
                                    </ul>

                                    <div class="text-center mt-4">
                                        <a href="{{ route('postAdBuy') }}" class="btn btn-danger btn-post-ad">
                                            Post an Ad
                                        </a>
                                    </div>
                                </div>

                                <!-- Rent Tab -->
                                <div class="tab-pane fade" id="rent" role="tabpanel" aria-labelledby="rent-tab">
                                    <div class="text-center mb-4">
                                        <h3 class="fw-bold text-dark">Post Your Ad To Rent</h3>
                                        <div class="red-underline"></div>
                                    </div>

                                    <ul class="list-unstyled mx-auto" style="max-width: 450px;">
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="feature-icon">
                                                <i class="fas fa-check text-success small"></i>
                                            </div>
                                            <span class="text-secondary">Exclusive Portal for Posting Rental
                                                Requirements</span>
                                        </li>
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="feature-icon">
                                                <i class="fas fa-check text-success small"></i>
                                            </div>
                                            <span class="text-secondary">Post Your Ad for Free in Just 3 Easy Steps</span>
                                        </li>
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="feature-icon">
                                                <i class="fas fa-check text-success small"></i>
                                            </div>
                                            <span class="text-secondary">Connect with Verified Landlords Instantly</span>
                                        </li>
                                    </ul>

                                    <div class="text-center mt-4">
                                        <a href="{{ route('postAdRent') }}" class="btn btn-danger btn-post-ad">
                                            Find Rentals
                                        </a>
                                    </div>
                                </div>

                                <!-- Tenant Tab -->
                                <div class="tab-pane fade" id="tenant" role="tabpanel" aria-labelledby="tenant-tab">
                                    <div class="text-center mb-4">
                                        <h3 class="fw-bold text-dark">Post Your Ad To Tenant</h3>
                                        <div class="red-underline"></div>
                                    </div>

                                    <ul class="list-unstyled mx-auto" style="max-width: 450px;">
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="feature-icon">
                                                <i class="fas fa-check text-success small"></i>
                                            </div>
                                            <span class="text-secondary">Exclusive Portal for Posting Tenant
                                                Requirements</span>
                                        </li>
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="feature-icon">
                                                <i class="fas fa-check text-success small"></i>
                                            </div>
                                            <span class="text-secondary">Post Your Ad for Free in Just 3 Easy Steps</span>
                                        </li>
                                        <li class="d-flex align-items-start mb-3">
                                            <div class="feature-icon">
                                                <i class="fas fa-check text-success small"></i>
                                            </div>
                                            <span class="text-secondary">Connect with Verified Landlords Instantly</span>
                                        </li>
                                    </ul>

                                    <div class="text-center mt-4">
                                        <a href="{{ route('postAdTenant') }}" class="btn btn-danger btn-post-ad">
                                            Post Your Ad
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section id="post">
        <div class="container mt-4">
            <div class="row">
                <div class="col-12">
                    <div class="card border-light shadow-sm">
                        <div class="card-header bg-white text-center">
                            <h3 class="fw-bold text-dark">Catch Your Property Dreams on Nestech — Unlock the Best Deals
                                Today!</h3>
                        </div>
                        <div class="card-body">
                            <div class="row gy-4">
                                <div class="col-md-3"></div>
                                <div class="col-md-5 offset-md-1 text-center">
                                    <!-- Tab navigation -->
                                    <ul class="nav nav-tabs mb-4 justify-content-center" id="propertyTabs" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="sell-tab" data-bs-toggle="tab"
                                                data-bs-target="#sell" type="button" role="tab" aria-controls="sell"
                                                aria-selected="true">Sell</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="buy-tab" data-bs-toggle="tab"
                                                data-bs-target="#buy" type="button" role="tab" aria-controls="buy"
                                                aria-selected="false">Buy</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="rent-tab" data-bs-toggle="tab"
                                                data-bs-target="#rent" type="button" role="tab" aria-controls="rent"
                                                aria-selected="false">Rent</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="tenant-tab" data-bs-toggle="tab"
                                                data-bs-target="#tenant" type="button" role="tab"
                                                aria-controls="tenant" aria-selected="false">Tenant</button>
                                        </li>
                                    </ul>

                                    <!-- Tab content -->
                                    <div class="tab-content" id="propertyTabContent">
                                        <!-- Sell Tab -->
                                        <div class="tab-pane fade show active" id="sell" role="tabpanel"
                                            aria-labelledby="sell-tab">
                                            <h4 class="text-primary fw-bold mb-3 text-center">Post your Ad to Sell</h4>
                                            <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-10">
                                                    <ul class="list-unstyled">
                                                        <li class="mb-2 d-flex align-items-start">
                                                            <span class="text-success me-2">
                                                                <i class="fas fa-check-circle"></i>
                                                            </span>
                                                            <span>Exclusive Portal for Scalable Properties</span>
                                                        </li>
                                                        <li class="mb-2 d-flex align-items-start">
                                                            <span class="text-success me-2">
                                                                <i class="fas fa-check-circle"></i>
                                                            </span>
                                                            <span>Post your Ad for Free in 3 Easy Steps</span>
                                                        </li>
                                                        <li class="mb-2 d-flex align-items-start">
                                                            <span class="text-success me-2">
                                                                <i class="fas fa-check-circle"></i>
                                                            </span>
                                                            <span>Get Genuine offers from Verified Buyers</span>
                                                        </li>
                                                        <li class="mb-2 d-flex align-items-start">
                                                            <span class="text-success me-2">
                                                                <i class="fas fa-check-circle"></i>
                                                            </span>
                                                            <span>Sell your Property Fast at the Best Price</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="mt-4">
                                                <a href="{{ route('postAdSell') }}"
                                                    class="btn btn-danger btn-lg px-4">Post
                                                    Your Ad</a>
                                            </div>
                                        </div>

                                        <!-- Buy Tab -->
                                        <div class="tab-pane fade" id="buy" role="tabpanel"
                                            aria-labelledby="buy-tab">
                                            <h4 class="text-primary fw-bold mb-3 text-center">Post Your Ad for Property You
                                                Want to Buy</h4>
                                            <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-10">
                                                    <ul class="list-unstyled">
                                                        <li class="mb-2 d-flex align-items-start">
                                                            <span class="text-success me-2">
                                                                <i class="fas fa-check-circle"></i>
                                                            </span>
                                                            <span>Exclusive Portal for Posting Property Requirements</span>
                                                        </li>
                                                        <li class="mb-2 d-flex align-items-start">
                                                            <span class="text-success me-2">
                                                                <i class="fas fa-check-circle"></i>
                                                            </span>
                                                            <span>Post your Ad for Free in 3 Easy Steps</span>
                                                        </li>

                                                        <li class="mb-2 d-flex align-items-start">
                                                            <span class="text-success me-2">
                                                                <i class="fas fa-check-circle"></i>
                                                            </span>
                                                            <span>Find and Buy Your Ideal Property at the Best Price</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <a href="{{ route('postAdBuy') }}" class="btn btn-danger btn-lg px-4">Post
                                                    an Ads</a>
                                            </div>
                                        </div>

                                        <!-- Rent Tab -->
                                        <div class="tab-pane fade" id="rent" role="tabpanel"
                                            aria-labelledby="rent-tab">
                                            <h4 class="text-primary fw-bold mb-3 text-center">Post Your Add To Rent
                                            </h4>
                                            <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-10">
                                                    <ul class="list-unstyled">
                                                        <li class="mb-2 d-flex align-items-start">
                                                            <span class="text-success me-2">
                                                                <i class="fas fa-check-circle"></i>
                                                            </span>
                                                            <span>Exclusive Portal for Posting Rental Requirements</span>
                                                        </li>
                                                        <li class="mb-2 d-flex align-items-start">
                                                            <span class="text-success me-2">
                                                                <i class="fas fa-check-circle"></i>
                                                            </span>
                                                            <span>Post Your Ad for Free in Just 3 Easy Steps</span>
                                                        </li>
                                                        <li class="mb-2 d-flex align-items-start">
                                                            <span class="text-success me-2">
                                                                <i class="fas fa-check-circle"></i>
                                                            </span>
                                                            <span>Connect with Verified Landlords Instantly</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <a href="{{ route('postAdRent') }}"
                                                    class="btn btn-danger btn-lg px-4">Find Rentals</a>
                                            </div>
                                        </div>

                                        <!-- Tenant Tab -->
                                        <div class="tab-pane fade" id="tenant" role="tabpanel"
                                            aria-labelledby="tenant-tab">
                                            <h4 class="text-primary fw-bold mb-3 text-center">Post Your Add To Tenant
                                            </h4>
                                            <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-10">
                                                    <ul class="list-unstyled">
                                                        <li class="mb-2 d-flex align-items-start">
                                                            <span class="text-success me-2">
                                                                <i class="fas fa-check-circle"></i>
                                                            </span>
                                                            <span>Exclusive Portal for Posting Tenant Requirements</span>
                                                        </li>
                                                        <li class="mb-2 d-flex align-items-start">
                                                            <span class="text-success me-2">
                                                                <i class="fas fa-check-circle"></i>
                                                            </span>
                                                            <span>Post Your Ad for Free in Just 3 Easy Steps</span>
                                                        </li>
                                                        <li class="mb-2 d-flex align-items-start">
                                                            <span class="text-success me-2">
                                                                <i class="fas fa-check-circle"></i>
                                                            </span>
                                                            <span>Connect with Verified Landlords Instantly</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <a href="{{ route('postAdTenant') }}"
                                                    class="btn btn-danger btn-lg px-4">Post Your Ads</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- about --}}
    <section id="aboutSection">
        <div class="container-fluid my-4">
            <div class="row my-4">
                <div class="col-md-12">
                    <h2 class="text-center about">About Us</h2>
                </div>
            </div>
            <div class="container">
                <div class="row content-container">
                    <div class="col-md-5">
                        <h2 class="display-5 font-weight-bold">
                            Commission-Free Real Estate Solutions for Pakistan and Beyond
                        </h2>
                        <p class="text-left" style="font-size: 1.4rem">
                            Welcome to NesTech Marketing, where your real estate needs are
                            our priority. We specialize in a wide range of real estate
                            services, including buying, selling, and much more for both
                            Pakistani residents and particularly Overseas Pakistanis,
                            offering a commission-free, fixed-rate model that ensures
                            transparency and removes the uncertainty with real estate
                            transactions. Our services are powered by cutting-edge digital
                            media and supported by top-tier market professionals, providing
                            you with a seamless and trustworthy experience.
                        </p>
                    </div>
                    <div class="col-md-7 img-container">
                        <img src="{{ asset('asset/image/about.png') }}" alt="About Us" class="img-fluid" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- service --}}

    <section id="serviceSection" class="pb-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center service my-4">Our Services</h2>
                </div>
            </div>
            <div class="container">
                <div class="row mt-4 justify-content-center mb-0">
                    @foreach ($service as $services)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-4">
                            <a href="{{ route('showService', ['id' => $services->id]) }}"
                                class="text-decoration-none d-block h-100">
                                <div
                                    class="shadow text-center service-box p-4 d-flex flex-column align-items-center justify-content-center h-100 transition-hover">
                                    <i class="{{ $services->service_icon }} service-icon mb-3"></i>
                                    <p class="service-text mb-0">{{ $services->service_name }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>

    {{-- manage by nestech --}}
    <section class="nestech-properties py-5">
        <div class="container mt-4 mb-5">
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="fw-bold" style="color: rgb(80, 75, 75) !important;">Managed By Nestech</h2>
                        <a href="{{ route('showAllViewNestech') }}" class="view-all-link">View All Manage By Nestech</a>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                @foreach ($posts as $post)
                    <div class="col-md-4 col-lg-15">
                        <div class="property-card h-100">
                            <div class="property-image-container">
                                @if ($post->postAd_images)
                                    <img src="{{ $post->postAd_images }}" class="property-image" alt="Property Image">
                                @elseif (count($post->images) > 0)
                                    <img src="{{ $post->images[0]->image_path }}" class="property-image"
                                        alt="Property Image">
                                @else
                                    <div class="no-image-placeholder">
                                        <i class="fas fa-home"></i>
                                    </div>
                                @endif

                                @if (isset($post->postAd_for))
                                    <div class="property-badge">{{ $post->postAd_for }}</div>
                                @endif
                            </div>

                            <div class="property-details">
                                <h5 class="property-title" title="{{ $post->postAd_address }}">
                                    {{ $post->postAd_address }}</h5>
                                <h6 class="property-price">PKR {{ number_format($post->postAd_price) }}</h6>

                                <div class="property-features">
                                    @if (isset($post->postAd_building_structure))
                                        <div class="feature">
                                            <i class="fas fa-building"></i>
                                            <span>{{ $post->postAd_building_structure }}</span>
                                        </div>
                                    @endif

                                    @if (isset($post->postAd_direction))
                                        <div class="feature">
                                            <i class="fas fa-compass"></i>
                                            <span>{{ $post->postAd_direction }}</span>
                                        </div>
                                    @endif

                                    @if (isset($post->postAd_city))
                                        <div class="feature">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <span>{{ $post->postAd_city }}</span>
                                        </div>
                                    @endif
                                </div>

                                <div class="view-details-btn">
                                    <a href="{{ route('ShowOneAds.detail', $post->id) }}" class="btn btn-view">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <style>
            /* Modern Property Grid Styling */
            .nestech-properties {
                background-color: #f8f9fa;
            }

            .view-all-link {
                color: #ed1537;
                font-weight: 500;
                text-decoration: none;
                transition: all 0.3s ease;
            }

            .view-all-link:hover {
                color: #c01230;
                text-decoration: underline;
            }

            /* Custom 5-column grid */
            .col-lg-15 {
                width: 20%;
            }

            /* Card styling */
            .property-card {
                border-radius: 12px;
                overflow: hidden;
                box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
                transition: all 0.3s ease;
                background: #fff;
                border: none;
                height: 100%;
            }

            .property-card:hover {
                transform: translateY(-10px);
                box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
            }

            /* Image container styling */
            .property-image-container {
                position: relative;
                overflow: hidden;
                height: 220px;
            }

            .property-image {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.5s ease;
            }

            .no-image-placeholder {
                width: 100%;
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                background-color: #f0f0f0;
            }

            .no-image-placeholder i {
                font-size: 3rem;
                color: #aaa;
            }

            .property-card:hover .property-image {
                transform: scale(1.05);
            }

            /* Property badge */
            .property-badge {
                position: absolute;
                top: 15px;
                left: 15px;
                background: #ed1537;
                color: white;
                padding: 5px 12px;
                border-radius: 20px;
                font-size: 0.8rem;
                font-weight: 500;
                z-index: 1;
            }

            /* Property details styling */
            .property-details {
                padding: 20px;
            }

            .property-title {
                font-size: 1.1rem;
                font-weight: 600;
                margin-bottom: 5px;
                color: #333;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .property-price {
                color: #ed1537;
                font-weight: 700;
                margin-bottom: 15px;
            }

            /* Features styling */
            .property-features {
                display: flex;
                flex-wrap: wrap;
                gap: 10px;
                margin-bottom: 15px;
            }

            .feature {
                display: flex;
                align-items: center;
                font-size: 0.85rem;
                color: #666;
                margin-right: 10px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                max-width: 100%;
            }

            .feature span {
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .feature i {
                margin-right: 5px;
                color: #ed1537;
                flex-shrink: 0;
            }

            /* View details button */
            .view-details-btn {
                text-align: center;
                margin-top: 15px;
            }

            .btn-view {
                background-color: #ed1537;
                color: white;
                border: none;
                padding: 8px 20px;
                border-radius: 30px;
                font-weight: 500;
                transition: all 0.3s ease;
                width: 100%;
            }

            .btn-view:hover {
                background-color: #c01230;
                transform: scale(1.05);
                color: white;
            }

            /* Responsive adjustments */
            @media (max-width: 1199px) {
                .col-lg-15 {
                    width: 25%;
                }
            }

            @media (max-width: 991px) {
                .col-lg-15 {
                    width: 33.333%;
                }
            }

            @media (max-width: 767px) {
                .col-lg-15 {
                    width: 50%;
                }

                .property-image-container {
                    height: 180px;
                }
            }

            @media (max-width: 575px) {
                .col-lg-15 {
                    width: 100%;
                }
            }
        </style>
    </section>

    {{-- Property for sell --}}

    <section class="nestech-properties py-5" id="propertySection">
        <div class="container mt-4 mb-5">
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="fw-bold" style="color: rgb(80, 75, 75) !important;">Property For Sell</h2>
                        <a href="{{ route('showAllViewUserSell') }}" class="view-all-link">View All Property For Sell</a>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                @foreach ($userPostSell as $post)
                    <div class="col-md-4 col-lg-15">
                        <div class="property-card h-100">
                            <div class="property-image-container">
                                @if ($post->postAd_images)
                                    <img src="{{ $post->postAd_images }}" class="property-image" alt="Property Image">
                                @elseif (count($post->images) > 0)
                                    <img src="{{ $post->images[0]->image_path }}" class="property-image"
                                        alt="Property Image">
                                @else
                                    <div class="no-image-placeholder">
                                        <i class="fas fa-home"></i>
                                    </div>
                                @endif

                                @if (isset($post->postAd_for))
                                    <div class="property-badge">{{ $post->postAd_for }}</div>
                                @endif
                            </div>

                            <div class="property-details">
                                <h5 class="property-title" title="{{ $post->postAd_address }}">
                                    {{ $post->postAd_address }}</h5>
                                <h6 class="property-price">PKR {{ number_format($post->postAd_price) }}</h6>

                                <div class="property-features">

                                    @if (isset($post->postAd_city))
                                        <div class="feature">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <span>{{ $post->postAd_city }}</span>
                                        </div>
                                    @endif
                                </div>

                                <div class="view-details-btn">
                                    <a href="{{ route('ShowOneAds.detail', $post->id) }}" class="btn btn-view">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Property for Rent --}}

    <section class="nestech-properties py-5">
        <div class="container mt-4 mb-5">
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="fw-bold" style="color: rgb(80, 75, 75) !important;">Property For Rent</h2>
                        <a href="{{ route('showAllViewUserRent') }}" class="view-all-link">View All Property For Sell</a>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                @foreach ($userPostRent as $post)
                    <div class="col-md-4 col-lg-15">
                        <div class="property-card h-100">
                            <div class="property-image-container">
                                @if ($post->postAd_images)
                                    <img src="{{ $post->postAd_images }}" class="property-image" alt="Property Image">
                                @elseif (count($post->images) > 0)
                                    <img src="{{ $post->images[0]->image_path }}" class="property-image"
                                        alt="Property Image">
                                @else
                                    <div class="no-image-placeholder">
                                        <i class="fas fa-home"></i>
                                    </div>
                                @endif

                                @if (isset($post->postAd_for))
                                    <div class="property-badge">{{ $post->postAd_for }}</div>
                                @endif
                            </div>

                            <div class="property-details">
                                <h5 class="property-title" title="{{ $post->postAd_address }}">
                                    {{ $post->postAd_address }}</h5>
                                <h6 class="property-price">PKR {{ number_format($post->postAd_price) }}</h6>

                                <div class="property-features">

                                    @if (isset($post->postAd_city))
                                        <div class="feature">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <span>{{ $post->postAd_city }}</span>
                                        </div>
                                    @endif
                                </div>

                                <div class="view-details-btn">
                                    <a href="{{ route('ShowOneAds.detail', $post->id) }}" class="btn btn-view">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- property for Buy --}}

    <section class="nestech-properties py-5" id="propertySection">
        <div class="container mt-4 mb-5">
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="fw-bold" style="color: rgb(80, 75, 75) !important;">Customer-Centric Properties</h2>
                        <a href="{{ route('showAllViewUserBuy') }}" class="view-all-link">View All Customer-Centric
                            Properties</a>
                    </div>
                </div>
            </div>

            <div class="container mx-auto px-4 py-8">
                <div class="row g-4">
                    @foreach ($userPostBuy as $post)
                        <div class="col-md-4 col-lg-15">
                            <div class="card h-100 property-card shadow-sm hover-shadow transition">
                                <!-- Card header with badge -->
                                <div class="card-header bg-light border-bottom-0 pt-3 pb-0">
                                    @if (isset($post->postAd_for))
                                        <span class="badge bg-danger float-end">
                                            {{ $post->postAd_for }}
                                        </span>
                                    @endif
                                </div>

                                <div class="card-body d-flex flex-column mt-2">
                                    <!-- Description first -->
                                    @if (isset($post->postAd_description))
                                        <p class="card-text text-muted mb-3 description-text">
                                            {{ Str::limit($post->postAd_description, 120) }}
                                        </p>
                                    @endif

                                    <hr class="my-3 text-muted">

                                    <!-- Name -->
                                    @if (isset($post->postAd_name))
                                        <h5 class="card-title fw-bold mb-2">{{ $post->postAd_name }}</h5>
                                    @endif

                                    <!-- Location -->
                                    @if (isset($post->postAd_city))
                                        <div class="d-flex align-items-center mb-3 text-muted">
                                            <i class="fas fa-map-marker-alt me-2"></i>
                                            <span>{{ $post->postAd_city }}</span>
                                        </div>
                                    @endif

                                    <div class="mt-auto pt-2">
                                        <a href="{{ route('ShowOneAdsBuy.detail', $post->id) }}"
                                            class="btn btn-danger w-100 d-flex align-items-center justify-content-center">
                                            View Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- property for tenant --}}
    <section class="nestech-properties py-5">
        <div class="container mt-4 mb-5">
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="fw-bold" style="color: rgb(80, 75, 75) !important;">Tenant-Focused Properties</h2>
                        <a href="{{ route('showAllViewUserTenant') }}" class="view-all-link">View All Tenant-Focused
                            Properties
                        </a>
                    </div>
                </div>
            </div>

            <div class="container mx-auto px-4 py-8">
                <div class="row g-4">
                    @foreach ($userPostTenant as $post)
                        <div class="col-md-4 col-lg-15">
                            <div class="card h-100 property-card shadow-sm hover-shadow transition">
                                <!-- Card header with badge -->
                                <div class="card-header bg-light border-bottom-0 pt-3 pb-0">
                                    @if (isset($post->postAd_for))
                                        <span class="badge bg-danger float-end">
                                            {{ $post->postAd_for }}
                                        </span>
                                    @endif
                                </div>

                                <div class="card-body d-flex flex-column mt-2">
                                    <!-- Description first -->
                                    @if (isset($post->postAd_description))
                                        <p class="card-text text-muted mb-3 description-text">
                                            {{ Str::limit($post->postAd_description, 120) }}
                                        </p>
                                    @endif

                                    <hr class="my-3 text-muted">

                                    <!-- Name -->
                                    @if (isset($post->postAd_name))
                                        <h5 class="card-title fw-bold mb-2">{{ $post->postAd_name }}</h5>
                                    @endif

                                    <!-- Location -->
                                    @if (isset($post->postAd_city))
                                        <div class="d-flex align-items-center mb-3 text-muted">
                                            <i class="fas fa-map-marker-alt me-2"></i>
                                            <span>{{ $post->postAd_city }}</span>
                                        </div>
                                    @endif

                                    <div class="mt-auto pt-2">
                                        <a href="{{ route('ShowOneAdsTenant.detail', $post->id) }}"
                                            class="btn btn-danger w-100 d-flex align-items-center justify-content-center">
                                            View Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    {{-- team --}}

    <section id="teamSection" class="pt-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 my-4">
                    <h2 class="text-center team">Our Team</h2>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row justify-content-center mb-5 pb-5">
                    @foreach ($team as $teams)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 box-hover">
                            <div class="team-member">
                                <img src="{{ $teams->team_image }}" alt="image here"
                                    class="img-fluid rounded-1 shadow" />
                                <div class="team-info">
                                    <h6 class="team-name">{{ $teams->team_name }}</h6>
                                    <h6 class="team-skill">{{ $teams->team_role }}</h6>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- gallery --}}
    <section id="gallerySection">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 my-0">
                    <h2 class="text-center gallery">Gallery</h2>
                </div>
            </div>
            <div class="container">
                <div class="row mt-4 justify-content-center g-3">
                    @foreach ($gallery_image->chunk(4) as $image_row)
                        <div class="row mb-4">
                            @foreach ($image_row as $gallery_images)
                                <div class="col-md-3">
                                    <img src="{{ $gallery_images->gallery_image }}"
                                        alt="{{ $gallery_images->gallery_description }}"
                                        class="card-img-top object-fit-cover rounded w-100">
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    </div>
@endsection
