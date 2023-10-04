@props(['tags'])

<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border-gray-200 border-2 rounded-xl">
            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
                <h1 class="text-xl font-bold text-gray-700">Tags</h1>
            </div>

            <div class="px-6 py-4">
                <ul>
                    @foreach ($tags as $tag)
                        <li class="mb-4 text-lg font-bold">
                            <a href="/posts?tag={{ $tag->name }}">{{ $tag->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </main>
    </section>
</x-layout>