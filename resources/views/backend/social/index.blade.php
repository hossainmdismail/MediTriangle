@extends('backend.config.app')
@section('content')
    {{-- Modals --}}
    <div class="modal fade" id="appointmentform" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-bottom p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Update Social</h5>
                    <button type="button" class="btn btn-icon btn-close" data-bs-dismiss="modal" id="close-modal"><i class="fa-solid fa-xmark"></i></button>
                </div>
                <div class="modal-body p-3 pt-4">
                    <form action="{{ route('social.edit') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Link</label>
                                    <input name="link" type="text" class="update form-control @error('country') is-invalid @enderror" value="">
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
        <div class="row mb-3">
            <div class="d-md-flex justify-content-between">
                <h5 class="mb-0">Social</h5>

                <nav aria-label="breadcrumb" class="d-inline-block mt-4 mt-sm-0">
                    <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('d.service') }}">Dashboard</a></li><i style="font-size:12px;padding-left:6px" class="fa-solid fa-chevron-right"></i>
                        <li class="breadcrumb-item active" aria-current="page">Owner</li><i style="font-size:12px;padding-left:6px" class="fa-solid fa-chevron-right"></i>
                        <li class="breadcrumb-item active" aria-current="page">Social</li>
                    </ul>
                </nav>
            </div>
        </div><!--end row-->

        <div class="row">
            {{-- Website INfo --}}
            <div class="col-md-5 mb-3">
                <div class="card border-0 p-4 rounded shadow">
                    <form action="{{ route('d.social.store') }}" method="POST" class="mt-4">
                        @csrf
                        <div class="row">
                            <div class="col-12 icon-div mb-3">
                                <i class="fa-brands fa-facebook-f icon"></i>
                                <i class="fa-brands fa-twitter icon"></i>
                                <i class="fa-brands fa-linkedin-in icon"></i>
                                <i class="fa-brands fa-whatsapp icon"></i>
                                <i class="fa-brands fa-instagram icon"></i>
                                <i class="fa-solid fa-envelope icon"></i>
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text bg-light border border-end-0 text-dark" id="insta-id">Icon</span>
                                    <input name="icon" id="icons" type="text" class="form-control" aria-label="Username" aria-describedby="insta-id" readonly>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text bg-light border border-end-0 text-dark" id="insta-id">Link</span>
                                    <input name="link" id="links" type="text" class="form-control" aria-label="Username" aria-describedby="insta-id">
                                </div>
                            </div>

                        <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- List --}}
            <div class="col-md-7">
                <div class="table-responsive shadow rounded">
                    @if ($datas->count() != 0 )
                        <table class="table table-center bg-white mb-0">
                            <thead>
                                <tr>
                                    <th class="border-bottom p-3" style="min-width: 50px;">Id</th>
                                    <th class="border-bottom p-3" style="min-width: 180px;">Icon</th>
                                    <th class="border-bottom p-3">Link</th>
                                    <th class="border-bottom p-3">Status</th>
                                    @if (Auth::guard('admin_model')->user()->can('edit') || Auth::guard('admin_model')->user()->can('delete'))
                                    <th class="border-bottom p-3 text-center" style="min-width: 100px;">Action</th>
                                    @else
                                    <th></th>
                                    @endif

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $key => $data)
                                <tr>
                                    <th class="p-3">{{ $key+1 }}</th>
                                    <td class="p-3"><i class="{{ $data->icon }}"></i></td>
                                    <td class="p-3">{{ $data->link }}</td>
                                    <td class="p-3"><span class="badge bg-soft-{{ $data->status == 0?'danger':'success' }}">{{ $data->status == 0 ?'Deactive':'active' }}</span></td>
                                    <td class="text-end p-3">
                                        @if (Auth::guard('admin_model')->user()->can('edit'))
                                        <a href="{{ $data->link }}" data-value="{{ $data->id }}" class="update_value btn btn-icon btn-pills btn-soft-success" data-bs-toggle="modal" data-bs-target="#appointmentform"><i class="fa-solid fa-pen-to-square"></i></a>
                                        @endif
                                        @if (Auth::guard('admin_model')->user()->can('delete'))
                                        <a href="{{ route('social.delete',$data->id) }}" data-bs-toggle="modal" data-bs-target="#LoginForm"  class="delete_value btn btn-icon btn-pills btn-soft-danger"><i class="fa-solid fa-trash"></i></a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                    <span class="text-center bg-soft-warning"><p class="m-0">No Data Found !</p></span>
                    @endif

                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('script')
    <script>
        $('.icon').click(function(){
            var data = $(this).attr('class')
            $('#icons').val(data);
        });

        $(document).ready(function(){
            $(".btn").click(function(){
                var val = $(this).attr('href');
                $('#delete_confirm').attr('href', val);
                console.log(val);
            });
        });

            $(".update_value").click(function(){
                var upid = $(this).attr('data-value');
                var upval = $(this).attr('href');
                $('.update').val(upval);
                $('.update_id').val(upid);
                console.log(upid);
            });
    </script>
@endsection
