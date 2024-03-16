@extends('backend.config.app')
@section('content')
{{-- //Directions --}}
<div class="container-fluid">
    <div class="layout-specing">
        <div class="row mb-3">
            <div class="d-md-flex justify-content-between">
                <h5 class="mb-0">Owner</h5>

                <nav aria-label="breadcrumb" class="d-inline-block mt-4 mt-sm-0">
                    <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                        <li class="breadcrumb-item"><a href="#">Website Info</a></li><i style="font-size:12px;padding-left:6px" class="fa-solid fa-chevron-right"></i>
                        {{-- <li class="breadcrumb-item active" aria-current="page"></li> --}}
                    </ul>
                </nav>
            </div>
        </div><!--end row-->

        <div class="row">
            {{-- Website INfo --}}
            <div class="col-md-5 mb-3">
                <div class="card border-0 p-4 rounded shadow">
                    <form action="{{ route('owner.store') }}" method="POST" class="mt-4">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <x-Input type="text" label="Brand Name" name="name"  placeholder="Name"/>
                            </div>

                            <div class="col-md-6">
                                <x-Input type="email" label="Brand Email" name="email"  placeholder="example@mail.com"/>
                            </div>

                            <div class="col-md-6">
                                <x-Input-Icon type="number" label="Number" name="number"  placeholder="00-000-00" :icon="+880"/>
                            </div>

                            <div class="col-md-6">
                                <x-Input-Icon type="number" label="Landline" name="landline"  placeholder="000-0000-000" :icon="+880"/>
                            </div>

                            <div class="col-12">
                                <x-Input type="text" label="Address" name="address"  placeholder="Street Address"/>
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
                                    <th class="border-bottom p-3" style="min-width: 180px;">Information</th>
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
                                    <td class="p-3">
                                        {{ $data->name == null?'null': $data->name}} <br> <hr class="m-0">
                                        {{ $data->email == null?'null': $data->email}} <br> <hr class="m-0">
                                        {{ $data->number == null?'null': $data->number}} <br><hr class="m-0">
                                        {{ $data->landline == null?'null': $data->landline}} <br><hr class="m-0">
                                        {{ $data->address == null?'null': $data->address}}
                                    </td>
                                    <td class="p-3"><span class="badge bg-soft-{{ $data->status == 0?'danger':'success' }}">{{ $data->status == 0 ?'Deactive':'active' }}</span></td>
                                    <td class="text-end p-3">
                                        {{-- <a href="#" class="btn btn-icon btn-pills btn-soft-primary" data-bs-toggle="modal" data-bs-target="#viewprofile"><i class="uil uil-eye"></i></a> --}}
                                        @if (Auth::guard('admin_model')->user()->can('edit'))
                                        <a href="{{ route('owner.edit',$data->id) }}" class="btn btn-icon btn-pills btn-soft-success"><i class="fa-solid fa-pen-to-square"></i></a>
                                        @endif

                                        {{-- <a href="{{ route('owner.delete',$data->id) }}" data-bs-toggle="modal" data-bs-target="#LoginForm" class="btn btn-primary m-1"> Click Here</a> --}}
                                        @if (Auth::guard('admin_model')->user()->can('delete'))
                                        <a href="{{ route('owner.delete',$data->id) }}" data-bs-toggle="modal" data-bs-target="#LoginForm"  class="delete_value btn btn-icon btn-pills btn-soft-danger"><i class="fa-solid fa-trash"></i></a>
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
        $(document).ready(function(){
            $(".btn").click(function(){
                var val = $(this).attr('href');
                $('#delete_confirm').attr('href', val);
            });
        });
    </script>
@endsection
