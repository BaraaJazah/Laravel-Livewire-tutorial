<div>

    <div style="position: absolute; right: 20px; top:100px">
        @if (session()->has('success'))
            <div x-show="open" style="width:400px;display: flex; justify-content: space-between" x-data="{ open: true }"
                id="alert-3"
                class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <div style="display: flex;align-items: center">
                    <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="ms-3 text-sm font-medium">
                        {{ session('success') }}
                    </span>
                </div>
                <button @click="open = false" type="button"
                    class="ms-auto-mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-3" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif
    </div>

    <div style="width: 90% ;display: flex; flex-direction: row; gap: 20px; flex-wrap: wrap; justify-content: start;">
        @foreach ($posts as $post)
            <div
                class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg" src="{{ asset('build/assets/images/' . $post->image) }}"
                        style="width:400px;height: 350px; object-fit: cover " alt="" />
                </a>
                {{-- $post->image --}}
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $post->title }}
                        </h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 h-30 "
                        style="overflow: hidden;text-overflow:ellipsis;">
                        {{ $post->text }}
                    </p>
                    <div style="display: flex; justify-content: space-between; margin-top :10px">
                        <a wire:navigate href="{{ route('posts.editPost', $post) }}"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Edit
                        </a>
                        <a wire:click='delete({{ $post->id }})'
                            wire:confirm="Are you sure you want to delete this post?"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                            Delete
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <br>
    <div style="width: 86% ;  margin-top : 20px   ">
        {{ $posts->links() }}
    </div>
</div>
