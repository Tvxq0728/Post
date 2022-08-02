<x-app-layout>
  <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            投稿一覧
        </h2>
    </x-slot>

    <div class="text-center grid-cols-1 m-20">
      @foreach ($posts as $post)
      {{$post->id}}
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">タイトル : {{ $post->title }}</h2>
        @if ($post->image_id == 0)
        <p class="text-rose-500">画像はありません</p>
        @elseif ($post->image->path !== 0)
        <img src="{{ asset($post->image->path) }}" class="display-block mx-auto my-0">
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
          <input type="submit" class="bg-blue-500 hover:bg-blue-800 text-white rounded px-4 py-2" value="コメント欄へ">
          <input type="hidden" name="id" value="{{$post->id}}">
        </form>
        <div class="flex justify-center">
          <form action="/posts/edit" method="POST">
            @csrf
            <input type="submit" class="bg-green-500 hover:bg-green-800 text-white rounded px-4 py-2" value="編集">
            <input type="hidden" name="id" value="{{$post->id}}">
          </form>
          <form action="/posts/delete" method="POST">
            @csrf
            <input type="submit" class="bg-red-500 hover:bg-red-800 text-white rounded px-4 py-2" value="削除">
            <input type="hidden" name="id" value="{{$post->id}}">
          </form>
        </div>
        @endforeach
    </div>
</x-app-layout>