@extends('layouts.app')
@section('title', 'Post Ad Rent')
@section('content')
    <div class="content-wrapper pt-5 mt-4">
        <section id="postAdd" class="pb-0">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <h2 class="text-center postAddHeading mt-5">Rent Your Property Digitally Across Pakistan!</h2>
                        </div>
                        <div>
                            <h4 class="text-center postAddSubHeading fw-bold mt-3">Choose How To Rent Your Property</h4>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row justify-content-center mt-5">
                        <div class="col-md-5 postAddCardOne mb-4">
                            <h4 class="fw-bold mb-3 text-center postAddHeadingCardOne mt-3">Post your Ad on Nestech</h4>
                            <div>
                                <img src="{{ asset('asset/image/Property rental service.png') }}" alt=""
                                    class="img-fluid">
                            </div>
                            <div class="d-flex justify-content-center">
                                <ul class="list-unstyled">
                                    <li class="mb-2 d-flex align-items-center">
                                        <span class="text-success me-2">
                                            <i class="fas fa-check-circle"></i>
                                        </span>
                                        <span>Exclusive Portal for Posting Rental Requirements</span>
                                    </li>
                                    <li class="mb-2 d-flex align-items-center">
                                        <span class="text-success me-2">
                                            <i class="fas fa-check-circle"></i>
                                        </span>
                                        <span>Post Your Ad for Free in Just 3 Easy Steps</span>
                                    </li>
                                    <li class="mb-2 d-flex align-items-center">
                                        <span class="text-success me-2">
                                            <i class="fas fa-check-circle"></i>
                                        </span>
                                        <span>Connect with Verified Landlords Instantly</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="mt-4 mb-4 text-center">
                                @auth
                                    <a href="{{ route('madePostAdRent') }}" class="btn btn-danger btn-lg px-4">Post Your Ad</a>
                                @else
                                    <a href="javascript:void(0)" class="btn btn-danger btn-lg px-4" data-bs-toggle="modal"
                                        data-bs-target="#loginModal">Post Your Ad</a>
                                @endauth
                            </div>
                        </div>

                        <div class="col-md-5 postAddCardOne mb-4 ms-md-4">
                            <h4 class="fw-bold mb-3 text-center postAddHeadingCardOne mt-3">Try Nestech Rent It For Me</h4>
                            <div>
                                <img src="{{ asset('asset/image/Property Transfer.png') }}" alt=""
                                    class="img-fluid">
                            </div>
                            <div class="d-flex justify-content-center">
                                <ul class="list-unstyled">
                                    <li class="mb-2">
                                        <div class="d-flex align-items-center">
                                            <span class="text-success me-2"><i class="fas fa-check-circle"></i></span>
                                            <span>Dedicated Sales Expert to Rent your Property</span>
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
                                    data-bs-target="#registerPropertyModel">Rent It For Me</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Register for Rent --}}
        <div class="modal fade" id="registerPropertyModel" tabindex="-1" aria-labelledby="registerPropertyModelLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content shadow-lg border-0 rounded-4">
                    <div class="modal-header bg-danger text-white">
                        <h4 class="modal-title fw-bold" id="registerPropertyModelLabel">
                            🏠 Why Rent Your Property with Nestech?
                        </h4>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center py-4">
                        <div class="container">
                            <div class="row mb-5">
                                <div class="col-md-8">
                                    <div class="service-description">
                                        <h5>We provide expert rental management services that ensure a smooth experience for
                                            both
                                            landlords and tenants. Whether you’re renting out your property or searching for
                                            the ideal rental,
                                            our comprehensive services cover everything from tenant placement to property
                                            care.
                                            Here’s what we offer:</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="feature-card d-flex align-items-center">
                                        <div class="feature-icon-container bg-danger rounded-circle p-3 me-3 text-white">
                                            <i class="fas fa-user-check feature-icon"></i>
                                        </div>
                                        <div class="feature-text">
                                            <h4 class="mb-1">Fast Tenant Placement</h4>
                                            <p class="mb-0">Finding reliable tenants quickly.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="feature-card d-flex align-items-center">
                                        <div class="feature-icon-container bg-danger rounded-circle p-3 me-3 text-white">
                                            <i class="fas fa-home feature-icon"></i>
                                        </div>
                                        <div class="feature-text">
                                            <h4 class="mb-1">Smart Property Matching</h4>
                                            <p class="mb-0">Helping tenants find the perfect rental.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="feature-card d-flex align-items-center">
                                        <div class="feature-icon-container bg-danger rounded-circle p-3 me-3 text-white">
                                            <i class="fas fa-tags feature-icon"></i>
                                        </div>
                                        <div class="feature-text">
                                            <h4 class="mb-1">Fair Rent Pricing</h4>
                                            <p class="mb-0">Ensuring fair and competitive rent rates.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="feature-card d-flex align-items-center">
                                        <div class="feature-icon-container bg-danger rounded-circle p-3 me-3 text-white">
                                            <i class="fas fa-file-signature feature-icon"></i>
                                        </div>
                                        <div class="feature-text">
                                            <h4 class="mb-1">Simple Rental Agreements</h4>
                                            <p class="mb-0">Simplifying the legal process.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="feature-card d-flex align-items-center">
                                        <div class="feature-icon-container bg-danger rounded-circle p-3 me-3 text-white">
                                            <i class="fas fa-headset feature-icon"></i>
                                        </div>
                                        <div class="feature-text">
                                            <h4 class="mb-1">Ongoing Support</h4>
                                            <p class="mb-0">Ongoing assistance for any issues.</p>
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
                                    <img src="{{ asset('asset/image/Property rental service.png') }}" alt=""
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
                            🚫 Please Log In to Rent Your Property
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
                            <h2 class="text-left fw-bold mt-2 ms-5" style="color: rgb(80, 75, 75) !important">Why Rent
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
                            <h2 class="text-left fw-bold mt-5 ms-5" style="color: #ed1537 !important">3 Steps To Rent Your
                                Property</h2>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row mt-3">
                        <div class="col-6 col-md-4 mb-4 d-flex justify-content-center mt-5">
                            <div class="card threeStepToSell shadow-lg"
                                style="border-radius: 15px; border-top: 5px solid #ed1537;">
                                <div class="card-body">
                                    <div class="text-center" style="color: #ed1537;">
                                        <i class="fas fa-user-plus fa-5x"></i>
                                    </div>
                                    <div class="justify-content-center text-center mt-1">
                                        <h2 class="mt-3 fw-bold">Sign Up</h2>
                                        <p class="mt-1">Register yourself on Nestech.com to list your rental property</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 mb-4 d-flex justify-content-center mt-5">
                            <div class="card threeStepToSell shadow-lg"
                                style="border-radius: 15px; border-top: 5px solid #ed1537;">
                                <div class="card-body">
                                    <div class="text-center" style="color: #ed1537;">
                                        <i class="fas fa-home fa-5x"></i>
                                    </div>
                                    <div class="justify-content-center text-center mt-1">
                                        <h2 class="mt-3 fw-bold">List Property</h2>
                                        <p class="mt-1">Create a detailed listing with attractive photos and competitive
                                            rental price</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 mb-4 d-flex justify-content-center mt-5">
                            <div class="card threeStepToSell shadow-lg"
                                style="border-radius: 15px; border-top: 5px solid #ed1537;">
                                <div class="card-body">
                                    <div class="text-center" style="color: #ed1537;">
                                        <i class="fas fa-handshake fa-5x"></i>
                                    </div>
                                    <div class="justify-content-center text-center mt-1">
                                        <h2 class="fw-bold mt-3">Get Tenants</h2>
                                        <p class="mt-1">Receive inquiries from verified tenants and finalize your rental
                                            agreement</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <section id="">
            <div class="container-fluid">
                <div class="row mt-5">
                    <div class="col-md-12">
                        <div>
                            <h2 class="text-left fw-bold ms-5" style="color: #ed1537 !important">How To Find Quality
                                Tenants Quickly</h2>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row mt-4">
                        <div class="col-6 col-md-4 mb-4 d-flex justify-content-center mt-4">
                            <div class="card sellPropertyQuicklyCard rounded-4 shadow-lg border-0">
                                <div class="card-body">
                                    <div class="text-center" style="color: #ed1537;">
                                        <i class="fas fa-images fa-2x"></i>
                                    </div>
                                    <div class="justify-content-center text-center mt-3">
                                        <p class="fw-bold">Showcase Your Property Well</p>
                                        <p>Upload high-quality images showing all rooms, amenities, and views to attract
                                            serious tenants</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 mb-4 d-flex justify-content-center mt-4">
                            <div class="card sellPropertyQuicklyCard rounded-4 shadow-lg border-0">
                                <div class="card-body">
                                    <div class="text-center" style="color: #ed1537;">
                                        <i class="fas fa-star fa-2x"></i>
                                    </div>
                                    <div class="justify-content-center text-center mt-3">
                                        <p class="fw-bold">Highlight Key Features</p>
                                        <p>Emphasize amenities, nearby facilities, and special features that make your
                                            property stand out</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 mb-4 d-flex justify-content-center mt-4">
                            <div class="card sellPropertyQuicklyCard rounded-4 shadow-lg border-0">
                                <div class="card-body">
                                    <div class="text-center" style="color: #ed1537;">
                                        <i class="fas fa-file-contract fa-2x"></i>
                                    </div>
                                    <div class="justify-content-center text-center mt-3">
                                        <p class="fw-bold">Be Clear About Terms</p>
                                        <p>Provide transparent rental terms, security deposit requirements, and policies for
                                            a smoother rental process</p>
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
