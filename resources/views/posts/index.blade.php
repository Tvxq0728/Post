<x-app-layout>
  <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            一覧
        </h2>
    </x-slot>

    <div class="text-center grid-cols-1 m-20">
      @foreach ($posts as $post)
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">タイトル : {{ $post->title }}</h2>
        <p class="font-semibold  text-gray-800 leading-tight">カテゴリー : {{ $post->category->name }}</p>
        <p class="leading-relaxed">{{ $post->body }}</p>
        <p>コメント数 : {{ $post->comment_count}}</p>
        <p class="my-6"><a href="/posts/comments" class="bg-blue-900 hover:bg-blue-800 text-white rounded px-4 py-2">コメント欄へ</a></p>
        @endforeach
    </div>
</x-app-layout>
<style>
</style>