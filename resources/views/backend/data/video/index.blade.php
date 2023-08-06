@extends('backend.config.app')
@section('style')
    <style>
        i#print {
    font-size: 16px;
    cursor: pointer;
    color: #044c48;
}
    </style>
@endsection
@section('content')

@php
    $date = date('M d Y');
@endphp
<div class="container-fluid">
    <div class="layout-specing">
        <div class="row">
            <div class="col-xl-9 col-lg-6 col-md-4">
                <h5 class="mb-0">Video Consultation</h5>
                <nav aria-label="breadcrumb" class="d-inline-block mt-2">
                    <ul class="breadcrumb breadcrumb-muted bg-transparent rounded mb-0 p-0">
                        <li class="breadcrumb-item">Dashboard</li><i style="font-size:12px;padding-left:6px" class="fa-solid fa-chevron-right"></i>
                        <li class="breadcrumb-item active" aria-current="page">Video Consultation</li>
                    </ul>
                </nav>
            </div><!--end col-->
        </div><!--end row-->
        <div class="row">
            <div class="row d-flex flex-row-reverse">
                <div class="col-xl-5 col-lg-5 col-md-8 mt-4 mt-md-0">
                    <div class="justify-content-md-end">
                        <form action="" method="get">
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="mb-0 position-relative">
                                        <input class="form-control" type="date" value="{{ Request::get('date') }}" name="date" id="">
                                    </div>
                                </div><!--end col-->

                                <div class="col-sm-12 col-md-5">
                                    <div class="mb-0 position-relative">
                                        <select class="form-select form-control" name="select">
                                            <option value="">Status</option>
                                            <option value="0">Panding</option>
                                            <option value="2">Cancel</option>
                                            <option value="1">Confirm</option>
                                        </select>
                                    </div>
                                </div><!--end col-->

                                <div class="col-sm-12 col-md-2">
                                    <div class="mb-0 position-relative">
                                        <button type="submit" class="btn btn-primary btn">Filter</button>
                                    </div>
                                </div><!--end col-->

                            </div><!--end row-->
                        </form><!--end form-->
                    </div>
                </div><!--end col-->
            </div>
        </div>

        <div class="row">
            <div class="col-12 mt-4">
                <div class="table-responsive bg-white shadow rounded">
                    @if ($datas->count() == 0)
                        <div class="text-center">
                            <h5 class="p-3 mb-0 text-secondary">No Data Found !</h5>
                        </div>
                    @else
                        <table class="table mb-0 table-center">
                            <thead>
                                <tr>
                                    <th class="border-bottom p-3"><i class="fa-solid fa-print" id="print"></th>
                                    <th class="border-bottom p-3" style="min-width: 100px;">Name</th>
                                    <th class="border-bottom p-3" style="min-width: 150px;">WhatsApp</th>
                                    <th class="border-bottom p-3">Age</th>
                                    <th class="border-bottom p-3">Gender</th>
                                    <th class="border-bottom p-3" style="min-width: 150px;">Request</th>
                                    <th class="border-bottom p-3">Status</th>
                                    <th class="border-bottom p-3" style="min-width: 220px;">Doctor</th>
                                    <th class="border-bottom p-3"></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($datas as $key => $data)
                            <tr>
                                <th class="p-3">{{ $key+1 }}</th>
                                <td class="p-3">{{ $data->name }}</td>
                                <td class="p-3">{{ $data->number }}</td>
                                <td class="p-3">{{ $data->age }}</td>
                                <td class="p-3">{{ $data->gender }}</td>
                                <td class="p-3">
                                    <span class="badge bg-soft-{{ ($date > $data->expected_date->format('M d Y')? 'danger':'success') }}">
                                        {{ $data->expected_date->format('M d Y') }}
                                    </span>
                                </td>
                                <td class="p-3">
                                    @if ($data->order_status == 1)
                                        <span class="badge bg-success">Confirm</span>
                                    @endif
                                    <span class="badge bg-{{ $data->order_status == 2?'danger':($data->order_status == 0?'info':'primary') }}">
                                        {{ $data->order_status == 2?'Cancel':($data->order_status == 0?'Panding':$data->appointment_date->format('M-d-Y')) }}
                                    </span>
                                </td>
                                <td class="p-3">
                                    <a href="#" class="text-dark">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('uploads/doctor/'.$data->con_doctor->profile) }}" class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                                            <span class="ms-2">{{ $data->con_doctor->name }}</span>
                                        </div>
                                    </a>
                                </td>
                                <td class="text-end p-3">
                                    <a href="{{  route('videoInvitaion.watch',$data->id) }}" class="watch btn btn-icon btn-pills btn-soft-{{ $data->notification == 0?'primary':'muted' }}"><i class="fa-regular fa-eye"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div><!--end row-->

        <div class="row text-center">
            <!-- PAGINATION START -->
            <div class="col-12 mt-4">
                <div class="d-md-flex align-items-center text-center justify-content-between">
                    {{ $datas->links('pagination::bootstrap-4') }}
                </div>
            </div><!--end col-->
            <!-- PAGINATION END -->
        </div><!--end row-->
    </div>
</div><!--end container-->
@endsection
@section('script')
    <script>
        $('#print').click(function () {
        var pageTitle = 'Video Consultation',
            stylesheet = '//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css',
            win = window.open('', 'Print', 'width=500,height=300');
        win.document.write('<html><head><title>' + pageTitle + '</title>' +
            '<link rel="stylesheet" href="' + stylesheet + '">' +
            '</head><body>' + $('.table')[0].outerHTML + '</body></html>');
        win.document.close();
        win.print();
        win.close();
        return false;
    });

        $('#print').click(function() {
            let a = $('#tablePrint');
            console.log(a);
            window.frames["print_frame"].document.body.innerHTML = a;
            window.frames["print_frame"].window.focus();
            window.frames["print_frame"].window.print();
        });
    </script>
@endsection
