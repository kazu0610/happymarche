<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
             {{ Auth::user()->name }}さんのお気に入り一覧
        </h2>
    </x-slot>

    <section class="text-gray-600 body-font overflow-hidden">
      <div class="container px-5 py-16 mx-auto">
        <div class="lg:w-1/2 mx-auto bg-white px-5 py-5 shadow">
         <div class="col-md-8">
             <h3 class="py-3 font-semibold text-xl text-gray-600 leading-tight">お気に入り商品</h4>
            @if($favorites->isNotEmpty())
             <hr class="my-1">

                 <div class="row">
                     @foreach ($favorites as $fav)
                     <div class="col-md-7 py-3">
                         <div class="flex justify-between">
                             <a href="{{route('product.show', $fav->favoriteable_id)}}" class="w-25">
                                 @if (App\Models\Product::find($fav->favoriteable_id)->product_image)
                                 <img src="{{ asset('storage/images/'.App\Models\Product::find($fav->favoriteable_id)->product_image) }}" class="object-center w-full h-96 md:h-auto object-cover md:w-48 rounded-t-lg md:rounded-none md:rounded-l-lg">
                                 @else
                                 <img src="{{ asset('storage/images/no_product_image.png')}}" class="object-cover object-center h-24 w-24">
                                 @endif
                             </a>
                                <div class="my-auto text-gray-500">
                                     <h5 class="text-xl my-2">{{App\Models\Product::find($fav->favoriteable_id)->product_name}}</h5>
                                     <h6 class="text-base my-2">&yen;{{App\Models\Product::find($fav->favoriteable_id)->price}}</h6>
                                </div>
                                <div class="flex my-auto justify-end">
                                    <form method="POST" action="{{route('carts.store')}}" enctype="multipart/form-data">
                                         @csrf
                                         <input type="hidden" name="id" value="{{App\Models\Product::find($fav->favoriteable_id)->id}}">
                                         <input type="hidden" name="image" value="{{App\Models\Product::find($fav->favoriteable_id)->product_image}}">
                                         <input type="hidden" name="name" value="{{App\Models\Product::find($fav->favoriteable_id)->product_name}}">
                                         <input type="hidden" name="price" value="{{App\Models\Product::find($fav->favoriteable_id)->price}}">
                                         <input type="hidden" name="qty" value="1">
                                         <input type="hidden" name="weight" value="0">
                                         <button class="mx-2 text-white bg-orange-500 border-0 py-2 px-6 focus:ring-4 focus:ring-blue-300 hover:bg-orange-600 rounded">
                                             <i class="fas fa-shopping-cart"></i>
                                             カートに入れる
                                         </button>
                                     </form>
                                     <a href="{{ route('products.favorite', $fav->favoriteable_id) }}" class="text-white bg-red-600 border-0 py-2 px-6 focus:ring-4 focus:ring-blue-300 hover:bg-red-700 rounded">
                                         <i class="fa-solid fa-trash-can"></i>
                                         削除
                                     </a>
                                 </div>
                         </div>
                     </div>
                     @endforeach
                 </div>

                 <hr>
                    </div>
                </div>
            </div>
            </section>

            <div class="flex justify-center mb-16 mx-auto">
              <button class="text-white bg-orange-500 border-0 py-2 px-6 focus:ring-4 focus:ring-blue-300 hover:bg-orange-600 rounded">
                <a href="{{route('dashboard')}}">管理画面へ戻る</a>
              </button>
            </div>

            @else
            <div class="w-full max-w-4xl mx-auto bg-white rounded-sm border border-gray-200 mt-10 mb-10">
                <p class="text-center mt-5">お気に入りがありません。</p>

                <div class="flex justify-center my-10">
                    <button class="mx-3 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                      <a href="{{route('dashboard')}}">管理画面へ戻る</a>
                    </button>
                </div>
            </div>
            @endif

</x-app-layout>
