<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-xl text-gray-900 dark:text-gray-100">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            @can('admin')
                            <div>
                                <x-create-button href="{{ route('order.create') }}" />
                            </div>
                            <form class="flex items-center gap-2" method="GET" action="{{ route('order.index') }}">
                                <x-text-input id="search" name="search" type="text" class="w-full"
                                    placeholder="Search by todo title or user ID ..." value="{{ request('search') }}"
                                    autofocus />
                                <x-primary-button type="submit">
                                    {{ __('Search') }}
                                </x-primary-button>
                            </form>
                            @endcan
                        </div>
                        <div>
                            @if (session('success'))
                            <p x-data="{ show: true }" x-show="show" x-transition
                                x-init="setTimeout(() => show = false, 5000)"
                                class="text-sm text-green-600 dark:text-green-400">{{ session('success') }}</p>
                            @endif
                            @if (session('danger'))
                            <p x-data="{ show: true }" x-show="show" x-transition
                                x-init="setTimeout(() => show = false, 5000)"
                                class="text-sm text-red-600 dark:text-red-400">{{ session('danger') }}</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Service Completed
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    User Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Updated At
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status (Belum Bayar / Sudah Bayar)
                                </th>
                                @can('admin')
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                            <tr class="odd:bg-white odd:dark:bg-gray-800 even:bg-gray-50 even:dark:bg-gray-700">
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    <a href="{{ route('order.edit', $order) }}" class="hover:underline">{{ $order->todo->title }}</a>
                                </td>
                                <td class="px-6 py-4">
                                    {{ $order->todo->user->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $order->updated_at->format('d-M-Y H:i:s') }}
                                </td>
                                <td class="px-6 py-4">
                                    @if ($order->is_completed)
                                    <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                        Sudah Bayar
                                    </span>
                                    @else
                                    <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">
                                        Belum Bayar
                                    </span>
                                    @endif
                                    @can('admin')
                                    <form action="{{ route('order.complete', $order) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="ml-2 text-green-600 dark:text-green-400">Pay</button>
                                    </form>
                                    @if (!$order->is_completed)
                                    <form action="{{ route('order.uncomplete', $order) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="ml-2 text-yellow-600 dark:text-yellow-400">Paid</button>
                                    </form>
                                    @endif
                                    @endcan
                                </td>
                                @can('admin')
                                <td class="px-6 py-4">
                                    <div class="flex space-x-3">
                                        @if (auth()->user()->id == $order->todo->user_id || auth()->user()->can('admin'))
                                        <form action="{{ route('order.destroy', $order) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 dark:text-red-400">Delete</button>
                                        </form>
                                        @endif
                                    </div>
                                </td>
                                @endcan
                            </tr>
                            @empty
                            <tr class="bg-white dark:bg-gray-800">
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    No orders found
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if ($orders->hasPages())
                <div class="p-6">
                    {{ $orders->links('vendor.pagination.custom-tailwind') }}
                </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
