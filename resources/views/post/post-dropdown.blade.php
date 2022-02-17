<div class="hidden sm:flex sm:items-center sm:ml-6">
    <x-dropdown align="right" width="48">
        <x-slot name="trigger">
            <button class="flex items-center text-sm font-medium hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                <div class="ml-1">
                    <img src="\img\three-dots.svg" style="height:20px">
                </div>
            </button>
        </x-slot>

        <x-slot name="content">
                <x-dropdown-link :href="route('posts.edit',$post->id)">
                    {{ __('Edit') }}
                </x-dropdown-link>
                <x-dropdown-link onclick="return confirm('Are you sure?')" :href="route('posts.destroy',$post->id)">
                    {{ __('Delete') }}
                </x-dropdown-link>
            </form>
        </x-slot>
    </x-dropdown>
</div>