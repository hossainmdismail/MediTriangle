@extends('backend.config.app')

@section('content')
<div class="container-fluid">
    <div class="layout-specing">
        <div class="row">
            <div class="col-xl-9 col-lg-6 col-md-4">
                <h5 class="mb-0">Appointment</h5>
                <nav aria-label="breadcrumb" class="d-inline-block mt-2">
                    <ul class="breadcrumb breadcrumb-muted bg-transparent rounded mb-0 p-0">
                        <li class="breadcrumb-item">Dashboard</li><i style="font-size:12px;padding-left:6px" class="fa-solid fa-chevron-right"></i>
                        <li class="breadcrumb-item active" aria-current="page">Appointment</li>
                    </ul>
                </nav>
            </div><!--end col-->

            <div class="col-xl-3 col-lg-6 col-md-8 mt-4 mt-md-0">
                <div class="justify-content-md-end">
                    <form>
                        <div class="row justify-content-between align-items-center">
                            <div class="col-sm-12 col-md-5">
                                <div class="mb-0 position-relative">
                                    <select class="form-select form-control">
                                        <option value="EY">Today</option>
                                        <option value="GY">Tomorrow</option>
                                        <option value="PS">Yesterday</option>
                                    </select>
                                </div>
                            </div><!--end col-->

                            <div class="col-sm-12 col-md-7 mt-4 mt-sm-0">
                                <div class="d-grid">
                                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#appointmentform">Appointment</a>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </form><!--end form-->
                </div>
            </div><!--end col-->
        </div><!--end row-->

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
                                    <th class="border-bottom p-3">#</th>
                                    <th class="border-bottom p-3">ID</th>
                                    <th class="border-bottom p-3" style="min-width: 100px;">Name</th>
                                    <th class="border-bottom p-3" style="min-width: 150px;">Report</th>
                                    <th class="border-bottom p-3">Products</th>
                                    <th class="border-bottom p-3" style="min-width: 150px;">Address</th>
                                    <th class="border-bottom p-3">Status</th>
                                    <th class="border-bottom p-3"></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($datas as $key => $data)
                            <tr>
                                <th class="p-3">{{ $key+1 }}</th>
                                <td class="p-3">{{ $data->order_id }}</td>
                                <td class="p-3">{{ $data->name }}</td>
                                <td class="p-3">
                                    @if ($data->reports == null)
                                    <span class="badge bg-soft-danger">Empty</span>
                                    @else
                                    <img src="{{ asset('uploads/medicine/'.$data->reports) }}" alt="" style="width: 100px">
                                    @endif
                                </td>
                                <td class="p-3">
                                    <table class="table">
                                        @foreach (App\Models\MedicineOrder::where('order_id',$data->order_id)->get() as $product)
                                        <tr>
                                            <td>{{ $product->medicine }}</td>
                                            <td><span class="badge bg-soft-info">{{ $product->quantity }}</span></td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </td>
                                <td class="p-3">
                                    <table class="table">
                                        <tr>
                                            <td>{{ $data->number }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $data->address }}</td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="p-3"><span class="badge bg-{{ $data->activity == null?($data->status == 2?'danger':'info'):'primary' }}">Processing</span>
                                </td>
                                <td class="text-end p-3">
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-success light sharp" data-toggle="dropdown" aria-expanded="false">
                                            <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                        </button>
                                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-56px, 40px, 0px);">
                                            <a class="dropdown-item" href="https://multibdshop.com/product/Update/1">Edit</a>
                                            <a class="dropdown-item" href="https://multibdshop.com/product/remove/enable/1">Enable</a>
                                            <a class="dropdown-item" href="https://multibdshop.com/product/remove/1">Disable</a>
                                        </div>
                                    </div>
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
