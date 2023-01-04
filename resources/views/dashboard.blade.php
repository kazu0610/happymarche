<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!DOCTYPE html>
    <!-- <html lang="ja"> -->
      <!-- <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
        <!-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> -->
        <!-- <link href=https://stitches.hyperyolo.com/output.css rel="stylesheet"> -->
        <!-- <link rel="stylesheet" href=https://use.fontawesome.com/releases/v5.6.3/css/all.css integrity=sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/ crossorigin="anonymous">
      </head> -->
      <body>
        <section class="my-8 font-sans container m-auto max-w-6xl ">
            <div class="flex flex-col sm:flex-row flex-wrap my-8">

                  <button class="sm:w-1/2 md:w-1/3 flex flex-col items-center justify-center p-8 border border-gray-200 rounded bg-white w-64 hover:bg-gray-50 hover:border-b-4 hover:border-b-blue-500 active:bg-gray-100" onclick="location.href='{{ route('product.index') }}'">
                  <div class="flex justify-center items-center text-gray-500">
                    <i class="fa-solid fa-carrot fa-5x"></i>
                  </div>
                  <div class="text-center mt-4">
                    <h1 class="font-bold text-gray-700 text">商品一覧</h1>
                    <p class="text-500 text-sm mt-4">
                      商品の一覧が閲覧可能です
                    </p>
                  </div>
                 </button>

                 <button class="sm:w-1/2 md:w-1/3 flex flex-col items-center justify-center p-8 border border-gray-200 rounded bg-white w-64 hover:bg-gray-50 hover:border-b-4 hover:border-b-blue-500 active:bg-gray-100" onclick="location.href='{{ route('users.favorite') }}'">
                 <div class="flex justify-center items-center text-gray-500">
                   <i class="fa-solid fa-heart fa-5x"></i>
                 </div>
                 <div class="text-center mt-4">
                   <h1 class="font-bold text-gray-700 text">お気に入り商品一覧</h1>
                   <p class="text-500 text-sm mt-4">
                     お気に入りした商品の一覧が閲覧可能です
                   </p>
                 </div>
                </button>

                <button class="sm:w-1/2 md:w-1/3 flex flex-col items-center justify-center p-8 border border-gray-200 rounded bg-white w-64 hover:bg-gray-50 hover:border-b-4 hover:border-b-blue-500 active:bg-gray-100" onclick="location.href='{{ route('carts.index') }}'">
                <div class="flex justify-center items-center text-gray-500">
                  <i class="fa-solid fa-cart-shopping fa-5x"></i>
                </div>
                <div class="text-center mt-4">
                  <h1 class="font-bold text-gray-700 text">カートの中身</h1>
                  <p class="text-500 text-sm mt-4">
                    カートに追加した商品の一覧が閲覧可能です
                  </p>
                </div>
               </button>

                    @can('shop')
                      <button class="sm:w-1/2 md:w-1/3 flex flex-col items-center justify-center p-8 border border-gray-200 rounded bg-white w-64 hover:bg-gray-50 hover:border-b-4 hover:border-b-blue-500 active:bg-gray-100" onclick="location.href='{{ route('product.create') }}'">
                      <div class="flex justify-center items-center text-gray-500">
                          <i class="fa-solid fa-file-circle-plus fa-5x"></i>
                      </div>
                      <div class="text-center mt-4">
                        <h1 class="font-bold text-gray-700 text">商品登録</h1>
                        <p class="text-500 text-sm mt-4">
                          商品を登録可能です
                        </p>
                      </div>
                    </button>

                    @elsecan('admin')
                      <button class="sm:w-1/2 md:w-1/3 flex flex-col items-center justify-center p-8 border border-gray-200 rounded bg-white w-64 hover:bg-gray-50 hover:border-b-4 hover:border-b-blue-500 active:bg-gray-100" onclick="location.href='{{ route('product.create') }}'">
                      <div class="flex justify-center items-center text-gray-500">
                          <i class="fa-solid fa-file-circle-plus fa-5x"></i>
                      </div>
                      <div class="text-center mt-4">
                        <h1 class="font-bold text-gray-700 text">商品登録</h1>
                        <p class="text-500 text-sm mt-4">
                          商品を登録可能です
                        </p>
                      </div>
                    </button>
                    @endcan

                  <button class="sm:w-1/2 md:w-1/3 flex flex-col items-center justify-center p-8 border border-gray-200 rounded bg-white w-64 hover:bg-gray-50 hover:border-b-4 hover:border-b-blue-500 active:bg-gray-100" onclick="location.href='{{ route('review.index') }}'">
                  <div class="flex justify-center items-center text-gray-500">
                    <i class="fa-solid fa-star fa-5x"></i>
                  </div>
                  <div class="text-center mt-4">
                    <h1 class="font-bold text-gray-700 text">レビュー投稿一覧</h1>
                    <p class="text-500 text-sm mt-4">
                      投稿されたレビューを閲覧可能です
                    </p>
                  </div>
                </button>

                @can('general')
                <button class="sm:w-1/2 md:w-1/3 flex flex-col items-center justify-center p-8 border border-gray-200 rounded bg-white w-64 hover:bg-gray-50 hover:border-b-4 hover:border-b-blue-500 active:bg-gray-100" onclick="location.href='{{ route('review.create') }}'">
                <div class="flex justify-center items-center text-gray-500">
                  <i class="fa-solid fa-pencil fa-5x"></i>
                </div>
                <div class="text-center mt-4">
                  <h1 class="font-bold text-gray-700 text">レビュー投稿</h1>
                  <p class="text-500 text-sm mt-4">
                    レビューを投稿することが可能です
                  </p>
                </div>
              </button>
              @elsecan('admin')
              <button class="sm:w-1/2 md:w-1/3 flex flex-col items-center justify-center p-8 border border-gray-200 rounded bg-white w-64 hover:bg-gray-50 hover:border-b-4 hover:border-b-blue-500 active:bg-gray-100" onclick="location.href='{{ route('review.create') }}'">
              <div class="flex justify-center items-center text-gray-500">
                <i class="fa-solid fa-pencil fa-5x"></i>
              </div>
              <div class="text-center mt-4">
                <h1 class="font-bold text-gray-700 text">レビュー投稿</h1>
                <p class="text-500 text-sm mt-4">
                  レビューを投稿することが可能です
                </p>
              </div>
            </button>
            @endcan

              <button class="sm:w-1/2 md:w-1/3 flex flex-col items-center justify-center p-8 border border-gray-200 rounded bg-white w-64 hover:bg-gray-50 hover:border-b-4 hover:border-b-blue-500 active:bg-gray-100" onclick="location.href='{{ route('profile.edit') }}'">
              <div class="flex justify-center items-center text-gray-500">
                <i class="fa-solid fa-user-pen fa-5x"></i>
              </div>
              <div class="text-center mt-4">
                <h1 class="font-bold text-gray-700 text">ユーザー情報編集</h1>
                <p class="text-500 text-sm mt-4">
                  ユーザー情報を編集することが可能です
                </p>
              </div>
            </button>

            <button class="sm:w-1/2 md:w-1/3 flex flex-col items-center justify-center p-8 border border-gray-200 rounded bg-white w-64 hover:bg-gray-50 hover:border-b-4 hover:border-b-blue-500 active:bg-gray-100" onclick="location.href='{{ route('register_card') }}'">
            <div class="flex justify-center items-center text-gray-500">
              <i class="fa-regular fa-credit-card fa-5x"></i>
            </div>
            <div class="text-center mt-4">
              <h1 class="font-bold text-gray-700 text">クレジットカード登録</h1>
              <p class="text-500 text-sm mt-4">
                クレジットカード情報を登録することが可能です
              </p>
            </div>
          </button>

          <button class="sm:w-1/2 md:w-1/3 flex flex-col items-center justify-center p-8 border border-gray-200 rounded bg-white w-64 hover:bg-gray-50 hover:border-b-4 hover:border-b-blue-500 active:bg-gray-100" onclick="location.href='{{ route('cart_history') }}'">
          <div class="flex justify-center items-center text-gray-500">
            <i class="fa-solid fa-rectangle-list fa-5x"></i>
          </div>
          <div class="text-center mt-4">
            <h1 class="font-bold text-gray-700 text">購入履歴</h1>
            <p class="text-500 text-sm mt-4">
              商品の購入履歴が閲覧可能です
            </p>
          </div>
        </button>

        @can('admin')
        <button class="sm:w-1/2 md:w-1/3 flex flex-col items-center justify-center p-8 border border-gray-200 rounded bg-white w-64 hover:bg-gray-50 hover:border-b-4 hover:border-b-blue-500 active:bg-gray-100" onclick="location.href='{{ route('orders') }}'">
        <div class="flex justify-center items-center text-gray-500">
          <i class="fa-solid fa-list-check fa-5x"></i>
        </div>
        <div class="text-center mt-4">
          <h1 class="font-bold text-gray-700 text">発注履歴</h1>
          <p class="text-500 text-sm mt-4">
            各ユーザーの発注履歴が閲覧可能です
          </p>
        </div>
       </button>

       @elsecan('shop')
       <button class="sm:w-1/2 md:w-1/3 flex flex-col items-center justify-center p-8 border border-gray-200 rounded bg-white w-64 hover:bg-gray-50 hover:border-b-4 hover:border-b-blue-500 active:bg-gray-100" onclick="location.href='{{ route('orders') }}'">
       <div class="flex justify-center items-center text-gray-500">
         <i class="fa-solid fa-list-check fa-5x"></i>
       </div>
       <div class="text-center mt-4">
         <h1 class="font-bold text-gray-700 text">発注履歴</h1>
         <p class="text-500 text-sm mt-4">
           各ユーザーの発注履歴が閲覧可能です
         </p>
       </div>
      </button>
      @endcan

            @can('admin')
            <button class="sm:w-1/2 md:w-1/3 flex flex-col items-center justify-center p-8 border border-gray-200 rounded bg-white w-64 hover:bg-gray-50 hover:border-b-4 hover:border-b-blue-500 active:bg-gray-100" onclick="location.href='{{ route('users.sales') }}'">
            <div class="flex justify-center items-center text-gray-500">
              <i class="fa-solid fa-hand-holding-dollar fa-5x"></i>
            </div>
            <div class="text-center mt-4">
              <h1 class="font-bold text-gray-700 text">売上管理</h1>
              <p class="text-500 text-sm mt-4">
                日別・月別の合計売上が閲覧可能です
              </p>
            </div>
           </button>
           @endcan

            @can('admin')
            <button class=" sm:w-1/2 md:w-1/3 flex flex-col items-center justify-center p-8 border border-gray-200 rounded bg-white w-64 hover:bg-gray-50 hover:border-b-4 hover:border-b-blue-500 active:bg-gray-100" onclick="location.href='{{ route('user.index') }}'">
            <div class="flex justify-center items-center text-gray-500">
              <i class="fa-solid fa-users-rectangle fa-5x"></i>
            </div>
            <div class="text-center mt-4">
              <h1 class="font-bold text-gray-700 text">登録ユーザー管理</h1>
              <p class="text-500 text-sm mt-4">
                登録ユーザーを編集・削除することが可能です
              </p>
            </div>
          </button>
          @endcan

            </div>
          </section>
      </body>
    </html>
</x-app-layout>
