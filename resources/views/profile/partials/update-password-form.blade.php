<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-p">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="col-12 col-md-7">
            <label class="form-label mb-0" for="update_password_current_password">{{ __('Current Password') }}</label>
            <input id="update_password_current_password" name="current_password" type="password" class="mt-2 form-control rounded-md" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div class="col-12 col-md-7">
            <label class="form-label mb-0 mt-3" for="update_password_password">{{ __('New Password') }}</label>
            <input id="update_password_password" name="password" type="password" class="mt-2 form-control rounded-md" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div class="col-12 col-md-7">
            <label class="form-label mb-0 mt-3" for="update_password_password_confirmation">{{ __('Confirm Password') }}</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-2 form-control rounded-md" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="d-flex align-items-center column-gap-4 mt-3">
            <button class="btn btn-primary">{{ __('Save') }}</button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-p text-success mt-2"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
