@extends('backend.config.app')


@section('content')
{{-- //Directions --}}

<div class="container-fluid">
    <div class="layout-specing">
        <div class="row mb-3">
            <div class="d-md-flex justify-content-between">
                <h5 class="mb-0">Doctors</h5>

                <nav aria-label="breadcrumb" class="d-inline-block mt-4 mt-sm-0">
                    <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                        <li class="breadcrumb-item">Add Doctors</li><i style="font-size:12px;padding-left:6px" class="fa-solid fa-chevron-right"></i>
                        {{-- <li class="breadcrumb-item active" aria-current="page"></li> --}}
                    </ul>
                </nav>
            </div>
        </div><!--end row-->

        @if (Auth::guard('admin_model')->user()->can('database'))
        <div class="row mb-3">
            <!-- Modal Start -->
            <div class="col-12 mt-2">
                <div class="card rounded shadow">
                    <div class="p-2">
                        <a href="{{ route('d.country') }}" class="btn btn-secondary m-1"> Add Country</a>
                        <a href="{{ route('d.state') }}" class="btn btn-secondary m-1"> Add State</a>
                        <a href="{{ route('d.hospital') }}" class="btn btn-secondary m-1">Add Hospital</a>
                        <a href="{{ route('d.department') }}" class="btn btn-secondary m-1">Add Department</a>

                    </div>
                    <!-- Wishlist Popup End -->
                </div>
            </div><!--end col-->
            <!-- Modal End -->
        </div>
        @endif


        <div class="row">
            {{-- Website INfo --}}
            <div class="col-12 mb-3">
                <div class="card border-0 p-4 rounded shadow">
                    <form action="{{ route('doctor.store') }}" method="POST" class="mt-4" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            {{-- from database  --}}
                            {{-- Country --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Country <span class="text-danger">*</span></label>
                                    <select class="form-select form-control country @error('country_id') is-invalid @enderror" name="country_id">
                                        <option value="">-- Select Country--</option>
                                        @forelse (App\Models\CountryModel::where('status',1)->get() as $country)
                                        <option value="{{ $country->id }}">{{ $country->country }}</option>
                                        @empty
                                        <option disabled>No Data Found !</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            {{-- State --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">State <span class="text-danger">*</span></label>
                                    <select class="form-select form-control state @error('state_id') is-invalid @enderror" id="state" name="state_id">
                                        <option value="">-- --- --</option>
                                    </select>
                                </div>
                            </div>
                            {{-- Hospital --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Hospital <span class="text-danger">*</span></label>
                                    <select class="form-select form-control hospital @error('hospital_id') is-invalid @enderror" id="hospital" name="hospital_id">
                                        <option value="">-- --- --</option>
                                    </select>
                                </div>
                            </div>
                            {{-- Department --}}
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Department <span class="text-danger">*</span></label>
                                    <select class="form-select form-control @error('department_id') is-invalid @enderror" id="departmentVal" name="department_id">
                                        <option value="">-- --- --</option>
                                    </select>
                                </div>
                            </div>

                            {{-- Break --}}
                            <hr>

                            <div class="col-md-6">
                                <x-Input type="text" label="Doctor Name" name="name"  placeholder="Doctor"/>
                            </div>

                            <div class="col-md-6">
                                <x-Input type="text" label="Career Title" name="career_title"  placeholder="MBBs"/>
                            </div>

                            <div class="col-md-6">
                                <x-Input type="number" label="Fee" name="fee" placeholder="Tk."/>
                            </div>

                            <div class="col-md-6">
                                <x-Input type="number" label="Vat" name="vat" placeholder="0%" />
                            </div>

                            <div class="col-md-6">
                                <x-Input type="file" label="Profile" name="profile" />
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Speciality</label>
                                    <textarea type="text" class="form-control @error('speciality') is-invalid @enderror" label="Speciality" name="speciality"  placeholder="Bio"></textarea>
                                </div>
                            </div>
                        <button type="submit" class="btn btn-primary">Add</button>
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
    $('.country').change(function(){
        var country = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'POST',
            url:'{{ route('d.hospital.ajax') }}',
            data:{'country_id':country},
            success:function(data) {
                $('#state').html(data);
            }
        })
    });
    // State
    $('.state').change(function(){
        var state = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'POST',
            url:'{{ route('d.department.ajax') }}',
            data:{'state_id':state},
            success:function(data) {
                $('#hospital').html(data);
            }
        })
    });
    // Hospital
    $('.hospital').change(function(){
        var hospital = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'POST',
            url:'{{ route('d.doctor.ajax') }}',
            data:{'hospital_id':hospital},
            success:function(data) {
                console.log(data);
                $('#departmentVal').html(data);
            }
        })
    });
</script>
@endsection
