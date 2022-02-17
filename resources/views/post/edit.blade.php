
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>
    <div class="py-12">
	    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
	    	<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
	            <div class="p-6 bg-white border-b border-gray-200">
	            	<!-- Session Status -->
        			<x-auth-session-status class="mb-4" :status="session('status')" />
				    <x-auth-validation-errors class="mb-4" :errors="$errors" />
			        <form method="POST" action="{{ route('posts.update',$posts->id) }}">
			            @csrf

			            <!-- Title -->
			            <div>
			                <x-label for="title" :value="__('Title')" />

			                <x-input id="title" value="{{$posts->title}}" class="block mt-1 w-full" type="text" 
			                	name="title" autofocus />
			            </div>
			            <!-- Description -->
			            <div class="mt-4">
			                <x-label for="description" :value="__('Description')" />

			                <textarea id="description"
			                 class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                         	name="description" />{{$posts->description}}</textarea>
			            </div>

			            <!-- Tags -->
			            <div class="mt-4">
			                <x-label for="tags" :value="__('Tags')" />

			                <x-input id="tags" value="{{$posts->tags}}"
			                	class="block mt-1 w-full"
                                type="text" name="tags" />
                                <p class="text-gray-600 text-sm">
		                        Ex. html, css, laravel
		                    </p>
			            </div>

			            <div class="flex items-center justify-end mt-4">
			                <x-button class="ml-3">
			                    {{ __('Edit') }}
			                </x-button>
			            </div>
			        </form>
			    </div>
			</div>
	    </div>
	</div>
</x-app-layout>
