<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Order Now</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="{{ asset('asset/CSS/style.css') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8eb 100%);
            min-height: 100vh;
        }

        .checkmark {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: block;
            position: relative;
            background: #4caf50;
            animation: scale 0.3s ease-in-out;
            margin: 0 auto;
        }

        .checkmark::after {
            content: '';
            width: 40px;
            height: 20px;
            position: absolute;
            top: 25px;
            left: 20px;
            border: 5px solid #fff;
            border-top: none;
            border-right: none;
            transform: rotate(-45deg);
            opacity: 0;
            animation: checkmark 0.3s ease-in-out forwards;
            animation-delay: 0.3s;
        }

        @keyframes scale {
            0% {
                transform: scale(0);
            }

            100% {
                transform: scale(1);
            }
        }

        @keyframes checkmark {
            0% {
                opacity: 0;
                transform: rotate(-45deg) scale(0.8);
            }

            100% {
                opacity: 1;
                transform: rotate(-45deg) scale(1);
            }
        }

        .success-message {
            text-align: center;
            font-size: 24px;
            margin-top: 20px;
            color: #4caf50;
        }

        .order-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin: 2rem auto;
            padding: 2rem;
            max-width: 1200px;
        }

        .form-section {
            padding: 2rem;
        }

        .section-title {
            color: #2c3e50;
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 10px;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: #dc3545;
        }

        .form-control {
            border-radius: 10px;
            padding: 12px;
            border: 2px solid #e0e0e0;
            transition: all 0.3s ease;
            margin-bottom: 1rem;
        }

        .form-control:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
        }

        .btn-submit {
            background: linear-gradient(45deg, #dc3545, #ff4757);
            border: none;
            padding: 15px 30px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 0.3s ease;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.3);
        }

        .image-section {
            position: relative;
            height: 100%;
            border-radius: 20px;
            overflow: hidden;
        }

        .image-section img {
            object-fit: cover;
            height: 100%;
            width: 100%;
            border-radius: 20px;
        }

        .logo {
            margin-bottom: 2rem;
            transition: transform 0.3s ease;
        }

        .logo:hover {
            transform: scale(1.05);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .order-container {
                margin: 1rem;
                padding: 1rem;
            }

            .form-section {
                padding: 1rem;
            }
        }

        /* Input group styling */
        .input-group {
            margin-bottom: 1.5rem;
        }

        .input-group-text {
            background: #f8f9fa;
            border: 2px solid #e0e0e0;
            border-right: none;
        }

        /* Animated placeholder */
        @keyframes placeholderShimmer {
            0% {
                transform: translateX(-100%)
            }

            100% {
                transform: translateX(100%)
            }
        }

        .form-control::placeholder {
            color: #adb5bd;
            transition: color 0.3s ease;
        }

        .form-control:focus::placeholder {
            color: #dc3545;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="order-container">
            <div class="row">
                <!-- Form Section -->
                <div class="col-md-7 col-12">
                    <div class="form-section">
                        <div class="logo">
                            <img src="{{ asset('asset/image/NesTech-logo.png') }}" alt="Logo" class="img-fluid"
                                style="max-width: 200px;">
                        </div>

                        <form id="orderForm">
                            @csrf <!-- Laravel CSRF Token -->

                            <!-- Hidden inputs -->
                            <input type="text" name="current_date" id="current_date" hidden>
                            <input type="text" name="service_id" id="service_id" value="{{ $service_id }}" hidden>

                            <!-- Contact Section -->
                            <div class="section-title">Contact Information</div>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input type="email" name="email" id="email" placeholder="Enter your email"
                                    class="form-control">
                            </div>

                            <!-- Delivery Section -->
                            <div class="section-title mt-4">Delivery Details</div>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-globe"></i></span>
                                <select name="country" id="country" class="form-control">
                                    <option value="" disabled selected>Select your country</option>
                                </select>
                            </div>

                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-city"></i></span>
                                <input type="text" name="city" id="city" placeholder="Enter your city"
                                    class="form-control">
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="text" name="first_name" id="first_name" placeholder="First name"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="text" name="last_name" id="last_name" placeholder="Last name"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                <textarea name="address" id="address" class="form-control" placeholder="Enter your full address" rows="3"></textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        <input type="text" name="phone" id="phone"
                                            placeholder="Phone number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-mail-bulk"></i></span>
                                        <input type="text" name="postal_code" id="postal_code"
                                            placeholder="Postal code" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <button type="button" class="btn btn-submit btn-danger w-100" id="btnSave">
                                Book This Service <i class="fas fa-arrow-right ms-2"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Image Section -->
                <div class="col-md-5 col-12 d-none d-md-block">
                    <div class="image-section">
                        <img src="{{ asset('asset/image/register.png') }}" alt="Registration illustration"
                            class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center p-5">
                    <div class="checkmark mx-auto mb-4"></div>
                    <div class="success-message mb-4">Order Placed Successfully!</div>
                    <a href="{{ route('home') }}" class="btn btn-primary btn-lg">
                        Continue to Home <i class="fas fa-home ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
        // Set current date
        const today = new Date();
        const formattedDate = today.toISOString().split('T')[0];
        document.getElementById('current_date').value = formattedDate;

        // Form validation
        const validateSave = function() {
            const fields = {
                'email': document.getElementById('email'),
                'city': document.getElementById('city'),
                'country': document.getElementById('country'),
                'address': document.getElementById('address'),
                'postal_code': document.getElementById('postal_code'),
                'first_name': document.getElementById('first_name'),
                'last_name': document.getElementById('last_name'),
                'phone': document.getElementById('phone')
            };

            let isValid = true;

            // Reset all borders
            Object.values(fields).forEach(field => {
                field.style.border = '1px solid #ced4da';
            });

            // Check each field
            Object.values(fields).forEach(field => {
                if (!field.value.trim()) {
                    field.style.border = '2px solid #dc3545';
                    isValid = false;
                }
            });

            if (!isValid) {
                Toastify({
                    text: "Please fill in all fields",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    backgroundColor: "#f44336",
                }).showToast();
                return false;
            }

            return true;
        }

        // Send form data to server
        const saveRegister = function(orderService) {
            if (!validateSave()) {
                return;
            }

            // Get the CSRF token from the meta tag
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Use jQuery for the AJAX request (more reliable for CSRF handling)
            $.ajax({
                url: '/api/saveServiceOrder',
                type: 'POST',
                data: JSON.stringify(orderService),
                contentType: 'application/json',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(data) {
                    if (data.success) {
                        Toastify({
                            text: data.message,
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            stopOnFocus: true,
                            backgroundColor: "#4caf50",
                        }).showToast();

                        const successModal = new bootstrap.Modal(document.getElementById('successModal'));
                        successModal.show();
                    } else {
                        Toastify({
                            text: data.message,
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            stopOnFocus: true,
                            backgroundColor: "#f44336",
                        }).showToast();
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    // Show specific message for CSRF error
                    if (xhr.status === 419) {
                        Toastify({
                            text: "CSRF token mismatch. Please refresh the page and try again.",
                            duration: 5000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            stopOnFocus: true,
                            backgroundColor: "#f44336",
                        }).showToast();
                    } else {
                        Toastify({
                            text: "An error occurred during Order",
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            stopOnFocus: true,
                            backgroundColor: "#f44336",
                        }).showToast();
                    }
                }
            });
        };

        // Get form data as object
        const getSaveObj = function() {
            const saveObj = {};
            saveObj.email = document.getElementById('email').value;
            saveObj.first_name = document.getElementById('first_name').value;
            saveObj.last_name = document.getElementById('last_name').value;
            saveObj.address = document.getElementById('address').value;
            saveObj.phone = document.getElementById('phone').value;
            saveObj.city = document.getElementById('city').value;
            saveObj.postal_code = document.getElementById('postal_code').value;
            saveObj.country = document.getElementById('country').value;
            saveObj.current_date = document.getElementById('current_date').value;
            saveObj.service_id = document.getElementById('service_id').value;
            saveObj._token = document.querySelector('input[name="_token"]').value; // Include CSRF token
            return saveObj;
        };

        // Reset form fields
        const resetField = function() {
            document.getElementById('email').value = "";
            document.getElementById('first_name').value = "";
            document.getElementById('last_name').value = "";
            document.getElementById('address').value = "";
            document.getElementById('phone').value = "";
            document.getElementById('city').value = "";
            document.getElementById('postal_code').value = "";
            document.getElementById('country').value = "";
        }

        // Event listener for form submission
        document.getElementById('btnSave').addEventListener('click', function() {
            const orderService = getSaveObj();
            saveRegister(orderService);
        });

        // Fetch countries and populate select
        const country = document.getElementById('country');
        const contactNumber = document.getElementById('phone');

        async function fetchCountry() {
            try {
                const response = await fetch('https://restcountries.com/v3.1/all');
                if (response.ok) {
                    const data = await response.json();
                    const sortedData = data.sort((a, b) => a.name.common.localeCompare(b.name.common));

                    sortedData.forEach(element => {
                        if (element.idd && element.idd.root && element.idd.suffixes && element.idd.suffixes
                            .length > 0) {
                            const option = document.createElement('option');
                            option.value = element.name.common;
                            option.text = element.name.common;
                            option.setAttribute('data-code', element.idd.root + (element.idd.suffixes[0] ||
                                '') + ' ');
                            country.add(option);
                        }
                    });

                    country.addEventListener('change', function() {
                        const selectedOption = this.options[this.selectedIndex];
                        const phoneCode = selectedOption.getAttribute('data-code');
                        contactNumber.value = phoneCode || '';
                        contactNumber.focus();
                    });
                } else {
                    throw new Error('Error fetching countries');
                }
            } catch (error) {
                console.error(error);
            }
        }

        fetchCountry();
    </script>
</body>

</html>
