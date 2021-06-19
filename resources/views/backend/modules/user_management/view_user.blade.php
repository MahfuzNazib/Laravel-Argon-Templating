@extends('backend.layouts.app')

@section('content')
@include('backend.layouts.headers.cards')

{{-- Page Header Start --}}
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                                        class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">User Information</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Page Header End --}}

<!-- Main Content Start -->
<div class="container-fluid mt--6">
    <div class="row justify-content-center">
        <div class=" col ">
            <div class="card">
                <div class="card-header bg-transparent">
                    <h3 class="mb-0">{{ $user->name }}, Profile</h3>
                </div>
                <div class="card-body">
                    <div class="row icon-examples">
                        <!-- Profile Informations Start -->
                        <div class="col-md-8">
                            <table class="table table-sm table-bordered table-reponsive">
                                <tr>
                                    <th>Full Name</th>
                                    <td>{{ $user->name }}</td>
                                </tr>

                                <tr>
                                    <th>Email</th>
                                    <td>{{ $user->email }}</td>
                                </tr>

                                <tr>
                                    <th>Phone No</th>
                                    <td>{{ $user->phone }}</td>
                                </tr>

                                <tr>
                                    <th>Role</th>
                                    <td>{{ $user->role->name }}</td>
                                </tr>

                                <tr>
                                    <th>Status</th>
                                    <td>
                                        @if ($user->is_active == 1)
                                        <span class="badge badge-success">Active</span>
                                        @else
                                        <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!-- Profile Informations End -->


                        <!-- Profile Picture Start -->
                        <div class="col-md-4">
                            @if ($user->image == null)
                                <img src="{{ asset('/argon/img/profile_picture/d_pp.png') }}" height="auto" width="100">
                            @else
                                <img src="{{ asset('/argon/img/profile_picture/'.$user->image) }}" height="auto" width="100">
                            @endif
                        </div>
                        <!-- Profile Picture End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Content End -->

@endsection
