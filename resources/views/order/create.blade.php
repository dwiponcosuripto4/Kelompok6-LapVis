<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Create Order') }}
        </h2>
    </x-slot>

    <div class="py-12" style="background-image: url('https://www.denpasarkota.go.id/public/uploads/berita/berita_192709090938_Rekomendasi6TempatServisLaptopdiDenpasar.jpg'); background-size: cover; background-position: center; background-attachment: fixed;">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('order.store') }}">
                        @csrf

                        <!-- Todo -->
                        <div class="mt-4">
                            <x-input-label for="todo_id" :value="__('Service Completed')" />
                            <select id="todo_id" class="block w-full mt-1 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" name="todo_id" required>
                                @foreach ($todos as $todo)
                                    <option value="{{ $todo->id }}">{{ $todo->title }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('todo_id')" class="mt-2" />
                        </div>

                        <!-- Description -->
                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Description')" />
                            <x-textarea id="description" name="description" class="block w-full mt-1 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                {{ old('description') }}
                            </x-textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Create') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
