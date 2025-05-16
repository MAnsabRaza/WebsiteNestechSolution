@extends('layouts.app')
@section('title', 'Post Ad Sell')
@section('content')

    <div class="content-wrapper pt-5 mt-4">
        <section id="postAdd" class="pb-0">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 ">
                        {{-- <div>
                            <h2 class="text-center fw-bold postAddHeading mt-5">Sell Your Property With Easy Step</h2>
                        </div> --}}
                    </div>
                </div>
                <div class="container mt-5 pb-2">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow-md rounded-4">
                                <div class="card-body">
                                    <div class="ms-5">
                                        <div>
                                            <h5 class="fw-bold ">Reach Million Of Dealer On Our Plateform</h5>
                                            <h6 class="text-secondary p-0 m-0">In a few multiple step</h6>
                                        </div>
                                        <div class="d-flex align-items-center mt-3">
                                            <p class="text-secondary me-4">
                                                <i class="fas fa-info-circle fa-2x text-danger me-2"></i>Information
                                            </p>
                                            <p class="text-secondary">
                                                <i class="fas fa-images fa-2x text-danger me-2"></i>Good Property Image
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- hidden --}}
                <input type="text" class="form-control form-control-sm" id="voucher_type" name="voucher_type"
                    value="new" hidden>
                <input type="number" class="form-control form-control-sm" id="dealer_id" name="dealer_id" hidden>
                <input type="date" class="form-control form-control-sm ts_datepicker" id="current_date"
                    name="current_date" readonly hidden>

                <div class="container">
                    <div class="card shadow-md rounded-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 ms-5">
                                    <p class="fw-bold me-4">
                                        <i class="fas fa-info-circle fa-2x text-danger me-2"></i>Information
                                    </p>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-2"></div>
                                <div class="col-8">
                                    <div class="form-group">
                                        <label for="dealer_name" class="fw-bold"><i
                                                class="fas fa-user text-secondary me-2"></i>Dealer Names <span><sup
                                                    class="text-danger fw-bold">*</sup></span></label>
                                        <input type="text" class="form-control form-control-lg mt-1" id="dealer_name"
                                            name="dealer_name" placeholder="Enter Your Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-2"></div>
                                <div class="col-8">
                                    <div class="form-group">
                                        <label for="dealer_email" class="fw-bold"><i
                                                class="fas fa-envelope me-2 text-secondary"></i>
                                            Email (Optional)
                                            <span><sup class="text-danger fw-bold">*</sup></span></label>
                                        <input type="email" class="form-control form-control-lg mt-1" id="dealer_email"
                                            name="dealer_email" placeholder="Enter Your Email" max="11">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-2"></div>
                                <div class="col-8">
                                    <div class="form-group">
                                        <label for="dealer_phone" class="fw-bold"><i
                                                class="fas fa-phone me-2 text-secondary"></i>
                                            Contact Number
                                            <span><sup class="text-danger fw-bold">*</sup></span></label>
                                        <input type="number" class="form-control form-control-lg mt-1" id="dealer_phone"
                                            name="dealer_phone" placeholder="03010000000" max="11">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-2"></div>
                                <div class="col-8">
                                    <div class="form-group">
                                        <label for="dealer_country" class="fw-bold"><i
                                                class="fas fa-flag me-2 text-secondary"></i>
                                            Country
                                            <span><sup class="text-danger fw-bold">*</sup></span></label>
                                        <input type="text" class="form-control form-control-lg mt-1" id="dealer_country"
                                            name="dealer_country" placeholder="Enter Your Country" max="11">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-2"></div>
                                <div class="col-8">
                                    <div class="form-group">
                                        <label for="dealer_city" class="fw-bold"><i
                                                class="fas fa-city me-2 text-secondary"></i>
                                            City
                                            <span><sup class="text-danger fw-bold">*</sup></span></label>
                                        <input type="text" class="form-control form-control-lg mt-1" id="dealer_city"
                                            name="dealer_city" placeholder="Enter Your City" max="11">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-2"></div>
                                <div class="col-8">
                                    <div class="form-group">
                                        <label for="dealer_area" class="fw-bold"><i
                                                class="fas fa-map-marker-alt me-2 text-secondary"></i>
                                            Area
                                            <span><sup class="text-danger fw-bold">*</sup></span></label>
                                        <input type="text" class="form-control form-control-lg mt-1" id="dealer_area"
                                            name="dealer_area" placeholder="Enter Your Area" max="11">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-2"></div>
                                <div class="col-8">
                                    <div class="form-group">
                                        <label for="dealer_phone" class="fw-bold"><i
                                                class="fas fa-building me-2 text-secondary"></i>
                                            Offcie Address (Optional)
                                            <span><sup class="text-danger fw-bold">*</sup></span></label>
                                        <input type="text" class="form-control form-control-lg mt-1"
                                            id="dealer_office_address" name="dealer_office_address"
                                            placeholder="Enter Your Office Address" max="11">
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="container mt-2 pb-3">
                    <div class="card shadow-md rounded-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 ms-5">
                                    <p class="text-secondary">
                                        <i class="fas fa-images fa-2x text-danger me-2"></i>Good Property Image
                                    </p>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-2"></div>
                                <div class="col-8">
                                    <div class="form-group">
                                        <label for="dealer_image">PostAd Images</label>
                                        <input type="file" id="dealer_image" name="dealer_image"
                                            class="form-control form-control-lg" multiple accept="image/*">
                                        <div class="row mt-2" id="image-previews"></div>
                                        <div class="row mt-3" id="existing-images"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-2"></div>
                                <div class="col-8">
                                    <div>
                                        <center>
                                            <button class="btn btn-outline-danger mt-3 btn-lg" id="btnSave"
                                                name="btnSave">Submit</button>
                                        </center>
                                    </div>
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
