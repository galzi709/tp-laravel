<nav x-data="{ open: false }"
     class="bg-white border-b shadow-sm">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between h-16 items-center">

            <!-- LOGO -->
            <a href="{{ route('articles.index') }}"
               class="text-2xl font-bold text-indigo-600 hover:text-indigo-800 transition">
                📰 Mon Blog
            </a>

            <!-- MENU DESKTOP -->
            <div class="hidden sm:flex space-x-8 items-center">

                <a href="{{ route('articles.index') }}"
                   class="text-gray-700 hover:text-indigo-600 font-medium transition">
                    Articles
                </a>

                <a href="{{ route('types.index') }}"
                   class="text-gray-700 hover:text-indigo-600 font-medium transition">
                    Types
                </a>

            </div>

            <!-- USER + LOGOUT -->
            <div class="hidden sm:flex items-center space-x-6">

                <span class="text-gray-700 font-medium">
                    👤 {{ Auth::user()->name }}
                </span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button class="text-red-600 hover:text-red-800 font-medium transition">
                        Logout
                    </button>

                </form>

            </div>

            <!-- MOBILE -->
            <div class="sm:hidden">
                <button @click="open = !open"
                        class="text-gray-700 text-2xl">
                    ☰
                </button>
            </div>

        </div>
    </div>

    <!-- MOBILE MENU -->
    <div :class="{ 'block': open, 'hidden': !open }"
         class="hidden sm:hidden px-4 py-3 border-t space-y-2">

        <a href="{{ route('articles.index') }}" class="block text-gray-700">
            Articles
        </a>

        <a href="{{ route('types.index') }}" class="block text-gray-700">
            Types
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button class="text-red-600">
                Logout
            </button>

        </form>

    </div>

</nav>