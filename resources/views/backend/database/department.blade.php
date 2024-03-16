@extends('backend.config.app')


@section('content')
{{-- Modals --}}
<div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-bottom p-3">
                <h5 class="modal-title" id="exampleModalLabel">Update Department</h5>
                <button type="button" class="btn btn-icon btn-close" data-bs-dismiss="modal" id="close-modal"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body p-3 pt-4">
                <form action="{{ route('d.department.update') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Department</label>
                                <input name="department" type="text" class="update form-control @error('country') is-invalid @enderror" value="">
                                <input name="id" type="hidden" class="update_id form-control @error('country') is-invalid @enderror" value="">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </form>
            </div>
        </div>
    </div>
</div>
{{-- Modals --}}
{{-- //Directions --}}
<div class="container-fluid">
    <div class="layout-specing">
        <div class="row">
            <div class="col-xl-9 col-lg-6 col-md-4">
                <h5 class="mb-0">Database</h5>
                <nav aria-label="breadcrumb" class="d-inline-block mt-2">
                    <ul class="breadcrumb breadcrumb-muted bg-transparent rounded mb-0 p-0">
                        <li class="breadcrumb-item">department</li><i style="font-size:12px;padding-left:6px" class="fa-solid fa-chevron-right"></i>
                        <li class="breadcrumb-item active" aria-current="page">Add department</li>
                    </ul>
                </nav>
            </div><!--end col-->

            <div class="col-xl-3 col-lg-6 col-md-8 mt-4 mt-md-0">
                <div class="justify-content-md-end">
                    <form>
                        <div class="row justify-content-end align-items-center">
                            <div class="col-sm-12 col-md-7 mt-4 mt-sm-0">
                                <div class="d-grid">
                                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#appointmentform">Add department</a>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </form><!--end form-->
                </div>
            </div><!--end col-->
        </div>
        {{-- Modals --}}
        <div class="modal fade" id="appointmentform" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-bottom p-3">
                        <h5 class="modal-title" id="exampleModalLabel">Department</h5>
                        <button type="button" class="btn btn-icon btn-close" data-bs-dismiss="modal" id="close-modal"><i class="fa-solid fa-xmark"></i></button>
                    </div>
                    <div class="modal-body p-3 pt-4">
                        <form action="{{ route('d.department.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Country <span class="text-danger">*</span></label>
                                        <select class="form-select form-control country @error('country_id') is-invalid @enderror" name="country_id">
                                            <option value="">-- Select Country --</option>
                                            @forelse (App\Models\CountryModel::all() as $country)
                                            <option value="{{ $country->id }}">{{ $country->country }}</option>
                                            @empty
                                            <option disabled>No Data Found !</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>

                               <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">state <span class="text-danger">*</span></label>
                                        <select class="form-select form-control state @error('state_id') is-invalid @enderror" id="state" name="state_id">
                                            <option value="">-- Select state --</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Hospital <span class="text-danger">*</span></label>
                                        <select class="form-select form-control @error('hospital_id') is-invalid @enderror" id="hospital" name="hospital_id">
                                            <option value="">-- Select Hospital --</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Speciality <span class="text-danger">*</span></label>
                                        <select class="form-select form-control @error('department') is-invalid @enderror" name="department">
                                            <option value="">-- Select Speciality --</option>
                                            @forelse (App\Models\SpecialityModel::all() as $sp)
                                            <option value="{{ $sp->speciality }}">{{ $sp->speciality }}</option>
                                            @empty
                                            <option disabled>No Data Found !</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- Modals --}}
