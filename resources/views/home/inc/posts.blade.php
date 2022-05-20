<section class="text-gray-600 bg-white mt-4 rounded-sm shadow body-font overflow-hidden">
    <div class="container px-5 pt-24 pb-6 mx-auto">
        <div class="flex flex-wrap -m-12">
            @forelse ($posts as $post)
                <div class="p-12 md:w-1/2 flex flex-col items-start">
                    <img src="{{ File::exists(public_path('images/blog/' . $post->thumbnail))
                        ? asset('images/blog/' . $post->thumbnail)
                        : $post->thumbnail }}"
                        alt="">
                        <a href="{{ route('blogs.by.category', $post->category->slug) }}" class="text-xs font-medium text-blue-600 uppercase dark:text-blue-400">{{ $post->category->name }}</a>
                    <h2 class="sm:text-3xl text-2xl title-font font-medium text-gray-900 mt-4 mb-4"><a
                            href="{{ url('blogs/' . $post->id) }}">{{ $post->title }}</a></h2>
                    <p class="leading-relaxed mb-8">{{ Str::limit($post->description, 200, '...') }}</p>
                    <div class="flex items-center flex-wrap pb-4 mb-4 border-b-2 border-gray-100 mt-auto w-full">
                        <a class="text-indigo-500 inline-flex items-center" href="{{ url('blogs/' . $post->id) }}">Read
                            More
                            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                                <path d="M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                        <span
                            class="text-gray-400 mr-3 inline-flex items-center ml-auto leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
                            <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none"
                                stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>{{ view_count($post->view_count) }}
                        </span>
                        <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                            <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none"
                                stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <path
                                    d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
                                </path>
                            </svg>{{ $post->comments->count() }}
                        </span>
                    </div>
                    <a class="inline-flex items-center">
                        <img alt="blog" src="https://dummyimage.com/103x103"
                            class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
                        <span class="flex-grow flex flex-col pl-4">
                            <span class="title-font font-medium text-gray-900">Alper Kamu</span>
                            <span class="text-gray-400 text-xs tracking-widest mt-0.5">DESIGNER</span>
                        </span>
                    </a>
                </div>
            @empty
                <div class="w-64 m-auto text-center">Nothing</div>
            @endforelse
        </div>
        <hr class="mt-12 mb-4">
        <div class="">{{ $posts->links() }}</div>
    </div>
</section>
