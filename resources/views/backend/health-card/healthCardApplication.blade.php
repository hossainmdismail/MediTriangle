@extends('backend.config.app')
@section('content')
<div class="container-fluid">
    <div class="layout-specing">
        <div class="row">
            <div class="col-lg-10 m-auto     ">
                <div class="" >
                    <div class="table-responsive shadow rounded ">
                        @if ($applicatios->count() != 0 )
                            <table class="table t bg-white mb-0" id="myTable">
                                <thead>
                                    <tr>
                                       <th >Name</th>
                                        <th>Phone Number</th>
                                        <th >Address</th>
                                        <th >Passport/Nid</th>
                                        <th >Status</th>
                                        
                                        <th >Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($applicatios as $data)
                                    <tr>
                                        <td>{{ $data->name }}</td>
                                        <td class="">{{$data->number }}</td>
                                        <td>  {{$data->address}} </td>
                                        <td>  {{$data->passport_nid? $data->passport_nid:'NO DATA'}} </td>
                                        <td> <span class="badge bg-soft-info">{{ $data->status }}</span> </td>


                                        {{-- <td><span class="badge bg-soft-{{ $data->status == 0?'danger':'success' }}">{{ $data->status == 0 ?'Deactive':'active' }}</span></td> --}}
                                        {{-- <td><span class="badge bg-soft-{{ $data->status == 0?'danger':'success' }}">{{ $data->status == 0 ?'Deactive':'active' }}</span></td> --}}
                                        <td class="">
                                            <a href="{{route('health.card.edit',$data->id)}}" class=" btn btn-icon btn-pills btn-soft-success d" ><i class="fa-solid fa-pen-to-square"></i></a>

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
</div>
@endsection
