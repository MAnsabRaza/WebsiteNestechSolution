@extends('layouts.app')

@section('title', 'Become a Dealer - PropertyVista')

@section('content')
    <!-- Header Section -->
    <section class="property-listings-page bg-gradient-header py-5 text-white">
        <div class="container py-5 ">
            <div class="row pt-5">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-4">Become a PropertyVista Dealer</h1>
                    <p class="lead mb-4">
                        Join our network of professional property dealers and unlock new opportunities to grow your business
                        and connect with potential clients.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Benefits Section -->
    <section class="py-5 deallerBenefits">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fs-1 fw-bold mb-3">Benefits of Becoming a Dealer</h2>
                <p class="text-secondary mx-auto" style="max-width: 700px;">
                    Join our exclusive network and enjoy numerous benefits designed to boost your real estate business
                </p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm hover-shadow">
                        <div class="card-body p-4 text-center">
                            <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center mx-auto mb-4"
                                style="width: 70px; height: 70px;">
                                <i class="fas fa-globe text-danger fs-4"></i>
                            </div>
                            <h3 class="fs-4 fw-bold mb-3">Wider Network</h3>
                            <p class="text-secondary">Access to our extensive network of property buyers, sellers, and
                                investors looking for trusted dealers.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm hover-shadow">
                        <div class="card-body p-4 text-center">
                            <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center mx-auto mb-4"
                                style="width: 70px; height: 70px;">
                                <i class="fas fa-money-bill-wave text-danger fs-4"></i>
                            </div>
                            <h3 class="fs-4 fw-bold mb-3">Higher Commissions</h3>
                            <p class="text-secondary">Enjoy competitive commission structures and bonus incentives for
                                high-performing dealers.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm hover-shadow">
                        <div class="card-body p-4 text-center">
                            <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center mx-auto mb-4"
                                style="width: 70px; height: 70px;">
                                <i class="fas fa-bullhorn text-danger fs-4"></i>
                            </div>
                            <h3 class="fs-4 fw-bold mb-3">Premium Marketing</h3>
                            <p class="text-secondary">Get featured on our platform and benefit from our extensive marketing
                                campaigns to attract more clients.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5 bg-light">
        <div class="container">
            {{-- Header Section --}}
            <div class="row">
                <div class="col-md-12 my-4 text-center">
                    <h1 class="display-5 fw-bold text-dark mb-4">Our Trusted Dealers Network</h1>

                    {{-- Decorative Underline --}}
                    <div class="d-flex justify-content-center mb-4">
                        <div class="bg-danger rounded" style="height: 4px; width: 100px;"></div>
                    </div>

                    {{-- Descriptive Subtext --}}
                    <p class="lead text-muted mx-auto" style="max-width: 800px;">
                        Discover our extensive network of professional dealers committed to delivering exceptional service
                        and unparalleled support across the country.
                    </p>
                </div>
            </div>

            {{-- Dealers Grid --}}
            <div class="row g-4">
                @forelse($dealers as $dealer)
                    <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                        <div class="card h-100 border-0 shadow-lg transform-on-hover transition-all duration-300">
                            {{-- Dealer Image Container --}}
                            <div class="position-relative overflow-hidden" style="height: 250px;">
                                @if ($dealer->dealer_image)
                                    <img src="{{ $dealer->dealer_image }}" alt="{{ $dealer->dealer_name }} Dealer Office"
                                        class="card-img-top object-fit-cover w-100 h-100 scale-on-hover">
                                @else
                                    <div class="d-flex justify-content-center align-items-center h-100 bg-light">
                                        <i class="bi bi-building text-secondary" style="font-size: 5rem;"></i>
                                    </div>
                                @endif

                                {{-- Overlay Badge --}}
                                <div class="position-absolute top-0 end-0 m-3">
                                    <span class="badge bg-danger">Verified</span>
                                </div>
                            </div>

                            {{-- Card Body --}}
                            <div class="card-body p-4">
                                <h5 class="card-title fw-bold mb-3 text-dark">
                                    {{ $dealer->dealer_name }}
                                </h5>

                                {{-- Dealer Details --}}
                                <div class="mb-3">
                                    {{-- Phone --}}
                                    @if ($dealer->dealer_phone)
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="fas fa-phone text-danger me-2"></i>
                                            <span class="text-muted">{{ $dealer->dealer_phone }}</span>
                                        </div>
                                    @endif

                                    {{-- City --}}
                                    @if ($dealer->dealer_city)
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="fas fa-flag text-danger me-2"></i>
                                            <span class="text-muted">
                                                {{ $dealer->dealer_city }}{{ $dealer->dealer_country ? ', ' . $dealer->dealer_country : '' }}
                                            </span>
                                        </div>
                                    @endif

                                    {{-- Office Address --}}
                                    @if ($dealer->dealer_office_address)
                                        <div class="d-flex align-items-start">
                                            <i class="fas fa-building text-danger me-2 mt-1"></i>
                                            <span class="text-muted text-truncate">
                                                {{ $dealer->dealer_office_address }}
                                            </span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <div class="alert alert-info" role="alert">
                            <i class="bi bi-info-circle me-2"></i>
                            No dealers are currently available in our network.
                        </div>
                    </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            <div class="row mt-5">
                <div class="col-12 d-flex justify-content-center">
                    {{ $dealers->links('pagination::Tailwind') }}
                </div>
            </div>
        </div>
    </section>

    {{-- Optional: Contact Dealer Modal (for each dealer) --}}
    @foreach ($dealers as $dealer)
        <div class="modal fade" id="contactDealerModal-{{ $dealer->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h5 class="modal-title">Contact {{ $dealer->dealer_name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Your Name</label>
                                <input type="text" class="form-control" placeholder="Enter your name">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Your Email</label>
                                <input type="email" class="form-control" placeholder="Enter your email">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Message</label>
                                <textarea class="form-control" rows="4" placeholder="Your message to the dealer"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger">Send Message</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- Optional CSS for Enhanced Hover Effects --}}
    <style>
        .transform-on-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .transform-on-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
        }

        .scale-on-hover {
            transition: transform 0.3s ease;
        }

        .scale-on-hover:hover {
            transform: scale(1.05);
        }
    </style>



    <!-- FAQ Section -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fs-1 fw-bold mb-3">Frequently Asked Questions</h2>
                <p class="text-secondary mx-auto" style="max-width: 700px;">
                    Everything you need to know about becoming a PropertyVista dealer
                </p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="dealerFAQ">
                        <div class="accordion-item border-0 mb-3 shadow-sm">
                            <h2 class="accordion-header" id="heading1">
                                <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                    What are the requirements to become a dealer?
                                </button>
                            </h2>
                            <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="heading1"
                                data-bs-parent="#dealerFAQ">
                                <div class="accordion-body text-secondary">
                                    You need to have a valid real estate license, at least 2 years of
                                    experience in property
                                    sales, and a proven track record of successful transactions.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 mb-3 shadow-sm">
                            <h2 class="accordion-header" id="heading2">
                                <button class="accordion-button collapsed fw-bold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false"
                                    aria-controls="collapse2">
                                    How long does the application process take?
                                </button>
                            </h2>
                            <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2"
                                data-bs-parent="#dealerFAQ">
                                <div class="accordion-body text-secondary">
                                    Once you submit your application, our team will review it within 2-3
                                    business days. If
                                    approved, you'll be contacted for an interview and onboarding process.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 mb-3 shadow-sm">
                            <h2 class="accordion-header" id="heading3">
                                <button class="accordion-button collapsed fw-bold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false"
                                    aria-controls="collapse3">
                                    What commission structure do you offer?
                                </button>
                            </h2>
                            <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3"
                                data-bs-parent="#dealerFAQ">
                                <div class="accordion-body text-secondary">
                                    Our dealers enjoy competitive commission rates starting at 2.5% for
                                    residential
                                    properties and 3% for commercial properties, with additional bonuses for
                                    high
                                    performers.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 shadow-sm">
                            <h2 class="accordion-header" id="heading4">
                                <button class="accordion-button collapsed fw-bold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false"
                                    aria-controls="collapse4">
                                    Do I need to pay any fees to join?
                                </button>
                            </h2>
                            <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4"
                                data-bs-parent="#dealerFAQ">
                                <div class="accordion-body text-secondary">
                                    There are no application or joining fees. PropertyVista operates on a
                                    commission-based
                                    model, ensuring our interests are aligned with your success.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5 bg-gradient-header text-white">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h2 class="fs-1 fw-bold mb-4">Ready to Grow Your Real Estate Business?</h2>
                    <p class="lead mb-4">
                        Join PropertyVista's exclusive network of dealers and take your business to the next
                        level
                    </p>
                    <a href="{{ route('becomeADealer') }}" class="btn btn-light btn-lg fw-bold px-5 py-3">
                        <i class="bi bi-person-plus me-2"></i> Become a Dealer Today
                    </a>
                </div>
            </div>
        </div>
    </section>
    <style>
        .property-details-page {
            background-color: #f8f9fa;
        }

        .bg-gradient-header {
            background: linear-gradient(135deg, #dc3545 0%, #a71d2a 100%);
        }
    </style>

@endsection
