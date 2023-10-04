<x-layout>
    <section class="px-6 py-8">    
        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    <img src="/images/illustration-1.png" alt="" class="rounded-xl">

                    <p class="mt-4 block text-gray-400 text-xs">
                        Published <time>{{$post -> created_at -> diffForHumans()}}</time>
                    </p>

                    <div class="flex items-center lg:justify-center text-sm mt-4">
                        <img src="/images/lary-avatar.svg" alt="Lary avatar">
                        <div class="ml-3 text-left">
                            <a href="/posts/?author={{$post -> author-> username}}">

                                <h5 class="font-bold">{{$post -> author -> name}}</h5>
                            </a>
                            <h6>Author</h6>
                        </div>
                    </div>
                </div>

                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="/posts"
                            class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                        d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>

                            Back to Posts
                        </a>

                        <div class="space-x-2">
                            <a href="/categories/{{$post -> category -> id}}"
                                class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                                style="font-size: 10px">{{$post -> category -> name}}</a>
                            
                        </div>
                    </div>

                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                        {{$post -> title}}
                    </h1>

                    <div class="space-y-4 lg:text-lg leading-loose">
                        {!!$post -> body!!}
                    </div>
                </div>
                <div class="tags mt-4 col-span-8 col-start-5">
                    @foreach ($post->tags as $tag)
                        <a href="?tag={{$tag->name}}" class="inline-block bg-blue-200 rounded-full px-3 py-1 text-sm text-gray-700 mr-2">{{$tag->name}}</a>
                    @endforeach
                </div>
                <section class="col-span-8 col-start-5 mt-6 space-y-6">
                    @auth
                                            <form class="w-full max-w-xl  rounded-lg px-4 p-2 bg-slate-100" method="POST" action="/posts/{{$post->id}}/comments">
                            @csrf
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Add a new comment</h2>
                                <div class="w-full md:w-full px-3 mb-2 mt-2">
                                    <textarea class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" name="body" placeholder='Type Your Comment' required></textarea>
                                    @error('body')
                                        <p class="text-red-500 text-sm mt-2">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="w-full md:w-full flex items-end px-3">
                                    
                                    <div class="-mr-1">
                                        <input type='submit' class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100" value='Post Comment'>
                                    </div>
                                </div>
                            </div>
                        </form>

                    @else
                        <p class="font-semibold">
                            <a href="/register" class="hover:underline">Register</a> or <a href="/login" class="hover:underline">Log in</a> to leave a comment.
                        </p>
                    @endauth
                    @foreach ($post -> comments as $comment)
                        <x-post-comment :comment="$comment" />
                    @endforeach 

            </section>
            </article>
        </main>
    </section>
    </x-layout>
