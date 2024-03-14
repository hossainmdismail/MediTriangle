@extends('backend.config.app')

@section('content')
<div id="preloader">
    <div id="status">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="layout-specing">
        <h5 class="mb-0">Dashboard</h5>

        <div class="row">
            <div class="col-xl-2 col-lg-4 col-md-4 mt-4">
                <div class="card features feature-primary rounded border-0 shadow p-4">
                    <div class="d-flex align-items-center">
                        <div class="icon text-center rounded-md">
                            <i class="fa-solid fa-bed"></i>
                        </div>
                        <div class="flex-1 ms-2">
                            <h5 class="mb-0">{{ $patient }}</h5>
                            <p class="text-muted mb-0">Patients</p>
                        </div>
                    </div>
                </div>
            </div><!--end col-->

            {{-- <div class="col-xl-2 col-lg-4 col-md-4 mt-4">
                <div class="card features feature-primary rounded border-0 shadow p-4">
                    <div class="d-flex align-items-center">
                        <div class="icon text-center rounded-md">
                            <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                        </div>
                        <div class="flex-1 ms-2">
                            <h5 class="mb-0">{{ number_format($totalEarn) }}</h5>
                            <p class="text-muted mb-0">Total Earn</p>
                        </div>
                    </div>
                </div>
            </div><!--end col--> --}}

            {{-- <div class="col-xl-2 col-lg-4 col-md-4 mt-4">
                <div class="card features feature-primary rounded border-0 shadow p-4">
                    <div class="d-flex align-items-center">
                        <div class="icon text-center rounded-md">
                            <i class="fa-solid fa-user-group"></i>
                        </div>
                        <div class="flex-1 ms-2">
                            <h5 class="mb-0">{{ $user }}</h5>
                            <p class="text-muted mb-0">Users</p>
                        </div>
                    </div>
                </div>
            </div><!--end col--> --}}

            <div class="col-xl-2 col-lg-4 col-md-4 mt-4">
                <div class="card features feature-primary rounded border-0 shadow p-4">
                    <div class="d-flex align-items-center">
                        <div class="icon text-center rounded-md">
                            <i class="fa-regular fa-calendar-check"></i>
                        </div>
                        <div class="flex-1 ms-2">
                            <h5 class="mb-0">{{ $totalAppointment }}</h5>
                            <p class="text-muted mb-0">Appointment</p>
                        </div>
                    </div>
                </div>
            </div><!--end col-->

            {{-- <div class="col-xl-2 col-lg-4 col-md-4 mt-4">
                <div class="card features feature-primary rounded border-0 shadow p-4">
                    <div class="d-flex align-items-center">
                        <div class="icon text-center rounded-md">
                            <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                        </div>
                        <div class="flex-1 ms-2">
                            <h5 class="mb-0" id="balancesSMS">....</h5>
                            <p class="text-muted mb-0">Balance</p>
                        </div>
                    </div>
                </div>
            </div><!--end col--> --}}


            <div class="col-xl-2 col-lg-4 col-md-4 mt-4 d-flex justify-content-center ">
                <a href="{{ route('clear.Cache') }}" class="btn btn-outline-success d-flex align-items-center ">Clear Cache</a>
            </div><!--end col-->

        </div><!--end row-->

        {{-- <div class="row">
            <div class="col-xl-8 col-lg-7 mt-4">
                <div class="card shadow border-0 p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="align-items-center mb-0">Patients visit by Gender</h6>

                         <div class="mb-0 position-relative">
                            <select class="form-select form-control" id="yearchart">
                                <option selected>2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                            </select>
                        </div>
                    </div>
                    <div id="dashboard" class="apex-chart"></div>
                </div>
            </div><!--end col-->

        </div><!--end row--> --}}

    </div>
</div>
@endsection

@section('script')
<script>
    const options = {
        method: 'GET',
        headers: {
            'X-RapidAPI-Key': '5Ga7wUBj70JdpiqVhe8t',
            'X-RapidAPI-Host': 'contextualwebsearch-websearch-v1.p.rapidapi.com',
        },
    };
    let dis = document.getElementById('balancesSMS');
    fetch(
        'http://bulksmsbd.net/api/getBalanceApi?api_key=5Ga7wUBj70JdpiqVhe8t',
        options
    )
        .then(response => response.json())
        .then(response => dis.innerText= response.balance)
        .catch(err => console.error(err));
</script>
<script>
    let data = {!! $data !!};
    // Gender Filter
    try {
    var options1 = {
        series: data.series,
        chart: data.chart,
        grid: {
            borderColor: '#e9ecef',
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '40%',
                endingShape: 'rounded'
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        colors: ['#396cf0', '#53c797', '#f1b561'],
        xaxis: {
            categories: data.xaxis.categories,
        },
        yaxis: {
            title: {
                text: 'Patients',

                style: {
                    colors: ['#8492a6'],
                    fontSize: '13px',
                    fontFamily: 'Inter, sans-serif',
                    fontWeight: 500,
                },
            },
        },
        fill: {
            opacity: 1,
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return val + " Patients"
                }
            }
        }
    };
    var chart1 = new ApexCharts(document.querySelector("#dashboard"), options1);
    chart1.render();
    } catch (error) {

    }
    //Department Filter
    try {
    var options2 = {
        chart: {
            height: 350,
            type: 'radialBar',
            dropShadow: {
              enabled: true,
              top: 10,
              left: 0,
              bottom: 0,
              right: 0,
              blur: 2,
              color: '#45404a2e',
              opacity: 0.35
            },
        },
        colors: ['#396cf0', '#53c797', '#f1b561', '#f0735a'],
        plotOptions: {
            radialBar: {
                track: {
                  background: '#b9c1d4',
                  opacity: 0.5,
                },
                dataLabels: {
                    name: {
                        fontSize: '22px',
                    },
                    value: {
                        fontSize: '16px',
                        color: '#8997bd',
                    },
                    total: {
                        show: true,
                        label: 'Total',
                        color: '#8997bd',
                        formatter: function (w) {
                            // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                            return 249
                        }
                    }
                }
            }
        },
        series: [44, 55, 67, 83],
        labels: ['Cardilogram', 'Gynecology', 'Dental Care', 'Neurology'],
    }

    var chart2 = new ApexCharts(document.querySelector("#department"),options2);
    chart2.render();
} catch (error) {

}
</script>

@endsection
