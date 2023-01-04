<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            商品一覧
        </h2>

        <x-message :message="session('message')" />

    </x-slot>

    {{-- 投稿一覧表示用のコード --}}
    <div class="container grid grid-cols-3 mx-auto px-4 sm:px-6 lg:px-8 mt-5">
        @foreach ($products as $product)
          <div class="relative bg-white shadow-md rounded-lg max-w-sm dark:bg-gray-800 dark:border-gray-700 my-10 grid-cols-3 group overflow-hidden">
            @if($product->product_image)
            <img class="rounded-t-lg h-64 w-full p-2 object-cover object-center" src="{{ asset('storage/images/'.$product->product_image)}}" alt="product image">
            @else
            <img class="rounded-t-lg h-64 w-full p-2 object-cover object-center" src="{{ asset('storage/images/no_product_image.png')}}" alt="product image">
            @endif

            <div class="mb-3 flex ml-5">
                @if($product->user->image)
                <img alt="プロフィール画像" class="object-cover object-center border-2 border-gray-300 rounded-full h-16 w-16" src="{{ asset('storage/images/'.$product->user->image)}}">
                @else
                <img alt="プロフィール画像" class="object-cover object-center rounded-full h-16 w-16 inline-block" src="{{ asset('storage/images/no_profile_image.png')}}">
                @endif
                <div class="ml-5 my-auto">
                    <div class="text-lg font-medium">{{ $product->user->name }}<span class="text-sm text-gray-600">さんの出品</span></div>
                </div>
            </div>

            <div class="px-5 pb-5">
              <a href="#">
                <h3 class="text-gray-900 font-semibold text-xl tracking-tight dark:text-white"><span class="text-sm text-gray-600">商品名：</span>{{$product->product_name}}</h3>
              </a>
              <div class="flex items-center mt-2.5 mb-5">
                  <span class="text-sm text-gray-600  font-semibold">生産地：</span>
                @if($product->user->area)
                <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">{{ $product->user->area }}</span>
                @else
                <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">国産</span>
                @endif
              </div>
              <div class="flex items-center justify-between">
                <span class="text-3xl font-bold text-gray-900 dark:text-white">¥{{$product->price}}</span>
                <a href="{{route('product.show', $product)}}" class="text-white focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-orange-500 hover:bg-orange-600 dark:focus:ring-blue-800">詳細をみる</a>
              </div>
            </div>
          </div>
          @endforeach
    </div>

    <div class="d-flex justify-content-center">
    {{ $products->links('vendor.pagination.tailwind2') }}
    </div>
</x-app-layout>
