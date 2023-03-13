{{-- @extends('frontend.config.app')

@section('content')
<div class="container my-5">
    <div class="row my-5">

        <div class="col-md-6 m-auto my-5 ">
            <div class="card my-5">
                <div class="card-body">
                    <h5 class="mb-3" style="border-left: 6px solid #1ab8ae;padding-left: 9px">Match The Code</h5>
                    <form action="{{ route('profile.forget.pass.verify.confirme') }}" method="post">
                    @csrf


                    <div class="mb-3">
                        <input style="background-color: #1ab8ae0f !important;" type="text" name="code" class="form-control py-3 border-1 @error('code') is-invalid border-danger @enderror" placeholder="Code">
                    </div>
                    <input type="hidden" name="id" value="{{ $data }}">

                    <div class=" text-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    @if (session()->get('data'))
    <script>
        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })

        Toast.fire({
        icon: 'success',
        title: 'Code Sent via SMS'
        })
    </script>
    @endif
@endsection --}}
