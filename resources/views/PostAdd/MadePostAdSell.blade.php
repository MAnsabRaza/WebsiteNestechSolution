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
                                            <h5 class="fw-bold ">Reach Million Of Buyers On Our Plateform</h5>
                                            <h6 class="text-secondary p-0 m-0">In a few multiple step</h6>
                                        </div>
                                        <div class="d-flex align-items-center mt-3">
                                            <p class="text-secondary me-4">
                                                <i class="fas fa-info-circle fa-2x text-danger me-2"></i>Information
                                            </p>
                                            <p class="text-secondary me-4">
                                                <i class="fas fa-map-marker-alt fa-2x text-danger me-2"></i>Price and
                                                Location
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
                <input type="number" class="form-control form-control-sm" id="postAd_id" name="postAd_id" hidden>
                <input type="text" class="form-control form-control-sm" id="postAd_manage_by" name="postAd_manage_by"
                    value="user" hidden>
                <input type="text" class="form-control form-control-sm" id="postAd_for" name="postAd_for" value="sell"
                    hidden>
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
                                        <label for="postAd_owner_name" class="fw-bold"><i
                                                class="fas fa-user text-secondary me-2"></i>Owner Names <span><sup
                                                    class="text-danger fw-bold">*</sup></span></label>
                                        <input type="text" class="form-control form-control-lg mt-1"
                                            id="postAd_owner_name" name="postAd_owner_name" placeholder="Enter Your Name">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-2"></div>
                                <div class="col-8">
                                    <div class="form-group">
                                        <label for="postAd_contact_number" class="fw-bold"><i
                                                class="fas fa-phone me-2 text-secondary"></i>
                                            Contact Number
                                            <span><sup class="text-danger fw-bold">*</sup></span></label>
                                        <input type="number" class="form-control form-control-lg mt-1"
                                            id="postAd_contact_number" name="postAd_contact_number"
                                            placeholder="03010000000" max="11">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-2"></div>
                                <div class="col-8">
                                    <div class="form-group">
                                        <label for="postAd_type" class="fw-bold"><i
                                                class="fas fa-building text-secondary me-2"></i>Type<span><sup
                                                    class="text-danger fw-bold">*</sup></span></label>
                                        <select name="postAd_type" id="postAd_type"
                                            class="form-control form-control-lg mt-1">
                                            <option selected disabled>Select Type</option>
                                            <option value="residential">Residential</option>
                                            <option value="commercial">Commercial</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-2"></div>
                                <div class="col-8">
                                    <div class="form-group">
                                        <label for="category_id" class="fw-bold"><i
                                                class="fas fa-home text-secondary me-2"></i>Category
                                            Name<span><sup class="text-danger fw-bold">*</sup></span></label>
                                        <select name="category_id" id="category_id"
                                            class="form-control form-control-lg mt-1">
                                            <option value="">Select Category</option>
                                            @foreach ($category as $categories)
                                                <option value="{{ $categories->id }}">{{ $categories->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-2"></div>
                                <div class="col-8">
                                    <div>
                                        <label for="postAd_residential_type" class="fw-bold"> <i
                                                class="fas fa-home text-secondary me-2"></i>Residential Type</label>
                                        <select name="postAd_residential_type" id="postAd_residential_type"
                                            class="form-control form-control-lg mt-1">
                                            <option selected disabled>Select Residential Type</option>
                                            <option value="house">House</option>
                                            <option value="apartment">Apartment</option>
                                            <option value="villa">Villa</option>
                                            <option value="penthouse">Penthouse</option>
                                            <option value="farmhouse">Farmhouse</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="postAd_commercial_type" class="fw-bold"> <i
                                                class="fas fa-building text-secondary me-2"></i>Commercial
                                            Type</label>
                                        <select name="postAd_commercial_type" id="postAd_commercial_type"
                                            class="form-control form-control-lg mt-1">
                                            <option selected disabled>Select Commercial Type</option>
                                            <option value="office">Office</option>
                                            <option value="store">Store</option>
                                            <option value="warehouse">Warehouse</option>
                                            <option value="factory">Factory</option>
                                            <option value="clinic">Clinic</option>
                                            <option value="workshop">Workshop</option>
                                            <option value="cafe">Cafe</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-2"></div>
                                <div class="col-8">
                                    <div class="form-group">
                                        <label for="postAd_storey" class="fw-bold"><i
                                                class="fas fa-layer-group text-secondary me-2"></i>
                                            Storey</label>
                                        <select name="postAd_storey" id="postAd_storey"
                                            class="form-control form-control-lg mt-1">
                                            <option selected disabled>Select Storey</option>
                                            <option value="single">Single</option>
                                            <option value="double">Double</option>
                                            <option value="triple">Triple</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-2"></div>
                                <div class="col-8">
                                    <div class="form-group">
                                        <label for="postAd_direction" class="fw-bold"><i
                                                class="fas fa-location-arrow me-2 text-secondary"></i>
                                            Direction</label>
                                        <select name="postAd_direction" id="postAd_direction"
                                            class="form-control form-control-lg mt-1">
                                            <option selected disabled>Select Direction</option>
                                            <option value="eastFacing">East Facing</option>
                                            <option value="westFacing">West Facing</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-2"></div>
                                <div class="col-8">
                                    <div class="form-group">
                                        <label for="postAd_building_structure" class="fw-bold"><i
                                                class="fas fa-industry me-2 text-secondary"></i>
                                            Building Structure</label>
                                        <select name="postAd_building_structure" id="postAd_building_structure"
                                            class="form-control form-control-lg mt-1">
                                            <option selected disabled>Select Building Structure</option>
                                            <option value="lessThan7Year">Less than 07 years old</option>
                                            <option value="MoreThan7Year">More than 07 years old</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="container mt-2">
                    <div class="card shadow-md rounded-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 ms-5">
                                    <p class="fw-bold me-4">
                                        <i class="fas fa-map-marker-alt fa-2x text-danger me-2"></i>Price and
                                        Location
                                    </p>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-2"></div>
                                <div class="col-8">
                                    @php
                                        $city = [
                                            'Faisalabad',
                                            'Lahore',
                                            'Islamabad',
                                            'Karachi',
                                            'Rawalpindi',
                                            'Peshawar',
                                            'Multan',
                                            'Sailkot',
                                            'Sargodha',
                                            'Quetta',
                                        ];
                                    @endphp

                                    <div class="form-group">
                                        <label for="postAd_city" class="fw-bold"><i
                                                class="fas fa-city me-2 text-secondary"></i>
                                            City</label>
                                        <select name="postAd_city" id="postAd_city"
                                            class="form-control form-control-lg mt-1">
                                            <option selected disabled>Select City</option>
                                            @foreach ($city as $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-2"></div>
                                <div class="col-8">
                                    <div class="form-group">
                                        <label for="postAd_price" class="fw-bold"><i
                                                class="fas fa-dollar-sign me-2 text-secondary"></i>
                                            Price</label>
                                        <input type="number" class="form-control form-control-lg mt-1" id="postAd_price"
                                            name="postAd_price">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-2"></div>
                                <div class="col-8">
                                    <div class="form-group">
                                        <label for="postAd_society" class="fw-bold"><i
                                                class="fas fa-globe me-2 text-secondary"></i>
                                            Society</label>
                                        <input type="text" class="form-control form-control-lg" id="postAd_society"
                                            name="postAd_society">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-2"></div>
                                <div class="col-8">
                                    <div class="form-group">
                                        <label for="postAd_address" class="fw-bold"><i
                                                class="fas fa-location-dot me-2 text-secondary"></i>
                                            Address</label>
                                        <input type="text" class="form-control form-control-lg" id="postAd_address"
                                            name="postAd_address">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-2"></div>
                                <div class="col-8">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="postAd_description" class="fw-bold"><i
                                                    class="fas fa-sticky-note me-2 text-secondary"></i>
                                                Description</label>
                                            <textarea class="form-control form-control-lg" id="postAd_description" name="postAd_description" rows="5"></textarea>
                                        </div>
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
                                        <label for="postAd_images">PostAd Images (Maximum 10)</label>
                                        <input type="file" id="postAd_images" name="postAd_images[]"
                                            class="form-control form-control-lg" multiple accept="image/*">
                                        <small class="text-muted">You can select up to 10 images</small>
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
