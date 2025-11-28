<section class="mb-5">
    <header class="mb-3">
        <h2 class="h5 text-dark fw-bold">Delete Account</h2>
        <p class="text-muted small">
            Once your account is deleted, all of its resources and data will be permanently deleted.
            Before deleting your account, please download any information you wish to retain.
        </p>
    </header>

    <!-- Delete Button -->
    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
        Delete Account
    </button>

    <!-- Modal -->
    <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <form method="POST" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('DELETE')

                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteAccountModalLabel">Are you sure?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <p class="small text-muted">
                            Once your account is deleted, all your resources and data will be permanently deleted.
                            Please enter your password to confirm.
                        </p>

                        <div class="mb-3">
                            <label for="delete_password" class="form-label">Password</label>
                            <input 
                                type="password" 
                                id="delete_password" 
                                name="password" 
                                class="form-control @error('password','userDeletion') is-invalid @enderror"
                                placeholder="Enter your password"
                                required
                            >

                            {{-- Error handling --}}
                            @if ($errors->userDeletion->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->userDeletion->first('password') }}
                                </div>
                            @elseif ($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-danger btn-sm">
                            Delete Account
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</section>
