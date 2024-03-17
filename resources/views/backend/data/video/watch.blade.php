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

                <form action="{{ route('user.data.videoInvitaion.confirmation') }}" method="POST">
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

                <form action="{{ route('user.data.videoInvitaion.confirmation') }}" method="POST">
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
                <h5 class="mb-0">Video Consultation</h5>
                <nav aria-label="breadcrumb" class="d-inline-block mt-2">
                    <ul class="breadcrumb breadcrumb-muted bg-transparent rounded mb-0 p-0">
                        <li class="breadcrumb-item">Dashboard</li><i style="font-size:12px;padding-left:6px" class="fa-solid fa-chevron-right"></i>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('user.data.videoInvitaion') }}">Video Consultation</a>
                        </li><i style="font-size:12px;padding-left:6px" class="fa-solid fa-chevron-right"></i>
                        <li class="breadcrumb-item active" aria-current="page">{{ $datas->order_id }}</li>

                    </ul>
                </nav>
            </div><!--end col-->

            <div class="col-12 mt-4">
                <div class="rounded shadow overflow-hidden">
                    <div class="row">
                        <div class="col-5 m-auto">
                            <div class="text-center avatar-profile position-relative py-4 border-bottom">
                                <img src="{{ Avatar::create($datas->name) }}" class="rounded-circle shadow-md avatar avatar-md-md" alt="">
                                <h5 class="mt-3 mb-1">{{ $datas->name }}</h5>
                                <h5 class="text-muted mb-0 badge bg-soft-info">৳-{{ $datas->fee }}</h5>
                                <h5 class="text-muted mb-0 badge bg-soft-info">{{ $datas->age }} Years old</h5>
                                <div class="confirm my-3">
                                    @if (Auth::guard('admin_model')->user()->can('invoice_edit'))
                                    <button type="button" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#confirm">Confirm</button>
                                    @endif
                                    @if (Auth::guard('admin_model')->user()->can('invoice_delete'))
                                    <button type="button" class="btn btn-danger mb-1" data-bs-toggle="modal" data-bs-target="#cancel">Cancel</button>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-6 my-3">
                            <div class="card border-0 shadow">
                                <div class="card-header">
                                    <h4>Patient</h4>
                                </div>
                                <div class="card-body">
                                    <div class="list-unstyled">
                                        <div class="d-flex align-items-center mt-2">
                                            <i class="fa-solid fa-cart-shopping text-primary h5 mb-0 me-2"></i>
                                            <h6 class="mb-0">OrderID</h6>
                                            <p class="text-muted mb-0 ms-2">{{ $datas->order_id }}</p>
                                        </div>

                                        <div class="d-flex align-items-center mt-2">
                                            <i class="fa-regular fa-calendar-check text-primary h5 mb-0 me-2"></i>
                                            <h6 class="mb-0">Appointment</h6>
                                            <p class="text-muted mb-0 ms-2">
                                                <span class="badge bg-{{ $datas->order_status == 2?'danger':($datas->order_status == 0?'info':'primary') }}">
                                                    {{ $datas->order_status == 2?'Cancel':($datas->order_status == 0?'Panding':$datas->appointment_date->format('M-d-Y')) }}
                                                </span>
                                            </p>
                                        </div>

                                        <div class="d-flex align-items-center mt-2">
                                            <i class="fa-brands fa-whatsapp text-primary h5 mb-0 me-2"></i>
                                            <h6 class="mb-0">WhatsApp</h6>
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
                                            <h6 class="mb-0">Age</h6>
                                            <p class="text-muted mb-0 ms-2">{{ $datas->age }}</p>
                                        </div>
                                        {{-- @endif --}}


                                        <div class="d-flex align-items-center mt-2">
                                            <i class="fa-solid fa-person-half-dress text-primary h5 mb-0 me-2"></i>
                                            <h6 class="mb-0">Gender</h6>
                                            <p class="text-muted mb-0 ms-2">{{ $datas->gender }}</p>
                                        </div>

                                        <div class="d-flex align-items-center mt-2">
                                            <i class="fa-regular fa-calendar-days text-primary h5 mb-0 me-2"></i>
                                            <h6 class="mb-0">Request</h6>
                                            <p class="text-muted mb-0 ms-2"><span class="badge bg-soft-{{ ($date > $datas->expected_date->format('M d Y')? 'danger':'success') }}">{{ $datas->expected_date->format('M-d-Y') }}</span></p>
                                        </div>

                                        <div class="mt-4">
                                            <h4>Messages</h4>
                                            <p class="p-2 border rounded text-secondary">
                                                {{ $datas->note }}
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 my-3">
                            <div class="card team border-0 rounded shadow overflow-hidden">
                                <div class="card-header">
                                    <h5>Prescriptions {{$datas->order_id}}</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="team-person position-relative overflow-hidden">
                                                {{-- <img style="width: 100%" src="{{ asset('uploads/video/'.$datas->prescription) }}" class="img-fluid" alt=""> --}}
                                                <iframe src="{{ asset('uploads/video/' . $datas->prescription) }}" width="100%" height="230px;"></iframe>

                                                <ul class="list-unstyled team-like">
                                                    <li><a href="{{ asset('uploads/video/'.$datas->prescription) }}" class="btn btn-icon btn-pills btn-soft-danger download" download><i class="fa-solid fa-arrow-down"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Doctor Information --}}
                            <div class="card team border-0 rounded shadow overflow-hidden mt-4">
                                <div class="row">

                                    <div class="col-md-5">
                                        <div class="team-person position-relative overflow-hidden">
                                            <img style="width: 100%" src="{{ asset('uploads/doctor/'.$doctor->profile) }}" class="img-fluid" alt="" >
                                            <ul class="list-unstyled team-like">
                                                <li><a href="{{ asset('uploads/doctor/'.$doctor->profile) }}" class="btn btn-icon btn-pills btn-soft-danger download" download><i class="fa-solid fa-arrow-down"></i></a></li>
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

