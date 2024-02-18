<aside class="hidden py-4 md:w-1/3 lg:w-1/4 md:block">
    <div class="sticky flex flex-col gap-2 p-4 text-sm border-r border-indigo-100 top-12">

        <h2 class="pl-3 mb-4 text-2xl font-semibold">Profile</h2>

        <button onclick="scrollToEdit()"
            class="flex items-center px-4 py-2.5 font-semibold bg-gray-700 hover:bg-gray-800 transition-colors text-white text-base border rounded-full w-full">
            Edit Profile
        </button>
        
        <a href="{{ route('todos.index') }}">
            <button
                class="flex items-center px-4 py-2.5 font-semibold bg-gray-700 hover:bg-gray-800 transition-colors text-white text-base border rounded-full w-full">
                To-do List
            </button>
        </a>

        <a href="">
            <button
                class="flex items-center px-4 py-2.5 font-semibold bg-gray-700 hover:bg-gray-800 transition-colors text-white text-base border rounded-full w-full">
                My Course
            </button>
        </a>
    </div>
</aside>
