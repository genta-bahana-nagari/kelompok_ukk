<div class="min-h-screen bg-white font-sans">
    {{-- Banner --}}
    <section class="mt-4 mx-6">
        <div class="w-full h-48 bg-gray-200 rounded-lg flex items-center justify-center overflow-hidden">
            <img src="/banner.jpg" alt="Banner" class="object-cover w-full h-full">
        </div>
    </section>

    {{-- Recommendations --}}
    <section class="mt-6 mx-6">
        <div class="flex items-center gap-4 mb-4 text-sm md:text-lg font-semibold ">
            <h2>Berdasarkan preferensimu</h2>
            <a href="#" class="text-blue-500 hover:underline transition-all duration-200">Lihat Semua</a>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach (range(1, 4) as $i)
                <div class="border p-4 rounded-lg shadow-sm hover:shadow-md transition">
                    <img src="https://via.placeholder.com/150" alt="Produk" class="w-full h-32 object-cover rounded mb-2">
                    <h3 class="text-sm font-semibold mb-1">KopiPhone X 30 PRIME (12/512GB)</h3>
                    <p class="text-orange-600 font-bold">Rp25.409.000</p>
                    <p class="text-xs text-gray-500">⭐ 5.0 | 100+ Terjual</p>
                </div>
            @endforeach
        </div>
    </section>
</div>
