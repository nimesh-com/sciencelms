
@extends('layouts.front')
@section('content')

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Class Notes</h3>
        <a href="" class="btn btn-sm btn-secondary">Back</a>
    </div>

    @if(session('message'))
        <div class="alert alert-info">{{ session('message') }}</div>
    @endif

    @if(isset($notes) && $notes->count())
        <div class="row">
            @foreach($notes as $note)
                <div class="col-12 col-md-6 col-lg-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title mb-1">{{ $note->title ?? 'Untitled Note' }}</h5>
                            <p class="mb-2 text-muted small">
                                {{ \Illuminate\Support\Str::limit($note->description ?? $note->summary ?? '', 120) }}
                            </p>

                            <ul class="list-inline text-muted small mb-3">
                                <li class="list-inline-item">
                                    <strong>Uploaded:</strong>
                                    {{ optional($note->created_at)->format('M d, Y') ?? '-' }}
                                </li>
                                @if(!empty($note->file_size))
                                    <li class="list-inline-item">• {{ $note->file_size }}</li>
                                @endif
                                @if(!empty($note->subject))
                                    <li class="list-inline-item">• {{ $note->subject }}</li>
                                @endif
                            </ul>

                            <div class="mt-auto d-flex justify-content-between">
                                <a href="{{ route('student.notes.show', $note->id) }}" class="btn btn-sm btn-outline-primary">View</a>

                                @php
                                    $fileUrl = $note->file_url ?? ($note->file_path ? asset('storage/' . $note->file_path) : null);
                                @endphp

                                @if($fileUrl)
                                    <a href="" target="_blank" class="btn btn-sm btn-primary" @if(pathinfo($fileUrl, PATHINFO_EXTENSION) !== 'pdf') download @endif>
                                        Download
                                    </a>
                                @else
                                    <button class="btn btn-sm btn-secondary" disabled>No file</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if(method_exists($notes, 'links'))
            <div class="mt-3">{{ $notes->links() }}</div>
        @endif

    @else
        <div class="alert alert-info">No notes available right now.</div>
    @endif
</div>

@endsection