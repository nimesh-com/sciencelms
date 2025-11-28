@extends('layouts.front')

@section('content')
<div class="py-4 py-md-5">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-8">

                {{-- Back Button --}}
                <div class="mb-3">
                    <a href="{{ route('LMS') }}" class="btn btn-sm btn-secondary">
                        ← Back
                    </a>
                </div>

                {{-- Update Profile Information --}}
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                {{-- Update Password --}}
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                {{-- Delete User --}}
                <div class="card shadow-sm mb-5">
                    <div class="card-body">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
@endsection
