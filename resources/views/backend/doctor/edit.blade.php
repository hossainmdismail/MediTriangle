@extends('backend.config.app')

@section('content')
<div class="container-fluid">
    <div class="layout-specing">
        <div class="row mb-3">
            <div class="d-md-flex justify-content-between">
                <h5 class="mb-0">Doctors</h5>

                <nav aria-label="breadcrumb" class="d-inline-block mt-4 mt-sm-0">
                    <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                        <li class="breadcrumb-item">Add Doctors</li><i style="font-size:12px;padding-left:6px" class="fa-solid fa-chevron-right"></i>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('doctor.manage') }}">Manage</a></li><i style="font-size:12px;padding-left:6px" class="fa-solid fa-chevron-right"></i>
                        <li class="breadcrumb-item active" aria-current="page">Update</li>
                    </ul>
                </nav>
            </div>
        </div><!--end row-->

        <div class="row">
            {{-- Website INfo --}}
            <div class="col-12 mb-3">
                <div class="card border-0 p-4 rounded shadow">
                    <form action="{{ route('doctor.update') }}" method="POST" class="mt-4" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            {{-- from database  --}}
                            <div class="col-12 text-center mb-3">
                                <h3>{{ $datas->name }}</h3>
                            </div>
                            {{-- Break --}}
                            <hr>
                            <input type="hidden" name="id" value="{{ $datas->id }}">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Doctor Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $datas->name }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Career Title</label>
                                    <input type="text" name="career_title" class="form-control @error('career_title') is-invalid @enderror" value="{{ $datas->career_title }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Fee</label>
                                    <input type="number" name="fee" class="form-control @error('fee') is-invalid @enderror" value="{{ $datas->fee }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Vat</label>
                                    <input type="number" name="vat" class="form-control @error('vat') is-invalid @enderror" value="{{ $datas->vat }}">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Speciality</label>
                                    <textarea type="text" rows="4" class="form-control @error('speciality') is-invalid @enderror" label="Speciality" name="speciality">{{ $datas->speciality }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <img src="{{ asset('uploads/doctor/'.$datas->profile) }}" style="width:100px; border-radius: 5%" alt="">
                                </div>
                                <x-Input type="file" label="Profile" name="profile" />
                            </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
