@include('layouts.includes.header')
    @include('layouts.includes.nav')

    <main class="py-4">
        <main class="container">
            @include('messages.success')
            @include('messages.error')
            @yield('content')
        </main>
    </main>
</div>
</body>
</html>
