<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('アカウント情報') }}</h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">{{ __('アカウント情報を更新できます') }}</p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div>
            <x-input-label for="image" :value="__('プロフィール画像')" />
            @if($user->image)
            <img alt="プロフィール画像" class="object-cover object-center border-2 border-gray-300 rounded-full h-24 w-24" src="{{ asset('storage/images/'.$user->image)}}">
            @else
            <img alt="プロフィール画像" class="w-1/5" src="{{ asset('storage/images/no_profile_image.png')}}">
            @endif
            <input id="image" name="image" type="file" class="mt-1 block" autofocus autocomplete="image" />
            <x-input-error class="mt-2" :messages="$errors->get('image')" />
        </div>

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="email" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}"

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <x-input-label for="tel" :value="__('電話番号')" />
            <p class="text-gray-500 text-sm">数字のみで入力してください（例：08012345678）</p>
            <x-text-input id="tel" name="tel" type="text" class="mt-1 block w-full" :value="old('tel', $user->tel)" autofocus autocomplete="tel" />
            <x-input-error class="mt-2" :messages="$errors->get('tel')" />
        </div>

        <div>
            <x-input-label for="postcode" :value="__('郵便番号')" />
            <p class="text-gray-500 text-sm">数字のみで入力してください（例：6101234）</p>
            <x-text-input id="postcode" name="postcode" type="text" class="mt-1 block w-full" :value="old('postcode', $user->postcode)" autofocus autocomplete="postcode" />
            <x-input-error class="mt-2" :messages="$errors->get('postcode')" />
        </div>

        <div>
            <x-input-label for="address" :value="__('住所')" />
            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address', $user->address)" autofocus autocomplete="address" />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>

        @can('shop')
        <div>
            <x-input-label for="area" :value="__('生産地')" />
            <p class="text-gray-500 text-sm">都道府県と市区町村を記載ください（例：大阪府大阪市）</p>
            <x-text-input id="area" name="area" type="text" class="mt-1 block w-full" :value="old('area', $user->area)" autofocus autocomplete="area" />
            <x-input-error class="mt-2" :messages="$errors->get('area')" />
        </div>

        @elsecan('admin')
        <div>
            <x-input-label for="area" :value="__('生産地')" />
            <p class="text-gray-500 text-sm">都道府県と市区町村を記載ください（例：大阪府大阪市）</p>
            <x-text-input id="area" name="area" type="text" class="mt-1 block w-full" :value="old('area', $user->area)" autofocus autocomplete="area" />
            <x-input-error class="mt-2" :messages="$errors->get('area')" />
        </div>
        @endcan

        <div class="flex items-center gap-4">
            <button class="text-white bg-orange-500 border-0 py-2 px-6 focus:ring-4 focus:ring-blue-300 hover:bg-orange-600 rounded">{{ __('更新する') }}</button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
