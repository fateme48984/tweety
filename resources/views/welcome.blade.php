<x-app>
<div class="container">
            <div class="content font-mono">
                <h1 class="text-center align-middle text-7xl mt-8 text-slate-600">Tweety</h1>
                <div class="w-full block flex-grow lg:flex text-center">
                    <div class="text-sm lg:flex-grow">
                    @auth
                    <a class="text-decoration-none text-slate-600 block mt-4 lg:inline-block lg:mt-0 hover:text-black mx-4" href="{{ route('home') }}">{{ __('Home') }}</a>
                    <a class="dropdown-item text-decoration-none text-slate-600 block mt-4 lg:inline-block lg:mt-0 hover:text-black mx-4" href="{{ url('/logout') }}">
                        {{ __('Logout') }}
                    </a>
                    @else
                        <a class="text-decoration-none text-slate-600 block mt-4 lg:inline-block lg:mt-0 hover:text-black mx-4" href="{{ route('login') }}">{{ __('Login') }}</a>
                        <a class="text-decoration-none text-slate-600 block mt-4 lg:inline-block lg:mt-0 hover:text-black mx-4" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endauth
                </div>
            </div>
            </div>
</div>
</x-app>
