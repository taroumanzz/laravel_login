<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            投稿一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('message'))
                <div class="text-red-600 font-bold">
                    {{ session('message') }}
                </div>
            @endif

            @forelse ($posts as $post)
                <div class="mb-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <a href="{{ route('posts.edit', $post) }}">
                            <h1 class="p-4 text-lg font-semibold">
                                {{ $post->title }}
                            </h1>
                        </a>
                        <div class="text-right flex">
                            <a href="{{ route('posts.edit', $post) }}" class="flex-1">
                                <x-primary-button>
                                    編集
                                </x-primary-button>
                            </a>

                            <form method="post" action="{{ route('posts.destroy', $post) }}" class="flex-2">
                                @csrf
                                @method('delete')
                                <x-primary-button class="bg-red-700 ml-2">
                                    削除
                                </x-primary-button>
                            </form>
                        </div>
                        <hr class="w-full">
                        <p class="mt-4 p-4">
                            {{ $post->body }}
                        </p>
                        <div class="p-4 text-sm font-semibold">
                            {{ $post->created_at }} / {{ $post->user->name??'匿名' }}さん
                        </div>
                    </div>
                </div>
            @empty
                まだ投稿はありません。
            @endforelse
        </div>
    </div>
</x-app-layout>
