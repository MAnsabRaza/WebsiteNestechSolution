<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    </script>
    <link rel="stylesheet" href="{{ asset('asset/CSS/style.css') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7 my-3">
                <img src="{{ asset('asset/image/NesTech-logo.png') }}" alt="Logo" width="200" height="60"
                    class="d-inline-block align-text-top" />
                <div class="row">
                    <div class="col-md-12">
                        <div class="row my-3">
                            <div class="col-md-3"></div>
                            <div class="col-md-6 my-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1 class="text-bold text-center">Welcome Back!</h1>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text bg-light text-secondary">
                                                <i class="fas fa-user"></i>
                                            </span>
                                            <div class="form-floating flex-grow-1">
                                                <input type="email" class="form-control" id="email"
                                                    placeholder="Email" />
                                                <label for="email" class="text-secondary">Email</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10">
                                        <div class="input-group mb-3">
                                            <div class="form-floating flex-grow-1">
                                                <input type="password" class="form-control" id="password"
                                                    placeholder="Password" />
                                                <label for="floatingPassword" class="text-secondary">Password</label>
                                                <span class="input-group-text text-secondary" id="toggle-password"
                                                    style="cursor: pointer">
                                                    <i class="fas fa-eye" id="eye-icon"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10">
                                        <div class="text-center">
                                            <input type="submit" class="btn btn-danger text-white w-100 rounded-2"
                                                value="SIGN IN" id="btnLogin" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10 text-center">
                                        <p>If you don't have an account?
                                            <a href="{{ route('register') }}"
                                                class="text-decoration-none fw-bold text-danger d-inline">
                                                Sign Up
                                            </a>
                                        </p>
                                    </div>
                                    <div class="row my-3 text-center">
                                        <a href="{{ route('auth.google') }}"
                                            class="btn btn-light w-100 border d-flex align-items-center justify-content-center gap-2 py-2">
                                            <svg width="20" height="20" viewBox="0 0 24 24">
                                                <path fill="#4285F4"
                                                    d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                                                <path fill="#34A853"
                                                    d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                                                <path fill="#FBBC05"
                                                    d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" />
                                                <path fill="#EA4335"
                                                    d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" />
                                            </svg>
                                            Continue with Google
                                        </a>

                                        <div class="my-4 position-relative">
                                            <hr>
                                            <span
                                                class="position-absolute top-50 start-50 translate-middle bg-white px-3 text-secondary">OR</span>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <img src="{{ asset('asset/image/login.png') }}" alt="Logo" width="100%" height="100%"
                    class="d-inline-block align-text-top" />
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
        $(document).ready(function() {
            const togglePassword = document.getElementById('toggle-password');
            const password = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');

            // Add click event listener
            togglePassword.addEventListener('click', function() {
                // Toggle password input type between "password" and "text"
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);

                // Toggle eye icon between "fa-eye" and "fa-eye-slash"
                eyeIcon.classList.toggle('fa-eye');
                eyeIcon.classList.toggle('fa-eye-slash');
            });

            $('#btnLogin').on('click', function(e) {
                e.preventDefault();
                const email = $('#email').val();
                const password = $('#password').val();
                if (email == '' || password == '') {
                    Toastify({
                        text: "Please Enter Username and Password",
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        stopOnFocus: true,
                        backgroundColor: "#f44336",
                    }).showToast();
                    return;
                }
                const loginData = {
                    "email": email,
                    "password": password
                }
                $.ajax({
                    type: "POST",
                    url: '/checkLogin',
                    data: loginData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
                            window.location.href = data.redirect;
                        }
                    },
                    error: function(xhr) {
                        const response = xhr.responseJSON;
                        Toastify({
                            text: response?.message || "Login failed",
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            stopOnFocus: true,
                            backgroundColor: "#f44336",
                        }).showToast();
                    }
                });
            });
        });
    </script>
</body>

</html>
