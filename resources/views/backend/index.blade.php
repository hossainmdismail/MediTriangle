@extends('backend.config.app')

@section('content')
<div class="container-fluid">
    <div class="layout-specing">
        <h5 class="mb-0">Dashboard</h5>

        <div class="row">
            <div class="col-xl-2 col-lg-4 col-md-4 mt-4">
                <div class="card features feature-primary rounded border-0 shadow p-4">
                    <div class="d-flex align-items-center">
                        <div class="icon text-center rounded-md">
                            <i class="fa-solid fa-bed"></i>
                        </div>
                        <div class="flex-1 ms-2">
                            <h5 class="mb-0">{{ $patient }}</h5>
                            <p class="text-muted mb-0">Patients</p>
                        </div>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-xl-2 col-lg-4 col-md-4 mt-4">
                <div class="card features feature-primary rounded border-0 shadow p-4">
                    <div class="d-flex align-items-center">
                        <div class="icon text-center rounded-md">
                            <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                        </div>
                        <div class="flex-1 ms-2">
                            <h5 class="mb-0">{{ number_format($totalEarn) }}</h5>
                            <p class="text-muted mb-0">Total Earn</p>
                        </div>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-xl-2 col-lg-4 col-md-4 mt-4">
                <div class="card features feature-primary rounded border-0 shadow p-4">
                    <div class="d-flex align-items-center">
                        <div class="icon text-center rounded-md">
                            <i class="fa-solid fa-user-group"></i>
                        </div>
                        <div class="flex-1 ms-2">
                            <h5 class="mb-0">{{ $user }}</h5>
                            <p class="text-muted mb-0">Users</p>
                        </div>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-xl-2 col-lg-4 col-md-4 mt-4">
                <div class="card features feature-primary rounded border-0 shadow p-4">
                    <div class="d-flex align-items-center">
                        <div class="icon text-center rounded-md">
                            <i class="uil uil-ambulance h3 mb-0"></i>
                        </div>
                        <div class="flex-1 ms-2">
                            <h5 class="mb-0">16</h5>
                            <p class="text-muted mb-0">Vehicles</p>
                        </div>
                    </div>

                </div>
            </div><!--end col-->

            <div class="col-xl-2 col-lg-4 col-md-4 mt-4">
                <div class="card features feature-primary rounded border-0 shadow p-4">
                    <div class="d-flex align-items-center">
                        <div class="icon text-center rounded-md">
                            <i class="fa-regular fa-calendar-check"></i>
                        </div>
                        <div class="flex-1 ms-2">
                            <h5 class="mb-0">{{ $totalAppointment }}</h5>
                            <p class="text-muted mb-0">Appointment</p>
                        </div>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-xl-2 col-lg-4 col-md-4 mt-4">
                <div class="card features feature-primary rounded border-0 shadow p-4">
                    <div class="d-flex align-items-center">
                        <div class="icon text-center rounded-md">
                            <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                        </div>
                        <div class="flex-1 ms-2">
                            <h5 class="mb-0" id="balancesSMS">....</h5>
                            <p class="text-muted mb-0">Balance</p>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            <div class="col-xl-8 col-lg-7 mt-4">
                <div class="card shadow border-0 p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="align-items-center mb-0">Patients visit by Gender</h6>

                        <div class="mb-0 position-relative">
                            <select class="form-select form-control" id="yearchart">
                                <option selected>2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                            </select>
                        </div>
                    </div>
                    <div id="dashboard" class="apex-chart"></div>
                </div>
            </div><!--end col-->

            <div class="col-xl-4 col-lg-5 mt-4">
                <div class="card shadow border-0 p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="align-items-center mb-0">Patients by Department</h6>

                        <div class="mb-0 position-relative">
                            <select class="form-select form-control" id="dailychart">
                                <option selected>Today</option>
                                <option value="2019">Yesterday</option>
                            </select>
                        </div>
                    </div>
                    <div id="department"></div>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            <div class="col-xl-4 col-lg-6 mt-4">
                <div class="card border-0 shadow rounded">
                    <div class="d-flex justify-content-between align-items-center p-4 border-bottom">
                        <h6 class="mb-0"><i class="uil uil-calender text-primary me-1 h5"></i> Latest Appointment</h6>
                        <h6 class="text-muted mb-0">55 Patients</h6>
                    </div>

                    <ul class="list-unstyled mb-0 p-4">
                        <li>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-inline-flex">
                                    <img src="../assets/images/client/01.jpg" class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                                    <div class="ms-3">
                                        <h6 class="text-dark mb-0 d-block">Calvin Carlo</h6>
                                        <small class="text-muted">Booking on 27th Nov, 2020</small>
                                    </div>
                                </div>
                                <div>
                                    <a href="#" class="btn btn-icon btn-pills btn-soft-success"><i class="uil uil-check"></i></a>
                                    <a href="#" class="btn btn-icon btn-pills btn-soft-danger"><i class="uil uil-times"></i></a>
                                </div>
                            </div>
                        </li>

                        <li class="mt-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-inline-flex">
                                    <img src="../assets/images/client/02.jpg" class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                                    <div class="ms-3">
                                        <h6 class="text-dark mb-0 d-block">Joya Khan</h6>
                                        <small class="text-muted">Booking on 27th Nov, 2020</small>
                                    </div>
                                </div>
                                <div>
                                    <a href="#" class="btn btn-icon btn-pills btn-soft-success"><i class="uil uil-check"></i></a>
                                    <a href="#" class="btn btn-icon btn-pills btn-soft-danger"><i class="uil uil-times"></i></a>
                                </div>
                            </div>
                        </li>

                        <li class="mt-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-inline-flex">
                                    <img src="../assets/images/client/03.jpg" class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                                    <div class="ms-3">
                                        <h6 class="text-dark mb-0 d-block">Amelia Muli</h6>
                                        <small class="text-muted">Booking on 27th Nov, 2020</small>
                                    </div>
                                </div>
                                <div>
                                    <a href="#" class="btn btn-icon btn-pills btn-soft-success"><i class="uil uil-check"></i></a>
                                    <a href="#" class="btn btn-icon btn-pills btn-soft-danger"><i class="uil uil-times"></i></a>
                                </div>
                            </div>
                        </li>

                        <li class="mt-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-inline-flex">
                                    <img src="../assets/images/client/04.jpg" class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                                    <div class="ms-3">
                                        <h6 class="text-dark mb-0 d-block">Nik Ronaldo</h6>
                                        <small class="text-muted">Booking on 27th Nov, 2020</small>
                                    </div>
                                </div>
                                <div>
                                    <a href="#" class="btn btn-icon btn-pills btn-soft-success"><i class="uil uil-check"></i></a>
                                    <a href="#" class="btn btn-icon btn-pills btn-soft-danger"><i class="uil uil-times"></i></a>
                                </div>
                            </div>
                        </li>

                        <li class="mt-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-inline-flex">
                                    <img src="../assets/images/client/05.jpg" class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                                    <div class="ms-3">
                                        <h6 class="text-dark mb-0 d-block">Crista Joseph</h6>
                                        <small class="text-muted">Booking on 27th Nov, 2020</small>
                                    </div>
                                </div>
                                <div>
                                    <a href="#" class="btn btn-icon btn-pills btn-soft-success"><i class="uil uil-check"></i></a>
                                    <a href="#" class="btn btn-icon btn-pills btn-soft-danger"><i class="uil uil-times"></i></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div><!--end col-->

            <div class="col-xl-4 col-lg-6 mt-4">
                <div class="card chat chat-person border-0 shadow rounded">
                    <div class="d-flex justify-content-between border-bottom p-4">
                        <div class="d-flex">
                            <img src="../assets/images/doctors/02.jpg" class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                            <div class="flex-1 overflow-hidden ms-3">
                                <a href="#" class="text-dark mb-0 h6 d-block text-truncate">Cristino Murphy</a>
                                <small class="text-muted"><i class="mdi mdi-checkbox-blank-circle text-success on-off align-text-bottom"></i> Online</small>
                            </div>
                        </div>

                        <ul class="list-unstyled mb-0">
                            <li class="dropdown dropdown-primary list-inline-item">
                                <button type="button" class="btn btn-icon btn-pills btn-soft-primary dropdown-toggle p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="uil uil-ellipsis-h"></i></button>
                                <div class="dropdown-menu dd-menu dropdown-menu-end shadow border-0 mt-3 py-3">
                                    <a class="dropdown-item text-dark" href="#"><span class="mb-0 d-inline-block me-1"><i class="uil uil-user align-middle h6"></i></span> Profile</a>
                                    <a class="dropdown-item text-dark" href="#"><span class="mb-0 d-inline-block me-1"><i class="uil uil-setting align-middle h6"></i></span> Profile Settings</a>
                                    <a class="dropdown-item text-dark" href="#"><span class="mb-0 d-inline-block me-1"><i class="uil uil-trash align-middle h6"></i></span> Delete</a>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <ul class="p-4 list-unstyled mb-0 chat" data-simplebar style="background: url('../assets/images/bg/bg-chat.png') center center; max-height: 295px;">
                        <li>
                            <div class="d-inline-block">
                                <div class="d-flex chat-type mb-3">
                                    <div class="position-relative">
                                        <img src="../assets/images/doctors/02.jpg" class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                                        <i class="mdi mdi-checkbox-blank-circle text-success on-off align-text-bottom"></i>
                                    </div>

                                    <div class="flex-1 chat-msg" style="max-width: 500px;">
                                        <p class="text-muted small shadow px-3 py-2 bg-light rounded mb-1">Hey Christopher</p>
                                        <small class="text-muted msg-time"><i class="uil uil-clock-nine me-1"></i>59 min ago</small>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="chat-right">
                            <div class="d-inline-block">
                                <div class="d-flex chat-type mb-3">
                                    <div class="position-relative chat-user-image">
                                        <img src="../assets/images/client/09.jpg" class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                                        <i class="mdi mdi-checkbox-blank-circle text-success on-off align-text-bottom"></i>
                                    </div>

                                    <div class="flex-1 chat-msg" style="max-width: 500px;">
                                        <p class="text-muted small shadow px-3 py-2 bg-light rounded mb-1">Hello Cristino</p>
                                        <small class="text-muted msg-time"><i class="uil uil-clock-nine me-1"></i>45 min ago</small>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="chat-right">
                            <div class="d-inline-block">
                                <div class="d-flex chat-type mb-3">
                                    <div class="position-relative chat-user-image">
                                        <img src="../assets/images/client/09.jpg" class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                                        <i class="mdi mdi-checkbox-blank-circle text-success on-off align-text-bottom"></i>
                                    </div>

                                    <div class="flex-1 chat-msg" style="max-width: 500px;">
                                        <p class="text-muted small shadow px-3 py-2 bg-light rounded mb-1">How can i help you?</p>
                                        <small class="text-muted msg-time"><i class="uil uil-clock-nine me-1"></i>44 min ago</small>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="d-inline-block">
                                <div class="d-flex chat-type mb-3">
                                    <div class="position-relative">
                                        <img src="../assets/images/doctors/02.jpg" class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                                        <i class="mdi mdi-checkbox-blank-circle text-success on-off align-text-bottom"></i>
                                    </div>

                                    <div class="flex-1 chat-msg" style="max-width: 500px;">
                                        <p class="text-muted small shadow px-3 py-2 bg-light rounded mb-1">Nice to meet you</p>
                                        <small class="text-muted msg-time"><i class="uil uil-clock-nine me-1"></i>42 min ago</small>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="d-inline-block">
                                <div class="d-flex chat-type mb-3">
                                    <div class="position-relative">
                                        <img src="../assets/images/doctors/02.jpg" class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                                        <i class="mdi mdi-checkbox-blank-circle text-success on-off align-text-bottom"></i>
                                    </div>

                                    <div class="flex-1 chat-msg" style="max-width: 500px;">
                                        <p class="text-muted small shadow px-3 py-2 bg-light rounded mb-1">Hope you are doing fine?</p>
                                        <small class="text-muted msg-time"><i class="uil uil-clock-nine me-1"></i>40 min ago</small>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="chat-right">
                            <div class="d-inline-block">
                                <div class="d-flex chat-type mb-3">
                                    <div class="position-relative chat-user-image">
                                        <img src="../assets/images/client/09.jpg" class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                                        <i class="mdi mdi-checkbox-blank-circle text-success on-off align-text-bottom"></i>
                                    </div>

                                    <div class="flex-1 chat-msg" style="max-width: 500px;">
                                        <p class="text-muted small shadow px-3 py-2 bg-light rounded mb-1">I'm good thanks for asking</p>
                                        <small class="text-muted msg-time"><i class="uil uil-clock-nine me-1"></i>45 min ago</small>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="d-inline-block">
                                <div class="d-flex chat-type mb-3">
                                    <div class="position-relative">
                                        <img src="../assets/images/doctors/02.jpg" class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                                        <i class="mdi mdi-checkbox-blank-circle text-success on-off align-text-bottom"></i>
                                    </div>

                                    <div class="flex-1 chat-msg" style="max-width: 500px;">
                                        <p class="text-muted small shadow px-3 py-2 bg-light rounded mb-1">I am intrested to know more about your prices and services you offer</p>
                                        <small class="text-muted msg-time"><i class="uil uil-clock-nine me-1"></i>35 min ago</small>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="chat-right">
                            <div class="d-inline-block">
                                <div class="d-flex chat-type mb-3">
                                    <div class="position-relative chat-user-image">
                                        <img src="../assets/images/client/09.jpg" class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                                        <i class="mdi mdi-checkbox-blank-circle text-success on-off align-text-bottom"></i>
                                    </div>

                                    <div class="flex-1 chat-msg" style="max-width: 500px;">
                                        <p class="text-muted small shadow px-3 py-2 bg-light rounded mb-1">Sure please check below link to find more useful information <a href="https://1.envato.market/doctris-template" target="_blank" class="text-primary">https://shreethemes.in/Doctris/</a></p>
                                        <small class="text-muted msg-time"><i class="uil uil-clock-nine me-1"></i>25 min ago</small>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="d-inline-block">
                                <div class="d-flex chat-type mb-3">
                                    <div class="position-relative">
                                        <img src="../assets/images/doctors/02.jpg" class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                                        <i class="mdi mdi-checkbox-blank-circle text-success on-off align-text-bottom"></i>
                                    </div>

                                    <div class="flex-1 chat-msg" style="max-width: 500px;">
                                        <p class="text-muted small shadow px-3 py-2 bg-light rounded mb-1">Thank you 😊</p>
                                        <small class="text-muted msg-time"><i class="uil uil-clock-nine me-1"></i>20 min ago</small>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="chat-right">
                            <div class="d-inline-block">
                                <div class="d-flex chat-type mb-3">
                                    <div class="position-relative chat-user-image">
                                        <img src="../assets/images/client/09.jpg" class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                                        <i class="mdi mdi-checkbox-blank-circle text-success on-off align-text-bottom"></i>
                                    </div>

                                    <div class="flex-1 chat-msg" style="max-width: 500px;">
                                        <p class="text-muted small shadow px-3 py-2 bg-light rounded mb-1">Welcome</p>
                                        <small class="text-muted msg-time"><i class="uil uil-clock-nine me-1"></i>18 min ago</small>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <div class="p-2 rounded-bottom shadow">
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control border" placeholder="Enter Message...">
                            </div>
                            <div class="col-auto">
                                <a href="#" class="btn btn-icon btn-primary"><i class="uil uil-message"></i></a>
                                <a href="#" class="btn btn-icon btn-primary"><i class="uil uil-smile"></i></a>
                                <a href="#" class="btn btn-icon btn-primary"><i class="uil uil-paperclip"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-xl-4 col-lg-12 mt-4">
                <div class="card border-0 shadow rounded">
                    <div class="p-4 border-bottom">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-0"><i class="uil uil-user text-primary me-1 h5"></i> Patients Reviews</h6>

                            <div class="mb-0 position-relative">
                                <select class="form-select form-control" id="dailypatient">
                                    <option selected>New</option>
                                    <option value="2019">Old</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <ul class="list-unstyled mb-0 p-4" data-simplebar style="height: 355px;">
                        <li class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <img src="../assets/images/doctors/01.jpg" class="avatar avatar-small rounded-circle border shadow" alt="">
                                <div class="flex-1 ms-3">
                                    <span class="d-block h6 mb-0">Dr. Calvin Carlo</span>
                                    <small class="text-muted">Orthopedic</small>

                                    <ul class="list-unstyled mb-0">
                                        <li class="list-inline-item text-muted">(45)</li>
                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    </ul>
                                </div>
                            </div>

                            <p class="text-muted mb-0">150 Patients</p>
                        </li>

                        <li class="d-flex align-items-center justify-content-between mt-4">
                            <div class="d-flex align-items-center">
                                <img src="../assets/images/doctors/02.jpg" class="avatar avatar-small rounded-circle border shadow" alt="">
                                <div class="flex-1 ms-3">
                                    <span class="d-block h6 mb-0">Dr. Cristino Murphy</span>
                                    <small class="text-muted">Gynecology</small>

                                    <ul class="list-unstyled mb-0">
                                        <li class="list-inline-item text-muted">(75)</li>
                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    </ul>
                                </div>
                            </div>

                            <p class="text-muted mb-0">350 Patients</p>
                        </li>

                        <li class="d-flex align-items-center justify-content-between mt-4">
                            <div class="d-flex align-items-center">
                                <img src="../assets/images/doctors/03.jpg" class="avatar avatar-small rounded-circle border shadow" alt="">
                                <div class="flex-1 ms-3">
                                    <span class="d-block h6 mb-0">Dr. Alia Reddy</span>
                                    <small class="text-muted">Psychotherapy</small>

                                    <ul class="list-unstyled mb-0">
                                        <li class="list-inline-item text-muted">(48)</li>
                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    </ul>
                                </div>
                            </div>

                            <p class="text-muted mb-0">450 Patients</p>
                        </li>

                        <li class="d-flex align-items-center justify-content-between mt-4">
                            <div class="d-flex align-items-center">
                                <img src="../assets/images/doctors/04.jpg" class="avatar avatar-small rounded-circle border shadow" alt="">
                                <div class="flex-1 ms-3">
                                    <span class="d-block h6 mb-0">Dr. Toni Kover</span>
                                    <small class="text-muted">Dentist</small>

                                    <ul class="list-unstyled mb-0">
                                        <li class="list-inline-item text-muted">(68)</li>
                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    </ul>
                                </div>
                            </div>

                            <p class="text-muted mb-0">484 Patients</p>
                        </li>

                        <li class="d-flex align-items-center justify-content-between mt-4">
                            <div class="d-flex align-items-center">
                                <img src="../assets/images/doctors/05.jpg" class="avatar avatar-small rounded-circle border shadow" alt="">
                                <div class="flex-1 ms-3">
                                    <span class="d-block h6 mb-0">Dr. Jennifer Ballance</span>
                                    <small class="text-muted">Cardiology</small>

                                    <ul class="list-unstyled mb-0">
                                        <li class="list-inline-item text-muted">(55)</li>
                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    </ul>
                                </div>
                            </div>

                            <p class="text-muted mb-0">476 Patients</p>
                        </li>
                    </ul>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div>
