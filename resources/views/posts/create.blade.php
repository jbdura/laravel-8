<x-layout>
    <section class="px-6 py-8 w-3/5 mx-auto">
<form action="/admin/posts" method="POST" class="space-y-8 divide-y divide-gray-200"
>
    @csrf
  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
      <h2 class="text-base font-semibold leading-7 text-gray-900">Write...</h2>
        <div class="sm:col-span-3">
          <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
          <div class="mt-2">
            <input type="text" name="title" id="title" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            @error('title')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror  
        </div>
        </div>
        <div class="sm:col-span-3">
          <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">
            Excerpt
          </label>
          <div class="mt-2">
            <input type="text" name="excerpt" id="excerpt" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            @error('excerpt')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror  
        </div>
        </div>
        <div class="col-span-full">
          <label for="body" class="block text-sm font-medium leading-6 text-gray-900">
            Body
          </label>
          <div class="mt-2">
            <textarea id="body" name="body" rows="20" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
            @error('body')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror  
        </div>
        </div>
        <div class="sm:col-span-3">
          <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">
            Category
          </label>
          <div class="mt-2">
            <select id="category_id" name="category_id"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              @php
                $categories = App\Models\Category::all();
                @endphp
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
  </div>
      </div>
      <div class="sm:col-span-3">
        <label for="tags" class="block text-sm font-medium leading-6 text-gray-900">
        Tags <span class="italic">(Seperate with Commas)</span>:
        </label>
        <div class="mt-2">
     
    <input type="text" id="tags" name="tags" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 sm:text-sm" placeholder="add a new tag to post">
      @error('tag_id')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
      @enderror
      @error('new_tag')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
      @enderror 
  </div>

      </div>
    </div>
  </div>
  <div class="mt-6 flex items-center justify-end gap-x-6">
    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
      @click="/admin/posts"
    >
        Publish
    </button>
  </div>
</form>

    </section>
</x-layout>