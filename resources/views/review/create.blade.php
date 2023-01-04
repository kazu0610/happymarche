<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-600 leading-tight">
            レビュー投稿
        </h2>
        <!-- エラーメッセージを表示 -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <!-- 投稿メッセージを表示 -->
        <x-message :message="session('message')" />

    </x-slot>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mx-4 sm:p-8">
                <form method="post" action="{{route('review.store')}}">
                @csrf
                    <div class="md:flex items-center mt-8">
                      <div class="w-full flex flex-col">
                        <label for="seller_name" class="mb-2 font-semibold leading-none mt-4">販売者名</label>
                        <input type="text" name="seller_name" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="seller_name" placeholder="販売者名" value="{{old('seller_name')}}">
                      </div>
                    </div>

                    <div class="w-full flex flex-col">
                      <label for="title" class="mb-2 font-semibold leading-none mt-4">レビュータイトル</label>
                      <input type="text" name="title" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="title" placeholder="レビュータイトル" value="{{old('title')}}">
                    </div>

                    <div class="w-full flex flex-col">
                      <label for="reviewScore" class="mb-2 font-semibold leading-none mt-4">{{ __('評価') }}</label>
                      <select name="reviewScore" id="reviewScore" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.8 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">選択してください</option>
                        <option value="★" @if(old('reviewScore') == '★') selected @endif >★</option>
                        <option value="★★" @if(old('reviewScore') == '★★') selected @endif >★★</option>
                        <option value="★★★" @if(old('reviewScore') == '★★★') selected @endif >★★★</option>
                        <option value="★★★★" @if(old('reviewScore') == '★★★★') selected @endif >★★★★</option>
                        <option value="★★★★★" @if(old('reviewScore') == '★★★★★') selected @endif >★★★★★</option>
                      </select>
                    </div>

                    <div class="w-full flex flex-col">
                      <label for="product_name" class="mb-2 font-semibold leading-none mt-4">購入商品</label>
                      <input type="text" name="product_name" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="product_name" placeholder="購入商品" value="{{old('product_name')}}">
                    </div>

                    <div class="w-full flex flex-col">
                      <label for="body" class="mb-2 font-semibold leading-none mt-4">コメント</label>
                      <textarea name="body" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="body" cols="30" rows="10">{{old('body')}}</textarea>
                    </div>

                    <button class="mt-4 text-white bg-orange-500 border-0 py-2 px-6 focus:ring-4 focus:ring-blue-300 hover:bg-orange-600 rounded">
                        投稿する
                    </button>

                </form>
            </div>
        </div>
</x-app-layout>
