<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
             {{ Auth::user()->name }}さんのカートの中身
        </h2>

        <x-message :message="session('message')" />

    </x-slot>


                <div class="flex justify-center mt-10">
                   <p class="text-center">
                       @if(isset($message))
                       <div class="w-1/3 text-center border px-4 py-3 rounded relative bg-green-100 border-green-400 text-green-700">
                           {{$message}}
                        </div>
                        @endif
                    </p>
                </div>

                @if($cart->isNotEmpty())
                <section class="antialiased bg-gray-100 text-gray-600 px-4" x-data="app">
                    <!-- Table -->
                    <div class="w-full max-w-4xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200 mt-10 mb-10">
                        <header class="px-5 py-4 border-b border-gray-100">
                            <div class="font-semibold text-gray-800">カートの中身</div>
                        </header>

                        <div class="overflow-x-auto p-3">
                            <table class="table-auto w-full">
                                <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                    <tr>
                                        <th class="p-2">
                                            <div class="font-semibold text-center">商品画像</div>
                                        </th>
                                        <th class="p-2">
                                            <div class="font-semibold text-center">商品名</div>
                                        </th>
                                        <th class="p-2">
                                            <div class="font-semibold text-center">数量</div>
                                        </th>
                                        <th class="p-2">
                                            <div class="font-semibold text-center">価格</div>
                                        </th>
                                        <th class="p-2">
                                            <div class="font-semibold text-center">削除</div>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="text-sm divide-y divide-gray-100">
                                    <!-- record 1 -->
                                    @foreach($cart as $product)
                                    <tr>
                                        <td class="p-2">
                                            <a href="{{route('product.show', $product->id)}}">
                                                @if($product->options->image)
                                                <img alt="商品画像" class="mx-auto object-cover object-center h-24 w-24" src="{{ asset('storage/images/'.$product->options->image) }}">
                                                @else
                                                <img alt="商品画像" class="mx-auto object-cover object-center h-24 h-24" src="{{ asset('storage/images/no_product_image.png')}}">
                                                @endif
                                            </a>
                                        </td>
                                        <td class="p-2">
                                            <div class="text-center font-medium text-gray-800">
                                                {{ $product->name }}
                                            </div>
                                        </td>
                                        <td class="p-2">
                                            <div class="text-center">
                                                {{ $product->qty }}
                                            </div>
                                        </td>
                                        <td class="p-2">
                                            <div class="text-center font-medium text-green-500">
                                                {{ $product->qty * $product->price  }}円
                                            </div>
                                        </td>
                                        <td class="p-2">
                                            <div class="flex justify-center">
                                                <form method="post" action="{{route('carts.delete', $product->rowId)}}">
                                                  @csrf
                                                    <button onClick="return confirm('本当に削除しますか？');">
                                                        <svg class="w-8 h-8 hover:text-blue-600 rounded-full hover:bg-gray-100 p-1"
                                                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                </a>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                            <!-- total amount -->
                            <div class="flex justify-end font-bold space-x-4 text-2xl border-t border-gray-100 px-5 py-4">
                                <div class="text-blue-600">合計金額:{{ number_format($total) }}円<span x-text="total.toFixed(2)"></span></div>
                            </div>
                            <div class="flex justify-center my-5">
                                <form  method="POST" action="{{route('carts.destroy')}}">
                                    @csrf
                                    @if (empty(Auth::user()->token))
                                    <div class="disabled mx-3 text-white bg-orange-500 border-0 py-2 px-6 focus:ring-4 focus:ring-blue-300 hover:bg-orange-600 rounded cursor-not-allowed">クレジットカードを登録してください</div>
                                    @else
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="mx-3 text-white bg-orange-500 border-0 py-2 px-6 focus:ring-4 focus:ring-blue-300 hover:bg-orange-600 rounded" onClick="return confirm('購入しますか？');">購入手続きへ</button>
                                    @endif

                                </form>
                                    <button class="mx-3 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                      <a href="{{route('product.index')}}">お買い物を続ける</a>
                                    </button>
                            </div>



                            @else
                            <div class="w-full max-w-4xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200 mt-10 mb-10">
                                <p class="text-center mt-5">カートは空です。</p>

                                <div class="flex justify-center my-10">
                                    <button class="mx-3 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                      <a href="{{route('product.index')}}">お買い物を続ける</a>
                                    </button>
                                </div>
                            </div>
                            @endif

                        </div>
                    </div>
                </section>
</x-app-layout>
