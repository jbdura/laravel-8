<script setup>
        import { useForm } from '@inertiajs/vue3';
        import { usePage } from '@inertiajs/vue3';
        const props = defineProps(['categories'])
        const form = useForm({
                    title: '',
                    excerpt: '',
                    body: '',
                    category_id: '',
                    tags: '',
                });

        const submit = () => {
            form.post(route('posts.store'), {
                onFinish: () => {
                    form.reset();
                },
            });
        };

        const redirectToPostsIndex = () => {
            page.url.route('posts.show');
        };
</script>
<template>
    <section class="w-[60%] mx-auto mt-20">
        <form @submit.prevent="submit" class="space-y-8 divide-y divide-gray-200"
>

        <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12"> 
      <h2 class="font-semibold leading-7 text-2xl text-gray-900">Write...</h2>
        <div class="sm:col-span-3">
          <label for="title" class="italic block text-xl mt-3 font-medium leading-6 text-gray-900">Title</label>
          <div class="my-2">
            <input type="text" v-model="form.title" name="title" id="title" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
          </div>
          <div class="sm:col-span-3">
          <label for="last-name" class="block text-xl italic font-medium leading-6 text-gray-900">
            Excerpt
          </label>
          <div class="my-2">
            <input type="text" v-model="form.excerpt" name="excerpt" id="excerpt" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
          </div>
            <div class="sm:col-span-3">
            <label for="last-name" class="block text-xl italic font-medium leading-6 text-gray-900">
                Body
            </label>
            <div class="my-2">
                <textarea name="body" v-model="form.body" id="body" rows="15" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
            </div>
            </div>
            <div class="sm:col-span-3">
            <label for="category_id" class="block text-xl italic font-medium leading-6 text-gray-900">
                Category
                </label>    
                <div class="my-2">
                    <select name="category_id" v-model="form.category_id" id="category_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <option value="">Select a Category</option>
                        <option v-for="category in categories" :key="category.id" :value="category.id">
                            {{ category.name }}
                        </option>
                    </select>
                    </div>
                    </div>
                    <div class="sm:col-span-3">
                    <label for="last-name" class="block text-xl italic font-medium leading-6 text-gray-900">
                        Tags <span class="italic">(Seperate with Commas)</span>
                    </label>
                    <div class="my-2">
                        <input type="text" v-model="form.tags" name="tags" id="tags" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>  
                        </div>

          </div>
          </div>  
          <div class="mt-6 flex items-center justify-end gap-x-6">
    <button type="submit" @click="redirectToPostsIndex"
     class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
        Publish
    </button>
  </div>
  </form>
    </section>
</template>