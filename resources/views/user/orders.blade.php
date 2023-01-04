<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
             受注一覧
        </h2>
    </x-slot>

    <div class="flex justify-center pt-5">
        <form method="GET" action="{{route('orders')}}" class="w-1/4">
            <div class="">
                <div class="text-gray-700 py-2 flex justifi-center text-center">
                    注文番号
                </div>
                <input id="search-products" name="code" class="text-md block px-3 py-2 rounded-lg w-2/3
                bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none" placeholder="123456789" value="{{ $code }}" />
            </div>
            <button type="submit" class="mt-5 text-white bg-orange-500 border-0 py-2 px-6 focus:ring-4 focus:ring-blue-300 hover:bg-orange-600 rounded">検索</button>
        </form>
    </div>
    @if($orders->isNotEmpty())
    <div class="">
        <table class="w-auto text-sm text-left text-gray-700 dark:text-gray-400 mx-auto shadow-lg mt-8 mb-16">
				<thead class="text-sm text-gray-700 uppercase dark:text-gray-400">
					<tr class="text-center text-white bg-green-600 whitespace-nowrap">
                                 <th scope="col" class="px-8 py-3">注文番号</th>
                                 <th scope="col" class="px-8 py-3">注文者名</th>
                                 <th scope="col" class="px-8 py-3">注文日時</th>
                                 <th scope="col" class="px-8 py-3">購入金額</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach($orders as $order)
                             <tr class="text-center bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                 <td class="px-6 py-4 font-semibold">{{ $order['code'] }}</td>
                                 <td class="px-6 py-4">{{ $order['user_name'] }}</td>
                                 <td class="px-6 py-4">{{ $order['created_at'] }}</td>
                                 <td class="px-6 py-4">{{ $order['total'] }}</td>
                             </tr>
                             @endforeach
                         </tbody>
                     </table>
                 </div>
                 {{ $orders->links('vendor.pagination.tailwind2') }}
             </div>
         </div>
     </div>

     <div class="flex justify-center my-16 mx-auto">
       <button class="text-white bg-orange-500 border-0 py-2 px-6 focus:ring-4 focus:ring-blue-300 hover:bg-orange-600 rounded">
         <a href="{{route('dashboard')}}">管理画面へ戻る</a>
       </button>
     </div>

     @else
     <div class="w-full max-w-4xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200 mt-10 mb-10">
         <p class="text-center mt-5">発注履歴がありません。</p>

         <div class="flex justify-center my-10">
             <button class="mx-3 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
               <a href="{{route('dashboard')}}">管理画面へ戻る</a>
             </button>
         </div>
     </div>
     @endif

 </x-app-layout>
