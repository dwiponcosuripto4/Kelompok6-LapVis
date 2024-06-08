<x-app-layout>
    <x-slot name="header">
        <div style="background-image: url('YOUR_IMAGE_URL'); background-size: cover; background-position: center; padding: 20px;">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-center text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-semibold mb-4">{{ __('Kelompok 9:') }}</h3>
                    <ul class="text-lg font-medium" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;">
                        <li>Davin Widyatmaka 20210140123</li>
                        <li>Muhammad Ricco Arisdy 20210140125</li>
                        <li>Mochamad Aldy Raihan Fachrizal 20210140150</li>
                        <li>Dwiponco Suripto 20210140078</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
