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
                    <h5 class="modal-title" id="exampleModalLabel">Update Health Card</h5>
                    <button type="button" class="btn btn-icon btn-close" data-bs-dismiss="modal" id="close-modal"><i class="fa-solid fa-xmark"></i></button>
                </div>
                <div class="modal-body p-3 pt-4">
                    <form action="{{ route('banner.edit') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3">
                                <input name="name" type="text" class="form-control " id="name">
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
                <h5 class="mb-0">Health Card</h5>

                <nav aria-label="breadcrumb" class="d-inline-block mt-4 mt-sm-0">
                    <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('d.service') }}">Dashboard</a></li><i style="font-size:12px;padding-left:6px" class="fa-solid fa-chevron-right"></i>
                        <li class="breadcrumb-item active" aria-current="page">Owner</li><i style="font-size:12px;padding-left:6px" class="fa-solid fa-chevron-right"></i>
                        <li class="breadcrumb-item active" aria-current="page">Health Card</li>
                    </ul>
                </nav>
            </div>
        </div><!--end row-->

        <div class="row">
            {{-- Website INfo --}}
            <div class="col-lg-4 mb-3">
                <div class="card border-0 p-4 rounded shadow">
                    <form action="{{ route('health-card.store') }}" method="POST" class="mt-4" enctype="multipart/form-data">
                        @csrf
                        <div class="">
                            <div class=" mb-3">
                                <label for="" class="form-label">Card Name </label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"  required>
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">Card Price </label>
                                <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"  required>
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">Card Benifits </label>

                                <button type="button" class="btn btn-primary btn-sm float-end" id="plus">More</button>
                            </div>

                            <div class="row mb-2 ">
                                <div class="col-12 d-flex medi gap-3 mt-3">
                                    <input type="text" name="benifits[]" class="form-control @error('benifits.*') is-invalid @enderror"  >
                                </div>
                            </div>
                           <div class="my-3 text-center ">
                            <button type="submit" class="btn btn-primary ">Add</button>
                           </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- List --}}
            <div class="col-lg-8">
                <div class="table-responsive shadow rounded">
                    @if ($healths->count() != 0 )
                        <table class="table t bg-white mb-0" id="myTable">
                            <thead>
                                <tr>
                                   <th >Name</th>
                                    <th>Price</th>
                                    <th >Benifits</th>
                                    <th >Status</th>
                                    @if (Auth::guard('admin_model')->user()->can('edit') || Auth::guard('admin_model')->user()->can('delete'))
                                        <th >Action</th>
                                    @else
                                        <th></th>
                                    @endif

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($healths as $data)
                                @php
                                    $benefitsArray = json_decode($data->benifits, true);
                                @endphp

                                <tr>
                                    <td>{{ $data->name }}</td>
                                    <td class="">{{$data->price }}</td>
                                    <td>
                                        @if(is_array($benefitsArray))
                                            @foreach($benefitsArray as $singleBenefit)
                                                @if ($singleBenefit !== null)
                                                    <li>{{ htmlspecialchars($singleBenefit) }}</li>
                                                @endif
                                            @endforeach
                                        @else
                                            @if ($singleBenefit !== null)
                                                <li>{{ htmlspecialchars($benefitsArray) }}</li>
                                            @endif
                                        @endif
                                    </td>
                                    <td><span class="badge bg-soft-{{ $data->status == 0?'danger':'success' }}">{{ $data->status == 0 ?'Deactive':'active' }}</span></td>
                                    {{-- <td><span class="badge bg-soft-{{ $data->status == 0?'danger':'success' }}">{{ $data->status == 0 ?'Deactive':'active' }}</span></td> --}}
                                    <td class="">
                                        @if (Auth::guard('admin_model')->user()->can('edit'))
                                        <a href="{{route('health-card.edit',$data->id)}}" class=" btn btn-icon btn-pills btn-soft-success d" ><i class="fa-solid fa-pen-to-square"></i></a>
                                        @endif
                                        @if (Auth::guard('admin_model')->user()->can('delete'))
                                        <form action="{{ route('health-card.destroy',$data->id) }}" method="POST" class="display-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"  class="delete_value btn btn-icon btn-pills btn-soft-danger d"><i class="fa-solid fa-trash"></i></button>
                                        </form>
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

{{-- <script>
    $('.inp').click(function () {
        $('#billings').css('display','block');
    });
    $('#plus').click(function () {
        let inputNew = $('.medi:last').clone(true);
        $(inputNew).insertAfter('.medi:last');
    });
</script> --}}
<script>
    $(document).on('click', '.inp', function () {
        $('#billings').css('display', 'block');
    });

    $(document).on('click', '#plus', function () {
        let inputNew = $('.medi:last').clone(true);
        inputNew.find('input').val('');
        inputNew.find('.del').remove(); // Remove existing delete button
        inputNew.append('<button class="del btn btn-danger btn-sm">Delete</button>'); // Append new delete button
        inputNew.insertAfter('.medi:last');
    });

    $(document).on('click', '.del', function () {
        $(this).parent('.medi').remove();
    });
</script>


@endsection

