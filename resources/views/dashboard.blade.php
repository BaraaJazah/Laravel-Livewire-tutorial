<x-layouts.app :title="__('Dashboard')">

<section class="container flex flex-col items-center px-6 py-12 mx-auto lg:flex-row">
        <div class="lg:w-1/2">
            <h1 class="max-w-xl font-serif text-4xl font-medium tracking-wide text-[#fff] capitalize md:text-6xl">
                Hello {{Auth::user()->name}}</h1>
            <p class="max-w-lg text-xl mt-4 text-gray-500">Welcome To CRUD Livewire Project</p>
            {{-- <div class="mt-6 sm:flex sm:items-center"><a href="#"
                    class="bg-[#475F45] hover:bg-[#475F45]/80 duration-300 transition-colors border-2 border-[#475F45] px-6 block text-center py-3 uppercase text-sm font-bold leading-4 tracking-widest text-white">
                    Buy Tickets </a><a href="#"
                    class="border-2 text-sm duration-300 transition-colors hover:bg-[#475F45] hover:text-white font-bold leading-4 mt-4 sm:mt-0 tracking-widest text-[#475F45] sm:mx-4 border-[#475F45] px-6 block text-center py-3 uppercase">
                    Learn More </a>
                </div> --}}
        </div>
        <div
            class="h-[38rem] mt-12 lg:mt-0 w-full mx-auto max-w-md overflow-hidden rounded-t-full outline outline-4 outline-offset-4 outline-[#475F45]/40">

        <img class="object-cover w-full h-full rounded-t-full"
            src="https://images.unsplash.com/photo-1531163859947-fa484f6eacd5?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=687&amp;q=80"
            alt="main page" />

        </div>
</section>

</x-layouts.app>
