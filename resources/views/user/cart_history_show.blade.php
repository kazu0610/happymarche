<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
             {{ Auth::user()->name }}さんの注文履歴詳細
        </h2>
    </x-slot>

    <section class="text-gray-600 body-font overflow-hidden">
      <div class="container px-5 py-16 mx-auto">
        <div class="lg:w-1/2 mx-auto bg-white px-5 py-5 shadow">
         <div class="col-md-8">
             <h3 class="py-3 font-semibold text-xl text-gray-700 leading-tight">ご注文情報</h4>
            @if($cart_contents->isNotEmpty())
             <hr class="my-1">

             <div class="">
                 <div class="flex justify-between">
                     <div class="flex-1 mt-2">
                         注文番号
                     </div>
                     <div class="flex-1 mt-2">
                         {{ $cart_info->code }}
                     </div>
                </div>

                <div class="flex">
                     <div class="flex-1 mt-2">
                         注文日時
                     </div>
                     <div class="flex-1 mt-2">
                         {{ $cart_info->updated_at }}
                     </div>
                </div>

                <div class="flex">
                     <div class="flex-1 mt-2">
                         合計金額
                     </div>
                     <div class="flex-1 mt-2">
                         {{ $cart_info->price_total }}円
                     </div>
                </div>

                <div class="flex">
                     <div class="flex-1 mt-2">
                         合計数量
                     </div>
                     <div class="flex-1 mt-2">
                         {{ $cart_info->qty }}
                     </div>
                </div>

             <hr class="my-2">

             <div class="">
                 @foreach ($cart_contents as $product)
                 <div class="my-3">
                     <div class="flex justify-between">
                         <div class="flex-1 mt-2">
                             <a href="{{route('product.show', $product->id)}}" class="ml-4">
                                 @if ($product->options->image)
                                 <img src="{{ asset('storage/images/'.$product->options->image) }}" class="object-center w-full h-96 md:h-auto object-cover md:w-48 rounded-t-lg md:rounded-none md:rounded-l-lg">
                                 @else
                                 <img src="{{ asset('storage/images/no_product_image.png')}}" class="object-center w-full h-48 md:h-auto object-cover md:w-48 rounded-t-lg md:rounded-none md:rounded-l-lg">
                                 @endif
                             </a>
                         </div>
                         <div class="flex-1 my-3">
                             <p class="my-5 font-semibold">
                             {{$product->name}}
                            </p>
                        <div class="flex">
                             <div class="flex-1 mt-2">
                                 数量
                             </div>
                             <div class="flex-1 mt-2">
                                  {{$product->qty}}
                             </div>
                         </div>
                         <div class="flex">
                              <div class="flex-1 mt-2">
                                  合計
                              </div>
                              <div class="flex-1 mt-2">
                                 ￥{{$product->qty * $product->price}}
                              </div>
                         </div>
                      </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </section>

    <div class="flex justify-center mb-16 mx-auto">
      <button class="text-white bg-orange-500 border-0 py-2 px-6 focus:ring-4 focus:ring-blue-300 hover:bg-orange-600 rounded">
        <a href="{{route('cart_history')}}">注文履歴へ戻る</a>
      </button>
    </div>

    @else
    <div class="w-full max-w-4xl mx-auto bg-white rounded-sm border border-gray-200 mt-10 mb-10">
        <p class="text-center mt-5">注文履歴がありません。</p>

        <div class="flex justify-center my-10">
            <button class="mx-3 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
              <a href="{{route('dashboard')}}">管理画面へ戻る</a>
            </button>
        </div>
    </div>
    @endif

</x-app-layout>
