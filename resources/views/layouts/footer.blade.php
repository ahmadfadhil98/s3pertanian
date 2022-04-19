</div>

                <footer class="bg-gradient-to-r from-green-600 to-green-900 shadow-inner">
                <div class="text-xs text-gray-200 text-center py-3.5">
                    <div class="">Sistem Informasi S3 Pertanian</div>
                    <div class="">Universitas Andalas</div>
                </div>
            </footer>
            </main>
        </div>
        {{-- <div  class="min-h-screen bg-gray-100">
            @livewire('navigation-dropdown')

            <!-- Page Heading -->


            <!-- Page Content -->
            <main class="h-screen">
                {{ $slot }}
            </main>


        </div> --}}

        @stack('modals')

        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.5/pdfobject.min.js" integrity="sha512-K4UtqDEi6MR5oZo0YJieEqqsPMsrWa9rGDWMK2ygySdRQ+DtwmuBXAllehaopjKpbxrmXmeBo77vjA2ylTYhRA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.5/pdfobject.js" integrity="sha512-eCQjXTTg9blbos6LwHpAHSEZode2HEduXmentxjV8+9pv3q1UwDU1bNu0qc2WpZZhltRMT9zgGl7EzuqnQY5yQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        {{-- <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js'></script> --}}
        @livewireScripts
    </body>
    {{-- <footer class="bg-gradient-to-r from-green-600 to-green-900 shadow-inner">
        <div class="text-xs text-gray-200 text-center py-3.5">
            <div class="">Sistem Informasi S3 Pertanian</div>
            <div class="">Universitas Andalas</div>
            </div>
        </div>
    </footer> --}}
</html>
