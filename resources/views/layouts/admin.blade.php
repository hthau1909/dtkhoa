@include('backend.partials.head');
    <body class="sb-nav-fixed">
        @include('backend.partials.nav');
        <div id="layoutSidenav">
            @include('backend.partials.layoutSidenav_nav');
            <div id="layoutSidenav_content">
                <main>
                    @yield('main')
                </main>
                @include('backend.partials.footer');
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('backend/js/scripts.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{asset('backend/js/datatables-simple-demo.js')}}"></script>
    </body>
</html>
