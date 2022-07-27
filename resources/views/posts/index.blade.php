<x-app-layout>
  <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            一覧
        </h2>
    </x-slot>

    <div class="text-center grid-cols-1 m-20">
      @foreach ($posts as $post)
      {{$post->id}}
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">タイトル : {{ $post->title }}</h2>
        <p class="font-semibold  text-gray-800 leading-tight">カテゴリー : {{ $post->category->name }}</p>
        <p class="leading-relaxed border-2 border-black-600">{{ $post->body }}</p>
        @if ($post->comment_count)
        <p>コメント数 : {{ $post->comment_count}}</p>
        @elseif ($post->comment_count == Null)
        <p>コメント数 : 0</p>
        @endif
        <form action="/posts/show" method="POST">
          <input type="submit" class="bg-blue-900 hover:bg-blue-800 text-white rounded px-4 py-2" value="コメント欄へ">
          <input type="hidden" name="id" value="{{$post->id}}">
        </form>
        @endforeach
    </div>
</x-app-layout>
<style>
</style>