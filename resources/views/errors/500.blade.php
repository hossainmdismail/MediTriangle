@extends('backend.config.blank')

@section('blank')
<section class="position-relative" style="background: url('{{ asset('404.jpg') }}') center; background-repeat: no-repeat;background-size: auto;">
    <div class="bg-overlay bg-black" style="opacity: 0.7;"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">
                <div class="d-flex flex-column min-vh-100 px-md-5 py-5 px-4">
                    <div class="mt-md-5">
                        <a href="index.html"><img src="{{ asset('frontend/brand.png') }}" height="100" alt=""></a>
                    </div>
                    <div class="title-heading my-auto">
                        <h4 class="maintenance display-5 text-white title-dark fw-bold mb-4">System is under maintenance.</h4>
                        <p class="text-white-50 para-desc mb-4">We're busy updating the <i>Medi Triangle</i> for you. Please check back soon <i>or</i> Let us know if you want to change anything!</p>

                        <span id="maintenance" class="timer h1 text-white title-dark" style="color: #19bdb2 !important;"></span><span class="d-block h6 text-uppercase text-white-50">Minutes</span>

                    </div>
                    <div class="mb-md-5">
                        <span class="text-white-50 h6">Inform Now</span>
                        <ul class="list-unstyled social-icon social mb-0 mt-2">
                            <li class="list-inline-item"><a href="https://www.linkedin.com/in/md-ismail-hossain-911a96236" target="_blank" class="rounded"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            {{-- <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="linkedin" class="fea icon-sm fea-social"></i></a></li> --}}
                        </ul><!--end icon-->
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
@endsection

{{-- @extends('errors::minimal')

@section('title', __('Server Error'))
@section('code', '500')
@section('message', __('Server Error')) --}}
