<x-app-layout>
  <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ホーム
        </h2>
    </x-slot>

    <div class="text-center grid-cols-1 m-20">
      @foreach ($posts as $post)
      <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-3">投稿者: {{$post->user->name}}</h2>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">タイトル : {{ $post->title }}</h2>
        <!-- 画像がある場合表示させる -->
          @if ($post->image_id == 0)
          <p class="text-rose-500">画像はありません</p>
          @elseif ($post->image->path !== 0)
          <img src="{{ asset('storage/'.$post->image->image) }}" class="display-block mx-auto my-0">
          @endif
        <p class="font-semibold  text-gray-800 leading-tight">カテゴリー : {{ $post->category->name }}</p>
        <p class="leading-relaxed border-2 border-black-600">{{ $post->body }}</p>
        @if ($post->comment_count)
        <p>コメント数 : {{ $post->comment_count}}</p>
        @elseif ($post->comment_count == Null)
        <p>コメント数 : 0</p>
        @endif

        <form action="/comment/index" method="POST">
          @csrf
          <input type="submit" class="bg-blue-900 hover:bg-blue-800 text-white rounded px-4 py-2" value="コメント欄へ">
          <input type="hidden" name="id" value="{{$post->id}}">
        </form>
        @endforeach
    </div>
</x-app-layout>