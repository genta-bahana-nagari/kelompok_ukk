<div class="min-h-screen bg-white font-sans">
    <!-- Banner -->
    <section class="mt-4 mx-6">
        <div class="w-full h-48 bg-gray-200 rounded-lg flex items-center justify-center overflow-hidden">
            <img src="/banner.jpg" alt="Banner" class="object-cover w-full h-full">
        </div>
    </section>

    <!-- Recomendation -->
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

    <!-- Products and Brands -->
    <section class="px-6 py-8">
    <!-- Brand button -->
    <div class="flex items-center justify-center mb-6">
        <div class="flex flex-wrap gap-4">
            <button class="px-4 py-2 bg-red-600 text-white font-semibold rounded-md">Huawei</button>
            <button class="px-4 py-2 bg-gray-800 text-white font-semibold rounded-md">Iphone</button>
            <button class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md">Samsung</button>
            <button class="px-4 py-2 bg-green-500 text-white font-semibold rounded-md">Infinix</button>
        </div>
    </div>

        <!-- Produk Based on Brands -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach ($phones as $phone)
            <div class="border p-4 rounded-lg shadow-sm hover:shadow-md transition">
                <img src="{{ asset('storage/' . $phone->image) }}" alt="{{ $phone->title }}" class="object-cover">
                <div class="p-3">
                    <p class="text-xs text-gray-400 mb-1">{{ $phone->title }}</p>
                    <h3 class="text-sm font-semibold leading-tight mb-1">{{ Str::limit($phone->body, 50) }}</h3>
                    <p class="text-orange-600 font-bold mb-1">Stok: {{ $phone->stok }}</p>
                    <div class="text-xs text-gray-500">Status: {{ $phone->status }}</div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Button Load More -->
        <div class="mt-8 flex justify-center">
            <button class="px-6 py-2 border border-gray-300 rounded hover:bg-gray-100 transition">
                Muat Lebih Banyak
            </button>
        </div>
    </section>

    <!-- Testimonial -->
    <section class="mt-6 mx-6">
        <h1 class="text-lg font-bold text-center">
            Just a simple sentence for placeholder
        </h1>
    </section>
</div>
