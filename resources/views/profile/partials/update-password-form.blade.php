<section class="mb-4">
    <header class="mb-3">
        <h2 class="h5 text-dark fw-bold">Update Password</h2>
        <p class="text-muted small">
            Ensure your account is using a long, random password to stay secure.
        </p>
    </header>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="current_password" class="form-label">Current Password</label>
            <input 
                type="password" 
                class="form-control @error('current_password', 'updatePassword') is-invalid @enderror" 
                id="current_password" 
                name="current_password" 
                autocomplete="current-password"
            >
            @error('current_password', 'updatePassword')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">New Password</label>
            <input 
                type="password" 
                class="form-control @error('password', 'updatePassword') is-invalid @enderror" 
                id="password" 
                name="password" 
                autocomplete="new-password"
            >
            @error('password', 'updatePassword')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input 
                type="password" 
                class="form-control @error('password_confirmation', 'updatePassword') is-invalid @enderror" 
                id="password_confirmation" 
                name="password_confirmation" 
                autocomplete="new-password"
            >
            @error('password_confirmation', 'updatePassword')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-primary">Save</button>

            @if (session('status') === 'password-updated')
                <span class="text-success small">Saved.</span>
            @endif
        </div>
    </form>
</section>
