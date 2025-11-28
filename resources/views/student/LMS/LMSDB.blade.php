@extends('layouts.front')
@section('content')

<div class="container py-4">

    <!-- Greeting -->
    <h4 class="mb-4">
        Hi, {{ Auth::user()->name ?? 'Student' }} 👋
    </h4>

    <!-- Announcements -->
    <div class="mb-4">
        <h4 class="mb-3">Announcements</h4>

        @if(isset($announcements) && $announcements->count())
            <div class="list-group">
                @foreach($announcements as $announcement)
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{ $announcement->title ?? 'Announcement' }}</h5>
                            <small class="text-muted">{{ $announcement->created_at ? $announcement->created_at->diffForHumans() : '' }}</small>
                        </div>
                        <p class="mb-1">{{ \Illuminate\Support\Str::limit($announcement->body ?? $announcement->message ?? '', 200) }}</p>
                        @if(!empty($announcement->url))
                            <a href="" class="stretched-link">Read more</a>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info mb-0">No announcements at the moment.</div>
        @endif
    </div>

    <!-- Feature Cards -->
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3 mb-3">
            <a href="{{route('student.lms.classroom')}}" class="text-decoration-none">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <div class="mb-2"><i class="fa fa-chalkboard-teacher fa-2x"></i></div>
                        <h5 class="card-title">Online Class</h5>
                        <p class="card-text text-muted small">Join live sessions</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-md-3 mb-3">
            <a href="{{ route('student.lms.recorded')}}" class="text-decoration-none">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <div class="mb-2"><i class="fa fa-video fa-2x"></i></div>
                        <h5 class="card-title">Lecture Video</h5>
                        <p class="card-text text-muted small">Watch recorded lectures</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-md-3 mb-3">
            <a href="" class="text-decoration-none">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <div class="mb-2"><i class="fa fa-book fa-2x"></i></div>
                        <h5 class="card-title">Note</h5>
                        <p class="card-text text-muted small">Download class notes</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-md-3 mb-3">
            <a href="{{ route('profile.edit')}}" class="text-decoration-none">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <div class="mb-2"><i class="fa fa-user fa-2x"></i></div>
                        <h5 class="card-title">Profile</h5>
                        <p class="card-text text-muted small">View & edit your profile</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

</div>

@endsection
