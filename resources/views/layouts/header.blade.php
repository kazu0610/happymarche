@section('header')
<header class="text-gray-600 body-font">
    <div class="fixed w-full mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center bg-orange-400 bg-opacity-70">
      <a href="{{ url('/') }}" class="static flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
          <div class="mb-16">
              <img src="{{asset('logo/happymarche1.png')}}" style="max-height:80px;" class="fixed top-2 left-5">
          </div>
      </a>

      @if (Route::has('login'))
          <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
              @auth
                  <a href="{{ url('/dashboard') }}">
                      <button class="inline-flex text-white items-center bg-emerald-500 border-0 py-1 px-3 mx-2 focus:outline-none hover:bg-emerald-400 rounded text-base mt-4 md:mt-0">
                          ダッシュボード
                      </button>
                  </a>
              @else
                  <a href="{{ route('login') }}">
                      <button class="inline-flex text-white items-center bg-emerald-500 border-0 py-1 px-3 mx-2 focus:outline-none hover:bg-emerald-400 rounded text-base mt-4 md:mt-0">
                          ログイン
                      </button>
                  </a>

              @if (Route::has('register'))
                  <a href="{{ route('register') }}">
                      <button class="inline-flex text-white items-center bg-emerald-500 border-0 py-1 px-3 mx-2 focus:outline-none hover:bg-emerald-400 rounded text-base mt-4 md:mt-0">
                          新規登録
                      </button>
                  </a>
              @endif
              @endauth
          </div>
      @endif

    </div>
</header>
@endsection
