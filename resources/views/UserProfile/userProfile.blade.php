@extends('layouts.app')
@section('title', 'UserProfile')
@section('content')
    <div class="content-wrapper my-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-bold  my-4"></h1>
                </div>
            </div>

            <div class="row border shadow mt-5">
                <div class="col-12 my-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-user-circle fa-5x mt-2 text-danger">
                                </i>
                                <h2 class="fw-bold text-danger ms-3 mt-2">My
                                    Profile</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <hr>
                    </div>
                    @auth
                        <div class="container">
                            <!-- Add hidden field for user ID -->
                            <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="role_name" id="role_name" value="user">

                            <div class="row mb-3">
                                <div class="col-2"></div>
                                <div class="col-2 text-end">
                                    <label for="user_name" class="form-label fs-5 mt-2">User Name</label>
                                </div>
                                <div class="col-6">
                                    <input type="text" name="user_name" id="user_name" class="form-control form-control-lg"
                                        value="{{ Auth::user()->user_name }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-2"></div>
                                <div class="col-2 text-end">
                                    <label for="country" class="form-label fs-5 mt-2">Country</label>
                                </div>
                                <div class="col-6">
                                    <select name="country" id="country" class="form-control form-control-lg">
                                        <option value="{{ Auth::user()->country }}">{{ Auth::user()->country }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-2"></div>
                                <div class="col-2 text-end">
                                    <label for="contact_number" class="form-label fs-5 mt-2">Phone</label>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control form-control-lg" id="contact_number"
                                        name="contact_number" placeholder="Contact Number"
                                        value="{{ Auth::user()->contact_number }}" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-2"></div>
                                <div class="col-2 text-end">
                                    <label for="city" class="form-label fs-5 mt-2">City</label>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control form-control-lg" id="city" name="city"
                                        placeholder="City" value="{{ Auth::user()->city }}" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-2"></div>
                                <div class="col-2 text-end">
                                    <label for="email" class="form-label fs-5 mt-2">Email</label>
                                </div>
                                <div class="col-6">
                                    <input type="email" class="form-control form-control-lg" id="email" name="email"
                                        placeholder="Email" value="{{ Auth::user()->email }}" />
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-12 text-center">
                                    <button class="btn btn-outline-primary btn-lg" id="btnSave" name="btnSave">Save
                                        Change</button>
                                </div>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
@endsection
