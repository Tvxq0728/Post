<x-app-layout>
  <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            一覧
        </h2>
    </x-slot>

    <div class="text-center grid-cols-1 m-20">
      <h2>タイトル : {{-- $post->title --}}</h2>
      <p>カテゴリー : {{ $post->category->name}}</p>
    </div>
</x-app-layout>
<style>
</style>