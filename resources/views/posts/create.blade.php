<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      新規投稿
    </h2>
  </x-slot>
  <div class="h-screen w-screen flex justify-center items-center">
    <form action="/posts" method="POST">
      @csrf
      <div>
        <textarea name="body" id="Text" cols="40" rows="10"></textarea>
      </div>
      <div class="text-center">
        <input type="submit" class="bg-blue-900 hover:bg-gray-800 text-black rounded px-4 py-2" value="投稿する">
      </div>
    </form>
  </div>
</x-app-layout>