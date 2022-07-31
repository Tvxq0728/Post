<x-app-layout>
  <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            コメント作成
        </h2>
  </x-slot>
  <div>
    <div class="h-screen w-screen flex justify-center items-center">
    <form action="/posts" method="POST">
      @csrf
      <div class="title">
        <label for="commenter">名前</label>
        <input type="text" name="commenter" id="commenter">
      </div>
      <label for="comment">コメント入力欄</label>
      <div>
        <textarea name="comment" id="comment" cols="40" rows="10"></textarea>
      </div>
      <div class="text-center">
        <input type="submit" class="bg-blue-900 hover:bg-gray-800 text-white rounded px-4 py-2" value="投稿する">
      </div>
    </form>
  </div>
  </div>
</x-app-layout>
<style>
</style>