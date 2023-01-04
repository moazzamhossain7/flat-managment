<!-- Footer-->
<footer class="content-footer footer bg-footer-theme">
    <div class="{{ (!empty($containerNav) ? $containerNav : 'container-fluid') }} d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
        <div class="mb-2 mb-md-0">
            ©{{ date('Y') }}, made with ❤️ by
            <a href="{{ config('app.url') }}" target="_blank" class="footer-link fw-bolder">
                {{ config('app.name') }}
            </a>
        </div>
        <div>
            <a href="#" class="footer-link me-4" target="_blank">License</a>
            <a href="#" target="_blank" class="footer-link me-4">More Themes</a>
            <a href="#" target="_blank" class="footer-link me-4">Documentation</a>
            <a href="#" target="_blank" class="footer-link d-none d-sm-inline-block">Support</a>
        </div>
    </div>
</footer>
<!--/ Footer-->
