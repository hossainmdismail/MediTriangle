@extends('frontend.config.app')

@section('content')
<div class="container my-5">
    <div class="row my-5">
        <div class="col-md-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('profile') }}" class="btn btn-primary w-100 my-2">Profile</a>
                    <a href="{{ route('profile.order') }}" class="btn btn-primary w-100 my-2">Order</a>
                    <form action="{{ route('logout') }}" method="post">
                    <button type="submit" class="btn btn-danger w-100 my-2">@csrf LogOut</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            {{-- Appointment all Information --}}
            <h5 class="mb-3" style="border-left: 6px solid #1ab8ae;padding-left: 9px">Appointment</h5>
            <div class="card mb-5">
                <div class="card-body" style="overflow-x: scroll;scroll-behavior: auto;">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID</th>
                            {{-- <th class="d-none d-md-block" scope="col">Department</th> --}}
                            <th scope="col">Doctor</th>
                            <th scope="col">Appointment</th>
                            <th scope="col">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if ($orders->count() != 0)
                                @foreach ($orders as $key => $order)
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>{{ $order->order_id }}
                                    @if ($order->appointment_type == 1)
                                    <span class="badge bg-secondary" style="font-size: 10px">Appointment</span>
                                    @elseif ($order->appointment_type == 2)
                                    <span class="badge bg-secondary">Video</span>
                                    @elseif ($order->appointment_type == 3)
                                    <span class="badge bg-primary">Visa</span>
                                    @endif</td>
                                    <td><img src="{{ asset('uploads/doctor/'.$order->con_doctor->profile) }}" style="width: 20px;border-radius: 6px;margin-right: 7px;" alt="">{{ $order->con_doctor->name }}</td>
                                    <td><span style="font-size: 10px" class="badge bg-{{ $order->activity == null?'info':'primary' }}">{{ $order->activity == null?'Waiting':$order->activity->format('M-d-Y') }}</span></td>
                                    <td>
                                        @if ($order->status == 0)
                                        <span style="font-size: 10px" class="badge bg-info">Proccessing</span>
                                        @elseif ($order->status == 1)
                                        <span style="font-size: 10px" class="badge bg-primary">Confirm</span>
                                        @elseif ($order->status == 2)
                                        <span style="font-size: 10px" class="badge bg-danger">Cancel</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            @else
                            @endif
                        </tbody>
                    </table>
                    {{ $orders->links('pagination::bootstrap-4') }}
                </div>
            </div>
            {{-- Medicine all Information --}}
            @if ($medicines->count() != 0)
            <h5 class="mb-3" style="border-left: 6px solid #1ab8ae;padding-left: 9px">Shop</h5>
            <div class="card mb-3">
                <div class="card-body" style="overflow-x: scroll;scroll-behavior: auto;">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID</th>
                            {{-- <th class="d-none d-md-block" scope="col">Department</th> --}}
                            <th scope="col">Medicine</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($medicines as $key => $medicine)
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>{{ $medicine->order_id }}
                                    {{-- @if ($order->appointment_type == 1)
                                    <span class="badge bg-secondary">Appointment</span>
                                    @elseif ($order->appointment_type == 2)
                                    <span class="badge bg-secondary">Video</span>
                                    @elseif ($order->appointment_type == 3)
                                    <span class="badge bg-primary">Visa</span>
                                    @endif --}}
                                    </td>
                                    {{-- <td class="d-none d-md-block">{{ $order->con_department->department }}</td> --}}
                                    <td>
                                        @foreach (App\Models\MedicineOrder::where('order_id',$medicine->order_id)->get() as $medi)
                                        <span>{{ $medi->medicine }} <br></span>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach (App\Models\MedicineOrder::where('order_id',$medicine->order_id)->get() as $medi)
                                        <span>{{ $medi->quantity }} <br></span>
                                        @endforeach
                                    </td>
                                    <td>
                                        @if ($medicine->status == 0)
                                        <span class="badge bg-info">Proccessing</span>
                                        @elseif ($medicine->status == 1)
                                        <span class="badge bg-primary">Confirm</span>
                                        @elseif ($medicine->status == 2)
                                        <span class="badge bg-danger">Cancel</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $orders->links('pagination::bootstrap-4') }}
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
