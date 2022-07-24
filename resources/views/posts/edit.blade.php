<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      編集
    </h2>
  </x-slot>
  <div>
    <form action="/post/edit">
      @csrf
      <div>
        <textarea name="body" id="" cols="30" rows="10">{{ $post->body }}</textarea>
      </div>
      <div>
        <input type="hidden" name="post_id" value="{{$id}}">
        <input type="submit" value="変更する">
      </div>
    </form>
  </div>
</x-app-layout>