<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
            レビュー投稿一覧
        </h2>
        {{-- 投稿メッセージを表示 --}}
        <x-message :message="session('message')" />
    </x-slot>

    {{-- 投稿一覧表示用のコード --}}

    @foreach ($posts as $post)
    <div class='max-w-7xl mx-auto px-4 sm:px-6 lg:px-8'>  <div class="mt-10 mb-10 rounded-xl border p-5 shadow-md bg-white">
      <div class="flex w-full items-center justify-between border-b pb-3">
          <div class="flex ml-3">
              @if($post->user->image)
              <img alt="プロフィール画像" class="object-cover object-center border-2 border-gray-300 rounded-full h-16 w-16" src="{{ asset('storage/images/'.$post->user->image)}}">
              @else
              <img alt="プロフィール画像" class="object-cover object-center rounded-full h-16 w-16 inline-block" src="{{ asset('storage/images/no_profile_image.png')}}">
              @endif
              <div class="ml-5 my-auto">
                  <div class="text-lg font-medium">{{ $post->user->name }}<span class="text-sm text-gray-600">さんの投稿</span></div>
              </div>
          </div>
          <div class="flex items-center space-x-3">
            <div class="text-lg font-bold text-slate-700 text-neutral-600 ">販売者：{{ $post->seller_name }}さん</div>
          </div>
          <div class="flex items-center space-x-8">
            <button class="rounded-2xl border bg-neutral-100 px-4 py-1 text-xs font-semibold">{{$post->reviewScore}}</button>
            <div class="text-xs text-neutral-500">{{$post->created_at->format('Y/m/d H:i')}}</div>
            @can('admin')
            <a href="{{route('review.edit', $post)}}"><button class="text-white bg-orange-500 border-0 py-2 px-6 focus:ring-4 focus:ring-blue-300 hover:bg-orange-600 rounded">編集</button></a>
            <form method="post" action="{{route('review.destroy', $post)}}">
              @csrf
              @method('delete')
              <button class="text-white bg-red-600 border-0 py-2 px-6 focus:ring-4 focus:ring-blue-300 hover:bg-red-700 rounded" onClick="return confirm('本当に削除しますか？');">削除</button>
            </form>
            @endcan
          </div>
        </div>

        <div class="mt-4 mb-6">
          <div class="ml-5 mb-3 text-xl font-bold text-neutral-700">{{ $post->title }}</div>
          <div class="ml-5 text-sm text-neutral-600">{!! nl2br(htmlspecialchars($post->body)) !!}</div>
        </div>
      </div>
    </div>
    @endforeach

    <div class="d-flex justify-content-center">
    {{ $posts->links('vendor.pagination.tailwind2') }}
    </div>

</x-app-layout>
