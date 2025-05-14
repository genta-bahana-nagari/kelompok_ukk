<nav class="bg-white shadow border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            {{-- Logo --}}
            <div class="flex items-center space-x-3">
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset('site-logo.png') }}" class="w-8" alt="Logo">
            </a>
                <span class="font-bold text-lg text-gray-800 hidden sm:inline">TokoKeren</span>
            </div>

            {{-- Search Bar --}}
            <div class="flex-1 mx-6">
                <input type="text" placeholder="Cari di toko ini" class="w-full border rounded-md px-4 py-2 text-sm focus:outline-none focus:ring focus:border-orange-500">
            </div>

            {{-- Right Section --}}
            <div class="flex items-center space-x-4">
                {{-- Icon Buttons --}}
                <button class="text-gray-600 hover:text-gray-800">
                    <i class="fas fa-shopping-cart"></i>
                </button>
                <button class="text-gray-600 hover:text-gray-800">
                    <i class="fas fa-bell"></i>
                </button>
                <button class="text-gray-600 hover:text-gray-800">
                    <i class="fas fa-envelope"></i>
                </button>

                {{-- Store and Profile --}}
                <a href="#" class="flex items-center space-x-1 text-sm text-gray-700 hover:underline">
                    <i class="fas fa-store"></i><span class="hidden sm:inline">Toko</span>
                </a>

                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm space-x-2 focus:outline-none">
                                <img class="w-8 h-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
                                <span class="hidden sm:inline">{{ Auth::user()->name }}</span>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link href="{{ route('profile.show') }}">Profil</x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">Keluar</x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2 bg-orange-500 text-white text-sm rounded hover:bg-orange-600 transition">
                        Login
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>
