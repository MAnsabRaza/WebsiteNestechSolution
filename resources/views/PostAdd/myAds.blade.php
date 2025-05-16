@extends('layouts.app')
@section('title', 'MyAds')
@section('content')
    <div class="content-wrapper my-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-bold  my-4"></h1>
            </div>
        </div>
        <div class="container my-5">
            <div class="row border shadow mt-5">
                <div class="col-12 my-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex align-items-start">
                                <i class="fas fa-user-circle fa-5x mt-2 text-danger"></i>
                                <div class="ms-3">
                                    @auth
                                        <h2 class="fw-bold text-danger mt-2">{{ Auth::user()->user_name }}</h2>
                                        <div>
                                            <a href="{{ route('userProfile') }}">Edit Profile</a>
                                        </div>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row border shadow mt-3">
                <div class="col-12 my-4">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Sr#</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Owner Name</th>
                                    <th scope="col">Contact Number</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Building Structure</th>
                                    <th scope="col">Direction</th>
                                    {{-- <th scope="col">Actions</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($userPosts) && count($userPosts) > 0)
                                    @foreach ($userPosts as $index => $post)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $post->current_date }}</td>
                                            <td>{{ $post->category_name }}</td>
                                            <td>{{ $post->postAd_owner_name }}</td>
                                            <td>{{ $post->postAd_contact_number }}</td>
                                            <td>{{ $post->postAd_city }}</td>
                                            <td>{{ $post->postAd_price }}</td>
                                            <td>{{ $post->postAd_address }}</td>
                                            <td>{{ $post->postAd_building_structure }}</td>
                                            <td>{{ $post->postAd_direction }}</td>
                                            <td>
                                                @if ($post->status == 1)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <!-- Replace the delete button in your table -->
                                            {{-- <td>
                                                <button class="btn btn-sm btn-danger btn-delete"
                                                    data-id="{{ $post->id }}">Delete</button>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center">No advertisements Active</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
