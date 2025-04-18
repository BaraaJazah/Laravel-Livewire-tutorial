<form wire:submit= 'save' class=" mt-10" style="">


    @if (session()->has('success'))
        <div x-show="open" style="display: flex; justify-content: space-between" x-data="{ open: true }" id="alert-3"
            class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <div style="display: flex;align-items: center">
                <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="ms-3 text-sm font-medium">
                    {{ session('success') }} sad sad sad
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

    <div class="mb-5">
        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title </label>
        <input wire:model='title' value="{{ $title }}" type="text" id="title"
            class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" />
        @error('title')
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <span class="font-medium">Error !</span> {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-5">
        <label for="post" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post</label>
        <textarea wire:model='post' id="post" rows="4"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            {{ $post }}

        </textarea>
        @error('post')
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <span class="font-medium">Error !</span> {{ $message }}
            </div>
        @enderror
    </div>

    <div class="flex items-center justify-center w-full">
        <label for="dropzone-file"
            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
            <div class=" p-4  flex flex-col items-center justify-center pt-5 pb-6">
                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                </svg>
                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                        upload</span> or drag and drop</p>
                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
            </div>

            <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
                x-on:livewire-upload-finish=" uploading = false " x-on:livewire-upload-cancel="uploading = false"
                x-on:livewire-upload-error="uploading = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress">

                <input wire:model='image' id="dropzone-file" type="file" class="hidden" />

                <div x-show="uploading">
                    <progress max="100" x-bind:value="progress"></progress>
                </div>
            </div>

            @error('image')
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    <span class="font-medium">Error !</span> {{ $message }}
                </div>
            @enderror
        </label>

    </div>
    @if ($image)
        <div class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700"
            style="margin-top: 20px; padding:20px">
            @php
                // إذا الملف مؤقت (temporary)
                $isImage = is_object($image) && Str::startsWith($image->getMimeType(), 'image/');
            @endphp

            @if ($isImage)
                <img style="width: 60px; height: 60px;" class="h-auto max-w-lg rounded-lg"
                    src="{{ $image->temporaryUrl() }}" alt="Temporary image">
            @else
            @endif
        </div>
    @endif
    <br>

    <div style="text-align: right">
        <button wire:click='resetData' type="reset"
            class="p-3 py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Reset</button>
        <button type="submit" wire:loading.attr("disabled")
            class="p-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Update</button>
    </div>

</form>

</div>
{{-- postData    --}}
