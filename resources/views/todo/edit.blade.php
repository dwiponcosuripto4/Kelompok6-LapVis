<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Detail Todo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-6">
                        <x-input-label for="title" :value="__('Nama Laptop')" />
                        <x-text-input id="title" name="title" type="text" class="block w-full mt-1"
                            :value="$todo->title" disabled />
                    </div>
                    <div class="mb-6">
                        <x-input-label for="category_id" :value="__('Jenis Service')" />
                        <x-text-input id="category_id" name="category_id" type="text" class="block w-full mt-1"
                            :value="$todo->category ? $todo->category->title : 'Empty'" disabled />
                    </div>
                    <div class="mb-6">
                        <x-input-label for="user_id" :value="__('Nama User')" />
                        <x-text-input id="user_id" name="user_id" type="text" class="block w-full mt-1"
                            :value="$todo->user ? $todo->user->name : 'Unknown'" disabled />
                    </div>
                    <div class="mb-6">
                        <x-input-label for="status" :value="__('Status')" />
                        <x-text-input id="status" name="status" type="text" class="block w-full mt-1"
                            :value="$todo->is_complete ? 'Completed' : 'Ongoing'" disabled />
                    </div>
                    <div class="flex items-center gap-4">
                        <a href="{{ route('todo.index') }}"
                            class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-gray-700 uppercase transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm dark:bg-gray-800 dark:border-gray-500 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25">{{ __('Back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
