@extends('backend.config.app')
@section('style')
    <style>
    .desLimit{
        font-size: 12px;
    }
    </style>

@endsection
@section('content')

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
                        <li class="breadcrumb-item active" aria-current="page">Health Card Application</li><i style="font-size:12px;padding-left:6px" class="fa-solid fa-chevron-right"></i>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ul>
                </nav>
            </div>
        </div><!--end row-->

        <div class="row">
            {{-- Website INfo --}}
            <div class="col-lg-6 mb-3 m-auto">
                <div class="card border-0 p-4 rounded shadow">
                    <div class="card-header bg-white ">
                        <h3 class="text-center">Health Card Application Info</h3>
                    </div>
                    <form action="{{ route('health.card.update') }}" method="POST" class="mt-4" >
                        @csrf

                        <div class="">
                            <div class="mb-3">
                                <select name="status" id="status" class="form-select form-select-sm bg-soft-info">
                                    <option value=" PROCESSING"> PROCESSING</option>
                                    <option value="DONE">DONE</option>
                                    <option value="CANCEL">CANCEL</option>

                                </select>
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label"> Note </label>
                                <input type="hidden" name="id" value="{{$applications->id}}">
                                <textarea name="note" class="form-control "  > {{$applications->note}} </textarea>
                            </div>


                           <div class="my-3 text-center ">
                            <button type="submit" class="btn btn-primary ">Update</button>
                           </div>
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
    $("#myTable").on('click','.update_value',function(){
         var currentRow=$(this).closest("tr");

         var tokenId = $(this).attr('href');
         var name=currentRow.find("td:eq(0)").html();
         var service=currentRow.find("td:eq(1)").html();
         var short_description=currentRow.find("td:eq(2)").html();
         var description=currentRow.find("td:eq(3)").html();

        $('#name').empty().append(name);
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

<script>
    $(document).on('click', '.inp', function () {
        $('#billings').css('display', 'block');
    });

    $(document).on('click', '#plus', function () {
        let inputNew = $('.medi:last').clone(true);
        inputNew.find('input').val('');
        inputNew.find('.del').remove(); // Remove existing delete button
        inputNew.find('.del2').remove(); // Remove existing delete button
        inputNew.append('<input type="text" name="benifits[]" class=" del2 form-control" >'); // Append new delete button
        inputNew.append('<button class="del btn btn-danger btn-sm">Delete</button>'); // Append new delete button
        inputNew.insertAfter('.medi:last');
    });

    $(document).on('click', '.del', function () {
        $(this).parent('.medi').remove();
    });


</script>


@endsection

