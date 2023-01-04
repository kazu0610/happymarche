<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
             売上管理
        </h2>
    </x-slot>

    <div class="w-full max-w-4xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200 mt-10 mb-10">

        <div class="w-75 px-5 py-5">

              @if($sort == 'month')
                  <h1 class="mb-3 font-semibold text-2xl">月別売上 {{ $total }} 件</h1>
              @else
                  <h1 class="mb-3 font-semibold text-2xl">日別売上 {{ $total }} 件</h1>
              @endif

              <form method="GET" action="{{route('users.sales')}}" class="form-inline">
                  切り替え
                  <select name="sort" onChange="this.form.submit();" class="form-inline ml-2">
                      @if ($sort == 'month')
                          <option value="month" selected>月別</option>
                          <option value="day">日別</option>
                      @else
                          <option value="month">月別</option>
                          <option value="day" selected>日別</option>
                      @endif
                  </select>
              </form>

              <div class="mt-4">
                  <table class="w-full text-sm text-left text-gray-700 dark:text-gray-400 mx-auto mt-10 mb-10">
          				<thead class="text-sm text-gray-700 uppercase dark:text-gray-400">
          					<tr class="text-center text-white bg-green-600 whitespace-nowrap">
                                           <th scope="col" class="px-8 py-3">年月日</th>
                                           <th scope="col" class="px-8 py-3">金額</th>
                                           <th scope="col" class="px-8 py-3">件数</th>
                                           <th scope="col" class="px-8 py-3">平均単価</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                       @foreach($paginator as $billing)
                                       <tr class="text-center bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                           <td class="px-6 py-4">{{ $billing['created_at']}}</td>
                                           <td class="px-6 py-4">{{ $billing['total']}}</td>
                                           <td class="px-6 py-4">{{ $billing['count']}}</td>
                                           <td class="px-6 py-4">{{ $billing['avg']}}</td>
                                       </tr>
                                       @endforeach
                                   </tbody>
                               </table>
                           </div>
                           {{ $paginator->links('vendor.pagination.tailwind2') }}
                       </div>
                   </div>
               </div>

               <div class="flex justify-center my-16 mx-auto">
                 <button class="text-white bg-orange-500 border-0 py-2 px-6 focus:ring-4 focus:ring-blue-300 hover:bg-orange-600 rounded">
                   <a href="{{route('dashboard')}}">管理画面へ戻る</a>
                 </button>
               </div>
</x-app-layout>
