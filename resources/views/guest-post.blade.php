<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="flex flex-col items-center pt-6 sm:pt-0 bg-gray-100">
        @if(count($posts)>0)
        @foreach ($posts as $post)
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <div class="flex justify-between">
                    <div class="font-bold text-xl mb-2">
                        {{ ucfirst(trans($post->title))}}
                    </div>
                    <div>
                        @include('post.post-dropdown')
                    </div>
                </div>
                <div>
                    <span class="text-gray-600 text-sm">
                        {{ ucfirst(trans($post->author))}}
                    </span>
                </div>
                <div>
                    <p class="text-base" 
                        style="padding: 20px 0px 20px 0px;
                            word-wrap: break-word;text-align: justify;">
                        {{$post->description}}
                    </p>
                </div>
                <a href="{{'posts/viewpost/' . $post->id}}">
                        <div style="padding: 20px 0px 5px 0px;">
                            {{$post->comment->count()}} Comments
                        </div>
                    </a>
                <div>
                    <span class="text-gray-600 text-sm">
                        {{ $post->created_at}}
                    </span>
                </div>
            </div>
        @endforeach
        @else
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <strong>Sorry!</strong> No Posts Found.
        </div> 
        @endif 
    </div>
    <div class="flex flex-col items-center" style="padding: 20px 0px 20px 0px;">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 overflow-hidden">
            {{ $posts->links() }}
        </div>
    </div>
</x-guest-layout>
