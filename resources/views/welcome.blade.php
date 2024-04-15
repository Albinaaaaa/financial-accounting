@include('layouts.head')
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="menu">
                <a href="{{ route('login') }}" class="btn-primary mini">Log in</a>
                <a href="{{ route('register') }}" class="btn-primary">Register</a>
            </div>
            <div class="content">
                <div class="description-container">
                    <p>
                        This website offers a simple and intuitive interface for managing your personal finances. It's secure and protects your private information.
                    </p>
                </div>
                <div class="photo-container">
                    <img src="{{ URL::to('build/assets/images/welcome/planet.png') }}" alt="planet">
                </div>
            </div>
@include('layouts.footer')
