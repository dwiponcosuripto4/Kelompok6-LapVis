<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Service') }}
        </h2>
    </x-slot>

    <div class="py-12" style="background-image: url('https://www.denpasarkota.go.id/public/uploads/berita/berita_192709090938_Rekomendasi6TempatServisLaptopdiDenpasar.jpg'); background-size: cover; background-position: center; background-attachment: fixed;">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                @can('admin')
                <div class="px-6 pt-6 mb-5 md:w-1/2 2xl:w-1/3">
                    @if (request('search'))
                        <h2 class="pb-3 text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                            Search results for : {{ request('search') }}
                        </h2>
                    @endif
                    <form class="flex items-center gap-2" method="GET" action="{{ route('todo.index') }}">
                        <x-text-input id="search" name="search" type="text" class="w-full"
                            placeholder="Search by name or user ID ..." value="{{ request('search') }}" autofocus />
                        <x-primary-button type="submit">
                            {{ __('Search') }}
                        </x-primary-button>
                    </form>
                </div>
                @endcan
                {{-- Notification --}}
                <div class="p-6 text-xl text-gray-900 dark:text-gray-100">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            @can('admin')
                            <div>
                                <x-create-button href="{{ route('todo.create') }}" />
                            </div>
                            <form class="flex items-center gap-2" method="GET" action="{{ route('todo.index') }}">
                                <input type="hidden" name="search" value="{{ request('search') }}">
                                <x-primary-button type="submit" name="filter_completed" value="1">
                                    {{ __('Filter Completed') }}
                                </x-primary-button>
                                @if (request('filter_completed'))
                                    <x-secondary-button type="submit">
                                        {{ __('Clear Filter') }}
                                    </x-secondary-button>
                                @endif
                            </form>
                            @endcan
                        </div>
                        <div>
                            @if (session('success'))
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
                                    class="text-sm text-green-600 dark:text-green-400">{{ session('success') }}
                                </p>
                            @endif
                            @if (session('danger'))
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
                                    class="text-sm text-red-600 dark:text-red-400">{{ session('danger') }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Table Todo --}}
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Service
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Jenis Service
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    User ID
                                </th>
                                <th scope="col" class="hidden px-6 py-3 md:block">
                                    Status
                                </th>
                                @can('admin')
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($todos as $todo)
                                <tr class="odd:bg-white odd:dark:bg-gray-800 even:bg-gray-50 even:dark:bg-gray-700">
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                        <a href="{{ route('todo.edit', $todo) }}"
                                            class="hover:underline">{{ $todo->title }}</a>
                                    </td>
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                        @if ($todo->category)
                                            {{ $todo->category->title }}
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $todo->user->id }}
                                    </td>
                                    <td class="hidden px-6 py-4 md:block">
                                        @if ($todo->is_complete == false)
                                            <span
                                                class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                                Sedang dikerjakan
                                            </span>
                                        @else
                                            <span
                                                class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                                Selesai bisa diambil!
                                            </span>
                                        @endif
                                    </td>
                                    @can('admin')
                                    <td class="px-6 py-4">
                                        <div class="flex space-x-3">
                                            @if (auth()->user()->id == $todo->user_id || auth()->user()->can('admin'))
                                                @if ($todo->is_complete == false)
                                                    <form action="{{ route('todo.complete', $todo) }}" method="Post">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="text-green-600 dark:text-green-400">
                                                            Complete
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('todo.uncomplete', $todo) }}" method="Post">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="text-blue-600 dark:text-blue-400">
                                                            Uncomplete
                                                        </button>
                                                    </form>
                                                @endif
                                                <form action="{{ route('todo.destroy', $todo) }}" method="Post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 dark:text-red-400">
                                                        Delete
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                    @endcan
                                </tr>
                            @empty
                                <tr class="bg-white dark:bg-gray-800">
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                        Empty
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{-- Pagination --}}
                @if ($todos->hasPages())
                    <div class="p-6">
                        {{ $todos->links('vendor.pagination.custom-tailwind') }}
                    </div>
                @endif
                @if ($todosCompleted > 1)
                    <div class="p-6 text-xl text-gray-900 dark:text-gray-100">
                        <form action="{{ route('todo.deleteallcompleted') }}" method="Post">
                            @csrf
                            @method('delete')
                            <x-primary-button>
                                Delete All Completed Task
                            </x-primary-button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
