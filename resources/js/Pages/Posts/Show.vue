<script>
    export default {
        props: ['post', 'post_tags', 'all_categories'],
        mounted() {
            console.log(this.posts);
        }
    }    
</script>
<template>
       <section class="px-6 py-8">    
        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    <img src="/images/illustration-1.png" alt="" class="rounded-xl">

                    <p class="mt-4 block text-gray-400 text-xs">
                        Published just now
                    </p>

                    <div class="flex items-center lg:justify-center text-sm mt-4">
                        <img src="/images/lary-avatar.svg" alt="Lary avatar">
                        <div class="ml-3 text-left">
                            <a href="/posts/?author={{post.author.username}}">

                                <h5 class="font-bold">{{post.author.name}}</h5>
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

                            Go to all Posts
                        </a>

                        <div class="space-x-2">
                            <a v-for="category in all_categories" :key="category.id" :href="'/posts?category=' + category.slug"
                                class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                                style="font-size: 10px">{{category.name}}
                            </a>
                            
                        </div>
                    </div>

                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                        {{post.title}}
                    </h1>

                    <div class="space-y-4 lg:text-lg leading-loose">
                        {{post.body}}
                    </div>
                </div>
                <div class="tags mt-4 col-span-8 col-start-5">
                    <p v-for="tag in post_tags" :key="tag.id" class="px-3 mx-3 py-1 max-w-max border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                                style="font-size: 10px">{{tag.name}}
                    </p>
                                
                </div>

            </article>
        </main>
    </section>
</template>