@extends('backend.config.app')
@section('content')
{{-- Modals --}}
<div class="modal fade" id="confirm" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-bottom p-3">
                <h5 class="modal-title" id="exampleModalLabel">Confirm Order</h5>
                <button type="button" class="btn btn-icon btn-close" data-bs-dismiss="modal" id="close-modal"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body p-3 pt-4">

                <form action="{{ route('user.data.visaInvitaion.confirmation') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="mb-3">
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-info">{{ $datas->order_id }}</li>
                                <li class="list-group-item list-group-item-success">{{ $datas->number}}</li>
                            </ul>
                            <input type="hidden" name="order_id" value="{{ $datas->order_id }}">
                            <input type="hidden" name="number" value="{{ $datas->number }}">

                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Appointment Date</label>
                            <input type="date" name="date" class="form-control @error('date') is-invalid @enderror">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Time</label>
                            <input type="time" name="time" class="form-control @error('time') is-invalid @enderror">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="" class="form-label">Message</label>
                            <textarea type="text" class="form-control @error('message') is-invalid @enderror" name="message" rows="5" placeholder="Type..."> {{ $datas->message }}</textarea>
                        </div>

                        <div class="col-lg-12">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary" name="btn" value="1">Confirm</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="cancel" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-bottom p-3">
                <h5 class="modal-title" id="exampleModalLabel">Cancel Order</h5>
                <button type="button" class="btn btn-icon btn-close" data-bs-dismiss="modal" id="close-modal"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body p-3 pt-4">

                <form action="{{ route('user.data.visaInvitaion.confirmation') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="mb-3">
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-info">{{ $datas->order_id }}</li>
                                <li class="list-group-item list-group-item-success">{{ $datas->number }}</li>
                            </ul>
                            <input type="hidden" name="order_id" value="{{ $datas->order_id }}">
                            <input type="hidden" name="number" value="{{ $datas->number }}">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="" class="form-label">Message</label>
                            <textarea type="text" class="form-control @error('message') is-invalid @enderror" name="message" rows="5" placeholder="Type..."> {{ $datas->message }}</textarea>
                        </div>

                        <div class="col-lg-12">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-danger" name="btn" value="2">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
{{-- Modals --}}



@php
    $date = date('M d Y');
