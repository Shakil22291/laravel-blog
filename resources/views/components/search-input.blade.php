<div class="flex ml-auto" x-data="{open: false}">
  <button
    type="button"
    class="leading-6 font-medium flex items-center space-x-3 sm:space-x-4 hover:text-gray-600 transition-colors duration-200 w-full py-2"
    x-on:click="open = true"
  >
    <svg
        width="24"
        height="24"
        fill="none"
        class="text-gray-400 group-hover:text-gray-500 transition-colors duration-200"
    >
        <path
            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
        ></path>
    </svg>
    <span class="hidden lg:block">Quick search<span class="hidden sm:inline"> for posts</span></span>
  </button>

  <div x-show="open" class="flex items-center justify-center w-screen h-screen bg-gray-800 fixed top-0 left-0 z-50 ">
      <form @click.away="open = !open" method="GET" action="/search">
        @csrf
        <div class="relative text-gray-600 focus-within:text-gray-400">
          <span class="absolute inset-y-0 left-0 flex items-center pl-2">
            <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </button>
          </span>
          <input type="search" name="search" class="py-2 text-sm text-white bg-gray-900 rounded-md pl-10 focus:outline-none focus:bg-white focus:text-gray-900" placeholder="Search..." autocomplete="off">
        </div>
      </form>
    </div>
</div>