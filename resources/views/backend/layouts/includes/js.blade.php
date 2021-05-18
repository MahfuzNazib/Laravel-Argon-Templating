<script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
<script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

@stack('js')

<!-- Argon JS -->
<script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
<script src="{{ asset('argon') }}/js/ajax_form_submit.js"></script>
<script src="{{ asset('argon') }}/js/custom_script.js"></script>
<!-- Sweet Alert JS -->
<script src="{{ asset('argon') }}/js/sweetalert2.min.js"></script>

@yield("per_page_js")