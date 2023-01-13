<x-app>
    <form method="post" action="{{route('profile.update',$user)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">{{ __('Name') }}</label>
            <input id="name" type="text" class="border border-gray-400 p-2 w-full @error('name') is-invalid @enderror" name="name" value="{{  old('name', $user->name)  }}" required autofocus>
            @error('name')
                <p class="text-red-500 text-xs mt-2" role="alert">
                    <strong>{{ $message }}</strong>
                </p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">{{ __('Username') }}</label>
            <input id="username" type="text" class="border border-gray-400 p-2 w-full @error('username') is-invalid @enderror" name="username" value="{{ old('username',$user->username) }}" required autofocus>
            @error('username')
            <p class="text-red-500 text-xs mt-2" role="alert">
                <strong>{{ $message }}</strong>
            </p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">{{ __('Email') }}</label>
            <input id="email" type="email" class="border border-gray-400 p-2 w-full @error('email') is-invalid @enderror" name="email" value="{{ old('email',$user->email) }}" required autofocus>
            @error('email')
            <p class="text-red-500 text-xs mt-2" role="alert">
                <strong>{{ $message }}</strong>
            </p>
            @enderror
        </div>
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="avatar">
                Avatar
            </label>

            <div class="flex">
                <input class="border border-gray-400 p-2 w-full" type="file" name="avatar" id="avatar" accept="image/*">
            </div>

            @error('avatar')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        @if (!empty($user->avatar))
        <div class="mb-6">

            <div class="flex">
                    <img src="{{ $user->avatar }}" alt="your avatar" width="100">

            </div>

        </div>
        @endif

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="background">
                Avatar
            </label>

            <div class="flex">
                <input class="border border-gray-400 p-2 w-full" type="file" name="background" id="background" accept="image/*">
            </div>

            @error('background')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        @if (!empty($user->background))
            <div class="mb-6">

                <div class="flex">
                    <img src="{{ $user->background }}" alt="your avatar" width="200">

                </div>

            </div>
        @endif
        <div class="mb-6">
            <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">{{ __('Password') }}</label>
            <input id="password" type="password" class="border border-gray-400 p-2 w-full @error('password') is-invalid @enderror" name="password">
            @error('password')
            <p class="text-red-500 text-xs mt-2" role="alert">
                <strong>{{ $message }}</strong>
            </p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password-confirm" class="block mb-2 uppercase font-bold text-xs text-gray-700">{{ __('Confirm password') }}</label>
            <input id="password-confirm" type="password" class="border border-gray-400 p-2 w-full @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
            @error('password_confirmation')
            <p class="text-red-500 text-xs mt-2" role="alert">
                <strong>{{ $message }}</strong>
            </p>
            @enderror
        </div>
        <div class="mb-6">
            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                Submit
            </button>
        </div>
    </form>
</x-app>
