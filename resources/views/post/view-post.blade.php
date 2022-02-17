<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="flex flex-col items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="flex justify-between">
                <div class="font-bold text-xl mb-2">
                    {{ ucfirst(trans($post->title))}}
                </div>
                <div>
                    @if(Auth::user()->id == $post->user_id)
                        @include('post.post-dropdown')
                    @endif
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
            <hr>
            <div>
                <p class="text-xl py-4" >Display Comment</p>
                @foreach($comment as $comment)
                <b>{{ucfirst(trans($comment->user->name))}}</b>
                <p>{{$comment->body}}</p>
                <div style="padding-bottom: 10px">
                    <p class="text-gray-600 text-sm">
                        {{ $comment->created_at}}
                    </p>
                </div>                    
                @endforeach
            </div>
            <div style="padding: 20px 0px 5px 0px;">
                <form method="POST" action="{{ route('comment.store') }}">
                        @csrf

                        <!-- Title -->
                        <div>
                            <x-label for="comment" :value="__('Add Comment')" />

                            <x-input id="comment" class="block mt-1 w-full" type="text" 
                                name="body" required/>
                            <input type="hidden" name="post_id" value="{{ $post->id }}" />
                        </div>

                        <div class="mt-4">
                            <x-button>
                                {{ __('Add Comment') }}
                            </x-button>
                        </div>
                    </form>
            </div>
            <div>
                <span class="text-gray-600 text-sm">
                    {{ $post->created_at}}
                </span>
            </div>
        </div>
    </div>
</x-app-layout>
