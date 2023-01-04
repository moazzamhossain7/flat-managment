<div class="card">
    <div class="card-body">
        <!-- Logo -->
        <div class="app-brand justify-content-center">
            <a href="{{url('/')}}" class="app-brand-link gap-2">
                {{-- <span class="app-brand-logo demo">@include('_partials.macros',["width"=>25,"withbg"=>'#696cff'])</span>
                <span class="app-brand-text demo text-body fw-bolder">{{config('variables.templateName')}}</span> --}}
                <span class="app-brand-text text-uppercase demo menu-text fw-bold ms-2 fs-1 text-warning">
                    P<span class="text-muted fw-light"> & </span>G
                </span>
            </a>
        </div>
        <!-- /Logo -->

        {{ $slot }}
    </div>
</div>
