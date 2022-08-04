<x-app-layout>
  <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            コメント一覧
        </h2>
    </x-slot>

    <div class=" grid-cols-1 m-20">
      <h2 class="text-3xl font-semibold text-xl text-gray-800 leading-tight">タイトル : {{ $post->title }}</h2>
      @if ($post->image_id == 0)
      <p>画像はありません</p>
      @elseif ($post->image_id !== 0)
      <img src="data:image/png;base64,{{ $post->image->image }}" class="display-block">
      @endif
      <p>カテゴリー :　{{ $post->category->name}}</p>
      <p class="leading-relaxed border-2 border-black-600">{{ $post->body }}</p>
      <div class="grid-cols-1">
        <h1 class="y-3 text-3xl">コメント一覧</h1>
        @foreach($post->comments as $single_comments)
        <h4>・{{ $single_comments->commenter}}</h4>
        <p>{{ $single_comments->comment}}</p>
        @endforeach
        @if ($post->comment_count == Null)
        <h4>コメントがありません。</h4>
        @endif
      </div>
      <!-- 確認 -->
      <div class="test text-center inline-block">
        <form action="/comment/create" method="POST">
          @csrf
          <input type="submit" class="bg-blue-900 hover:bg-gray-800 text-white rounded px-4 py-2 m-8" value="コメントする">
          <input type="hidden" name="id" value="{{$post->id}}">
        </form>
      </div>
    </div>
</x-app-layout>
<style>
  .test {
    margin:10px
  }
</style>