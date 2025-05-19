<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('asset/CSS/style.css') }}">

    <style>
        .nav-item.dropdown:hover .dropdown-menu {
            display: block;
            margin-top: 0;
        }

        .service-dropdown .dropdown-menu {
            width: 600px;
            padding: 15px;
        }

        .service-dropdown .dropdown-menu .row {
            display: flex;
            flex-wrap: nowrap;
            justify-content: space-between;
        }

        .service-dropdown .dropdown-item {
            text-align: center;
            padding: 10px;
            flex: 1;
            margin: 0 5px;
            transition: background-color 0.2s;
        }

        .service-dropdown .dropdown-item:hover {
            background-color: #f8f9fa;
        }

        .service-dropdown .dropdown-item i {
            display: block;
            font-size: 1.5rem;
            margin-bottom: 5px;
            color: #dc3545;
        }

        @media (max-width: 991px) {
            .nav-item.dropdown .dropdown-menu {
                display: none;
            }

            .nav-item.dropdown.show .dropdown-menu {
                display: block;
            }
        }
    </style>

</head>

<body>
    <div class="wrapper">
        <nav class="navbar navbar-expand-lg bg-white fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold" href="#homeSection">
                    <img src="{{ asset('asset/image/NesTech-logo.png') }}" alt="Logo" width="200" height="60"
                        class="d-inline-block align-text-top" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <ul class="navbar-nav mx-auto fw-bold">
                        <li class="nav-item">
                            <a class="nav-link nav-link active mx-1 nav-close" aria-current="page"
                                href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item dropdown service-dropdown">
                            <a class="nav-link dropdown-toggle mx-1" href="#" id="serviceDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Service
                            </a>
                            <div class="dropdown-menu" aria-labelledby="serviceDropdown">
                                <div class="row">
                                    @foreach ($services as $service)
                                        <a class="dropdown-item"
                                            href="{{ route('showService', ['id' => $service->id]) }}">
                                            <i class="{{ $service->service_icon }}"></i>{{ $service->service_name }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </li>


                        <li class="nav-item">

                            <a class="nav-link active mx-1 nav-close" aria-current="page"
                                href="{{ route('showAllSellPropery') }}">Sell</a>
                        </li>
                        <li class="nav-item">

                            <a class="nav-link active mx-1 nav-close" aria-current="page"
                                href="{{ route('showAllBuyPropery') }}">Buy</a>
                        </li>
                        <li class="nav-item">

                            <a class="nav-link active mx-1 nav-close" aria-current="page"
                                href="{{ route('showAllRentPropery') }}">Rent</a>
                        </li>
                        <li class="nav-item">

                            <a class="nav-link active mx-1 nav-close" aria-current="page"
                                href="{{ route('showAllTenantPropery') }}">Tenant</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active mx-1 nav-close" aria-current="page"
                                href="{{ route('dealer') }}">Dealer</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link active mx-1 nav-close" aria-current="page"
                                href="{{ route('blog') }}">Blog</a>
                        </li>

                        <li class="ml-5">
                            <div class="d-flex flex-wrap">
                                <div class="dropdown">
                                    <button class="btn btn-danger btn-lg dropdown-toggle" type="button"
                                        id="postAdDropdown" data-bs-toggle="dropdown" aria-expanded="false"
                                        style="min-width: 120px">
                                        Post an Ad
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="postAdDropdown">

                                        <li><a class="dropdown-item" href=" {{ route('postAdSell') }}">Sell</a></li>
                                        <li><a class="dropdown-item"
                                                href="
                                        {{ route('postAdRent') }}">Rent</a>
                                        </li>
                                        <li><a class="dropdown-item"
                                                href="
                                        {{ route('postAdBuy') }}">Buy</a>
                                        </li>
                                        <li><a class="dropdown-item"
                                                href="
                                    {{ route('postAdTenant') }}">Tenant</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="d-flex sm-mt-2">
                        @if (Auth::check())
                            <div class="dropdown">
                                <a href="#" class="nav-link text-danger fw-bold ms-1 dropdown-toggle"
                                    id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->user_name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-sm-end shadow-sm border-0"
                                    aria-labelledby="userDropdown">
                                    <li>
                                        <h6 class="dropdown-header">Welcome {{ Auth::user()->user_name }}</h6>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('userProfile') }}"><i
                                                class="fas fa-user-circle me-2"></i>My Profile</a></li>
                                    <li><a class="dropdown-item" href="{{ route('myAds') }}"><i
                                                class="fas fa-tachometer-alt me-2"></i>My Ads</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a href="{{ route('userLogout') }}" class="dropdown-item text-danger"><i
                                                class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                                </ul>
                            </div>
                        @else
                            <a href="{{ route('login') }}"
                                class="nav-link text-danger fw-bold ms-1 nav-close">Login</a>
                        @endif
                    </div>

                </div>
            </div>
        </nav>
        <div id="content" class="content">
            @yield('content')
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
        <section id="contactSection">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 my-4">
                        <h2 class="text-center contact">Contact Us</h2>
                    </div>
                </div>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 col-md-5 col-12 contact-box p-4 m-2 text-center shadow-sm">
                            <i class="fab fa-google icon-contact text-white rounded-circle p-3 fs-1"></i>
                            <p class="fw-bold fs-5">
                                Get in touch via email for a swift, customized support
                                experience
                            </p>
                            <a href="" class="text-decoration-none text-danger fw-bold" id="emailLink">
                                nestechsolutions3081@gmail.com
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-5 col-12 contact-box p-4 m-2 text-center shadow-sm">
                            <i class="fa-solid fa-phone icon-contact mb-3 text-white rounded-circle p-3 fs-1"></i>
                            <p class="fw-bold fs-5">
                                Get in touch via phone for quick support
                            </p>
                            <a href="#" class="text-decoration-none text-danger fw-bold">
                                +92 41 54 73 333 </a><br />
                            <a href="#" class="text-decoration-none text-danger fw-bold">
                                +92 3 111 786 331
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-5 col-12 contact-box p-4 m-2 text-center shadow-sm">
                            <i class="fab fa-whatsapp icon-contact mb-2 text-white rounded-circle p-3 fs-1"></i>
                            <p class="fw-bold fs-5">
                                Need quick answers? Use our WhatsApp chat for real-time support
                            </p>
                            <a href="#" class="text-decoration-none text-danger fw-bold" id="whatsappLink">
                                +92 311 1786331
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-5 col-12 contact-box p-4 m-2 text-center shadow-sm">
                            <i
                                class="fa-solid fa-location-dot icon-contact mb-3 text-white rounded-circle p-3 fs-1"></i>
                            <p class="fw-bold fs-5">Visit our office for in-person support</p>
                            <p class="text-danger fw-bold">
                                Office No.5, 2nd floor, National Bank Building, Opposite Family
                                Mart, Guilstan Colony-II Milat Chowk, Faisalabad, Pakistan
                            </p>
                        </div>

                        <div class="col-12">
                            <h1 class="text-center contact-text">Join our Newsletter</h1>
                            <h5 class="text-center contact-text">
                                Signup and we will keep you in the loop
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="footer">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-12 my-4"></div>
                    <div class="col-md-6 col-12 my-3 my-md-0">
                        <a class="footer-text d-flex justify-content-md-start justify-content-center"
                            href="#homeSection">
                            <img src="{{ asset('asset/image/nestechlogo2.png') }}" alt="Logo" width="150"
                                height="50" class="d-inline-block align-text-top" />
                        </a>
                    </div>
                    <div class="col-md-6 col-12 my-3 my-md-0 d-flex justify-content-md-end justify-content-center">
                        <a href="http://Www.facebook.com/nestechmarketing" target="_blank"
                            class="text-decoration-none footer-icon rounded-circle text-center mx-2 d-flex align-items-center justify-content-center">
                            <i class="fa-brands fa-facebook"></i>
                        </a>
                        <a href="http://Www.instagram.com/nestech_marketing" target="_blank"
                            class="text-decoration-none footer-icon rounded-circle text-center mx-2 d-flex align-items-center justify-content-center">
                            <i class="fa-brands fa-instagram"></i>
                        </a>

                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-12 my-2"></div>
                    <div class="col-md-6 col-12 my-3 my-md-0 d-flex justify-content-md-start justify-content-center">
                        <p class="footer-text mb-0">© 2024 NesTech. All Rights Reserved</p>
                    </div>

                    <div class="col-md-6 col-12 my-3 my-md-0 d-flex justify-content-md-end justify-content-center">
                        <p class="footer-text mx-2 mb-0">Privacy Policy</p>
                        <p class="footer-text mb-0">Terms of Service</p>
                    </div>
                </div>
            </div>
        </footer>

    </div>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    @if (isset($modules))
        @foreach ($modules as $module)
            <script src="{{ asset('asset/app_module/' . $module) }}"></script>
        @endforeach
    @endif
    <script src="{{ asset('asset/app_module/custom.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navbarToggler = document.querySelector('.navbar-toggler');
            const navbarCollapse = document.querySelector('.navbar-collapse');
            const navLinks = document.querySelectorAll('.nav-close');

            function closeNavbar() {
                if (navbarCollapse.classList.contains('show')) {
                    navbarCollapse.classList.remove('show');
                }
            }
            document.addEventListener('click', function(event) {
                const isClickInside = navbarCollapse.contains(event.target) || navbarToggler.contains(event
                    .target);
                if (!isClickInside && navbarCollapse.classList.contains('show')) {
                    closeNavbar();
                }
            });
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.getComputedStyle(navbarToggler).display !== 'none') {
                        closeNavbar();
                    }
                });
            });
        });
    </script>

</body>

</html>
