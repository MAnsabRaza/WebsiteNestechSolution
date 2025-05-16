<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <!-- flags -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{ asset('asset/CSS/style.css') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7 my-1">
                <img src="{{ asset('asset/image/NesTech-logo.png') }}" alt="Logo" width="200" height="60"
                    class="d-inline-block align-text-top" />
                <div class="row">
                    <div class="col-md-12">
                        <div class="row my-3">
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="voucher_type" name="voucher_type"
                                    placeholder="voucher_type" hidden value="new" />
                                <input type="text" class="form-control" id="current_date" name="current_date"
                                    placeholder="current_date" hidden />
                            </div>
                            <div class="col-md-6 my-5">
                                <!-- Form starts here -->
                                <form id="registration-form" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-group mb-3">
                                                <div class="form-floating flex-grow-1">
                                                    <input type="text" class="form-control" id="user_name"
                                                        placeholder="user_name" />
                                                    <label for="user_name" class="text-secondary">UserName</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-group mb-3">
                                                <div class="form-floating flex-grow-1">
                                                    <select name="country" id="country" class="form-control">
                                                        <option value="" disabled selected>Select Country</option>
                                                    </select>
                                                    <label for="country" class="text-secondary">Country</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="input-group mb-3">
                                                <div class="form-floating flex-grow-1">
                                                    <input type="text" class="form-control" id="contact_number"
                                                        placeholder="Contact Number" aria-label="Contact Number" />
                                                    <label for="contact_number" class="text-secondary">Contact
                                                        Number</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="input-group mb-3">
                                            <div class="form-floating flex-grow-1">
                                                <input type="text" class="form-control" id="city"
                                                    placeholder="City" />
                                                <label for="city" class="text-secondary">City/State</label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-group mb-3">
                                                <div class="form-floating flex-grow-1">
                                                    <input type="email" class="form-control" id="email"
                                                        placeholder="Email" />
                                                    <label for="email" class="text-secondary">Email</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-group mb-3">
                                                <div class="form-floating flex-grow-1">
                                                    <input type="password" class="form-control" id="password"
                                                        placeholder="Password" autocomplete="new-password" />
                                                    <label for="password" class="text-secondary">Password</label>
                                                    <span class="input-group-text text-secondary" id="toggle-password"
                                                        style="cursor: pointer">
                                                        <i class="fas fa-eye" id="eye-icon"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="text" value="user" class="form-control" id="role_name"
                                        placeholder="Role Name" hidden />

                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <div class="text-center">
                                                <button type="submit"
                                                    class="btn btn-danger text-white w-100 rounded-2"
                                                    id="btnSave">SIGN UP</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <img src="{{ asset('asset/image/register.png') }}" alt="Logo" width="100%" height="100%"
                    class="d-inline-block align-text-top" />
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
        const togglePassword = document.getElementById('toggle-password');
        const password = document.getElementById('password');
        const eyeIcon = document.getElementById('eye-icon');

        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            eyeIcon.classList.toggle('fa-eye');
            eyeIcon.classList.toggle('fa-eye-slash');
        });

        const validateForm = () => {
            const fields = {
                'user_name': document.getElementById('user_name'),
                'city': document.getElementById('city'),
                'contact_number': document.getElementById('contact_number'),
                'email': document.getElementById('email'),
                'password': document.getElementById('password'),
                'country': document.getElementById('country')
            }
            let isValid = true;
            Object.values(fields).forEach(field => {
                field.style.border = '1px solid #ced4da';
            });

            Object.values(fields).forEach(field => {
                if (!field.value.trim()) {
                    field.style.border = '2px solid #dc3545';
                    isValid = false;
                }
            });

            if (!isValid) {
                Toastify({
                    text: "Please fill in all required fields",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    backgroundColor: "#f44336",
                }).showToast();
                return false;
            }
            if (fields.password.value.length < 8) {
                Toastify({
                    text: "Password must be at least 8 characters long",
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
        };

        const saveRegister = function(register) {
            if (!validateForm()) {
                return;
            }

            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch('/api/saveRegister', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify(register)
                })
                .then(response => response.json())
                .then(data => {
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

                        setTimeout(() => {
                            window.location.href = '/login';
                        }, 1500);
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
                })
                .catch(error => {
                    console.error('Error:', error);
                    Toastify({
                        text: "An error occurred during registration",
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        stopOnFocus: true,
                        backgroundColor: "#f44336",
                    }).showToast();
                });
        };

        const getSaveObj = function() {
            return {
                user_name: document.getElementById('user_name').value,
                city: document.getElementById('city').value,
                contact_number: document.getElementById('contact_number').value,
                email: document.getElementById('email').value,
                password: document.getElementById('password').value,
                role_name: document.getElementById('role_name').value,
                country: document.getElementById('country').value
            };
        };

        document.getElementById('registration-form').addEventListener('submit', function(event) {
            event.preventDefault();
            const register = getSaveObj();
            saveRegister(register);
        });

        const country = document.getElementById('country');
        const contactNumber = document.getElementById('contact_number');

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
