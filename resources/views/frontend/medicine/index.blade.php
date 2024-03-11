{{-- @extends('frontend.config.app')
@section('style')
<style>
    #billings{
        display: none;
    }
</style>
@endsection

@section('content')
<div class="container-fluid py-5 my-5">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-5 mb-5 mb-lg-0">
                <div class="mb-4">
                    <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Medicines</h5>
                    <h1 class="display-4">Buy Best Medicine For Your Family</h1>
                </div>
                <p class="mb-5">Eirmod sed tempor lorem ut dolores. Aliquyam sit sadipscing kasd ipsum. Dolor ea et dolore et at sea ea at dolor, justo ipsum duo rebum sea invidunt voluptua. Eos vero eos vero ea et dolore eirmod et. Dolores diam duo invidunt lorem. Elitr ut dolores magna sit. Sea dolore sanctus sed et. Takimata takimata sanctus sed.</p>
           <a class="btn btn-primary rounded-pill py-3 px-5 me-3" href="">Find Doctor</a>
                <a class="btn btn-outline-primary rounded-pill py-3 px-5" href="">Read More</a>
            </div>
            <div class="col-lg-7">
                <div class="bg-light text-center rounded p-4">
                    <h1 class="mb-4">Order Medicine</h1>
                    <form class="medi" action="{{ route('store.medicine') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3 mb-3 medi">
                            <div class="col-12 col-sm-8">
                                <input type="text" name="medicine[]" class="form-control bg-white border-0 inp @if(session('validate')) is-invalid @endif" placeholder="Medicine" style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-3">
                                <input type="number" name="quantity[]" class="form-control bg-white border-0 @if(session('validate')) is-invalid @endif" placeholder="Quantity" style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-1">
                                <button type="button" class="btn btn-primary mt-2" id="plus">+</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-3 text-start">
                                <label for="report" class="form-label">Prescription</label>
                                <input type="file" name="report" class="form-control bg-white border-0">
                            </div>
                        </div>
                        <div id="billings" class="row">
                            <hr>
                            <h5 class="text-start" style="border-left: 6px solid #1ab8ae;margin-left: 15px;">Billing Address</h5>
                            <div class="col-12 mb-3">
                                <input type="text" name="address" class="form-control bg-white border-0 @error('address') is-invalid @enderror" placeholder="Address" value="{{ old('address') }}" style="height: 55px;">
                            </div>
                            <div class="col-12 mb-3">
                                <input type="text" name="name" class="form-control bg-white border-0 @error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name') }}" style="height: 55px;">
                            </div>
                            <div class="col-12 mb-3">
                                <input type="number" name="mobile" class="form-control bg-white border-0 @error('mobile') is-invalid @enderror" placeholder="Phone Number" value="{{ old('number') }}" style="height: 55px;">
                            </div>
                        </div>
                        @if (!Auth::user())
                                <div id="userinfo" class="mt-5">

                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                        <button name="submit" value="0" class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Registration</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                        <button name="submit" value="1" class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Login</button>
                                        </li>
                                    </ul>

                                    <div class="tab-content" id="myTabContent">
                                     
                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                            <div class="row mt-3">
                                                <div class="col-12 mb-3">
                                                    <input type="text" name="number" class="form-control bg-white border-0 @error('number') is-invalid @enderror" value="{{ old('number') }}" placeholder="01XXXXXXXXX">

                                                </div>
                                                <div class="col-12 mb-3">
                                                    <input type="text" name="email" class="form-control bg-white border-0" value="{{ old('email') }}" placeholder="Email">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                            <div class="row mt-3 justify-content center">
                                                <div class="col-6">
                                                    <p><a href="{{ route('login') }}">Click here</a> If you already have an account!</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                @else

                                @endif
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Order</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $('.inp').click(function () {
            $('#billings').css('display','block');
        });
        $('#plus').click(function () {
            let inputNew = $('.medi:last').clone(true);
            $(inputNew).insertAfter('.medi:last');
        });
    </script>
    @if(session()->get('errors'))
    <script>
        $('#billings').css('display','block');
    </script>
    @endif
@endsection --}}
