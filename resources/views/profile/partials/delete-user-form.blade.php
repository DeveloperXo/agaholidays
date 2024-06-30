<section class="space-y-6">
    <header>
        <h2 class="text-lg">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-p   ">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteAccountModal"
        >
        {{ __('Delete Account') }}
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <div class="modal fade {{ $errors->userDeletion->isNotEmpty() ? 'show' : '' }}" data-bs-backdrop="static" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel"  {{ $errors->userDeletion->isNotEmpty() ? 'aria-modal=true role=dialog style=display:block;' : 'aria-hidden=true' }}>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="deleteAccountModalLabel">{{ __('Are you sure you want to delete your account?') }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" x-on:click="$dispatch('close')"></button>
                    </div>
                    <div class="modal-body">
                    <p class="mb-2 text-p">
                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                    </p>

                    <form method="post" id="deleteModalForm" action="{{ route('profile.destroy') }}" class="p-6">
                        @csrf
                        @method('delete')

                        <div class="mt-6">
                            <label for="password" class="form-label mb-0">{{ __('Password') }}</label>

                            <input
                                id="password"
                                name="password"
                                type="password"
                                class="mt-2 form-control rounded-md"
                                placeholder="{{ __('Password') }}"
                            />

                            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                        </div>

                    </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" x-on:click="$dispatch('close')">Cancel</button>
                        <button type="submit" form="deleteModalForm" class="btn btn-primary">Delete Account</button>
                    </div>
                </div>
            </div>
        </div>

    </x-modal>
</section>
