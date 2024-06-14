<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div style="background-image: url('https://www.denpasarkota.go.id/public/uploads/berita/berita_192709090938_Rekomendasi6TempatServisLaptopdiDenpasar.jpg'); background-size: cover; background-position: center; background-attachment: fixed;">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 bg-opacity-75 dark:bg-opacity-75 overflow-hidden shadow-sm sm:rounded-lg">
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
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 bg-opacity-75 dark:bg-opacity-75 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-center text-gray-900 dark:text-gray-100">
                            <h3 class="text-2xl font-semibold mb-4">{{ __('Jenis Service Di Toko Kami:') }}</h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                                <div class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow-lg">
                                    <img src="https://example.com/cleaning.jpg" alt="Cleaning" class="w-full h-32 object-cover mb-4 rounded-lg">
                                    <h4 class="text-xl font-semibold mb-2">Cleaning</h4>
                                    <p>Layanan pembersihan untuk menjaga performa laptop Anda.</p>
                                </div>
                                <div class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow-lg">
                                    <img src="https://example.com/upgrade-storage.jpg" alt="Upgrade Storage" class="w-full h-32 object-cover mb-4 rounded-lg">
                                    <h4 class="text-xl font-semibold mb-2">Upgrade Storage</h4>
                                    <p>Upgrade kapasitas penyimpanan untuk kecepatan dan ruang yang lebih besar.</p>
                                </div>
                                <div class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow-lg">
                                    <img src="https://example.com/upgrade-memory.jpg" alt="Upgrade Memory" class="w-full h-32 object-cover mb-4 rounded-lg">
                                    <h4 class="text-xl font-semibold mb-2">Upgrade Memory</h4>
                                    <p>Upgrade memori untuk performa multitasking yang lebih baik.</p>
                                </div>
                                <div class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow-lg">
                                    <img src="https://example.com/virus-removal.jpg" alt="Virus Removal" class="w-full h-32 object-cover mb-4 rounded-lg">
                                    <h4 class="text-xl font-semibold mb-2">Virus Removal</h4>
                                    <p>Penghapusan virus dan malware untuk keamanan data Anda.</p>
                                </div>
                                <div class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow-lg">
                                    <img src="https://example.com/system-optimization.jpg" alt="System Optimization" class="w-full h-32 object-cover mb-4 rounded-lg">
                                    <h4 class="text-xl font-semibold mb-2">System Optimization</h4>
                                    <p>Optimasi sistem untuk kinerja yang lebih cepat dan efisien.</p>
                                </div>
                                <div class="bg-white dark:bg-gray-700 p-4 rounded-lg shadow-lg">
                                    <img src="https://example.com/hardware-repair.jpg" alt="Hardware Repair" class="w-full h-32 object-cover mb-4 rounded-lg">
                                    <h4 class="text-xl font-semibold mb-2">Hardware Repair</h4>
                                    <p>Perbaikan hardware untuk memperbaiki kerusakan fisik pada laptop.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