@endphp
<div class="container-fluid">
    <div class="layout-specing">
        <div class="row">
            <div class="col-xl-9 col-lg-6 col-md-4">
                <h5 class="mb-0">
                    Appointment
                </h5>
                {{-- <nav aria-label="breadcrumb" class="d-inline-block mt-2">
                    <ul class="breadcrumb breadcrumb-muted bg-transparent rounded mb-0 p-0">
                        <li class="breadcrumb-item">Dashboard</li><i style="font-size:12px;padding-left:6px" class="fa-solid fa-chevron-right"></i>
                        <li class="breadcrumb-item" aria-current="page">
                            @if ($datas->appointment_type == 1 )
                                <a href="{{ route('user.data.appointment') }}">Appointment</a>
                            @elseif ($datas->appointment_type == 2 )
                                <a href="{{ route('user.data.videoInvitaion') }}">Video Consultation</a>
                            @elseif ($datas->appointment_type == 3 )
                                <a href="{{ route('user.data.visaInvitaion') }}">Visa Invitation</a>
                            @endif
                        </li><i style="font-size:12px;padding-left:6px" class="fa-solid fa-chevron-right"></i>
                        <li class="breadcrumb-item active" aria-current="page">{{ $datas->order_id }}</li>

                    </ul>
                </nav> --}}
            </div><!--end col-->

            <div class="col-12 mt-4">
                <div class="rounded shadow overflow-hidden">
                    <div class="row">
                        <div class="col-5 m-auto">
                            <div class="text-center avatar-profile position-relative py-4 border-bottom">
                                <img src="{{ Avatar::create($datas->name) }}" class="rounded-circle shadow-md avatar avatar-md-md" alt="">
                                <h5 class="mt-3 mb-1">{{ $datas->name }}</h5>
                                <h5 class="text-muted mb-0 badge bg-soft-info">৳-{{ $datas->fee }}</h5>
                                <h5 class="text-muted mb-0 badge bg-soft-info"> Years old</h5>
                                <div class="confirm my-3">
                                    <button type="button" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#confirm">Confirm</button>
                                    <button type="button" class="btn btn-danger mb-1" data-bs-toggle="modal" data-bs-target="#cancel">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-6 my-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="list-unstyled p-4">
                                        <div class="progress-box">
                                            <h4>Patient</h4>
                                        </div><!--end process box-->
                                        <hr>
                                        <div class="d-flex align-items-center mt-2">
                                            <i class="fa-solid fa-cart-shopping text-primary h5 mb-0 me-2"></i>
                                            <h6 class="mb-0">OrderID</h6>
                                            <p class="text-muted mb-0 ms-2">{{ $datas->order_id }}</p>
                                        </div>

                                        <div class="d-flex align-items-center mt-2">
                                            <i class="fa-regular fa-calendar-check text-primary h5 mb-0 me-2"></i>
                                            <h6 class="mb-0">Appointment</h6>

                                            <p class="text-muted mb-0 ms-2">
                                                <span class="badge bg-{{ $data->order_status == 2?'danger':($data->order_status == 0?'info':'primary') }}">
                                                    {{ $data->order_status == 2?'Cancel':($data->order_status == 0?'Panding':$data->appointment_date->format('M-d-Y')) }}
                                                </span>
                                            </p>
                                        </div>

                                        <div class="d-flex align-items-center mt-2">
                                            <i class="fa-solid fa-money-check-dollar text-primary h5 mb-0 me-2"></i>
                                            <h6 class="mb-0">Visa</h6>
                                            <p class="text-muted mb-0 ms-2">{{ $datas->con_visa->name }}</p>
                                        </div>

                                        <div class="d-flex align-items-center mt-2">
                                            <i class="fa-solid fa-phone text-primary h5 mb-0 me-2"></i>
                                            <h6 class="mb-0">Embassy</h6>
                                            <p class="text-muted mb-0 ms-2">{{ $datas->con_embassy->name }}</p>
                                        </div>

                                        <div class="d-flex align-items-center mt-2">
                                            <i class="fa-solid fa-phone text-primary h5 mb-0 me-2"></i>
                                            <h6 class="mb-0">Number</h6>
                                            <p class="text-muted mb-0 ms-2">{{ $datas->number }}</p>
                                        </div>

                                        <div class="d-flex align-items-center mt-2">
                                            <i class="fa-regular fa-user text-primary h5 mb-0 me-2"></i>
                                            <h6 class="mb-0">Name</h6>
                                            <p class="text-muted mb-0 ms-2">{{ $datas->name }}</p>
                                        </div>
                                        {{-- @if ($datas->appointment_type == 2)

                                        @else --}}
                                        <div class="d-flex align-items-center mt-2">
                                            <i class="fa-solid fa-passport text-primary h5 mb-0 me-2"></i>
                                            <h6 class="mb-0">Passport-Number</h6>
                                            <p class="text-muted mb-0 ms-2">{{ $datas->number }}</p>
                                        </div>
                                        {{-- @endif --}}


                                        <div class="d-flex align-items-center mt-2">
                                            <i class="fa-solid fa-person-half-dress text-primary h5 mb-0 me-2"></i>
                                            <h6 class="mb-0">Gender</h6>
                                            {{-- <p class="text-muted mb-0 ms-2">{{ $datas->gender }}</p> --}}
                                        </div>

                                        <div class="d-flex align-items-center mt-2">
                                            <i class="fa-regular fa-calendar-days text-primary h5 mb-0 me-2"></i>
                                            <h6 class="mb-0">Request</h6>
                                            <p class="text-muted mb-0 ms-2"><span class="badge bg-soft-{{ ($date > $datas->expected_date->format('M d Y')? 'danger':'success') }}">{{ $datas->expected_date->format('M-d-Y') }}</span></p>
                                        </div>

                                        <div class="d-flex align-items-center mt-2 border p-2">
                                            <p class="text-muted mb-0 ms-2">{{ $datas->note }}</p>
                                        </div>
                                        {{-- @if (App\Models\AppoinmentReports::where('order_id',$datas->order_id)->get()->count() != 0)
                                        <div class="progress-box">
                                            <h5>Report</h5>
                                        </div>
                                        <div class="py-3">
                                            <div class="row">
                                                @foreach (App\Models\AppoinmentReports::where('order_id',$datas->order_id)->get() as $report)
                                                <div class="col-4">
                                                    <div class="team-person position-relative overflow-hidden">
                                                        <img style="width: 100%" src="{{ asset('uploads/report/'.$report->reports) }}" class="img-fluid" alt="">
                                                        <ul class="list-unstyled team-like">
                                                            <li><a href="#" class="btn btn-icon btn-pills btn-soft-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart icons"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        @else
                                        <div class="error">
                                            <h5>No Reports</h5>
                                        </div>
                                        @endif --}}

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 my-3">
                            <div class="card team border-0 rounded shadow overflow-hidden p-4">
                                <div class="row">
                                    <h5>Passport / Prescriptions</h5>
                                    <div class="col-3">
                                        <div class="team-person position-relative overflow-hidden">
                                            <img style="width: 100%" src="{{ asset('uploads/visa/'.$datas->passport) }}" class="img-fluid" alt="">
                                            <ul class="list-unstyled team-like">
                                                <li><a href="{{ public_path('uploads/visareport/'.$datas->passport) }}" class="btn btn-icon btn-pills btn-soft-danger download"><i class="fa-solid fa-arrow-down"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    @forelse ($visa as $report)
                                        <div class="col-3 p-2">
                                            <div class="team-person position-relative overflow-hidden">
                                                <img style="width: 100%" src="{{ asset('uploads/visareport/'.$report->reports) }}" class="img-fluid" alt="">
                                                <ul class="list-unstyled team-like">
                                                    <li><a href="{{ public_path('uploads/visareport/'.$report->reports) }}" class="btn btn-icon btn-pills btn-soft-danger download"><i class="fa-solid fa-arrow-down"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    @empty

                                    @endforelse

                                </div>
                            </div>

                            {{-- Doctor Information --}}
                            <div class="card team border-0 rounded shadow overflow-hidden">
                                <div class="row">

                                    <div class="col-md-5">
                                        <div class="team-person position-relative overflow-hidden">
                                            <img style="width: 100%" src="{{ asset('uploads/doctor/'.$doctor->profile) }}" class="img-fluid" alt="" >
                                            <ul class="list-unstyled team-like">
                                                <li><a href="{{ public_path('uploads/doctor/'.$doctor->profile) }}" class="btn btn-icon btn-pills btn-soft-danger download" ><i class="fa-solid fa-arrow-down"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <div class="card-body">
                                            <a href="#" class="title text-dark h5 d-block mb-0">{{ $doctor->name }}</a>
                                            <small class="text-muted speciality">{{ $doctor->con_department->department }}</small>
                                            <ul class="list-unstyled mt-2 mb-0">
                                                {{-- <li class="d-flex">
                                                    <i class="fa-solid fa-dollar-sign text-primary align-middle"></i>
                                                    <small class="text-muted ms-2">৳-{{ $doctor->fee }} </small>
                                                </li> --}}
                                                <li class="d-flex">
                                                    <i class="fa-solid fa-location-dot text-primary align-middle"></i>
                                                    <small class="text-muted ms-2">{{ $doctor->con_hospital->hospital }}, {{  $doctor->con_state->state }}, {{  $doctor->con_country->country }} </small>
                                                </li>
                                                <li class="d-flex mt-2">
                                                    <i class="fa-solid fa-user-doctor text-primary align-middle"></i>
                                                    <small class="text-muted ms-2">{{ $doctor->career_title }}</small>
                                                </li>
                                                <li class="d-flex mt-2">
                                                    <i class="fa-regular fa-clipboard text-primary align-middle"></i>
                                                    <small class="text-muted ms-2">{{ $doctor->speciality }}</small>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end row-->

    </div>
</div><!--end container-->
@endsection
@section('script')
    <script>
        $('.download').click(function(event){
            event.preventDefault();
        var photo = $(this).attr('href');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'GET',
            url:'{{ route('imageDownload') }}',
            data:{'photo':photo},
            success:function(data) {
                // $('#doctor_info').empty().append(data);
                console.log(data);
            }
        })
    });
    </script>
@endsection
