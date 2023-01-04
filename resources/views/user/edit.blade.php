<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            ユーザ情報編集
        </h2>
        <!-- エラーメッセージを表示 -->
        <x-auth-validation-errors2 class="mb-4" :errors="$errors" />
        <!-- 投稿メッセージを表示 -->
        <x-message :message="session('message')" />

    </x-slot>

        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="sm:p-8 bg-white shadow my-10 mx-4">
                <form method="post" action="{{ route('user.update', $user) }}" enctype="multipart/form-data">
                @csrf
                    @method('patch')
                    <div class="md:flex items-center mt-8">
                        <div class="w-full flex flex-col">
                            <label for="image" class="mb-2 font-semibold leading-none mt-4">プロフィール画像</label>
                                    @if($user->image)
                                        <img src="{{ asset('storage/images/'.$user->image)}}" class="object-cover object-center border-2 border-gray-300 rounded-full h-24 w-24 mb-3">
                                    @else
                                        <img alt="プロフィール画像" class="object-cover object-center rounded-full h-24 w-24 mb-3" src="{{ asset('storage/images/no_profile_image.png')}}">
                                    @endif
                            <div>
                            <input id="image" type="file" name="image">
                            </div>
                        </div>
                    </div>

                    <div class="w-full flex flex-col">
                      <label for="name" class="mb-2 font-semibold leading-none mt-4">名前</label>
                      <input type="text" name="name" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="name" placeholder="名前" value="{{old('name', $user->name)}}">
                    </div>

                    <div class="w-full flex flex-col">
                      <label for="email" class="mb-2 font-semibold leading-none mt-4">メールアドレス</label>
                      <input type="email" name="email" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="email" placeholder="メールアドレス" value="{{old('email', $user->email)}}">
                    </div>

                    <div class="w-full flex flex-col">
                      <label for="tel" class="mb-2 font-semibold leading-none mt-4">電話番号</label>
                      <input type="text" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="tel" placeholder="電話番号" value="{{old('tel', $user->tel)}}">
                    </div>

                    <div class="w-full flex flex-col">
                      <label for="postcode" class="mb-2 font-semibold leading-none mt-4">郵便番号</label>
                      <input type="text" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="postcode" placeholder="郵便番号" value="{{old('postcode', $user->postcode)}}">
                    </div>

                    <div class="w-full flex flex-col">
                      <label for="address" class="mb-2 font-semibold leading-none mt-4">住所</label>
                      <input type="text" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="address" placeholder="住所" value="{{old('address', $user->address)}}">
                    </div>

                    <div class="w-full flex flex-col">
                      <label for="area" class="mb-2 font-semibold leading-none mt-4">生産地</label>
                      <input type="text" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="area" placeholder="生産地" value="{{old('area', $user->area)}}">
                    </div>

                    <div class="w-full flex flex-col">
                         <label for="area" class="mb-2 font-semibold leading-none mt-4">ユーザータイプ</label>
                        <select name="role" id="role" class="mt-1 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.8 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                          <option value="">選択してください</option>
                          <option value="1" @if(old('role', $user) == '1') selected @endif >一般会員</option>
                          <option value="50" @if(old('role', $user) == '50') selected @endif >販売者</option>
                          <option value="100" @if(old('role', $user) == '100') selected @endif >管理者</option>
                        </select>
                    </div>

                    <button class="mt-8 text-white bg-orange-500 border-0 py-2 px-6 focus:ring-4 focus:ring-blue-300 hover:bg-orange-600 rounded">
                        更新する
                    </button>

                </form>
            </div>
            <div class="flex justify-center">
                <button class="mb-10 text-white bg-orange-500 border-0 py-2 px-6 focus:ring-4 focus:ring-blue-300 hover:bg-orange-600 rounded" onclick="location.href='{{ route('user.index') }}'">
                    ユーザ一覧へ戻る
                </button>
            </div>
        </div>
</x-app-layout>
