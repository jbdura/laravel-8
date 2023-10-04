@props(['comment'])
<div class="flex justify-center relative">
    <div class="relative grid grid-cols-1 gap-4 p-4 mb-8 border rounded-lg bg-white shadow-lg w-full">
        <div class="relative flex gap-4">
            <img src="https://i.pravatar.cc/60?u={{$comment->user_id}}" class="relative rounded-lg -top-8 -mb-4 bg-white border h-20 w-20" alt="" loading="lazy">
            <div class="flex flex-col w-full">
                <div class="flex flex-row justify-between">
                    <p class="relative text-xl whitespace-nowrap truncate overflow-hidden">{{ $comment->author->username }}</p>
                    <a class="text-gray-500 text-xl" href="#"><i class="fa-solid fa-trash"></i></a>
                </div>
                <p class="text-gray-400 text-sm">
                    {{ $comment->created_at->diffForHumans() }}
                </p>
            </div>
        </div>
        <p class="-mt-4 text-gray-500">
            {{ $comment->body }}
        </p>
    </div>
</div>
