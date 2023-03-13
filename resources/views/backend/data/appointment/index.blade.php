@extends('backend.config.app')
@section('content')

@php
    $date = date('M d Y');
@endphp
<div class="container-fluid">
    <div class="layout-specing">
        <div class="row">
            <div class="col-xl-9 col-lg-6 col-md-4">
                <h5 class="mb-0">Appointment</h5>
                <nav aria-label="breadcrumb" class="d-inline-block mt-2">
                    <ul class="breadcrumb breadcrumb-muted bg-transparent rounded mb-0 p-0">
                        <li class="breadcrumb-item">Dashboard</li><i style="font-size:12px;padding-left:6px" class="fa-solid fa-chevron-right"></i>
                        <li class="breadcrumb-item active" aria-current="page">Appointment</li>
                    </ul>
                </nav>
            </div><!--end col-->

            <div class="col-xl-3 col-lg-6 col-md-8 mt-4 mt-md-0">
                <div class="justify-content-md-end">
                    <form>
                        <div class="row justify-content-between align-items-center">
                            <div class="col-sm-12 col-md-5">
                                <div class="mb-0 position-relative">
                                    <select class="form-select form-control">
                                        <option value="EY">Today</option>
                                        <option value="GY">Tomorrow</option>
                                        <option value="PS">Yesterday</option>
                                    </select>
                                </div>
                            </div><!--end col-->

                            <div class="col-sm-12 col-md-7 mt-4 mt-sm-0">
                                <div class="d-grid">
                                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#appointmentform">Appointment</a>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </form><!--end form-->
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            <div class="col-12 mt-4">
                <div class="table-responsive bg-white shadow rounded">
                    @if ($datas->count() == 0)
                        <div class="text-center">
                            <h5 class="p-3 mb-0 text-secondary">No Data Found !</h5>
                        </div>
                    @else
                        <table class="table mb-0 table-center">
                            <thead>
                                <tr>
                                    <th class="border-bottom p-3">#</th>
                                    <th class="border-bottom p-3">ID</th>
                                    <th class="border-bottom p-3" style="min-width: 100px;">Name</th>
                                    <th class="border-bottom p-3" style="min-width: 150px;">Number</th>
                                    <th class="border-bottom p-3">Department</th>
                                    <th class="border-bottom p-3" style="min-width: 150px;">Request</th>
                                    <th class="border-bottom p-3">Appointment</th>
                                    {{-- <th class="border-bottom p-3">Time</th> --}}
                                    <th class="border-bottom p-3" style="min-width: 220px;">Doctor</th>
                                    <th class="border-bottom p-3">Fees</th>
                                    <th class="border-bottom p-3"></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($datas as $key => $data)
                            <tr>
                                <th class="p-3">{{ $key+1 }}</th>
                                <td class="p-3">{{ $data->order_id }}</td>
                                <td class="p-3">{{ $data->passportname }}</td>
                                <td class="p-3">{{ $data->appointment_type == 2?$data->passportnumber:$data->number }}</td>
                                <td class="p-3">{{ $data->con_department->department }}</td>
                                <td class="p-3"><span class="badge bg-soft-{{ ($date > $data->appoinment_date->format('M d Y')? 'danger':'success') }}">{{ $data->appoinment_date->format('M d Y') }}</span></td>
                                <td class="p-3">
                                    <span class="badge bg-{{ $data->order_status != 0?'primary':($data->status == 2?'danger':'info') }}">
                                        {{ $data->order_status != 0?$data->activity->format('M-d-Y'):($data->status == 2?'Canceled':'panding') }}
                                    </span>
                                    {{-- <span class="badge bg-{{ $data->activity == null?($data->status == 2?'danger':'info'):'primary' }}">
                                    @if ($data->activity == null)
                                        @if ($data->status == 2)
                                            Cancel
                                        @else
                                            Waiting
                                        @endif
                                    @else
                                    {{ $data->activity->format('M-d-Y') }}
                                    @endif
                                    </span> --}}
                                </td>
                                <td class="p-3">
                                    <a href="#" class="text-dark">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('uploads/doctor/'.$data->con_doctor->profile) }}" class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                                            <span class="ms-2">{{ $data->con_doctor->name }}</span>
                                        </div>
                                    </a>
                                </td>
                                <td class="p-3">৳-{{ number_format($data->fee) }}</td>
                                <td class="text-end p-3">
                                    <a href="{{ route('appointment.watch',$data->id) }}" class="watch btn btn-icon btn-pills btn-soft-{{ $data->notifications == 0?'primary':'muted' }}"><i class="fa-regular fa-eye"></i></a>
                                    {{-- <a href="#" class="btn btn-icon btn-pills btn-soft-success" data-bs-toggle="modal" data-bs-target="#acceptappointment"><i class="fa-solid fa-check"></i></a>
                                    <a href="#" class="btn btn-icon btn-pills btn-soft-danger" data-bs-toggle="modal" data-bs-target="#cancelappointment"><i class="fa-solid fa-xmark"></i></a> --}}
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div><!--end row-->

        <div class="row text-center">
            <!-- PAGINATION START -->
            <div class="col-12 mt-4">
                <div class="d-md-flex align-items-center text-center justify-content-between">
                    {{ $datas->links('pagination::bootstrap-4') }}
                </div>
            </div><!--end col-->
            <!-- PAGINATION END -->
        </div><!--end row-->
    </div>
</div><!--end container-->
@endsection
