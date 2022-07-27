<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      編集
    </h2>
  </x-slot>
  <div class="h-screen w-screen flex justify-center items-center">
    <form action="/posts/update" method="POST">
      @csrf
      <div>
        <textarea name="body" id="" cols="30" rows="10">{{ $post->body }}</textarea>
      </div>
      <div class="text-center">
        <input type="hidden" name="post_id" value="{{$post->id}}">
        <input type="submit" value="変更する">
      </div>
    </form>
  </div>
</x-app-layout>