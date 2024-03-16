@extends('backend.config.app')
@section('style')
    <style>
    .desLimit{
        font-size: 12px;
    }
    </style>
@endsection
@section('content')
    {{-- Modals --}}
    <div class="modal fade" id="appointmentform" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-bottom p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Update Service</h5>
                    <button type="button" class="btn btn-icon btn-close" data-bs-dismiss="modal" id="close-modal"><i class="fa-solid fa-xmark"></i></button>
                </div>
                <div class="modal-body p-3 pt-4">
                    <form action="{{ route('banner.edit') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div id="icon">

                                </div>
                            </div>
                            <input type="hidden" id="tokenId" name="id" >
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="service">Banner Image</label> <span style="color: #f9a7a7; font-size:10px; " >Best fit  (1270 x 560)</span>
                                    <input name="photo" type="file" class="form-control @error('photo') is-invalid @enderror">
                                </div>

                                <div class="mb-3">
                                    <select name="status" id="status" class="form-select form-select-sm bg-soft-info">
                                        <option value="1">Active</option>
                                        <option value="0">Deactive</option>
                                    </select>
                                </div>
{{--
                                <div class="mb-3">
                                    <label class="form-label" for="service">Name</label>
                                    <input name="name" id="service" type="text" class="update form-control @error('title') is-invalid @enderror" value="">
                                </div> --}}

                                {{-- <div class="mb-3">
                                    <label class="form-label" for="description">Description</label>
                                    <textarea name="title" id="description" type="text" class="update form-control @error('description') is-invalid @enderror" rows="7"></textarea>
                                </div> --}}
                            </div>

                            <div class="col-lg-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
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
                <h5 class="mb-0">Banner</h5>

                <nav aria-label="breadcrumb" class="d-inline-block mt-4 mt-sm-0">
                    <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('d.service') }}">Dashboard</a></li><i style="font-size:12px;padding-left:6px" class="fa-solid fa-chevron-right"></i>
                        <li class="breadcrumb-item active" aria-current="page">Owner</li><i style="font-size:12px;padding-left:6px" class="fa-solid fa-chevron-right"></i>
                        <li class="breadcrumb-item active" aria-current="page">Banner</li>
                    </ul>
                </nav>
            </div>
        </div><!--end row-->

        <div class="row">
            {{-- Website INfo --}}
            <div class="col-lg-4 mb-3">
                <div class="card border-0 p-4 rounded shadow">
                    <form action="{{ route('d.banner.store') }}" method="POST" class="mt-4" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="" class="form-label">Banner Image </label> <span style="color: #f9a7a7; font-size:10px; " >Best fit  (1270 x 560)</span>
                                <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror"  required>

                                {{-- <x-input label="Banner Image" name="photo" type="file" placeholder="" /> --}}
                            </div>

                            {{-- <div class="col-md-12">
                                <x-input label="name" name="name" type="text" placeholder="Name" />
                            </div>

                            <div class="col-md-12">
                                <x-input label="Title" name="title" type="text" placeholder="Title" />
                            </div> --}}
                        <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- List --}}
            <div class="col-lg-8">
                <div class="table-responsive shadow rounded">
                    @if ($datas->count() != 0 )
                        <table class="table table-center     bg-white mb-0" id="myTable">
                            <thead>
                                <tr>
                                    <th class="border-bottom p-3">Photo</th>
                                    {{-- <th class="border-bottom p-3">Name</th>
                                    <th class="border-bottom p-3"  style="min-width: 180px;">Title</th> --}}
                                    <th class="border-bottom p-3">Status</th>
                                    @if (Auth::guard('admin_model')->user()->can('edit') || Auth::guard('admin_model')->user()->can('delete'))

                                    <th class="border-bottom p-3 " style="min-width: 100px;">Action</th>
                                    @else
                                    <th></th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                <tr>
                                    <td><img style="width: 100px" src="{{ asset('uploads/banner/'.$data->image) }}" alt=""></td>
                                    {{-- <td>{{ $data->name }}</td>
                                    <td class="desLimit">{{$data->title }}</td> --}}
                                    <td><span class="badge bg-soft-{{ $data->status == 0?'danger':'success' }}">{{ $data->status == 0 ?'Deactive':'active' }}</span></td>
                                    <td class="">
                                        @if (Auth::guard('admin_model')->user()->can('edit'))
                                        <a href="{{ $data->id }}" class="update_value btn btn-icon btn-pills btn-soft-success" data-bs-toggle="modal" data-bs-target="#appointmentform"><i class="fa-solid fa-pen-to-square"></i></a>
                                        @endif
                                        @if (Auth::guard('admin_model')->user()->can('delete'))
                                        <a href="{{ route('banner.delete',$data->id) }}" data-bs-toggle="modal" data-bs-target="#LoginForm"  class="delete_value btn btn-icon btn-pills btn-soft-danger"><i class="fa-solid fa-trash"></i></a>
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
    $("#myTable").on('click','.update_value',function(){
         var currentRow=$(this).closest("tr");

         var tokenId = $(this).attr('href');
         var icon=currentRow.find("td:eq(0)").html();
         var service=currentRow.find("td:eq(1)").html();
         var short_description=currentRow.find("td:eq(2)").html();
         var description=currentRow.find("td:eq(3)").html();

        $('#icon').empty().append(icon);
        $('#service').val(service);
        $('#short_description').val(short_description);
        $('#description').val(short_description);
        $('#tokenId').val(tokenId);
    });

</script>

<script>
    $(document).ready(function(){
        $(".btn").click(function(){
            var val = $(this).attr('href');
            $('#delete_confirm').attr('href', val);
        });
    });

</script>
@endsection
