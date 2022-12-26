<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Scripts -->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>

        @vite(['resources/sass/app.scss', 'resources/js/universal.js', 'resources/css/app.css','resources/js/canvas.js'])

        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

        
        <script src="https://preview.colorlib.com/theme/bootstrap/multiselect-15/js/jquery.multiselect.js"></script>

        @vite(['resources/css/multiselect/jquery.multiselect.css','resources/css/multiselect/style.css'])
    </head>
    <body id="body">
        <div class="container py-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <nav aria-label="breadcrumb" class="bg-light rounded-3">
                                @yield('title')
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @yield('content')
    </body>
    @yield('js')
    @yield('msgjs')
    @yield('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const tooltipTriggerList = $('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
</html>
