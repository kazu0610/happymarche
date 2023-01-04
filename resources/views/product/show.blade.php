<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            商品詳細
        </h2>

        <x-message :message="session('message')" />

    </x-slot>

<section class="text-gray-600 body-font overflow-hidden">
  <div class="container px-5 py-24 mx-auto">
    <div class="lg:w-4/5 mx-auto flex flex-wrap bg-white px-5 py-5 shadow">
      @if($product->product_image)
      <img alt="商品画像" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" src="{{ asset('storage/images/'.$product->product_image)}}">
      @else
      <img alt="商品画像" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" src="{{ asset('storage/images/no_product_image.png')}}">
      @endif
      <div class="relative lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
          @can('admin')
          <a href="{{route('product.edit', $product)}}"><button class="absolute top-0 right-20 mr-3 text-white bg-orange-500 border-0 py-2 px-6 focus:ring-4 focus:ring-blue-300 hover:bg-orange-600 rounded">編集</button></a>
          <form method="post" action="{{route('product.destroy', $product)}}">
            @csrf
            @method('delete')
            <button class="absolute top-0 right-0 text-white bg-red-600 border-0 py-2 px-6 focus:ring-4 focus:ring-blue-300 hover:bg-red-700 rounded" onClick="return confirm('本当に削除しますか？');">削除</button>
          </form>
          @endcan
        <h2 class="text-sm title-font text-gray-500 tracking-widest">商品名</h2>
        <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ $product->product_name }}</h1>
        <hr class="w-full mb-3">
        <div class="mb-3 flex">
          @if($product->user->image)
          <img alt="プロフィール画像" class="object-cover object-center border-2 border-gray-300 rounded-full h-24 w-24" src="{{ asset('storage/images/'.$product->user->image)}}">
          @else
          <img alt="プロフィール画像" class="object-cover object-center rounded-full h-24 w-24 inline-block" src="{{ asset('storage/images/no_profile_image.png')}}">
          @endif
            <div class="ml-5 my-auto">
              <div class="text-lg font-medium">{{ $product->user->name }}</div>
              <div class="text-sm text-gray-400">{{ $product->user->area }}</div>
              <a class="no-underline hover:underline text-blue-500" href="{{ route('review.index') }}">クチコミを確認する</a>
            </div>
        </div>
        <p class="leading-relaxed">{!! nl2br(htmlspecialchars($product->detail)) !!}</p>
        <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-100 mb-5">
          <div class="w-full flex flex-col">
              <form method="post" action="{{route('carts.store')}}"  enctype="multipart/form-data">
                  @csrf
                <input type="hidden" name="id" value="{{ $product->id }}">
                <input type="hidden" name="image" value="{{$product->product_image}}">
                <input type="hidden" name="name" value="{{$product->product_name}}">
                <input type="hidden" name="price" value="{{$product->price}}">
                <input type="hidden" name="weight" value="0">
            <label for="quantity" class="mb-2 font-semibold leading-none mt-4">数量</label>
            <input type="number" id="quantity" name="qty" max="999" min="1" class="w-1/2 py-2 border border-gray-300 rounded-md" value="1">
          </div>
        </div>
        <div class="flex justify-between">
          <span class="flex items-center title-font font-medium text-2xl text-gray-900">価格：{{$product->price}}円</span>

                <button class="text-white bg-orange-500 border-0 py-2 px-6 focus:ring-4 focus:ring-blue-300 hover:bg-orange-600 rounded">
                    <i class="fas fa-shopping-cart"></i>
                    カートに入れる
                </button>

                @if($product->isFavoritedBy(Auth::user()))
                         <a href="{{ route('products.favorite', $product) }}" class="text-orange-500 bg-white border border-orange-500 py-2 px-6 focus:ring-4 focus:ring-blue-300 hover:bg-orange-100 rounded">
                             <i class="fa fa-heart"></i>
                             お気に入り解除
                         </a>
                         @else
                         <a href="{{ route('products.favorite', $product) }}" class="text-orange-500 bg-white border border-orange-500 py-2 px-6 focus:ring-4 focus:ring-blue-300 hover:bg-orange-100 rounded">
                             <i class="fa fa-heart"></i>
                             お気に入り
                         </a>
                         @endif
            </form>

          <!-- お気に入りボタン -->
          <!-- <button class="rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4">
            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
              <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"></path>
            </svg>
          </button> -->
        </div>
      </div>

      <div class="mt-16 mx-auto">
        <button class="text-white bg-orange-500 border-0 py-2 px-6 focus:ring-4 focus:ring-blue-300 hover:bg-orange-600 rounded">
          <a href="{{route('product.index')}}">商品一覧へ戻る</a>
        </button>
      </div>

    </div>
  </div>
</section>
</x-app-layout>
