<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        詳細
      </h2>
  </x-slot>
  <div content>
    <div>
      <div>
        {{ $post->id }}
      </div>
      <div>
        <p>{{ $post->body }}</p>
        <div><span>by:</span>{{ $user->name }}</div>
        <div>
          @auth
            <a href="{{url('posts/edit'.$post->id)}}">編集する</a>
          @endauth
        </div>
      </div>
    </div>
  </div>
</x-app-layout>