<hr>
        <div class="row">
            {{-- Website INfo --}}
            <div class="col-md-12">
                <div class="table-responsive shadow rounded">
                    <table class="table table-center bg-white mb-0">
                        <thead>
                            <tr>
                                <th class="border-bottom p-3" style="min-width: 180px;">Country</td>
                                <th class="border-bottom p-3" style="min-width: 180px;">State</td>
                                <th class="border-bottom p-3" style="min-width: 180px;">Hospital</td>
                                <th class="border-bottom p-3" style="min-width: 180px;">Department</th>
                                <th class="border-bottom p-3">Status</th>
                                <th class="border-bottom p-3">Created</th>
                                @if (Auth::guard('admin_model')->user()->can('edit') || Auth::guard('admin_model')->user()->can('delete'))
                                    <th class="border-bottom p-3 text-center" style="min-width: 100px;">Action</th>
                                @else
                                    <th></th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                <tr>
                                    <td class="p-3">
                                        <span class="{{ $data->con_country == null ?'badge bg-soft-info':'' }}">{{ $data->con_country == null ?'Unknown':$data->con_country->country }}</span>
                                    </td>
                                    <td class="p-3">
                                        <span class="{{ $data->con_state == null ?'badge bg-soft-info':'' }}">{{ $data->con_state == null ?'Unknown':$data->con_state->state }}</span>
                                    </td>
                                    <td class="p-3">{{ $data->con_hospital->hospital }}</td>
                                    <th class="p-3">{{ $data->department }}</th>
                                    <td class="p-3">

                                    </td>
                                    <td class="p-3"><span class="badge bg-soft-{{ $data->status == 0?'danger':'success' }}">{{ $data->status == 0 ?'Deactive':'active' }}</span></td>
                                    <td class="text-end p-3">
                                        @if (Auth::guard('admin_model')->user()->can('edit'))

                                        <a href="{{ $data->department }}" data-value="{{ $data->id }}" class="update_value btn btn-icon btn-pills btn-soft-success" data-bs-toggle="modal" data-bs-target="#update"><i class="fa-solid fa-pen-to-square"></i></a>
                                        @endif
                                        @if (Auth::guard('admin_model')->user()->can('delete'))

                                        <a href="{{ route('department.delete',$data->id) }}" data-bs-toggle="modal" data-bs-target="#LoginForm" class="delete_value btn btn-icon btn-pills btn-soft-danger"><i class="fa-solid fa-trash"></i></a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>


    <hr class="mt-5">



    {{-- Add Speciality --}}
    <div class="row">
        <div class="col-xl-9 col-lg-6 col-md-4">

        </div><!--end col-->

        <div class="col-xl-3 col-lg-6 col-md-8 mt-4 mt-md-0">
            <div class="justify-content-md-end">
                <form>
                    <div class="row justify-content-end align-items-center">
                        <div class="col-sm-12 col-md-7 mt-4 mt-sm-0">
                            <div class="d-grid">
                                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#speciality">Add Speciality</a>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </form><!--end form-->
            </div>
        </div><!--end col-->
    </div>
    {{-- Model speciality --}}
    <div class="modal fade" id="speciality" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-bottom p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Speciality</h5>
                    <button type="button" class="btn btn-icon btn-close" data-bs-dismiss="modal" id="close-modal"><i class="fa-solid fa-xmark"></i></button>
                </div>
                <div class="modal-body p-3 pt-4">
                    <form action="{{ route('d.speciality.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <x-Input type="text" label="Speciality Name" name="speciality"  placeholder="Cardio "/>
                            </div>

                            <div class="col-lg-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        {{-- Website INfo --}}
        <div class="col-md-12">
            <div class="table-responsive shadow rounded">
                <table class="table table-center bg-white mb-0">
                    <thead>
                        <tr>
                            <th class="border-bottom p-3" style="min-width: 180px;">Speciality</th>
                            <th class="border-bottom p-3">Status</th>
                            @if (Auth::guard('admin_model')->user()->can('delete'))
                            <th class="border-bottom p-3 text-end" style="min-width: 100px;">Action</th>
                            @else
                            <th></th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($sps as $sp)
                            <tr>
                                <th class="p-3">{{ $sp->speciality }}</th>
                                <td class="p-3"><span class="badge bg-soft-{{ $sp->status == 0?'danger':'success' }}">{{ $sp->status == 0 ?'Deactive':'active' }}</span></td>
                                <td class="text-end p-3">
                                    @if (Auth::guard('admin_model')->user()->can('delete'))

                                    <a href="{{ route('d.speciality.delete',$sp->id) }}" data-bs-toggle="modal" data-bs-target="#LoginForm" class="delete_value btn btn-icon btn-pills btn-soft-danger"><i class="fa-solid fa-trash"></i></a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>



    </div>
</div>
@endsection
@section('script')


<script>
    // update
    $(document).ready(function(){
        $(".btn").click(function(){
            var val = $(this).attr('href');
            $('#delete_confirm').attr('href', val);
        });
        $(".update_value").click(function(){
            var upid = $(this).attr('data-value');
            var upval = $(this).attr('href');
            $('.update').val(upval);
            $('.update_id').val(upid);
        });
    });

    // Country
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
                console.log(data);
                $('#hospital').html(data);
            }
        })
    });



</script>
@endsection
