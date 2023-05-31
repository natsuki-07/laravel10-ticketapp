<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            User Avatar
        </h2>

    </header>
        <img width="50" height="50" src="{{ "/storage/$user->avatar" }}" alt="">

        <form action="{{ route('profile.avatar.ai') }}" method="post" class="mt-4">
            @csrf
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Generate avatar from AI
            </p>
            <x-primary-button>Generate Avatar</x-primary-button>
        </form>

        <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">
            Add or update user avatar
        </p>

        @if (session('message'))
        <div class="text-red-500">
            {{ session('message') }}
        </div>
        @endif
        <form method="post" action="{{ route('profile.avatar') }}">
            @csrf
            @method('patch')
            <div>
                <x-input-label for="avatar" value="avatar" />
                <x-text-input id="avatar" avatar="avatar" type="file" class="mt-1 block w-full" :value="old('avatar', $user->avatar)" required autofocus autocomplete="avatar" />
                <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
            </div>

            <div class="flex items-center gap-4 mt-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
            </div>
        </form>
</section>
