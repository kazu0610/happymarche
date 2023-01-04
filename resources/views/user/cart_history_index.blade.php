<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
             {{ Auth::user()->name }}さんの注文履歴
        </h2>
    </x-slot>

    @if($billings->isNotEmpty())
    <div class="mt-4">
        <table class="w-auto text-sm text-left text-gray-700 dark:text-gray-400 mx-auto shadow-lg mt-16 mb-16">
				<thead class="text-sm text-gray-700 uppercase dark:text-gray-400">
					<tr class="text-center text-white bg-green-600 whitespace-nowrap">
                                 <th scope="col" class="px-8 py-3">注文ID</th>
                                 <th scope="col" class="px-8 py-3">注文番号</th>
                                 <th scope="col" class="px-8 py-3">購入日時</th>
                                 <th scope="col" class="px-8 py-3">合計金額</th>
                                 <th scope="col" class="px-8 py-3">数量</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach($billings as $billing)
                             <tr class="text-center bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                 <td class="px-6 py-4">{{ $billing['id'] }}</td>
                                 <td class="px-6 py-4">{{ $billing['code'] }}</td>
                                 <td class="px-6 py-4">{{ $billing['created_at']}}</td>
                                 <td class="px-6 py-4">{{ $billing['total']}}</td>
                                 <td class="px-6 py-4">{{ $billing['qty']}}</td>
                            </tr>
                             @endforeach
                         </tbody>
                     </table>
                 </div>
                 {{ $billings->links('vendor.pagination.tailwind2') }}
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
         <p class="text-center mt-5">注文履歴がありません。</p>

         <div class="flex justify-center my-10">
             <button class="mx-3 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
               <a href="{{route('dashboard')}}">管理画面へ戻る</a>
             </button>
         </div>
     </div>
     @endif

 </x-app-layout>
