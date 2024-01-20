@include('dashboard.partials.head')
@include('dashboard.partials.sidebar')
@include('dashboard.partials.navbar')

   <main style="height: 100vh; overflow-y: auto;">
        @yield('content')
    </main>

@include('dashboard.partials.footer')