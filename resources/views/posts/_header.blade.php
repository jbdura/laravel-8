<header class="max-w-xl mx-auto mt-20 text-center">
            <h1 class="text-4xl">
                Learning <span class="text-blue-500">Laravel 8</span> with Laracasts
            </h1>

            <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
                <!--  Category -->
                <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
                    <div x-data="{show:false}">
                        <button @click="show=! show" class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold w-32" @click.away="show=false">
                            {{isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories'}}
                        </button>
                        <div x-show="show" @click.away="show=false" class="py-2 absolute w-full">
                            @foreach ($categories as $category)
                                <a href="/posts/?category={{$category->slug}} & {{ http_build_query(request()->except(['category', 'page'])) }}" class="block text-left px-3 text-sm leading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white">{{$category->name}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Search -->
                <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
                    <form method="GET" action="/posts">
                        @if (request('category'))
                            <input type="hidden" name="category" value="{{request('category')}}">
                        @endif
                        <input type="text" name="search" placeholder="Find something"
                               class="bg-transparent placeholder-black font-semibold text-sm">
                    </form>
                </div>
            </div>
        </header>