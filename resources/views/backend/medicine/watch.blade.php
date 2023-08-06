@extends('backend.config.app')
@section('content')
{{-- Modals --}}
<div class="modal fade" id="confirm" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-bottom p-3">
                <h5 class="modal-title" id="exampleModalLabel">Confirm Order</h5>
                <button type="button" class="btn btn-icon btn-close" data-bs-dismiss="modal" id="close-modal"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body p-3 pt-4">

                <form action="{{ route('user.data.visaInvitaion.confirmation') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="mb-3">
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-info">{{ $data->order_id }}</li>
                                <li class="list-group-item list-group-item-success">{{ $data->number}}</li>
                            </ul>
                            <input type="hidden" name="order_id" value="{{ $data->order_id }}">
                            <input type="hidden" name="number" value="{{ $data->number }}">

                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Appointment Date</label>
                            <input type="date" name="date" class="form-control @error('date') is-invalid @enderror">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Time</label>
                            <input type="time" name="time" class="form-control @error('time') is-invalid @enderror">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="" class="form-label">Message</label>
                            <textarea type="text" class="form-control @error('message') is-invalid @enderror" name="message" rows="5" placeholder="Type..."> {{ $data->message }}</textarea>
                        </div>

                        <div class="col-lg-12">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary" name="btn" value="1">Confirm</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="cancel" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-bottom p-3">
                <h5 class="modal-title" id="exampleModalLabel">Cancel Order</h5>
                <button type="button" class="btn btn-icon btn-close" data-bs-dismiss="modal" id="close-modal"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body p-3 pt-4">

                <form action="{{ route('user.data.visaInvitaion.confirmation') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="mb-3">
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-info">{{ $data->order_id }}</li>
                                <li class="list-group-item list-group-item-success">{{ $data->number }}</li>
                            </ul>
                            <input type="hidden" name="order_id" value="{{ $data->order_id }}">
                            <input type="hidden" name="number" value="{{ $data->number }}">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="" class="form-label">Message</label>
                            <textarea type="text" class="form-control @error('message') is-invalid @enderror" name="message" rows="5" placeholder="Type..."> {{ $data->message }}</textarea>
                        </div>

                        <div class="col-lg-12">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-danger" name="btn" value="2">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
{{-- Modals --}}



@php
    $date       = date('M d Y');
    $medicines   = App\Models\MedicineOrder::where('order_id',$data->order_id)->get();
@endphp
<div class="container-fluid">
    <div class="layout-specing">
        <div class="row">
            <div class="col-xl-9 col-lg-6 col-md-4">
                <h5 class="mb-0">Medicine</h5>
                <nav aria-label="breadcrumb" class="d-inline-block mt-2">
                    <ul class="breadcrumb breadcrumb-muted bg-transparent rounded mb-0 p-0">
                        <li class="breadcrumb-item">Dashboard</li><i style="font-size:12px;padding-left:6px" class="fa-solid fa-chevron-right"></i>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('user.data.visaInvitaion') }}">Medicine</a>
                        </li><i style="font-size:12px;padding-left:6px" class="fa-solid fa-chevron-right"></i>
                        <li class="breadcrumb-item active" aria-current="page">{{ $data->order_id }}</li>

                    </ul>
                </nav>
            </div><!--end col-->

            <div class="col-12 mt-4">
                <div class="rounded shadow overflow-hidden">
                    <div class="row">
                        <div class="col-5 m-auto">
                            <div class="text-center avatar-profile position-relative py-4 border-bottom">
                                <img src="{{ Avatar::create($data->name) }}" class="rounded-circle shadow-md avatar avatar-md-md" alt="">
                                <h5 class="mt-3 mb-1">{{ $data->name }}</h5>
                                <h5 class="text-muted mb-0 badge bg-soft-info">৳-</h5>
                                <h5 class="text-muted mb-0 badge bg-soft-info"> Years old</h5>
                                <div class="confirm my-3">
                                    <button type="button" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#confirm">Confirm</button>
                                    <button type="button" class="btn btn-danger mb-1" data-bs-toggle="modal" data-bs-target="#cancel">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-5 my-3">
                            <div class="card border-0 shadow">
                                <div class="card-header">
                                    <h5>Billings</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group">
                                        <li class="list-group-item"><i class="fa-solid fa-cart-shopping text-primary h5 mb-0 me-2"></i>{{ $data->order_id }}</li>
                                        <li class="list-group-item"><i class="fa-regular fa-user text-primary h5 mb-0 me-2"></i>{{ $data->name }}</li>
                                        <li class="list-group-item"><i class="fa-solid fa-phone text-primary h5 mb-0 me-2"></i>{{ $data->number }}</li>
                                        <li class="list-group-item"><i class="fa-solid fa-passport text-primary h5 mb-0 me-2"></i>{{ $data->address }}</li>
                                    </ul>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7 my-3">
                            <div class="card border-0 shadow">
                                <div class="card-header">
                                    <h5>Medicine</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="team-person position-relative rounded overflow-hidden">
                                                <img style="width: 100%" src="{{ asset('uploads/medicine/'.$data->reports) }}" class="img-fluid" alt="">
                                                <ul class="list-unstyled team-like">
                                                    <li><a href="{{ asset('uploads/medicine/'.$data->reports) }}" class="btn btn-icon btn-pills btn-soft-danger download" download><i class="fa-solid fa-arrow-down"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-lg-8">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Medicine</th>
                                                        <th scope="col">Quantity</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($medicines as $medicine)
                                                        <tr>
                                                            <td>{{ $medicine->medicine }}</td>
                                                            <td>{{ $medicine->quantity }}</td>
                                                        </tr>
                                                    @empty

                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end row-->

    </div>
</div><!--end container-->
@endsection

