<x-app-layout>
  <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            一覧
        </h2>
    </x-slot>

    <div class="content flex justify-center">
      <table>
        <thead>
          <th class="px-4 py-2">ID</th>
          <th class="px-4 py-2">内容</th>
        </thead>
        @foreach ($posts as $post)
        <tr>
          <td>{{ $post->id }}</td>
          <td>{{ $post->body }}</td>
          <td>
            <button>
              <a href="{{url('posts/'.$post->id)}}">詳細</a>
            </button>
          </td>
          <td>
            @auth
            <form action="/posts/delete/{{$post->id}}" methods="POST">
              @csrf
              <button class="bg-sky-600 hover:bg-sky-700">
                削除
              </button>
            </form>
            @endauth
          </td>
        </tr>
        @endforeach
      </table>
    </div>
</x-app-layout>