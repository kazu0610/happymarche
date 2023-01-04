{{-- layouts.common.blade.phpのレイアウト継承 --}}
@extends('layouts.common')

{{-- ヘッダー呼び出し --}}
@include('layouts.header')

{{-- メイン部分作成 --}}
@section('content')
<section class="bg-white dark:bg-gray-900">
<div class="container px-6 py-12 mx-auto">
    <div class="mt-20 mb-12"></div>
    <h1 class="text-3xl font-semibold text-gray-700 capitalize lg:text-4xl dark:text-white">おいしい農産物があなたを待っています</h1>

    <div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2">
        <div class="lg:flex">
            <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="{{asset('topimages/banana.jpg')}}" alt="バナナ">

            <div class="flex flex-col justify-between py-6 lg:mx-6">
                <div class="text-xl font-semibold text-gray-800 dark:text-white border-dotted border-b-2 border-gray-600">
                    有機 無農薬 安全オーガニックバナナ 約2kg
                </div>
                <div class="text-sm text-gray-700">生産地：鹿児島県瀬戸内町</div>

                <span class="text-2xl text-gray-600 dark:text-gray-300  font-semibold">価格：1,500円</span>
            </div>
        </div>

        <div class="lg:flex">
            <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="{{asset('topimages/vegeset.jpg')}}" alt="野菜セット">

            <div class="flex flex-col justify-between py-6 lg:mx-6">
                <div class="text-xl font-semibold text-gray-800 dark:text-white border-dotted border-b-2 border-gray-600">
                    100%有機野菜 15品詰め合わせセット
                </div>
                <div class="text-sm text-gray-700">生産地：京都府宇治市</div>

                <span class="text-2xl text-gray-600 dark:text-gray-300  font-semibold">価格：2,000円</span>
            </div>
        </div>

        <div class="lg:flex">
            <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="{{asset('topimages/corn.jpg')}}" alt="コーン">

            <div class="flex flex-col justify-between py-6 lg:mx-6">
                <div class="text-xl font-semibold text-gray-800 dark:text-white border-dotted border-b-2 border-gray-600">
                    大分県産「高原スイートコーン」約2kg
                </div>
                <div class="text-sm text-gray-700">生産地：大分県豊後高田市</div>

                <span class="text-2xl text-gray-600 dark:text-gray-300  font-semibold">価格：1,800円</span>
            </div>
        </div>

        <div class="lg:flex">
            <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="{{asset('topimages/onion.jpg')}}" alt="たまねぎ">

            <div class="flex flex-col justify-between py-6 lg:mx-6">
                <div class="text-xl font-semibold text-gray-800 dark:text-white border-dotted border-b-2 border-gray-600">
                    淡路島産たまねぎ 5kg 産地直送
                </div>
                <div class="text-sm text-gray-700">生産地：兵庫県淡路市</div>

                <span class="text-2xl text-gray-600 dark:text-gray-300  font-semibold">価格：1,300円</span>
            </div>
        </div>

        <div class="lg:flex">
            <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="{{asset('topimages/fruitsset.jpg')}}" alt="フルーツセット">

            <div class="flex flex-col justify-between py-6 lg:mx-6">
                <div class="text-xl font-semibold text-gray-800 dark:text-white border-dotted border-b-2 border-gray-600">
                    フルーツセット 7種類1箱 詰め合わせ
                </div>
                <div class="text-sm text-gray-700">生産地：鹿児島県瀬戸内町</div>

                <span class="text-2xl text-gray-600 dark:text-gray-300  font-semibold">価格：5,000円</span>
            </div>
        </div>

        <div class="lg:flex">
            <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="{{asset('topimages/peach.jpg')}}" alt="桃">

            <div class="flex flex-col justify-between py-6 lg:mx-6">
                <div class="text-xl font-semibold text-gray-800 dark:text-white border-dotted border-b-2 border-gray-600">
                    産直 一度食べたらもう虜 堅甘桃 約1kg
                </div>
                <div class="text-sm text-gray-700">生産地：山梨県笛吹市</div>

                <span class="text-2xl text-gray-600 dark:text-gray-300  font-semibold">価格：4,900円</span>
            </div>
        </div>
    </div>
</div>
</section>
@endsection

{{-- フッター呼び出し --}}
@include('layouts.footer')
