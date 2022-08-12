<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      新規投稿
    </h2>
  </x-slot>

  <div class="h-screen w-screen flex justify-center items-center">
    <form action="/posts" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="title">
        @error('title')
        <p class="text-red-600">
          {{ $message }}
        </p>
        @enderror
        <label for="title">タイトル</label>
        <input type="text" name="title" id="title" value="{{old('title')}}">
      </div>
      <div class="category">
        <label for="category">カテゴリー</label>
        <select name="category" id="category">
          <option value="1">ファンタジー</option>
          <option value="2">アクション</option>
          <option value="3">コメディ</option>
          <option value="4">恋愛</option>
          <option value="5">日常</option>
          <option value="6">スポーツ</option>
          <option value="7">キッズ</option>
        </select>
      </div>
      <div>
        <label for="image">画像</label>
        <input type="file" name="image" id="image">
      </div>
      <label for="body">新規投稿</label>
      <div>
        @error('body')
        <p class="text-red-600">
          {{ $message }}
        </p>
        @enderror
        <textarea name="body" id="body" cols="40" rows="10" value="{{old('body')}}"></textarea>
      </div>
      <div class="text-center">
        <input type="submit" class="bg-blue-900 hover:bg-gray-800 text-white rounded px-4 py-2" value="投稿する">
      </div>
    </form>
  </div>
</x-app-layout>