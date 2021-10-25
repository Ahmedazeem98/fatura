@include('layouts.includes.header')
@include('layouts.includes.nav')

    <main class="py-4">
        <main class="container">
            @include('frontend.messages.success')
            @include('frontend.messages.error')
            @yield('content')
        </main>
    </main>

@include('layouts.includes.footer')

