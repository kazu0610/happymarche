<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            登録ユーザ一覧
        </h2>

        <!-- 削除メッセージを表示 -->
        <x-message :message="session('message')" />
    </x-slot>

    <table class="w-auto text-sm text-left text-gray-700 dark:text-gray-400 mx-auto shadow-lg mt-16 mb-16">
				<thead class="text-sm text-gray-700 uppercase dark:text-gray-400">
					<tr class="text-center text-white bg-green-600 whitespace-nowrap">
						<th scope="col" class="px-8 py-3">
							ID
						</th>
						<th scope="col" class="px-8 py-3">
							プロフィール画像
						</th>
                        <th scope="col" class="px-8 py-3">
							名前
						</th>
						<th scope="col" class="px-8 py-3">
							メールアドレス
						</th>
						<th scope="col" class="px-8 py-3">
							電話番号
						</th>
                        <th scope="col" class="px-8 py-3">
            				郵便番号
						</th>
                        <th scope="col" class="px-8 py-3">
            				住所
						</th>
                        <th scope="col" class="px-8 py-3">
            				生産地
						</th>
                        <th scope="col" class="px-8 py-3">
            				ユーザータイプ
						</th>
                        <th scope="col" class="px-8 py-3">
            				登録日
						</th>
                        <th scope="col" class="px-8 py-3">
            				編集
						</th>
                        <th scope="col" class="px-8 py-3">
                            削除
                       </th>
					</tr>
				</thead>

        <div>
            @foreach ($users as $user)
				<tbody>
					<tr
						class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
						<th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
							{{ $user->id }}
						</th>
						<td class="px-6 py-4">
                            @if($user->image)
                            <img alt="プロフィール画像" class="object-cover object-center border-2 border-gray-300 rounded-full h-16 w-16" src="{{ asset('storage/images/'.$user->image)}}">
                            @else
                            <img alt="プロフィール画像" class="object-cover object-center rounded-full h-16 w-16 inline-block" src="{{ asset('storage/images/no_profile_image.png')}}">
                            @endif
						</td>
                        <td class="px-6 py-4">
							{{ $user->name }}
						</td>
						<td class="px-6 py-4">
							{{ $user->email }}
						</td>
						<td class="px-6 py-4">
							{{$user->tel }}
						</td>
                        <td class="px-6 py-4">
							{{ $user->postcode }}
						</td>
                        <td class="px-6 py-4">
							{{$user->address}}
						</td>
                        <td class="px-6 py-4">
							{{$user->area}}
						</td>
                        <td class="px-6 py-4">
							{{$user->role}}
						</td>
                        <td class="px-6 py-4">
							{{$user->created_at->format('Y/m/d H:i')}}
						</td>
                        <td class="px-6 py-4">
							<a href="{{ route('user.edit', $user) }}"><button class="text-white bg-orange-500 border-0 py-2 px-6 focus:ring-4 focus:ring-blue-300 hover:bg-orange-600 rounded">編集</button></a>
						</td>
                        <td class="px-6 py-4">
                            <form method="post" action="{{route('user.destroy', $user)}}">
                                @csrf
                                @method('delete')
    							<button class="text-white bg-red-600 border-0 py-2 px-6 focus:ring-4 focus:ring-blue-300 hover:bg-red-700 rounded"  onClick="return confirm('本当に削除しますか？');">削除</button>
                            </form>
						</td>
					</tr>
        </tbody>
      </div>
      @endforeach
    </table>


</x-app-layout>
