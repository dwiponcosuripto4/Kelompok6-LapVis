<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Service') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- Service Form --}}
                    <form method="post" action="{{ route('todo.store') }}" class="">
                        @csrf
                        @method('post')
                        <div class="mb-6">
                            <x-input-label for="title" :value="__('Nama Laptop')" />
                            <x-text-input id="title" name="title" type="text" class="block w-full mt-1"
                                :value="old('title')" required autofocus autocomplete="title" />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>
                        <div class="mb-6">
                            <x-input-label for="category_id" :value="__('Jenis Service')" />
                            <x-select id="category_id" name="category_id" class="block w-full mt-1">
                                <option value="">Empty</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id', '') == $category->id ? 'selected' : '' }}>
                                        {{ $category->title }}
                                    </option>
                                @endforeach
                            </x-select>
                            <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
                        </div>
                        <div class="mb-6">
                            <x-input-label for="user_search" :value="__('Nama User')" />
                            <x-text-input id="user_search" name="user_search" type="text" class="block w-full mt-1"
                                :value="old('user_search')" autocomplete="user_search" />
                            <x-input-error class="mt-2" :messages="$errors->get('user_search')" />
                            <div id="user-results" class="mt-2"></div>
                        </div>
                        <input type="hidden" name="user_id" id="user_id" value="{{ old('user_id') }}">
                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" autofocus />
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                            <a href="{{ route('todo.index') }}"
                                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-gray-700 uppercase transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm dark:bg-gray-800 dark:border-gray-500 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25">{{ __('Cancel') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('user_search').addEventListener('input', function() {
            const search = this.value;
            if (search.length >= 2) {
                fetch(`/search-users?search=${search}`)
                    .then(response => response.json())
                    .then(users => {
                        let results = '';
                        users.forEach(user => {
                            results += `<div class="user-item" data-id="${user.id}">${user.name}</div>`;
                        });
                        document.getElementById('user-results').innerHTML = results;
                        document.querySelectorAll('.user-item').forEach(item => {
                            item.addEventListener('click', function() {
                                document.getElementById('user_search').value = this.textContent;
                                document.getElementById('user_id').value = this.dataset.id;
                                document.getElementById('user-results').innerHTML = '';
                            });
                        });
                    });
            } else {
                document.getElementById('user-results').innerHTML = '';
            }
        });
    </script>
</x-app-layout>
