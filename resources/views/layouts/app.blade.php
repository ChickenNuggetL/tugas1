<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Promotion Website')</title>
    
    <!-- Scripts and Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }
    </style>
    @yield('styles')
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-blue-600 text-white shadow-md">
        <div class="container py-4 px-6 flex justify-between items-center">
            <a href="{{ route('promotions.index') }}" class="text-xl font-bold">PromoHub</a>
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="{{ route('promotions.index') }}" class="hover:text-blue-200">Home</a></li>
                    <li><a href="{{ route('promotions.create') }}" class="hover:text-blue-200">Add Promotion</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container py-6">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6">
        <div class="container text-center">
            <p>&copy; {{ date('Y') }} PromoHub. All rights reserved.</p>
        </div>
    </footer>

    @yield('scripts')
</body>
</html>