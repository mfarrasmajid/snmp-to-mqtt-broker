@extends('layouts.blank')

@section('title', 'Login')

@section('contents')
<!--begin::Authentication - Sign-in -->
<div class="d-flex flex-column flex-lg-row flex-column-fluid">
    <!--begin::Aside-->
    <div class="d-flex flex-column flex-column-fluid flex-center w-lg-50 p-10">
        <!--begin::Wrapper-->
        <div class="d-flex justify-content-start flex-column-fluid flex-column w-100 mw-450px">
            <!--begin::Header-->
            <div class="py-10">
                <img alt="Logo" src="{{ asset('assets/_app/logo.png')}}" class="theme-light-show h-100px" />
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="py-20">
                <!--begin::Form-->
                <form 
                    action="{{ url('/login') }}" 
                    class="form w-100" method="POST" novalidate="novalidate" id="kt_sign_in_form">
                    <!--begin::Body-->
                    @csrf
                    <div class="card-body">
                        <!--begin::Heading-->
                        <div class="text-start mb-10">
                            <!--begin::Title-->
                            <h1 class="text-gray-900 mb-3 fs-3x" data-kt-translate="sign-in-title">SNMP-to-MQTT Broker</h1>
                            <!--end::Title-->
                            <!--begin::Text-->
                            <div class="text-gray-500 fw-semibold fs-6" data-kt-translate="general-desc">Login ke aplikasi</div>
                            <!--end::Link-->
                        </div>
                        <!--begin::Heading-->
                        @if (Session::has('error'))
                        <div class="fv-row mb-8">
                            <div class="fw-semibold fs-6 text-danger">@php echo $request->session()->get('error'); @endphp</div>
                        </div>
                        @endif
                        <!--begin::Input group=-->
                        <div class="fv-row mb-8">
                            <!--begin::Email-->
                            <input type="text" name="username" placeholder="Username" autocomplete="off" data-kt-translate="sign-in-input-email" class="form-control form-control-solid" />
                            <!--end::Email-->
                        </div>
                        <!--end::Input group=-->
                        <div class="fv-row input-group mb-7">
                            <!--begin::Password-->
                            <input type="password" name="password" id="password" placeholder="Password" autocomplete="off" data-kt-translate="sign-in-input-password" class="form-control form-control-solid" />
                            <!--end::Password-->
                            <span class="input-group-text" id="toggle-password">
                                <i id="icon-password" class="ki-solid text-primary ki-eye fs-2"></i>
                            </span>
                        </div>
                        <!--end::Input group=-->
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack">
                            <!--begin::Submit-->
                            <button id="kt_sign_in_submit" type="submit" class="btn btn-primary me-2 flex-shrink-0">
                                <!--begin::Indicator label-->
                                <span class="indicator-label" data-kt-translate="sign-in-submit">Sign In</span>
                                <!--end::Indicator label-->
                                <!--begin::Indicator progress-->
                                <span class="indicator-progress">
                                    <span data-kt-translate="general-progress">Please wait...</span>
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                                <!--end::Indicator progress-->
                            </button>
                            <!--end::Submit-->
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--begin::Body-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Body-->
            <!--begin::Footer-->
            <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Aside-->
    <!--begin::Body-->
    <div class="d-none d-lg-flex flex-lg-row-fluid w-50 bgi-size-cover bgi-position-y-center bgi-position-x-start bgi-no-repeat" style="background-image: url({{ asset('assets/_app/background.jpg')}})"></div>
    <!--begin::Body-->
</div>
<!--end::Authentication - Sign-in-->
@endsection

@section('styles')
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('#toggle-password').on('click', function(){
            var pass = $('#password').prop('type');
            var icon = $('#icon-password');
            if (pass == 'password'){
                icon.removeClass('ki-eye');
                icon.addClass('ki-eye-slash');
                $('#password').prop('type', 'text');
            } else {
                icon.addClass('ki-eye');
                icon.removeClass('ki-eye-slash');
                $('#password').prop('type', 'password');
            }
        })
    })
</script>
@endsection
