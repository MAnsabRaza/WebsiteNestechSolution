@extends('layouts.app')
@section('title', 'Post Ad Sell')
@section('content')
    <div class="content-wrapper pt-5 mt-4">
        <section id="postAdd" class="pb-0">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <h2 class="text-center postAddHeading mt-5">Sell Your Property Digitally Across Pakistan!</h2>
                        </div>
                        <div>
                            <h4 class="text-center postAddSubHeading fw-bold mt-3">Choose How To Sell Your Property</h4>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row justify-content-center mt-5">
                        <div class="col-md-5 postAddCardOne mb-4">
                            <h4 class="fw-bold mb-3 text-center postAddHeadingCardOne mt-3">Post your Ad on Nestech</h4>
                            <div>
                                <img src="{{ asset('asset/image/Property selling Services.png') }}" alt=""
                                    class="img-fluid">
                            </div>
                            <div class="d-flex justify-content-center">
                                <ul class="list-unstyled">
                                    <li class="mb-2 d-flex align-items-center">
                                        <span class="text-success me-2">
                                            <i class="fas fa-check-circle"></i>
                                        </span>
                                        <span>Exclusive Portal for Scalable Properties</span>
                                    </li>
                                    <li class="mb-2 d-flex align-items-center">
                                        <span class="text-success me-2">
                                            <i class="fas fa-check-circle"></i>
                                        </span>
                                        <span>Post your Ad for Free in 3 Easy Steps</span>
                                    </li>
                                    <li class="mb-2 d-flex align-items-center">
                                        <span class="text-success me-2">
                                            <i class="fas fa-check-circle"></i>
                                        </span>
                                        <span>Get Genuine offers from Verified Buyers</span>
                                    </li>
                                    <li class="mb-2 d-flex align-items-center">
                                        <span class="text-success me-2">
                                            <i class="fas fa-check-circle"></i>
                                        </span>
                                        <span>Sell your Property Fast at the Best Price</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="mt-4 mb-4 text-center">
                                @auth
                                    <a href="{{ route('madePostAdSell') }}" class="btn btn-danger btn-lg px-4">Post Your Ad</a>
                                @else
                                    <a href="javascript:void(0)" class="btn btn-danger btn-lg px-4" data-bs-toggle="modal"
                                        data-bs-target="#loginModal">Post Your Ad</a>
                                @endauth
                            </div>
                        </div>

                        <div class="col-md-5 postAddCardOne mb-4 ms-md-4">
                            <h4 class="fw-bold mb-3 text-center postAddHeadingCardOne mt-3">Try Nestech Sell It For Me</h4>
                            <div>
                                <img src="{{ asset('asset/image/Property valuation.png') }}" alt=""
                                    class="img-fluid">
                            </div>
                            <div class="d-flex justify-content-center">
                                <ul class="list-unstyled">
                                    <li class="mb-2">
                                        <div class="d-flex align-items-center">
                                            <span class="text-success me-2"><i class="fas fa-check-circle"></i></span>
                                            <span>Dedicated Sales Expert to Sell your Property</span>
                                        </div>
                                    </li>
                                    <li class="mb-2">
                                        <div class="d-flex align-items-center">
                                            <span class="text-success me-2"><i class="fas fa-check-circle"></i></span>
                                            <span>We Bargain for you and share the Best Offer</span>
                                        </div>
                                    </li>
                                    <li class="mb-2">
                                        <div class="d-flex align-items-center">
                                            <span class="text-success me-2"><i class="fas fa-check-circle"></i></span>
                                            <span>We ensure Safe & Secure Transaction</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="mt-4 mb-4 text-center">
                                <a class="btn btn-danger btn-lg px-4" data-bs-toggle="modal"
                                    data-bs-target="#registerPropertyModel">Sell It For Me</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Register Property For Sell --}}

        <div class="modal fade" id="registerPropertyModel" tabindex="-1" aria-labelledby="registerPropertyModelLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content shadow-lg border-0 rounded-4">
                    <div class="modal-header bg-danger text-white">
                        <h4 class="modal-title fw-bold" id="registerPropertyModelLabel">
                            🏠 Why Sell Your Property with Nestech?
                        </h4>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center py-4">
                        <div class="container">
                            <div class="row mb-5">
                                <div class="col-md-8">
                                    <div class="service-description">
                                        <h5>Our professional property selling services are designed to connect you with the
                                            right
                                            buyers, maximizing your property’s market potential in a timely manner. We focus
                                            on
                                            securing the best price through a precise and efficient process.
                                            Here’s what we offer:</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="feature-card d-flex align-items-center">
                                        <div class="feature-icon-container bg-danger rounded-circle p-3 me-3 text-white">
                                            <i class="fas fa-chart-line feature-icon"></i> <!-- Market valuation -->
                                        </div>
                                        <div class="feature-text">
                                            <h4 class="mb-1">Comprehensive Market Valuation</h4>
                                            <p class="mb-0">Accurate property pricing based on market insights.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="feature-card d-flex align-items-center">
                                        <div class="feature-icon-container bg-danger rounded-circle p-3 me-3 text-white">
                                            <i class="fas fa-bullseye feature-icon"></i> <!-- Targeting -->
                                        </div>
                                        <div class="feature-text">
                                            <h4 class="mb-1">Strategic Buyer Targeting</h4>
                                            <p class="mb-0">Reaching the right audience for your property.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="feature-card d-flex align-items-center">
                                        <div class="feature-icon-container bg-danger rounded-circle p-3 me-3 text-white">
                                            <i class="fas fa-bullhorn feature-icon"></i> <!-- Marketing -->
                                        </div>
                                        <div class="feature-text">
                                            <h4 class="mb-1">Optimized Listing and Marketing</h4>
                                            <p class="mb-0">Effective promotion across the right channels.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="feature-card d-flex align-items-center">
                                        <div class="feature-icon-container bg-danger rounded-circle p-3 me-3 text-white">
                                            <i class="fas fa-tachometer-alt feature-icon"></i> <!-- Fast/speed -->
                                        </div>
                                        <div class="feature-text">
                                            <h4 class="mb-1">Accelerated Sales Process</h4>
                                            <p class="mb-0">Ensuring a quick and smooth sale.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="feature-card d-flex align-items-center">
                                        <div class="feature-icon-container bg-danger rounded-circle p-3 me-3 text-white">
                                            <i class="fas fa-handshake feature-icon"></i> <!-- Negotiation -->
                                        </div>
                                        <div class="feature-text">
                                            <h4 class="mb-1">Expert Negotiation Tactics</h4>
                                            <p class="mb-0">Securing the best deal for you.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-5 col-sm-12">
                                    <div class="alert alert-danger p-4 d-flex align-items-center" role="alert">
                                        <i class="bi bi-telephone-fill fs-1 me-3"></i>
                                        <div>
                                            <h5 class="mb-1">Contact us today to get started!</h5>
                                            <a href="tel:+923086638369"
                                                class="fs-4 fw-bold text-danger text-decoration-none">+92 3086638369</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-7 col-sm-12">
                                    <img src="{{ asset('asset/image/Property selling Services.png') }}" alt=""
                                        class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 justify-content-center bg-light py-3">
                        <button type="button" class="btn btn-secondary rounded-pill px-4 me-2" data-bs-dismiss="modal">
                            Close
                        </button>

                    </div>
                </div>
            </div>
        </div>


        <!-- Login Modal -->
        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content shadow-lg border-0 rounded-4">
                    <div class="modal-header bg-light">
                        <h4 class="modal-title text-danger fw-bold" id="loginModalLabel">
                            🚫 Please Log In to Sell Your Property
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center py-4">
                        <p class="fs-5 text-muted">To continue, please log in or create an account.</p>

                        <div class="d-flex justify-content-center gap-4 mt-4">
                            <a href="{{ route('login') }}" class="btn btn-outline-danger px-4 py-2 fw-bold">
                                🔐 Login
                            </a>
                            <a href="{{ route('register') }}" class="btn btn-danger px-4 py-2 fw-bold">
                                ✍️ Register
                            </a>
                        </div>
                    </div>
                    <div class="modal-footer border-0 justify-content-center">
                        <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <section>
            <div class="container-fluid mt-5">
                <div class="row mt-5">
                    <div class="col-md-12">
                        <div>
                            <h2 class="text-left fw-bold mt-2 ms-5" style="color: rgb(80, 75, 75) !important">Why Sell
                                Your
                                Property On Nestech</h2>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row mt-5 my-5">
                        <div class="col-6 col-md-3 mb-4 d-flex justify-content-center mt-5">
                            <div class="card text-center border-0 shadow-md rounded-4 whySellCard"
                                style="max-width: 250px;">
                                <div class="whySellCardCircle position-absolute start-40 translate-x-n40">
                                    <h4 class="fw-bold mb-0">Visibility</h4>
                                </div>
                                <div class="card-body py-3" style="padding-top: 3.5rem !important;">
                                    <p class="mb-0">Reach thousands of buyers daily</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 mb-4 d-flex justify-content-center mt-5">
                            <div class="card text-center border-0 shadow-md rounded-4 whySellCard"
                                style="max-width: 250px;">
                                <div class="whySellCardCircle position-absolute start-40 translate-x-n40">
                                    <h4 class="fw-bold mb-0">Trust</h4>
                                </div>
                                <div class="card-body py-3" style="padding-top: 3.5rem !important;">
                                    <p class="mb-0">Verified listings, secure platform</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 mb-4 d-flex justify-content-center mt-5">
                            <div class="card text-center border-0 shadow-md rounded-4 whySellCard"
                                style="max-width: 250px;">
                                <div class="whySellCardCircle position-absolute start-40 translate-x-n40">
                                    <h4 class="fw-bold mb-0">Ease</h4>
                                </div>
                                <div class="card-body py-3" style="padding-top: 3.5rem !important;">
                                    <p class="mb-0">Quick and simple listing process</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 mb-4 d-flex justify-content-center mt-5">
                            <div class="card text-center border-0 shadow-md rounded-4 whySellCard"
                                style="max-width: 250px;">
                                <div class="whySellCardCircle position-absolute start-40 translate-x-n40">
                                    <h4 class="fw-bold mb-0">Support</h4>
                                </div>
                                <div class="card-body py-3" style="padding-top: 3.5rem !important;">
                                    <p class="mb-0">24/7 help for smooth sales</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </section>
        <section id="sellPropertyQuickly">
            <div class="container-fluid mt-5">
                <div class="row mt-5">
                    <div class="col-md-12">
                        <div>
                            <h2 class="text-left fw-bold mt-5 ms-5" style="color: rgb(80, 75, 75) !important">3 Step To
                                Sell Your Property</h2>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row mt-3">
                        <div class="col-6 col-md-4 mb-4 d-flex justify-content-center mt-5">
                            <div class="card threeStepToSell">
                                <div class="card-body">
                                    <div class="text-center iconColorSellPropertyQuickly">
                                        <i class="fas fa-user-plus fa-5x"></i>
                                    </div>
                                    <div class="justify-content-center text-center mt-1">
                                        <h2 class="mt-3 fw-bold">Sign Up</h2>
                                        <p class="mt-1">Register yourself on Nestech.com to post an ad</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 mb-4 d-flex justify-content-center mt-5">
                            <div class="card threeStepToSell">
                                <div class="card-body">
                                    <div class="text-center iconColorSellPropertyQuickly">
                                        <i class="fas fa-user-edit fa-5x"></i>
                                    </div>
                                    <div class="justify-content-center text-center mt-1">
                                        <h2 class="mt-3 fw-bold">Create Ad</h2>
                                        <p class="mt-1">Share detailed information and upload a clear, high-quality photo
                                            to attract more buyers</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 mb-4 d-flex justify-content-center mt-5">
                            <div class="card threeStepToSell">
                                <div class="card-body">
                                    <div class="text-center iconColorSellPropertyQuickly">
                                        <i class="fas fa-tag fa-5x"></i>
                                    </div>
                                    <div class="justify-content-center text-center mt-1">
                                        <h2 class="fw-bold mt-3">Quick Offers</h2>
                                        <p class="mt-1">Relax while genuine buyers send you competitive offers instantly.
                                        </p>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <section id="">
            <div class="container-fluid mt-5">
                <div class="row mt-5">
                    <div class="col-md-12">
                        <div>
                            <h2 class="text-left fw-bold mt-5 ms-5" style="color: rgb(80, 75, 75) !important">How To Sell
                                Your Property Quickly</h2>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row mt-3">
                        <div class="col-6 col-md-4 mb-4 d-flex justify-content-center mt-5">
                            <div class="card sellPropertyQuicklyCard rounded-4 shadow-md">
                                <div class="card-body">
                                    <div class="text-center iconColorSellPropertyQuickly">
                                        <i class="fas fa-camera fa-2x"></i>
                                    </div>
                                    <div class="justify-content-center text-center mt-1">
                                        <p class="fw-bold">Upload Good Quality Picture</p>
                                        <p>Upload clear and bright photos to show your property better. Good pictures help
                                            attract more buyers fast</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 mb-4 d-flex justify-content-center mt-5">
                            <div class="card sellPropertyQuicklyCard rounded-4 shadow-md">
                                <div class="card-body">
                                    <div class="text-center iconColorSellPropertyQuickly">
                                        <i class="fas fa-bed fa-2x"></i>
                                    </div>
                                    <div class="justify-content-center text-center mt-1">
                                        <p class="fw-bold">Feature Your Ad</p>
                                        <p>Make your property stand out at the top of search results. Get more views and
                                            faster responses by featuring your ad.</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 mb-4 d-flex justify-content-center mt-5">
                            <div class="card sellPropertyQuicklyCard rounded-4 shadow-md">
                                <div class="card-body">
                                    <div class="text-center iconColorSellPropertyQuickly">
                                        <i class="fas fa-file-lines fa-2x"></i>
                                    </div>
                                    <div class="justify-content-center text-center mt-1">
                                        <p class="fw-bold">Provide the Official Auction Record</p>
                                        <p>Make sure your property has complete and verified paper sheets.Clear documents
                                            help build trust and speed up the selling process.</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>


    </div>
@endsection
