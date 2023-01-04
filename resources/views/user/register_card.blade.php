<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 leading-tight">
             クレジットカード登録画面
        </h2>
    </x-slot>

    <div class="w-full max-w-4xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200 mt-10 mb-10">
        @if (!empty($card))
            <h3 class="px-3 py-3 text-gray-700 font-semibold text-lg">登録済みのクレジットカード</h3>

            <hr>
            <div class="text-gray-700 px-3 py-3">
                <h4 class="text-lg">{{ $card["brand"] }}</h4>
                <p class="my-2">有効期限: {{ $card["exp_year"] }}/{{ $card["exp_month"] }}</p>
                <p class="my-2">カード番号: ************{{ $card["last4"] }}</p>
            </div>
            @else
            <div class="text-gray-700 px-3 py-3">
                <h3 class="px-3 py-3 text-gray-700 font-semibold text-lg">クレジットカードが未登録です</h3>
                <p class="px-3 my-2">以下のボタンをクリックして登録！</p>
            </div>
            @endif

        <div class="flex mx-5 my-5">
            <form action="{{ route('users.token') }}" method="post">
                 @csrf
                 @if (empty($card))
                 <script type="text/javascript" src="https://checkout.pay.jp/" class="payjp-button" data-key="{{ ENV('PAYJP_PUBLIC_KEY') }}" data-on-created="onCreated" data-text="カードを登録する" data-submit-text="カードを登録する"></script>
                 @else
                 <script type="text/javascript" src="https://checkout.pay.jp/" class="payjp-button" data-key="{{ ENV('PAYJP_PUBLIC_KEY') }}" data-on-created="onCreated" data-text="カードを更新する" data-submit-text="カードを更新する"></script>
                 @endif
             </form>
        </div>
    </div>

    <div class="flex justify-center my-16 mx-auto">
      <button class="text-white bg-orange-500 border-0 py-2 px-6 focus:ring-4 focus:ring-blue-300 hover:bg-orange-600 rounded">
        <a href="{{route('dashboard')}}">管理画面へ戻る</a>
      </button>
    </div>
</x-app-layout>