</div>
@endsection

@section('script')
<script>
    const options = {
        method: 'GET',
        headers: {
            'X-RapidAPI-Key': '5Ga7wUBj70JdpiqVhe8t',
            'X-RapidAPI-Host': 'contextualwebsearch-websearch-v1.p.rapidapi.com',
        },
    };
    let dis = document.getElementById('balancesSMS');
    fetch(
        'http://bulksmsbd.net/api/getBalanceApi?api_key=5Ga7wUBj70JdpiqVhe8t',
        options
    )
        .then(response => response.json())
        .then(response => dis.innerText= response.balance)
        .catch(err => console.error(err));
</script>
<script>
    try {
    var options1 = {
        series: [{
            name: 'Male',
            data: [300, 250]
        }, {
            name: 'Female',
            data: [256, 480]
        }, {
            name: 'Children',
            data: [480, 223]
        }],
        chart: {
            type: 'bar',
            height: 350,
            toolbar: {
                show: false,
            },
        },
        grid: {
            borderColor: '#e9ecef',
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '40%',
                endingShape: 'rounded'
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        colors: ['#396cf0', '#53c797', '#f1b561'],
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        },
        yaxis: {
            title: {
                text: 'Patients',

                style: {
                    colors: ['#8492a6'],
                    fontSize: '13px',
                    fontFamily: 'Inter, sans-serif',
                    fontWeight: 500,
                },
            },
        },
        fill: {
            opacity: 1,
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return val + " Patients"
                }
            }
        }
    };

    var chart1 = new ApexCharts(document.querySelector("#dashboard"), options1);
    chart1.render();
} catch (error) {

}
</script>

@endsection
