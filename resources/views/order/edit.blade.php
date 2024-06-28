<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Detail Order') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between mb-6">
                        <div>
                            <span class="text-sm font-semibold text-gray-600 dark:text-gray-300">Service:</span>
                            <span class="block mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{ $order->service->title }}</span>
                        </div>
                        <div>
                            <span class="text-sm font-semibold text-gray-600 dark:text-gray-300">Jenis Service:</span>
                            <span class="block mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{ $order->service->jenisService ? $order->service->jenisService->type : 'Empty' }}</span>
                        </div>
                    </div>

                    <div class="flex justify-between mb-6">
                        <div>
                            <span class="text-sm font-semibold text-gray-600 dark:text-gray-300">Nama User:</span>
                            <span class="block mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{ $order->service->user ? $order->service->user->name : 'Unknown' }}</span>
                        </div>
                        <div>
                            <span class="text-sm font-semibold text-gray-600 dark:text-gray-300">Status:</span>
                            <span class="block mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{ $order->is_completed ? 'Completed' : 'Ongoing' }}</span>
                        </div>
                    </div>

                    <div class="mb-6">
                        <span class="text-sm font-semibold text-gray-600 dark:text-gray-300">Deskripsi:</span>
                        <p class="mt-1 text-lg text-gray-900 dark:text-white">{{ $order->description }}</p>
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('order.index') }}"
                            class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-gray-700 uppercase transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm dark:bg-gray-800 dark:border-gray-500 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25">{{ __('Back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
