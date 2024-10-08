@section('footer')
    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>Employee Project</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by <a href="#">BootstrapMade</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>
    <script src="{{url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('ckeditor/ckeditor.js')}}"></script>
    <script src="{{url('assets/js/jquery.js')}}"></script>
    <script src="{{url('assets/js/main.js')}}"></script>
    @yield('scripts')

    </body>
    </html>

@endsection
