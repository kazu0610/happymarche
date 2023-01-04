<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            商品登録
        </h2>
        <!-- エラーメッセージを表示 -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <!-- 投稿メッセージを表示 -->
        <x-message :message="session('message')" />

    </x-slot>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mx-4 sm:p-8">
                <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
                @csrf
                    <div class="md:flex items-center mt-8">
                      <div class="w-full flex flex-col">
                        <label for="product_name" class="mb-2 font-semibold leading-none mt-4">商品名</label>
                        <input type="text" name="product_name" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="product_name" placeholder="商品名" value="{{old('product_name')}}">
                      </div>
                    </div>

                    <div class="w-full flex flex-col">
                      <label for="detail" class="mb-2 font-semibold leading-none mt-4">商品説明</label>
                      <textarea name="detail" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="body" cols="30" rows="10">{{old('detail')}}</textarea>
                    </div>

                    <div class="w-full flex flex-col">
                        <label for="product_image" class="mb-2 font-semibold leading-none mt-4">商品画像</label>
                        <div>
                        <input id="product_image" type="file" name="product_image">
                        </div>
                    </div>

                    <div class="w-full flex flex-col">
                      <label for="price" class="mb-2 font-semibold leading-none mt-4">単価</label>
                      <input type="number" min="1" name="price" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="price" placeholder="単価" value="{{old('price')}}">
                    </div>

                    <button class="mt-4 text-white bg-orange-500 border-0 py-2 px-6 focus:ring-4 focus:ring-blue-300 hover:bg-orange-600 rounded">
                        登録する
                    </button>

                </form>
            </div>
        </div>
</x-app-layout>
